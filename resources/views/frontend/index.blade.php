<x-base-layout>

    {{--  Index Main Content  --}}

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="page-header-title">Welcome <span
                            style="color: rgb(45, 202, 150)">{{ Auth::user()->firstname }}
                            {{ Auth::user()->lastname }}</span></h4>
                            <hr>
                    {{--  <h4 class="page-header-title">Active Property: <span style="color: rgb(38, 184, 135)">New Jersey
                            Shores Condo</span></h4>  --}}
                    <h1 class="page-header-title">Dashboard</h1>

                </div>
                <!-- End Col -->

                <div class="col-auto">

                    <div class="date">
                        <span id="ct5">Day</span>
                        {{-- <span id="ct1">Month</span>
                            <span id="ct2">Year</span> --}}
                    </div>
                    <div class="time">
                        <span id="tt1">00</span>
                        <span id="tt2">00</span>

                        <span id="tt4">AM</span>
                    </div>

                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Stats -->
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">New Reservations</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">0</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="" style="height: 3rem;">
                                    <canvas class="js-chart"
                                        data-hs-chartjs-options='{
                              "type": "line",
                              "data": {
                                 "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                 "datasets": [{
                                  "data": [21,20,24,20,18,17,15,17,18,30,31,30,30,35,25,35,35,40,60,90,90,90,85,70,75,70,30,30,30,50,72],
                                  "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                  "borderColor": "#377dff",
                                  "borderWidth": 2,
                                  "pointRadius": 0,
                                  "pointHoverRadius": 0
                                }]
                              },
                              "options": {
                                 "scales": {
                                   "y": {
                                     "display": false
                                   },
                                   "x": {
                                     "display": false
                                   }
                                 },
                                "hover": {
                                  "mode": "nearest",
                                  "intersect": false
                                },
                                "plugins": {
                                  "tooltip": {
                                    "postfix": "k",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }
                            }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-success text-success">
                            <i class="bi-graph-up"></i> 0%
                        </span>
                        <span class="text-body fs-6 ms-1">from 0</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">New Cancellations</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">0</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                        data-hs-chartjs-options='{
                              "type": "line",
                              "data": {
                                 "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                 "datasets": [{
                                  "data": [21,20,24,20,18,17,15,17,30,30,35,25,18,30,31,35,35,90,90,90,85,100,120,120,120,100,90,75,75,75,90],
                                  "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                  "borderColor": "#377dff",
                                  "borderWidth": 2,
                                  "pointRadius": 0,
                                  "pointHoverRadius": 0
                                }]
                              },
                              "options": {
                                 "scales": {
                                   "y": {
                                     "display": false
                                   },
                                   "x": {
                                     "display": false
                                   }
                                 },
                                "hover": {
                                  "mode": "nearest",
                                  "intersect": false
                                },
                                "plugins": {
                                  "tooltip": {
                                    "postfix": "k",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }
                            }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-success text-success">
                            <i class="bi-graph-up"></i> 0%
                        </span>
                        <span class="text-body fs-6 ms-1">from 0</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Arrivals</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">0</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                        data-hs-chartjs-options='{
                              "type": "line",
                              "data": {
                                 "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                 "datasets": [{
                                  "data": [25,18,30,31,35,35,60,60,60,75,21,20,24,20,18,17,15,17,30,120,120,120,100,90,75,90,90,90,75,70,60],
                                  "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                  "borderColor": "#377dff",
                                  "borderWidth": 2,
                                  "pointRadius": 0,
                                  "pointHoverRadius": 0
                                }]
                              },
                              "options": {
                                 "scales": {
                                   "y": {
                                     "display": false
                                   },
                                   "x": {
                                     "display": false
                                   }
                                 },
                                "hover": {
                                  "mode": "nearest",
                                  "intersect": false
                                },
                                "plugins": {
                                  "tooltip": {
                                    "postfix": "k",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }
                            }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-danger text-danger">
                            <i class="bi-graph-down"></i> 0
                        </span>
                        <span class="text-body fs-6 ms-1">from 0</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Departures</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">0</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                        data-hs-chartjs-options='{
                              "type": "line",
                              "data": {
                                 "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                 "datasets": [{
                                  "data": [21,20,24,15,17,30,30,35,35,35,40,60,12,90,90,85,70,75,43,75,90,22,120,120,90,85,100,92,92,92,92],
                                  "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                  "borderColor": "#377dff",
                                  "borderWidth": 2,
                                  "pointRadius": 0,
                                  "pointHoverRadius": 0
                                }]
                              },
                              "options": {
                                 "scales": {
                                   "y": {
                                     "display": false
                                   },
                                   "x": {
                                     "display": false
                                   }
                                 },
                                "hover": {
                                  "mode": "nearest",
                                  "intersect": false
                                },
                                "plugins": {
                                  "tooltip": {
                                    "postfix": "k",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }
                            }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-secondary text-body">0</span>
                        <span class="text-body fs-6 ms-1">from 0</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Stats -->

        <div class="row">

            <!-- End Col -->

            <div class="col-lg-12 mb-3 mb-lg-5">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-sm-between">
                        <h4 class="card-header-title mb-2 mb-sm-0">Monthly expenses</h4>

                        <!-- Nav -->
                        <ul class="nav nav-segment nav-fill" id="expensesTab" role="tablist">
                            <li class="nav-item" data-bs-toggle="chart-bar" data-datasets="thisWeek"
                                data-trigger="click" data-action="toggle">
                                <a class="nav-link active" href="javascript:void(0)" data-bs-toggle="tab">This
                                    week</a>
                            </li>
                            <li class="nav-item" data-bs-toggle="chart-bar" data-datasets="lastWeek"
                                data-trigger="click" data-action="toggle">
                                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="tab">Last week</a>
                            </li>
                        </ul>
                        <!-- End Nav -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm mb-2 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <span class="h1 mb-0">35%</span>
                                    <span class="text-success ms-2">
                                        <i class="bi-graph-up"></i> 25.3%
                                    </span>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-sm-auto align-self-sm-end">
                                <div class="row fs-6 text-body">
                                    <div class="col-auto">
                                        <span class="legend-indicator bg-primary"></span> New
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-auto">
                                        <span class="legend-indicator"></span> Overdue
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <!-- Bar Chart -->
                        <div class="chartjs-custom">
                            <canvas id="updatingBarChart" style="height: 20rem;"
                                data-hs-chartjs-options='{
                          "type": "bar",
                          "data": {
                            "labels": ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"],
                            "datasets": [{
                              "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                              "backgroundColor": "#377dff",
                              "hoverBackgroundColor": "#377dff",
                              "borderColor": "#377dff",
                              "maxBarThickness": "10"
                            },
                            {
                              "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                              "backgroundColor": "#e7eaf3",
                              "borderColor": "#e7eaf3",
                              "maxBarThickness": "10"
                            }]
                          },
                          "options": {
                            "scales": {
                              "y": {
                                "grid": {
                                  "color": "#e7eaf3",
                                  "drawBorder": false,
                                  "zeroLineColor": "#e7eaf3"
                                },
                                "ticks": {
                                  "beginAtZero": true,
                                  "stepSize": 100,
                                  "fontSize": 12,
                                  "fontColor":  "#97a4af",
                                  "fontFamily": "Open Sans, sans-serif",
                                  "padding": 10,
                                  "postfix": "$"
                                }
                              },
                              "x": {
                                "grid": {
                                  "display": false,
                                  "drawBorder": false
                                },
                                "ticks": {
                                  "fontSize": 12,
                                  "fontColor":  "#97a4af",
                                  "fontFamily": "Open Sans, sans-serif",
                                  "padding": 5
                                },
                                "categoryPercentage": 0.5,
                                "maxBarThickness": "10"
                              }
                            },
                            "cornerRadius": 2,
                            "plugins": {
                              "tooltip": {
                                "prefix": "$",
                                "hasIndicator": true,
                                "mode": "index",
                                "intersect": false
                              }
                            },
                            "hover": {
                              "mode": "nearest",
                              "intersect": true
                            }
                          }
                        }'></canvas>
                        </div>
                        <!-- End Bar Chart -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-md">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-header-title">Users</h4>

                            <!-- Datatable Info -->
                            <div id="datatableCounterInfo" style="display: none;">
                                <div class="d-flex align-items-center">
                                    <span class="fs-6 me-3">
                                        <span id="datatableCounter">0</span> Selected
                                    </span>
                                    <a class="btn btn-outline-danger btn-sm" href="javascript:void(0)">
                                        <i class="tio-delete-outlined"></i> Delete
                                    </a>
                                </div>
                            </div>
                            <!-- End Datatable Info -->
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-auto">
                        <!-- Filter -->
                        <div class="row align-items-sm-center">
                            <div class="col-sm-auto">
                                <div class="row align-items-center gx-0">
                                    <div class="col">
                                        <span class="text-secondary me-2">Status:</span>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-auto">
                                        <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-end">
                                            <select
                                                class="js-select js-datatable-filter form-select form-select-sm form-select-borderless"
                                                data-target-column-index="2" data-target-table="datatable"
                                                autocomplete="off"
                                                data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "10rem"
                                }'>
                                                <option value="null" selected>All</option>
                                                <option value="successful">Successful</option>
                                                <option value="overdue">Overdue</option>
                                                <option value="pending">Pending</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            <!-- End Col -->

                            <div class="col-sm-auto">
                                <div class="row align-items-center gx-0">
                                    <div class="col">
                                        <span class="text-secondary me-2">Signed up:</span>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-auto">
                                        <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-end">
                                            <select
                                                class="js-select js-datatable-filter form-select form-select-sm form-select-borderless"
                                                data-target-column-index="5" data-target-table="datatable"
                                                autocomplete="off"
                                                data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "10rem"
                                }'>
                                                <option value="null" selected>All</option>
                                                <option value="1 year ago">1 year ago</option>
                                                <option value="6 months ago">6 months ago</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            <!-- End Col -->

                            <div class="col-md">
                                <form>
                                    <!-- Search -->
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend input-group-text">
                                            <i class="bi-search"></i>
                                        </div>
                                        <input id="datatableSearch" type="search" class="form-control"
                                            placeholder="Search users" aria-label="Search users">
                                    </div>
                                    <!-- End Search -->
                                </form>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Filter -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable"
                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    data-hs-datatables-options='{
                   "columnDefs": [{
                      "targets": [0, 1, 4],
                      "orderable": false
                    }],
                   "order": [],
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 8,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatablePagination"
                 }'>
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="datatableCheckAll">
                                    <label class="form-check-label" for="datatableCheckAll"></label>
                                </div>
                            </th>
                            <th class="table-column-ps-0">Full name</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Email</th>
                            <th>Signed up</th>
                            <th>User ID</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck2">
                                    <label class="form-check-label" for="usersDataCheck2"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="assets/img/160x160/img10.jpg"
                                                alt="Image Description">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Amanda Harvey <i
                                                class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Top endorsed"></i></h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-success"></span>Successful
                            </td>
                            <td>Unassigned</td>
                            <td>amanda@site.com</td>
                            <td>1 year ago</td>
                            <td>67989</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck3">
                                    <label class="form-check-label" for="usersDataCheck3"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-soft-primary avatar-circle">
                                            <span class="avatar-initials">A</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Anne Richard</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-success"></span>Successful
                            </td>
                            <td>Subscription</td>
                            <td>anne@site.com</td>
                            <td>6 months ago</td>
                            <td>67326</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck4">
                                    <label class="form-check-label" for="usersDataCheck4"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="assets/img/160x160/img3.jpg"
                                                alt="Image Description">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">David Harrison</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-danger"></span>Overdue
                            </td>
                            <td>Non-subscription</td>
                            <td>david@site.com</td>
                            <td>6 months ago</td>
                            <td>55821</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck5">
                                    <label class="form-check-label" for="usersDataCheck5"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="assets/img/160x160/img5.jpg"
                                                alt="Image Description">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Finch Hoot</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-warning"></span>Pending
                            </td>
                            <td>Subscription</td>
                            <td>finch@site.com</td>
                            <td>1 year ago</td>
                            <td>85214</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck6">
                                    <label class="form-check-label" for="usersDataCheck6"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                            <span class="avatar-initials">B</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Bob Dean</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-success"></span>Successful
                            </td>
                            <td>Subscription</td>
                            <td>bob@site.com</td>
                            <td>6 months ago</td>
                            <td>75470</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck7">
                                    <label class="form-check-label" for="usersDataCheck7"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="assets/img/160x160/img9.jpg"
                                                alt="Image Description">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Ella Lauda <i
                                                class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Top endorsed"></i></h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-warning"></span>Pending
                            </td>
                            <td>Subscription</td>
                            <td>Ella@site.com</td>
                            <td>1 year ago</td>
                            <td>37534</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck8">
                                    <label class="form-check-label" for="usersDataCheck8"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="assets/img/160x160/img4.jpg"
                                                alt="Image Description">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Sam Kart</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-success"></span>Successful
                            </td>
                            <td>Non-subscription</td>
                            <td>sam@site.com</td>
                            <td>1 year ago</td>
                            <td>57300</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck9">
                                    <label class="form-check-label" for="usersDataCheck9"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="assets/img/160x160/img6.jpg"
                                                alt="Image Description">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Costa Quinn</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-danger"></span>Overdue
                            </td>
                            <td>Unassigned</td>
                            <td>costa@site.com</td>
                            <td>1 year ago</td>
                            <td>71288</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck10">
                                    <label class="form-check-label" for="usersDataCheck10"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-soft-primary avatar-circle">
                                            <span class="avatar-initials">R</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Rachel Doe</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-warning"></span>Pending
                            </td>
                            <td>Unassigned</td>
                            <td>rachel@site.com</td>
                            <td>6 months ago</td>
                            <td>95211</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck11">
                                    <label class="form-check-label" for="usersDataCheck11"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                            <span class="avatar-initials">B</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Brian Halligan</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-warning"></span>Pending
                            </td>
                            <td>Subscription</td>
                            <td>brian@site.com</td>
                            <td>1 year ago</td>
                            <td>58643</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck12">
                                    <label class="form-check-label" for="usersDataCheck12"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="assets/img/160x160/img8.jpg"
                                                alt="Image Description">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Linda Bates</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-warning"></span>Pending
                            </td>
                            <td>Subscription</td>
                            <td>linda@site.com</td>
                            <td>1 year ago</td>
                            <td>44414</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck13">
                                    <label class="form-check-label" for="usersDataCheck13"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-soft-info avatar-circle">
                                            <span class="avatar-initials">C</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Chris Mathew <i
                                                class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Top endorsed"></i></h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-success"></span>Successful
                            </td>
                            <td>Non-subscription</td>
                            <td>chris@site.com</td>
                            <td>1 year ago</td>
                            <td>12569</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck14">
                                    <label class="form-check-label" for="usersDataCheck14"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                            <span class="avatar-initials">L</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Lewis Clarke</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-danger"></span>Overdue
                            </td>
                            <td>Non-subscription</td>
                            <td>lewis@site.com</td>
                            <td>1 year ago</td>
                            <td>54621</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck15">
                                    <label class="form-check-label" for="usersDataCheck15"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="assets/img/160x160/img7.jpg"
                                                alt="Image Description">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Clarice Boone <i
                                                class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Top endorsed"></i></h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-success"></span>Successful
                            </td>
                            <td>Non-subscription</td>
                            <td>clarice@site.com</td>
                            <td>6 months ago</td>
                            <td>23485</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck16">
                                    <label class="form-check-label" for="usersDataCheck16"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-soft-danger avatar-circle">
                                            <span class="avatar-initials">M</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Mark Colbert</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-success"></span>Successful
                            </td>
                            <td>Subscription</td>
                            <td>mark@site.com</td>
                            <td>6 months ago</td>
                            <td>78463</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck17">
                                    <label class="form-check-label" for="usersDataCheck17"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-soft-info avatar-circle">
                                            <span class="avatar-initials">J</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Johnny Appleseed</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-warning"></span>Pending
                            </td>
                            <td>Subscription</td>
                            <td>johnny@site.com</td>
                            <td>1 year ago</td>
                            <td>23564</td>
                        </tr>

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="usersDataCheck18">
                                    <label class="form-check-label" for="usersDataCheck18"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-soft-primary avatar-circle">
                                            <span class="avatar-initials">P</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Phileas Fogg</h5>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="legend-indicator bg-warning"></span>Pending
                            </td>
                            <td>Subscription</td>
                            <td>phileas@site.com</td>
                            <td>6 months ago</td>
                            <td>39199</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <!-- Pagination -->
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="me-2">Showing:</span>

                            <!-- Select -->
                            <div class="tom-select-custom">
                                <select id="datatableEntries"
                                    class="js-select form-select form-select-borderless w-auto" autocomplete="off"
                                    data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true
                          }'>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="8" selected>8</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <!-- End Select -->

                            <span class="text-secondary me-2">of</span>

                            <!-- Pagination Quantity -->
                            <span id="datatableWithPaginationInfoTotalQty"></span>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->

        {{-- <div class="row">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <!-- Card -->
                    <div class="card h-100">
                        <!-- Header -->
                        <div class="card-header card-header-content-sm-between">
                            <h4 class="card-header-title mb-2 mb-sm-0">Transactions</h4>

                            <!-- Daterangepicker -->
                            <button id="js-daterangepicker-predefined"
                                class="btn btn-ghost-secondary btn-sm dropdown-toggle">
                                <i class="bi-calendar-week"></i>
                                <span class="js-daterangepicker-predefined-preview ms-1"></span>
                            </button>
                            <!-- End Daterangepicker -->
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chartjs-custom mx-auto" style="height: 20rem;">
                                <canvas class="js-chart-datalabels"
                                    data-hs-chartjs-options='{
                              "type": "bubble",
                              "data": {
                                "datasets": [
                                  {
                                    "label": "Label 1",
                                    "data": [
                                      {"x": 50, "y": 65, "r": 99}
                                    ],
                                    "color": "#fff",
                                    "backgroundColor": "rgba(55, 125, 255, 0.9)",
                                    "borderColor": "transparent"
                                  },
                                  {
                                    "label": "Label 2",
                                    "data": [
                                      {"x": 46, "y": 42, "r": 65}
                                    ],
                                    "color": "#fff",
                                    "backgroundColor": "rgba(100, 0, 214, 0.8)",
                                    "borderColor": "transparent"
                                  },
                                  {
                                    "label": "Label 3",
                                    "data": [
                                      {"x": 48, "y": 15, "r": 38}
                                    ],
                                    "color": "#fff",
                                    "backgroundColor": "#00c9db",
                                    "borderColor": "transparent"
                                  },
                                  {
                                    "label": "Label 3",
                                    "data": [
                                      {"x": 55, "y": 2, "r": 61}
                                    ],
                                    "color": "#fff",
                                    "backgroundColor": "#4338ca",
                                    "borderColor": "transparent"
                                  }
                                ]
                              },
                              "options": {
                                "scales": {
                                  "y": {
                                    "grid": {
                                      "display": false,
                                      "drawBorder": false
                                    },
                                    "ticks": {
                                      "display": false,
                                      "max": 100,
                                      "beginAtZero": true
                                    }
                                  },
                                  "x": {
                                  "grid": {
                                      "display": false,
                                      "drawBorder": false
                                    },
                                    "ticks": {
                                      "display": false,
                                      "max": 100,
                                      "beginAtZero": true
                                    }
                                  }
                                },
                                "plugins": {
                                  "tooltip": false
                                }
                              }
                            }'></canvas>
                            </div>
                            <!-- End Chart -->

                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <span class="legend-indicator bg-primary"></span> New
                                </div>
                                <!-- End Col -->

                                <div class="col-auto">
                                    <span class="legend-indicator" style="background-color: #7000f2;"></span>
                                    Pending
                                </div>
                                <!-- End Col -->

                                <div class="col-auto">
                                    <span class="legend-indicator bg-info"></span> Failed
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-lg-6">
                    <!-- Card -->
                    <div class="card h-100">
                        <!-- Header -->
                        <div class="card-header card-header-content-between">
                            <h4 class="card-header-title">Reports overview</h4>

                            <!-- Dropdown -->
                            <div class="dropdown">
                                <button type="button"
                                    class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle"
                                    id="reportsOverviewDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end mt-1"
                                    aria-labelledby="reportsOverviewDropdown1">
                                    <span class="dropdown-header">Settings</span>

                                    <a class="dropdown-item" href="#">
                                        <i class="bi-share-fill dropdown-item-icon"></i> Share reports
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-download dropdown-item-icon"></i> Download
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-alt dropdown-item-icon"></i> Connect other apps
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <span class="dropdown-header">Feedback</span>

                                    <a class="dropdown-item" href="#">
                                        <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                    </a>
                                </div>
                            </div>
                            <!-- End Dropdown -->
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <span class="h1 d-block mb-4">$7,431.14 USD</span>

                            <!-- Progress -->
                            <div class="progress rounded-pill mb-2">
                                <div class="progress-bar" role="progressbar" style="width: 25%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Gross value"></div>
                                <div class="progress-bar opacity-50" role="progressbar" style="width: 33%"
                                    aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Net volume from sales"></div>
                                <div class="progress-bar opacity-25" role="progressbar" style="width: 9%"
                                    aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="New volume from sales"></div>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <span>0%</span>
                                <span>100%</span>
                            </div>
                            <!-- End Progress -->

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-lg table-nowrap card-table mb-0">
                                    <tr>
                                        <th scope="row">
                                            <span class="legend-indicator bg-primary"></span>Gross value
                                        </th>
                                        <td>$3,500.71</td>
                                        <td>
                                            <span class="badge bg-soft-success text-success">+12.1%</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                            <span class="legend-indicator bg-primary opacity-50"></span>Net volume
                                            from sales
                                        </th>
                                        <td>$2,980.45</td>
                                        <td>
                                            <span class="badge bg-soft-warning text-warning">+6.9%</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                            <span class="legend-indicator bg-primary opacity-25"></span>New volume
                                            from sales
                                        </th>
                                        <td>$950.00</td>
                                        <td>
                                            <span class="badge bg-soft-danger text-danger">-1.5%</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                            <span class="legend-indicator"></span>Other
                                        </th>
                                        <td>32</td>
                                        <td>
                                            <span class="badge bg-soft-success text-success">1.9%</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- End Table -->
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>
            </div> --}}
    </div>

    <script src="../node_modules/daterangepicker/moment.min.js"></script>
	<script src="../node_modules/flatpickr/dist/flatpickr.min.js"></script>

	<script>
	(function () {
		let $popover;
		let $fullcalendarEditable;
		let $guestsField;
		const popoverContent = function(data) {
			return `
  				<ul class="list-unstyled">
					<li class="d-flex">Start: ${moment(data.event.start).format('YYYY-MM-DD hh:mm')}</li>
					<li class="d-flex">End: ${moment(data.event.end).format('YYYY-MM-DD hh:mm')}</li>
					<li class="d-flex">Repeat: ${data.event.extendedProps.repeatField}</li>
					<li class="d-flex">Location: ${data.event.extendedProps.eventLocationLabel}</li>
					<li class="d-flex">Description: ${data.event.extendedProps.eventDescriptionLabel}</li>
					<li>Guests: ${getAvatars(data.event.extendedProps.guestsField)}</li>
				</ul>
				<a id="modal-invoker-${data.event.id}" href="javascript:;" class="btn btn-soft-primary btn-sm">Edit</a>
`
		};

		const $titleField = document.querySelector('#eventTitle');
		const $repeatField = document.querySelector('#eventRepeatLabel');
		const $eventDescriptionLabel = document.querySelector('#eventDescriptionLabel');
		const $eventLocationLabel = document.querySelector('#eventLocationLabel');
		const $eventColorLabel = document.querySelector('#eventColorLabel');
		const $eventGuestsLabel = document.querySelector('#eventGuestsLabel');
		let editableEvent = {};

		const $processEvent = document.querySelector('#processEvent');
		const $addEventModal = document.querySelector('#addEventModal');

		const addEventModal = new bootstrap.Modal($addEventModal);

		// INITIALIZATION OF FLATPICKR
		// =======================================================
		HSCore.components.HSFlatpickr.init('#eventDateRangeLabel');
		const eventDateRange = HSCore.components.HSFlatpickr.getItem('eventDateRangeLabel')

		HSCore.components.HSTomSelect.init('.js-select')

		HSCore.components.HSTomSelect.init('#eventGuestsLabel', {
			valueField: 'id',
			create: false,
			options: [
				{
					id: 1,
					"value": "Amanda Harvey",
					"src": "../assets/img/160x160/img10.jpg"
				},{
					id: 2,
					"value": "David Harrison",
					"src": "../assets/img/160x160/img3.jpg"
				}, {
					id: 3,
					"value": "Finch Hoot",
					"src": "../assets/img/160x160/img5.jpg"
				}, {
					id: 4,
					"value": "Ella Lauda",
					"src": "../assets/img/160x160/img9.jpg"
				}
			],
			render: {
				option: function(data, escape) {
					return `<div class="d-flex align-items-center">

		<div class="flex-shrink-0">
		  <div class="avatar avatar-sm avatar-circle">
			<img class="avatar-img" src="${data.src}" alt="Image Description">
		  </div>
		</div>
		<div class="flex-grow-1 ms-3">
		  <h5 class="text-inherit mb-0">${data.value}</h5>
		</div>
   	  </div>`
				},
				item: function(data, escape) {
					return '<div title="' + data.src + '">' + data.value + '</div>';
				}
			}
		})

		$guestsField = HSCore.components.HSTomSelect.getItem('eventGuestsLabel');

		// INITIALIZATION OF FULL CALENDAR
		// =======================================================
		HSCore.components.HSFullCalendar.init('#js-fullcalendar-editable', {
			events: [
				{
					id: 1,
					title: "English Lesson",
					start: "2020-12-03T01:00:00",
					end: "2020-12-03T02:30:00",
					color: "rgba(237,76,120,.1)",
					eventDescriptionLabel: "",
					eventLocationLabel: "",
					repeatField: "everyday",
					guestsField: []
				},
				{
					id: 2,
					title: "Spanish Lesson",
					start: "2020-12-03T04:00:00",
					end: "2020-12-03T05:30:00",
					color: "rgba(55,125,255,.1)",
					eventDescriptionLabel: "",
					eventLocationLabel: "",
					repeatField: "everyday",
					guestsField: []
				},
				{
					id: 3,
					title: "Javascript Lesson",
					start: "2020-12-14T01:00:00",
					end: "2020-12-16T02:30:00",
					color: "rgba(237,76,120,.1)",
					eventDescriptionLabel: "",
					eventLocationLabel: "",
					repeatField: "everyday",
					guestsField: []
				},
				{
					id: 4,
					title: "PHP Lesson",
					start: "2020-12-06T04:00:00",
					end: "2020-12-09T05:30:00",
					color: "rgba(55,125,255,.1)",
					eventDescriptionLabel: "",
					eventLocationLabel: "",
					repeatField: "everyday",
					guestsField: []
				}
			],
			initialDate: "2020-12-10",
			headerToolbar: {
				left: "prev,next today",
				center: "title",
				right: ""
			},
			selectable: true,
			editable: true,
			select: function (date) {
				prepareData('', date.startStr, date.endStr);
			},
			eventClick: function (event) {
				const _popoverContent = popoverContent(event);

				if ($popover && $popover._element) {
					$popover.dispose();
				}

				// Open Popover
				$popover = new bootstrap.Popover(event.el, {
					html: true,
					content: _popoverContent,
					template: `
						<div class="popover fullcalendar-event-popover" role="tooltip">
							<div class="arrow"></div>
							<h3 class="popover-header"></h3>
							<div class="popover-body"></div>
						</div>
					`,
				});
				$popover.show();

				// Open Modal For Editing
				event.el.addEventListener('shown.bs.popover', function () {
					const $invoker = document.querySelector(`#modal-invoker-${event.event.id}`);

					$invoker.addEventListener('click', function () {
						if ($popover && $popover._element) {
							$popover.dispose();
						}

						prepareData(
								event.event.title,
								event.event.start,
								event.event.end,
								event.event
						);
					})
				})
			},
		});

		setTimeout(function() {
			$fullcalendarEditable = HSCore.components.HSFullCalendar.getItem('js-fullcalendar-editable');
		});

		// Events
		document.addEventListener('click', function (e) {
			if (
					(e.target && e.target.id === 'closePopover' && $popover && $popover._element)
					|| (e.target && !e.target.closest('.fc-event') && !e.target.closest('.popover') && $popover && $popover._element)
			) {
				$popover.dispose();
			}
		});

		document.addEventListener('scroll', function () {
			if ($popover && $popover._element) {
				$popover.dispose();
			}
		});

		$processEvent.addEventListener('click', function () {
			const date = eventDateRange.selectedDates;

			if (!Object.keys(editableEvent).length) {
				$fullcalendarEditable.addEvent({
					id: new Date().getTime(),
					title: $titleField.value || '(No title)',
					repeatField: $repeatField.value,
					guestsField: $guestsField.getValue().map((id) => {
						return Object.values($guestsField.options).filter(member => parseInt(member.id) === parseInt(id))[0]
					}),
					eventDescriptionLabel: $eventDescriptionLabel.value,
					eventLocationLabel: $eventLocationLabel.value,
					start: moment(date[0]).format('YYYY-MM-DD'),
					end: date.length > 1 ? moment(date[1]).format('YYYY-MM-DD') : moment(date[0]).format('YYYY-MM-DD'),
					color: $eventColorLabel.value,
				});
			} else {
				editableEvent.setProp('title', $titleField.value);
				editableEvent.setExtendedProp('repeatField', $repeatField.getValue());
				editableEvent.setExtendedProp('guestsField', $guestsField.getValue().map((id) => {
					return Object.values($guestsField.options).filter(member => parseInt(member.id) === parseInt(id))[0]
				}));
				editableEvent.setExtendedProp('eventDescriptionLabel', $eventDescriptionLabel.value);
				editableEvent.setExtendedProp('eventLocationLabel', $eventLocationLabel.value);
				editableEvent.setProp('color', $eventColorLabel.getValue());
				editableEvent.setStart(moment(date[0]).format('YYYY-MM-DD'));
				editableEvent.setEnd(date.length > 1 ? moment(date[1]).format('YYYY-MM-DD') : moment(date[0]).format('YYYY-MM-DD'));
			}

			addEventModal.hide();
		})

		$addEventModal.addEventListener('show.bs.modal', function () {
			clearForm();
		});

		// Helpers
		function triggerEvent(el, evt) {
			const newEvt = document.createEvent('HTMLEvents');

			newEvt.initEvent(evt, false, true);

			el.dispatchEvent(newEvt);
		}

		function prepareData(title, start, end, event = {}) {
			addEventModal.show();

			$processEvent.textContent = 'Save';

			$titleField.value = title;

			eventDateRange.setDate([moment(start).format('MM/DD/YYYY'), moment(end).format('MM/DD/YYYY')])
		}

		function getAvatar(data) {
			return `<img class="avatar-img" src="${data.src.toLowerCase()}"  alt="${data.value}" />`;
		}

		function getAvatars(members) {
			const $list = document.createElement('div');
			$list.classList.add(
					'avatar-group',
					'avatar-group-sm',
					'mb-1'
			);

			for (let i = 0; i < members.length; i += 1) {
				const $item = document.createElement('span');
				$item.classList.add(
						'avatar',
						'avatar-circle'
				);
				$item.innerHTML = `
					${getAvatar(members[i])}
				`;

				$list.appendChild($item);
			}

			return members.length > 0 ? $list.outerHTML : false
		}

		function clearForm() {
			$titleField.value = '';
			$eventDescriptionLabel.value = '';
			$eventLocationLabel.value = '';
			$repeatField.value = 'everyday';
			$eventColorLabel.value = 'rgba(55,125,255,.1)';
			editableEvent = {};

			$guestsField.clear();
			triggerEvent($repeatField, 'change');
			triggerEvent($eventColorLabel, 'change');

			$processEvent.textContent = 'Create Event';
		}
	})();
 	</script>

    <script type="text/javascript">
        function display_ct5() {
            var x = new Date()
            var x1 = x.toDateString(); // changing the display to UTC string
            document.getElementById('ct5').innerHTML = x1;
            tt = display_c();
        }

        function display_c5() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct5()', refresh)
        }
        display_c5()

        function display_ct1() {
            var x = new Date()

            var x2 = x.getMonth() + 1 + "/";
            x2 = x2;
            document.getElementById('ct1').innerHTML = x2;
            display_c1();
        }

        function display_c1() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct1()', refresh)
        }
        display_c1()

        function display_ct2() {
            var x = new Date()

            var x2 = x.getFullYear();
            x2 = x2;
            document.getElementById('ct2').innerHTML = x2;
            display_c2();
        }

        function display_c2() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct2()', refresh)
        }
        display_c2()
        //hours
        function display_tt1() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';

            var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
            x1 = x.getHours() + " :";
            document.getElementById('tt1').innerHTML = x1;
            display_t5();
        }

        function display_t1() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_tt1()', refresh)
        }
        display_t1()
        //minutes
        function display_tt2() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';

            var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
            x1 = x.getMinutes();
            document.getElementById('tt2').innerHTML = x1;
            display_t5();
        }

        function display_t2() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_tt2()', refresh)
        }
        display_t2()
        //seconds
        function display_tt3() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';

            var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
            x1 = x.getSeconds();
            document.getElementById('tt3').innerHTML = x1;
            display_t3();
        }

        function display_t3() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_tt3()', refresh)
        }
        display_t3()
        //daylight
        function display_tt4() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';

            var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
            x1 = ampm;
            document.getElementById('tt4').innerHTML = x1;
            display_t4();
        }

        function display_t4() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_tt4()', refresh)
        }
        display_t4()

        function updateClock() {
            var now = new Date();
            var dname = now.getDay(),
                month = now.getMonth(),
                date = now.getDate(),
                year = now.getYear(),
                hours = now.getHours(),
                min = now.getMinutes(),
                sec = now.getSeconds(),
                pe = "AM";

            if (hours == 0) {
                hours = 12;
            }
            if (hours > 12) {
                hours = hours - 12;
                pe = "PM";
            }

            Number.prototype.pad = function(digits) {
                for (var n = this.toString(); n.length < digits; n = 0 + n);
                return n;
            }
            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
                "November", "December"
            ];
            var week = ["Sunday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds"];
            var values = [dname, month, date, year, hours, min, sec, pe];
            for (var j = 0; j < ids.lenght; j++)
                document.getElementNyId(ids[j]).firstChild.modeValue = values[j];
        }

        function initClock() {
            updateClock();
            window.setInterval("updateClock()", 1);
        }
    </script>

     <script src="assets/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="assets/js/theme.min.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      window.onload = function () {



        // INITIALIZATION OF FORM SEARCH
        // =======================================================
        new HSFormSearch('.js-form-search')


        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()


        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select', {
          hideSearch: true
        })


        // INITIALIZATION OF FULLCALENDAR
        // =======================================================
        let $popover,
          filterSearchExample,
          editableEvent = {}

        const popoverContent = function (data) {
            return `
  					<h3 class="mb-4">${data.event.title}</h3>

  					<div class="d-flex mb-4">
  						<i class="bi bi-clock nav-icon"></i>
  						<div class="flex-grow-1">
  							<span class="d-block text-dark mb-2">${moment(data.event.start).format('dddd, MMMM DD')} - ${moment(data.event.end).format('dddd, MMMM DD')}</span>
  							<span class="d-block">Repeat: <span class="text-dark text-capitalize">${data.event.extendedProps.repeatField}</span></span>
  						</div>
  					</div>

  					<div class="d-flex mb-4">
  						<i class="bi bi-people nav-icon"></i>
  						<div class="flex-grow-1">
  							<span class="d-block text-dark">${getAvatars(data.event.extendedProps.guestsField) || 'Empty'}</span>
  						</div>
  					</div>

  					<div class="d-flex mb-4">
  						<i class="bi bi-pin-map nav-icon"></i>
  						<div class="flex-grow-1">
  							<span class="d-block text-dark">${data.event.extendedProps.eventLocationLabel || 'Empty'}</span>
  						</div>
  					</div>

  					<div class="d-flex mb-4">
  						<i class="bi bi-text-left nav-icon"></i>
  						<div class="flex-grow-1">
  							<span class="d-block text-dark">${data.event.extendedProps.eventDescriptionLabel || 'Empty'}</span>
  						</div>
  					</div>

  					<div class="d-flex align-items-center mb-4">
  						<div class="avatar avatar-xs avatar-circle me-2">
  							<img class="avatar-img" src="./assets/img/160x160/img6.jpg" alt="Image Description">
  						</div>
  						<div class="flex-grow-1">
  							<span class="d-block text-dark">Mark Williams</span>
  						</div>
  					</div>

  					<div class="d-flex justify-content-end">
  						<a id="closePopover" href="javascript:;" class="btn btn-sm btn-white me-2">Close</a>
  						<a id="modal-invoker-${data.event.id}" href="javascript:;" class="btn btn-sm btn-primary">
  							<i class="bi bi-pencil"></i>
  							Edit
  						</a>
  					</div>
  			  `;
          },
          eventContent = function (data) {
            return `
  					<div>
  						<div class="fc-event-time">${$gridViewSelect.value === 'timeGridWeek' && !data.allDay ? moment(data.start).format('HH:mm') + '-' + moment(data.end).format('HH:mm') : ''}</div>
  						<div class="d-flex">
  							${
              data.extendedProps.image
                ? `<img class="avatar avatar-xs me-2" src="${data.extendedProps.image}" alt="Image Description">`
                : ''
            }
  							<span class="fc-event-title fc-sticky">${data.title}</span>
  						</div>
  					</div>
  				`;
          }

        // Fullcalendar controls
        const $prevMonthBtn = document.querySelector('[data-fc-prev-month]'),
          $nextMonthBtn = document.querySelector('[data-fc-next-month]'),
          $todayBtn = document.querySelector('[data-fc-today]'),
          $dateTitle = document.querySelector('[data-fc-title]'),
          $gridViewSelect = document.querySelector('[data-fc-grid-view]')

        // Filter controls
        const $filterByTitle = document.querySelector('#filter-by-title'),
          $filters = document.querySelectorAll('[data-filter]')

        // Edit popup fields
        const $addEventToCalendarModal = document.querySelector("#addEventToCalendarModal"),
          $titleField = document.querySelector('#eventTitleLabel'),
          $repeatLabel = document.querySelector('#eventRepeatLabel'),
          $eventDescriptionLabel = document.querySelector('#eventDescriptionLabel'),
          $eventLocationLabel = document.querySelector('#eventLocationLabel'),
          $eventColorLabel = document.querySelector('#eventColorLabel'),
          $eventGuestsLabel = document.querySelector('#eventGuestsLabel'),
          $processEvent = document.querySelector('#processEvent'),
          allMembers = [
            {
              "value": "Amanda Harvey",
              "src": null
            }, {
              "value": "Clarice Boone",
              "src": null
            }, {
              "value": "Sam Kart",
              "src": null
            }, {
              "value": "Mark Williams",
              "src": null
            }, {
              "value": "Linda Bates",
              "src": null
            }, {
              "value": "Rachel Doe",
              "src": null
            }, {
              "value": "David Harrison",
              "src": "./assets/img/160x160/img3.jpg"
            }, {
              "value": "Finch Hoot",
              "src": "./assets/img/160x160/img5.jpg"
            }, {
              "value": "Ella Lauda",
              "src": "./assets/img/160x160/img9.jpg"
            }
          ]

        let guestsField,
          repeatField,
          eventColorField,
          fullcalendarEditable

        // Init popup
        const addEventToCalendarModal = new bootstrap.Modal($addEventToCalendarModal);

        HSCore.components.HSFlatpickr.init('#eventDateRangeLabel');
        const eventDateRange = HSCore.components.HSFlatpickr.getItem('eventDateRangeLabel');

        HSCore.components.HSTomSelect.init($eventGuestsLabel, {
          options: allMembers,
          render: {
            option: function (data, escape) {
              return data.src ? `<div><img class="avatar avatar-xs avatar-circle me-2" src="${data.src}">${data.value}</div>` : `
                      <div>
                        <div class="avatar avatar-xs avatar-soft-primary avatar-circle me-2">
                          <span class="avatar-initials">${data.value.charAt(0)}</span>
                        </div>

                        ${data.value}
                      </div>
                    `
            },
            item: function (item, escape) {
              return item.src ? `<div><img class="avatar avatar-xs avatar-circle me-2" src="${item.src}">${item.value}</div>` : `
                      <div>
                        <div class="avatar avatar-xs avatar-soft-primary avatar-circle me-2">
                          <span class="avatar-initials">${item.value.charAt(0)}</span>
                        </div>

                        ${item.value}
                      </div>
                    `
            }
          }
        })

        guestsField = HSCore.components.HSTomSelect.getItem("eventGuestsLabel")
        repeatField = HSCore.components.HSTomSelect.getItem("eventRepeatLabel")
        eventColorField = HSCore.components.HSTomSelect.getItem("eventColorLabel")

        HSCore.components.HSFullCalendar.init('#js-fullcalendar', {
          events: [
            {
              id: 1,
              title: "English Lesson",
              start: "2020-12-03",
              end: "2020-12-03",
              className: "fullcalendar-custom-event-hs-team",
              eventDescriptionLabel: "",
              eventLocationLabel: "",
              repeatField: "weekdays",
              allDay: true,
              guestsField: ["David Harrison"]
            },
            {
              id: 2,
              title: "Spanish Lesson",
              start: "2020-12-03",
              end: "2020-12-03",
              className: "fullcalendar-custom-event-hs-team",
              eventDescriptionLabel: "",
              eventLocationLabel: "",
              repeatField: "everyday",
              allDay: true,
              guestsField: ["Anne Richard", "Finch Hoot"]
            },
            {
              id: 3,
              title: "Monthly presentation (in PDF)",
              start: "2020-12-03 04:00",
              end: "2020-12-03 05:00",
              className: "fullcalendar-custom-event-reminders",
              eventDescriptionLabel: "",
              eventLocationLabel: "Online",
              repeatField: "everyday",
              guestsField: [],
              image: './assets/svg/brands/pdf-icon.svg'
            },
            {
              id: 4,
              title: "Complete Figma course: Go from zero to hero in Figma",
              start: "2020-12-06 02:00",
              end: "2020-12-08 15:00",
              className: "fullcalendar-custom-event-hs-team",
              eventDescriptionLabel: "Learn Figma like a Professional! Start from the basics and go all the way to creating your own design!",
              eventLocationLabel: "Online",
              repeatField: "never",
              guestsField: ["Bob Dean", "Ella Lauda", "Lori Hunter", "Costa Quinn"],
              image: './assets/svg/brands/figma-icon.svg'
            },
            {
              id: 5,
              title: "Independence day",
              start: "2020-12-01",
              end: "2020-12-02",
              className: "fullcalendar-custom-event-holidays",
              eventDescriptionLabel: "",
              eventLocationLabel: "",
              repeatField: "never",
              guestsField: [],
              image: ''
            },
            {
              id: 6,
              title: "Teachers day",
              start: "2020-12-01",
              end: "2020-12-02",
              className: "fullcalendar-custom-event-holidays",
              eventDescriptionLabel: "",
              eventLocationLabel: "",
              repeatField: "never",
              guestsField: [],
              image: ''
            },
            {
              id: 7,
              title: "Send weekly invoice to John",
              start: "2020-12-10",
              end: "2020-12-11",
              className: "fullcalendar-custom-event-hs-team",
              eventDescriptionLabel: "",
              eventLocationLabel: "",
              repeatField: "everyday",
              allDay: true,
              guestsField: ["Linda Bates", "Rachel Doe"],
              image: './assets/svg/brands/excel-icon.svg'
            },
            {
              id: 8,
              title: "Shoot a message to Christina on Slack",
              start: "2020-12-18",
              end: "2020-12-20",
              className: "fullcalendar-custom-event-tasks",
              eventDescriptionLabel: "",
              eventLocationLabel: "",
              repeatField: "everyday",
              guestsField: ["Brian Halligan"],
              image: './assets/svg/brands/slack-icon.svg'
            },
            {
              id: 9,
              title: "Open a calendar task on Jira",
              start: "2020-12-03 00:00",
              end: "2020-12-03 04:00",
              className: "fullcalendar-custom-event-hs-team",
              eventDescriptionLabel: "",
              eventLocationLabel: "",
              repeatField: "never",
              guestsField: ["Clarice Boone", "Sam Kart", "Mark Williams"],
              image: './assets/svg/brands/jira-icon.svg'
            },
            {
              id: 10,
              title: "Weekly presentation (in PDF)",
              start: "2020-12-14",
              end: "2020-12-17",
              className: "fullcalendar-custom-event-reminders",
              eventDescriptionLabel: "",
              eventLocationLabel: "Online",
              repeatField: "everyday",
              guestsField: [],
              image: './assets/svg/brands/pdf-icon.svg'
            },
            {
              id: 11,
              title: "Launch",
              start: "2020-12-03 01:00",
              end: "2020-12-03 02:00",
              className: "fullcalendar-custom-event-hs-team",
              eventDescriptionLabel: "",
              eventLocationLabel: "",
              repeatField: "everyday",
              guestsField: []
            },
            {
              id: 12,
              title: "Make monthly payments via MasterCard",
              start: "2020-12-11",
              end: "2020-12-12",
              className: "fullcalendar-custom-event-tasks",
              eventDescriptionLabel: "",
              eventLocationLabel: "Online",
              repeatField: "everyday",
              guestsField: [],
              image: './assets/svg/brands/mastercard.svg'
            }
          ],
          initialDate: "2020-12-03",
          headerToolbar: false,
          editable: true,
          defaultAllDay: false,
          datesSet(dateSet) {
            $dateTitle.textContent = dateSet.view.title
          },
          eventClick: function (event) {
            // Popover Content
            const _popoverContent = popoverContent(event);

            if ($popover && $popover._element) {
              $popover.dispose();
            }

            // Open Popover
            $popover = new bootstrap.Popover(event.el, {
              html: true,
              content: _popoverContent,
              template: `
  							<div class="popover fullcalendar-event-popover" role="tooltip">
  								<div class="arrow"></div>
  								<h3 class="popover-header"></h3>
  								<div class="popover-body"></div>
  							</div>
  						`,
            });
            $popover.show();

            // Open Popover For Editing
            event.el.addEventListener('shown.bs.popover', function () {
              const $invoker = document.querySelector(`#modal-invoker-${event.event.id}`);

              $invoker.addEventListener('click', function () {
                if ($popover && $popover._element) {
                  $popover.dispose();
                }

                prepareData(
                  event.event.title,
                  event.event.start,
                  event.event.end,
                  event.event
                );
              });
            });
          },
          eventContent({event}) {
            return {
              html: eventContent(event),
            };
          },
          drop({draggedEl}) {
            draggedEl.remove();
          },
        });

        fullcalendarEditable = HSCore.components.HSFullCalendar.getItem('js-fullcalendar');

        // Events
        document.addEventListener('click', function (e) {
          if (
            (e.target && e.target.id === 'closePopover' && $popover && $popover._element)
            || (e.target && !e.target.closest('.fc-event') && !e.target.closest('.popover') && $popover && $popover._element)
          ) {
            $popover.dispose();
          }
        });

        document.addEventListener('scroll', function () {
          if ($popover && $popover._element) {
            $popover.dispose();
          }
        });

        $prevMonthBtn.addEventListener('click', function () {
          fullcalendarEditable.prev();

          HSCore.hideTooltips();
        });

        $nextMonthBtn.addEventListener('click', function () {
          fullcalendarEditable.next();

          HSCore.hideTooltips();
        });

        $gridViewSelect.addEventListener('change', function (event) {
          fullcalendarEditable.changeView(event.target.value);
        });

        $todayBtn.addEventListener('click', function () {
          fullcalendarEditable.today();
        });
        $todayBtn.title = new Date().toDateString();

        $addEventToCalendarModal.addEventListener('hide.bs.modal', function () {
          $titleField.style.height = 'auto';
        });
        $addEventToCalendarModal.addEventListener('show.bs.modal', function () {
          clearForm();
        });
        $addEventToCalendarModal.addEventListener('shown.bs.modal', function () {
          $titleField.style.height = `${$titleField.scrollHeight}px`;

          $titleField.focus();
        });

        $titleField.addEventListener('input', function () {
          $titleField.style.height = `${$titleField.scrollHeight}px`;
        });

        $processEvent.addEventListener('click', function () {
          const date = eventDateRange.selectedDates

          if (!Object.keys(editableEvent).length) {
            fullcalendarEditable.addEvent({
              id: new Date().getTime(),
              title: $titleField.value || '(No title)',
              repeatField: repeatField.getValue(),
              guestsField: JSON.parse(JSON.stringify(guestsField.getValue())),
              eventDescriptionLabel: $eventDescriptionLabel.value,
              eventLocationLabel: $eventLocationLabel.value,
              start: moment(date[0]).format('YYYY-MM-DD'),
              end: date.length > 1 ? moment(date[1]).format('YYYY-MM-DD') : moment(date[0]).format('YYYY-MM-DD'),
              classNames: eventColorField.getValue(),
            });
          } else {
            editableEvent.setProp('title', $titleField.value)
            editableEvent.setExtendedProp('repeatField', repeatField.getValue())
            editableEvent.setExtendedProp('guestsField', JSON.parse(JSON.stringify(guestsField.getValue())))
            editableEvent.setExtendedProp('eventDescriptionLabel', $eventDescriptionLabel.value)
            editableEvent.setExtendedProp('eventLocationLabel', $eventLocationLabel.value)
            editableEvent.setProp('classNames', [eventColorField.getValue()])
            editableEvent.setStart(moment(date[0]).format('YYYY-MM-DD'))
            editableEvent.setEnd(date.length > 1 ? moment(date[1]).format('YYYY-MM-DD') : moment(date[0]).format('YYYY-MM-DD'))
          }

          addEventToCalendarModal.hide();

          filterSearchExample.filter();
        });

        function triggerEvent(el, evt) {
          const newEvt = document.createEvent('HTMLEvents');

          newEvt.initEvent(evt, false, true);

          el.dispatchEvent(newEvt);
        }

        // Set Form
        function prepareData(title, start, end, event = {}) {
          addEventToCalendarModal.show();

          $processEvent.textContent = 'Save';

          $titleField.value = title;

          eventDateRange.setDate([moment(start).format('MM/DD/YYYY'), moment(end).format('MM/DD/YYYY')])

          if (Object.keys(event).length) {
            let newTags = [];

            for (let i = 0; i < event.extendedProps.guestsField.length; i += 1) {
              newTags.push(event.extendedProps.guestsField[i]);
            }

            guestsField.setValue(newTags);

            repeatField.setValue(event.extendedProps.repeatField)
            $eventDescriptionLabel.value = event.extendedProps.eventDescriptionLabel
            $eventLocationLabel.value = event.extendedProps.eventLocationLabel
            eventColorField.setValue(event.classNames[0])

            triggerEvent($repeatLabel, 'change');
            triggerEvent($eventColorLabel, 'change');

            editableEvent = event;
          }
        }

        // Get Avatar
        function getAvatar(data) {
          let member = allMembers.filter(m => m.value === data)
          if (member.length) {
            member = member[0]
          } else {
            member = {
              value: data,
              src: null
            }
          }

          return member.src ? `<img class="avatar avatar-xs avatar-circle me-2" src="${member.src}">` : `
                        <div class="avatar avatar-xs avatar-soft-primary avatar-circle me-2">
                          <span class="avatar-initials">${member.value.charAt(0)}</span>
                        </div>
                    `
        }

        // Get Avatars HTML
        function getAvatars(members) {
          const $ul = document.createElement('ul');
          $ul.classList.add(
            'list-unstyled',
            'mb-0'
          );

          for (let i = 0; i < members.length; i += 1) {
            const $li = document.createElement('li');
            $li.classList.add(
              'd-flex',
              'align-items-center',
              'mb-2'
            );
            $li.innerHTML = `
  						${getAvatar(members[i])}
  						<span>${members[i]}</span>
  					`;

            $ul.appendChild($li);
          }

          return members.length > 0 ? $ul.outerHTML : false
        }

        // Clear Form
        function clearForm() {
          $titleField.value = '';
          $eventDescriptionLabel.value = '';
          $eventLocationLabel.value = '';
          repeatField.setValue('everyday')
          eventColorField.setValue('hs-team');
          eventDateRange.clear()

          editableEvent = {};

          triggerEvent($repeatLabel, 'change');
          triggerEvent($eventColorLabel, 'change');

          if (guestsField) {
            guestsField.clear();
          }

          $processEvent.text = 'Create Event';
        }

        // Filter
        filterSearchExample = new HSFullcalendarFilter(fullcalendarEditable);

        filterSearchExample.addFilter('byTitle', function (event) {
          return event.title.toLowerCase().indexOf($filterByTitle.value.toLowerCase()) !== -1;
        })

        filterSearchExample.addFilter('byCategory', function (event) {
          const selectedCategories = document.querySelectorAll('[data-filter] input:checked');
          let values = [];
          let show;

          for (let i = 0; i < selectedCategories.length; i += 1) {
            values.push(selectedCategories[i].value);
          }

          if (!selectedCategories.length) {
            return false;
          }

          show = false

          for (let i = 0; i < selectedCategories.length; i += 1) {
            show = values.includes(event.classNames[0]);
          }

          return show;
        });

        $filterByTitle.addEventListener('input', function () {
          filterSearchExample.filter();
        });

        for (let i = 0; i < $filters.length; i += 1) {
          $filters[i].addEventListener('change', function () {
            filterSearchExample.filter();
          });
        }

        filterSearchExample.filter();


        // ADD DRAGGABLE CLASS FOR CALENDAR
        // =======================================================
        const Draggable = FullCalendar.Draggable;

        new Draggable(document.querySelector('#external-events'), {
          itemSelector: '.fc-event'
        });


        // INITIALIZATION OF NAVBAR VERTICAL ASIDE
        // =======================================================
        new HSSideNav('.js-navbar-vertical-aside', {
          onMini: function () {
            setTimeout(function () {
              fullcalendarEditable.updateSize()
            }, 200)
          },
          onFull: function () {
            setTimeout(function () {
              fullcalendarEditable.updateSize()
            }, 200)
          },
        }).init()

        setTimeout(() => {
          fullcalendarEditable.updateSize()
        }, 100)
      }
    })()
  </script>

  <!-- Style Switcher JS -->

  <script>
      (function () {
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

        // Function to set active style in the dorpdown menu and set icon for dropdown trigger
        const setActiveStyle = function () {
          $variants.forEach($item => {
            if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
              $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
              return $item.classList.add('active')
            }

            $item.classList.remove('active')
          })
        }

        // Add a click event to all items of the dropdown to set the style
        $variants.forEach(function ($item) {
          $item.addEventListener('click', function () {
            HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
          })
        })

        // Call the setActiveStyle on load page
        setActiveStyle()

        // Add event listener on change style to call the setActiveStyle function
        window.addEventListener('on-hs-appearance-change', function () {
          setActiveStyle()
        })
      })()
    </script>
</x-base-layout>
