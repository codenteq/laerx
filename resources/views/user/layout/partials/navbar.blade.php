<nav
    class="navbar fixed-bottom bottom-navigation-mb d-flex justify-content-around  d-md-none d-lg-none d-xl-none d-xxl-none">
    <ul class="navbar-list mx-auto ">
        <li class="navbar-item">
            <a class="navbar-link" id="sidebarToggleM">
                <i class="bi bi-list navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('user/exams*') ? 'active' : '' }}"
               href="{{route('user.exams')}}">
                <i class="bi bi-laptop navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('user/dashboard') ? 'active' : '' }}"
               href="{{route('user.dashboard')}}">
                <i class="bi bi-house navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('user/notifications*') ? 'active' : '' }}"
               href="{{route('user.notifications')}}">
                <i class="bi bi-bell navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('user/profile*') ? 'active' : '' }}"
               href="{{route('user.profile')}}">
                <i class="bi bi-person navbar-link-icon"></i>
            </a>
        </li>

        <div class="navbar-underscore"></div>
    </ul>
</nav>
