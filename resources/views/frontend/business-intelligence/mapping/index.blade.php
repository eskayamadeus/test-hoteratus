<x-base-layout>

    {{-- Index Main Content --}}

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">{{ $config['name'] }} </h1>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                        <i class="bi-chevron-left"></i>
                    </a>
                </span>

                <span class="hs-nav-scroller-arrow-next" style="display: none;">
                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                        <i class="bi-chevron-right"></i>
                    </a>
                </span>

                <!-- Nav -->
                <ul class="nav nav-tabs page-header-tabs" id="pageHeaderTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('csa.config.show', $platform) }}" aria-selected="false">Properties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('csa.room-mapping.show', $platform) }}" aria-selected="true">Local Room Mapping</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('csa.revenue-strategy.show', $platform) }}" aria-selected="false">Revenue Strategy</a>
                    </li>
                </ul>
                <!-- End Nav -->
            </div>
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-lg-12 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card">
                    @error('mapping')
                    <div class="mb-4">
                        <span class="alert alert-danger">{{ $message }}</span>
                    </div>
                    @enderror

                    <form action="{{ route('csa.room-mapping.store', $platform) }}" method="POST">
                        @csrf
                        <!-- Header -->
                        <div class="card-header card-header-content-between">
                            <h4 class="card-header-title">Local Room Mapping</h4>

                            <button type="submit" class="btn btn-primary">Save Mappings</button>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            @if ($scrapedHotels->isNotEmpty())
                                @foreach($scrapedHotels as $scrapedHotel)
                                    <h2>{{$scrapedHotel->name}}</h2>
                                    @if($scrapedHotel->scrapedRooms->isNotEmpty())
                                        <ul class="list-group mb-4">
                                            @foreach ($scrapedHotel->scrapedRooms as $scrapedRoom)
                                                @php $attribute = "mapping.{$scrapedRoom->id}" @endphp
                                                    <!-- Item -->
                                                <li class="list-group-item">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h5 class="mb-0">
                                                                <a class="text-dark">{{ $scrapedRoom->name }}</a>
                                                            </h5>
                                                            <ul class="list-inline list-separator small text-body">
                                                                <li class="list-inline-item">Bed Types: {{ implode(", ", $scrapedRoom->bed_types) }}</li>
                                                                <li class="list-inline-item">Capacity: {{ $scrapedRoom->capacity }}</li>
                                                                @foreach ($scrapedRoom->extra as $item)
                                                                    <li class="list-inline-item">{{ $item }}</li>
                                                                @endforeach
                                                            </ul>
                                                            @error($attribute)
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <!-- End Col -->
                                                        <div class="col-auto">
                                                            <select class="form-control @error($attribute) is-invalid @enderror" name="mapping[{{ $scrapedRoom->id }}]">
                                                                <option selected disabled value="">Select Rooms</option>
                                                                @foreach ($rooms as $room)
                                                                    <option @selected(old($attribute, $scrapedRoom->roomMapping?->room_id) == $room->id) value="{{ $room->id }}">{{ $room->room_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- End Row -->
                                                </li>
                                                <!-- End Item -->
                                            @endforeach
                                        </ul>
                                    @else
                                        <div class="alert alert-soft-warning" role="alert">
                                            Sorry we have no rooms for this hotel in this channel!
                                        </div>
                                    @endif

                                    <div class="divider-center mb-4"></div>
                                @endforeach
                            @else
                                <div class="alert alert-soft-warning" role="alert">
                                    You have not added any properties to this configuration set.
                                </div>
                            @endif
                        </div>
                        <!-- Body -->
                    </form>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        </div>
    </div>

    @push('scripts')

        <script src="{{ asset('assets/vendor/jquery.repeater/jquery.repeater.min.js') }}"></script>
        <!-- JS Plugins Init. -->
        <script>
            $(document).ready(function () {
                $('.repeater').repeater({
                    initEmpty: false,
                    show: function () {
                        $(this).slideDown();
                    },
                    hide: function (deleteElement) {
                        if(confirm('Are you sure you want to delete this element?')) {
                            $(this).slideUp(deleteElement);
                        }
                    },
                    isFirstItemUndeletable: false
                })
            });
        </script>
    @endpush
</x-base-layout>
