@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kursiyer İşlemleri</h2>
                </blockquote>
                <figcaption>
                    <span><a href="/manager/dashboard"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Kursiyer İşlemleri</span>
                </figcaption>
            </figure>

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="col base p-5 mb-2">
                        <a href="/manager/user-add">
                            <i class="fas fa-user-plus fa-4x"></i><br>
                            <span>Yeni Kursiyer Ekle</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="/manager/user-list">
                            <i class="fas fa-user-check fa-4x"></i><br>
                            <span>Kursiyer Listesi</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5">
                        <a href="/manager/user-results">
                            <i class="fas fa-chart-pie fa-4x"></i><br>
                            <span>Kursiyer Raporları</span>
                        </a>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>Kursiyer İşlemleri</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
