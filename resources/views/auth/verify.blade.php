@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card bg-dark text-white">
                <div class="card-header">{{ __('Eposta adresinizi doğrulayın') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('E-posta adresinize yeni bir doğrulama bağlantısı gönderildi.') }}
                        </div>
                    @endif

                    {{ __('Devam etmeden önce, lütfen bir doğrulama bağlantısı için e-postanızı kontrol edin.') }}
                    {{ __('E-postayı almadıysanız') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="login-button btn btn-light fw-bolder">{{ __('başka bir istekte bulunmak için buraya tıklayın') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    @csrf
    <div class="signin" [hidden]="login">
        <h1 class="topline">Eposta adresinizi doğrulayın</h1>
        <br />
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('E-posta adresinize yeni bir doğrulama bağlantısı gönderildi.') }}
            </div>
        @endif

        <div class="input-field">
            <input id="password" type="password" placeholder="Şifre" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <label>Devam etmeden önce, lütfen bir doğrulama bağlantısı için e-postanızı kontrol edin.</label>
        <label>E-postayı almadıysanız</label>
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <div class="login-box-button">
                <button type="submit">
                    Başka bir istekte bulunmak için buraya tıklayın
                </button>
            </div>
        </form>

    </div>
@endsection
