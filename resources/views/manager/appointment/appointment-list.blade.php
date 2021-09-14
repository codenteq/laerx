@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Randevular</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.appointment-car')}}">Araç & Randevular</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Randevular</li>
                    </ol>
                </nav>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('manager.appointment.create')}}" class="btn btn-success">Randevu Oluştur</a>
                    </h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
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
                        @foreach($appointments as $appointment)
                            <tr>
                                <th scope="row">{{$appointment->user->name .' '. $appointment->user->surname}}</th>
                                <td>{{$appointment->teacher->name .' '. $appointment->teacher->surname}}</td>
                                <td>{{$appointment->car->plate_code}}</td>
                                <td>{{$appointment->date}}</td>
                                <td class="{{$appointment->status === 1 ? 'text-success' : 'text-danger'}} fw-bold">{{$appointment->status === 1 ? 'Aktif' : 'Pasif'}}</td>
                                <td>
                                    <a href="{{route('manager.appointment.edit',$appointment)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button class="btn"
                                            onclick="deleteButton(this,`${{route('manager.appointment.destroy',$appointment)}}`)">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
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
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const backUrl = '{{route('manager.appointment.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    @include('layouts.script')
@endsection
