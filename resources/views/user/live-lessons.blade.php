@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Canlı Derslerim</h2>
                </blockquote>
                <figcaption>
                    <span><a href="/user/dashboard"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Canlı Derslerim</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><button class="btn btn-success">Tamamlanmış Dersler</button> <button class="btn btn-warning">Tamamlanmamış Dersler</button></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Ders Adı</th>
                            <th scope="col">Ders'e Katıl</th>
                            <th scope="col">Ders Kategorisi</th>
                            <th scope="col">Ders Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Trafik Adabı</td>
                            <td><button class="btn btn-light">Katıl</button></td>
                            <td>Trafikte Adap</td>
                            <td>12-06-2021/09.35</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Canlı Derslerim</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection

