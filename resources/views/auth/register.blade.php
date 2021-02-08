@extends('layouts.app')
@section('auth-header-options')
    <span class="text-white opacity-50 ml-auto mr-2 hidden-sm-down">
        Already a member?
    </span>
    <a href="{{ route('login') }}" class="btn-link text-white ml-auto ml-sm-0">
        Secure Login
    </a>
@stop
@section('content')
    <div class="container py-4 py-lg-2 my-lg-5 px-4 px-sm-0">
        <div class="row">
            <div class="col-xl-12">
                <h2 class="fs-xxl fw-500 text-white text-center">
                    Register now, its free!
                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down">
                        Your registration is free. Enjoy Smart Covid Predictor on your mobile, desktop or tablet.
                        <br>It is ready to go wherever you go!
                    </small>
                </h2>
            </div>
            <div class="col-xl-6 ml-auto mr-auto">
                <div class="card p-4 rounded-plus bg-faded">
                    <form id="js-login" novalidate="" method= "POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-6 pl-1">
                                <label class="form-label" for="fname">First Name</label>
                                <input type="text" id="fname"  class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                <div class="invalid-feedback">No, you missed this one.</div>
                            </div>
                            <div class="col-6 pr-1">
                                <label class="form-label" for="lname">Last Name</label>
                                <input type="text" id="lname" class="form-control @error('first_name') is-invalid @enderror"  name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                <div class="invalid-feedback">No, you missed this one.</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6 pl-1">
                                <label class="form-label" for="phone_number">Phone Number</label>
                                <input id="phone_number" type="number"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                                <div class="help-block"></div>
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                            </div>

                            <div class="col-6 pr-1">
                                <label class="form-label" for="emailverify">Email</label>
                                <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div class="invalid-feedback">No, you missed this one.</div>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-6 pl-1">
                                <label class="form-label" for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password">
                                <div class="invalid-feedback">Sorry, you missed this one.</div>
                            </div>
                            <div class="col-6 pr-1">
                                <div class="row no-gutters">
                                    <div class="col-lg-10 pl-lg-1 ml-6">
                                        <button id="js-login-btn" type="submit" class="btn btn-block btn-success btn-lg mt-3">{{ __('Register') }}</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{--                                            <div class="form-group">--}}
                        {{--                                               --}}
                        {{--                                            </div>--}}


                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
