<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Quiz app uygulaması codenteq adı altında yazılmış bir online sınav uygulamasıdır.">
    <meta name="author" content="Ahmet Arşiv">
    <meta name="generator" content="Quiz App">
    @yield('meta')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="icon" href="{{asset('images/c-icon.png')}}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    @yield('css')
</head>
<body>

<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end d-flex d-sm-flex" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom fw-bold">
            <span style="font-family: MADE Tommy Soft; font-size: 38px;">Codente</span><span style="font-family: MADE Tommy Soft Outline; font-size: 38px;">q</span><br>
            <span style="font-weight: normal !important;"><small>v1.0.0-Beta</small></span>
            <div style="font-size: 1rem !important; width: 200px !important;" class="list-group list-group-flush sidebar-menu">
                <a class="list-group-item list-group-item-action d-none d-md-block text-center {{ request()->is('manager/dashboard') ? 'active' : '' }}" href="{{route('manager.dashboard')}}">
                    <i class="fa fa-home fa-2x"></i><br>
                    <span style="position: relative;">Ana Sayfa</span>
                </a>
                <a class="list-group-item list-group-item-action d-none d-md-block text-center {{ request()->is('manager/user-operations') ? 'active' : '' }} {{ request()->is('manager/user/create') ? 'active' : '' }} {{ request()->is('manager/user') ? 'active' : '' }}" href="{{route('manager.user-operations')}}">
                    <i class="fas fa-users-cog fa-2x"></i><br>
                    <span style="position: relative;">Kursiyer İşlemleri</span>
                </a>
                <a class="list-group-item list-group-item-action d-none d-md-block text-center {{ request()->is('manager/user-results') ? 'active' : '' }}" href="{{route('manager.user-results')}}">
                    <i class="fa fa-chart-pie fa-2x"></i><br>
                    Kursiyer Raporları
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('manager/live-lessons') ? 'active' : '' }} {{ request()->is('manager/live-lessons/create') ? 'active' : '' }}" href="{{route('manager.live-lessons.index')}}">
                    <i class="fas fa-video fa-2x"></i><br>
                    Canlı Ders
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('manager/course-teachers') ? 'active' : '' }} {{ request()->is('manager/course-teachers/create') ? 'active' : '' }}" href="{{route('manager.course-teachers.index')}}">
                    <i class="fas fa-chalkboard-teacher fa-2x"></i><br>
                    Eğitmenler
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('manager/appointment') ? 'active' : '' }} {{ request()->is('manager/cars') ? 'active' : '' }} {{ request()->is('manager/cars/create') ? 'active' : '' }} {{ request()->is('manager/appointments') ? 'active' : '' }} {{ request()->is('manager/appointments/create') ? 'active' : '' }}" href="{{route('manager.appointment')}}">
                    <i class="fa fa-car fa-2x"></i><br>
                    Araç & Randevu
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('manager/notifications') ? 'active' : '' }}" href="{{route('manager.notifications')}}">
                    <i class="fa fa-bell fa-2x"></i><br>
                    Bildirimler
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('manager/supports') ? 'active' : '' }}" href="{{route('manager.supports')}}">
                    <i class="fas fa-headset fa-2x"></i><br>
                    Destek
                </a>
                <a class="list-group-item list-group-item-action text-center mb-5" href="{{route('logout')}}">
                    <i class="fas fa-sign-out-alt fa-2x"></i><br>
                    Çıkış Yap
                </a>
            </div>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom d-none d-md-block">
            <div class="container-fluid">
                <button class="btn btn-light" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>
                <button class="navbar-toggler d-none d-sm-block d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-none d-sm-block" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active"><a class="nav-link">Hoşgeldiniz, Ahmet Arşiv</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-user-circle fa-lg"></i></a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/user/profile">Profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}">Çıkış Yap</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <nav class="navbar fixed-bottom navbar-light bg-light bottom-navigation d-flex flex-row d-md-none d-lg-none d-xl-none d-xxl-none">
            <a class="btn btn-light" id="sidebarToggleM"><span class="fa fa-bars"></span></a>
            <a class="list-unstyled link-dark text-decoration-none" href="{{route('manager.dashboard')}}"><i class="fas fa-home"></i></a>
            <a class="list-unstyled link-dark text-decoration-none" href="{{route('manager.user-operations')}}"><i class="fas fa-users-cog"></i></a>
            <a class="list-unstyled link-dark text-decoration-none" href="{{route('manager.user-results')}}"><i class="fa fa-chart-pie"></i></a>
        </nav>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>
@yield('js')
</html>