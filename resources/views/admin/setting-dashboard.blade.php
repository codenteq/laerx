@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Sistem Ayarları</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sistem Ayarları</li>
                    </ol>
                </nav>
            </figure>
            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="col base p-5 mb-2">
                        <a href="{{route('admin.language.index')}}">
                            <i class="fas fa-language fa-4x"></i><br>
                            <span>Diller</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('admin.group.index')}}">
                            <i class="fas fa-layer-group fa-4x"></i><br>
                            <span>Ehliyet Grupları</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('admin.period.index')}}">
                            <i class="fas fa-cloud-sun fa-4x"></i><br>
                            <span>Dönemler</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('admin.type.index')}}">
                            <i class="fas fa-file-alt fa-4x"></i><br>
                            <span>Soru Kategorileri</span>
                        </a>
                    </div>

                </div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>Sistem Ayarları</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection

