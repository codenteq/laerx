@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kursiyer Ekle</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span><a href="{{route('manager.user-operations')}}"><i class="fas fa-users-cog"></i> Kursiyer İşlemleri</a> /</span>
                    <span class="active">Kursiyer Düzenle</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tc" placeholder="TCKN"
                                   value="{{$user->user->tc}}">
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
                            <input type="email" class="form-control" name="email" placeholder="Eposta Adresi"
                                   value="{{$user->user->email}}">
                            <label for="floatingMail">Eposta Adresi</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Yeni Şifre">
                            <label>Yeni Şifre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Şifre">
                            <label for="floatingLast">Şifre Tekrar</label>
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
                                {{$user->status === 1 ? 'checked' : null}}>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Kullanıcı Aktif/Pasif</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" name="periodId"
                                    aria-label="Floating label select example">
                                @foreach($periods as $period)
                                    <option value="{{$period->id}}">{{$period->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Dönem</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="monthId" aria-label="Floating label select example">
                                @foreach($months as $month)
                                    <option
                                        value="{{$month->id}}" {{$user->monthId === $month->id ? 'selected' : null}}>{{$month->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Ay</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="groupId" aria-label="Floating label select example">
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Grup</label>
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

                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo">
                            <label class="input-group-text" for="inputGroupFile02">Profil Resmi</label>
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

    <title>Kursiyer Düzenle</title>

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
        const actionUrl = '{{route('manager.user.update',$user->userId)}}';
        const backUrl = '{{route('manager.user.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection
