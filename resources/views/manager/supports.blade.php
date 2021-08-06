@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Destek</h2>
                </blockquote>
                <figcaption>
                    <span><a href="/manager/dashboard"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Destek</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">TKNO</th>
                            <th scope="col">Adı Soyadı</th>
                            <th scope="col">Destek Nedeni</th>
                            <th scope="col">İletişim Adresi</th>
                            <th scope="col">Tarih</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>11111111111</td>
                            <td>Ahmet Sefa Arşiv</td>
                            <td>Test</td>
                            <td>Cedit mahallesi</td>
                            <td>05/08/2021</td>
                            <td><a href="#"><i class="fas fa-eye"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Destek</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
