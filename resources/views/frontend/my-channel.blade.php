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
                            Shores Condo</span></h4>
                    <h1 class="page-header-title">My Channels</h1>
                </div>
                <!-- End Col -->
                <div class="col-sm-auto">
                    <a class="btn btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                        <i class="bi-person-plus-fill me-1"></i>SET UP CHANNEL
                    </a>

                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>

        @if ($errors->all())

        @foreach ($errors->all() as  $error)
        <span style="color: red !important"> {{ $error }}</span>
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
                                    placeholder="Search Channel" aria-label="Search Channel">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>
                </div>

                <div class="col-auto">
                  <!-- Dropdown -->

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
                  <th>Distribution Channel</th>
                  <th></th>
                  <th></th>
                  <th>Status</th>


                </tr>
                </thead>

                <tbody>

             @foreach ( $get_mychannel as $list)
                <tr>
                   <td>
                    <a class="d-flex align-items-center" href="">

                      <div class="ms-1">
                        <span class="d-block h5 text-inherit mb-0">{{ $list->c_name }}</span>

                      </div>
                    </a>
                  </td>
                  <td>
                    <div class="avatar avatar-circle">
                        <img class="avatar-img" src="{{ $list->c_logo ? asset('/images/channel_icon' . $list->c_logo) : asset('/images/channel_icon') }}" alt="Image Description">
                      </div>
                    {{-- <span class="d-block h5 mb-0"></span> --}}

                  </td>

                  <td>
                    @if($list->live == 'live')
                    <span class="badge bg-success rounded-pill">Live</span>
                    @else
                    <span class="badge bg-danger rounded-pill">Offline</span>
                    @endif
                  </td>

                    <td>@if($list->live == 'active')
                        <span class="badge bg-soft-success text-success">Active</span>
                        @else
                        <span class="badge bg-soft-danger text-danger">Inactive</span>
                        @endif
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


    </div>

    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Set Up Channel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add-my-channel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <select class="js-select form-select" name="c_name" placeholder="Rooms"
                                autocomplete="off"
                                data-hs-tom-select-options='{
                        "searchInDropdown": false,
                        "hideSearch": true,
                        "dropdownWidth": "8rem"
                        "dropdownHeight": "12rem"
                      }'>
                      <option value="" required disabled selected hidden>Channel</option>
                                @foreach ( $channel as $old_channel)
                                <option value="{{ $old_channel->c_name }}" required>{{ $old_channel->c_name }}</option>
                                @endforeach



                            </select>
                        </div>
                        <div class="mb-4">
                            <input type="text" name="h_id" id="exampleFormControlInput1" class="form-control"
                                placeholder="HOTELID">
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm-vertical">
                                <div class="col-sm mb-2 mb-sm-0">
                                    <!-- Form Radio -->
                                    <label class="form-control" for="formControlRadioEg1">
                                      <span class="form-check">
                                        <input value="ON" name="close_room" type="radio" class="form-check-input"  id="formControlRadioEg1" >
                                        <span class="form-check-label">AUTOCLOSEROOMS</span>
                                      </span>
                                    </label>
                                    <!-- End Form Radio -->
                                  </div>
                                <input name="time" class="form-control form-control-lg" type="time" placeholder="00:00" min="0" max="10">

                            </div>
                          </div>
                        &ensp;

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


</x-base-layout>
