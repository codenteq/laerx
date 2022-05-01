@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.question_create')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="p-2" name="form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <select class="form-select" name="languageId" aria-label="Floating label select example">
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}">{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/question/question-add-edit.language_select')}}</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="questionImage"
                                   id="switchQuestionImageShow">
                            <label class="form-check-label" for="switchQuestionImageShow">{{__('manager/question/question-add-edit.question_photo_checkbox')}}</label>
                        </div>
                        <br>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Başlık">
                            <label for="floatingFirst">{{__('manager/question/question-add-edit.question')}}</label>
                        </div>
                        <div class="input-group mb-3 d-none question-image">
                            <input type="file" class="form-control" name="imagePath">
                            <label class="input-group-text" for="inputGroupFile02">{{__('manager/question/question-add-edit.question_photo_checkbox')}}</label>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">{{__('manager/question/question-add-edit.description')}}</label>
                            <textarea id="ckeditor" name="description"></textarea>
                            <input type="hidden" name="ck_editor" value="1">
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="typeId" aria-label="Floating label select example">
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/question/question-add-edit.type')}}</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input " type="checkbox" name="choiceImage" id="switchImageShow">
                            <label class="form-check-label" for="switchImageShow">{{__('manager/question/question-add-edit.choice_photo_checkbox')}}</label>
                        </div>
                        <br>
                        <div class="row mb-3 text-choice">
                            <div class="form-floating ps-1 col-11">
                                <input type="text" class="form-control " name="choice_text_1" placeholder="Cevap 01">
                                <label class="" for="floatingFirst">{{__('manager/question/question-add-edit.choice_input')}} 01</label>
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       name="correct_choice"
                                       value="1"
                                       onclick="correctChoice(this)"
                                       title="{{__('manager/question/question-add-edit.correct_choice_checkbox')}}">
                            </div>
                        </div>
                        <div class="row mb-3 text-choice">
                            <div class="form-floating ps-1 col-11">
                                <input type="text" class="form-control " name="choice_text_2" placeholder="Cevap 02">
                                <label class="" for="floatingFirst">{{__('manager/question/question-add-edit.choice_input')}} 02</label>
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       name="correct_choice"
                                       value="2"
                                       onclick="correctChoice(this)"
                                       title="{{__('manager/question/question-add-edit.correct_choice_checkbox')}}">
                            </div>
                        </div>
                        <div class="row mb-3 text-choice">
                            <div class="form-floating ps-1 col-11">
                                <input type="text" class="form-control " name="choice_text_3" placeholder="Cevap 0">
                                <label class="" for="floatingFirst">{{__('manager/question/question-add-edit.choice_input')}} 03</label>
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       name="correct_choice"
                                       value="3"
                                       onclick="correctChoice(this)"
                                       title="{{__('manager/question/question-add-edit.correct_choice_checkbox')}}">
                            </div>
                        </div>
                        <div class="row mb-3 text-choice">
                            <div class="form-floating ps-1 col-11">
                                <input type="text" class="form-control " name="choice_text_4" placeholder="Cevap 04">
                                <label class="" for="floatingFirst">{{__('manager/question/question-add-edit.choice_input')}} 04</label>
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       name="correct_choice"
                                       value="4"
                                       onclick="correctChoice(this)"
                                       title="{{__('manager/question/question-add-edit.correct_choice_checkbox')}}">
                            </div>
                        </div>

                        <div class="row mb-3 image-choice d-none">
                            <div class="mb-3 col-11">
                                <input type="file" class="form-control" name="choice_image_1">
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       name="correct_choice"
                                       value="1"
                                       onclick="correctChoice(this)"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="{{__('manager/question/question-add-edit.correct_choice_checkbox')}}">
                            </div>
                        </div>
                        <div class="row mb-3 image-choice d-none">
                            <div class="mb-3 col-11">
                                <input type="file" class="form-control" name="choice_image_2">
                            </div>

                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       name="correct_choice"
                                       value="2"
                                       onclick="correctChoice(this)"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="{{__('manager/question/question-add-edit.correct_choice_checkbox')}}">
                            </div>
                        </div>
                        <div class="row mb-3 image-choice d-none">
                            <div class="mb-3 col-11">
                                <input type="file" class="form-control" name="choice_image_3">
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       name="correct_choice"
                                       value="3"
                                       onclick="correctChoice(this)"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="{{__('manager/question/question-add-edit.correct_choice_checkbox')}}">
                            </div>
                        </div>
                        <div class="row mb-3 image-choice d-none">
                            <div class="mb-3 col-11">
                                <input type="file" class="form-control" name="choice_image_4">
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox"
                                       id="flexCheckDefault"
                                       name="correct_choice"
                                       value="4"
                                       onclick="correctChoice(this)"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="{{__('manager/question/question-add-edit.correct_choice_checkbox')}}">
                            </div>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('manager/question/question-add-edit.save_btn')}}
                            </button>
                            <a href="{{route('manager.question.index')}}" class="btn btn-danger">{{__('manager/question/question-add-edit.cancel_btn')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('manager/menu.question_create')}}</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('manager.question.store')}}';
        const backUrl = '{{route('manager.question.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
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
@endsection
