@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Excel ile Kursiyer Ekle</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.user.operations')}}">Kursiyer İşlemleri</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.user.index')}}">Kursiyer Listesi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Excel ile Kursiyer Ekle</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <div class="text-wrap p-3">
                        <p class="fs-5"></p>
                        <ul class="list-unstyled">
                            <li>Excel dosyanız belirli bir standartta olmalıdır. Lütfen dosya daki kolonlara uygun verileri giriniz</li>
                            <li>Gerekli alanlar :
                                <ul>
                                    <li>A Kolonu: TC Kimlik Numarası (ZORUNLU)</li>
                                    <li>B Kolonu: Kursiyerin Adı (ZORUNLU)</li>
                                    <li>C Kolonu: Kursiyerin Soyadı (ZORUNLU)</li>
                                    <li>E Kolonu: Kursiyerin E-Posta Adresi (İSTEĞE BAĞLI)</li>
                                    <li>D Kolonu: Kursiyerin Telefon Numarası (İSTEĞE BAĞLI)</li>
                                    <li>F Kolonu: Kursiyerin Adresi (İSTEĞE BAĞLI)</li>
                                    <li>G Kolonu: Kursiyerin Kayıt Dönemi (ZORUNLU)</li>
                                    <li>H Kolonu: Kursiyerin Kayıt Ayı (ZORUNLU)</li>
                                    <li>I Kolonu: Kursiyerin Kayıt Sınıfı (ZORUNLU)</li>
                                </ul>
                            </li>
                            <li class="text-danger fw-bold mb-3 mt-2">Aşağıdan şablonu indirebilirsiniz ve örnek kayıt verisini silmeyi unutmayınız.</li>
                            <li><a href="{{asset('/files/kursiyer-excel-sablon.xls')}}" class="btn btn-primary" target="_blank"><i class="bi bi-download me-2"></i>Şablon İndir</a></li>
                        </ul>
                    </div>
                    <form class="form-control" name="form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="excel">
                            <label class="input-group-text" for="inputGroupFile02">Excel Listesini Yükleyiniz</label>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('manager.user.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Excel ile Kursiyer Ekle</title>

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
        const actionUrl = '{{route('manager.user.excel-import.create')}}';
        const backUrl = '{{route('manager.user.excel-import')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection
