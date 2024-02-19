<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="js-validate needs-validation">
        @csrf
        <div class="text-center">
            <div class="mb-5">
                <h1 class="display-5">Sign in</h1>
                <p>Don’t have an account yet? <a class="link" href="{{ route('register') }}">Sign up here</a>
                </p>
            </div>

            <div class="d-grid mb-4">
                <a class="btn btn-white btn-lg" href="#">
                    <span class="d-flex justify-content-center align-items-center">
                        <img class="avatar avatar-xss me-2" src="assets/svg/brands/google-icon.svg"
                            alt="Image Description">
                        Sign in with Google
                    </span>
                </a>
            </div>

            <span class="divider-center text-muted mb-4">OR</span>
        </div>

        <!-- Form -->
        <div class="mb-4">
            <label class="form-label" for="signinSrEmail">Your email or username</label>
            <input type="input_type" class="form-control form-control-lg" name="input_type" id="signinSrEmail" tabindex="1"
                placeholder="email or username" aria-label="email@address.com" required value="{{ old('input_type') }}">

            @if ($errors->has('email'))
                @foreach ($errors->get('email') as $email_error)
                    <span id="error-message">{{ $email_error }}</span>
                @endforeach
            @endif

            @if ($errors->has('username'))
                @foreach ($errors->get('username') as $username_error)
                    <span id="error-message">{{ $username_error }}</span>
                @endforeach
            @endif

        </div>
        <!-- End Form -->

        <!-- Form -->
        <div class="mb-4">
            <label class="form-label w-100" for="signupSrPassword" tabindex="0">
                <span class="d-flex justify-content-between align-items-center">
                    <span>Password</span>
                    @if (Route::has('password.request'))
                    <a class="form-label-link mb-0" href="{{ route('password.request') }}">Forgot Password?</a>
                    @endif
                </span>
            </label>

            <div class="input-group input-group-merge" data-hs-validation-validate-class>
                <input type="password" class="js-toggle-password form-control form-control-lg" name="password"
                    id="signupSrPassword" placeholder="8+ characters required" aria-label="8+ characters required"
                    required minlength="8"
                    data-hs-toggle-password-options='{
                           "target": "#changePassTarget",
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": "#changePassIcon"
                         }'>
                <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:void(0)">
                    <i id="changePassIcon" class="bi-eye"></i>
                </a>
            </div>

           
             @if ($errors->has('password'))
                @foreach ($errors->get('password') as $password_error)
                    <span id="error-message">{{ $password_error }}</span>
                @endforeach
            @endif

        </div>
        <!-- End Form -->

        <!-- Form Check -->
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" value="" id="termsCheckbox">
            <label class="form-check-label" for="termsCheckbox">
                Remember me
            </label>
        </div>
        <!-- End Form Check -->

        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg">Sign in</button>
        </div>
    </form>

</x-guest-layout>
