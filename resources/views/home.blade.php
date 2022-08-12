@extends('layouts.app')

@section('title',trans('site.myAccount'))
@section('style')
<link rel="stylesheet" href="{{ asset('site/css/product_info.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/profile.css') }}">
@if (app()->getLocale()=='ar')
<link rel="stylesheet" href="{{ asset('site/css/product_info-rtl.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/profile-rtl.css')}}">
@endif
@stop
@section('content')
    <!--start cart-->
    <section class="profile">
        <div class="container">
            <div class="title">
               
            </div>

            <!--start bread crumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><div class="img"></div></a></li>
                    <li class="breadcrumb-item active arrest-bread" aria-current="page"> {{ trans('site.myAccount') }}</li>
                </ol>
            </nav>
            <!--end bread crumb-->
            <!--start cart-container-->
            <div class="profile-container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="dashboard">
                            <img src="{{ asset('site/image/profile-pic.png') }}" alt="prfile picture" class="img-fluid">
                            <ul class="list-unstyled">
                                <li><a href="#" class="active">{{ trans('site.acountDetails') }}</a></li>
                                <li><a href="{{ url('/orders') }}">{{ trans('site.orders') }}</a></li>
                                {{--  <li><a href="addresses.html">Addresses</a></li>
                                <li><a href="payment-methodes.html">Payment methods</a></li>  --}}
                                <li>
                                    <form action="{{ url('logout') }}" method="post">
                                        @csrf
                                        <button class="btn">{{ trans('site.logOut') }}</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-8">
                        {!! Form::open(['url'=>'/user/update','method'=>'put']) !!}
                        <div class="edit-info">
                            <h5><span>{{ trans('site.hello') }}</span> {{ auth()->user()->f_name }} </h5>
                            <p>{{ trans('site.welcomeMsg') }}
                                </p>
                            <input type="text" placeholder="First Name" class="s-size" name='f_name' value="{{ auth()->user()->f_name }}">
                            <input type="text" name="l_name" placeholder="Last Name" class="s-size" value="{{ auth()->user()->l_name }}">
                            <input type="email" name="email" value="{{ auth()->user()->email }}">
                            <input type="password" name="password" placeholder="Password">
                            <button type="submit" class="btn">{{ trans('site.saveChanges') }}</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>
    <!--end cart-->
@endsection
