@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Derslerim</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Derslerim</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <form class="form-control" action="{{route('user.lesson.index')}}" method="get">
                    <div class="form-floating mb-3">
                        <select class="form-select" onchange="this.form.submit()" name="type"
                                aria-label="Floating label select example">
                            <option disabled selected>Seçiniz</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}" {{$type->id == request()->get('type') ? 'selected' : null}}>{{$type->title}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Ders Kategori</label>
                    </div>
                </form>

                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Başlık</th>
                            <th scope="col">Derse Gir</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $lesson)
                            <tr>
                                <td>{{$lesson->title}}</td>
                                <td>
                                    <a href="{{route('user.lesson.show',$lesson->id)}}">
                                        <i class="bi bi-eye text-dark fs-5"></i>
                                    </a>
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

    <title>Derslerim</title>

@endsection

@section('css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.stylesheet')
@endsection

@section('js')
    @include('layouts.script')
@endsection

