<x-guest-layout>

    <form method="POST" action="{{ route('register') }}" class="js-validate needs-validation" novalidate>
        @csrf

        <input type="hidden" name="role" value=2>
        <div class="text-center">
            <div class="mb-5">
                <h1 class="display-5">Create your account</h1>
                <p>Already have an account? <a class="link" href="{{ route('login') }}">Sign in here</a></p>
            </div>

            <div class="d-grid mb-4">
                <a class="btn btn-white btn-lg" href="#">
                    <span class="d-flex justify-content-center align-items-center">
                        <img class="avatar avatar-xss me-2" src="assets/svg/brands/google-icon.svg"
                            alt="Image Description">
                        Sign up with Google
                    </span>
                </a>
            </div>

            <span class="divider-center text-muted mb-4">OR</span>
        </div>

        <label class="form-label" for="fullNameSrEmail">Full name</label>

        <!-- Form -->
        <div class="row">
            <div class="col-sm-6">
                <!-- Form -->
                <div class="mb-4">
                    <input type="text" class="form-control form-control-lg" name="firstname" id="fullNameSrEmail"
                        placeholder="Mark" aria-label="Mark" value="{{ old('firstname') }}" required>
                    <span class="invalid-feedback">Please enter your first name.</span>
                    @if ($errors->has('firstname'))
                        @foreach ($errors->all() as $first_error)
                            <span id="error-message">{{ $first_error }}</span>
                        @endforeach
                    @endif
                </div>
                <!-- End Form -->
            </div>

            <div class="col-sm-6">
                <!-- Form -->
                <div class="mb-4">
                    <input type="text" class="form-control form-control-lg" name="lastname" placeholder="Williams"
                        aria-label="Williams" value="{{ old('lastname') }}" required>
                    <span class="invalid-feedback">Please enter your last name.</span>
                    @if ($errors->has('lastname'))
                        @foreach ($errors->all() as $lastname_error)
                            <span id="error-message">{{ $lastname_error }}</span>
                        @endforeach
                    @endif
                </div>
                <!-- End Form -->
            </div>
        </div>
        <!-- End Form -->

        <!-- Form -->
        <div class="mb-4">
            <label class="form-label" for="signupSrEmail">Your email</label>
            <input type="email" class="form-control form-control-lg" name="email" id="signupSrEmail"
                placeholder="Markwilliams@site.com" aria-label="Markwilliams@site.com" value="{{ old('email') }}" required>
            <span class="invalid-feedback">Please enter a valid email address.</span>
            @if ($errors->has('email'))
                @foreach ($errors->all() as $email_error)
                    <span id="error-message">{{ $email_error }}</span>
                @endforeach
            @endif
        </div>
        <!-- End Form -->

        <!-- Form -->
        <div class="mb-4">
            <label class="form-label" for="signupSrEmail">Your username</label>
            <input type="text" class="form-control form-control-lg" name="username" id="signupSrUsername"
                placeholder="mark@1234" aria-label="mark@1234" value="{{ old('username') }}" required>
            <span class="invalid-feedback">Please enter a valid email address.</span>
            @if ($errors->has('username'))
                @foreach ($errors->all() as $username_error)
                    <span id="error-message">{{ $username_error }}</span>
                @endforeach
            @endif
        </div>
        <!-- End Form -->

        <!-- Form -->
        <div class="mb-4">
            <label class="form-label" for="signupSrPassword">Password</label>

            <div class="input-group input-group-merge" data-hs-validation-validate-class>
                <input type="password" class="js-toggle-password form-control form-control-lg" name="password"
                    id="signupSrPassword" value="{{ old('password') }}" placeholder="8+ characters required" aria-label="8+ characters required"
                    required minlength="8"
                    data-hs-toggle-password-options='{
                           "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": ".js-toggle-password-show-icon-1"
                         }'>
                <a class="js-toggle-password-target-1 input-group-append input-group-text" href="javascript:void(0)">
                    <i class="js-toggle-password-show-icon-1 bi-eye"></i>
                </a>
            </div>

            <span class="invalid-feedback">Your password is invalid. Please try again.</span>
            @if ($errors->has('password'))
                @foreach ($errors->all() as $password_error)
                    <span id="error-message">{{ $password_error }}</span>
                @endforeach
            @endif
        </div>
        <!-- End Form -->

        <!-- Form -->
        <div class="mb-4">
            <label class="form-label" for="signupSrConfirmPassword">Confirm password</label>

            <div class="input-group input-group-merge" data-hs-validation-validate-class>
                <input type="password" class="js-toggle-password form-control form-control-lg"
                    name="password_confirmation" id="signupSrConfirmPassword" placeholder="8+ characters required"
                    aria-label="8+ characters required" value="{{ old('password_confirmation') }}" required minlength="8"
                    data-hs-toggle-password-options='{
                           "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": ".js-toggle-password-show-icon-2"
                         }'>
                <a class="js-toggle-password-target-2 input-group-append input-group-text" href="javascript:void(0)">
                    <i class="js-toggle-password-show-icon-2 bi-eye"></i>
                </a>
            </div>

            <span class="invalid-feedback">Password does not match the confirm password.</span>
            @if ($errors->has('password_confirmation'))
                @foreach ($errors->all() as $password_confirmation_error)
                    <span id="error-message">{{ $password_confirmation_error }}</span>
                @endforeach
            @endif
        </div>
        <!-- End Form -->

        <!-- Form Check -->
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" value="" id="termsCheckbox" required>
            <label class="form-check-label" for="termsCheckbox">
                I accept the <a href="#">Terms and Conditions</a>
            </label>
            <span class="invalid-feedback">Please accept our Terms and Conditions.</span>
        </div>
        <!-- End Form Check -->

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Create an account</button>

        </div>
    </form>

</x-guest-layout>
