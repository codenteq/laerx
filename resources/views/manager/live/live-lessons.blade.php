@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Canlı Dersler</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Canlı Dersler</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('manager.live-lesson.create')}}" class="btn btn-success">Ders Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Ders Adı</th>
                            <th scope="col">Ders'e Katıl</th>
                            <th scope="col">Ders Kategorisi</th>
                            <th scope="col">Ders Tarihi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($live_lessons as $live_lesson)
                            <tr>
                                <td>{{$live_lesson->title}}</td>
                                <td>
                                    <a href="{{url($live_lesson->url)}}" target="_blank" class="btn btn-light">Katıl</a>
                                </td>
                                <td>{{$live_lesson->type->title}}</td>
                                <td>{{$live_lesson->live_date}}</td>
                                <td>
                                    <a href="{{route('manager.live-lesson.edit',$live_lesson)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button class="btn"
                                            onclick="deleteButton(this,`${{route('manager.live-lesson.destroy',$live_lesson)}}`)">
                                        <i
                                            class="bi bi-trash"></i></button>
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

    <title>Canlı Dersler</title>

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
        const backUrl = '{{route('manager.live-lesson.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    @include('layouts.script')
@endsection
