@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('user/menu.custom_exam_add')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">{{__('user/menu.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.exams')}}">{{__('user/menu.online_exam')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('user/menu.custom_exam_add')}}</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" method="get" onchange="changeValue()">
                        <input type="hidden" name="custom_exam" value="true">
                        @foreach($types as $type)
                            <label class="form-label">{{$type->title}}</label>
                            <div class="input-group mb-3">
                                <input name="{{$type->id}}" type="range" class="form-range" min="1" max="25"
                                       oninput="this.nextElementSibling.value = this.value">
                                <output>13</output>
                            </div>
                        @endforeach

                        <div class="col-md-3 rounded mb-5">
                            <label class="fw-bold text-danger">
                                {{__('user/my-class-exam.question_length')}} : <span id="total"></span>
                            </label>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="submit" class="btn btn-success">{{__('user/my-class-exam.save_btn')}}</button>
                            <a href="{{route('user.exams')}}" class="btn btn-danger">{{__('user/my-class-exam.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Özel Sınav Oluştur</title>

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

        let output = document.getElementsByTagName("output");
        var total = 0;
        for (let item of output) {
            let itemOutput = parseInt(item.textContent);
            total += itemOutput;
        }
        document.querySelector('#total').innerHTML = total;

        function changeValue() {
            let output = document.getElementsByTagName("output");
            var total = 0;
            for (let item of output) {
                let itemOutput = parseInt(item.textContent);
                total += itemOutput;
            }
            document.querySelector('#total').innerHTML = total;
        }

    </script>
    @include('layouts.script')
@endsection
