@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kullanıcı Düzenle</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @method('PUT') @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tc" placeholder="TCKN"
                                   value="{{$user->user->tc}}" maxlength="11">
                            <label for="floatingFirst">TC Kimlik No</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Üye Adı"
                                   value="{{$user->user->name}}">
                            <label for="floatingFirst">Adı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="surname" placeholder="Üye Soyadı"
                                   value="{{$user->user->surname}}">
                            <label for="floatingLast">Soyadı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Yeni Şifre">
                            <label for="floatingLast">Yeni Şifre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation"
                                   id="password-confirm" placeholder="Şifre">
                            <label for="floatingLast">Yeni Şifre Tekrar</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Eposta Adresi"
                                   value="{{$user->user->email}}">
                            <label for="floatingMail">Eposta Adresi</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="phone" placeholder="Telefon Numarası"
                                   value="{{$user->phone}}">
                            <label for="floatingPhone">Telefon Numarası</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="address" placeholder="Adres"
                                   value="{{$user->address}}">
                            <label for="floatingAddress">Adres</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status"
                                   value="1"
                                {{$user->status == 1 ? 'checked' : null}}>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Kullanıcı Aktif/Pasif</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="languageId">
                                <option disabled selected>Seçiniz</option>
                                @foreach($languages as $language)
                                    <option
                                        value="{{$language->id}}" {{$user->languageId == $language->id ? 'selected' : null}} >{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Dil</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="companyId">
                                <option disabled selected>Seçiniz</option>
                                @foreach($companies as $company)
                                    <option
                                        value="{{$company->id}}" {{$user->companyId == $company->id ? 'selected' : null}}>{{$company->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Şirket</label>
                        </div>

                        <br>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('admin.manager-user.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')
    <title>Kullanıcı Düzenle</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.manager-user.update',$user->userId)}}';
        const backUrl = '{{route('admin.manager-user.index')}}';
    </script>
    @include('partials.script')
@endsection
