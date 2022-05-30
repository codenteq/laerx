@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Ders Düzenle</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @csrf @method('PUT')

                        <div class="form-floating mb-3">
                            <select class="form-select" name="languageId">
                                @foreach($languages as $language)
                                    <option
                                        value="{{$language->id}}" {{$lessonContent->languageId == $language->id ? 'selected' : null}}>{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Dil</label>
                        </div>

                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="file">
                            <label class="input-group-text" for="inputGroupFile02">Ses Dosyası</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Başlık"
                                   value="{{$lessonContent->title}}">
                            <label for="floatingFirst">Başlık</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="typeId">
                                @foreach($types as $type)
                                    <option
                                        value="{{$type->id}}" {{$lessonContent->typeId == $type->id ? 'selected' : null}}>{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Kategori</label>
                        </div>

                        <textarea id="ckeditor" name="content">
                            {!! $lessonContent->content !!}
                        </textarea>

                        <input type="hidden" name="ck_editor" value="1">
                        <div class="mt-3">
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
    @include('partials.stylesheet')
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    <script>
        const actionUrl = '{{route('admin.lesson-content.update',$lessonContent)}}';
        const backUrl = '{{route('admin.lesson-content.index')}}';
    </script>
    @include('partials.script')
@endsection
