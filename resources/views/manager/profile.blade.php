@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('manager/menu.profile_edit')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Üye Adı"
                                   value="{{$user->user->name}}">
                            <label for="floatingFirst">{{__('manager/profile.name')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="surname" placeholder="Üye Soyadı"
                                   value="{{$user->user->surname}}">
                            <label for="floatingLast">{{__('manager/profile.surname')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Yeni Şifre">
                            <label for="floatingLast">{{__('manager/profile.new_password')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Şifre">
                            <label for="floatingLast">{{__('manager/profile.new_password_repeat')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Eposta Adresi"
                                   value="{{$user->user->email}}">
                            <label for="floatingMail">{{__('manager/profile.email_address')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="phone" placeholder="Telefon Numarası"
                                   value="{{$user->phone}}">
                            <label for="floatingPhone">{{__('manager/profile.phone')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="address" placeholder="Adres"
                                   value="{{$user->address}}">
                            <label for="floatingAddress">{{__('manager/profile.address')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="languageId" aria-label="Floating label select example">
                                @foreach($languages as $language)
                                    <option
                                        value="{{$language->id}}" {{$user->languageId == $language->id ? 'selected' : null}} >{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('manager/profile.language')}}</label>
                        </div>

                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo">
                            <label class="input-group-text" for="inputGroupFile02">{{__('manager/profile.profile_photo')}}</label>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('manager/profile.save_btn')}}
                            </button>
                            <a href="{{route('manager.dashboard')}}" class="btn btn-danger">{{__('manager/profile.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')
    <title>{{__('manager/menu.profile_edit')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('manager.profile.update')}}';
        const backUrl = '{{route('manager.profile.edit')}}';
    </script>
    @include('partials.script')
@endsection

