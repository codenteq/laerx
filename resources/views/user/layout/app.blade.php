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
    <meta name="generator" content="Quiz App">
    @yield('meta')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet"
          type="text/css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9FJZSZQ37J"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-9FJZSZQ37J');
    </script>

    <link rel="icon" href="{{companyLogo()}}" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    </style>
    @yield('css')

</head>
<body>

<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end d-flex d-sm-flex" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom  fw-bold">
            <div class="list-group list-group-flush sidebar-menu">

                <a class="sidebar-logo-link d-md-none d-lg-none d-xl-none d-xxl-none" href="{{route('user.dashboard')}}">
                    <img class="sidebar-logo" src="{{companyLogo()}}" alt="logo">
                </a>

                <a class="sidebar-menu-list">
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
                    <a class="list-group-item list-group-item-action text-left d-md-none d-lg-none d-xl-none d-xxl-none mb-5" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4"></i>
                        <span class="sidebar-menu-text">{{__('user/menu.profile')}}</span>
                    </a>
                    <ul class="dropdown-menu sidebar-dropdown-open d-md-none d-lg-none d-xl-none d-xxl-none" aria-labelledby="dropdownMenuButton1">
                        <span class="text-secondary ms-2">ACCOUNT</span>
                        <li><a class="dropdown-item" href="{{route('user.profile')}}">{{__('user/menu.profile')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('logout-user')}}">{{__('user/menu.logout')}}</a></li>
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

                <a class="navbar-logo-link" href="{{route('user.dashboard')}}">
                    <img class="sidebar-logo" src="{{companyLogo()}}" alt="logo">
                </a>

                <div class="collapse navbar-collapse d-none d-sm-block" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item me-2">
                            <a href="{{route('user.support')}}" class="nav-link navbar-border">
                                <i class="bi bi-info-circle fs-4 ms-2"></i>
                            </a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="{{route('user.notifications')}}" class="nav-link navbar-border">
                                <i class="bi bi-bell fs-4 ms-2"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link navbar-border" id="navbarDropdown" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{imagePath(auth()->user()->info->photo)}}" class="rounded-circle" height="30">
                                <span class="name">{{auth()->user()->name .' '. auth()->user()->surname}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-open" aria-labelledby="navbarDropdown">
                                <span class="text-secondary ms-2">ACCOUNT</span>
                                <a class="dropdown-item" href="{{route('user.profile')}}">{{__('user/menu.profile')}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout-user')}}">{{__('user/menu.logout')}}</a>
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
                    <a class="navbar-link" id="sidebarToggleM">
                        <i class="bi bi-list navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('user/exams*') ? 'active' : '' }}"
                       href="{{route('user.exams')}}">
                        <i class="bi bi-laptop navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('user/dashboard') ? 'active' : '' }}"
                       href="{{route('user.dashboard')}}">
                        <i class="bi bi-house navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('user/notifications*') ? 'active' : '' }}"
                       href="{{route('user.notifications')}}">
                        <i class="bi bi-bell navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('user/profile*') ? 'active' : '' }}"
                       href="{{route('user.profile')}}">
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

<script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
<script>
    const firebaseConfig = {
        apiKey: "AIzaSyBUns1e3HP2upPDJJlB5P0RTrzIshIJXAc",
        authDomain: "codenteq-d84d9.firebaseapp.com",
        projectId: "codenteq-d84d9",
        storageBucket: "codenteq-d84d9.appspot.com",
        messagingSenderId: "325466526937",
        appId: "1:325466526937:web:ae87a4b499ae76ddc61ac8"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();
    messaging.requestPermission()
        .then(function () {
            console.log('Notification permission granted.');
            return messaging.getToken()
        })
        .then(function (token) {
            axios.post('{{route('user.token')}}', {
                'userId': {{auth()->id()}},
                'token': token
            })
        })
        .catch(function (err) {
            console.log('Unable to get permission to notify.', err);
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>
<script>
    VMasker(document.getElementsByName('phone')).maskPattern("(999) 999-9999");
    localStorage.setItem('auth',{{auth()->id()}});
</script>
@yield('js')
</html>
