@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Hesap Ayarlarım</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('user.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Profil</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingFirst" placeholder="Üye Adı">
                            <label for="floatingFirst">Üye Adı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingLast" placeholder="Üye Soyadı">
                            <label for="floatingLast">Üye Soyadı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingMail" placeholder="Eposta Adresi">
                            <label for="floatingMail">Eposta Adresi</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPhone" placeholder="Telefon Numarası">
                            <label for="floatingPhone">Telefon Numarası</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingAddress" placeholder="Adres">
                            <label for="floatingAddress">Adres</label>
                        </div>

                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Türkçe</option>
                                <option value="1">English</option>
                            </select>
                            <label for="floatingSelect">Dil Seçiniz...</label>
                        </div>

                        <div class="mt-3">
                            <button type="button" class="btn btn-success">Kaydet</button>
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

@endsection

@section('js')

@endsection

