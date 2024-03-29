@extends('manager.layout.app')

@section('content')
    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.trainee_report_detail')}}</h2>
                </blockquote>
            </figure>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 row">
                        <div class="col-md-6 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>{{__('manager/user/trainee-report.total_exam')}}</small>
                                <h4>{{$results->count()}}</h4>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>{{__('manager/user/trainee-report.total_question')}}</small>
                                <h4>{{$results->sum('total_question')}}</h4>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>{{__('manager/user/trainee-report.total_correct')}}</small>
                                <h4>{{$results->sum('correct')}}</h4>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>{{__('manager/user/trainee-report.total_incorrect')}}</small>
                                <h4>{{$results->sum('in_correct')}}</h4>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>{{__('manager/user/trainee-report.total_blank')}}</small>
                                <h4>{{$results->sum('blank_question')}}</h4>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>{{__('manager/user/trainee-report.average_point')}}</small>
                                <h4>{{totalPoint($results->sum('correct'),$results->sum('total_question'))}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 bg-light rounded">
                        <ul class="nav nav-pills mb-3 p-3" id="pills-tab" role="tablist">
                            @foreach($resultTypes as $type)

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link  @if ($loop->first) active @endif"
                                            id="type-{{$type->id}}-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#type-{{$type->id}}" type="button" role="tab"
                                            aria-controls="type-{{$type->id}}"
                                            @if ($loop->first) aria-selected="true"
                                            @else aria-selected="false" @endif>{{$type->type->title}}
                                    </button>
                                </li>

                            @endforeach
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @foreach($resultTypes as $type)
                                <div class="tab-pane fade @if($loop->first) show active @endif" id="type-{{$type->id}}"
                                     role="tabpanel"
                                     aria-labelledby="type-{{$type->id}}">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-light">{{__('manager/user/trainee-report.question_length')}}
                                            : {{$type->sum_total_question}}</li>
                                        <li class="list-group-item bg-light">{{__('manager/user/trainee-report.correct_length')}} : {{$type->sum_correct}}</li>
                                        <li class="list-group-item bg-light">{{__('manager/user/trainee-report.incorrect_length')}} : {{$type->sum_in_correct}}</li>
                                        <li class="list-group-item bg-light">{{__('manager/user/trainee-report.blank_length')}} : {{$type->sum_blank_question}}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container mt-5">
            <div class="col-12 col-lg-12 mt-3 overflow-auto">
                <table id="data-table" class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">{{__('manager/user/trainee-report.exam_date')}}</th>
                        <th scope="col">{{__('manager/user/trainee-report.question')}}</th>
                        <th scope="col">{{__('manager/user/trainee-report.correct')}}</th>
                        <th scope="col">{{__('manager/user/trainee-report.incorrect')}}</th>
                        <th scope="col">{{__('manager/user/trainee-report.blank')}}</th>
                        <th scope="col">{{__('manager/user/trainee-report.point')}}</th>
                        <th scope="col">{{__('manager/user/trainee-report.result')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{$result->created_at}}</td>
                            <td>{{$result->total_question}}</td>
                            <td>{{$result->correct}}</td>
                            <td>{{$result->in_correct}}</td>
                            <td>{{$result->blank_question}}</td>
                            <td>{{$result->point}}</td>
                            <th class="{{resultStatus($result->point) == 'Başarılı' ? 'text-success' : 'text-danger'}}">{{resultStatus($result->point)}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row mx-auto mb-5 mt-2">
                @foreach($resultTypes as $type)
                    <div class="col-md-3 col-sm-12 mt-2 mb-2">
                        <div class="card p-3 " style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$type->type->title}}</h5>
                                <canvas id="chart{{$type->id}}" width="100%" height="100%"></canvas>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection

@section('meta')
    <title>{{__('manager/menu.trainee_report_detail')}}</title>
@endsection


@section('css')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script>
        @foreach($resultTypes as $type)
        let ctx{{$type->id}} = document.getElementById('chart{{$type->id}}');
        let chart{{$type->id}} = new Chart(ctx{{$type->id}}, {
            type: 'doughnut',
            data: {
                labels: [
                    '{{__('manager/user/trainee-report.correct')}}',
                    '{{__('manager/user/trainee-report.incorrect')}}',
                    '{{__('manager/user/trainee-report.blank')}}'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [{{$type->sum_correct}}, {{$type->sum_in_correct}}, {{$type->sum_blank_question}}],
                    backgroundColor: [
                        'rgb(17,255,0)',
                        'rgb(232,18,18)',
                        'rgb(0,218,255)'
                    ],
                    hoverOffset: 4
                }]
            },
        });
        @endforeach
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')
@endsection




