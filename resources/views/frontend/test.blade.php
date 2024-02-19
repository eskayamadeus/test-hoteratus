<x-base-layout>
    {{--  <x-cbase-layout>  --}}

    <div class="content container-fluid">
        <div class="row justify-content-lg-center">
            <div class="col-lg-10">



                <!-- Nav -->
                <div class="js-nav-scroller hs-nav-scroller-horizontal mb-5">
                    <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                        <a class="hs-nav-scroller-arrow-link" href="javascript:void(0)">
                            <i class="bi-chevron-left"></i>
                        </a>
                    </span>

                    <span class="hs-nav-scroller-arrow-next" style="display: none;">
                        <a class="hs-nav-scroller-arrow-link" href="javascript:void(0)">
                            <i class="bi-chevron-right"></i>
                        </a>
                    </span>

                    <ul class="nav nav-tabs align-items-center">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('test') ? ' active' : '' }}"
                                href="{{ route('test') }}">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('test2') }}">Projects</a>
                        </li>

                    </ul>
                </div>
                <!-- End Nav -->

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" class="js-validate needs-validation"
                            novalidate>
                            @csrf
                            {{--  adding image of property  --}}
                            <!-- Media -->

                            <label class="form-label">Property Image</label>

                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                                    <img id="image-preview" class="avatar-img" src="../assets/img/160x160/img1.jpg"
                                        alt="Image Description">
                                </label>
                                <form>
                                    <div class="d-flex gap-3 ms-4">
                                        <div class="form-attachment-btn btn btn-sm btn-primary">Upload photo
                                            <input type="file" name="hotel_image"
                                                class="js-file-attach form-attachment-btn-label" id="avatarUploader"
                                                onchange="updatePreview(this, 'image-preview')"
                                                data-hs-file-attach-options='{
                                            "textTarget": "#avatarImg",
                                            "mode": "image",
                                            "targetAttr": "src",
                                            "resetTarget": ".js-file-attach-reset-img",
                                            "resetImg": "../assets/img/160x160/img1.jpg",
                                            "allowTypes": [".png", ".jpeg", ".jpg"]
                                            }'>
                                        </div>
                                        <!-- End Avatar -->


                                    </div>
                                </form>

                            </div>

                            <!-- End Media -->

                            <br>

                            <label class="form-label" for="fullNameSrEmail">Hotel name</label>
                            <!-- End Form -->
                            <div class="mb-4">
                                <input type="text" class="form-control form-control-lg" name="hotel_name"
                                    id="fullNameSrEmail" placeholder="Villagio" aria-label="Villagio" required>
                                <span class="invalid-feedback">Please enter your first name.</span>
                                @if ($errors->has('hotel_name'))
                                    @foreach ($errors->all() as $hotel_name_error)
                                        <span id="error-message">{{ $hotel_name_error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <!-- Form -->



                            <!-- Form -->
                            <label class="form-label" for="fullNameSrEmail">Address 1</label>
                            <div class="mb-4">
                                <input type="text" class="form-control form-control-lg" name="address_1"
                                    placeholder="Kgalagadi Way, Gaborone, Botswana"
                                    aria-label="Kgalagadi Way, Gaborone, Botswana" required>
                                <span class="invalid-feedback">Please enter an address</span>
                                @if ($errors->has('lastname'))
                                    @foreach ($errors->all() as $addres_1_error)
                                        <span id="error-message">{{ $addres_1_error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <label class="form-label" for="fullNameSrEmail">Address 2</label>
                            <div class="mb-4">
                                <input type="text" class="form-control form-control-lg" name="address_2"
                                    placeholder="Kgalagadi Way, Gaborone, Botswana"
                                    aria-label="Kgalagadi Way, Gaborone, Botswana" required>
                                <span class="invalid-feedback">Please enter your an address.</span>
                                @if ($errors->has('address_1'))
                                    @foreach ($errors->all() as $address_2_error)
                                        <span id="error-message">{{ $address_2_error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <!-- End Form -->


                            <!-- End Form -->

                            <!-- Form -->
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">City</label>
                                    <input type="text" class="form-control form-control-lg" name="city"
                                        id="signupSrEmail" placeholder="Accra" aria-label="Accra" required>
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('city'))
                                        @foreach ($errors->all() as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">State</label>
                                    <input type="text" class="form-control form-control-lg" name="state"
                                        id="signupSrEmail" placeholder="Greater Accra"
                                        aria-label="Markwilliams@site.com" required>
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('state'))
                                        @foreach ($errors->all() as $email_error)
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
                                        <option selected="">Select Country</option>
                                        <option value="1">Ghana</option>
                                        <option value="2">Spain</option>
                                        <option value="3">United States</option>
                                    </select>
                                    <!-- End Select -->
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('city'))
                                        @foreach ($errors->all() as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">Post code</label>
                                    <input type="number" class="form-control form-control-lg" name="post_code"
                                        id="signupSrEmail" placeholder="Greater Accra" required>
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('state'))
                                        @foreach ($errors->all() as $email_error)
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
                                        <option selected="">Select Currency</option>
                                        <option value="usd">USD</option>
                                        <option value="gbp">GBP</option>
                                        <option value="eur">EUR</option>
                                    </select>
                                    <!-- End Select -->
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('city'))
                                        @foreach ($errors->all() as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">Time zone</label>
                                    <input type="number" class="form-control form-control-lg" name="time_zone"
                                        id="signupSrEmail" placeholder="00000" aria-label="00000" required>
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('state'))
                                        @foreach ($errors->all() as $email_error)
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
                                        required>
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('city'))
                                        @foreach ($errors->all() as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="signupSrEmail">Email</label>
                                    <input type="email" class="form-control form-control-lg" name="email"
                                        id="signupSrEmail" placeholder="jo@email.com" aria-label="00000" required>
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                    @if ($errors->has('email'))
                                        @foreach ($errors->all() as $email_error)
                                            <span id="error-message">{{ $email_error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>


                            <!-- Form -->
                            <div class="mb-4">
                                <label class="form-label" for="exampleFormControlTextarea1">Description</label>
                                <textarea id="exampleFormControlTextarea1" class="form-control" placeholder="Write something about the property"
                                    rows="4"></textarea>
                                <span class="invalid-feedback">Please enter a valid email address.</span>
                                @if ($errors->has('username'))
                                    @foreach ($errors->all() as $username_error)
                                        <span id="error-message">{{ $username_error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <!-- End Form -->

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>




                        </form>
                    </div>
                </div>



            </div>

        </div>




        {{--  </x-cbase-layout>  --}}
</x-base-layout>
