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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9FJZSZQ37J"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-9FJZSZQ37J');
    </script>

    <link rel="icon" href="{{companyLogo()}}" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
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

                <a class="sidebar-logo-link d-md-none d-lg-none d-xl-none d-xxl-none" href="{{route('teacher.appointment.index')}}">
                    <img class="sidebar-logo" src="{{companyLogo()}}" alt="logo">
                </a>

                <a class="sidebar-menu-list">
                    <a class="list-group-item list-group-item-action d-none d-md-block text-left {{ request()->is('teacher/appointment') ? 'active' : '' }}"
                       href="{{route('teacher.appointment.index')}}">
                        <i class="bi bi-calendar3 fs-4"></i>
                        <span class="sidebar-menu-text">{{__('teacher/appointment.my_appointment')}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action text-left d-md-none d-lg-none d-xl-none d-xxl-none mb-5" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4"></i>
                        <span class="sidebar-menu-text">{{__('teacher/profile.profile')}}</span>
                    </a>
                    <ul class="dropdown-menu sidebar-dropdown-open d-md-none d-lg-none d-xl-none d-xxl-none" aria-labelledby="dropdownMenuButton1">
                        <span class="text-secondary ms-2">ACCOUNT</span>
                        <li><a class="dropdown-item" href="{{route('teacher.profile.index')}}">{{__('teacher/profile.profile')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('logout-user')}}">{{__('teacher/menu.logout')}}</a></li>
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

                <a class="navbar-logo-link" href="{{route('teacher.appointment.index')}}">
                    <img class="sidebar-logo" src="{{companyLogo()}}" alt="logo">
                </a>

                <div class="collapse navbar-collapse d-none d-sm-block" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link navbar-border" id="navbarDropdown" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{imagePath(auth()->user()->info->photo)}}" class="rounded-circle" height="30" alt="logo">
                                <span class="name">{{auth()->user()->name .' '. auth()->user()->surname}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-open" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('teacher.profile.index')}}">{{__('teacher/menu.profile')}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout-user')}}">{{__('teacher/menu.logout')}}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content-app">
            @yield('content')
        </div>

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
