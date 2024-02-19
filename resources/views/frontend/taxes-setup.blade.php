<x-base-layout>


    <!-- Content -->
    <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-end">
          <div class="col-sm mb-2 mb-sm-0">

            <h4 class="page-header-title"> Welcome <span style="color: rgb(45, 202, 150)">{{ Auth::user()->firstname   }} {{ Auth::user()->lastname }}</span></h4>
            <hr>
            {{--  <h4 class="page-header-title">Active Property: <span style="color: rgb(38, 184, 135)">New Jersey Shores Condo</span></h4>  --}}
            <h1 class="page-header-title">Taxes</h1>
          </div>
          <!-- End Col -->
          <div class="col-sm-auto">
            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                <i class="bi-bookmark-plus-fill me-1"></i>Add Tax
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
              <th>Name</th>
              <th>Rate</th>
              <th>Include</th>
              <th>Status</th>
            </tr>
            </thead>

            <tbody>

         @foreach ( $get_all_tax as $tax)
            <tr>
               <td>
                <a class="d-flex align-items-center" href="">

                  <div class="ms-1">
                    <span class="d-block h5 text-inherit mb-0">{{ $tax->tname }}</span>

                  </div>
                </a>
              </td>
              <td>
                <span class="d-block h5 mb-0">{{ $tax->rate }}</span>

              </td>
              <td>{{ $tax->include }}</td>
              <td>
                <span class="legend-indicator bg-success"></span>Active
              </td>

            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- End Table -->
      </div>
      {{-- <div class="card">
        <div class="card-body">


        </div>
      </div> --}}

        <!-- End Footer -->
      </div>
      <!-- End Card -->
    </div>
    <!-- End Content -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Setup Tax</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add-tax') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input name="tname" type="text" id="exampleFormControlInput1" class="form-control" placeholder="Tax Name">
                          </div>
                          <div class="col-sm-12">
                            <div class="input-group input-group-sm-vertical">
                                <input name="rate" class="form-control form-control-lg" type="number" placeholder="Tax Rate %" min="0" max="10">
                                <div class="col-sm mb-2 mb-sm-0">
                                    <!-- Form Radio -->
                                    <label class="form-control" for="formControlRadioEg1">
                                      <span class="form-check">
                                        <input value="YES" name="include" type="radio" class="form-check-input" name="formControlRadioEg" id="formControlRadioEg1" >
                                        <span class="form-check-label">Include</span>
                                      </span>
                                    </label>
                                    <!-- End Form Radio -->
                                  </div>
                            </div>
                          </div>
                          <div class="mb-4">
                            <textarea name="description" id="exampleFormControlTextarea1" class="form-control" placeholder="Description" rows="4"></textarea>
                          </div>
                          <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                          </div>
                      </form>
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
      (function () {
        // INITIALIZATION OF DATATABLES
        // =======================================================
        HSCore.components.HSDatatables.init('.js-datatable')
        const exportDatatable = HSCore.components.HSDatatables.getItem('exportDatatable')

        document.getElementById('export-copy').addEventListener('click', function () {
          exportDatatable.button('.buttons-copy').trigger()
        })

        document.getElementById('export-excel').addEventListener('click', function () {
          exportDatatable.button('.buttons-excel').trigger()
        })

        document.getElementById('export-csv').addEventListener('click', function () {
          exportDatatable.button('.buttons-csv').trigger()
        })

        document.getElementById('export-pdf').addEventListener('click', function () {
          exportDatatable.button('.buttons-pdf').trigger()
        })

        document.getElementById('export-print').addEventListener('click', function () {
          exportDatatable.button('.buttons-print').trigger()
        })
      })()
    </script>


</x-base-layout>
