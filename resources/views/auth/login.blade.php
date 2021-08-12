@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card bg-dark text-white">
                <div class="card-header fw-bold fs-4">{{ __('Giriş Yap') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-12 mb-3">
                                <input id="tc" type="text" placeholder="TCKN" class="form-control @error('tc') is-invalid @enderror" name="tc" value="{{ old('tc') }}" required autocomplete="tc" autofocus maxlength="11">

                                @error('tc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 mb-3">
                                <input id="password" type="password" placeholder="Şifre" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 mb-3 p-0">
                                <div class="text-start">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-secondary text-decoration-none" href="{{ route('password.request') }}">
                                            {{ __('Parolanızı mı unuttunuz?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="login-button btn btn-light fw-bolder">
                                    {{ __('Giriş Yap') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
