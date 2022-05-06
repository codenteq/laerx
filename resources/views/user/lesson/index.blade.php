@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('user/menu.my_lesson')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <form class="form-control" action="{{route('user.lesson.index')}}" method="get">
                    <div class="form-floating mb-3">
                        <select class="form-select" onchange="this.form.submit()" name="type"
                                aria-label="Floating label select example">
                            <option disabled selected>{{__('user/my-lesson.select')}}</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}" {{$type->id == request()->get('type') ? 'selected' : null}}>{{$type->title}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">{{__('user/my-lesson.lesson_category')}}</label>
                    </div>
                </form>

                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{__('user/my-lesson.title')}}</th>
                            <th scope="col">{{__('user/my-lesson.attend_class')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $lesson)
                            <tr>
                                <td>{{$lesson->title}}</td>
                                <td>
                                    <a href="{{route('user.lesson.show',$lesson->id)}}">
                                        <i class="bi bi-eye text-dark fs-5"></i>
                                    </a>
                                </td>
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

    <title>{{__('user/menu.my_lesson')}}</title>

@endsection

@section('css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.stylesheet')
@endsection

@section('js')
    @include('layouts.script')
@endsection

