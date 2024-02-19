<x-base-layout>
    {{--  <!-- Content -->  --}}
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Show Setup</h1>
                    <a href="{{ route('room-setup') }}">
                        <span class="badge bg-dark rounded-pill"><i class="bi-chevron-left me-1"></i> Back</span>
                    </a>
                </div>
                <!-- Nav -->
                <div class="mt-2 mb-1">

                    <ul class="nav nav-segment nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="show-room-setup-tab" href="#show-room-setup"
                                data-bs-toggle="pill" data-bs-target="#show-room-setup" role="tab"
                                aria-controls="show-room-setup" aria-selected="true">Basic Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="room-number-tab" href="#room-number" data-bs-toggle="pill"
                                data-bs-target="#room-number" role="tab" aria-controls="room-number"
                                aria-selected="false">Room Numbers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="amenities-tab" href="#amenities" data-bs-toggle="pill"
                                data-bs-target="#amenities" role="tab" aria-controls="amenities"
                                aria-selected="false">Amenities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="room-configuration-tab" href="#room-configuration"
                                data-bs-toggle="pill" data-bs-target="#room-configuration" role="tab"
                                aria-controls="room-configuration" aria-selected="false">Rate Configuration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="photo-extras-tab" href="#photo-extras" data-bs-toggle="pill"
                                data-bs-target="#photo-extras" role="tab" aria-controls="photo-extras"
                                aria-selected="false">Photos & Extras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="revenue-configuration-tab" href="#revenue-configuration"
                                data-bs-toggle="pill" data-bs-target="#revenue-configuration" role="tab"
                                aria-controls="revenue-configuration" aria-selected="false">Revenue Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="auto-closing-room-tab" href="#auto-closing-room"
                                data-bs-toggle="pill" data-bs-target="#auto-closing-room" role="tab"
                                aria-controls="auto-closing-room" aria-selected="false">Auto Closing Room</a>
                        </li>
                    </ul>

                </div>
                <!-- End Nav -->
            </div>
            <!-- End Row -->
        </div>

        @if ($errors->all())
            @foreach ($errors->all() as $errors)
                <span class="mb-2" style="color: red !important"> {{ $errors }}</span>
            @endforeach
        @endif

        <!-- Basic info Tab View  -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="show-room-setup" role="tabpanel"
                aria-labelledby="show-room-setup">
                <div class="card">
                    <div class="card-body">


                        <form action="{{ route('store-room-setup') }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="active">
                            <div class="mb-4">
                                <label for="">Room Code</label>
                                <input name="room_name" type="text" id="exampleFormControlInput1"
                                    class="form-control" value="{{ $get_room_data->room_name }}"
                                    placeholder="Room Name">
                                @if ($errors->has('room_name'))
                                    @foreach ($errors->get('room_name') as $description_error)
                                        <span id="error-message">{{ $description_error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="">Room Name</label>
                                <input name="room_name" type="text" id="exampleFormControlInput1"
                                    class="form-control" value="{{ $get_room_data->room_name }}"
                                    placeholder="Room Name">
                                @if ($errors->has('room_name'))
                                    @foreach ($errors->get('room_name') as $description_error)
                                        <span id="error-message">{{ $description_error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label for="">Room Quantity</label>
                                    <input name="room_quantity" type="number" id="exampleFormControlInput1"
                                        class="form-control" placeholder="Room Quantity"
                                        value="{{ $get_room_data->room_quantity }}">
                                    @if ($errors->has('room_quantity'))
                                        @foreach ($errors->get('room_quantity') as $description_error)
                                            <span id="error-message">{{ $description_error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Maximum Occupancy</label>
                                    <input name="maximum_occupancy" type="number" id="exampleFormControlInput1"
                                        class="form-control" placeholder="Maximum Occupancy"
                                        value="{{ $get_room_data->maximum_occupancy }}">
                                    @if ($errors->has('maximum_occupancy'))
                                        @foreach ($errors->get('maximum_occupancy') as $description_error)
                                            <span id="error-message">{{ $description_error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="">Adult Capacity</label>
                                    <input name="adult_capacity" type="number" id="exampleFormControlInput1"
                                        class="form-control" placeholder="Adults Capacity"
                                        value="{{ $get_room_data->adult_capacity }}">
                                    @if ($errors->has('adult_capacity'))
                                        @foreach ($errors->get('adult_capacity') as $description_error)
                                            <span id="error-message">{{ $description_error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Childrend Capacity</label>
                                    <input name="children_capacity" type="number" id="exampleFormControlInput1"
                                        class="form-control" placeholder="Children Capacity"
                                        value="{{ $get_room_data->children_capacity }}">
                                    @if ($errors->has('children_capacity'))
                                        @foreach ($errors->get('children_capacity') as $description_error)
                                            <span id="error-message">{{ $description_error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Selling Period</label>
                                    <select class="form-select" name="selling_period" id="">
                                        <option selected>Select Selling Period</option>
                                        <option value="daily"
                                            {{ $get_room_data->selling_period == 'daily' ? 'selected' : '' }}>Dialy
                                        </option>
                                        <option value="wekly"
                                            {{ $get_room_data->selling_period == 'weekly' ? 'selected' : '' }}>Weekly
                                        </option>
                                        <option value="monthly"
                                            {{ $get_room_data->selling_period == 'monthly' ? 'selected' : '' }}>Monthly
                                        </option>
                                    </select>
                                    @if ($errors->has('selling_period'))
                                        @foreach ($errors->get('selling_period') as $description_error)
                                            <span id="error-message">{{ $description_error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label for="">Number of Bathrooms</label>
                                    <input name="number_of_bathrooms" type="number" id="exampleFormControlInput1"
                                        class="form-control" placeholder="Number of Bathrooms"
                                        value="{{ $get_room_data->number_of_bathrooms }}">
                                    @if ($errors->has('number_of_bathrooms'))
                                        @foreach ($errors->get('number_of_bathrooms') as $description_error)
                                            <span id="error-message">{{ $description_error }}</span>
                                        @endforeach
                                    @endif

                                </div>

                                <div class="col-sm-6">
                                    <label for="">Room Size (Meter square)</label>
                                    <input name="room_size" type="number" id="exampleFormControlInput1"
                                        class="form-control" placeholder="Square Meter Area of Room"
                                        value="{{ $get_room_data->room_size }}">
                                    @if ($errors->has('room_size'))
                                        @foreach ($errors->get('room_size') as $description_error)
                                            <span id="error-message">{{ $description_error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="">Description</label>
                                <textarea name="description" id="exampleFormControlTextarea1" class="form-control" placeholder="Description"
                                    rows="4">{{ $get_room_data->description }}</textarea>
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $description_error)
                                        <span id="error-message">{{ $description_error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">Save</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
        <!-- End Basic info Tab View  -->

        <!-- Room Numbers Tab View  -->
        <div class="tab-content">
            <div class="tab-pane fade show" id="room-number" role="tabpanel" aria-labelledby="room-number">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-md">
                                <div class="col-md-4">
                                    <form>
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend input-group-text">
                                                <i class="bi-search"></i>
                                            </div>
                                            <input id="datatableSearch" type="search" class="form-control"
                                                placeholder="Search tax" aria-label="Search users">
                                        </div>
                                        <!-- End Search -->
                                    </form>
                                </div>
                            </div>

                            <div class="col-auto">
                                <!-- Dropdown -->
                                <div class="dropdown me-2">
                                    <button type="button" class="btn btn-white btn-sm dropdown-toggle"
                                        id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi-download me-2"></i> Export
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-sm-end"
                                        aria-labelledby="usersExportDropdown">
                                        <span class="dropdown-header">Options</span>
                                        <a id="export-copy" class="dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2"
                                                src="../assets/svg/illustrations/copy-icon.svg"
                                                alt="Image Description">
                                            Copy
                                        </a>
                                        <a id="export-print" class="dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2"
                                                src="../assets/svg/illustrations/print-icon.svg"
                                                alt="Image Description">
                                            Print
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <span class="dropdown-header">Download options</span>
                                        <a id="export-excel" class="dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2"
                                                src="../assets/svg/brands/excel-icon.svg" alt="Image Description">
                                            Excel
                                        </a>
                                        <a id="export-csv" class="dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2"
                                                src="../assets/svg/components/placeholder-csv-format.svg"
                                                alt="Image Description">
                                            .CSV
                                        </a>
                                        <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2"
                                                src="../assets/svg/brands/pdf-icon.svg" alt="Image Description">
                                            PDF
                                        </a>
                                    </div>
                                </div>
                                <!-- End Dropdown -->
                            </div>

                        </div>
                    </div>



                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table id="exportDatatable"
                            class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                            data-hs-datatables-options='{
                          "dom": "Bfrtip",
                          "buttons": [
                            {
                              "extend": "copy",
                              "className": "d-none"
                            },
                            {
                              "extend": "excel",
                              "className": "d-none"
                            },
                            {
                              "extend": "csv",
                              "className": "d-none"
                            },
                            {
                              "extend": "pdf",
                              "className": "d-none"
                            },
                            {
                              "extend": "print",
                              "className": "d-none"
                            }
                         ],
                         "order": []
                       }'>
                            <thead class="thead-light">
                                <tr>
                                    <th>Room Number</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>


                                <tr>
                                    <td>
                                        <a class="d-flex align-items-center" href="{{ redirect()->back() }}">
                                            <div class="ms-1">
                                                <span class="d-block h5 text-inherit mb-0">1</span>
                                            </div>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="legend-indicator bg-success"></span>Active
                                        {{--  <span class="legend-indicator bg-danger"></span>InActive  --}}
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                </div>
            </div>
        </div>
        <!-- End Room Numbers Tab View  -->

        <!-- Amenities Tab View  -->

        <div class="tab-content">
            <div class="tab-pane fade show" id="amenities" role="tabpanel" aria-labelledby="amenities">

                <!-- Nav -->
                <div class="mb-1">

                    <ul class="nav nav-segment nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-options-tab" href="#general-options"
                                data-bs-toggle="pill" data-bs-target="#general-options" role="tab"
                                aria-controls="general-options" aria-selected="true">General Options</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="bed-types-tab" href="#bed-types" data-bs-toggle="pill"
                                data-bs-target="#bed-types" role="tab" aria-controls="bed-types"
                                aria-selected="false">Bed Types</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="room-composition-tab" href="#room-composition"
                                data-bs-toggle="pill" data-bs-target="#room-composition" role="tab"
                                aria-controls="room-composition" aria-selected="false">Room Composition</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="room-view-tab" href="#room-view" data-bs-toggle="pill"
                                data-bs-target="#room-view" role="tab" aria-controls="room-view"
                                aria-selected="false">Room View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="air-conditioning-tab" href="#air-conditioning"
                                data-bs-toggle="pill" data-bs-target="#air-conditioning" role="tab"
                                aria-controls="air-conditioning" aria-selected="false">Air Conditioning</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="domestic-appliances-tab" href="#domestic-appliances"
                                data-bs-toggle="pill" data-bs-target="#domestic-appliances" role="tab"
                                aria-controls="domestic-appliances" aria-selected="false">Domestic Appliances</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="electronics-tab" href="#electronics" data-bs-toggle="pill"
                                data-bs-target="#electronics" role="tab" aria-controls="electronics"
                                aria-selected="false">Electronics</a>
                        </li>
                    </ul>

                </div>
                <!-- End Nav -->

                <!-- General Options Tab View  -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="general-options" role="tabpanel"
                        aria-labelledby="general-options">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('add-room-amenity') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="amenity_type" value=1>
                                    <input type="hidden" name="room_id" value="{{ $get_room_data->id }}">

                                    <div id="grid2">
                                        @foreach ($general_options as $option)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" id="option_{{ $loop->index }}"
                                                    name="room_amenities[]" class="form-check-input border-check-box"
                                                    value="{{ $option }}"
                                                    {{ in_array($option, $active_general_options) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="option_{{ $loop->index }}">{{ $option }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button type="submit" class="btn btn-success btn-lg">Update General
                                            Options</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End General Options Tab View  -->


                <!-- Bed Types Tab View  -->
                <div class="tab-content">
                    <div class="tab-pane fade show" id="bed-types" role="tabpanel" aria-labelledby="bed-types">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('add-room-amenity') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="amenity_type" value=2>

                                    <div id="grid2">
                                        @foreach ($bed_types as $option)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" id="option_{{ $loop->index }}"
                                                    name="room_amenities[]" class="form-check-input border-check-box"
                                                    value="{{ $option }}"
                                                    {{ in_array($option, $active_bed_types) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="option_{{ $loop->index }}">{{ $option }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button type="submit" class="btn btn-success btn-lg">Update</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Bed Types Tab View  -->

                <!-- Room Composition Tab View  -->
                <div class="tab-content">
                    <div class="tab-pane fade show" id="room-composition" role="tabpanel"
                        aria-labelledby="room-composition">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('add-room-amenity') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="amenity_type" value=3>

                                    <div id="grid2">
                                        @foreach ($room_composition as $option)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" id="option_{{ $loop->index }}"
                                                    name="room_amenities[]" class="form-check-input border-check-box"
                                                    value="{{ $option }}"
                                                    {{ in_array($option, $active_room_compositions) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="option_{{ $loop->index }}">{{ $option }}</label>
                                            </div>
                                        @endforeach

                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button type="submit" class="btn btn-success btn-lg">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Room Composition Tab View  -->

                <!-- Room View Tab View  -->
                <div class="tab-content">
                    <div class="tab-pane fade show" id="room-view" role="tabpanel" aria-labelledby="room-view">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('add-room-amenity') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="amenity_type" value=4>

                                    <div id="grid2">
                                        @foreach ($room_view as $option)
                                             <div class="form-check mb-2">
                                                <input type="checkbox" id="option_{{ $loop->index }}"
                                                    name="room_amenities[]" class="form-check-input border-check-box"
                                                    value="{{ $option }}"
                                                    {{ in_array($option, $active_views) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="option_{{ $loop->index }}">{{ $option }}</label>
                                            </div>
                                        @endforeach

                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button type="submit" class="btn btn-success btn-lg">Update</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Room View Tab View  -->

                <!-- Air Conditioning Tab View  -->
                <div class="tab-content">
                    <div class="tab-pane fade show" id="air-conditioning" role="tabpanel"
                        aria-labelledby="air-conditioning">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('add-room-amenity') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="amenity_type" value=5>

                                    <div id="grid2">
                                        @foreach ($air_conditioning as $option)
                                             <div class="form-check mb-2">
                                                <input type="checkbox" id="option_{{ $loop->index }}"
                                                    name="room_amenities[]" class="form-check-input border-check-box"
                                                    value="{{ $option }}"
                                                    {{ in_array($option, $active_air_conditioning) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="option_{{ $loop->index }}">{{ $option }}</label>
                                            </div>
                                        @endforeach

                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button type="submit" class="btn btn-success btn-lg">Update</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Air Conditioning Tab View  -->

                <!-- Domestic Appliances Tab View  -->
                <div class="tab-content">
                    <div class="tab-pane fade show" id="domestic-appliances" role="tabpanel"
                        aria-labelledby="domestic-appliances">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('add-room-amenity') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="amenity_type" value=6>

                                    <div id="grid2">
                                        @foreach ($domestic_appliances as $option)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" id="option_{{ $loop->index }}"
                                                    name="room_amenities[]" class="form-check-input border-check-box"
                                                    value="{{ $option }}"
                                                    {{ in_array($option, $active_domestic_appliances) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="option_{{ $loop->index }}">{{ $option }}</label>
                                            </div>
                                        @endforeach

                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button type="submit" class="btn btn-success btn-lg">Update</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Domestic Appliances Tab View  -->


                <!-- Electronics Tab View  -->
                <div class="tab-content">
                    <div class="tab-pane fade show" id="electronics" role="tabpanel" aria-labelledby="electronics">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('add-room-amenity') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="amenity_type" value=7>

                                    <div id="grid2">
                                        @foreach ($electronics as $option)
                                             <div class="form-check mb-2">
                                                <input type="checkbox" id="option_{{ $loop->index }}"
                                                    name="room_amenities[]" class="form-check-input border-check-box"
                                                    value="{{ $option }}"
                                                    {{ in_array($option, $active_electronics) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="option_{{ $loop->index }}">{{ $option }}</label>
                                            </div>
                                        @endforeach

                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button type="submit" class="btn btn-success btn-lg">Update</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Electronics Tab View  -->




            </div>



            <!-- End Amenities Tab View  -->


        </div>

        <!-- End Amenities Tab View  -->

        <!-- Rate Configuration Tab View  -->

        <div class="tab-content">
            <div class="tab-pane fade show" id="room-configuration" role="tabpanel"
                aria-labelledby="room-configuration">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-md">
                                <div class="col-md-4">
                                    <form>
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend input-group-text">
                                                <i class="bi-search"></i>
                                            </div>
                                            <input id="datatableSearch" type="search" class="form-control"
                                                placeholder="Search tax" aria-label="Search users">
                                        </div>
                                        <!-- End Search -->
                                    </form>
                                </div>
                            </div>

                            <div class="col-auto">
                                <!-- Dropdown -->
                                <div class="dropdown me-2">
                                    <button type="button" class="btn btn-white btn-sm dropdown-toggle"
                                        id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi-download me-2"></i> Export
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-sm-end"
                                        aria-labelledby="usersExportDropdown">
                                        <span class="dropdown-header">Options</span>
                                        <a id="export-copy" class="dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2"
                                                src="../assets/svg/illustrations/copy-icon.svg"
                                                alt="Image Description">
                                            Copy
                                        </a>
                                        <a id="export-print" class="dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2"
                                                src="../assets/svg/illustrations/print-icon.svg"
                                                alt="Image Description">
                                            Print
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <span class="dropdown-header">Download options</span>
                                        <a id="export-excel" class="dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2"
                                                src="../assets/svg/brands/excel-icon.svg" alt="Image Description">
                                            Excel
                                        </a>
                                        <a id="export-csv" class="dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2"
                                                src="../assets/svg/components/placeholder-csv-format.svg"
                                                alt="Image Description">
                                            .CSV
                                        </a>
                                        <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2"
                                                src="../assets/svg/brands/pdf-icon.svg" alt="Image Description">
                                            PDF
                                        </a>
                                    </div>
                                </div>
                                <!-- End Dropdown -->
                            </div>

                        </div>
                    </div>



                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table id="exportDatatable"
                            class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                            data-hs-datatables-options='{
                          "dom": "Bfrtip",
                          "buttons": [
                            {
                              "extend": "copy",
                              "className": "d-none"
                            },
                            {
                              "extend": "excel",
                              "className": "d-none"
                            },
                            {
                              "extend": "csv",
                              "className": "d-none"
                            },
                            {
                              "extend": "pdf",
                              "className": "d-none"
                            },
                            {
                              "extend": "print",
                              "className": "d-none"
                            }
                         ],
                         "order": []
                       }'>
                            <thead class="thead-light">
                                <tr>
                                    <th>Rate Type Name</th>
                                    <th>Adult Capacity</th>
                                    <th>Children Capacity</th>
                                    <th>Revenue Management</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>


                                <tr>
                                    <td>
                                        <a class="d-flex align-items-center" href="{{ redirect()->back() }}">
                                            <div class="ms-1">
                                                <span class="d-block h5 text-inherit mb-0">Standard Rate</span>
                                            </div>
                                        </a>
                                    </td>

                                    <td>
                                        <div class="ms-1">
                                            <span class="">3</span>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="ms-1">
                                            <span class="">1</span>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="ms-1">
                                            <span class="">Disabled</span>
                                        </div>
                                    </td>


                                    <td>
                                        <span class="legend-indicator bg-success"></span>Active
                                        {{--  <span class="legend-indicator bg-danger"></span>InActive  --}}
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                </div>
            </div>
        </div>

        <!-- End Rate Configuration Tab View  -->


        <!-- Photos and Extras Tab View -->
        <div class="tab-content">
            <div class="tab-pane fade show" id="photo-extras" role="tabpanel" aria-labelledby="photo-extras">
                <div id="grid3">
                    <div class="card">
                        <img class="card-img card-img-top" src="{{ asset('assets/img/documentation/img7.jpg') }}"
                            alt="Card image cap">

                    </div>
                    <div class="card">
                        <img class="card-img card-img-top" src="{{ asset('assets/img/documentation/img7.jpg') }}"
                            alt="Card image cap">

                    </div>
                    <div class="card">
                        <img class="card-img card-img-top" src="{{ asset('assets/img/documentation/img7.jpg') }}"
                            alt="Card image cap">

                    </div>
                    <div class="card">
                        <img class="card-img card-img-top" src="{{ asset('assets/img/documentation/img7.jpg') }}"
                            alt="Card image cap">

                    </div>
                </div>
            </div>
        </div>
        <!-- End Photos and Extras Tab View -->


        <!-- Revenue Configuration Tab View  -->
        <div class="tab-content">
            <div class="tab-pane fade show" id="revenue-configuration" role="tabpanel"
                aria-labelledby="revenue-configuration">
                <div class="card">
                    <div class="card-body">


                        <form action="{{ route('store-room-setup') }}" method="POST">
                            @csrf
                            <div class="form-check form-switch mb-4">
                                <input type="checkbox" class="form-check-input" name="status" value="enable"
                                    id="formSwitch1">
                                <label class="form-check-label" for="formSwitch1">Status</label>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <input name="room_quantity" type="number" id="exampleFormControlInput1"
                                        class="form-control" placeholder="Percentage of Increase">
                                </div>

                                <div class="col-sm-4">
                                    <input name="room_quantity" type="number" id="exampleFormControlInput1"
                                        class="form-control" placeholder="Maximum Fee">
                                </div>

                                <div class="col-sm-4">
                                    <input name="room_quantity" type="number" id="exampleFormControlInput1"
                                        class="form-control" placeholder="Minimum Fee">
                                </div>
                            </div>


                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">Save</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
        <!-- EndRevenue Configuration Tab View  -->


        <!-- Auto Closing Room Tab View  -->
        <div class="tab-content">
            <div class="tab-pane fade show" id="auto-closing-room" role="tabpanel"
                aria-labelledby="auto-closing-room">
                <div class="card">
                    <div class="card-body">


                        <form action="{{ route('store-room-setup') }}" method="POST">
                            @csrf
                            <div class="d-flex gap-3">
                                <div class="form-check form-switch mb-4">
                                    <input type="checkbox" class="form-check-input" name="status" value="enable"
                                        id="formSwitch1">
                                    <label class="form-check-label" for="formSwitch1">Enabled</label>
                                </div>
                                <div class="form-check form-switch mb-4">
                                    <input type="checkbox" class="form-check-input" name="status" value="enable"
                                        id="formSwitch1">
                                    <label class="form-check-label" for="formSwitch1">Send Email</label>
                                </div>
                            </div>


                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <input name="room_quantity" type="number" id="exampleFormControlInput1"
                                        class="form-control" placeholder="Notice Days Before">
                                </div>

                                <div class="col-sm-6">
                                    <input name="room_quantity" type="time" id="exampleFormControlInput1"
                                        class="form-control" placeholder="Closing Time">
                                </div>

                            </div>


                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">Save</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
        <!-- End Auto Closing Room Tab View  -->



</x-base-layout>
