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
                        <li class="breadcrumb-item active" aria-current="page">Sınav Sonuçlarım</li>
                    </ol>
                </nav>
            </figure>
            <div class="container ">
                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Çözülen Test Sayısı</small>
                            <h4>{{$tests->count()}}</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Toplam Doğru Sayısı</small>
                            <h4>{{$tests->sum('correct')}}</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Toplam Yanlış Sayısı</small>
                            <h4>{{$tests->sum('in_correct')}}</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Toplam Boş Soru</small>
                            <h4>{{$tests->sum('blank_question')}}</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Ortalama Puan</small>
                            <h4>{{totalPoint($tests->sum('correct'), $tests->sum('test_question_count'))}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row mt-5">
                <div class="col-6">
                    <h4>Sınavlarım</h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Soru Sayısı</th>
                            <th scope="col">Süre</th>
                            <th scope="col">Puan</th>
                            <th scope="col">Sonuç</th>
                            <th scope="col">Detay</th>
                            <th scope="col">Tarih</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($tests as $test)
                            <tr>
                                <th scope="row">{{$test->testId}}</th>
                                <td>{{$test->test_question_count}}</td>
                                <td>45dk</td>
                                <th>{{$test->point}}</th>
                                <td class="{{resultStatus($test->point) == 'Başarılı' ? 'text-success' : 'text-danger'}} fw-bold">{{resultStatus($test->point)}}</td>
                                <td>
                                    <a href="{{route('user.result.detail',$test->id)}}" class="btn btn-primary">Sınav Detay</a>
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

    <title>Sınav Sonuçlarım</title>

@endsection

@section('css')

    @include('layouts.stylesheet')

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')

@endsection

