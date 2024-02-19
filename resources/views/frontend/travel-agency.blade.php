<x-base-layout>


    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">

                    <h4 class="page-header-title">Welcome <span
                            style="color: rgb(45, 202, 150)">{{ Auth::user()->firstname }}
                            {{ Auth::user()->lastname }}</span></h4>
                            <hr>
                    {{--  <h4 class="page-header-title">Active Property: <span style="color: rgb(38, 184, 135)">New Jersey  --}}
                            {{--  Shores Condo</span></h4>  --}}
                    <h1 class="page-header-title">Travel Agency</h1>
                </div>
                <!-- End Col -->
                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                        <i class="bi-person-plus-fill me-1"></i>ADD TRAVEL AGENCY
                    </a>
                    <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="bi-person-plus-fill me-1"></i>ADD CATEGORY
                    </a>
                    <a class="btn btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        <i class="bi-person-plus-fill me-1"></i>ADD SUBCATEGORY
                    </a>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
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
                    <button type="button" class="btn btn-white btn-sm dropdown-toggle" id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi-download me-2"></i> Export
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                      <span class="dropdown-header">Options</span>
                      <a id="export-copy" class="dropdown-item" href="javascript:;">
                        <img class="avatar avatar-xss avatar-4x3 me-2" src="../assets/svg/illustrations/copy-icon.svg" alt="Image Description">
                        Copy
                      </a>
                      <a id="export-print" class="dropdown-item" href="javascript:;">
                        <img class="avatar avatar-xss avatar-4x3 me-2" src="../assets/svg/illustrations/print-icon.svg" alt="Image Description">
                        Print
                      </a>
                      <div class="dropdown-divider"></div>
                      <span class="dropdown-header">Download options</span>
                      <a id="export-excel" class="dropdown-item" href="javascript:;">
                        <img class="avatar avatar-xss avatar-4x3 me-2" src="../assets/svg/brands/excel-icon.svg" alt="Image Description">
                        Excel
                      </a>
                      <a id="export-csv" class="dropdown-item" href="javascript:;">
                        <img class="avatar avatar-xss avatar-4x3 me-2" src="../assets/svg/components/placeholder-csv-format.svg" alt="Image Description">
                        .CSV
                      </a>
                      <a id="export-pdf" class="dropdown-item" href="javascript:;">
                        <img class="avatar avatar-xss avatar-4x3 me-2" src="../assets/svg/brands/pdf-icon.svg" alt="Image Description">
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
              <table id="exportDatatable" class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
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
                  <th>Travel Agency</th>
                  <th>Categories</th>
                  <th>Sub Categories</th>
                  <th>Distribution Channel</th>
                  <th>Commission</th>
                  <th>Value</th>
                  <th>Description</th>

                </tr>
                </thead>

                <tbody>
                    {{-- @foreach ($get_all_travel_agency as $agency)
                    <option value="{{ $agency->category_name }}">{{ $agency->category_name }}
                    </option>
                @endforeach --}}
             @foreach ( $get_all_agency as $agent)
                <tr>
                   <td>
                    <a class="d-flex align-items-center" href="">

                      <div class="ms-1">
                        <span class="d-block h5 text-inherit mb-0">{{ $agent->tname }}</span>

                      </div>
                    </a>
                  </td>
                  <td>
                    <span class="d-block h5 mb-0">{{ $agent->categories }}</span>

                  </td>
                  <td>{{ $agent->subcategories }}</td>
                  <td>
                    {{ $agent->dchannel }}
                  </td>
                  <td>
                    {{ $agent->commission }}
                  </td>
                  <td>
                    {{ $agent->value }}
                  </td>
                  <td>
                    {{ $agent->description }}
                  </td>

                </tr>
                @endforeach
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

    <!--Add Category -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add-category') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input type="text" id="exampleFormControlInput1" name="category_name"
                                class="form-control" placeholder="Category Name" required>
                        </div>
                        &ensp;
                        <div class="mb-4">
                            <textarea id="exampleFormControlTextarea1" class="form-control" name="description" placeholder="Description"
                                rows="4" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--Add SubCategory -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Subcategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add-subcategory') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input type="text" id="exampleFormControlInput1" class="form-control"
                                name="subcategory_name" placeholder="Subcategory Name" required>
                        </div>
                        &ensp;
                        <div class="mb-4">
                            <textarea id="exampleFormControlTextarea1" class="form-control" name="description" placeholder="Description"
                                rows="4" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Travel Agency</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create-agency') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input type="text" name="tname" id="exampleFormControlInput1" class="form-control"
                                placeholder="Travel Agency Name">
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <div class="input-group input-group-sm-vertical">

                                    <select class="js-select form-select" name="categories" placeholder="Rooms"
                                        autocomplete="off"
                                        data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true,
                            "dropdownWidth": "8rem"
                          }'>
                                        <option value="1" disabled selected hidden>Categories</option>
                                        @foreach ($get_all_travel_agency as $agency)
                                            <option value="{{ $agency->category_name }}">{{ $agency->category_name }}
                                            </option>
                                        @endforeach

                                    </select>

                                    <select class="js-select form-select" name="subcategories" autocomplete="off"
                                        data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true,
                            "dropdownWidth": "8rem"
                            "dropdownHeight": "12rem"
                          }'>
                                        <option value="" required disabled selected hidden>Subcategories</option>
                                        @foreach ($get_all_subcategory as $sub_category)
                                            <option value="{{ $sub_category->subcategory_name }}">
                                                {{ $sub_category->subcategory_name }}</option>
                                        @endforeach



                                    </select>



                                </div>
                                &ensp;
                                <div class="mb-4">
                                    <select class="js-select form-select" name="dchannel" placeholder="Rooms"
                                        autocomplete="off"
                                        data-hs-tom-select-options='{
                                "searchInDropdown": false,
                                "hideSearch": true,
                                "dropdownWidth": "8rem"
                                "dropdownHeight": "12rem"
                              }'>
                                        <option value="" required disabled selected hidden>Distribution Channel
                                        </option>
                                        <option value="Expedia" required>Expedia</option>
                                        <option value="Agoda" required>Agoda</option>
                                        <option value="Booking.com" required>Booking.com</option>
                                        <option value="Airbnb" required>Airbnb</option>

                                    </select>
                                </div>

                                <div class="input-group input-group-sm-vertical">

                                    <select class="js-select form-select" name="commission" placeholder="Rooms"
                                        autocomplete="off"
                                        data-hs-tom-select-options='{
                              "searchInDropdown": false,
                              "hideSearch": true,
                              "dropdownWidth": "8rem"
                            }'>
                                        <option value="" disabled selected hidden>Commission</option>
                                        <option value="Fixed">Fixed</option>
                                        <option value="Percentage">Percentage</option>
                                        <option value="Net Rate">Net Rate</option>

                                    </select>

                                    <input type="number" name="value" id="exampleFormControlInput1" class="form-control"
                                        placeholder="Value">

                                </div>


                            </div>
                        </div>
                        &ensp;
                        <div class="mb-4">
                            <textarea id="exampleFormControlTextarea1" name="description" class="form-control" placeholder="Description"
                                rows="4"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


</x-base-layout>
