@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Soru Ekle</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form class="p-2" name="form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <select class="form-select" name="languageId">
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}">{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Soru Dilini Seçin</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="questionImage"
                                   id="switchQuestionImageShow">
                            <label class="form-check-label" for="switchQuestionImageShow">Soru Resim</label>
                        </div>

                        <br>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Başlık">
                            <label for="floatingFirst">Soru</label>
                        </div>

                        <div class="input-group mb-3 d-none question-image">
                            <input type="file" class="form-control" name="imagePath">
                            <label class="input-group-text" for="inputGroupFile02">Soru Resim</label>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2">Açıklama</label>
                            <textarea id="ckeditor" name="description"></textarea>
                            <input type="hidden" name="ck_editor" value="1">
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="typeId">
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Soru Tipi</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input " type="checkbox" name="choiceImage" id="switchImageShow">
                            <label class="form-check-label" for="switchImageShow">Cevap Resim</label>
                        </div>

                        <br>

                        <div class="row mb-3 text-choice">
                            <div class="form-floating ps-1 col-10">
                                <input type="text" class="form-control " name="choice_text_1" placeholder="Cevap 01">
                                <label class="" for="floatingFirst">Cevap 01</label>
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       name="correct_choice"
                                       value="1"
                                       onclick="correctChoice(this)"
                                       title="Doğru Cevabı Seçin">
                            </div>
                        </div>

                        <div class="row mb-3 text-choice">
                            <div class="form-floating ps-1 col-10">
                                <input type="text" class="form-control " name="choice_text_2" placeholder="Cevap 02">
                                <label class="" for="floatingFirst">Cevap 02</label>
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       name="correct_choice"
                                       value="2"
                                       onclick="correctChoice(this)"
                                       title="Doğru Cevabı Seçin">
                            </div>
                        </div>

                        <div class="row mb-3 text-choice">
                            <div class="form-floating ps-1 col-10">
                                <input type="text" class="form-control " name="choice_text_3" placeholder="Cevap 0">
                                <label class="" for="floatingFirst">Cevap 03</label>
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       name="correct_choice"
                                       value="3"
                                       onclick="correctChoice(this)"
                                       title="Doğru Cevabı Seçin">
                            </div>
                        </div>

                        <div class="row mb-3 text-choice">
                            <div class="form-floating ps-1 col-10">
                                <input type="text" class="form-control " name="choice_text_4" placeholder="Cevap 04">
                                <label class="" for="floatingFirst">Cevap 04</label>
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       name="correct_choice"
                                       value="4"
                                       onclick="correctChoice(this)"
                                       title="Doğru Cevabı Seçin">
                            </div>
                        </div>

                        <div class="row mb-3 image-choice d-none">
                            <div class="mb-3 col-10">
                                <input type="file" class="form-control" name="choice_image_1">
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       name="correct_choice"
                                       value="1"
                                       onclick="correctChoice(this)"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="Doğru Cevabı Seçin">
                            </div>
                        </div>

                        <div class="row mb-3 image-choice d-none">
                            <div class="mb-3 col-10">
                                <input type="file" class="form-control" name="choice_image_2">
                            </div>

                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       name="correct_choice"
                                       value="2"
                                       onclick="correctChoice(this)"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="Doğru Cevabı Seçin">
                            </div>
                        </div>

                        <div class="row mb-3 image-choice d-none">
                            <div class="mb-3 col-10">
                                <input type="file" class="form-control" name="choice_image_3">
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       name="correct_choice"
                                       value="3"
                                       onclick="correctChoice(this)"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="Doğru Cevabı Seçin">
                            </div>
                        </div>

                        <div class="row mb-3 image-choice d-none">
                            <div class="mb-3 col-10">
                                <input type="file" class="form-control" name="choice_image_4">
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       name="correct_choice"
                                       value="4"
                                       onclick="correctChoice(this)"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="Doğru Cevabı Seçin">
                            </div>
                        </div>

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
    <title>Soru Ekle</title>
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
        const actionUrl = '{{route('admin.question.store')}}';
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

        questionImageChoice.addEventListener('click', () => {
            if (questionImageChoice.checked == true)
                questionImageInput.classList.remove('d-none')
            else
                questionImageInput.classList.add('d-none')

        });

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
