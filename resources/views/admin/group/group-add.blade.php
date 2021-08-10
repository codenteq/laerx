@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Grup Oluştur</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span><a href="{{route('admin.group')}}"><i class="fas fa-layer-group"></i> Ehliyet Grupları</a> /</span>
                    <span class="active">Grup Oluştur</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingFirst" placeholder="Dil Kodu">
                            <label for="floatingFirst">Ehliyet Grubu</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Grup Aktif/Pasif</label>
                        </div>

                        <br>

                        <div class="mt-3 mb-5">
                            <button type="button" class="btn btn-success">Kaydet</button>
                            <a href="{{route('admin.group')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Grup Oluştur</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
