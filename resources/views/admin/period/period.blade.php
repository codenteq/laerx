@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Dönemler</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Dönemler</span>
                </figcaption>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('admin.period-add')}}" class="btn btn-success">Dönem Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>İd</th>
                            <th>Seç</th>
                            <th>Yıl</th>
                            <th>Durum</th>
                            <th>Tarih</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"></td>
                            <td>2021</td>
                            <td class="text-success fw-bold">Aktif</td>
                            <td>01/01/2023</td>
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

    <title>Dönemler</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
