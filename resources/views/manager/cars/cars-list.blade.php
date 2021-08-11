@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Araçlar</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.appointment')}}"><i class="fas fa-car"></i> Araç & Randevular</a> /</span>
                    <span class="active">Araçlar</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('manager.cars.create')}}" class="btn btn-success">Araç Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Plaka</th>
                            <th scope="col">Türü</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Tarih</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">70 ASA 342</th>
                            <td>Otomobil</td>
                            <td class="text-success fw-bold">Aktif</td>
                            <td>06/08/2021</td>
                            <td><a href="#"><i class="fas fa-edit"></i></a> <a href="#"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Araçlar</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
