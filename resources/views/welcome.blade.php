@extends('layouts.app')
@section('title',trans('site.home'))
@section('content')
    <style type="text/css">
        nav{
            max-width: 1000px;
        }
    </style>
    <!--start banner-->
    <section class="banner">
        <img src="{{ asset('site/image/T-Shirt%20Wear.png') }}" alt="tshirt wear">
    </section>
    <!--end banner-->
    <!--start categories-->
    <section class="categories">
        <div class="container">
            <div class="inner-categories">
                <div class="small-title">
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="">
                            <img src="{{ asset('site/image/T-shirt.png') }}" class="t-shirt" alt="t-shirt">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="kids">
                            <a href="{{ url('/products/3') }}" class="title">
                                <h3>{{ trans('site.kids') }}</h3>
                            </a>
                            <img src="{{ asset('site/image/kids.jpg')}}" class="img-fluid kids-img s" alt="kids">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="women">
                            <a href="{{ url('/products/2') }}" class="title">
                                <h3>{{ trans('site.women') }}</h3>
                            </a>
                            <img src="{{ asset('site/image/women.jpg') }}" class="img-fluid s" alt="women">
                            <div class="tiny-shirt">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="men">
                            <a href="{{ url('/products/1') }}" class="title">
                                <h3>{{ trans('site.men') }}</h3>
                            </a>
                            <img src="{{ asset('site/image/men.jpg') }}" class="img-fluid s" alt="men">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end categories-->
    <!--start shop-->
   
    <section class="shop">
        <div class="container">
            <div class="img-title"></div>
            <div class="row">
                <div class="col-md-9">
                    <div class="men">
                        <div class="row">
                            <?php $i = 0?>
                            @foreach($products->where('category_id',1) as $product)
                           <?php $i++ ?>
                            @if ($i<5)
                                
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
                            @else
                            @break
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="girls">
                        <div class="row">
                            <?php $i = 0?>
                            @foreach($products->where('category_id',2) as $product)
                            <?php $i++ ?>
                            @if ($i<5)
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
                                                <img src="{{ asset('site/image/cart.svg') }}" id="toCart{{ $product->id }}" alt="card">
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @else @break
                            @endif
                            @endforeach
                        </div>
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
            <form action="{{ url('/all-products') }}" method="get">
                <button type="submit" class="btn">{{ trans('site.allProducts') }}</button>
            </form>
        </div>
    </section>
    <!--end shop-->
    <!--start order now-->
    <section class="order-now">
        <div class="row">
            <div class="col-sm-6">
                <div class="left-section">
                    <img src="{{ asset('site/image/Rectangle%204.jpg') }}" alt="rectangle" class="img-fluid p-rectangle">
                    <img src="{{ asset('site/image/order-now.png') }}" alt="rectangle" class="img-fluid order-now-png">
                    <img src="{{ asset('site/image/Layer%2019.jpg') }}" alt="beutiful-shirt" class="img-fluid picts">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="right-section">
                    <img src="{{ asset('site/image/Rectangle%204%20copy.jpg')}}" class="img-fluid y-rectangle" alt="rectangle">
                    <img src="{{ asset('site/image/bag.png') }}" alt="bag" class="img-fluid bag">
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