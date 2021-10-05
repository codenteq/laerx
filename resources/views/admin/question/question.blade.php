@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Sorular</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sorular</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4>
                        <a href="{{route('admin.question.create')}}" class="btn btn-success">Soru Oluştur</a>
                        <a href="{{route('admin.question.bug')}}" class="btn btn-danger">Hatalı Sorular</a>
                    </h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto mb-5">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Soru</th>
                            <th scope="col">Soru Dili</th>
                            <th scope="col">Oluşturulma Tarihi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{\Illuminate\Support\Str::limit($question->title, 50)}}</td>
                                <td>{{$question->language->title}}</td>
                                <td>{{$question->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.question.edit',$question)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button class="btn"
                                            onclick="deleteButton(this,`${{route('admin.question.destroy',$question)}}`)">
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

    <title>Sorular</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    @include('layouts.stylesheet')
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const backUrl = '{{route('admin.question.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection
