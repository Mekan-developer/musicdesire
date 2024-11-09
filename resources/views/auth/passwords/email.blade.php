@extends('layouts.base')

@section('content')
    <div class=" register">
        <div class="row justify-content-center">
            <div class="col-md-4 text-end">
                <img src="{{ asset('assets/images/reg.png') }}" alt="" class="register-png">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3 my-auto">
                <p class="form-title">{{ __('common.password_reset') }}</p>
                <p class="form-subtitle">{{__('common.register_p')}}</p>
      

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                               
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


                                <div class="row mb-0">
                                    <div class="col-md-10 offset-md-2">
                                        <button type="submit" class="btn btn-primary a">
                                            <div class="d-flex">
                                                <p class="register-btn-p text-start ml-3">{{__('common.password_reset_link')}}</p>
                                                <i class="fa-light fa-chevron-right my-auto"></i>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </form>
             
                {{-- <a class="a-btn" href="/login">Уже есть аккаунт?</a> --}}
            </div>
        </div>
    </div>
    {{-- <div class="register">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><p>Сброс пароля</p></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
