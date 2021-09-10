@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kullanıcı Oluştur</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.manager-user.index')}}">Kullanıcı Listesi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kullanıcı Oluştur</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tc" placeholder="TCKN" maxlength="11">
                            <label for="floatingFirst">TC Kimlik No</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Üye Adı">
                            <label for="floatingFirst">Adı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="surname" placeholder="Üye Soyadı">
                            <label for="floatingLast">Soyadı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Şifre">
                            <label for="floatingLast">Şifre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Şifre">
                            <label for="floatingLast">Şifre Tekrar</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Eposta Adresi">
                            <label for="floatingMail">Eposta Adresi</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="phone" placeholder="Telefon Numarası">
                            <label for="floatingPhone">Telefon Numarası</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="address" placeholder="Adres">
                            <label for="floatingAddress">Adres</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status"
                                   checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Kullanıcı Aktif/Pasif</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="languageId" aria-label="Floating label select example">
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}">{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Dil</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <select class="form-select" name="companyId" aria-label="Floating label select example">
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Şirket</label>
                        </div>
                        <br>
                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                            <a href="{{route('admin.manager-user.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Kullanıcı Oluştur</title>

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
        const actionUrl = '{{route('admin.manager-user.store')}}';
        const backUrl = '{{route('admin.manager-user.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection
