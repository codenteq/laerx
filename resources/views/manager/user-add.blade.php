@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kursiyer Ekle</h2>
                </blockquote>
                <figcaption>
                    <span><a href="/manager/dashboard"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span><a href="/manager/user-operations"><i class="fas fa-users-cog"></i> Kursiyer İşlemleri</a> /</span>
                    <span class="active">Kursiyer Ekle</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingFirst" placeholder="TCKN">
                            <label for="floatingFirst">TC Kimlik No</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingFirst" placeholder="Üye Adı">
                            <label for="floatingFirst">Adı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingLast" placeholder="Üye Soyadı">
                            <label for="floatingLast">Soyadı</label>
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

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Kullanıcı Aktif/Pasif</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option value="1">2019</option>
                                <option value="2">2020</option>
                                <option value="3">2021</option>
                                <option value="4">2022</option>
                            </select>
                            <label for="floatingSelect">Dönem</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option value="1">Ocak</option>
                                <option value="2">Şubat</option>
                                <option value="3">Mart</option>
                                <option value="4">Nisan</option>
                                <option value="5">Mayıs</option>
                                <option value="6">Haziran</option>
                                <option value="7">Temmuz</option>
                                <option value="8">Ağustos</option>
                                <option value="9">Eylül</option>
                                <option value="10">Ekim</option>
                                <option value="11">Kasım</option>
                                <option value="12">Aralık</option>
                            </select>
                            <label for="floatingSelect">Ay</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                <option value="6">F</option>
                                <option value="7">G</option>
                                <option value="8">H</option>
                            </select>
                            <label for="floatingSelect">Grup</label>
                        </div>

                        <br>

                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Profil Resmi</label>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" class="btn btn-success">Kaydet</button>
                            <a href="/manager/user-operations" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Kursiyer Ekle</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
