@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Soru Düzenle</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Soru Düzenle</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="p-2" name="form-data">
                        @csrf
                        @method('PUT')
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
                            <label class="input-group-text" for="inputGroupFile02">Soru Resmi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="typeId" aria-label="Floating label select example">
                                @foreach($types as $type)
                                    <option
                                        value="{{$type->id}}" {{$question->typeId === $type->id ? 'selected' : null}}>{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Soru Tipi</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="choiceImage"
                                   {{$question->choiceImage == 1 ? 'checked' : null}} id="switchImageShow">
                            <label class="form-check-label" for="switchImageShow">Şık Resim</label>
                        </div>
                        <br>
                        @foreach($question->choice as $key => $choice)
                        <!-- text choice -->
                            <div class="row mb-3 text-choice">
                                <div class="form-floating ps-1 col-10 col-md-11">
                                    <input type="text" class="form-control " name="{{$choice->id}}"
                                           placeholder="Cevap 0{{$key + 1}}"
                                           value="{{$choice->title}}">
                                    <label class="" for="floatingFirst">Cevap 0{{$key + 1}}</label>
                                </div>
                                <div class="col-2 col-md-1">
                                    <input class="form-check-input p-3" type="checkbox" id="flexCheckDefault"
                                           data-bs-toggle="tooltip" data-bs-placement="top"
                                           @if($choice->path == null){{$choice->id === $choice->choiceKey->choiceId ? 'checked' : null}} @endif
                                           name="correct_choice"
                                           value="{{$choice->id}}"
                                           onclick="correctChoice(this)"
                                           title="Doğru Cevabı İşaretleyin.">
                                </div>
                            </div>
                            <!-- image choice -->
                            <div class="row mb-3 image-choice d-none">
                                @if($choice->path)
                                    <img src="{{imagePath($choice->path)}}" height="100" class="mb-3 w-auto" alt="">
                                @endif
                                <div class="mb-3 col-10 col-md-11">
                                    <input type="file" class="form-control" name="{{$choice->id}}">
                                </div>
                                <div class="col-2 col-md-1">
                                    <input class="form-check-input p-3" type="checkbox" value="{{$choice->id}}"
                                           id="flexCheckDefault"
                                           name="correct_choice"
                                           data-bs-toggle="tooltip" data-bs-placement="top"
                                           onclick="correctChoice(this)"
                                           @if($choice->path != null){{$choice->id === $choice->choiceKey->choiceId ? 'checked' : null}} @endif
                                           title="Doğru Cevabı İşaretleyin.">
                                </div>
                            </div>
                        @endforeach


                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('manager.question.index')}}" class="btn btn-danger">İptal</a>
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
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('manager.question.update',$question)}}';
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
            if (choiceImage.checked === true) {
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

        if (choiceImage.checked === true) {
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
            if (questionImageChoice.checked === true)
                questionImageInput.classList.remove('d-none')
            else
                questionImageInput.classList.add('d-none')
        });

        if (questionImageChoice.checked === true)
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
@endsection
