@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Randevu Ayarları</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.appointment-car')}}"><i
                                class="fas fa-car"></i> Araç & Randevular</a> /</span>
                    <span class="active">Randevu Ayarları</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Randevu Aktif/Pasif</label>
                    </div>

                    <br>

                    <div class="mt-3 mb-5">
                        <button type="button" onclick="" class="btn btn-success">Kaydet
                        </button>
                        <a href="{{route('manager.appointment-car')}}" class="btn btn-danger">İptal</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Randevu Ayarları</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
