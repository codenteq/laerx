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

            <!-- pay modal -->
            @if(session('invoice'))
                @include('manager.modal-component.pay-method')
            @endif
            <!-- pay modal end -->

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="alert alert-info mb-3 w-100 text-start" role="alert">
                        <i class="bi bi-info-square me-2"></i>Aktif paketinizden kalan
                        süre: {{invoiceDiffDate(companyId())}} gün
                        @if(session('invoice'))
                            <button type="button" class="btn btn-success ms-3" data-bs-toggle="modal"
                                    data-bs-target="#pay">
                                Ödeme yap
                            </button>
                        @endif
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.live-lesson.index')}}">
                            <i class="bi bi-camera-video fs-1"></i><br>
                            <span>Canlı Ders</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.user.create')}}">
                            <i class="bi bi-person-plus fs-1"></i><br>
                            <span>Yeni Kursiyer Ekle</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.user.index')}}">
                            <i class="bi bi-person-check fs-1"></i><br>
                            <span>Kursiyer Listesi</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.user-results')}}">
                            <i class="bi bi-clipboard-data fs-1"></i><br>
                            <span>Kursiyer Raporları</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.appointment-car')}}">
                            <i class="bi bi-calendar4-range fs-1"></i><br>
                            <span>Araç & Randevular</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5">
                        <a href="{{route('manager.support.index')}}">
                            <i class="bi bi-info-circle fs-1"></i><br>
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
