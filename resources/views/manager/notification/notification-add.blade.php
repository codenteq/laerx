@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Bildirim Oluştur</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span><a href="{{route('manager.notification.index')}}"><i class="fas fa-bell"></i> Bildirimler</a> /</span>
                    <span class="active">Bildirim Oluştur</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Ahmet Arşiv
                            </label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Bildirim Mesajı" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Bildirim Mesajı</label>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="" class="btn btn-success">Kaydet</button>
                            <a href="{{route('manager.notification.index')}}" class="btn btn-danger">İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Bildirim Oluştur</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection

