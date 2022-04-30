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
    <link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/x-icon"/>
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

                <a class="sidebar-logo-link d-md-none d-lg-none d-xl-none d-xxl-none" href="{{route('admin.dashboard')}}">
                    <img class="sidebar-logo" src="{{asset('images/laerx.png')}}" alt="logo">
                </a>

                <a class="sidebar-menu-list">
                    <a class="list-group-item list-group-item-action d-none d-md-block text-left {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                       href="{{route('admin.dashboard')}}">
                        <i class="bi bi-house fs-4"></i>
                        <span class="sidebar-menu-text">Ana Sayfa</span>
                    </a>
                    <a class="list-group-item list-group-item-action d-none d-md-block text-left {{ request()->is('admin/company*') ? 'active' : '' }}"
                       href="{{route('admin.company.index')}}">
                        <i class="bi bi-building fs-4"></i>
                        <span class="sidebar-menu-text">Şirketler</span>
                    </a>
                    <a class="list-group-item list-group-item-action d-none d-md-block text-left {{ request()->is('admin/manager-user*') ? 'active' : '' }}"
                       href="{{route('admin.manager-user.index')}}">
                        <i class="bi bi-people fs-4"></i>
                        <span class="sidebar-menu-text">Kullanıcılar</span>
                    </a>
                    <a class="list-group-item list-group-item-action text-left {{ request()->is('admin/lesson-content*') ? 'active' : '' }}"
                       href="{{route('admin.lesson-content.index')}}">
                        <i class="bi bi-book fs-4"></i>
                        <span class="sidebar-menu-text">Dersler</span>
                    </a>
                    <a class="list-group-item list-group-item-action text-left {{ request()->is('admin/question*') ? 'active' : '' }}"
                       href="{{route('admin.question.index')}}">
                        <i class="bi bi-question-circle fs-4"></i>
                        <span class="sidebar-menu-text">Sorular</span>
                    </a>
                    <a class="list-group-item list-group-item-action text-left {{ request()->is('admin/setting-dashboard*') ? 'active' : '' }} {{ request()->is('admin/language*') ? 'active' : '' }} {{ request()->is('admin/group*') ? 'active' : '' }} {{ request()->is('admin/period*') ? 'active' : '' }} {{ request()->is('admin/type*') ? 'active' : '' }} {{ request()->is('admin/coupon*') ? 'active' : '' }} {{ request()->is('admin/car-type*') ? 'active' : '' }} {{ request()->is('admin/package*') ? 'active' : '' }}"
                       href="{{route('admin.setting.dashboard')}}">
                        <i class="bi bi-gear fs-4"></i>
                        <span class="sidebar-menu-text">Sistem Ayarları</span>
                    </a>
                    <a class="list-group-item list-group-item-action text-left d-md-none d-lg-none d-xl-none d-xxl-none mb-5" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4"></i>
                        <span class="sidebar-menu-text">Hesap</span>
                    </a>
                    <ul class="dropdown-menu sidebar-dropdown-open d-md-none d-lg-none d-xl-none d-xxl-none" aria-labelledby="dropdownMenuButton1">
                        <span class="text-secondary ms-2">Version : {{ app()->version() }}</span>
                        <li><a class="dropdown-item" href="{{route('admin.profile.edit')}}">Hesabım</a></li>
                        <li><a class="dropdown-item" href="{{route('logout-user')}}">Çıkış Yap</a></li>
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

                <a class="navbar-logo-link" href="{{route('admin.dashboard')}}">
                    <img class="sidebar-logo" src="{{asset('images/laerx.png')}}" alt="logo">
                </a>

                <div class="collapse navbar-collapse d-none d-sm-block" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item me-2">
                            <a class="nav-link navbar-border">
                                <i class="bi bi-bell fs-4 ms-2"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link navbar-border" id="navbarDropdown" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="bi bi-person-circle fs-4"></i>
                                <span class="name">{{auth()->user()->name .' '. auth()->user()->surname}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-open" aria-labelledby="navbarDropdown">
                                <span class="text-secondary ms-2">Version : {{ app()->version() }}</span>
                                <a class="dropdown-item" href="{{route('admin.profile.edit')}}">Profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout-user')}}">Çıkış Yap</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content-app">
            @yield('content')
        </div>

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
                    <a class="navbar-link {{ request()->is('manager/dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                        <i class="bi bi-house navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('manager/user-results*') ? 'active' : '' }}" href="{{route('admin.manager-user.index')}}">
                        <i class="bi bi-people navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link" href="{{route('admin.profile.edit')}}">
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
