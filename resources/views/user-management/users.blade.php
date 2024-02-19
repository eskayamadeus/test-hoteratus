<x-base-layout>

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Manage Users</h1>
                </div>
                <!-- End Col -->
                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        <i class="bi-bookmark-plus-fill me-1"></i>Add User
                    </a>
                </div>

                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>

        @if ($errors->all())
            @foreach ($errors->all() as $errors)
                <span class="mb-2" style="color: red !important"> {{ $errors }}</span>
            @endforeach
        @endif


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
                                        placeholder="Search User" aria-label="Search users">
                                </div>
                                <!-- End Search -->
                            </form>
                        </div>
                    </div>

                    <div class="col-auto">
                        <!-- Dropdown -->
                        <div class="dropdown me-2">
                            <button type="button" class="btn btn-white btn-sm dropdown-toggle" id="usersExportDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-download me-2"></i> Export
                            </button>

                            <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                                <span class="dropdown-header">Options</span>
                                <a id="export-copy" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="../assets/svg/illustrations/copy-icon.svg" alt="Image Description">
                                    Copy
                                </a>
                                <a id="export-print" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="../assets/svg/illustrations/print-icon.svg" alt="Image Description">
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
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($Users = [] as $tax)
                            <tr>
                                <td>
                                    {{--  <form action="{{ route('show-User-setup', $tax->id) }}" method="post">
                                        @csrf  --}}
                                    <a class="d-flex align-items-center"
                                        href="{{ route('show-User-setup', $tax->id) }}">
                                        <div class="ms-1">
                                            <span class="d-block h5 text-inherit mb-0">{{ $tax->User_name }}</span>
                                        </div>
                                    </a>
                                    {{--  </form>  --}}
                                </td>
                                <td>
                                    <span class="">{{ $tax->User_quantity }}</span>
                                </td>
                                <td>
                                    <span class="">{{ $tax->maximum_occupancy }}</span>
                                </td>
                                <td>
                                    <span class="">{{ $tax->number_of_bathUsers }}</span>
                                </td>

                                <td>
                                    @if ($tax->status == 'active')
                                        <span class="legend-indicator bg-success"></span>Active
                                    @else
                                        <span class="legend-indicator bg-danger"></span>InActive
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <div class="m-2 alert alert-soft-warning" role="alert">
                                    No Users Available
                                </div>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
            <!-- End Table -->
        </div>


        <!-- End Footer -->
    </div>
    <!-- End Card -->
    </div>
    <!-- End Content -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Setup User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    
                    <form action="{{ route('add-user') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="active">
                        <div class="mb-4">
                            <label for="">User Name</label>
                            <input name="User_name" type="text" id="exampleFormControlInput1"
                                class="form-control" value="{{ old('User_name') }}" placeholder="User Name">
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <label for="">User Quantity</label>
                                <input name="User_quantity" type="number" id="exampleFormControlInput1"
                                    class="form-control" placeholder="User Quantity"
                                    value="{{ old('User_quantity') }}">
                            </div>

                            <div class="col-sm-6">
                                <label for="">Maximum Occupancy</label>
                                <input name="maximum_occupancy" type="number" id="exampleFormControlInput1"
                                    class="form-control" placeholder="Maximum Occupancy"
                                    value="{{ old('maximum_occupancy') }}">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <label for="">Adult Capacity</label>
                                <input name="adult_capacity" type="number" id="exampleFormControlInput1"
                                    class="form-control" placeholder="Adults Capacity"
                                    value="{{ old('adult_capacity') }}">
                            </div>

                            <div class="col-sm-4">
                                <label for="">Children Capacity</label>
                                <input name="children_capacity" type="number" id="exampleFormControlInput1"
                                    class="form-control" placeholder="Children Capacity"
                                    value="{{ old('children_capacity') }}">
                            </div>

                            <div class="col-sm-4">
                                <label for="">Selling Period</label>
                                <select class="form-select" name="selling_period" id="">
                                    <option value="" selected>Select Selling Period</option>
                                    <option value="daily" {{ old('selling_period') == 'daily' ? 'selected' : '' }}>
                                        Daily</option>
                                    <option value="wekly" {{ old('selling_period') == 'weekly' ? 'selected' : '' }}>
                                        Weekly</option>
                                    <option value="monthly"
                                        {{ old('selling_period') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <label for="">Number of BathUsers</label>
                                <input name="number_of_bathUsers" type="number" id="exampleFormControlInput1"
                                    class="form-control" placeholder="Number of BathUsers"
                                    value="{{ old('number_of_bathUsers') }}">
                            </div>

                            <div class="col-sm-6">
                                <label for="">User Size (Meter square)</label>
                                <input name="User_size" type="number" id="exampleFormControlInput1"
                                    class="form-control" placeholder="Square Meter Area of User"
                                    value="{{ old('User_size') }}">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="">Description</label>
                            <textarea name="description" id="exampleFormControlTextarea1" class="form-control" placeholder="Description"
                                rows="4">{{ old('description') }}</textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="js/buttons.flash.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/buttons.html5.min.js"></script>
    <script src="js/buttons.print.min.js"></script>
    <script src="js/buttons.colVis.min.js"></script>

    <script>
        function() {
            // INITIALIZATION OF DATATABLES
            // =======================================================
            HSCore.components.HSDatatables.init('.js-datatable')
            const exportDatatable = HSCore.components.HSDatatables.getItem('exportDatatable')

            document.getElementById('export-copy').addEventListener('click', function() {
                exportDatatable.button('.buttons-copy').trigger()
            })

            document.getElementById('export-excel').addEventListener('click', function() {
                exportDatatable.button('.buttons-excel').trigger()
            })

            document.getElementById('export-csv').addEventListener('click', function() {
                exportDatatable.button('.buttons-csv').trigger()
            })

            document.getElementById('export-pdf').addEventListener('click', function() {
                exportDatatable.button('.buttons-pdf').trigger()
            })

            document.getElementById('export-print').addEventListener('click', function() {
                exportDatatable.button('.buttons-print').trigger()
            })
        });
    </script>

</x-base-layout>
