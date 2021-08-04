@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Randevularım</h2>
                </blockquote>
                <figcaption>
                    <span><a href="/user/dashboard"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Randevularım</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><button class="btn btn-success">Yeni Randevu Al</button></h4>
                </div>
                <div class="col-12 col-lg-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Eğitmen</th>
                            <th scope="col">Tarih</th>
                            <th scope="col">Saat</th>
                            <th scope="col">Durum</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Zafer Yolu</th>
                            <td>12-06-21/09.35</td>
                            <td>09.35</td>
                            <td>Aktif</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Randevularım</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection

