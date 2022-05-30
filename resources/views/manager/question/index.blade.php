@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.questions')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h4>
                        <a href="{{route('manager.question.create')}}" class="btn btn-success">{{__('manager/question/question-list.question_create')}}</a>
                        <a href="{{route('manager.question.bug')}}" class="btn btn-danger">{{__('manager/question/question-list.question_bugs')}}</a>
                    </h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{__('manager/question/question-list.question')}}</th>
                            <th scope="col">{{__('manager/question/question-list.question_language')}}</th>
                            <th scope="col">{{__('manager/question/question-list.created_at')}}</th>
                            <th scope="col">{{__('manager/question/question-list.transactions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{\Illuminate\Support\Str::limit($question->question->title, 50)}}</td>
                                <td>{{$question->question->language->title}}</td>
                                <td>{{$question->created_at}}</td>
                                <td>
                                    <a href="{{route('manager.question.edit',$question->questionId)}}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button onclick="deleteButton(this,`${{route('manager.question.destroy',$question->questionId)}}`)">
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
    <title>{{__('manager/menu.questions')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script>
        const backUrl = '{{route('manager.question.index')}}';
    </script>
    @include('partials.script')
    @include('layouts.script')
@endsection
