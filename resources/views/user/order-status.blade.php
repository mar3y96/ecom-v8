@extends('layouts.app')
@section('title',trans('site.orderStatus'))	
@section('style')
<link rel="stylesheet" href="{{ asset('site/css/product_info.css')}}">
<link rel="stylesheet" href="{{ asset('site/css/profile.css')}}">
<link rel="stylesheet" href="{{ asset('site/css/order-statu.css')}}">
@if (app()->getLocale()=='ar')
<link rel="stylesheet" href="{{ asset('site/css/product_info-rtl.css')}}">
<link rel="stylesheet" href="{{ asset('site/css/profile-rtl.css')}}">
<link rel="stylesheet" href="{{ asset('site/css/order-statu-rtl.css')}}">
@endif
@stop
@section('content')
<!--start order-statu-->
<section class="order-statu profile">
    <div class="container">
        <div class="title">
            
        </div>

        <!--start bread crumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}"><div class="img"></div></a></li>
                <li class="breadcrumb-item arrest-bread"><a href="{{ url('/orders') }}">{{ trans('site.orders') }}</a></li>
                <li class="breadcrumb-item active arrest-bread" aria-current="page">{{ trans('site.shipmentStatus') }}</li>
            </ol>
        </nav>
        <!--end bread crumb-->
        <div class="row">
            <div class="col-md-4">
                <div class="dashboard">
                    <img src="{{ asset('site/image/profile-pic.png')}}" alt="prfile picture" class="img-fluid">
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/home') }}">{{ trans('site.acountDetails') }}</a></li>
                        <li><a href="{{ url('/orders') }}" class="active">{{ trans('site.orders') }}</a></li>
                        {{--  <li><a href="addresses.html">Addresses</a></li>  --}}
                        {{-- <li><a href="payment-methodes.html">Payment methods</a></li> --}}
                        <li>
                            <form action="{{ url('logout') }}" method="post">
                                @csrf
                                <button class="btn">{{ trans('site.logOut') }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!--start order statu card-->
            <div class="col-md-8">
                <div class="order-statu-card">
                    <div class="row">
                        <div class="col-md-2">
                            {{-- <img src="{{  asset('site/image/b-off-picts.png')}}" alt="product" class="img-fluid"> --}}
                        </div>
                        <div class="col-md-10">
                            <div class="statu">
                                <h5>{{ trans('site.shipmentStatus') }}</h5>
                                @if ($order->status=='pending'||$order->status=='processing')
                                    
                                    <h5>{{ trans('site.readyForShipping') }}</h5>
                                    @else
                                    <h5>{{ trans('site.'.$order->status) }}</h5>
                                @endif
                                <div class="scale">
                                    @if($order->status!='canceled' &&$order->status != 'undelivered' )
                                    <div class="step">
                                        <div class="in-processing {{ $order->status=='pending'?'waiting':'done' }}-state">
                                            <img src="{{  asset('site/image/done-icon.png')}}" alt="done" class="img-fluid done">
                                        </div>
                                        <h6>{{ trans('site.inProcessing') }}</h6>
                                    </div>
                                    <div class="step">
                                            @if ($order->status!='pending' && $order->status!='processing')
                                            
                                            <div class="shipping  done-state">
                                                <img src="{{  asset('site/image/done-icon.png')}}" alt="done" class="img-fluid done">
                                            </div>
                                            @else
                                                <div class="shipping  waiting-state">
                                                    <img src="{{  asset('site/image/done-icon.png')}}" alt="done" class="img-fluid waiting">
                                                </div>
                                            @endif
                                        <h6>{{ trans('site.shipping') }}</h6>
                                    </div>
                                    <div class="step">
                                        <div class="deliverd">
                                            <img src="{{  asset('site/image/done-icon.png')}}" alt="done" class="img-fluid  {{ $order->status =='delivered'?'done':'waiting' }}">
                                        </div>
                                        <h6 class="deliverd-title">{{ trans('site.delivered') }}</h6>
                                    </div>
                                    @else
                                    <h4>{{ $order->status }} </h4>
                                    
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                                <div class="product-info">
                                    <h6><span>{{ trans('site.orderNo') }}</span><span>#{{ $order->id }}</span></h6>
                                    <h6 style="margin: 0px"><span>{{ trans('site.orderDate') }}</span><span>{{  \Carbon\Carbon::parse($order->created_at)->format('M , d Y')  }}</span></h6>
                                    {{-- <h6 class="text-uppercase">light shahin short xl</h6> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--start order statu card-->
    </div>
</section>
<!--end order-statu-->
@stop