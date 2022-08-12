@extends('layouts.app')

@section('title',trans('site.about'))	
@section('style')
    <link rel="stylesheet" href="{{ asset('site/css/product_info.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/about.css')}}">
    @if (app()->getLocale()=='ar') 
    <link rel="stylesheet" href="{{ asset('site/css/product_info-rtl.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/about-rtl.css')}}">
    @endif

@stop
@section('content')
<!--start about-->
<section class="about">
    <div class="container">
        <div class="title">
            
        </div>

        <!--start bread crumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><div class="img"></div></a></li>
                <li class="breadcrumb-item active arrest-bread" aria-current="page">{{ trans('site.about') }}</li>
            </ol>
        </nav>
        <!--end bread crumb-->
        <!--start about-container-->
        <div class="about-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-box-store">
                        <img src="{{ asset('site/image/about-box.png') }}" alt="logo" class="img-fluid">
                        <p>{{ settings()['about_'.app()->getLocale()] }}.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ settings()->about_section1_image}}" class="img-fluid png-img" alt="image">
                </div>
            </div>
        </div>
        <div class="store-vision">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ settings()->about_section2_image }}" alt="image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <div class="about-store-vision">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="tabs">
                                    <ul class="list-unstyled">
                                        <li class="active" data-content=".content-one">{{ trans('site.vision') }}</li>
                                        <li data-content=".content-two">{{ trans('site.mission') }}</li>
                                        <li data-content=".content-three">{{ trans('site.goals') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="content-list">
                                    <div class="content-one">
                                        <p>{{ settings()['vision_'.app()->getLocale()] }} .</p>
                                    </div>
                                    <div class="content-two">
                                        <p>{{ settings()['mission_'.app()->getLocale()] }} .</p>
                                    </div>
                                    <div class="content-three">
                                        <p>{{ settings()['goals_'.app()->getLocale()] }} .</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end about-->
@stop
@section('script')
    <script src="{{ asset('site/js/about.js') }}"></script>
@stop