@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('site/css/product_info.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/sign-up.css') }}">
    @if (app()->getLocale()=='ar')
    <link rel="stylesheet" href="{{ asset('site/css/product_info-rtl.css') }}">

    <link rel="stylesheet" href="{{ asset('site/css/sign-up-rtl.css')}}"> 
    @endif
@stop

@section('content')

    <!--start register-->
    <section class="sign-up">
        <div class="container">
            <div class="title">
                <h2>{{ trans('site.signUp') }}</h2>
            </div>

            <!--start bread crumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><div class="img"></div></a></li>
                    <li class="breadcrumb-item active arrest-bread" aria-current="page">{{ trans('site.signUp') }}</li>
                </ol>
            </nav>
            <!--end bread crumb-->
            <!--start Sign up container-->
            <div class="signUp-container">
                <div class="header">
                    <div class="row">
                        <div class="col-6">
                            <p class="signUp"><a href="#">{{ trans('site.signUp') }}</a></p>
                        </div>
                        <div class="col-6">
                            <p class="text-right log-in"><a href="{{url('login') }}">{{ trans('site.login') }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="body">
                        <div class="social-media">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{ url('login/facebook') }}" class="facebook">
                                        <i class="fab fa-facebook-f"></i> {{ trans('site.loginWithFacebook') }}
                                    </a>
                                </div>
                                <div class="col-sm-6" >
                                    <a href="{{ url('login/google') }}" class="google-plus"><i class="fab fa-google-plus-g"></i> {{ trans('site.loginWithGoogle') }}</a>
                                </div>
                            </div>
                        </div>
                    <h2 class="or">{{ trans('site.or') }}</h2>
                    <form method="POST" action="{{ url('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="f_name">{{ trans('site.firstName') }}</label>
                                    <input type="text" class="form-control {{ $errors->has('f_name') ? ' is-invalid' : '' }}" value="{{ old('f_name')}}" id="f_name" name="f_name">
                                    @if ($errors->has('f_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('f_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="l_name" >{{ trans('site.lastName') }}</label>
                                    <input type="text" class="form-control {{ $errors->has('l_name') ? ' is-invalid' : '' }}" id="l_name" name="l_name" value="{{ old('l_name')}}">
                                    @if ($errors->has('l_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('l_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ trans('site.email') }}</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email')}}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio" name="gender" value="1">
                            <label class="custom-control-label" for="customRadio">{{ trans('site.male') }}</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio2" name="gender" value="2">
                            <label class="custom-control-label" for="customRadio2">{{ trans('site.female') }}</label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <label for="sel1" class="country">{{ trans('site.city') }}</label>
                            <select class="form-control" id="sel1" name="city_id">
                               @include('layouts.cities')
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pwd">{{ trans('site.password') }}</label>
                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="pwd">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="cpwd">{{ trans('site.cpassword') }}</label>
                            <input type="password" class="form-control" name="password_confirmation" id="cpwd">
                        </div>

                        <button type="submit" class="btn">{{ trans('site.signUp') }}</button>
                        <p>{{ trans('site.haveAnAcount') }}<a href="{{ url('login') }}">{{ trans('site.login') }}</a> </p>
                    </form>
                </div>
            </div>
            <!--end Sign up container-->
        </div>
    </section>
    <!--end register-->

@endsection
