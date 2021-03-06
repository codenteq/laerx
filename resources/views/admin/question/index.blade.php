@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Sorular</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
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
                            <th scope="col">Soru Kategorisi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{\Illuminate\Support\Str::limit($question->title, 50)}}</td>
                                <td>{{$question->language->title}}</td>
                                <td>{{$question->questionType->title}}</td>
                                <td>
                                    <a href="{{route('admin.question.edit',$question)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button
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
    @include('partials.stylesheet')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script>
        const backUrl = '{{route('admin.question.index')}}';
    </script>
    @include('partials.script')
    @include('layouts.script')
@endsection
