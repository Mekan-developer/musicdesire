@extends('layouts.base')

@section('content')
    <div class="login">
        <div class=" register">
            <div class="row justify-content-center">
                <div class="col-md-4 text-end">
                    <img src="{{ asset('assets/images/reg.png') }}" alt="" class="register-png">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3 my-auto">
                    <p class="form-title">{{__('common.auth')}}</p>
                    <p class="form-subtitle">{{__('common.register_p')}}</p>
                    <form method="POST" action="{{ route('login') }}" class="form">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <i class="fa-solid fa-envelope input-icon my-auto"></i>
                                    <input placeholder="Email" id="email" type="email"
                                        class="input-with-i form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <i class="fa-regular  fa-key-skeleton input-icon my-auto"></i>
                                    <input placeholder="{{ __('common.password') }}" id="password" type="password"
                                        class="input-with-i form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>         
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="a-btn" for="remember">
                                        {{__('common.remember')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 text-end">
                                <button type="submit" class="btn btn-primary a">
                                    <div class="d-flex">
                                        <p class="register-btn-p">{{__('common.next')}}</p>
                                        <i class="fa-light fa-chevron-right my-auto"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="a-btn mb-3" href="{{ route('password.request') }}">
                                {{ __('common.forgot') }}
                            </a>
                        @endif
                    </form>

                    <a class="a-btn" href="/register">{{__('common.dont_have_yet')}}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
