@extends('teacher.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Randevularım</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.appointment.index')}}">Randevularım</a>
                        </li>
                    </ol>
                </nav>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Kursiyer</th>
                            <th scope="col">Araç</th>
                            <th scope="col">Tarih</th>
                            <th scope="col">Durum</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{$appointment->user->name .' '. $appointment->user->surname}}</td>
                                <td>{{$appointment->car->plate_code}}</td>
                                <td>{{$appointment->date}}</td>
                                <td class="{{$appointment->status == 1 ? 'text-success' : 'text-danger'}}">{{$appointment->status == 1 ? 'Aktif' : 'Pasif'}}</td>
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

    <title>Randevularım</title>

@endsection

@section('css')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')
@endsection
