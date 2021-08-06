@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Araç Ekle</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.appointment')}}"><i class="fas fa-car"></i> Araç & Randevular</a> /</span>
                    <span><a href="{{route('manager.cars-list')}}"><i class="fas fa-car"></i> Araçlar</a> /</span>
                    <span class="active">Araç Ekle</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingFirst" placeholder="Araç Plaka">
                            <label for="floatingFirst">Araç Plaka</label>
                        </div>

                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option value="1">Otomobil</option>
                                <option value="2">Motosiklet</option>
                                <option value="3">Tır/Çekici</option>
                                <option value="4">Kamyon</option>
                                <option value="5">Otobüs</option>
                                <option value="6">Minibüs</option>
                            </select>
                            <label for="floatingSelect">Araç Türü</label>
                        </div>

                        <br>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Araç Aktif/Pasif</label>
                        </div>

                        <br>

                        <div class="mt-3 mb-5">
                            <button type="button" class="btn btn-success">Kaydet</button>
                            <a href="{{route('manager.cars-list')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Araç Ekle</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
