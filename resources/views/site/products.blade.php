@extends('layouts.app')
@section('title')
@if (Request::is('all-products'))
{{ trans('site.allProducts') }}
@elseif(Request::is('wishlist'))
{{ trans('site.myWishlist') }}
@elseif($category=='1')
{{ trans('site.men') }}
@elseif($category=='2')
{{ trans('site.women') }}
@elseif($category=='3')
{{ trans('site.kids') }}
@endif
@stop	
@section('style')
<link rel="stylesheet" href="{{ asset('site/css/product_info.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/search-resault.css') }}">
@if (app()->getLocale()=='ar')
<link rel="stylesheet" href="{{ asset('site/css/product_info-rtl.css') }}">
    
@endif
@stop

@section('content')
<section class="search-resault">
    <div class="container">
        <div class="title">
            <h4>
                @if (Request::is('all-products'))
                    {{ trans('site.allProducts') }}
                    @elseif(Request::is('wishlist'))
                    {{ trans('site.myWishlist') }}
                    @elseif($category=='1')
                    {{ trans('site.men') }}
                    @elseif($category=='2')
                    {{ trans('site.women') }}
                    @elseif($category=='3')
                    {{ trans('site.kids') }}
                @endif
            </h4>
        </div>

        <!--start bread crumb-->
        <nav aria-label="breadcrumb" @if (app()->getLocale()=='ar')
            style="direction: rtl;"
        @endif >
            <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><div class="img"></div></a></li>
                <li class="breadcrumb-item active arrest-bread" aria-current="page">
                    @if (Request::is('all-products'))
                        {{ trans('site.allProducts') }}
                        @elseif(Request::is('wishlist'))
                        {{ trans('site.myWishlist') }}
                        @elseif($category=='1')
                        {{ trans('site.men') }}
                        @elseif($category=='2')
                        {{ trans('site.women') }}                        
                        @elseif($category=='3')
                        {{ trans('site.kids') }}
                    @endif
                </li>
            </ol>
        </nav>
        <!--end bread crumb-->
        <div class="resault-box shop">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <a href="{{ route('product.details',$product->id) }}"><img class="card-img-top" src="{{ $product->main_image}}" alt="Card image" style="width:100%"></a>
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $product['name_'.app()->getLocale()] }}</h4>
                                        @if (!Request::is('wishlist'))
                                        <form  action="{{ url('/home') }}" id="add{{ $product->id }}"  method="get"  >
                                        @elseif(Request::is('wishlist'))
                                        {!! Form::open(['method'=>'delete','url'=>['/wishlist/remove', $product->id],'id'=>'add'. $product->id  ]) !!}
                                        @endif
                                        
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="price">{{ $product->price }} LE</p>
                                            </div>
                                            <div class="col-4">
                                                @if (!Request::is('wishlist'))
                                                    
                                                <i class="fas fa-heart text-center" onclick="$('#add{{ $product->id }}').submit()"></i>
                                                @elseif(Request::is('wishlist'))
                                                    <i class="fas fa-times text-center" onclick="$('#add{{ $product->id }}').submit()"></i>
                                                @endif
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
                <?php $pro =App\Model\Admin\Product::whereNotNull('best_offer')->select('id','main_image','available_count')->first();
                    if (!$pro) {
                        $pro =null;
                    }
                ?>
                <div class="col-md-3">
                    @if ($pro && $pro->available_count > 0)
                    <div class="best-offer">
                        <div class="b-off-box"></div>
                        <a href="{{ url('/product', $pro->id) }}">
                            <img src="{{ $pro->main_image }}" alt="best-oofer" class="img-fluid b-off-picts">
                        </a> 
                    </div>
                    @else
                    <div class="best-offer">
                        <div class="b-off-box"></div>
                        <a href="#">
                            <img src="{{ asset('site/image/b-off-picts.png') }}" alt="best-oofer" class="img-fluid b-off-picts">
                        </a> 
                    </div>
                    @endif
                </div>
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
            @if (!Request::is('wishlist'))
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
            @endif
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