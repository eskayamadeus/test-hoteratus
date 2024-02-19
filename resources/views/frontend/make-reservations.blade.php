<x-base-layout>


    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">

            <h4 class="page-header-title">Welcome <span style="color: rgb(45, 202, 150)">{{ Auth::user()->firstname }}
                    {{ Auth::user()->lastname }}</span></h4>
            <hr>
            {{--  <h4 class="page-header-title">Active Property: <span style="color: rgb(38, 184, 135)">New Jersey Shores Condo</span></h4>  --}}
            <h1 class="page-header-title">Search A Room</h1>
        </div>


        <!-- End Col -->
    </div>
    <!-- End Row -->
    </div>
    <!-- End Page Header -->

    <!-- Stats -->
    {{-- <div class="row">
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Total users</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">24</span>
                  <span class="text-body fs-5 ms-1">from 22</span>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                  <span class="badge bg-soft-success text-success p-1">
                    <i class="bi-graph-up"></i> 5.0%
                  </span>
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Active members</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">12</span>
                  <span class="text-body fs-5 ms-1">from 11</span>
                </div>

                <div class="col-auto">
                  <span class="badge bg-soft-success text-success p-1">
                    <i class="bi-graph-up"></i> 1.2%
                  </span>
                </div>
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">New/returning</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">56</span>
                  <span class="display-4 text-dark">%</span>
                  <span class="text-body fs-5 ms-1">from 48.7</span>
                </div>

                <div class="col-auto">
                  <span class="badge bg-soft-danger text-danger p-1">
                    <i class="bi-graph-down"></i> 2.8%
                  </span>
                </div>
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Active members</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">28.6</span>
                  <span class="display-4 text-dark">%</span>
                  <span class="text-body fs-5 ms-1">from 28.6%</span>
                </div>

                <div class="col-auto">
                  <span class="badge bg-soft-secondary text-secondary p-1">0.0%</span>
                </div>
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>
      </div> --}}
    <!-- End Stats -->

    <!-- Card -->

        <div class="row mb-4 lg-12  center" >
            <form action="" method="">
                @csrf

            <div class="col-sm-9">

                <div class="input-group input-group-sm-vertical">


                    <label for="firstNameLabel" class="col-sm-1 col-form-label form-label">Check-In </label>
                    <input value="{{ Carbon\Carbon::now()->toDateString() }}" type="date"
                        class="form-control col-md-1" name="checkin" id="firstNameLabel" placeholder=""
                        aria-label="Clarice">
                    &ensp;
                    <label for="firstNameLabel" class="col-sm-2 col-form-label form-label">Check-Out </label>
                    <input value="{{ Carbon\Carbon::now()->toDateString() }}" type="date" class="form-control"
                        name="checkout" id="firstNameLabel" placeholder="" aria-label="Clarice">

                </div>
            </div>
            <div class="col-sm-9">
                <div class="input-group input-group-sm-vertical">
                    <label for="firstNameLabel" class="col-sm-1 col-form-label form-label">Rooms </label>
                    <select name="rooms" class="js-select form-select" placeholder="Rooms" autocomplete="off"
                        data-hs-tom-select-options='{
                "searchInDropdown": false,
                "hideSearch": true,
                "dropdownWidth": "8rem"
              }'>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                    <select name="adults" class="js-select form-select" placeholder="" autocomplete="off"
                        data-hs-tom-select-options='{
                "searchInDropdown": false,
                "hideSearch": true,
                "dropdownWidth": "8rem"
                "dropdownHeight": "12rem"
              }'>
                        <option value="" required disabled selected hidden>Adults</option>
                        <option value="1" required>1</option>
                        <option value="2" required>2</option>
                        <option value="3" required>3</option>
                        <option value="4" required>4</option>

                    </select>
                    <select name="children" class="js-select form-select" placeholder="Rooms" autocomplete="off"
                        data-hs-tom-select-options='{
        "searchInDropdown": false,
        "hideSearch": true,
        "dropdownWidth": "8rem"
        "dropdownHeight": "12rem"
      }'>
                        <option value="1" required disabled selected hidden>Children</option>
                        <option value="1" required>1</option>
                        <option value="2" required>2</option>
                    </select>
                </div>
                &ensp;
                <a href="{{ route('add-reservations') }}">
                <div class="d-grid">
                    <button type="button" class="btn btn-primary btn-lg">Search Room</button>
                </div>
            </a>
            </div>
        </form>
    </div>

        {{-- @forelse ($rooms as $room)
        <a href="{{ route('add-reservations') }}">
            <div class="d-grid
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img class="img-fluid" src="../assets/img/documentation/img8.jpg" alt="Card image cap">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $room->room_name }}</h5>
                      <p class="card-text">{{ $room->description }}</p>
                      <h2>$200 <small>per night</small></h2>

                            </div>
                        </div>
                    </div>
                    <a href="{{ route('add-reservations') }}">
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary btn-lg">Book Room</button>
                        </div>
                    </a>
                  </div>

                </div>
            </div>
        </a>
    @empty
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img class="img-fluid" src="../assets/img/documentation/img8.jpg" alt="Card image cap">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5>No Room Available</h5>
                    </div>
                </div>
            </div>
          </div>
          @endforelse --}}
          <div class="tab-content">
            <div class="row align-items-end">
            @forelse ($rooms as $room)
            <div class="card" style="max-width: 20rem;">
                &ensp;
                <img class="card-img-top" src="../assets/img/documentation/img7.jpg" alt="Card image cap">
                <div class="card-body">
                  <h3 class="card-title">{{ $room->room_name }}</h3>
                  <p class="card-text">{{ $room->description }}</p>
                  <h2 class="card-title">$200 <small>per night</small></h2>
                  {{-- <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </p> --}}
                  &ensp;
                  <a href="{{ route('add-reservations') }}">
                    <div class="d-grid">
                        <button type="button" class="btn btn-primary btn-lg">Book Room</button>
                    </div>
                </a>
                </div>
              </div>
              @empty
              <h2 class="text-center mt-10 mb-10" style="margin: 0 auto !important">There are no rooms available at the moment..............</h2>
          @endforelse
            </div>
        </div>
        &ensp;
    </div>
    <!-- End Content -->



    <?php

    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;
    ?>
</x-base-layout>
