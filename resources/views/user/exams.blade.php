@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('user/menu.online_exam')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">{{__('user/menu.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('user/menu.online_exam')}}</li>
                    </ol>
                </nav>
            </figure>
            <div class="container align-content-center">
                <div class="row">
                    <div class="col-9">
                        <h4 class="text-start fast-access-top">{{__('user/my-online-exam.user_guide')}}</h4>
                        <hr>
                        <ul>
                            <li>
                                {{__('user/my-online-exam.guaide_1')}}
                            </li>
                            <li>
                                {{__('user/my-online-exam.guaide_2')}}
                            </li>
                            <li>
                                {{__('user/my-online-exam.guaide_3')}}
                            </li>
                            <li>
                                {{__('user/my-online-exam.guaide_4')}}
                            </li>
                            <li>
                                {{__('user/my-online-exam.guaide_5')}}
                            </li>
                            <li>
                                {{__('user/my-online-exam.guaide_6')}}
                            </li>
                        </ul>
                    </div>
                    <div class="col-4 exams">
                        <a href="{{route('user.quiz.normal')}}" target="_blank">
                            <div class="p-3 border bg-primary text-light rounded-3">
                                <h3>{{__('user/my-online-exam.normal_exam')}}</h3><br>
                                <small>{{__('user/my-online-exam.normal_exam_detail')}}</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 exams">
                        <a href="{{route('user.custom-exam-setting')}}">
                            <div class="p-3 border bg-success text-light rounded-3">
                                <h3>{{__('user/my-online-exam.custom_exam')}}</h3><br>
                                <small>{{__('user/my-online-exam.custom_exam_detail')}}</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('user/menu.online_exam')}}</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection

