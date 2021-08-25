@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Ana Sayfa</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gösterge Paneli</li>
                    </ol>
                </nav>
            </figure>

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="alert alert-info mb-3 w-100 text-start" role="alert">
                        <i class="fas fa-info-circle me-2"></i>Aktif paketinizden kalan süre: {{invoiceDiffDate(companyId())}} gün
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.live-lesson.index')}}">
                            <i class="fas fa-video fa-4x"></i><br>
                            <span>Canlı Ders</span>
                        </a>
                    </div>
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
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.user-results')}}">
                            <i class="fas fa-chart-pie fa-4x"></i><br>
                            <span>Kursiyer Raporları</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.appointment-car')}}">
                            <i class="fas fa-car fa-4x"></i><br>
                            <span>Araç & Randevular</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5">
                        <a href="{{route('manager.support.index')}}">
                            <i class="fas fa-headset fa-4x"></i></i><br>
                            <span>Destek Mesajları</span>
                        </a>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>Yönetici Paneli</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
