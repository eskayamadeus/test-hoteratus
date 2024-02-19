<x-base-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/tom-select/tom-select.bootstrap5.min.css') }}">
    @endpush

    {{-- Index Main Content --}}

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">Competitive Set Analysis Report</h1>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <form id="report-form" action="{{ route('csa.report.store') }}" method="POST">
            @csrf
            <div class="card card-body mb-3 mb-lg-5">
                <div class="row align-items-center">
                    <div class="col-3">
                        <div class="col-auto">Date Range:</div>
                        <div class="col">
                            <input type="hidden" name="date_from" id="date_from">
                            <input type="hidden" name="date_to" id="date_to">
                            <button name="date_range" id="js-daterangepicker-predefined" class="btn btn-ghost-secondary btn-sm dropdown-toggle">
                                <i class="bi-calendar-week me-1"></i>
                                <span class="js-daterangepicker-predefined-preview"></span>
                            </button>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-3">
                        <div class="col-auto">Rooms:</div>
                        <div class="col tom-select-custom">
                            <select class="js-select form-select" multiple required id="rooms" name="rooms[]" placeholder="Select rooms..." autocomplete="off">
                                <option value="">Select rooms...</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-3">
                        <div class="col-auto">Channels:</div>
                        <div class="col tom-select-custom">
                            <select class="js-select form-select" name="channels[]" multiple required id="channels" placeholder="Select channels..." autocomplete="off">
                                <option value="">Select channels...</option>
                                @foreach ($channels as $key => $value)
                                    <option value="{{ $key }}">{{ $value['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-3">
                        <div class="col-auto">Hotels:</div>
                        <div class="col tom-select-custom">
                            <select class="js-select form-select" name="hotels[]" multiple required id="hotels" placeholder="Select hotels..." autocomplete="off">
                                <option value="">Select hotels...</option>
                                @foreach ($scrapedHotels as $hotel)
                                <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </form>

        <div class="row">
            <div class="col-lg-12 mb-3 mb-lg-0" id="report-content"></div>
            <!-- End Col -->
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('assets/vendor/tom-select/tom-select.complete.min.js') }}"></script>

        <script>
            var start = moment();
            var end = moment().add(10, 'days');

            document.querySelectorAll('.js-select').forEach((el)=>{
                new TomSelect(el,{
                    "singleMultiple": false,
                    "hideSelected": true,
                });
            });

            $(function() {
                $('#js-daterangepicker-predefined').daterangepicker({
                    startDate: start,
                    endDate: end
                }, cb);

                $('#js-daterangepicker-predefined').on('apply.daterangepicker', function (ev, picker) {
                    $(this).find('.js-daterangepicker-predefined-preview')
                        .html(picker.startDate.format('MMMM D, YYYY') + ' - ' + picker.endDate.format('MMMM D, YYYY'));

                    $('#date_from').val(picker.startDate.format('YYYY-MM-DD'));
                    $('#date_to').val(picker.endDate.format('YYYY-MM-DD'));
                });

                $('#report-form').on('submit', function (event) {
                    event.preventDefault();
                    var form = $(this);
                    var actionUrl = form.attr('action');

                    $.ajax({
                        type: form.attr('method'),
                        url: form.attr('action'),
                        data: form.serialize(), // serializes the form's elements.
                        beforeSend: function(){
                            $('#report-content').html(`<div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>`);
                        },
                        success: function(data) {
                            $('#report-content').html(data);
                        }
                    });
                })
            });

            cb(start, end)

            function cb(start, end) {
                $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview')
                    .html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

                $('#date_from').val(start.format('YYYY-MM-DD'));
                $('#date_to').val(end.format('YYYY-MM-DD'));
            }
        </script>
    @endpush
</x-base-layout>
