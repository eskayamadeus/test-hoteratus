<x-base-layout>

    {{-- Index Main Content --}}

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">{{ $config['name'] }}</h1>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <form id="report-form" action="{{ route('csa.config.expedia-packages') }}" method="POST">
            @csrf
            <div class="card card-body mb-3 mb-lg-5">
                <div class="row align-items-center">
                    <div class="col-3">
                        <div class="col-auto">Origin:</div>
                        <input required type="text" class="form-control @error('origin') is-invalid @enderror" name="origin" value="{{ old('origin', '') }}">
                        @error('origin')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- End Col -->

                    <div class="col-3">
                        <div class="col-auto">Destination:</div>
                        <input required type="text" class="form-control @error('destination') is-invalid @enderror" name="destination" value="{{ old('destination', '') }}">
                        @error('destination')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- End Col -->

                    <div class="col-3">
                        <div class="row">
                            <div class="col-auto">Departure & Arrival:</div>
                            <div class="col-auto">
                                <input type="hidden" name="date_from" id="date_from">
                                <input type="hidden" name="date_to" id="date_to">
                                <button type="button" name="date_range" id="js-daterangepicker-predefined" class="btn btn-ghost-secondary btn-sm dropdown-toggle">
                                    <i class="bi-calendar-week me-1"></i>
                                    <span class="js-daterangepicker-predefined-preview"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-3">
                        <button type="submit" class="btn btn-primary">Get Hotels</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </form>

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header card-header-content-sm-between">
                <div class="mb-2 mb-sm-0">
                    <h4 class="card-header-title">Hotels</h4>
                    <p class="card-text fs-5">Your search results from Expedia Package. Select hotels to add to your Expedia Hotel Competitive Set.</p>
                </div>

                <div class="d-grid d-sm-flex justify-content-sm-between align-items-sm-center gap-2">
                    <!-- Datatable Info -->
                    <div id="datatableCounterInfo" style="display: none;">
                        <div class="d-flex align-items-center">
                            <span class="fs-6 me-3">
                                <span id="datatableCounter">0</span>
                                Selected
                            </span>
                            <button type="button" id="add-competitive-set" class="btn btn-outline-primary btn-sm"><i class="bi-plus"></i> Add To Expedia Hotel</button>
                        </div>
                    </div>
                    <!-- End Datatable Info -->
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable"
                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    data-hs-datatables-options='{
                           "columnDefs": [{
                              "targets": [0, 1, 2, 3, 4, 5],
                              "orderable": false
                            }],
                            "scrollY": "400px",
                           "order": [],
                           "search": "#datatableSearch",
                           "entries": "#datatableEntries",
                           "pageLength": -1,
                           "isResponsive": false,
                           "isShowPaging": false,
                           "pagination": "datatablePagination"
                         }'>
                    <thead class="thead-light">
                        <tr>
                            <th data-data="checkbox" data-name="checkbox" class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                                    <label class="form-check-label" for="datatableCheckAll"></label>
                                </div>
                            </th>
                            <th data-data="hotel_name" class="table-column-ps-0">Hotel Name</th>
                            <th data-data="name" data-visible="false">Name</th>
                            <th data-data="location">Location</th>
                            <th data-data="price">Price</th>
                            <th data-data="url_id">URL ID</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <form id="properties-form" action="{{ route('csa.config.store', 'expedia-hotel') }}" method="POST">
                @csrf
            </form>
        </div>
        <!-- End Card -->
    </div>

    @push('scripts')
        <script src="{{ asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('assets/vendor/sweetalert/sweetalert2.all.min.js') }}"></script>

        <script>
            var start = moment();
            var end = moment().add(10, 'days');

            var hasLoadedData = false

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


                // INITIALIZATION OF DATATABLES
                // =======================================================
                HSCore.components.HSDatatables.init($('#datatable'), {
                    dom: 't',
                    paging: false,
                    language: {
                        emptyTable: "Please submit the form above to get hotels from Expedia Packages"
                    },
                    select: {
                        style: 'multi',
                        selector: 'td:first-child input[type="checkbox"]',
                        classMap: {
                            checkAll: '#datatableCheckAll',
                            counter: '#datatableCounter',
                            counterInfo: '#datatableCounterInfo'
                        }
                    }
                });

                const datatable = HSCore.components.HSDatatables.getItem(0);

                $('#report-form').on('submit', function (event) {
                    event.preventDefault();

                    const form = $(this);

                    submitForm(form, function (response) {
                        hasLoadedData = true;
                        // Clear existing table data
                        datatable.clear().draw();

                        // Iterate through the response data and append rows to the table
                        $.each(response, function(index, item) {
                            datatable.row.add({
                                checkbox: `<div class="form-check">
                                                <input name="hotels[${index}][selected]" class="form-check-input" type="checkbox" value="" id="check${index}">
                                                <label class="form-check-label" for="check${index}"></label>
                                            </div>`,
                                hotel_name: `<a class="d-flex align-items-center text-dark" target="_blank" rel="noopener noreferrer" href="${item.urlLink}">
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="text-inherit">${item.name}</span>
                                                </div>
                                            </a>`,
                                name: item.name,
                                location: item.location,
                                price: item.price,
                                url_id: item.url_id
                            })
                        });

                        // Initialize DataTable
                        datatable.draw();
                    })
                });

                $('#add-competitive-set').on('click', function (event) {
                    event.preventDefault();

                    Swal.fire({
                        text: "Are you sure you want to add selected hotels to expedia hotel competitive set?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, add them!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const data = datatable.rows('.selected').data();

                            let form = $('#properties-form');

                            $.each(data, function(index, {name, url_id}) {
                                form.append(`<input class="dynamic" type="hidden" value="${name}" name="properties[${index}][name]"/>`);
                                form.append(`<input class="dynamic" type="hidden" value="${url_id}" name="properties[${index}][url_id]"/>`);
                                form.append(`<input class="dynamic" type="hidden" value="2" name="properties[${index}][minimum_stay]"/>`);
                            });

                            submitForm(form, function (response, form) {
                                form.find('.dynamic').remove()

                                Swal.fire({
                                    title: "Added!",
                                    text: "Your selected list has been added to competitive set.",
                                    icon: "success",
                                    confirmButtonColor: "#3085d6",
                                });
                            }, function (xhr, form) {
                                form.find('.dynamic').remove()
                            });
                        }
                    });
                });
            });

            cb(start, end)

            function cb(start, end) {
                $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview')
                    .html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

                $('#date_from').val(start.format('YYYY-MM-DD'));
                $('#date_to').val(end.format('YYYY-MM-DD'));
            }

            window.onload = function() {
                window.addEventListener("beforeunload", function (e) {
                    if (!hasLoadedData) {
                        return undefined;
                    }

                    const confirmationMessage = 'You have some hotels in your list. Leaving this page means you loose this data. You can always come back to get fresh data. Do you want to leave this page?';

                    (e || window.event).returnValue = confirmationMessage; //Gecko + IE
                    return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
                });
            };

            function submitForm(form, success, error) {
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serialize(), // serializes the form's elements.
                    beforeSend: function(){
                        Swal.fire({
                            title: 'Please Wait!',
                            html: `<div class="d-flex justify-content-center">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>`,
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                        });
                    },
                    success: function(response) {
                        Swal.close();

                        success(response, form);
                    },
                    error: function (xhr) {
                        Swal.close();

                        error(xhr, form)

                        Swal.fire({
                            icon: "error",
                            text: xhr.responseJSON.message,
                        });
                    },
                });
            }
        </script>
    @endpush
</x-base-layout>
