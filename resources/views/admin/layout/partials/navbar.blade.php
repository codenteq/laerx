<nav class="navbar fixed-bottom bottom-navigation-mb justify-content-around d-flex d-md-none d-lg-none d-xl-none d-xxl-none">
    <ul class="navbar-list mx-auto ">
        <li class="navbar-item">
            <a class="navbar-link" id="sidebarToggleM" >
                <i class="bi bi-list navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('admin/company*') ? 'active' : '' }}" href="{{route('admin.company.index')}}">
                <i class="bi bi-building navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                <i class="bi bi-house navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('admin/manager-user*') ? 'active' : '' }}" href="{{route('admin.manager-user.index')}}">
                <i class="bi bi-people navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('admin/profile*') ? 'active' : '' }}" href="{{route('admin.profile.edit')}}">
                <i class="bi bi-person navbar-link-icon"></i>
            </a>
        </li>


        <div class="navbar-underscore"></div>
    </ul>
</nav>
