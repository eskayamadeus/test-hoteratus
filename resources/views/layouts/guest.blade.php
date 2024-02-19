<!DOCTYPE html>
<html lang="en">


@include('layouts.auth-head')

<body class="d-flex align-items-center min-h-100">

    <script src="assets/js/hs.theme-appearance.js"></script>

    @include('sweetalert::alert')


    <!-- ========== HEADER ========== -->

    @include('layouts.auth-top-header')

    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main pt-0">
        <!-- Content -->
        <div class="container-fluid px-3">
            <div class="row">
                @if (URL::current() == route('super-admin'))
                    <div id="custom-bg2"
                        class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-light px-0">
                    @else
                        <div id="custom-bg"
                            class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-light px-0">
                @endif
                <!-- Logo & Language -->
                <div class="position-absolute top-0 start-0 end-0 mt-3 mx-3">
                    <div class="d-none d-lg-flex justify-content-between">
                        <a href="{{ route('index') }}">
                            <img class="w-100" src="assets/svg/logos/logo.png" alt="Image Description"
                                data-hs-theme-appearance="default" style="min-width: 7rem; max-width: 7rem;">
                            <img class="w-100" src="assets/svg/logos/logo.png" alt="Image Description"
                                data-hs-theme-appearance="dark" style="min-width: 7rem; max-width: 7rem;">
                        </a>

                        <!-- Select -->
                        <div class="tom-select-custom tom-select-custom-end tom-select-custom-bg-transparent zi-2">
                            <select class="js-select form-select form-select-sm form-select-borderless"
                                data-hs-tom-select-options='{
                          "searchInDropdown": false,
                          "hideSearch": true,
                          "dropdownWidth": "12rem",
                          "placeholder": "Select language"
                        }'>
                                <option label="empty"></option>
                                <option value="language1"
                                    data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description" width="16"/><span>English (US)</span></span>'>
                                    English (US)</option>
                                <option value="language2" selected
                                    data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/gb.svg" alt="Image description" width="16"/><span>English (UK)</span></span>'>
                                    English (UK)</option>
                                <option value="language3"
                                    data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/de.svg" alt="Image description" width="16"/><span>Deutsch</span></span>'>
                                    Deutsch</option>
                                <option value="language4"
                                    data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/dk.svg" alt="Image description" width="16"/><span>Dansk</span></span>'>
                                    Dansk</option>
                                <option value="language5"
                                    data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/es.svg" alt="Image description" width="16"/><span>Español</span></span>'>
                                    Español</option>
                                <option value="language6"
                                    data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/nl.svg" alt="Image description" width="16"/><span>Nederlands</span></span>'>
                                    Nederlands</option>
                                <option value="language7"
                                    data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/it.svg" alt="Image description" width="16"/><span>Italiano</span></span>'>
                                    Italiano</option>
                                <option value="language8"
                                    data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/cn.svg" alt="Image description" width="16"/><span>中文 (繁體)</span></span>'>
                                    中文 (繁體)</option>
                            </select>
                        </div>
                        <!-- End Select -->
                    </div>
                </div>
                <!-- End Logo & Language -->

                <div style="max-width: 23rem;">
                    <div class="text-center mb-5">
                        <img class="img-fluid" src="assets/svg/logos/logo.png" alt="Image Description"
                            style="width: 12rem;" data-hs-theme-appearance="default">
                    </div>

                      @if (URL::current() == route('super-admin'))
                    <div class="mb-5">
                        <h2 class="display-5 color-dark">Welcome to Hoteratus</h2>
                    </div>
                    @else
                       <div class="mb-5">
                        <h2 class="display-5 color-white">Welcome to Hoteratus</h2>
                    </div>
                @endif





                    <!-- End Row -->
                </div>
            </div>
            <!-- End Col -->

            <div class="col-lg-6 d-flex justify-content-center align-items-center min-vh-lg-100">
                <div class="w-100 content-space-t-4 content-space-t-lg-2 content-space-b-1" style="max-width: 25rem;">
                    <!-- Form -->

                    {{ $slot }}


                    <!-- End Form -->
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
        </div>
        <!-- End Content -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- JS Implementing Plugins -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- JS Front -->
    <script src="assets/js/theme.min.js"></script>

    <!-- JS Plugins Init. -->
    <script>
        (function() {
            window.onload = function() {
                // INITIALIZATION OF BOOTSTRAP VALIDATION
                // =======================================================
                HSBsValidation.init('.js-validate')


                // INITIALIZATION OF TOGGLE PASSWORD
                // =======================================================
                new HSTogglePassword('.js-toggle-password')


                // INITIALIZATION OF SELECT
                // =======================================================
                HSCore.components.HSTomSelect.init('.js-select')
            }
        })()
    </script>
</body>


</html>
