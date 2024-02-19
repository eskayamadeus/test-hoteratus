<header  class="position-absolute top-0 start-0 end-0 mt-3 mx-3">
        <div  class="d-flex d-lg-none justify-content-between">
            <a href="{{ route('index') }}">
                <img class="w-100" src="assets/svg/logos/logo.png" alt="Image Description"
                    data-hs-theme-appearance="default" style="min-width: 7rem; max-width: 7rem;">
                <img class="w-100" src="assets/svg/logos/logo.png" alt="Image Description"
                    data-hs-theme-appearance="dark" style="min-width: 7rem; max-width: 7rem;">
            </a>

            <!-- Select -->
            <div class="tom-select-custom tom-select-custom-end zi-2">
                <select class="js-select form-select form-select-sm form-select-borderless"
                    data-hs-tom-select-options='{
                  "searchInDropdown": false,
                  "hideSearch": true,
                  "dropdownWidth": "12rem",
                  "placeholder": "Select language"
                }'>
                    <option label="empty"></option>
                    <option value="language1"
                        data-option-template='<a class="d-flex align-items-center {{ app()->getLocale() === 'fr' ? 'active' : '' }}" href="{{ url('/lang/fr') }}"><img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description" width="16"/><span>English (US)</span></a>'>
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
    </header>
