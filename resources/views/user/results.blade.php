@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('user/menu.exam_result')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">{{__('user/menu.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('user/menu.exam_result')}}</li>
                    </ol>
                </nav>
            </figure>
            <div class="container">
                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                    <div class="col mt-3 fast-access-top">
                        <div class="p-3 border bg-light rounded-3">
                            <small>{{__('user/my-exam-result.number_test_solved')}}</small>
                            <h4>{{$tests->count()}}</h4>
                        </div>
                    </div>
                    <div class="col mt-3 fast-access-top">
                        <div class="p-3 border bg-light rounded-3">
                            <small>{{__('user/my-exam-result.total_correct_length')}}</small>
                            <h4>{{$tests->sum('correct')}}</h4>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="p-3 border bg-light rounded-3">
                            <small>{{__('user/my-exam-result.total_incorrect_length')}}</small>
                            <h4>{{$tests->sum('in_correct')}}</h4>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="p-3 border bg-light rounded-3">
                            <small>{{__('user/my-exam-result.total_blank_question_length')}}</small>
                            <h4>{{$tests->sum('blank_question')}}</h4>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="p-3 border bg-light rounded-3">
                            <small>{{__('user/my-exam-result.average_point')}}</small>
                            <h4>{{totalPoint($tests->sum('correct'), $tests->sum('test_question_count'))}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row mt-5">
                <div class="col-6">
                    <h4>{{__('user/my-exam-result.my_exams')}}</h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">{{__('user/my-exam-result.question_length')}}</th>
                            <th scope="col">{{__('user/my-exam-result.time')}}</th>
                            <th scope="col">{{__('user/my-exam-result.point')}}</th>
                            <th scope="col">{{__('user/my-exam-result.result')}}</th>
                            <th scope="col">{{__('user/my-exam-result.detail')}}</th>
                            <th scope="col">{{__('user/my-exam-result.date')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($tests as $test)
                            <tr>
                                <th scope="row">{{$test->testId}}</th>
                                <td>{{$test->test_question_count}}</td>
                                <td>{{examTime($test->test_question_count)}}</td>
                                <th>{{$test->point}}</th>
                                <td class="{{resultStatus($test->point) == 'Başarılı' ? 'text-success' : 'text-danger'}} fw-bold">{{resultStatus($test->point)}}</td>
                                <td>
                                    <a href="{{route('user.result.detail',$test->id)}}" class="btn btn-primary">{{__('user/my-exam-result.exam_detail_btn')}}</a>
                                </td>
                                <td>{{$test->created_at}}</td>
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

    <title>{{__('user/menu.exam_result')}}</title>

@endsection

@section('css')

    @include('layouts.stylesheet')

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')

@endsection

