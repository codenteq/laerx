@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('user/menu.profile')}}</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">{{__('user/menu.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('user/menu.profile')}}</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingFirst"
                                   name="name"
                                   value="{{$user->user->name}}">
                            <label for="floatingFirst">{{__('user/profile.name')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingLast"
                                   name="surname"
                                   value="{{$user->user->surname}}">
                            <label for="floatingLast">{{__('user/profile.surname')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingMail"
                                   name="email"
                                   value="{{$user->user->email}}">
                            <label for="floatingMail">{{__('user/profile.email_address')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingMail"
                                   name="password">
                            <label for="floatingMail">{{__('user/profile.new_password')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingMail"
                                   name="password_confirmation">
                            <label for="floatingMail">Y{{__('user/profile.new_password_repeat')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPhone"
                                   name="phone"
                                   value="{{$user->phone}}">
                            <label for="floatingPhone">{{__('user/profile.phone')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingAddress"
                                   name="address"
                                   value="{{$user->address}}">
                            <label for="floatingAddress">{{__('user/profile.address')}}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="languageId" aria-label="Floating label select example">
                                @foreach($languages as $language)
                                    <option
                                        value="{{$language->id}}" {{$language->id == $user->languageId ? 'selected' : null}}>{{$language->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{__('user/profile.language')}}...</label>
                        </div>

                        <div class="input-group">
                            <input type="file" class="form-control" name="photo">
                            <label class="input-group-text" for="inputGroupFile02">{{__('user/profile.profile_photo')}}</label>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('user/profile.save_btn')}}</button>
                            <a href="{{route('user.dashboard')}}" class="btn btn-danger">{{__('user/profile.cancel_btn')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>{{__('user/menu.profile')}}</title>

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
        const actionUrl = '{{route('user.profile.update')}}';
        const backUrl = '{{route('user.profile')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

