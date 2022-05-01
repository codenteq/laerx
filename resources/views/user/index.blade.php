@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('user/menu.home')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">{{__('user/menu.home')}}</a></li>
                    </ol>
                </nav>
            </figure>

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="col base p-5 mb-2 fast-access-top">
                        <a href="{{route('user.live-lessons')}}">
                            <i class="bi bi-camera-video fs-1"></i><br>
                            <span>{{__('user/menu.live_lesson')}}</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.lesson.index')}}">
                            <i class="bi bi-book fs-1"></i><br>
                            <span>{{__('user/menu.my_lesson')}}</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.exams')}}">
                            <i class="bi bi-laptop fs-1"></i><br>
                            <span>{{__('user/menu.online_exam')}}</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.class-exams')}}">
                            <i class="bi bi-people fs-1"></i><br>
                            <span>{{__('user/menu.class_exam')}}</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('user.results')}}">
                            <i class="bi bi-file-earmark-text fs-1"></i><br>
                            <span>{{__('user/menu.exam_result')}}</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5 fast-access-bottom">
                        <a href="{{route('user.support')}}">
                            <i class="bi bi-info-circle fs-1"></i><br>
                            <span>{{__('user/menu.support')}}</span>
                        </a>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('user/menu.panel')}}</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
