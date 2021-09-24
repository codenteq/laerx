@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="signin" [hidden]="login">
            <h1 class="topline">Şifreyi yenile</h1>
            <br />
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="input-field">
                <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="login-box-button">
                <button type="submit">
                    Şifre Sıfırlama Bağlantısını Gönder
                </button>
            </div>
        </div>
    </form>

@endsection
