<nav class="navbar-top navbar navbar-expand-lg navbar-light bg-light border-bottom d-none d-md-block">
    <div class="container-fluid">

        <a class="navbar-logo-link" href="{{route('teacher.appointment.index')}}">
            <img class="sidebar-logo" src="{{companyLogo()}}" alt="logo">
        </a>

        <div class="collapse navbar-collapse d-none d-sm-block" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-border" id="navbarDropdown" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(!auth()->user()->info->photo)
                            <div class="profile-info-icon-nav"><span>{{ auth()->user()->name[0] }}</span></div>
                            <span class="name">
                                {{auth()->user()->name .' '. auth()->user()->surname}}
                                <p class="role">{{auth()->user()->type == 3 ? 'Teacher' : 'null'}}</p>
                            </span>
                        @else
                            <img src="{{imagePath(auth()->user()->info->photo)}}" class="rounded-circle me-1"
                                 height="30" alt="">
                            <span class="name">
                                {{auth()->user()->name .' '. auth()->user()->surname}}
                                <p class="role">{{auth()->user()->type == 3 ? 'Teacher' : 'null'}}</p>
                            </span>
                        @endif
                        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-open" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"
                           href="{{route('teacher.profile.index')}}">{{__('teacher/menu.profile')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout-user')}}">{{__('teacher/menu.logout')}}</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
