@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.trainee_report')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">{{__('manager/menu.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('manager/menu.trainee_report')}}</li>
                    </ol>
                </nav>
            </figure>
            <div class="container">
                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>{{__('manager/user/trainee-report.number_test_solved')}}</small>
                            <h4>{{$test->count()}}</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>{{__('manager/user/trainee-report.total_correct_length')}}</small>
                            <h4>{{$testResults->sum('correct')}}</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>{{__('manager/user/trainee-report.total_incorrect_length')}}</small>
                            <h4>{{$testResults->sum('in_correct')}}</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>{{__('manager/user/trainee-report.total_blank_question_length')}}</small>
                            <h4>{{$testResults->sum('blank_question')}}</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>{{__('manager/user/trainee-report.average_point')}}</small>
                            <h4>{{totalPoint($testResults->sum('correct'),$testResults->sum('total_question'))}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row mt-5">
                <div class="col-6">
                    <h4>{{__('manager/user/trainee-report.exam_detail')}}</h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">{{__('manager/user/trainee-report.name_surname')}}</th>
                            <th scope="col">{{__('manager/user/trainee-report.tc')}}</th>
                            <th scope="col">{{__('manager/user/trainee-report.number_test_solved')}}</th>
                            <th scope="col">{{__('manager/user/trainee-report.average_point')}}</th>
                            <th scope="col">{{__('manager/user/trainee-report.transactions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($testResults as $result)
                                <th scope="row">{{$result->userId}}</th>
                                <td>{{$result->user->name .' '. $result->user->surname}}</td>
                                <td>{{$result->user->tc}}</td>
                                <td>{{$result->count}}</td>
                                <th>{{totalPoint($result->sum_correct,$result->sum_total_question)}}</th>
                                <td><a href="{{route('manager.user.result.detail',$result->userId)}}"><i class="bi bi-eye fs-5 text-dark"></i></a></td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('manager/menu.trainee_report')}}</title>

@endsection

@section('css')

    @include('layouts.stylesheet')

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')

@endsection
