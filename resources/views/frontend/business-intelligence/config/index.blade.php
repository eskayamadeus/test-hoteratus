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
                        <a class="nav-link active" href="{{ route('csa.config.show', $platform) }}"
                            aria-selected="true">Properties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('csa.room-mapping.show', $platform) }}"
                            aria-selected="false">Local Room Mapping</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('csa.revenue-strategy.show', $platform) }}"
                            aria-selected="false">Revenue Strategy</a>
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
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Properties</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    @include($view, ['config' => $config])
                    <!-- Body -->
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
            $(document).ready(function() {
                $('.repeater').repeater({
                    initEmpty: false,
                    show: function() {
                        $(this).slideDown();
                    },
                    hide: function(deleteElement) {
                        if (confirm('Are you sure you want to delete this element?')) {
                            $(this).slideUp(deleteElement);
                        }
                    },
                    isFirstItemUndeletable: false
                })
            });
        </script>
    @endpush
</x-base-layout>
