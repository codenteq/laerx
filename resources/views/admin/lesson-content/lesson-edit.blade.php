@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Ders Düzenle</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.lesson-content.index')}}">Dersler</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ders Düzenle</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <select class="form-select" name="languageId" aria-label="Floating label select example">
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}" {{$lessonContent->languageId == $language->id ?? 'selected'}}>{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Dil</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="file">
                            <label class="input-group-text" for="inputGroupFile02">Ses Dosyası</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Başlık" value="{{$lessonContent->title}}">
                            <label for="floatingFirst">Başlık</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="typeId" aria-label="Floating label select example">
                                @foreach($types as $type)
                                    <option value="{{$type->id}}" {{$lessonContent->typeId == $type->id ?? 'selected'}}>{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Kategori</label>
                        </div>

                        <textarea id="ckeditor" name="content">
                            {!! $lessonContent->content !!}
                        </textarea>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('admin.lesson-content.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Ders Düzenle</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection

@section('js')
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('admin.lesson-content.update',$lessonContent)}}';
        const backUrl = '{{route('admin.lesson-content.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection
