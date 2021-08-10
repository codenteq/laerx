@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Eğitmenler</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Eğitmenler</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('manager.course-teachers-add')}}" class="btn btn-success">Yeni Eğitmen Ekle</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Adı Soyadı</th>
                            <th scope="col">Eposta</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Kayıt Tarihi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Ahmet Sefa Arşiv</th>
                            <td>info@arsivpro.com</td>
                            <td>0555 555 5555</td>
                            <td class="text-success fw-bold">Aktif</td>
                            <td>12-06-2021/09.35</td>
                            <td><a href="#"><i class="fas fa-user-edit"></i></a> <a href="#"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Eğitmenler</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
