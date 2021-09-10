@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Canlı Derslerim</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Canlı Derslerim</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Ders Adı</th>
                            <th scope="col">Ders'e Katıl</th>
                            <th scope="col">Ders Kategorisi</th>
                            <th scope="col">Ders Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($liveLessons as $liveLesson)
                            <tr>
                                <td>{{$liveLesson->title}}</td>
                                <td>
                                    <a class="btn btn-success" target="_blank"
                                       href="{{url($liveLesson->url)}}">Katıl</a>
                                </td>
                                <td>{{$liveLesson->type->title}}</td>
                                <td>{{$liveLesson->live_date}}</td>
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

    <title>Canlı Derslerim</title>

@endsection

@section('css')

    @include('layouts.stylesheet')

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')

@endsection

