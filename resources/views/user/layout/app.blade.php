<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Quiz app uygulaması codenteq adı altında yazılmış bir online sınav uygulamasıdır.">
    <meta name="generator" content="Quiz App">
    @yield('meta')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet"
          type="text/css">

    <link rel="icon" href="{{asset('images/c-icon.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    </style>
    @yield('css')
</head>
<body>

<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end d-flex d-sm-flex" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom fw-bold">
            <div style="font-size: 1rem !important; width: 200px !important;"
                 class="list-group list-group-flush sidebar-menu">

                <img src="{{asset('images/codenteq-logo.png')}}" class="mb-3" alt="logo">

                <a class="list-group-item list-group-item-action d-none d-md-block text-center {{ request()->is('user/dashboard') ? 'active' : '' }}"
                   href="{{route('user.dashboard')}}">
                    <i class="fa fa-home fa-2x"></i><br>
                    <span style="position: relative;">Ana Sayfa</span>
                </a>

                <a class="list-group-item list-group-item-action d-none d-md-block text-center {{ request()->is('user/lesson*') ? 'active' : '' }}"
                   href="{{route('user.lesson.index')}}">
                    <i class="fa fa-book fa-2x"></i><br>
                    <span style="position: relative;">Derslerim</span>
                </a>
                <a class="list-group-item list-group-item-action d-none d-md-block text-center {{ request()->is('user/exams') ? 'active' : '' }}"
                   href="{{route('user.exams')}}">
                    <i class="fa fa-laptop fa-2x"></i><br>
                    Online Sınavlarım
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('user/class-exams') ? 'active' : '' }}"
                   href="{{route('user.class-exams')}}">
                    <i class="fa fa-users fa-2x"></i><br>
                    Sınıf Sınavlarım
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('user/result') ? 'active' : '' }}"
                   href="{{route('user.results')}}">
                    <i class="fas fa-file-contract fa-2x"></i><br>
                    Sınav Sonuçlarım
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('user/appointment') ? 'active' : '' }}"
                   href="{{route('user.appointment.index')}}">
                    <i class="fa fa-hourglass-start fa-2x"></i><br>
                    Randevularım
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('user/live-lessons') ? 'active' : '' }}"
                   href="{{route('user.live-lessons')}}">
                    <i class="fas fa-video fa-2x"></i><br>
                    Canlı Ders
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('user/support') ? 'active' : '' }}"
                   href="{{route('user.support')}}">
                    <i class="fa fa-question-circle fa-2x"></i><br>
                    Destek
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('user/notifications') ? 'active' : '' }}"
                   href="{{route('user.notifications')}}">
                    <i class="fa fa-bell fa-2x"></i><br>
                    Bildirimler
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
                        <li class="nav-item active"><a
                                class="nav-link">Hoşgeldiniz, {{auth()->user()->name .' '. auth()->user()->surname}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{imagePath(auth()->user()->info->photo)}}" class="rounded-circle" height="30"
                                     alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('user.profile')}}">Profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout-user')}}">Çıkış Yap</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        @yield('content')



        <nav class="navbar fixed-bottom bottom-navigation-mb d-flex justify-content-around  d-md-none d-lg-none d-xl-none d-xxl-none">
            <ul class="navbar-list mx-auto ">
                <li class="navbar-item">
                    <a class="navbar-link" id="sidebarToggleM" >
                        <i class="bi bi-list navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('user/dashboard') ? 'active' : '' }}" href="{{route('user.dashboard')}}">
                        <i class="bi bi-house navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('user/exams*') ? 'active' : '' }}" href="{{route('user.exams')}}">
                        <i class="bi bi-laptop navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('user/notifications*') ? 'active' : '' }}" href="{{route('user.notifications')}}">
                        <i class="bi bi-bell navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('user/profile*') ? 'active' : '' }}" href="{{route('user.profile')}}">
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
@yield('js')
</html>
