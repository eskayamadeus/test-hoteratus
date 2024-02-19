<!-- Body -->
<div class="card-body">
    <form class="repeater" action="{{ route('csa.config.store', 'booking') }}" method="POST">
        @csrf

        @error('properties')
        <span class="alert alert-danger">{{ $message }}</span>
        @enderror

        <div data-repeater-list="properties">
            @forelse (old('properties', $hotels) as $property)
            @php
                $name = 'properties.' . $loop->index . '.name';
                $url = 'properties.' . $loop->index . '.url_id';
                $minimumStay = 'properties.' . $loop->index . '.minimum_stay';
            @endphp
            <div data-repeater-item>
                <input type="hidden" name="id" value="{{ $property['id'] ?? '' }}">
                <!-- Form -->
                <div class="mb-4">
                    <label class="form-label">Property Name</label>

                    <input required type="text" class="form-control @error($name) is-invalid @enderror" name="name" value="{{ $property['name'] ?? '' }}">
                    @error($name)
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <!-- End Form -->

                <div class="row">
                    <div class="col-sm-6">
                        <!-- Form -->
                        <div class="mb-4">
                            <label class="form-label">Property Url</label>

                            <input required type="text" class="form-control @error($url) is-invalid @enderror" name="url_id" value="{{ $property['url_id'] ?? '' }}">
                            @error($url)
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- End Form -->
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-5">
                        <!-- Form -->
                        <div class="mb-4">
                            <label class="form-label">Minimum Stay</label>

                            <input required type="number" class="form-control @error($minimumStay) is-invalid @enderror" name="minimum_stay" value="{{ $property['minimum_stay'] ?? '' }}">
                            @error($minimumStay)
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- End Form -->
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-1 my-auto">
                        <button type="button" data-repeater-delete class="btn btn-danger btn-icon">
                            <i class="bi-trash"></i>
                        </button>
                    </div>

                    <span class="divider-start"></span>
                </div>
                <!-- End Row -->
            </div>
            @empty
            <div data-repeater-item>
                <!-- Form -->
                <div class="mb-4">
                    <label class="form-label">Property Name</label>

                    <input required type="text" class="form-control" name="name">
                </div>
                <!-- End Form -->

                <div class="row">
                    <div class="col-sm-6">
                        <!-- Form -->
                        <div class="mb-4">
                            <label class="form-label">Property Url</label>

                            <input required type="text" class="form-control" name="url_id">
                        </div>
                        <!-- End Form -->
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-5">
                        <!-- Form -->
                        <div class="mb-4">
                            <label class="form-label">Minimum Stay</label>

                            <input required type="number" class="form-control" name="minimum_stay">
                        </div>
                        <!-- End Form -->
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-1 my-auto">
                        <button type="button" data-repeater-delete class="btn btn-danger btn-icon">
                            <i class="bi-trash"></i>
                        </button>
                    </div>

                    <span class="divider-start"></span>
                </div>
                <!-- End Row -->
            </div>
            @endforelse
        </div>

        <a data-repeater-create href="javascript:;" class="form-link">
            <i class="bi-plus"></i> Add another option
        </a>

        <div class="d-flex justify-content-start mt-4">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

    </form>
</div>
<!-- Body -->
