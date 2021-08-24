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
@endsection
