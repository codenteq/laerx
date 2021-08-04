@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Sınav Sonuçlarım</h2>
                </blockquote>
                <figcaption>
                    <span><a href="/user/dashboard"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Sınav Sonuçlarım</span>
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
                    <h4>Sınavlarım</h4>
                </div>
                <div class="col-12 col-lg-12 mt-3">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Başlık</th>
                            <th scope="col">Soru Sayısı</th>
                            <th scope="col">Süre</th>
                            <th scope="col">Puan</th>
                            <th scope="col">Sonuç</th>
                            <th scope="col">Detay</th>
                            <th scope="col">Tarih</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">37</th>
                            <td>2021-07-29_17:56</td>
                            <td>50</td>
                            <td>45</td>
                            <th>0</th>
                            <td class="text-danger fw-bold">BAŞARISIZ</td>
                            <td><button class="btn btn-primary">Sınav Detay</button></td>
                            <td>2021-07-29 17:56:57</td>
                        </tr>
                        <tr>
                            <th scope="row">38</th>
                            <td>2021-07-27_18:11</td>
                            <td>50</td>
                            <td>45</td>
                            <th>92</th>
                            <td class="text-primary fw-bold">BAŞARILI</td>
                            <td><button class="btn btn-primary">Sınav Detay</button></td>
                            <td>2021-07-27_18:11</td>
                        </tr>
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

@endsection

@section('js')

@endsection

