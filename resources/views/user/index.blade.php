@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Ana Sayfa</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Ana Sayfa</a></li>
                    </ol>
                </nav>
            </figure>

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.live-lessons')}}">
                            <i class="bi bi-camera-video fs-1"></i><br>
                            <span>Canlı Ders</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.lesson.index')}}">
                            <i class="bi bi-book fs-1"></i><br>
                            <span>Derslerim</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.exams')}}">
                            <i class="bi bi-laptop fs-1"></i><br>
                            <span>Online Sınavlarım</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.class-exams')}}">
                            <i class="bi bi-people fs-1"></i><br>
                            <span>Sınıf Sınavlarım</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.results')}}">
                            <i class="bi bi-file-earmark-text fs-1"></i><br>
                            <span>Sınav Sonuçlarım</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5">
                        <a href="{{route('user.support')}}">
                            <i class="bi bi-info-circle fs-1"></i><br>
                            <span>Destek</span>
                        </a>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>Panel</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
