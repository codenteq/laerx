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
        <li><a class="dropdown-item" href="{{route('user.profile')}}">{{__('user/menu.profile')}}</a></li>
        <li><a class="dropdown-item" href="{{route('logout-user')}}">{{__('user/menu.logout')}}</a></li>
    </ul>

    <a class="list-group-item list-group-item-action d-none d-md-block text-left {{ request()->is('user/dashboard') ? 'active' : '' }}"
       href="{{route('user.dashboard')}}">
        <i class="bi bi-house fs-4"></i>
        <span class="sidebar-menu-text">{{__('user/menu.home')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left {{ request()->is('user/lesson*') ? 'active' : '' }}"
       href="{{route('user.lesson.index')}}">
        <i class="bi bi-book fs-4"></i>
        <span class="sidebar-menu-text">{{__('user/menu.my_lesson')}}</span>
    </a>

    <a class="list-group-item list-group-item-action d-none d-md-block text-left {{ request()->is('user/exams') ? 'active' : '' }} {{ request()->is('user/custom-exam-setting*') ? 'active' : '' }}"
       href="{{route('user.exams')}}">
        <i class="bi bi-laptop fs-4"></i>
        <span class="sidebar-menu-text">{{__('user/menu.online_exam')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left {{ request()->is('user/class-exams') ? 'active' : '' }}"
       href="{{route('user.class-exams')}}">
        <i class="bi bi-people fs-4"></i>
        <span class="sidebar-menu-text">{{__('user/menu.class_exam')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left {{ request()->is('user/result') ? 'active' : '' }}"
       href="{{route('user.results')}}">
        <i class="bi bi-file-earmark-text fs-4"></i>
        <span class="sidebar-menu-text">{{__('user/menu.exam_result')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left {{ request()->is('user/appointment') ? 'active' : '' }}"
       href="{{route('user.appointment.index')}}">
        <i class="bi bi-calendar4-range fs-4"></i>
        <span class="sidebar-menu-text">{{__('user/menu.my_appointment')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left {{ request()->is('user/live-lessons') ? 'active' : '' }}"
       href="{{route('user.live-lessons')}}">
        <i class="bi bi-camera-video fs-4"></i>
        <span class="sidebar-menu-text">{{__('user/menu.live_lesson')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left d-md-none d-lg-none d-xl-none d-xxl-none {{ request()->is('user/support') ? 'active' : '' }}"
       href="{{route('user.support')}}">
        <i class="bi bi-info-circle fs-4"></i>
        <span class="sidebar-menu-text">{{__('user/menu.support')}}</span>
    </a>
</a>
