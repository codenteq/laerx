@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Derslerim</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('user.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Derslerim</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <nav>
                        <div class="nav nav-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home" type="button" role="tab"
                                    aria-controls="v-pills-home" aria-selected="true">İlk Yardım
                            </button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false">Trafik ve Çevre
                            </button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-messages" type="button" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="false">Araç Tekniği
                            </button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-settings" type="button" role="tab"
                                    aria-controls="v-pills-settings" aria-selected="false">Trafik Adabı
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Konu Başlığı</th>
                                    <th scope="col">Derse Git</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">İLK YARDIM GİRİŞ</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">İLK YARDIM İLKELERİ, HEDEFLERİ, AŞAMALARI</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">İLK YARDIM İNSAN VÜCUDU</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">KAZA YERİ İLKYARDIM ÖNLEMLERİ VE İLKYARDIM ÇANTASI</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">SUNİ SOLUNUM UYGULAMALARI</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">HOLGER- NİELSEN (SIRTTAN BASTIRMA DIRSEKLERDEN KALDIRMA )
                                        METODU
                                    </th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">KANAMANIN DURDURULMASI VE DOLAŞIMININ SAĞLANMASI KANAMALARDA
                                        İLKYARDIM UYGULAMASI VE ÇEŞİTLERİ
                                    </th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                             aria-labelledby="v-pills-profile-tab">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Konu Başlığı</th>
                                    <th scope="col">Derse Git</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">KARAYOLLARI TRAFİK KANUNU VE İLGİLİ KURUMLARIN SORUMLULUKLARI
                                    </th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">TRAFİK VE TANIMLAR</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">TRAFİK GÖREVLİSİNİN İŞARETLERİ</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">IŞIKLI TRAFİK İŞARETLERİ</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">YOL ÇİZGİLERİ</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">DİĞER İŞARETLEME ELEMANLARI</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">ÖNDEKİ ARACI GEÇME, ARKADAKİ ARACA YOL VERME</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                             aria-labelledby="v-pills-messages-tab">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Konu Başlığı</th>
                                    <th scope="col">Derse Git</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">MOTOR VE ARAÇ TEKNİĞİ</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">DÖRT ZAMANLI MOTORLARIN ÇALIŞMA SIRALAMASI</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">MOTORUN BELLİ BAŞLI PARÇALARI</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">MOTORLARIN DIŞINDAKİ ÇALIŞMA SİSTEMLERİ</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">SİSTEMİN ÇALIŞMASI</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">SOĞUTMA SİSTEMİ</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">YAĞLAMA SİSTEMİ</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                             aria-labelledby="v-pills-settings-tab">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Konu Başlığı</th>
                                    <th scope="col">Derse Git</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">TRAFİKTE ADAP</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">TRAFİKTE ADABIN TEMEL KAVRAMLARI</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">TRAFİKTE TOLERANS (HOŞGÖRÜ/TAHAMMÜL)</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">TRAFİKTE SORUMLULUK</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">TRAFİKTE KARŞISINDAKİ KİŞİYE ÖNCELİK VERME</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">TRAFİKTE DEZAVANTAJLI VE ENGELLİ İNSANLARA KARŞI DAVRANIŞLAR
                                    </th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">TRAFİKTE İLETİŞİM</th>
                                    <td>
                                        <button class="btn btn-light">İçeriği Oku</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Derslerim</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection

