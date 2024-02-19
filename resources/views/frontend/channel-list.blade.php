<x-base-layout>


    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            {{-- <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Overview</li> --}}
                        </ol>
                    </nav>
                    <h4 class="page-header-title">Welcome <span
                            style="color: rgb(45, 202, 150)">{{ Auth::user()->firstname }}
                            {{ Auth::user()->lastname }}</span></h4>
                    
                    <h1 class="page-header-title">All Channels</h1>
                </div>
                <!-- End Col -->
                <div class="col-sm-auto">
                    <a class="btn btn-secondary" href="#" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop2">
                        <i class="bi-person-plus-fill me-1"></i>ADD CHANNEL
                    </a>

                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>

        @if ($errors->all())

            @foreach ($errors->all() as $error)
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
                                        placeholder="Search tax" aria-label="Search users">
                                </div>
                                <input id="datatableSearch" type="search" class="form-control"
                                    placeholder="Search Channel" aria-label="Search Channel">
                            </div>
                            <!-- End Search -->
                        </form>
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
                        <th>Distribution Channel</th>
                        <th>Channel Logo</th>
                        <th>Live/Offline</th>
                        <th>Status</th>


                    </tr>
                </thead>

                <tbody>

                    @foreach ($get_channel as $list)
                        <tr>
                            <td>
                                <a class="d-flex align-items-center" href="">

                                    <div class="ms-1">
                                        <span class="d-block h5 text-inherit mb-0">{{ $list->c_name }}</span>

                                    </div>
                                </a>
                            </td>
                            <td>
                                <span
                                    class="d-block h5 mb-0">{{ $list->c_logo ? asset('assets/images/channel_icon' . $list->c_logo) : asset('/assets/images/') }}</span>

                            </td>

                            <td>
                                @if ($list->live == 'live')
                                    <span class="badge bg-success rounded-pill">Live</span>
                                @else
                                    <span class="badge bg-danger rounded-pill">Offline</span>
                                @endif
                            </td>

                            <td>

                                @if ($list->live == 'active')
                                    <span class="badge bg-soft-success text-success">Active</span>
                                @else
                                    <span class="badge bg-soft-danger text-danger">InActive</span>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Add Travel Agency</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add-channel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <input type="text" name="c_name" id="exampleFormControlInput1" class="form-control"
                                placeholder="Channel Name">
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                                        <img id="image-preview" class="avatar-img" src="../assets/img/160x160/img1.jpg"
                                            alt="Image Description" required>
                                    </label>
                                    {{--  <form>  --}}
                                    <div class="d-flex gap-3 ms-4">
                                        <div class="form-attachment-btn btn btn-sm btn-primary">Upload photo
                                            <input type="file" name="c_logo" class="js-file-attach form-attachment-btn-label"
                                                id="avatarUploader"
                                                onchange="updatePreview(this, 'image-preview')"
                                                data-hs-file-attach-options='{
                                                        "textTarget": "#avatarImg",
                                                        "mode": "image",
                                                        "targetAttr": "src",
                                                        "resetTarget": ".js-file-attach-reset-img",
                                                        "resetImg": "../assets/img/160x160/img1.jpg",
                                                        "allowTypes": [".png", ".jpeg", ".jpg"]
                                                        }'>
                                            @if ($errors->has('c_logo'))
                                                @foreach ($errors->get('c_logo') as $hotel_icon_error)
                                                    <span id="error-message">{{ $hotel_icon_error }}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                        <!-- End Avatar -->


                                    </div>
                                    {{--  </form>  --}}

                                </div>
                                <!-- End Media -->
                                <div class="mb-4">
                                    <select class="js-select form-select" name="live" placeholder="Rooms"
                                        autocomplete="off"
                                        data-hs-tom-select-options='{
                                "searchInDropdown": false,
                                "hideSearch": true,
                                "dropdownWidth": "8rem"
                                "dropdownHeight": "12rem"
                              }'>
                                        <option value="" required disabled selected hidden>Live/Offline</option>
                                        <option value="live" required>Live</option>
                                        <option value="offline" required>Offline</option>

                                    </select>
                                </div>

                                <div class="input-group input-group-sm-vertical">

                                    <select class="js-select form-select" name="status" placeholder="Rooms"
                                        autocomplete="off"
                                        data-hs-tom-select-options='{
                              "searchInDropdown": false,
                              "hideSearch": true,
                              "dropdownWidth": "8rem"
                            }'>
                                        <option value="" disabled selected hidden>Status</option>
                                        <option value="active">Active</option>
                                        <option value="Percentage">Inactive</option>


                                    </select>



                                </div>


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
