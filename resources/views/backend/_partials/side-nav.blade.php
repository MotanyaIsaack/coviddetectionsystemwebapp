<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="{{asset('backend/img/logo.png')}}" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1">{{config('app.name')}}</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fal fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="info-card">
            <img src="{{asset('backend/img/demo/avatars/avatar-admin.png')}}" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
            <div class="info-card-text">
                <a href="#" class="d-flex align-items-center text-white">
                                    <span class="text-truncate text-truncate-sm d-inline-block">
                                        {{Str::ucfirst(Auth::user()->first_name)}} {{Str::ucfirst(Auth::user()->last_name)}}
                                    </span>
                </a>
                <span class="d-inline-block text-truncate text-truncate-sm">{{Auth::user()->email}}</span>
            </div>
            <img src="{{asset('backend/img/card-backgrounds/cover-2-lg.png')}}" class="cover" alt="cover">
            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                <i class="fal fa-angle-down"></i>
            </a>
        </div>
        <!--
        TIP: The menu items are not auto translated. You must have a residing lang file associated with the menu saved inside dist/media/data with reference to each 'data-i18n' attribute.
        -->
        <ul id="js-nav-menu" class="nav-menu">

            <li class="{{ Route::current()->getName() == 'backend.dashboard' ? ' active' : '' }}">
                <a href="{{route('backend.predict')}}" title="Dashboard" data-filter-tags="dashboard">
                    <i class="fal fa-list-alt"></i>
                    <span class="nav-link-text" data-i18n="nav.blankpage">Predictions</span>
                </a>
            </li>
            @can('manageSystem',App\User::class)
                <li class="nav-title">MANAGE USERS</li>

                <li class="{{ Route::current()->getName() == 'backend.manage.doctors' ? ' active' : '' }}">
                    <a href="{{route('backend.manage.doctors')}}" title="Doctors" data-filter-tags="doctors">
                        <i class="fal fa-hospital-user"></i>
                        <span class="nav-link-text" data-i18n="nav.blankpage">Doctors</span>
                    </a>
                </li>

                <li class="nav-title">SYSTEM SETTINGS</li>

                <li class="{{ Route::current()->getName() == 'backend.manage.hospitals' ? ' active' : '' }}">
                    <a href="{{ route('backend.manage.hospitals') }}" title="Hospitals" data-filter-tags="hospitals" >
                        <i class="fal fa-hospital"></i>
                        <span class="nav-link-text" data-i18n="nav.hospitals">Hospitals</span>
                    </a>
                </li>
                <li class="{{ Route::current()->getName() == '' ? ' active' : '' }}">
                    <a href="#facilities_modal" title="Facilities" data-filter-tags="facilities" data-toggle="modal"
                       data-target="#facilities_modal">
                        <i class="fal fa-cog"></i>
                        <span class="nav-link-text" data-i18n="nav.facilities" data-toggle="modal"
                              data-target="#facilities_modal">Facilities</span>
                    </a>
                </li>
                <li class="{{ Route::current()->getName() == '' ? ' active' : '' }}">
                    <a href="#services_modal" title="Services" data-filter-tags="services" data-toggle="modal"
                       data-target="#services_modal">
                        <i class="fal fa-cogs"></i>
                        <span class="nav-link-text" data-i18n="nav.services">Services</span>
                    </a>
                </li>
            @endcan
            @can('managePatients',App\User::class)
                @can('accessPortal',App\User::class)
                    <li class="{{ Route::current()->getName() == '' ? ' active' : '' }}">
                        <a href="#doctor_appointments_modal" title="Doctor Appointment" data-filter-tags="doctor appointments" data-toggle="modal"
                           data-target="#doctor_appointments_modal">
                            <i class="fal fa-cog"></i>
                            <span class="nav-link-text" data-i18n="nav.doctorappointments" data-toggle="modal"
                                  data-target="#doctor_appointments_modal">Appointments</span>
                        </a>
                    </li>
                @endcan
            @endcan
        </ul>
        <div class="filter-message js-filter-message bg-success-600"></div>
    </nav>
    <!-- END PRIMARY NAVIGATION -->
</aside>
