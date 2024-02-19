<x-base-layout>

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="row align-items-end">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Update Property for, {{ $property->hotel_name }}</h1>
                <hr>
                <a href="{{ route('my-properties') }}">
                    <span class="badge bg-dark rounded-pill"><i class="bi-chevron-left me-1"></i> Back</span>
                </a>
            </div>


            @if ($errors->all())
                @foreach ($errors->all() as $error)
                    <span class="mb-2" style="color: red !important"> {{ $error }}</span>
                @endforeach
            @endif

            <!-- Nav -->
            <div class="mt-2 mb-1">
                <ul class="nav nav-segment nav-pills mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="update-property-profile-tab" href="#update-property-profile"
                            data-bs-toggle="pill" data-bs-target="#update-property-profile" role="tab"
                            aria-controls="update-property-profile" aria-selected="true">Property
                            Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="update-map-tab" href="#update-map" data-bs-toggle="pill"
                            data-bs-target="#update-map" role="tab" aria-controls="update-map"
                            aria-selected="false">Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="update-photos-tab" href="#update-photos" data-bs-toggle="pill"
                            data-bs-target="#update-photos" role="tab" aria-controls="photos"
                            aria-selected="false">Photos</a>
                    </li>

                </ul>
            </div>
            <!-- End Nav -->

            <div class="tab-content">
                <div class="p-3 tab-pane fade show active" id="update-property-profile" role="tabpanel"
                    aria-labelledby="update-property-profile">

                    <form method="POST" action="{{ route('update-property', $property->id) }}"
                        class="js-validate needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        {{--  adding image of property  --}}
                        <!-- Media -->

                        <label class="form-label">Property Icon</label>

                        <div class="mb-4 row">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                                        <img id="image-preview" class="avatar-img"
                                            src="{{ $property->hotel_icon ? asset('/images/hotel_icon/' . $property->hotel_icon) : '../assets/img/160x160/img1.jpg' }}"
                                            alt="Image Description" required>
                                    </label>
                                    {{--  <form>  --}}
                                    <div class="d-flex gap-3 ms-4">
                                        <div class="form-attachment-btn btn btn-sm btn-primary">Upload
                                            photo
                                            <input type="file" name="hotel_icon"
                                                class="js-file-attach form-attachment-btn-label" id="avatarUploader"
                                                src="{{ asset('/images/hotel_icon/' . $property->hotel_icon) }}"
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
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="signupSrEmail">Property Code</label>
                                <input type="text" class="form-control form-control-lg" name="code"
                                    id="signupSrEmail" placeholder="Property Code" value="{{ $property->code }}"
                                    required>
                                <span class="invalid-feedback">Please enter a valid email
                                    address.</span>
                                @if ($errors->has('code'))
                                    @foreach ($errors->get('code') as $email_error)
                                        <span id="error-message">{{ $email_error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- End Media -->

                        <br>

                        <label class="form-label" for="fullNameSrEmail">Property name</label>
                        <!-- End Form -->
                        <div class="mb-4">
                            <input type="text" class="form-control form-control-lg" name="hotel_name"
                                id="fullNameSrEmail" placeholder="Villagio" aria-label="Villagio"
                                value="{{ $property->hotel_name }}" required>
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
                            <input type="text" class="form-control form-control-lg " id="input-address2"
                                name="address" placeholder="Kgalagadi Way, Gaborone, Botswana"
                                aria-label="Kgalagadi Way, Gaborone, Botswana" value="{{ $property->address }}"
                                required>
                            <span class="invalid-feedback">Please enter an address</span>
                            @if ($errors->has('address'))
                                @foreach ($errors->get('address') as $addres_1_error)
                                    <span id="error-message">{{ $addres_1_error }}</span>
                                @endforeach
                            @endif
                        </div>

                        <input type="hidden" name="lat2">
                        <input type="hidden" name="lng2">
                        <!-- End Form -->

                        <!-- End Form -->

                        <!-- Form -->
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <label class="form-label" for="signupSrEmail">City</label>
                                <input type="text" class="form-control form-control-lg" name="city"
                                    id="signupSrEmail" placeholder="Accra" value="{{ $property->city }}" required>
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
                                    id="signupSrEmail" placeholder="Greater Accra" value="{{ $property->state }}"
                                    required>
                                <span class="invalid-feedback">Please enter a valid email
                                    address.</span>
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
                                            {{ $property->country == $country ? 'selected' : '' }}>
                                            {{ $country }}</option>
                                    @endforeach
                                </select>
                                <!-- End Select -->
                                <span class="invalid-feedback">Please enter a valid email
                                    address.</span>
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
                                    value="{{ $property->post_code }}" required>
                                <span class="invalid-feedback">Please enter a valid email
                                    address.</span>
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
                                <select class="form-select" name="currency">
                                    <option>Select Currency</option>
                                    @foreach ($currencies as $code => $name)
                                        <option value="{{ $code }}"
                                            {{ $property->currency == $code ? 'selected' : '' }}>
                                            {{ $name }}</option>
                                    @endforeach
                                </select>

                                <!-- End Select -->
                                <span class="invalid-feedback">Please enter a valid email
                                    address.</span>
                                @if ($errors->has('currency'))
                                    @foreach ($errors->get('currency') as $email_error)
                                        <span id="error-message">{{ $email_error }}</span>
                                    @endforeach
                                @endif
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="signupSrEmail">Time zone</label>
                                <!-- Select -->
                                <select class="form-select" name="time_zone">
                                    <option>Select Time Zone</option>
                                    @foreach ($time_zones as $time_zone)
                                        <option value="{{ $time_zone }}"
                                            {{ $property->time_zone == $time_zone ? 'selected' : '' }}>
                                            {{ $time_zone }}</option>
                                    @endforeach
                                </select>
                                <!-- End Select -->
                                <span class="invalid-feedback">Please enter a valid email
                                    address.</span>
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
                                    value="{{ $property->contact }}" required>
                                <span class="invalid-feedback">Please enter a valid email
                                    address.</span>
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
                                    value="{{ $property->email }}" required>
                                <span class="invalid-feedback">Please enter a valid email
                                    address.</span>
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
                            <textarea id="update-description" name="description" class="form-control"
                                placeholder="Write something about the property" rows="4">{{ $property->description }}</textarea>
                            <span id="update-word_count" {{--  class="d-flex float-right text-xs">225/225</span>  --}} <span class="invalid-feedback">Please
                                enter
                                a valid email
                                address.</span>
                            @if ($errors->has('description'))
                                @foreach ($errors->get('description') as $username_error)
                                    <span id="error-message">{{ $username_error }}</span>
                                @endforeach
                            @endif
                        </div>
                        <!-- End Form -->

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Update
                                Property</button>
                        </div>

                    </form>


                </div>
            </div>

            <!-- End Properties Profile Tab View -->

            <div class="tab-content">
                <div class="p-3 tab-pane fade show" id="update-map" role="tabpanel" aria-labelledby="update-map">
                    <div class="card">
                        <img class="card-img card-img-top" src="{{ asset('assets/img/documentation/img7.jpg') }}"
                            alt="Card image cap">

                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="p-3 tab-pane fade show" id="update-photos" role="tabpanel"
                    aria-labelledby="update-photos">
                    <span class="badge bg-primary rounded-pill mt-2 mb-2">Click on image card(S) to add new
                        images of property</span>

                    <form action="{{ route('add-property-image', $property->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="grid3">

                            @for ($i = 1; $i <= 4; $i++)
                                <div class="card">
                                    @php
                                        $imageField = 'hotel_image_' . $i;
                                        $imagePath = $property->$imageField ? asset('/images/hotel-images/' . $property->$imageField) : asset('assets/img/documentation/img7.jpg');
                                    @endphp
                                    <label for="imageUpload_{{ $i }}"
                                        id="imagePreviewLabel_{{ $i }}">
                                        <img class="card-img card-img-top" src="{{ $imagePath }}"
                                            alt="Card image cap"
                                            style="width: 100% !important;height: 20rem;object-fit: fill !important;"
                                            id="imagePreview_{{ $i }}">
                                    </label>
                                    <input type="file" id="imageUpload_{{ $i }}"
                                        name="hotel_image{{ $i }}" accept=".png, .jpg, .jpeg"
                                        style="display: none;">
                                </div>
                            @endfor

                            <script>
                                @for ($i = 1; $i <= 4; $i++)
                                    document.getElementById('imageUpload_{{ $i }}').addEventListener('change',
                                        function(event) {
                                            var file = event.target.files[0];
                                            if (file) {
                                                var reader = new FileReader();
                                                reader.onload = function(e) {
                                                    document.getElementById('imagePreview_{{ $i }}')
                                                        .setAttribute('src', e.target.result);
                                                };
                                                reader.readAsDataURL(file);
                                            }
                                        });
                                    document.getElementById('imagePreviewLabel_{{ $i }}').addEventListener(
                                        'click',
                                        function() {
                                            document.getElementById('imageUpload_{{ $i }}').click();
                                        });
                                @endfor
                            </script>

                        </div>
                        <div class="mt-3 d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Update Images</button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>









</x-base-layout>
