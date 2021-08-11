@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Randevular</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.appointment')}}"><i class="fas fa-car"></i> Araç & Randevular</a> /</span>
                    <span class="active">Randevular</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('manager.appointments.create')}}" class="btn btn-success">Randevu Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Kursiyer</th>
                            <th scope="col">Eğitmen</th>
                            <th scope="col">Araç</th>
                            <th scope="col">Tarih/Saat</th>
                            <th scope="col">Durum</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Ahmet Sefa Arşiv</th>
                            <td>Veli Karabaşoğulları</td>
                            <td>70 ASA 342</td>
                            <td>06/08/2021 - 09.35</td>
                            <td class="text-success fw-bold">Aktif</td>
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

    <title>Randevular</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
