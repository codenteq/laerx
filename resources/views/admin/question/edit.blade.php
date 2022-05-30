@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Soru Düzenle</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form class="p-2" name="form-data">
                        @csrf @method('PUT')

                        <div class="form-floating mb-3">
                            <select class="form-select" name="languageId">
                                @foreach($languages as $language)
                                    <option
                                        value="{{$language->id}}" {{$question->language->id == $language->id ? 'selected' : null}}>{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Soru Dilini Seçin</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="questionImage"
                                   {{$question->questionImage == 1 ? 'checked' : null}} id="switchQuestionImageShow">
                            <label class="form-check-label" for="switchQuestionImageShow">Soru Resim</label>
                        </div>

                        <br>

                        @if($question->imagePath)
                            <img src="{{imagePath($question->imagePath)}}" height="100" class="mb-3 w-auto" alt="">
                        @endif
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Başlık"
                                   value="{{$question->title}}">
                            <label for="floatingFirst">Soru</label>
                        </div>

                        <div class="input-group mb-3 d-none question-image">
                            <input type="file" class="form-control" name="imagePath">
                            <label class="input-group-text" for="inputGroupFile02">Soru Resim</label>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2">Açıklama</label>
                            <textarea id="ckeditor" name="description">{!! $question->description !!}</textarea>
                            <input type="hidden" name="ck_editor" value="1">
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="typeId">
                                @foreach($types as $type)
                                    <option
                                        value="{{$type->id}}" {{$question->typeId == $type->id ? 'selected' : null}}>{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Soru Tipi</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="choiceImage"
                                   {{$question->choiceImage == 1 ? 'checked' : null}} id="switchImageShow">
                            <label class="form-check-label" for="switchImageShow">Cevap Resim</label>
                        </div>

                        <br>

                        @foreach($question->choice as $key => $choice)
                            <!-- text choice -->
                            <div class="row mb-3 text-choice">
                                <div class="form-floating ps-1 col-10 col-md-10">
                                    <input type="text" class="form-control " name="{{$choice->id}}"
                                           placeholder="Cevap 0{{$key + 1}}"
                                           value="{{$choice->title}}">
                                    <label class="" for="floatingFirst">Cevap 0{{$key + 1}}</label>
                                </div>
                                <div class="col-2 col-md-1">
                                    <input class="form-check-input p-3" type="checkbox" id="flexCheckDefault"
                                           data-bs-toggle="tooltip" data-bs-placement="top"
                                           @if($choice->path == null)
                                               {{$choice->id == $choice->choiceKey->choiceId ? 'checked' : null}}
                                           @endif
                                           name="correct_choice"
                                           value="{{$choice->id}}"
                                           onclick="correctChoice(this)"
                                           title="Doğru Cevabı Seçin">
                                </div>
                            </div>
                            <!-- image choice -->
                            <div class="row mb-3 image-choice d-none">
                                @if($choice->path)
                                    <div><img src="{{imagePath($choice->path)}}" height="100" class="mb-3 w-auto"
                                              alt=""></div>
                                @endif
                                <div class="mb-3 col-10 col-md-10">
                                    <input type="file" class="form-control" name="{{$choice->id}}">
                                </div>
                                <div class="col-2 col-md-1">
                                    <input class="form-check-input p-3" type="checkbox" value="{{$choice->id}}"
                                           id="flexCheckDefault"
                                           name="correct_choice"
                                           data-bs-toggle="tooltip" data-bs-placement="top"
                                           onclick="correctChoice(this)"
                                           @if($choice->path != null)
                                               {{$choice->id == $choice->choiceKey->choiceId ? 'checked' : null}}
                                           @endif
                                           title="Doğru Cevabı Seçin">
                                </div>
                            </div>
                        @endforeach

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('admin.question.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')
    <title>Soru Düzenle</title>
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
        const actionUrl = '{{route('admin.question.update',$question)}}';
        const backUrl = '{{route('admin.question.index')}}';
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script>
        const choiceImage = document.querySelector('#switchImageShow');
        const textInput = document.querySelectorAll('.text-choice');
        const imageInput = document.querySelectorAll('.image-choice');

        const questionImageChoice = document.querySelector('#switchQuestionImageShow');
        const questionImageInput = document.querySelector('.question-image');

        choiceImage.addEventListener('click', () => {
            if (choiceImage.checked == true) {
                textInput.forEach((input, index) => {
                    textInput[index].classList.add('d-none');
                    imageInput[index].classList.remove('d-none');
                })
            } else {
                textInput.forEach((input, index) => {
                    textInput[index].classList.remove('d-none');
                    imageInput[index].classList.add('d-none');
                });
            }
        });

        if (choiceImage.checked == true) {
            textInput.forEach((input, index) => {
                textInput[index].classList.add('d-none');
                imageInput[index].classList.remove('d-none');
            })
        } else {
            textInput.forEach((input, index) => {
                textInput[index].classList.remove('d-none');
                imageInput[index].classList.add('d-none');
            });
        }

        questionImageChoice.addEventListener('click', () => {
            if (questionImageChoice.checked == true)
                questionImageInput.classList.remove('d-none')
            else
                questionImageInput.classList.add('d-none')
        });

        if (questionImageChoice.checked == true)
            questionImageInput.classList.remove('d-none')
        else
            questionImageInput.classList.add('d-none')

    </script>

    <script>
        // checkbox only select
        function correctChoice(checkbox) {
            var checkboxes = document.getElementsByName('correct_choice')
            checkboxes.forEach((item) => {
                if (item !== checkbox) item.checked = false
            })
        }
    </script>
    @include('partials.script')
@endsection
