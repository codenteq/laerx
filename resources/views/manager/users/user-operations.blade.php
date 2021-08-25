@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kursiyer İşlemleri</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kursiyer İşlemleri</li>
                    </ol>
                </nav>
            </figure>

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.user.create')}}">
                            <i class="fas fa-user-plus fa-4x"></i><br>
                            <span>Yeni Kursiyer Ekle</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.user.index')}}">
                            <i class="fas fa-user-check fa-4x"></i><br>
                            <span>Kursiyer Listesi</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5">
                        <a href="{{route('manager.user-results')}}">
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
