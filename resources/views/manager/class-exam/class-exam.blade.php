@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Sınıf Sınavları</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sınıf Sınavları</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('manager.class-exam.create')}}" class="btn btn-success">Sınıf Sınavı Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Soru Sayısı</th>
                            <th scope="col">Süre</th>
                            <th scope="col">Durum</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classExams as $exam)
                            <tr>
                                <td>{{$exam->class_exam_question_type_sum_length}}</td>
                                <td></td>
                                <td class="{{$exam->status == 1 ? 'text-success' : 'text-danger'}} fw-bold">{{$exam->status == 1 ? 'Aktif' : 'Pasif'}}</td>
                                <td>
                                    <a href="{{route('manager.class-exam.edit',$exam->id)}}">
                                        <i class="bi {{$exam->status == 1 ? 'bi-eye-slash' : 'bi-eye'}} text-dark"></i>
                                    </a>
                                    <button class="btn"
                                            onclick="deleteButton(this,`${{route('manager.class-exam.destroy',$exam)}}`)">
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

    <title>Sınıf Sınavları</title>

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
        const backUrl = '{{route('manager.class-exam.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    @include('layouts.script')
@endsection
