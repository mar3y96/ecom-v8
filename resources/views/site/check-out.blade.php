@extends('layouts.app')

@section('title',trans('site.checkout'))	


@section('style')
<link rel="stylesheet" href="{{ asset('site/css/product_info.css')}}">
<link rel="stylesheet" href="{{ asset('site/css/check-out.css')}}">
@if (app()->getLocale()=='ar')
<link rel="stylesheet" href="{{ asset('site/css/product_info-rtl.css')}}">
<link rel="stylesheet" href="{{ asset('site/css/check-out-rtl.css')}}">
<style>
    .chech-out .summary{
    padding:10px
    }
 </style>
@endif
@stop
@section('content')
<!--start check out-->
<section class="chech-out">
    <div class="container">
        <div class="title">
            <div class="title-img"></div>
        </div>

        <!--start bread crumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><div class="img"></div></a></li>
                <li class="breadcrumb-item active arrest-bread" aria-current="page">{{ trans('site.cart') }}</li>
            </ol>
        </nav>
        @include('layouts.alert')
        <!--end bread crumb-->
        @if ($discount != null)
            
        {!! Form::open(['url'=>['order/create',$discount->id],'method'=>'post']) !!}
        @else
        {!! Form::open(['url'=>'order/create','method'=>'post']) !!}
        @endif
        
        <div class="check-out-container">
            <div class="shipping-info">
                <div class="row">
                    <div class="col-md-8">
                        <div class="address">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>{{ trans('site.shippingAddress') }}</h4>
                                    <input type="text" placeholder="{{ trans('site.firstName') }}" name="f_name">
                                    <input type="text" placeholder="{{ trans('site.secondName') }}" name="s_name">
                                    <input type="text" placeholder="{{ trans('site.email') }}" name="email">
                                    <input type="text" placeholder="{{ trans('site.phone') }}" name="phone">
                                    <input type="text" placeholder="{{ trans('site.address') }}" name="address">
                                     <select name="city" id="tax">
                                         <option disabled selected>select city</option>
                                       @foreach ($cities as $city)
                                           <option value="{{ $city->id }}">{{ $city['city_name_'.app()->getLocale()] }}</option>
                                       @endforeach
                                    </select>
                                    {{-- 
                                    <select>
                                        <option>district</option>
                                    </select>  --}}
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="methode">
                                        <h4>Shipping methode</h4>
                                        <select>
                                            <option>online</option>
                                            <option>when product delivered</option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" id="details">

                    @include('site.elements.details')
                    </div>
                    
                </div>
            </div>
        </div>
        
        {!! Form::close() !!}
        
        <!--start check-out container-->
        <!--end check-out container-->
    </div>
</section>
<!--end check out-->
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $("#tax").on('change',function(){
                let city = $('#tax').val();
                let ul = '{{ url('/cart/get-tax') }}';
                @if($discount!=null)
                let discount = '{{ $discount->id }}';
                let fullUrl = `${ul}/${city}/${discount}`;
                @else
                let fullUrl = `${ul}/${city}`;                
                @endif
                // alert(discount)
                $.ajax({
                    type: "get",
                    url: fullUrl,
                    success: function(data) {
                        // alert(discount)
                        $('#details').html(data);
                    //    alert(data)
                    }
                });
            })
        });
    </script>
@endsection