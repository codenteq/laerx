@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Profil Düzenle</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item">Profil Düzenle</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @method('PUT')
                        @csrf
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
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Şifre">
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

                        <div class="form-floating mb-3">
                            <select class="form-select" name="languageId" aria-label="Floating label select example">
                                @foreach($languages as $language)
                                    <option
                                        value="{{$language->id}}" {{$user->languageId === $language->id ? 'selected' : null}} >{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Dil</label>
                        </div>

                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo">
                            <label class="input-group-text" for="inputGroupFile02">Profil Resmi</label>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('manager.dashboard')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Profil Düzenle</title>

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
        const actionUrl = '{{route('manager.profile.update')}}';
        const backUrl = '{{route('manager.profile.edit')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

