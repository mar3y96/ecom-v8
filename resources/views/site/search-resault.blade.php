@extends('layouts.app')
@section('title')
{{ trans('site.searchResault') }} '{{ $key }}'
@stop	
@section('style')
<link rel="stylesheet" href="{{ asset('site/css/product_info.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/search-resault.css') }}">
@if (app()->getLocale()=='ar')
<link rel="stylesheet" href="{{ asset('site/css/product_info-rtl.css') }}">
@endif
@stop
@section('content')
<!--start search resault-->
<section class="search-resault">
    <div class="container">
        <div class="title">
            <h4>{{ trans('site.searchResault') }}:<span> '{{ $key }}'</span> </h4>
        </div>

        <!--start bread crumb-->
        <nav aria-label="breadcrumb" @if (app()->getLocale()=='ar')
        dir="rtl"    
        @endif
        >
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><div class="img"></div></a></li>
                <li class="breadcrumb-item active arrest-bread" aria-current="page" >{{ trans('site.searchResault') }}:<span> '{{ $key }}'</span> </li>
            </ol>
        </nav>
        <!--end bread crumb-->
        <div class="resault-box shop">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <a href="{{ route('product.details',$product->id) }}"><img class="card-img-top" src="{{ $product->main_image}}" alt="Card image" style="width:100%"></a>
                            <div class="card-body">
                                <h4 class="card-title">{{ $product['name_'.app()->getLocale()] }}</h4>
                                <form action="/home" method="get" id="add{{ $product->id }}">
                                <div class="row">
                                    <div class="col-4">
                                        <p class="price">{{ $product->price }} LE</p>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-heart text-center" onclick="$('#add{{ $product->id }}').submit()"></i>
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ asset('site/image/cart.svg') }}" alt="card" id="toCart{{ $product->id }}">
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--end search resault-->
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
@section('script')
    <script>
        $(document).ready(function(){
            @foreach($products as $product)
            $("#add{{ $product->id }}").on('submit',function(){
                // alert('{{ $product->id }}');

				var pro = '{{ $product->id }}',
                ul = '{{ url('/wishlist/add/') }}';
				$.ajax({
                    type: "get",
                    url: ul+'/'+pro,
                    success: function(message) {
                        swal ( 
						{
                        title: "",						
						text: message,
						type: "info",
						timer: 3000
						})
                       
                    }
                });
                @auth
				return false;
                @endauth    
            });
            $('#toCart{{ $product->id }}').on('click',function(){
                // alert('test{{ $product->id }}');
                var pro = '{{ $product->id }}',
                ul = '{{ url('/cart/quick-add/') }}';
				$.ajax({
                    type: "get",
                    url: ul+'/'+pro,
                    success: function(message) {
                        swal ( 
						{
                        title: "",						
						text: message,
						type: "success",
						timer: 3000
						})
                       
                    }
                });
            });
            @endforeach
				
        });
    </script>
@endsection    