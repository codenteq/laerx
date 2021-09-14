@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Fatura #0001</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.invoice.index')}}">Faturalar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Fatura #0001</li>
                    </ol>
                </nav>
            </figure>

            <div class="row">
                <div class="container mt-5 mb-5">
                    <div class="text-end">
                        <a href="#iyzico-callback" class="btn btn-outline-success">Ödeme Yap</a>
                        <a href="#print" class="btn btn-outline-dark text-end">Yazdır</a>
                    </div>
                    <div class="row d-flex justify-content-center mb-4">
                        <div class="col-12 col-lg-12 mt-3">
                            <div class="card">
                                <div class="text-start logo p-2 px-5"> <img src="{{asset('images/c-icon.png')}}" width="50"> </div>
                                <div class="invoice p-5">
                                    <h5 class="text-start">Özel Zafer Yolu Sürücü Kursu</h5>
                                    <span class="font-weight-bold d-block mt-4 text-danger fw-bold">Ödenmedi</span>
                                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="py-2"> <span class="d-block text-muted">Fatura Tarihi</span> <span>30 Ağustos 2021</span> </div>
                                                </td>
                                                <td>
                                                    <div class="py-2"> <span class="d-block text-muted">Fatura Numarası</span> <span>INV-0001</span> </div>
                                                </td>
                                                <td>
                                                    <div class="py-2"> <span class="d-block text-muted">Ödeme</span> <span><img src="{{asset('images/logo-band@3x.png')}}" width="300" /></span> </div>
                                                </td>
                                                <td>
                                                    <div class="py-2"> <span class="d-block text-muted">Fatura Adresi</span> <span>Tabduk Emre Mahallesi 1605. Sokak No:12 70100<br>Türkiye > Karaman > Merkez</span> </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="product border-bottom table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td width="20%"> <img src="{{asset('images/c-icon.png')}}" width="90"> </td>
                                                <td width="60%">
                                                    <span class="font-weight-bold">Quizz Application MTSK</span>
                                                </td>
                                                <td width="20%">
                                                    <div class="text-right"> <span class="font-weight-bold">₺ 1000</span> </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row d-flex justify-content-end">
                                        <div class="col-md-5">
                                            <table class="table table-borderless">
                                                <tbody class="totals">
                                                <tr>
                                                    <td>
                                                        <div class="text-left"> <span class="text-muted">Ara Toplam</span> </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-right"> <span>₺ 1000</span> </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-left"> <span class="text-muted">Kupon İndirimi</span> </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-right"> <span>₺ -0</span> </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-top border-bottom">
                                                    <td>
                                                        <div class="text-left"> <span class="font-weight-bold">Genel Toplam</span> </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-right"> <span class="font-weight-bold">₺ 1000</span> </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <p class="font-weight-bold mb-0">Teşekkür ederiz, iyi çalışmalar</p>
                                </div>
                                <div class="d-flex justify-content-between footer p-3"> <span>Destek vermeye hazırız! <a href="#"> Yardım Sayfası</a></span> <span>30 Ağustos 2021</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Fatura #0001</title>

@endsection

@section('css')
@endsection

@section('js')
@endsection
