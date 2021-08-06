@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Bildirimler</h2>
                </blockquote>
                <figcaption>
                    <span><a href="/manager/dashboard"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Bildirimler</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><button class="btn btn-success">Bildirim Oluştur</button></h4>
                </div>
                <div class="col-12 col-lg-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Mesaj</th>
                            <th scope="col">Tarih</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Bildirimler</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
