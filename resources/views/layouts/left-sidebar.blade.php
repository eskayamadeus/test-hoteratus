 <aside
        class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset">
                <!-- Logo -->

                <a class="navbar-brand" href="{{ route('dashboard') }}" aria-label="Front">
                    <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos/logo.png') }}" alt="Logo"
                        data-hs-theme-appearance="default">
                    <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos/logo.png') }}" alt="Logo"
                        data-hs-theme-appearance="dark">
                    <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos/logo.png') }}" alt="Logo"
                        data-hs-theme-appearance="default">
                    <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos/logo.png') }}" alt="Logo"
                        data-hs-theme-appearance="dark">
                </a>

                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                    <i class="bi-arrow-bar-left navbar-toggler-short-align"
                        data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                    <i class="bi-arrow-bar-right navbar-toggler-full-align"
                        data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                </button>

                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                <div class="navbar-vertical-content" >
                    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link " href="{{ route('dashboard') }}">
                                <i class="bi-house-door nav-icon"></i>
                                <span class="nav-link-title">Dashboard</span>
                            </a>

                        </div>
                        <!-- End Collapse -->

                        <span class="dropdown-header mt-4">APPLICATIONS</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small>

                        <!-- Collapse -->
                        <div class="navbar-nav nav-compact">

                        </div>
                        <div id="navbarVerticalMenuPagesMenu">
                            <!-- Collapse -->
                            <div class="nav-item">
                                <a class="nav-link dropdown-toggle" href="#navbarVerticalMenuPagesUsersMenu"
                                    role="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false"
                                    aria-controls="navbarVerticalMenuPagesUsersMenu">
                                    <i class="bi-people nav-icon"></i>
                                    <span class="nav-link-title">Reservations</span>
                                </a>

                                <div id="navbarVerticalMenuPagesUsersMenu" class="nav-collapse collapse "
                                    data-bs-parent="#navbarVerticalMenuPagesMenu">
                                    <a class="nav-link " href="{{ route('reservation-list') }}"><i class="bi-people nav-icon"></i>Reservation List</a>
                                    <a class="nav-link " href="{{ route('make-reservations') }}"><i class="bi-people nav-icon"></i>Make A Reservation</a>
                                    <a class="nav-link " href="{{ route('dashboard') }}"><i class="bi-people nav-icon"></i>Booking Engine<a>
                                    <a class="nav-link " href="{{ route('dashboard') }}"><i class="bi-people nav-icon"></i>Payment Methods<a>
                                    <a class="nav-link " href="{{ route('taxes-setup') }}"><i class="bi-people nav-icon"></i>Taxes Setup<a>
                                    <a class="nav-link " href="{{ route('travel-agency') }}"><i class="bi-people nav-icon"></i>Travel Agencies<a>
                                   <a class="nav-link " href="{{ route('dashboard') }}"><i class="bi-people nav-icon"></i>Financial Budget Setup<a>

                                </div>
                            </div>
                            <!-- End Collapse -->

                            <!-- Collapse -->
                            <div class="nav-item">
                                <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUserProfileMenu"
                                    role="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarVerticalMenuPagesUserProfileMenu" aria-expanded="false"
                                    aria-controls="navbarVerticalMenuPagesUserProfileMenu">
                                    <i class="bi-person nav-icon"></i>
                                    <span class="nav-link-title">Front Desk</span>
                                </a>

                                <div id="navbarVerticalMenuPagesUserProfileMenu" class="nav-collapse collapse "
                                    data-bs-parent="#navbarVerticalMenuPagesMenu">
                                    <a class="nav-link " href="{{ route('calendar') }}"><i class="bi-calendar nav-icon"></i>Calendar</a>
                                    <a class="nav-link " href="{{ route('dashboard') }}"><i class="bi-people nav-icon"></i>Bulk Update</a>
                                    <a class="nav-link " href="{{ route('dashboard') }}"><i class="bi-people nav-icon"></i>Promos</a>

                                </div>
                            </div>
                            <!-- End Collapse -->

                            <!-- Collapse -->
                            <div class="nav-item">
                                <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesAccountMenu"
                                    role="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarVerticalMenuPagesAccountMenu" aria-expanded="false"
                                    aria-controls="navbarVerticalMenuPagesAccountMenu">
                                    <i class="bi-person-badge nav-icon"></i>
                                    <span class="nav-link-title">Property Info</span>
                                </a>

                                <div id="navbarVerticalMenuPagesAccountMenu" class="nav-collapse collapse "
                                    data-bs-parent="#navbarVerticalMenuPagesMenu">
                                    <a class="nav-link " href="{{ route('room-setup') }}">Rooms Setup</a>
                                    <a class="nav-link " href="{{ route('users') }}">Manage Users</a>
                                    <a class="nav-link " href="{{ route('dashboard') }}">Manage Property Policies</a>
                                    <a class="nav-link " href="{{ route('my-properties') }}">My Properties</a>
                                </div>
                            </div>
                            <!-- End Collapse -->

                            <!-- Collapse -->
                            <div class="nav-item">
                                <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesEcommerceMenu"
                                    role="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarVerticalMenuPagesEcommerceMenu" aria-expanded="false"
                                    aria-controls="navbarVerticalMenuPagesEcommerceMenu">
                                    <i class="bi-basket nav-icon"></i>
                                    <span class="nav-link-title">Channel Manager</span>
                                </a>

                                <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse "
                                    data-bs-parent="#navbarVerticalMenuPagesMenu">
                                    <a class="nav-link " href="{{ route('my-channel') }}">My Channel List</a>
                                    <a class="nav-link " href="{{ route('channel-list') }}">All Channels List</a>




                                </div>
                            </div>
                            <!-- End Collapse -->

                            <!-- Collapse -->
                            <div class="nav-item">
                                <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesProjectsMenu"
                                    role="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarVerticalMenuPagesProjectsMenu" aria-expanded="false"
                                    aria-controls="navbarVerticalMenuPagesProjectsMenu">
                                    <i class="bi-stickies nav-icon"></i>
                                    <span class="nav-link-title">Membership</span>
                                </a>

                                <div id="navbarVerticalMenuPagesProjectsMenu" class="nav-collapse collapse "
                                    data-bs-parent="#navbarVerticalMenuPagesMenu">
                                    <a class="nav-link " href="{{ route('dashboard') }}">My Plan</a>
                                    <a class="nav-link " href="{{ route('dashboard') }}">Pricing</a>
                                </div>
                            </div>
                            <!-- End Collapse -->


                        </div>
                        <!-- End Collapse -->

                        <span class="dropdown-header mt-4">POINT OF SALE(POS)</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small>

                        <div class="nav-item">
                            <a class="nav-link " href="{{ route('dashboard') }}" data-placement="left">
                                <i class="bi-kanban nav-icon"></i>
                                <span class="nav-link-title">My POS</span>
                            </a>
                        </div>
                        <span class="dropdown-header mt-4">HOUSEKEEPING</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small>
                        <div class="nav-item">
                            <a class="nav-link " href="{{ route('dashboard') }}" data-placement="left">
                                <i class="bi-calendar-week nav-icon"></i>
                                <span class="nav-link-title">Room Status</span>
                            </a>
                        </div>
                        <span class="dropdown-header mt-4">BUSINESS INTELLIGENCE</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small>
                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle collapsed" href="#" role="button" data-bs-toggle="collapse"
                                data-bs-target="#csa" aria-expanded="false"
                                aria-controls="csa">
                                <i class="bi-receipt nav-icon"></i>
                                <span class="nav-link-title">Competitive Set Analysis</span>

                            </a>

                            <div id="csa" class="nav-collapse collapse" data-bs-parent="#navbarVerticalMenu">
                                <div id="csaMenu">
                                    <a class="nav-link" href="{{ route('csa.report.show') }}">CSA Report</a>
                                    <!-- End Collapse -->

                                    <!-- Collapse -->
                                    <div class="nav-item">
                                        <a class="nav-link dropdown-toggle" href="#csaConfigMenu" role="button"
                                            data-bs-toggle="collapse" data-bs-target="#csaConfigMenu"
                                            aria-expanded="false" aria-controls="csaConfigMenu">
                                            CSA Configuration
                                        </a>

                                        <div id="csaConfigMenu" class="nav-collapse collapse"
                                            data-bs-parent="#csaMenu">
                                            @foreach (config('scraper.channels') as $scraper => $properties)
                                                @if ($scraper == 'expedia-packages')
                                                    <a class="nav-link" href="{{ route('csa.config.expedia-packages') }}">{{ $properties['name'] }}</a>
                                                @else
                                                    <a class="nav-link" href="{{ route('csa.config.show', $scraper) }}">{{ $properties['name'] }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Collapse -->
                                </div>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <div class="nav-item">
                            <a class="nav-link " href="{{ route('dashboard') }}" data-placement="left">
                                <i class="bi-folder2-open nav-icon"></i>
                                <span class="nav-link-title">Hotel Pace Analysis</span>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- End Content -->

                <!-- Footer -->
                <div class="navbar-vertical-footer">
                    <ul class="navbar-vertical-footer-list">
                        <li class="navbar-vertical-footer-list-item">
                            <!-- Style Switcher -->
                            <div class="dropdown dropup">
                                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                                    id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-dropdown-animation>

                                </button>

                                <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless"
                                    aria-labelledby="selectThemeDropdown">
                                    <a class="dropdown-item" href="#" data-icon="bi-moon-stars"
                                        data-value="auto">
                                        <i class="bi-moon-stars me-2"></i>
                                        <span class="text-truncate" title="Auto (system default)">Auto (system
                                            default)</span>
                                    </a>
                                    <a class="dropdown-item" href="#" data-icon="bi-brightness-high"
                                        data-value="default">
                                        <i class="bi-brightness-high me-2"></i>
                                        <span class="text-truncate" title="Default (light mode)">Default (light
                                            mode)</span>
                                    </a>
                                    <a class="dropdown-item active" href="#" data-icon="bi-moon"
                                        data-value="dark">
                                        <i class="bi-moon me-2"></i>
                                        <span class="text-truncate" title="Dark">Dark</span>
                                    </a>
                                </div>
                            </div>

                            <!-- End Style Switcher -->
                        </li>

                        <li class="navbar-vertical-footer-list-item">
                            <!-- Other Links -->
                            <div class="dropdown dropup">
                                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                                    id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-dropdown-animation>
                                    <i class="bi-info-circle"></i>
                                </button>

                                <div class="dropdown-menu navbar-dropdown-menu-borderless"
                                    aria-labelledby="otherLinksDropdown">
                                    <span class="dropdown-header">Help</span>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-journals dropdown-item-icon"></i>
                                        <span class="text-truncate" title="Resources &amp; tutorials">Resources
                                            &amp; tutorials</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-command dropdown-item-icon"></i>
                                        <span class="text-truncate" title="Keyboard shortcuts">Keyboard
                                            shortcuts</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-alt dropdown-item-icon"></i>
                                        <span class="text-truncate" title="Connect other apps">Connect other
                                            apps</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-gift dropdown-item-icon"></i>
                                        <span class="text-truncate" title="What's new?">Whats new?</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <span class="dropdown-header">Contacts</span>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-chat-left-dots dropdown-item-icon"></i>
                                        <span class="text-truncate" title="Contact support">Contact support</span>
                                    </a>
                                </div>
                            </div>
                            <!-- End Other Links -->
                        </li>

                        <li class="navbar-vertical-footer-list-item">
                            <!-- Language -->
                            <div class="dropdown dropup">
                                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                                    id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-dropdown-animation>
                                    <img class="avatar avatar-xss avatar-circle"
                                        src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/us.svg') }}" alt="United States Flag">
                                </button>

                                <div class="dropdown-menu navbar-dropdown-menu-borderless"
                                    aria-labelledby="selectLanguageDropdown">
                                    <span class="dropdown-header">Select language</span>
                                    <a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}" href="{{ url('/lang/en') }}">
                                        <img class="avatar avatar-xss avatar-circle me-2"
                                            src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/us.svg') }}" alt="Flag">
                                        <span class="text-truncate" title="English">English (US)</span>
                                    </a>
                                    <a class="dropdown-item {{ app()->getLocale() === 'fr' ? 'active' : '' }}" href="{{ url('/lang/fr') }}">
                                        <img class="avatar avatar-xss avatar-circle me-2"
                                            src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/us.svg') }}" alt="Flag">
                                        <span class="text-truncate" title="English">French</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img class="avatar avatar-xss avatar-circle me-2"
                                            src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/us.svg') }}" alt="Flag">
                                        <span class="text-truncate" title="Deutsch">Deutsch</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img class="avatar avatar-xss avatar-circle me-2"
                                            src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/us.svg') }}" alt="Flag">
                                        <span class="text-truncate" title="Dansk">Dansk</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img class="avatar avatar-xss avatar-circle me-2"
                                            src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/us.svg') }}" alt="Flag">
                                        <span class="text-truncate" title="Italiano">Italiano</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img class="avatar avatar-xss avatar-circle me-2"
                                            src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/us.svg') }}" alt="Flag">
                                        <span class="text-truncate" title="中文 (繁體)">中文 (繁體)</span>
                                    </a>
                                </div>
                            </div>

                            <!-- End Language -->
                        </li>
                    </ul>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </aside>
