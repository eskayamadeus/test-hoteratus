<x-base-layout>


    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="row align-items-end">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">My Properties</h1>
                <hr>
            </div>

            <form action="{{ route('search-property') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">&#128270;</span>
                    <input type="search" class="form-control" name="search-property" placeholder="Search Property"
                        aria-label="Search" aria-describedby="basic-addon1">
                </div>
            </form>

            @if ($errors->all())
                @foreach ($errors->all() as $error)
                    <span class="mb-2" style="color: red !important"> {{ $error }}</span>
                @endforeach
            @endif



            <!-- Nav -->
            <div class="mt-2 mb-1">
                <ul class="nav nav-segment nav-pills mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="available-property-tab" href="#available-property"
                            data-bs-toggle="pill" data-bs-target="#available-property" role="tab"
                            aria-controls="available-property" aria-selected="true">Available Properties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="add-property-tab" href="#add-property" data-bs-toggle="pill"
                            data-bs-target="#add-property" role="tab" aria-controls="add-property"
                            aria-selected="false">Add Property</a>
                    </li>
                </ul>
            </div>
            <!-- End Nav -->
        </div>
        <!-- End Page Header -->


        {{--  Cards that show property info  --}}



        <!-- Available Properties -->

        <div class="tab-content">
            <div class="tab-pane fade show active" id="available-property" role="tabpanel"
                aria-labelledby="available-property">
                <div id="grid">
                    @forelse ($properties as $property)
                        <div class="card" style="width: 18rem !important; height: 25rem !important; ">
                            <img class="card-img-top"
                                style="width: 100% !important; height: 15rem; object-fit: cover !important;"
                                src="{{ $property->hotel_icon ? asset('/images/hotel_icon/' . $property->hotel_icon) : asset('assets/img/documentation/image7.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title">{{ $property->hotel_name }}</h3>
                                <a href="{{ route('show-update-property', $property->id) }}">
                                    <span class="badge bg-primary rounded-pill">Update</span>
                                </a>

                                <a href="{{ route('view-property-info', $property->id) }}">
                                    <span class="badge bg-success rounded-pill">View</span>
                                </a>
                                <p class="card-text mt-3">{{ $property->address }}</p>
                                <p class="card-text">
                                    <small class="text-muted">{{ $property->created_at->diffForHumans() }}</small>
                                </p>
                            </div>
                        </div>


                    @empty
                        <span class="badge bg-success rounded-pill">No Properties Available</span>
                    @endforelse
                    {!! $properties->links() !!}
                </div>
            </div>
        </div>
        <!-- End Available Properties -->



        <!-- Add Properties -->

        <div class="tab-content">
            <div class="tab-pane fade show" id="add-property" role="tabpanel" aria-labelledby="add-property">
                <div class="card">
                    <script
                        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API') }}&loading=async&libraries=places&callback=initAutocomplete"
                        async defer></script>

                    <div class="card-body">
                        <form method="POST" action="{{ route('add-property') }}" class="js-validate needs-validation"
                            novalidate enctype="multipart/form-data">
                            @csrf
                            {{--  adding image of property  --}}
                            <!-- Media -->

                            <label class="form-label">Property Icon</label>

                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                                    <img id="image-preview" class="avatar-img" src="../assets/img/160x160/img1.jpg"
                                        alt="Image Description" required>
                                </label>
                                {{--  <form>  --}}
                                <div class="d-flex gap-3 ms-4">
                                    <div class="form-attachment-btn btn btn-sm btn-primary">Upload photo
                                        <input type="file" name="hotel_icon"
                                            class="js-file-attach form-attachment-btn-label" id="avatarUploader"
                                            value="{{ old('hotel_icon') }}"
                                            onchange="updatePreview(this, 'image-preview')"
                                            data-hs-file-attach-options='{
                                            "textTarget": "#avatarImg",
                                            "mode": "image",
                                            "targetAttr": "src",
                                            "resetTarget": ".js-file-attach-reset-img",
                                            "resetImg": "../assets/img/160x160/img1.jpg",
                                            "allowTypes": [".png", ".jpeg", ".jpg"]
                                            }'>



                                        @if ($errors->has('hotel_icon'))
                                            @foreach ($errors->get('hotel_icon') as $hotel_icon_error)
                                                <span id="error-message">{{ $hotel_icon_error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <!-- End Avatar -->


                                </div>
                                {{--  </form>  --}}

                            </div>

                            <!-- End Media -->

                            <br>

                            <label class="form-label" for="fullNameSrEmail">Property Name</label>
                            <!-- End Form -->
                            <div class="mb-4">
                                <input type="text" class="form-control form-control-lg" name="hotel_name"
                                    id="fullNameSrEmail" placeholder="Villagio" aria-label="Villagio"
                                    value="{{ old('hotel_name') }}" required>
                                <span class="invalid-feedback">Please enter your first name.</span>
                                @if ($errors->has('hotel_name'))
                                    @foreach ($errors->get('hotel_name') as $hotel_name_error)
                                        <span id="error-message">{{ $hotel_name_error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <!-- Form -->



                            <!-- Form -->
                            <label class="form-label" for="fullNameSrEmail">Address</label>
                            <div class="mb-4">
                                <input type="text" class="form-control form-control-lg " name="address"
                                    id="input-address1" placeholder="Kgalagadi Way, Gaborone, Botswana"
                                    id="" aria-label="Kgalagadi Way, Gaborone, Botswana"
                                    value="{{ old('address') }}" required>
                                <span class="invalid-feedback">Please enter an address</span>
                                @if ($errors->has('address'))
                                    @foreach ($errors->get('address') as $addres_1_error)
                                        <span id="error-message">{{ $addres_1_error }}</span>
                                    @endforeach
                                @endif
                            </div>

                            <input type="hidden" name="lat">
                            <input type="hidden" name="lng">


                            <script>
                                // Initialize Google Maps autocomplete
                                function initAutocomplete() {
                                    var input1 = document.getElementById('input-address1');
                                    var input2 = document.getElementById('input-address2');


                                    var autocomplete1 = new google.maps.places.Autocomplete(input1);
                                    var autocomplete2 = new google.maps.places.Autocomplete(input2);

                                }

                                // Listen for the 'place_changed' event
                                autocomplete1.addListener('place_changed', function() {
                                    var place1 = autocomplete1.getPlace();

                                    if (!place1.geometry || !place1.geometry.location) {
                                        console.log('Place ' + place1);
                                        return; // Place geometry or location not available
                                    }

                                    // Update hidden input fields with latitude and longitude
                                    var lat = document.getElementById('lat').value;
                                    var lng = document.getElementById('lng').value;
                                    lat = place1.geometry.location.lat();
                                    lng = place1.geometry.location.lng();
                                    console.log('Lat: ' + lat '  lng: ' + lng);
                                });
                                // Listen for the 'place_changed' event
                                autocomplete2.addListener('place_changed', function() {
                                    var place2 = autocomplete2.getPlace();

                                    if (!place2.geometry || !place2.geometry.location) {
                                        return; // Place geometry or location not available
                                    }

                                    // Update hidden input fields with latitude and longitude
                                    document.getElementById('lat2').value = place2.geometry.location.lat();
                                    document.getElementById('lng2').value = place2.geometry.location.lng();
                                });
                            </script>


                            <!-- End Form -->


                            <!-- End Form -->

                            <!-- Form -->
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">City</label>
                                    <input type="text" class="form-control form-control-lg" name="city"
                                        id="signupSrEmail" placeholder="Accra" value="{{ old('city') }}" required>
                                    <span class="invalid-feedback">Please enter a valid City.</span>
                                    @if ($errors->has('city'))
                                        @foreach ($errors->get('city') as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">State</label>
                                    <input type="text" class="form-control form-control-lg" name="state"
                                        id="signupSrEmail" placeholder="Greater Accra" value="{{ old('state') }}"
                                        required>
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('state'))
                                        @foreach ($errors->get('state') as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <!-- End Form -->

                            <!-- Form -->
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">Country</label>
                                    <!-- Select -->
                                    <select class="form-select" name="country">
                                        <option>Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country }}"
                                                {{ old('country') == $country ? 'selected' : '' }}>
                                                {{ $country }}</option>
                                        @endforeach
                                    </select>
                                    <!-- End Select -->
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('country'))
                                        @foreach ($errors->get('country') as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">Post code</label>
                                    <input type="number" class="form-control form-control-lg" name="post_code"
                                        id="signupSrEmail" placeholder="Greater Accra"
                                        value="{{ old('post_code') }}" required>
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('post_code'))
                                        @foreach ($errors->get('post_code') as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <!-- End Form -->

                            <!-- Form -->
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">Currency</label>
                                    <!-- Select -->
                                    <select class="form-select" name="currency" value="{{ old('currency') }}">
                                        <option>Select Currency</option>
                                        @foreach ($currencies as $code => $name)
                                            <option value="{{ $code }}"
                                                {{ old('currency') == $code ? 'selected' : '' }}>{{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <!-- End Select -->
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('currency'))
                                        @foreach ($errors->get('currency') as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">Time zone</label>
                                    <!-- Select -->
                                    <select class="form-select" name="time_zone" value="{{ old('time_zone') }}">
                                        <option>Select Time Zone</option>
                                        @foreach ($time_zones as $time_zone)
                                            <option value="{{ $time_zone }}"
                                                {{ old('time_zone') == $time_zone ? 'selected' : '' }}>
                                                {{ $time_zone }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <!-- End Select -->
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('time_zone'))
                                        @foreach ($errors->get('time_zone') as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!-- End Form -->

                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">Phone </label>
                                    <input type="tel" class="form-control form-control-lg" name="contact"
                                        id="signupSrEmail" placeholder="03033333333333" aria-label="03033333333333"
                                        value="{{ old('contact') }}" required>
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('contact'))
                                        @foreach ($errors->get('contact') as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">Email</label>
                                    <input type="email" class="form-control form-control-lg" name="email"
                                        id="signupSrEmail" placeholder="jo@email.com" aria-label="00000"
                                        value="{{ old('email') }}" required>
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('email'))
                                        @foreach ($errors->get('email') as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <!-- Form -->
                            <div class="mb-4">
                                <label class="form-label" for="exampleFormControlTextarea1">Description</label>
                                <textarea id="description" name="description" class="form-control" placeholder="Write something about the property"
                                    rows="4" value="{{ old('description') }}"></textarea>
                                {{--  <span id="word_count" class="d-flex float-right text-xs">225/225</span>  --}}
                                <span class="invalid-feedback">Please enter a valid email address.</span>
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $username_error)
                                        <span id="error-message">{{ $username_error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <!-- End Form -->

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Add Property</button>
                            </div>

                        </form>
                    </div>
                </div>

                <script>
                    let description = document.getElementById("description");
                    let word_count = document.getElementById("word_count");
                    description.addEventListener("input", function() {
                        word_count.textContent = description.value.length + "/225";
                        if (description.value.length > 224) {
                            description.value = description.value.substring(0, 224);
                            word_count.style.color = "red";
                        } else {
                            word_count.style.color = "green";
                        }

                    });
                </script>

            </div>
        </div>

        <!-- End Add Properties -->




</x-base-layout>
