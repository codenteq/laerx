@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Randevu Ekle</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.appointment')}}"><i class="fas fa-car"></i> Araç & Randevular</a> /</span>
                    <span><a href="{{route('manager.appointment-list')}}"><i class="fas fa-car"></i> Randevular</a> /</span>
                    <span class="active">Randevu Ekle</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control">

                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option value="1">Ahmet Sefa Arşiv</option>
                            </select>
                            <label for="floatingSelect">Kursiyer</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option value="1">Veli Karabaşoğulları</option>
                            </select>
                            <label for="floatingSelect">Eğitmen</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option value="1">70 ASA 342</option>
                            </select>
                            <label for="floatingSelect">Araç</label>
                        </div>

                        <br>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingAddress" placeholder="Tarih/Saat">
                            <label for="floatingAddress">Tarih/Saat</label>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" class="btn btn-success">Kaydet</button>
                            <a href="{{route('manager.appointment-list')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Randevu Ekle</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
