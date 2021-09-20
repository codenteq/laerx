@extends('user.layout.app')

@section('content')
    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Sınav Sonuç Detay</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.results')}}">Sınav Sonuçlarım</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sınav Sonuç Detay</li>
                    </ol>
                </nav>
            </figure>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="col-md-12 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>Toplam Soru Sayısı</small>
                                <h4>{{$result->total_question}}</h4>
                            </div>
                        </div>
                        <div class="col-md-12 mt-1 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>Sınav Puanı</small>
                                <h4>{{$result->point}}</h4>
                            </div>
                        </div>
                        <div class="col-md-12 mt-1 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>Sonuç</small>
                                <h4 class="{{resultStatus($result->point) == 'Başarılı' ? 'text-success' : 'text-danger'}}">{{resultStatus($result->point)}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 bg-light rounded">
                        <ul class="nav nav-pills mb-3 p-3" id="pills-tab" role="tablist">
                            @foreach($tests as $test)

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link  @if ($loop->first) active @endif"
                                            id="type-{{$test->id}}-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#type-{{$test->id}}" type="button" role="tab"
                                            aria-controls="type-{{$test->id}}"
                                            @if ($loop->first) aria-selected="true"
                                            @else aria-selected="false" @endif>{{$test->type->title}}
                                    </button>
                                </li>

                            @endforeach
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @foreach($tests as $test)
                                <div class="tab-pane fade @if($loop->first) show active @endif" id="type-{{$test->id}}"
                                     role="tabpanel"
                                     aria-labelledby="type-{{$test->id}}">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-light">Soru Sayısı
                                            : {{$test->total_question}}</li>
                                        <li class="list-group-item bg-light">Doğru Sayısı : {{$test->correct}}</li>
                                        <li class="list-group-item bg-light">Yanlış Sayısı : {{$test->in_correct}}</li>
                                        <li class="list-group-item bg-light">Boş Sayısı : {{$test->blank_question}}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container mt-5">
            <div class="row mx-auto">
                @foreach($tests as $test)
                    <div class="col-md-3 col-sm-12 mt-2">
                        <div class="card p-3 " style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$test->type->title}}</h5>
                                <canvas id="chart{{$test->id}}" width="100%" height="100%"></canvas>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection

@section('meta')

    <title>Sınav Sonuç Detay</title>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script>
        @foreach($tests as $test)
        let ctx{{$test->id}} = document.getElementById('chart{{$test->id}}');
        let chart{{$test->id}} = new Chart(ctx{{$test->id}}, {
            type: 'doughnut',
            data: {
                labels: [
                    'Doğru',
                    'Yanlış',
                    'Boş'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [{{$test->correct}}, {{$test->in_correct}}, {{$test->blank_question}}],
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
@endsection

@section('css')

@endsection

