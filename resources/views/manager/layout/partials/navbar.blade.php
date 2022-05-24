<nav
    class="navbar fixed-bottom bottom-navigation-mb d-flex justify-content-around d-md-none d-lg-none d-xl-none d-xxl-none">
    <ul class="navbar-list mx-auto ">
        <li class="navbar-item">
            <a class="navbar-link" id="sidebarToggleM">
                <i class="bi bi-list navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link text-secondary {{ request()->is('manager/appointment*') ? 'active' : '' }}"
               href="{{route('manager.appointment.index')}}">
                <i class="bi bi-calendar4-range navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('manager/dashboard') ? 'active' : '' }}"
               href="{{route('manager.dashboard')}}">
                <i class="bi bi-house navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('manager/user*') ? 'active' : '' }}"
               href="{{route('manager.user.results')}}">
                <i class="bi bi-clipboard-data navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('manager/profile*') ? 'active' : '' }}"
               href="{{route('manager.profile.edit')}}">
                <i class="bi bi-person navbar-link-icon"></i>
            </a>
        </li>

        <div class="navbar-underscore"></div>
    </ul>
</nav>
