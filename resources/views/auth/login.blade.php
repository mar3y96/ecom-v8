@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('site/css/product_info.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/sign-up.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/log-in.css') }}">
    @if (app()->getLocale()=='ar')
    <link rel="stylesheet" href="{{ asset('site/css/product_info-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/sign-up-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/log-in-rtl.css')}}">
    @endif
@stop

@section('content')
    <!--start login-->
    <section class="sign-up">
        <div class="container">
            <div class="title">
                <h2>{{ trans('site.login') }}</h2>
            </div>

            <!--start bread crumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><div class="img"></div></a></li>
                    <li class="breadcrumb-item active arrest-bread" aria-current="page">{{ trans('site.login') }}</li>
                </ol>
            </nav>
            <!--end bread crumb-->
            <!--start Sign up container-->
            <div class="signUp-container">
                <div class="header">
                    <div class="row">
                        <div class="col-6">
                            <p class="log-in"><a href="#">{{ trans('site.login') }}</a></p>
                        </div>
                        <div class="col-6">
                            <p class="text-right signUp"><a href="{{ url('register') }}">{{ trans('site.signUp') }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <form method="POST" action="{{ url('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="pwd" >{{ trans('site.email') }}</label>
                            <input type="email" class="form-control control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="pwd">{{ trans('site.password') }}</label>
                            <input type="password" class="form-control control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheck">{{ trans('site.remembeerMe') }}</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('password.request') }}"  class="password-forget">{{ trans('site.forgetPassword') }}</a>
                            </div>
                        </div>
                        <button type="submit" class="btn">{{ trans('site.login') }}</button>

                        <h2 class="or">{{ trans('site.or') }}</h2>
                        <div class="social-media">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{ url('login/facebook') }}" class="facebook">
                                        <i class="fab fa-facebook-f"></i> {{ trans('site.loginWithFacebook') }}
                                    </a>
                                </div>
                                <div class="col-sm-6" >
                                    <a href="{{ url('login/google') }}" class="google-plus"><i class="fab fa-google-plus-g"></i>{{ trans('site.loginWithGoogle') }}</a>
                                </div>
                            </div>
                        </div>
                        <p>{{ trans('site.haveAnAcount') }}</p>
                    </form>
                    <form action="{{ url('/register') }}" method="get">

                        <button type="submit" class="btn signup">{{ trans('site.signUp') }}</button>
                    </form>
                </div>
            </div>
            <!--end Sign up container-->
        </div>
    </section>
    <!--end login-->
@endsection
