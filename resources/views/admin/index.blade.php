@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Ana Sayfa</h2>
                </blockquote>
                <figcaption>
                    <span><i class="fas fa-home"></i> Ana Sayfa</span>
                </figcaption>
            </figure>

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="col base p-5 mb-2">
                        <a href="{{route('admin.company.index')}}">
                            <i class="fas fa-building fa-4x"></i><br>
                            <span>Şirketler</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('admin.manager-user.index')}}">
                            <i class="fas fa-users fa-4x"></i><br>
                            <span>Kullanıcı Listesi</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('admin.manager-user.create')}}">
                            <i class="fas fa-user-plus fa-4x"></i><br>
                            <span>Kullanıcı Ekle</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('admin.period.index')}}">
                            <i class="fa fa-cloud-sun fa-4x"></i><br>
                            <span>Dönemler</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('admin.language.index')}}">
                            <i class="fa fa-language fa-4x"></i><br>
                            <span>Diller</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5">
                        <a href="{{route('admin.group.index')}}">
                            <i class="fa fa-layer-group fa-4x"></i><br>
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

