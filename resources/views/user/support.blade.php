@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Destek</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Destek</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <form class="form-control p-5" name="form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingWhy" name="subject" placeholder="İletişim Nedeniniz?">
                        <label for="floatingWhy">İletişim Nedeniniz?</label>
                    </div>

                    <div class="form-floating">
                            <textarea class="form-control" placeholder="Mesajınız" name="message" id="floatingTextarea"
                                      style="height: 100px"></textarea>
                        <label for="floatingTextarea">Mesajınız</label>
                    </div>

                    <div class="mt-3">
                        <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Gönder</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Destek</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('user.support.store')}}';
        const backUrl = '{{route('user.support')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection


