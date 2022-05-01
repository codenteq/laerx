@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('user/menu.live_lesson')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{__('user/my-live-lesson.lesson_name')}}</th>
                            <th scope="col">{{__('user/my-live-lesson.join_lesson')}}</th>
                            <th scope="col">{{__('user/my-live-lesson.lesson_category')}}</th>
                            <th scope="col">{{__('user/my-live-lesson.lesson_date')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($liveLessons as $liveLesson)
                            <tr>
                                <td>{{$liveLesson->title}}</td>
                                <td>
                                    <a class="btn btn-success" target="_blank"
                                       href="{{url($liveLesson->url)}}">{{__('user/my-live-lesson.join_btn')}}</a>
                                </td>
                                <td>{{$liveLesson->type->title}}</td>
                                <td>{{$liveLesson->live_date}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('user/menu.live_lesson')}}</title>

@endsection

@section('css')

    @include('layouts.stylesheet')

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')

@endsection

