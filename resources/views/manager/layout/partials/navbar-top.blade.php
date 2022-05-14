<nav class="navbar-top navbar navbar-expand-lg navbar-light bg-light border-bottom d-none d-md-block">
    <div class="container-fluid">

        <a class="navbar-logo-link" href="{{route('manager.dashboard')}}">
            <img class="sidebar-logo" src="{{ companyLogo() }}" alt="logo">
        </a>

        <div class="collapse navbar-collapse d-none d-sm-block" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item me-2">
                    <a href="{{route('manager.support.index')}}"
                       class="nav-link navbar-border {{ session('invoice') == true ? 'disabled' : null}}">
                        <i class="bi bi-info-circle fs-4 ms-2"></i>
                    </a>
                </li>
                <li class="nav-item me-2">
                    <a href="{{route('manager.notification.index')}}"
                       class="nav-link navbar-border {{ session('invoice') == true ? 'disabled' : null}}">
                        <i class="bi bi-bell fs-4 ms-2"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-border" id="navbarDropdown" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(!auth()->user()->info->photo)
                            <div class="profile-info-icon-nav"><span>{{ auth()->user()->name[0] }}</span></div>
                            <span class="name">
                                {{auth()->user()->name .' '. auth()->user()->surname}}
                                <p class="role">{{auth()->user()->type == 2 ? 'Manager' : 'null'}}</p>
                            </span>
                        @else
                            <img src="{{imagePath(auth()->user()->info->photo)}}" class="rounded-circle me-1" height="30" alt="">
                            <span class="name">
                                {{auth()->user()->name .' '. auth()->user()->surname}}
                                <p class="role">{{auth()->user()->type == 2 ? 'Manager' : 'null'}}</p>
                            </span>
                        @endif
                        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-open" aria-labelledby="navbarDropdown">
                        <span class="text-secondary ms-2">ACCOUNT</span>
                        <a class="dropdown-item {{ session('invoice') == true ? 'disabled' : null}}"
                           href="{{route('manager.profile.edit')}}">{{__('manager/menu.profile')}}</a>
                        <a class="dropdown-item {{ session('invoice') == true ? 'disabled' : null}}"
                           href="{{route('manager.company.edit')}}">{{__('manager/menu.company')}}</a>
                        <a class="dropdown-item"
                           href="{{route('manager.invoice.index')}}">{{__('manager/menu.invoices')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout-user')}}">{{__('manager/menu.logout')}}</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
