<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="dc.language" content="{{ app()->getLocale() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Quiz app uygulaması codenteq adı altında yazılmış bir online sınav uygulamasıdır.">
    <meta name="author" content="Ahmet Arşiv">
    <meta name="generator" content="Quiz App">
    @yield('meta')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="icon" href="{{companyLogo()}}" type="image/x-icon"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9FJZSZQ37J"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-9FJZSZQ37J');
    </script>

    <!-- Hotjar Tracking Code for https://codenteq.com -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2746432,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    @yield('css')

</head>
<body>

<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end d-flex d-sm-flex" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom fw-bold">
            <div class="list-group list-group-flush sidebar-menu">

                <a class="sidebar-logo-link d-md-none d-lg-none d-xl-none d-xxl-none" href="{{route('manager.dashboard')}}">
                    <img class="sidebar-logo" src="{{ companyLogo() }}" alt="logo">
                </a>

                <a class="sidebar-menu-list">
                    <a class="list-group-item list-group-item-action d-none d-md-block text-left {{ request()->is('manager/dashboard') ? 'active' : '' }}"
                       href="{{route('manager.dashboard')}}">
                        <i class="bi bi-house fs-4"></i>
                        <span class="sidebar-menu-text">{{__('manager/menu.home')}}</span>
                    </a>

                    <a class="list-group-item list-group-item-action text-left {{ request()->is('manager/user-operations*', 'manager/user*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-people fs-4"></i>
                        <span class="sidebar-menu-text">{{__('manager/menu.trainee_transactions')}}</span>
                        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
                    </a>
                    <ul class="dropdown-menu sidebar-dropdown-open" aria-labelledby="dropdownMenuButton3">
                        <span class="text-secondary ms-2">STUDENT</span>
                        <li><a class="dropdown-item" href="{{route('manager.user.index')}}">{{__('manager/menu.trainee_list')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('manager.user.results')}}">{{__('manager/menu.trainee_report')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('manager.user.create')}}">{{__('manager/menu.new_trainee')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('manager.user.excel-import')}}">{{__('manager/menu.new_trainee_excel')}}</a></li>
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

                    <a class="list-group-item list-group-item-action text-left {{ request()->is('manager/appointment-car*', 'manager/car*', 'manager/appointment*', 'manager/appointment-setting*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-calendar4-range fs-4"></i>
                        <span class="sidebar-menu-text">{{__('manager/menu.car_appointment')}}</span>
                        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
                    </a>
                    <ul class="dropdown-menu sidebar-dropdown-open" aria-labelledby="dropdownMenuButton2">
                        <span class="text-secondary ms-2">BOOKING</span>
                        <li><a class="dropdown-item" href="{{route('manager.car.index')}}">{{__('manager/menu.car')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('manager.appointment.index')}}">{{__('manager/menu.appointment')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('manager.appointment.setting')}}">{{__('manager/menu.appointment_setting')}}</a></li>
                    </ul>

                    <a class="list-group-item list-group-item-action text-left d-md-none d-lg-none d-xl-none d-xxl-none mb-5 {{ request()->is('manager/profile*', 'manager/company*', 'manager/invoice*') ? 'active' : '' }}" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4"></i>
                        <span class="sidebar-menu-text">Hesap</span>
                        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
                    </a>
                    <ul class="dropdown-menu sidebar-dropdown-open d-md-none d-lg-none d-xl-none d-xxl-none" aria-labelledby="dropdownMenuButton1">
                        <span class="text-secondary ms-2">ACCOUNT</span>
                        <li><a class="dropdown-item {{ session('invoice') == true ? 'disabled' : null}}" href="{{route('manager.profile.edit')}}">{{__('manager/menu.profile')}}</a></li>
                        <li><a class="dropdown-item {{ session('invoice') == true ? 'disabled' : null}}" href="{{route('manager.company.edit')}}">{{__('manager/menu.company')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('manager.invoice.index')}}">{{__('manager/menu.invoices')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('logout-user')}}">{{__('manager/menu.logout')}}</a></li>
                    </ul>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-toggle-button">
        <a class="btn btn-light" id="sidebarToggle"><i class="bi bi-list fs-4"></i></a>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar-top navbar navbar-expand-lg navbar-light bg-light border-bottom d-none d-md-block">
            <div class="container-fluid">

                <a class="navbar-logo-link" href="{{route('manager.dashboard')}}">
                    <img class="sidebar-logo" src="{{ companyLogo() }}" alt="logo">
                </a>

                <div class="collapse navbar-collapse d-none d-sm-block" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item me-2">
                            <a href="{{route('manager.support.index')}}" class="nav-link navbar-border {{ session('invoice') == true ? 'disabled' : null}}">
                                <i class="bi bi-info-circle fs-4 ms-2"></i>
                            </a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="{{route('manager.notification.index')}}" class="nav-link navbar-border {{ session('invoice') == true ? 'disabled' : null}}">
                                <i class="bi bi-bell fs-4 ms-2"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link navbar-border" id="navbarDropdown" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{imagePath(auth()->user()->info->photo)}}" class="rounded-circle" height="30" alt="">
                                <span class="name">{{auth()->user()->name .' '. auth()->user()->surname}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-open" aria-labelledby="navbarDropdown">
                                <span class="text-secondary ms-2">ACCOUNT</span>
                                <a class="dropdown-item {{ session('invoice') == true ? 'disabled' : null}}" href="{{route('manager.profile.edit')}}">{{__('manager/menu.profile')}}</a>
                                <a class="dropdown-item {{ session('invoice') == true ? 'disabled' : null}}" href="{{route('manager.company.edit')}}">{{__('manager/menu.company')}}</a>
                                <a class="dropdown-item" href="{{route('manager.invoice.index')}}">{{__('manager/menu.invoices')}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout-user')}}">{{__('manager/menu.logout')}}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content-app">
            @yield('content')
        </div>

        <nav class="navbar fixed-bottom bottom-navigation-mb d-flex justify-content-around d-md-none d-lg-none d-xl-none d-xxl-none">
            <ul class="navbar-list mx-auto ">
                <li class="navbar-item">
                    <a class="navbar-link" id="sidebarToggleM" >
                        <i class="bi bi-list navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link text-secondary {{ request()->is('manager/appointment*') ? 'active' : '' }}" href="{{route('manager.appointment.index')}}">
                        <i class="bi bi-calendar4-range navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('manager/dashboard') ? 'active' : '' }}" href="{{route('manager.dashboard')}}">
                        <i class="bi bi-house navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('manager/user*') ? 'active' : '' }}" href="{{route('manager.user.results')}}">
                        <i class="bi bi-clipboard-data navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('manager/profile*') ? 'active' : '' }}" href="{{route('manager.profile.edit')}}">
                        <i class="bi bi-person navbar-link-icon"></i>
                    </a>
                </li>


                <div class="navbar-underscore"></div>
            </ul>
        </nav>

    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>
<script>
    VMasker(document.getElementsByName('phone')).maskPattern("(999) 999-9999");
</script>
@yield('js')
</html>
