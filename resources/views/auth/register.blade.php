@extends('layouts.base')

@section('content')
    <div class=" register">
        <div class="row justify-content-center mobile-bottom-100">
            <div class="col-xl-4 col-lg-6 col-md-4 text-end">
                <img src="{{ asset('assets/images/reg.png') }}" alt="" class="register-png">
            </div>
            <div class="col-xl-1 col-lg-1 col-md-3"></div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 my-auto">
                <p class="form-title">{{__('common.register')}}</p>
                <p class="form-subtitle">{{__('common.register_p')}}</p>
                <form method="POST" action="{{ route('register') }}" class="form">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="input-group">
                                <i class="fa-solid fa-user  my-auto input-icon"></i>
                                <input placeholder="{{ __('common.your_name') }}" id="name" type="text"
                                    class="input-with-i form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
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
                                <i class="fa-solid fa-envelope input-icon my-auto"></i>
                                <input placeholder="Email" id="email" type="email"
                                    class="input-with-i form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

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
                                    name="password" required autocomplete="new-password">
                                @error('password')
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
                                <input placeholder="{{ __('common.repeat_password') }}" id="password-confirm" type="password"
                                    class="input-with-i form-control" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4 text-end">
                            <button type="submit" class="btn btn-primary a">
                                <div class="d-flex">
                                    <p class="register-btn-p">{{ __('common.next') }}</p>
                                    <i class="fa-light fa-chevron-right my-auto"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
                <a class="a-btn " href="/login?t={{time()}}">{{__('common.already_have')}}</a>


            </div>
        </div>
    </div>
@endsection
