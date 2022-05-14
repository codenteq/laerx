<nav
    class="navbar fixed-bottom bottom-navigation-mb d-flex justify-content-around  d-md-none d-lg-none d-xl-none d-xxl-none">
    <ul class="navbar-list mx-auto ">
        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('teacher/appointment') ? 'active' : '' }}"
               href="{{route('teacher.appointment.index')}}">
                <i class="bi bi-calendar3 navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('teacher/profile*') ? 'active' : '' }}"
               href="{{route('teacher.profile.index')}}">
                <i class="bi bi-person navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link " href="{{route('logout-user')}}">
                <i class="bi bi-box-arrow-right navbar-link-icon"></i>
            </a>
        </li>

        <div class="navbar-underscore"></div>
    </ul>
</nav>
