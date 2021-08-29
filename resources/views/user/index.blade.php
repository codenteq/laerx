@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Ana Sayfa</h2>
                </blockquote>
                <figcaption>
                    <span><i class="fas fa-home"></i> Ana Sayfa</span>
                </figcaption>
            </figure>

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.live-lessons')}}">
                            <i class="fas fa-video fa-4x"></i><br>
                            <span>Canlı Ders</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.lessons.index')}}">
                            <i class="fa fa-book fa-4x"></i><br>
                            <span>Derslerim</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.exams')}}">
                            <i class="fa fa-laptop fa-4x"></i><br>
                            <span>Online Sınavlarım</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.class-exams')}}">
                            <i class="fa fa-users fa-4x"></i><br>
                            <span>Sınıf Sınavlarım</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.results')}}">
                            <i class="fas fa-file-contract fa-4x"></i><br>
                            <span>Sınav Sonuçlarım</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5">
                        <a href="{{route('user.support')}}">
                            <i class="fa fa-question-circle fa-4x"></i><br>
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
