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
    <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
        <div class="row">
            <div class="col-xl-12">
                <h2 class="fs-xxl fw-500 mt-4 text-white text-center">
                    Thank you registering! Please check your email.
                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-70 hidden-sm-down">
                        We’ve sent <strong>you</strong> an email with a link to activate your account.
                    </small>
                </h2>
            </div>
            <div class="col-xl-6 ml-auto mr-auto">
                <div class="card p-4 rounded-plus bg-faded">
                    <div class="alert alert-primary text-dark" role="alert">
                        <strong>Heads Up!</strong> Just in case you don't find the email in your inbox, kindly check your spam
                    </div>
                    {{--                    <a href="javascript:void(0);" class="h4">--}}
                    {{--                        <i class="fal fa-chevron-right mr-2"></i> Didn’t get an email?--}}
                    {{--                    </a>--}}
                </div>
            </div>
        </div>
    </div>
@stop

