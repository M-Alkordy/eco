<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}" style="text-align: center;">
            <img src="/img/pioneers-logo.png" class="navbar-brand-img h-100" alt="main_logo" style="width: 50px; max-height: max-content;">
            <span class="ms-1 font-weight-bold"></span>
        </a>
    </div>

    <div id="sidenav-collapse-main">
        <ul class="navbar-nav" style="margin-top: 30px;">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                    href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @can('user-list')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}"
                        href="{{ route('users.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
            @endcan

            @can('role-list')
                <li class="nav-item">

                    <a class="nav-link {{ str_contains(request()->url(), 'role-management') == true ? 'active' : '' }}"
                        href="{{ route('roles.index') }}">
                        <div
                            class="icon icon-setting icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-settings text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Roles</span>
                    </a>
                </li>
            @endcan
            @can('service-list')
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'service-management') == true ? 'active' : '' }}"
                    href="{{ route('services.index') }}">
                    <div
                        class="icon icon-setting icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Services</span>
                </a>
            </li>
            @endcan
            @can('products-list')
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'productsv-management') == true ? 'active' : '' }}"
                    href="{{ route('products.index') }}">
                    <div
                        class="icon icon-setting icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Products</span>
                </a>
            </li>
            @endcan
            @can('support-list')
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'productsv-management') == true ? 'active' : '' }}"
                    href="{{ route('support.index') }}">
                    <div
                        class="icon icon-setting icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Technical support</span>
                </a>
            </li>
            @endcan
            @can('clients-list')
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'clients-management') == true ? 'active' : '' }}"
                    href="{{ route('clients.index') }}">
                    <div
                        class="icon icon-setting icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Clients</span>
                </a>
            </li>
            @endcan
            @can('email-list')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'emails-management') == true ? 'active' : '' }}"
                        href="{{ route('emails.index') }}">
                        <div
                            class="icon icon-setting icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Emails</span>
                    </a>
                </li>

            @endcan

            @can('consults-list')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'consults-management') == true ? 'active' : '' }}"
                        href="{{ route('consults.index') }}">
                        <div
                            class="icon icon-setting icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Free Consults</span>
                    </a>
                </li>

            @endcan


        </ul>
    </div>
</aside>
