@extends('user.layout.app')

@section('content')
    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Sınav Sonuçlarım</h2>
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
                    <div class="col-md-6">
                        <div class="col-md-12 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>Toplam Soru Sayısı</small>
                                <h4></h4>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>Sınav Puanı</small>
                                <h4></h4>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4 p-2">
                            <div class="p-3 border bg-light rounded-3">
                                <small>Sonuç</small>
                                <h4></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 bg-light rounded">
                        <ul class="nav nav-pills mb-3 p-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Kategori
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                 aria-labelledby="pills-home-tab">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-light">Soru Sayısı :</li>
                                    <li class="list-group-item bg-light">Doğru Sayısı :</li>
                                    <li class="list-group-item bg-light">Yanlış Sayısı :</li>
                                    <li class="list-group-item bg-light">Boş Sayısı :</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container mt-5">
            <div class="card p-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <canvas id="myChart" width="100%" height="100%"></canvas>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script>
        let ctx = document.getElementById('myChart');
        let myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Red',
                    'Blue',
                    'Yellow'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 100],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            },
        });
    </script>
@endsection

@section('css')

@endsection

