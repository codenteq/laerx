@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Ana Sayfa</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Ana Sayfa</li>
                    </ol>
                </nav>
            </figure>
            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="col base p-5 mt-2 mb-2 fast-access-top">
                        <a href="{{route('admin.company.index')}}">
                            <i class="bi bi-building fs-1"></i><br>
                            <span>Şirketler</span>
                        </a>
                    </div>
                    <div class="col base p-5 mt-2 mb-2">
                        <a href="{{route('admin.manager-user.index')}}">
                            <i class="bi bi-people fs-1"></i><br>
                            <span>Kullanıcı Listesi</span>
                        </a>
                    </div>
                    <div class="col base p-5 mt-2 mb-2">
                        <a href="{{route('admin.manager-user.create')}}">
                            <i class="bi bi-person-plus fs-1"></i><br>
                            <span>Kullanıcı Ekle</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('admin.period.index')}}">
                            <i class="bi bi-calendar3-range fs-1"></i><br>
                            <span>Dönemler</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('admin.language.index')}}">
                            <i class="bi bi-translate fs-1"></i><br>
                            <span>Diller</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5 fast-access-bottom">
                        <a href="{{route('admin.group.index')}}">
                            <i class="bi bi-collection fs-1"></i><br>
                            <span>Ehliyet Grupları</span>
                        </a>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>Üst Yönetici Paneli</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection

