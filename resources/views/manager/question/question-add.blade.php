@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Soru Ekle</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Soru Ekle</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">

                    <div class="form-check form-switch">
                        <input class="form-check-input1" type="checkbox" name="status" id="switchQuestionImageShow">
                        <label class="form-check-label" for="switchQuestionImageShow">Soru Başlığı Yazı/Resim</label>
                    </div>

                    <br>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Başlık">
                        <label for="floatingFirst">Başlık</label>
                    </div>

                    <div class="input-group mb-3 d-none question-image">
                        <input type="file" class="form-control" name="photo">
                        <label class="input-group-text" for="inputGroupFile02">Resimli Başlık</label>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input " type="checkbox" name="status" id="switchImageShow">
                    </div>

                    <br>

                    <div class="row mb-3 text-choice">
                        <div class="form-floating ps-1 col-11">
                            <input type="text" class="form-control " name="name" placeholder="Cevap 01">
                            <label class="" for="floatingFirst">Cevap 01</label>
                        </div>
                        <div class="col-1">
                            <input class="form-check-input p-3" type="checkbox" value="" id="flexCheckDefault"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Doğru Cevabı İşaretleyin.">
                        </div>
                    </div>

                    <div class="row mb-3 text-choice">
                        <div class="form-floating ps-1 col-11">
                            <input type="text" class="form-control " name="name" placeholder="Cevap 02">
                            <label class="" for="floatingFirst">Cevap 02</label>
                        </div>
                        <div class="col-1">
                            <input class="form-check-input p-3" type="checkbox" value="" id="flexCheckDefault"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Doğru Cevabı İşaretleyin.">
                        </div>
                    </div>

                    <div class="row mb-3 text-choice">
                        <div class="form-floating ps-1 col-11">
                            <input type="text" class="form-control " name="name" placeholder="Cevap 0">
                            <label class="" for="floatingFirst">Cevap 03</label>
                        </div>
                        <div class="col-1">
                            <input class="form-check-input p-3" type="checkbox" value="" id="flexCheckDefault"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Doğru Cevabı İşaretleyin.">
                        </div>
                    </div>

                    <div class="row mb-3 text-choice">
                        <div class="form-floating ps-1 col-11">
                            <input type="text" class="form-control " name="name" placeholder="Cevap 04">
                            <label class="" for="floatingFirst">Cevap 04</label>
                        </div>
                        <div class="col-1">
                            <input class="form-check-input p-3" type="checkbox" value="" id="flexCheckDefault"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Doğru Cevabı İşaretleyin.">
                        </div>
                    </div>


                    <div class="row mb-3 image-choice d-none">
                        <div class="mb-3 col-11">
                            <input type="file" class="form-control" name="photo">
                        </div>

                        <div class="col-1">
                            <input class="form-check-input p-3" type="checkbox" value="" id="flexCheckDefault"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Doğru Cevabı İşaretleyin.">
                        </div>
                    </div>

                    <div class="row mb-3 image-choice d-none">
                        <div class="mb-3 col-11">
                            <input type="file" class="form-control" name="photo">
                        </div>

                        <div class="col-1">
                            <input class="form-check-input p-3" type="checkbox" value="" id="flexCheckDefault"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Doğru Cevabı İşaretleyin.">
                        </div>
                    </div>

                    <div class="row mb-3 image-choice d-none">
                        <div class="mb-3 col-11">
                            <input type="file" class="form-control" name="photo">
                        </div>

                        <div class="col-1">
                            <input class="form-check-input p-3" type="checkbox" value="" id="flexCheckDefault"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Doğru Cevabı İşaretleyin.">
                        </div>
                    </div>

                    <div class="row mb-3 image-choice d-none">
                        <div class="mb-3 col-11">
                            <input type="file" class="form-control" name="photo">
                        </div>

                        <div class="col-1">
                            <input class="form-check-input p-3" type="checkbox" value="" id="flexCheckDefault"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Doğru Cevabı İşaretleyin.">
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Soru Ekle</title>

@endsection

@section('css')

@endsection

@section('js')
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
                textInput.forEach((input,index) => {
                    textInput[index].classList.add('d-none');
                    imageInput[index].classList.remove('d-none');
                })
            } else {
                textInput.forEach((input,index) => {
                    textInput[index].classList.remove('d-none');
                    imageInput[index].classList.add('d-none');
                });
            }
        });

        questionImageChoice.addEventListener('click', () => {
            if (questionImageChoice.checked === true)
                questionImageInput.classList.remove('d-none')
            else
                questionImageInput.classList.add('d-none')

        });

    </script>
@endsection
