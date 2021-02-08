@extends('layouts.app')
@section('auth-header-options')

    <a href="{{ route('register') }}" class="btn-link text-white ml-auto">
        Create Account
    </a>
{{--    @cannot('hasVerifiedEmail',\App\User::class)--}}
{{--        <span class="header-label">--}}
{{--                                <i class="icon-header icon-users color_primary"></i>--}}
{{--                                <span class="helper"> <strong>Please verify your email</strong></span>--}}
{{--                            </span>--}}
{{--    @endcannot--}}
@stop
@section('content')
    <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
        <div class="row">
            <div class="col col-md-6 col-lg-7 hidden-sm-down">
                <h2 class="fs-xxl fw-500 mt-4 text-white">
                    Welcome to the Smart Covid Predictor
                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">

                        We care about the confidentiality and integrity of your personal data. That is why we need to know who you are. Please go ahead and login with your email and password
                    </small>
                </h2>
                <h2 style="visibility: hidden" class="fs-xxl fw-500 mt-4 text-white">
                    <br>
                    <br>
                </h2>

                {{--                <div class="d-sm-flex flex-column align-items-center justify-content-center d-md-block">--}}
                {{--                    <div class="px-0 py-1 mt-5 text-white fs-nano opacity-50">--}}
                {{--                        Quick links--}}
                {{--                    </div>--}}
                {{--                    <div class="d-flex flex-row opacity-70">--}}
                {{--                        <a href="" class="mr-2 fs-lg fw-500 text-white opacity-70">Create An Account as a Medical Practitioner</a>--}}
                {{--                        <a href="#" class="mr-2 fs-lg fw-500 text-white opacity-70">The Tribore Website</a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
                    Secure login
                </h1>
                <div class="card p-4 rounded-plus bg-faded">
                    <form id="js-login" novalidate="" method="POST" action="{{ route('login')}}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <div class="invalid-feedback">Sorry, you missed this one.</div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group text-left">
                            <div class="row no-gutters">
                                {{--                                                <div class="col-lg-6 pr-lg-1 my-2">--}}
                                {{--                                                    <button type="submit" class="btn btn-info btn-block btn-lg">Sign in with <i class="fab fa-google"></i></button>--}}
                                {{--                                                </div>--}}

                                <div class="col-lg-12 pl-lg-1 my-2">
                                    <button id="js-login-btn" type="submit" class="btn btn-success btn-block btn-lg"> {{ __('Secure Login') }}</button>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
            2020 © Smart Covid Predictor&nbsp;<a href='{{asset('/')}}' class='text-white opacity-40 fw-500' title='Smart Covid Predictor' target='_blank'></a>
        </div>
    </div>
@stop
