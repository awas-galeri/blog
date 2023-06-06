<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Main Menu</span>
                {{-- <a class="link-secondary" href="#" aria-label="Add a new report">
                    <span data-feather="plus-circle" class="align-text-bottom"></span>
                </a> --}}
            </h6>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                    href="{{ route('dashboard') }}">
                    <span data-feather="layout" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="{{ route('blog') }}">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Blog
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Products
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Profile
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Reports
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Integrations
                </a>
            </li> --}}
        </ul>

        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Options</span>
            {{-- <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a> --}}
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="settings" class="align-text-bottom"></span>
                    Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                    <span data-feather="log-out" class="align-text-bottom"></span>
                    Log out
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Social engagement
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Year-end sale
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
