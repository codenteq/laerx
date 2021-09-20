@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Eğitmen Düzenle</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.course-teacher.index')}}">Eğitmenler</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Eğitmen Düzenle</li>
                    </ol>
                </nav>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        @method('put')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tc" placeholder="TCKN" maxlength="11" value="{{$user->user->tc}}">
                            <label for="floatingFirst">TCKN</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Ad" value="{{$user->user->name}}">
                            <label for="floatingFirst">Ad</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="surname" placeholder="Soyad" value="{{$user->user->surname}}">
                            <label for="floatingFirst">Soyad</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" placeholder="E-posta" value="{{$user->user->email}}">
                            <label for="floatingFirst">E-posta</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Yeni Şifre">
                            <label for="floatingFirst">Yeni Şifre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Şifre">
                            <label for="floatingLast">Şifre Tekrar</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="phone" placeholder="Telefon" value="{{$user->phone}}">
                            <label for="floatingFirst">Telefon</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingAddress" placeholder="Adres"
                                   name="address"
                                   value="{{$user->address}}">
                            <label for="floatingAddress">Adres</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="languageId"
                                    aria-label="Floating label select example">
                                @foreach ($languages as $language)
                                    <option
                                        value="{{$language->id}}" {{$language->id == $user->languageId ? 'selected' : null}}>{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Dil Seçiniz...</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="flexSwitchCheckChecked" {{$user->status === 1 ? 'checked' : null}}>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Eğitmen Aktif/Pasif</label>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                            <a href="{{route('manager.course-teacher.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Eğitmen Düzenle</title>

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
        const actionUrl = '{{route('manager.course-teacher.update',$user->userId)}}';
        const backUrl = '{{route('manager.course-teacher.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

