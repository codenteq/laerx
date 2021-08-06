@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Araç & Randevular</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.dashboard')}}"><i class="fas fa-car"></i> Ana Sayfa</a> /</span>
                    <span class="active">Araç & Randevular</span>
                </figcaption>
            </figure>

            <div class="container text-center">
                <div class="row row-cols-2 d-flex justify-content-between">
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.cars-list')}}">
                            <i class="fas fa-car fa-4x"></i><br>
                            <span>Araçlar</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-2">
                        <a href="{{route('manager.appointment-list')}}">
                            <i class="fas fa-hourglass-start fa-4x"></i><br>
                            <span>Randevular</span>
                        </a>
                    </div>
                    <div class="col base p-5 mb-5">
                        <a href="#">
                            <i class="fas fa-sliders-h fa-4x"></i><br>
                            <span>Randevu Ayarları</span>
                        </a>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>Araç & Randevular</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
