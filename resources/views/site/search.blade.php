@extends('layouts.app')
@section('title',trans('site.search'))	
@section('style')
<link rel="stylesheet" href="{{ asset('site/css/product_info.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/search.css') }}">
@if (app()->getLocale()=='ar')
<link rel="stylesheet" href="{{ asset('site/css/product_info-rtl.css') }}">
@endif
@stop
@section('content')	
<!--start search-->
<section class="search">
    <div class="container">
        <div class="title">
            <h4>{{ trans('site.searchPage') }}</h4>
        </div>

        <!--start bread crumb-->
        <nav aria-label="breadcrumb" @if (app()->getLocale()=='ar')
            style="direction: rtl;"
        @endif>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><div class="img"></div></a></li>
                <li class="breadcrumb-item active arrest-bread" aria-current="page">{{ trans('site.search') }}</li>
            </ol>
        </nav>
        <!--end bread crumb-->
        {!! Form::open(['url'=>'/search-resault','method'=>'get']) !!}
        <div class="search-box">
            <div class="search">
                <input type="text" placeholder="{{ trans('site.search') }}" name="search"  dir="{{ app()->getLocale()=='ar'?'rtl':'auto'}}" required>
                <button type="submit" class="btn"><img src="{{ asset('/site/image/search.png')}}" class="img-fluid"> </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</section>
<!--end search-->
<!--start order now-->
<section class="order-now">
    <div class="row">
        <div class="col-sm-6">
            <div class="left-section">
                <img src="{{ asset('/site/image/Rectangle%204.jpg') }}" alt="rectangle" class="img-fluid p-rectangle">
                <img src="{{ asset('/site/image/order-now.png') }}" alt="rectangle" class="img-fluid order-now-png">
                <img src="{{ asset('/site/image/Layer%2019.jpg') }}" alt="beutiful-shirt" class="img-fluid picts">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="right-section">
                <img src="{{ asset('/site/image/Rectangle%204%20copy.jpg') }}" class="img-fluid y-rectangle" alt="rectangle">
                <img src="{{ asset('/site/image/bag.png') }}" alt="bag" class="img-fluid bag">
            </div>
        </div>
    </div>
</section>
<!--end order now-->
@stop