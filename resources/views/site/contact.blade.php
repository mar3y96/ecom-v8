@extends('layouts.app')

@section('title',trans('site.contact'))	

@section('style')
<link rel="stylesheet" href="{{ asset('site/css/product_info.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/contact.css') }}">
@if (app()->getLocale()=='ar')
<link rel="stylesheet" href="{{ asset('site/css/contact-rtl.css') }}">
@endif
@stop
@section('content')
<!--start contact-->
<section class="contact">
    <div class="container">
        <div class="title">

            
        </div>

        <!--start bread crumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><div class="img"></div></a></li>
                <li class="breadcrumb-item active arrest-bread" aria-current="page">{{ trans('site.contact') }}</li>
            </ol>
        </nav>
        <!--end bread crumb-->
        <!--start cotact-container-->
        <div class="contact-info">
            <div class="row">
                <div class="col-md-6">
                    <h3>{{ trans('site.boxContactInfo') }}:</h3>
                    <ul class="list-unstyled">
                        <li><img src="{{ asset('site/image/location.png') }}" class="img-fluid"><b>{{ trans('site.address') }}:</b> {{ settings()['address_'.app()->getLocale()] }}</li>
                        <li><img src="{{ asset('site/image/phone.png')}}" class="img-fluid"><b>{{ trans('site.phone') }}:</b> {{ settings()->phone }}
                        , {{ settings()->phone2 }} </li>
                        <li><img src="{{ asset('site/image/email.png')}}" class="img-fluid"><b>{{ trans('site.email') }}:</b> {{ settings()->site_email }}</li>
                    </ul>
                    <img src="{{ asset('site/image/contact2.png') }}" alt="image" class="img-fluid avatar">
                </div>
                <div class="col-md-6">
                <img src="{{ asset('site/image/contact1.png') }}" alt="image" class="img-fluid img-png-top">
                @include('layouts.alert')

                    <form action="{{ url('/contact/creat-message') }}" method="POST">
                        @csrf
                        <div class="form-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{ trans('site.firstName') }}" name="name"  required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="{{ trans('site.email') }}" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="{{ trans('site.subject') }}" name="subject" required>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="{{ trans('site.typeMessage') }}" name="content" required></textarea>
                            </div>
                            <button type="submit" class="btn">{{ trans('site.send') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="map">
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ asset('site/image/contact-map.png') }}" alt="location" class="img-fluid left-img">
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('site/image/winter-here.png')}}" alt="location" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<!--end about-->
@stop