@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <div class="signin" [hidden]="login">
            <h1 class="topline">Şifreyi Yenile</h1>
            <br/>

            <input type="hidden" name="token" value="{{ $token }}">
            <div class="input-field">
                <input id="email" type="email" placeholder="E-mail"
                       class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-field">
                <input id="password" type="password" placeholder="Şifre"
                       class="form-control @error('password') is-invalid @enderror" name="password" required
                       autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-field">
                <input id="password" type="password" placeholder="Şifreyi yenile" class="form-control"
                       name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="login-box-button">
                <button type="submit">
                    Şifre Yenile
                </button>
            </div>
        </div>
    </form>
@endsection
