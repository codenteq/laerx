@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('user/menu.class_exam')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 overflow-auto">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">{{__('user/my-class-exam.question_length')}}</th>
                            <th scope="col">{{__('user/my-class-exam.time')}}</th>
                            <th scope="col">{{__('user/my-class-exam.transactions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classExams as $exam)
                            <tr>
                                <td>{{$exam->class_exam_question_type_sum_length}}</td>
                                <td>{{examTime($exam->class_exam_question_type_sum_length)}}</td>
                                <td>
                                    <a href="{{route('user.quiz.class')}}?class={{$exam->id}}" class="btn btn-success">
                                        {{__('user/my-class-exam.start_exam')}}
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
    <title>{{__('user/menu.class_exam')}}</title>
@endsection

@section('css')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')
@endsection

