@extends('manager.layout.app')

@section('content')
    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kursiyer Raporlar Detay</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.user.results')}}">Kursiyer Raporları</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Kursiyer Raporlar Detay</li>
                    </ol>
                </nav>
            </figure>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 row">
                        <div class="col-md-6 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>Toplam Sınav</small>
                                <h4>{{$results->count()}}</h4>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>Toplam Soru</small>
                                <h4>{{$results->sum('total_question')}}</h4>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>Toplam Doğru</small>
                                <h4>{{$results->sum('correct')}}</h4>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>Toplam Yanlış</small>
                                <h4>{{$results->sum('in_correct')}}</h4>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>Toplam Boş</small>
                                <h4>{{$results->sum('blank_question')}}</h4>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>Ortalama Puanı</small>
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
                                        <li class="list-group-item bg-light">Soru Sayısı
                                            : {{$type->total_question}}</li>
                                        <li class="list-group-item bg-light">Doğru Sayısı : {{$type->correct}}</li>
                                        <li class="list-group-item bg-light">Yanlış Sayısı : {{$type->in_correct}}</li>
                                        <li class="list-group-item bg-light">Boş Sayısı : {{$type->blank_question}}</li>
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
                        <th scope="col">Sınav Yapılma Tarihi</th>
                        <th scope="col">Soru</th>
                        <th scope="col">Doğru</th>
                        <th scope="col">Yanlış</th>
                        <th scope="col">Boş</th>
                        <th scope="col">Puan</th>
                        <th scope="col">Sonuç</th>
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
            <div class="row mx-auto">
                @foreach($resultTypes as $type)
                    <div class="col-md-3 col-sm-12 mt-2">
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

    <title>Kursiyer Raporlar Detay</title>

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
                    'Doğru',
                    'Yanlış',
                    'Boş'
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




