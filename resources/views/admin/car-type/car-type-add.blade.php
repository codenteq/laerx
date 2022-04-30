@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Araç Tipi Oluştur</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.car-type.index')}}">Araç Türleri</a></li>
                        <li class="breadcrumb-item">Araç Tipi Oluştur</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title">
                            <label for="floatingFirst">Araç Türü</label>
                        </div>
                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                            <a href="{{route('admin.car-type.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Araç Tipi Oluştur</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('admin.car-type.store')}}';
        const backUrl = '{{route('admin.car-type.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection
