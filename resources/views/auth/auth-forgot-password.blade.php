<x-guest-layout>
    <form class="js-validate needs-validation" novalidate>
        <div class="text-center">
            <div class="mb-5">
                <h1 class="display-5">Forgot password?</h1>
                <p>Enter the email address you used when you joined and we will send you instructions to reset your
                    password.</p>
            </div>
        </div>

        <!-- Form -->
        <div class="mb-4">
            <label class="form-label" for="resetPasswordSrEmail" tabindex="0">Your email</label>

            <input type="email" class="form-control form-control-lg" name="email" id="resetPasswordSrEmail"
                tabindex="1" placeholder="Enter your email address" aria-label="Enter your email address" required>
            <span class="invalid-feedback">Please enter a valid email address.</span>
        </div>
        <!-- End Form -->

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>

            <div class="text-center">
                <a class="btn btn-link" href="{{ route('index') }}">
                    <i class="bi-chevron-left"></i> Back to Sign in
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
