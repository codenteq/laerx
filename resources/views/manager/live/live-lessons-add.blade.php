@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Canlı Ders Ekle</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span><a href="{{route('manager.live-lessons.index')}}"><i class="fas fa-video"></i> Canlı Dersler</a> /</span>
                    <span class="active">Canlı Ders Ekle</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control">

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingFirst" placeholder="Tarih">
                            <label for="floatingFirst">Tarih</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingFirst" placeholder="Üye Adı">
                            <label for="floatingFirst">Ders Adı</label>
                        </div>

                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option value="1">İlk Yardım Bilgisi</option>
                                <option value="2">Trafik ve Çevre Bilgisi</option>
                                <option value="3">Araç Tekniği</option>
                                <option value="4">Trafik Adbı</option>
                            </select>
                            <label for="floatingSelect">Kategori</label>
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

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Kursiyere bildirim Aktif/Pasif</label>
                        </div>

                        <br>

                        <div class="mt-3 mb-5">
                            <button type="button" class="btn btn-success">Kaydet</button>
                            <a href="{{route('manager.live-lessons.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Canlı Ders Ekle</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
