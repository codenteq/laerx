@extends('teacher.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Profil</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.appointment.index')}}">Randevularım</a></li>
                        <li class="breadcrumb-item">Profil</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingFirst" placeholder="Üye Adı"
                                   name="name"
                                   value="">
                            <label for="floatingFirst">Üye Adı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingLast" placeholder="Üye Soyadı"
                                   name="surname"
                                   value="">
                            <label for="floatingLast">Üye Soyadı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingMail" placeholder="Eposta Adresi"
                                   name="email"
                                   value="">
                            <label for="floatingMail">Eposta Adresi</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingMail" placeholder="Yeni Şifre"
                                   name="password">
                            <label for="floatingMail">Yeni Şifre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPhone" placeholder="Telefon Numarası"
                                   name="phone"
                                   value="">
                            <label for="floatingPhone">Telefon Numarası</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingAddress" placeholder="Adres"
                                   name="address"
                                   value="">
                            <label for="floatingAddress">Adres</label>
                        </div>

                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" name="languageId" aria-label="Floating label select example">
                                    <option></option>
                            </select>
                            <label for="floatingSelect">Dil Seçiniz...</label>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                            <button type="button" class="btn btn-danger">İptal</button>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Profil</title>

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
        const actionUrl = '{{route('user.profile.update')}}';
        const backUrl = '{{route('user.profile')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection
