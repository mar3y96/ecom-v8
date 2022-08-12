@extends('layouts.app')
@section('title',trans('site.cart'))	
@section('style')
    <link rel="stylesheet" href="{{ asset('site/css/product_info.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/cart.css')}}">
    @if (app()->getLocale()=='ar')
    <link rel="stylesheet" href="{{ asset('site/css/product_info.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/cart-rtl.css')}}">
    @endif

@stop
@section('content')	
<!--start cart-->
	<section class="cart">
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
            <!--end bread crumb-->
            @include('layouts.alert')
            <!--start cart-container-->
            <div class="cart-container">
                <div class="row">
                    <div class="col-md-8">
                       
                        @foreach ($data as $product)
                            
                            <!--start item-->
                            <div class="product-item" id="product1">
                                <div class="head">
                                    <div class="row">
                                        <div class="col-6">
                                            <h3 class="item">{{ trans('site.item') }}</h3>
                                        </div>
                                        <div class="col-2">
                                            <h3 class="price">{{ trans('site.price') }}</h3>
                                        </div>
                                        <div class="col-2">
                                            <h3 class="qty">{{ trans('site.qty') }}</h3>
                                        </div>
                                        <div class="col-2">
                                            <h3 class="subtotal">{{ trans('site.total') }}</h3>
                                        </div>

                                    </div>
                                </div>
                                <form action="{{ url('/cart/action',$product->rowId) }}" method="get" id="action{{ $product->rowId }}">
                                    
                                <div class="item-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="item-info">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <img src="{{ $product->options->image }}" alt="item" class="img-fluid">
                                                    </div>
                                                    <div class="col-7">
                                                        <h5>{{ $product->name }}</h5>
                                                        <P>{{ trans('site.size') }}: <span class="size">{{ $product->options->size }}</span></P>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-2">
                                            <div class="price-body">
                                                <h5 class="s-title">{{ trans('site.price') }}</h5>
                                                <h5 class="s-ml">{{ trans('site.egp') }} {{ $product->price }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-2">
                                            <h5 class="s-title">{{ trans('site.qty') }}</h5>
                                            <div class="qty-body s-ml">
                                                <span class="mins" id="mins{{ $product->rowId }}"><i class="fas fa-minus"></i></span>
                                                <span class="number" id="number{{ $product->rowId }}">
                                                    <input type="text" 
                                                    
                                                    class="form-control" id="usr" value="{{ $product->qty }}" name="qty"></span>
                                                <span class="plus" id="plus{{ $product->rowId }}"><i class="fas fa-plus"></i></span>
                                            </div>
                                            {{--  <div class="qty-body s-ml">
                                            
                                            <input type="number" value="{{ $product->qty }}" name="qty" style="width: 50px" max="{{ \App\Model\Admin\Product::find($product->id)->available_count }}" >
                                            </div>  --}}
                                        </div>
                                        <div class="col-sm-12 col-md-2">
                                            <div class="subtotal-body">
                                            <h5 class="s-title">{{ trans('site.subtotal') }}</h5>
                                                <h5 class="s-ml s-ml-sub">{{ trans('site.egp') }} {{ $product->subtotal() }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="order-inreveiw">
                                        <button name="action" value='update' onclick="$('#action{{ $product->rowId }}').submit()"><i class="fas fa-edit "></i></button>
                                        <button  name="action" value='delete'  onclick="$('#action{{ $product->rowId }}').submit()"><i class="fas fa-times "></i></button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <!--end item-->
                        @endforeach
                        
                    </div>
                    @if (Cart::count()>0)    
                        <div class="col-md-4">
                            <div class="payment-methode">
                                <div class="the-methode">
                                    <h4>{{ trans('site.paymentMethod') }}</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx">
                                                <label class="custom-control-label" for="customRadio">{{ trans('site.cashOnDelivery') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <img src="{{ asset('site/image/delivery.png') }}" alt="visa" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>{{ trans('site.orderTotal') }}</h5>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="price">{{ trans('site.egp') }} {{ Cart::subtotal(2,'.','')}}</h5>
                                        </div>
                                    </div>
                                    <form action="{{ url('/cart/check-out') }}" method="get">
                                    <button type="button" class="btn check-out" onclick="this.form.submit()">{{ trans('site.placeOrder') }}</button>      
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                {{-- {!! Form::open(['url'=>'/cart/apply-discount','method'=>'get','id'=>'discount']) !!} --}}
                    @if (Cart::count()>0)    
                    <div class="apply-discount" id="my-alert">
                        <div class="row">
                            <input type="text" name="discount" id="discount-value">
                            <button type="submit" class="btn apply-discount" id="discount">{{ trans('site.aPPLYDISCOUNT') }}</button>
                        </div>
                        
                        <div id="success" class="alert alert-success" style="width: 300px">
                            {{ trans('site.valiedCode') }}
                        </div>
                        <div id="danger" class="alert alert-danger" style="width: 300px">
                            {{ trans('site.invaliedCode') }}
                        </div>
                    </div>
                    @endif

                </form>
            </div>
        </div>
    </section>
<!--end cart-->

@stop
@section('script')
    <script src="{{ asset('site/js/cart.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#danger').hide();
            $('#success').hide();
            $('#cartMsg').hide();
            @foreach($data as $d) 
            var count{{ $d->rowId }} = {{ App\Model\Admin\Product::find($d->id)[ $d->options->size.'_available_count'] }};
            
            var total{{ $d->rowId }} = parseInt('{{ $d->qty }}');
            
			$('#plus{{ $d->rowId }}').on('click', function () {
                if ( total{{ $d->rowId }} < count{{ $d->rowId }}) {
                    
                    total{{ $d->rowId }} += 1;
                    console.log(total{{ $d->rowId }})
                    $('#number{{ $d->rowId }} input').val(total{{ $d->rowId }})
                }
			});
			$('#mins{{ $d->rowId }}').on('click', function () {
				if (total{{ $d->rowId }} > 0) {
					total{{ $d->rowId }} -= 1;
					console.log(total{{ $d->rowId }})
                    $('#number{{ $d->rowId }} input').val(total{{ $d->rowId }})
				};
                
            });
            $('#number{{ $d->rowId }} input').on(' keyup', function () {
			total{{ $d->rowId }} =	parseInt($('#number{{ $d->rowId }} input').val())
	        });
            @endforeach
            $("#discount").on('click',function(){
				var ul = '{{ url('/cart/apply-discount') }}',
                code =  $('#discount-value').val();

				$.ajax({
                    type: "get",
                    url: `${ul}/${code}`,
                    success: function(data) {
                        // alert(data.status)
                       if (data.status=='true') {
                           $('#danger').hide();
                           $('#success').show();
                        }
                        else if (data.status=='false') {
                           $('#success').hide();
                           $('#danger').show();
                        }                      
                    }
                });
				
				return false;    
			});
        });
        
    </script>   
@endsection