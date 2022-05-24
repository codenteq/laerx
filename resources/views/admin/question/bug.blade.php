@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Hatalı Sorular</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 overflow-auto">
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
                                <td>{{\Illuminate\Support\Str::limit($question->question->title, 50)}}</td>
                                <td>{{$question->question->language->title}}</td>
                                <td>{{$question->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.question.edit',$question->questionId)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button onclick="deleteButton(this,`${{route('admin.question.bug.destroy',$question->id)}}`)">
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
    <title>Hatalı Sorular</title>
@endsection

@section('css')
    @include('partials.stylesheet')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script>
        const backUrl = '{{route('admin.question.bug')}}';
    </script>
    @include('partials.script')
@endsection
