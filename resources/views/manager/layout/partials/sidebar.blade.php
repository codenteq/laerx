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
        <li><a class="dropdown-item {{ session('invoice') == true ? 'disabled' : null}}"
               href="{{route('manager.profile.edit')}}">{{__('manager/menu.profile')}}</a></li>
        <li><a class="dropdown-item {{ session('invoice') == true ? 'disabled' : null}}"
               href="{{route('manager.company.edit')}}">{{__('manager/menu.company')}}</a></li>
        <li><a class="dropdown-item" href="{{route('manager.invoice.index')}}">{{__('manager/menu.invoices')}}</a></li>
        <li><a class="dropdown-item" href="{{route('logout-user')}}">{{__('manager/menu.logout')}}</a></li>
    </ul>

    <a class="list-group-item list-group-item-action d-none d-md-block text-left {{ request()->is('manager/dashboard') ? 'active' : '' }}"
       href="{{route('manager.dashboard')}}">
        <i class="bi bi-house fs-4"></i>
        <span class="sidebar-menu-text">{{__('manager/menu.home')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left {{ request()->is('manager/user-operations*', 'manager/user*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
       type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-people fs-4"></i>
        <span class="sidebar-menu-text">{{__('manager/menu.trainee_transactions')}}</span>
        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
    </a>

    <ul class="dropdown-menu sidebar-dropdown-open" aria-labelledby="dropdownMenuButton3">
        <span class="text-secondary ms-2">STUDENT</span>
        <li><a class="dropdown-item" href="{{route('manager.user.index')}}">{{__('manager/menu.trainee_list')}}</a></li>
        <li><a class="dropdown-item" href="{{route('manager.user.results')}}">{{__('manager/menu.trainee_report')}}</a>
        </li>
        <li><a class="dropdown-item" href="{{route('manager.user.create')}}">{{__('manager/menu.new_trainee')}}</a></li>
        <li><a class="dropdown-item"
               href="{{route('manager.user.excel-import')}}">{{__('manager/menu.new_trainee_excel')}}</a></li>
        <li><a class="dropdown-item" href="{{route('manager.user.mebbis.import')}}">Mebbis Beta</a></li>
    </ul>

    <a class="list-group-item list-group-item-action text-left {{ request()->is('manager/question*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
       href="{{route('manager.question.index')}}">
        <i class="bi bi-question-circle fs-4"></i>
        <span class="sidebar-menu-text">{{__('manager/menu.questions')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left {{ request()->is('manager/class-exam*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
       href="{{route('manager.class-exam.index')}}">
        <i class="bi bi-file-richtext fs-4"></i>
        <span class="sidebar-menu-text">{{__('manager/menu.class_exams')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left {{ request()->is('manager/live-lesson*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
       href="{{route('manager.live-lesson.index')}}">
        <i class="bi bi-camera-video fs-4"></i>
        <span class="sidebar-menu-text">{{__('manager/menu.live_lesson')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left {{ request()->is('manager/course-teacher*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
       href="{{route('manager.course-teacher.index')}}">
        <i class="bi bi-person-plus fs-4"></i>
        <span class="sidebar-menu-text">{{__('manager/menu.teachers')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left d-md-none d-lg-none d-xl-none d-xxl-none {{ request()->is('manager/notification*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
       href="{{route('manager.notification.index')}}">
        <i class="bi bi-bell fs-4"></i>
        <span class="sidebar-menu-text">{{__('manager/menu.notifications')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left d-md-none d-lg-none d-xl-none d-xxl-none {{ request()->is('manager/support*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
       href="{{route('manager.support.index')}}">
        <i class="bi bi-info-circle fs-4"></i>
        <span class="sidebar-menu-text">{{__('manager/menu.support')}}</span>
    </a>

    <a class="list-group-item list-group-item-action text-left {{ request()->is('manager/appointment-car*', 'manager/car*', 'manager/appointment*', 'manager/appointment-setting*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
       type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-calendar4-range fs-4"></i>
        <span class="sidebar-menu-text">{{__('manager/menu.car_appointment')}}</span>
        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
    </a>

    <ul class="dropdown-menu sidebar-dropdown-open" aria-labelledby="dropdownMenuButton2">
        <span class="text-secondary ms-2">BOOKING</span>
        <li><a class="dropdown-item" href="{{route('manager.car.index')}}">{{__('manager/menu.car')}}</a></li>
        <li><a class="dropdown-item"
               href="{{route('manager.appointment.index')}}">{{__('manager/menu.appointment')}}</a></li>
        <li><a class="dropdown-item"
               href="{{route('manager.appointment.setting')}}">{{__('manager/menu.appointment_setting')}}</a></li>
    </ul>
</a>
