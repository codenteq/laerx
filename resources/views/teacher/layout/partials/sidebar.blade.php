<a class="sidebar-menu-list">
    <a class="list-group-item list-group-item-action d-md-none d-lg-none d-xl-none d-xxl-none" type="button"
       id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="profile-info-icon-sidebar me-1"><span>{{ auth()->user()->name[0] }}</span></div>
        <span class="sidebar-menu-text fs-6">{{auth()->user()->name .' '. auth()->user()->surname}}</span>
        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
    </a>

    <ul class="dropdown-menu sidebar-dropdown-open d-md-none d-lg-none d-xl-none d-xxl-none"
        aria-labelledby="dropdownMenuButton1">
        <span class="text-secondary ms-2">ACCOUNT</span>
        <li><a class="dropdown-item" href="{{route('teacher.profile.index')}}">{{__('teacher/profile.profile')}}</a>
        </li>
        <li><a class="dropdown-item" href="{{route('logout-user')}}">{{__('teacher/menu.logout')}}</a></li>
    </ul>

    <a class="list-group-item list-group-item-action d-none d-md-block text-left {{ request()->is('teacher/appointment') ? 'active' : '' }}"
       href="{{route('teacher.appointment.index')}}">
        <i class="bi bi-calendar3 fs-4"></i>
        <span class="sidebar-menu-text">{{__('teacher/appointment.my_appointment')}}</span>
    </a>
</a>
