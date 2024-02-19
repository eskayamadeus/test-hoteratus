<x-base-layout>

    {{-- Index Main Content --}}

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">{{ $config['name'] }} Revenue Strategy</h1>
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
                        <a class="nav-link" href="{{ route('csa.room-mapping.show', $platform) }}" aria-selected="false">Local Room Mapping</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('csa.revenue-strategy.show', $platform) }}" aria-selected="true">Revenue Strategy</a>
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
                    <form action="{{ route('csa.revenue-strategy.store', $platform) }}" method="POST">
                        @csrf
                        <!-- Header -->
                        <div class="card-header card-header-content-between">
                            <h4 class="card-header-title">Revenue Strategies</h4>

                            <button type="submit" class="btn btn-primary">Save Strategies</button>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            @error('strategies')
                            <div class="mb-4">
                                <span class="alert alert-danger">{{ $message }}</span>
                            </div>
                            @enderror
                            <ul class="list-group">
                                @foreach ($strategies as $strategy)
                                    @php $attribute = "strategies.{$loop->index}." @endphp
                                    <!-- Item -->
                                    <li class="list-group-item">
                                        <div class="row align-items-center">
                                            <input type="hidden" name="strategies[{{ $loop->index }}][approach]" value="{{ $strategy->approach->value }}">
                                            <div class="col">
                                                <h5 class="mb-0">
                                                    <a class="text-dark">{{ $strategy->approach->description() }}</a>
                                                </h5>
                                                @error($attribute. 'approach')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-auto">
                                                <select class="form-control @error($attribute. 'increment_type') is-invalid @enderror" name="strategies[{{ $loop->index }}][increment_type]">
                                                    <option selected disabled value="">Select Increment Type</option>
                                                    @foreach (\App\Enums\RevenueStrategyIncrementType::cases() as $incrementType)
                                                        <option @selected(old($attribute. 'increment_type', $strategy->increment_type?->value) == $incrementType->value) value="{{ $incrementType->value }}">{{ $incrementType->description() }}</option>
                                                    @endforeach
                                                </select>
                                                @error($attribute. 'increment_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-auto">
                                                <select class="form-control @error($attribute.'value_type') is-invalid @enderror" name="strategies[{{ $loop->index }}][value_type]">
                                                    <option selected disabled value="">Select Value Type</option>
                                                    @foreach (\App\Enums\RevenueStrategyValueType::cases() as $valueType)
                                                        <option @selected(old($attribute. 'value_type', $strategy->value_type?->value) == $valueType->value) value="{{ $valueType->value }}">{{ $valueType->description() }}</option>
                                                    @endforeach
                                                </select>
                                                @error($attribute. 'value_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-auto">
                                                <input value="{{ old($attribute.'value', $strategy->value) }}" placeholder="Enter value for approach" type="number" class="form-control @error($attribute.'value') is-invalid @enderror" name="strategies[{{ $loop->index }}][value]">
                                                @error($attribute. 'value')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- End Row -->
                                    </li>
                                    <!-- End Item -->
                                @endforeach
                            </ul>
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
    @endpush
</x-base-layout>
