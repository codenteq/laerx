@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Bildirimler</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bildirimler</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3 mb-3">
                    <h4><a href="{{route('manager.notification.create')}}" class="btn btn-success">Bildirim Oluştur</a>
                    </h4>
                </div>
                <div class="col-12 col-lg-12 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Mesaj</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Tarih</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notifications as $notification)
                            <tr>
                                <td>{{$notification->message}}</td>
                                <td class="{{$notification->status == 0 ? 'text-warning' : 'text-success'}} fw-bold">{{$notification->status == 0 ? 'Gönderiliyor' : 'Gönderildi'}}</td>
                                <td>{{$notification->created_at}}</td>
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

    <title>Bildirimler</title>

@endsection

@section('css')

    @include('layouts.stylesheet')

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')

@endsection
