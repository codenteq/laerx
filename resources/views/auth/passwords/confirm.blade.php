@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <div class="signin" [hidden]="login">
        <h1 class="topline">Devam etmeden önce lütfen şifrenizi onaylayın.</h1>
        <br />
        <div class="input-field">
            <input id="password" type="password" placeholder="Şifre" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="input-field">
            <input id="password" type="password" placeholder="Şifre" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="action">
            <a class="forgot" href="{{ route('password.request') }}">Parolanızı mı unuttunuz?</a>
        </div>

        <div class="login-box-button">
            <button type="submit">
                Şifreyi Onayla
            </button>
        </div>
    </div>
</form>
@endsection
