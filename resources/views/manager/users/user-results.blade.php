@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kursiyer Raporları</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Kursiyer Raporları</span>
                </figcaption>
            </figure>
            <div class="container d-md-none d-lg-none d-xl-none d-xxl-none">
                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Çözülen Test Sayısı</small>
                            <h4>1</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Toplam Doğru Sayısı</small>
                            <h4>12</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Toplam Yanlış Sayısı</small>
                            <h4>38</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Toplam Boş Soru</small>
                            <h4>0</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Toplam Puan</small>
                            <h4>24</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Ortalama Puan</small>
                            <h4>24</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container d-none d-sm-block">
                <div class="row g-2">
                    <div class="col-2">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Çözülen Test Sayısı</small>
                            <h4>1</h4>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Toplam Doğru Sayısı</small>
                            <h4>12</h4>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Toplam Yanlış Sayısı</small>
                            <h4>38</h4>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Toplam Boş Soru</small>
                            <h4>0</h4>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Toplam Puan</small>
                            <h4>24</h4>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="p-3 border bg-light rounded-3">
                            <small>Ortalama Puan</small>
                            <h4>24</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row mt-5">
                <div class="col-6">
                    <h4>Sınav Detayları</h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-scroll">
                    <table id="data-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Adı Soyadı</th>
                                <th scope="col">TCKNO</th>
                                <th scope="col">Yapılan Test Sayısı</th>
                                <th scope="col">Ortalama Puan</th>
                                <th scope="col">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Ahmet Sefa Arşiv</td>
                                <td>11111111111</td>
                                <td>4</td>
                                <th>85</th>
                                <td><a href="#"><i class="fas fa-eye "></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Kursiyer Raporları</title>

@endsection

@section('css')

    @include('layouts.stylesheet')

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')

@endsection
