<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Quiz app uygulaması codenteq adı altında yazılmış bir online sınav uygulamasıdır.">
    <meta name="author" content="Ahmet Arşiv">
    <meta name="generator" content="Quiz App">
    @yield('meta')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="icon" href="{{companyLogo()}}" type="image/x-icon"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    @yield('css')

    @laravelPWA
</head>
<body>

<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end d-flex d-sm-flex" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom fw-bold">
            <div style="font-size: 1rem !important; width: 200px !important;"
                 class="list-group list-group-flush sidebar-menu">
                <img src="{{companyLogo()}}" class="mb-3" alt="logo">

                <a class="list-group-item list-group-item-action d-none d-md-block text-center {{ request()->is('manager/dashboard') ? 'active' : '' }}"
                   href="{{route('manager.dashboard')}}">
                    <i class="bi bi-house fs-1"></i><br>
                    <span style="position: relative;">{{__('manager/menu.home')}}</span>
                </a>
                <a class="list-group-item list-group-item-action d-none d-md-block text-center {{ request()->is('manager/user-operations*') ? 'active' : '' }} {{ request()->is('manager/user*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
                   href="{{route('manager.user.operations')}}">
                    <i class="bi bi-people fs-1"></i><br>
                    <span style="position: relative;">{{__('manager/menu.trainee_transactions')}}</span>
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('manager/question*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
                   href="{{route('manager.question.index')}}">
                    <i class="bi bi-question-circle fs-1"></i><br>
                    {{__('manager/menu.questions')}}
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('manager/class-exam*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
                   href="{{route('manager.class-exam.index')}}">
                    <i class="bi bi-file-richtext fs-1"></i><br>
                    {{__('manager/menu.class_exams')}}
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('manager/live-lesson*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
                   href="{{route('manager.live-lesson.index')}}">
                    <i class="bi bi-camera-video fs-1"></i><br>
                    {{__('manager/menu.live_lesson')}}
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('manager/course-teacher*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
                   href="{{route('manager.course-teacher.index')}}">
                    <i class="bi bi-person-plus fs-1"></i><br>
                    {{__('manager/menu.teachers')}}
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('manager/appointment-car*') ? 'active' : '' }} {{ request()->is('manager/car*') ? 'active' : '' }}{{ request()->is('manager/appointment*') ? 'active' : '' }} {{ request()->is('manager/appointment-setting*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
                   href="{{route('manager.appointment-car')}}">
                    <i class="bi bi-calendar4-range fs-1"></i><br>
                    {{__('manager/menu.car_appointment')}}
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('manager/notification*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
                   href="{{route('manager.notification.index')}}">
                    <i class="bi bi-bell fs-1"></i><br>
                    {{__('manager/menu.notifications')}}
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('manager/support*') ? 'active' : '' }} {{ session('invoice') == true ? 'disabled' : null}}"
                   href="{{route('manager.support.index')}}">
                    <i class="bi bi-info-circle fs-1"></i><br>
                    {{__('manager/menu.support')}}
                </a>
                <a class="list-group-item list-group-item-action text-center mb-5" href="{{route('logout-user')}}">
                    <i class="bi bi-box-arrow-right fs-1"></i><br>
                    {{__('manager/menu.logout')}}
                </a>
            </div>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom d-none d-md-block">
            <div class="container-fluid">
                <button class="btn btn-light" id="sidebarToggle"><i class="bi bi-list fs-4"></i></button>
                <button class="navbar-toggler d-none d-sm-block d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-none d-sm-block" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active"><a
                                class="nav-link">{{__('manager/menu.welcome')}}, {{auth()->user()->name .' '. auth()->user()->surname}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{imagePath(auth()->user()->info->photo)}}" class="rounded-circle" height="30" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('manager.profile.edit')}}">{{__('manager/menu.profile')}}</a>
                                <a class="dropdown-item" href="{{route('manager.company.edit')}}">{{__('manager/menu.company')}}</a>
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

        <nav class="navbar fixed-bottom bottom-navigation-mb d-flex justify-content-around  d-md-none d-lg-none d-xl-none d-xxl-none">
            <ul class="navbar-list mx-auto ">
                <li class="navbar-item">
                    <a class="navbar-link" id="sidebarToggleM" >
                        <i class="bi bi-list navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link text-secondary {{ request()->is('user/user-operations*') ? 'active' : '' }}" href="{{route('manager.user.operations')}}">
                        <i class="bi bi-people navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('manager/dashboard') ? 'active' : '' }}" href="{{route('manager.dashboard')}}">
                        <i class="bi bi-house navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('manager/user-results*') ? 'active' : '' }}" href="{{route('manager.user.results')}}">
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
