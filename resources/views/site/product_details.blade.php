@extends('layouts.app')

@section('title',$product['name_'.app()->getLocale()])	

@section('style')
	<link rel="stylesheet" href="{{ asset('site/css/simplelightbox.min.css') }}">
	<link rel="stylesheet" href="{{ asset('site/css/product_info.css') }}">
	<link rel="stylesheet" href="{{ asset('site/css/edit.css') }}">
	<style>
		.related-product .best-offer .b-off-picts {
			top: 96px
		}
	</style>
	@if (app()->getLocale()=='ar')
	<link rel="stylesheet" href="{{ asset('site/css/product_info-rtl.css') }}">	
	@endif
@stop
@section('content')	
	<!--start product-->
	<section class="product">
		<div class="container">
			<h4>{{ $product['name_'.app()->getLocale()] }} </h4>
			<!--start bread crumb-->
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ url('/') }}"><div class="img"></div></a></li>
					<li class="breadcrumb-item arrest-bread">{{ trans('site.categories') }}</li>
					<li class="breadcrumb-item active arrest-bread" aria-current="page">@if ($product->category_id=="1")
						<a href="{{ url('/products', 1) }}">{{ trans('site.men') }}</a>
						@elseif($product->category_id=="2")
						<a href="{{ url('/products', 2) }}">{{ trans('site.women') }}</a>
						
						@elseif ($product->category_id=="3")
						<a href="{{ url('/products', 3) }}">{{ trans('site.kids') }}</a>
					@endif</li>
				</ol>
			</nav>
			<!--end bread crumb-->
			<div class="product-box">
				<div class="row">
					<div class="col-sm-4">
						<div class="product-picts">
							<img src="{{ $product->image() }}" alt="t-shirt-picts" class="img-fluid">
							<div class="all-product-picts gallery">
								<div class="row">
									@foreach ($product->images as $image)
										<div class="col-4">
											<a href="{{ $image->image }}">
												<img src="{{ $image->image }}" alt="t-shirt-picts" class="img-fluid">
											</a>
										</div>
									@endforeach
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="product-info">
							<h4 class="p-name">{{ $product['name_'.app()->getLocale()] }} </h4>
							<h4 class="p-price">{{ trans('site.egp') }} {{ $product->price }}</h4>
							<h6 class="p-describe">{{ $product['short_description_'.app()->getLocale()] }}</h6>
						</div>
						
							<div class="product-select">
									<form action="{{ url('/cart/add',[$product->id]) }}" method="GET" id="add">
								<div class="row">
									<div class="col-md-5">
										<div class="s-color">
											@include('site.elements.available')
										</div>
									</div>
									<div class="col-md-7">
										<div class="s-size">
											<h5>{{ trans('site.selectSize') }}</h5>
											<div class="switch-field">
												<div class="row">
													@foreach($product->size as $size)
													@if ($product[$size.'_available_count']>0)
														
													<div class="col-3">
														<span class="size " ><input type="radio"  name="size" value='{{ $size }}' id="{{ $size }}" required>
															<label for="{{ $size }}">{{ $size }}</label>
														</span>
													</div>					
													@endif
													@endforeach
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						
						<div class="product-footer">
							<div class="row">
								<div class="col-sm-4">
									<div class="select-number">
										<span class="mins"><i class="fas fa-minus"></i></span>
										<span class="number">1</span>
										<span class="plus"><i class="fas fa-plus"></i></span>
									</div>
								</div>
								
								
								<div class="col-sm-4">
									<button class="btn cart" type="submit"><i class="fas fa-shopping-cart"></i> {{ trans('site.addToCart') }}</button>
								</div>
								</form>
								<form action="/home" method="get" id="wishlist{{ $product->id }}" style="width: 0%;height: 0%">

									<div class="col-sm-4">
										<button class="btn wishlist" type="submit"><i class="fas fa-heart"></i>{{ trans('site.addToWishlist') }} </button>
									</div>
								</form>
							</div>
							<div class="p-footer-info">
								<div class="row">
									<div class="col-md-7">
										<h5 class="sku"><b>{{ trans('site.sku') }}: </b>{{ $product->id }}</h5>
										<h5 class="category"><b>{{ trans('site.category') }}: </b> @if ($product->category_id=="1")
											{{ trans('site.men') }}
											@elseif($product->category_id=="2")
											{{ trans('site.women') }}
											
											@elseif ($product->category_id=="3")
											{{ trans('site.kids') }}
										@endif</h5>
									</div>
									<div class="col-md-5">
										<a href="http://www.facebook.com/sharer.php?url=" class="btn facebook"><i class="fab fa-facebook-f"></i>Facebook</a>
										<a class="btn twitter" href="https://twitter.com/share?url="><i class="fab fa-twitter"></i>Twitter</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-2">
						<div class="p-categories">
							<div class="kids">
								<div class="title">
									<a href="{{ url('products/3') }}" class="title">
										<h3>{{ trans('site.kids') }}</h3>
									</a>
								</div>
								<img src="{{ asset('site/image/kids.jpg') }}" width="100%" class="img-fluid kids-img" alt="kids">
							</div>
							<div class="women">
								<div class="title">
									<a href="{{ url('products/2') }}" class="title">
										<h3>{{ trans('site.women') }}</h3>
									</a>
								</div>
								<img src="{{ asset('site/image/women.jpg') }}" class="img-fluid" alt="women">
							</div>
							<div class="men">
								<div class="title">
									<a href="{{ url('products/1') }}" class="title">
										<h3>{{ trans('site.men') }}</h3>
									</a>
								</div>
								<img src="{{ asset('site/image/men.jpg') }}" class="img-fluid" alt="men">
							</div>
						</div>
					</div>
				</div>
				<div class="info-describe">
					<ul class="list-inline list-unstyled">
						<li class="active" data-content=".content-one">{{ trans('site.description') }}</li>
						<li data-content=".content-two">{{ trans('site.moreInfo') }}</li>
					</ul>
					<div class="content-list">
						<div class="content-one">
							<h5 class="text-uppercase">{{ $product['description_'.app()->getLocale()] }}</h5>
						</div>
						<div class="content-two">
							<div class="row">
								<div class="col-4">
									<h6>{{ trans('site.brand') }}</h6>
								</div>
								<div class="col-8">
									<p>BOXSTore</p>
								</div>
							</div>
							<div class="row">
								<div class="col-4">
									<h6>SKU</h6>
								</div>
								<div class="col-8">
									<p>{{ $product->product_num }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--end product-->

	<!--start related product-->
	<section class="related-product shop">
		<div class="container">
			<img src="{{ asset('site/image/related-product.png') }}" alt="title" class="img-fluid related-title">
			<div class="row">
				<div class="col-md-9">
					<div class="re-pro-container">
						<div class="row">
							@foreach($products as $prod)
							<div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <a href="{{ route('product.details',$prod->id) }}"><img class="card-img-top" src="{{ $prod->main_image}}" alt="Card image" style="width:100%"></a>
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $prod['name_'.app()->getLocale()] }}</h4>
                                        <form action="/home" method="get" id="add{{ $prod->id }}">
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="price">{{ $prod->price }} LE</p>
                                            </div>
                                            <div class="col-4">
                                                <i class="fas fa-heart text-center" onclick="$('#add{{ $prod->id }}').submit()"></i>
                                            </div>
                                            <div class="col-4">
                                                <img src="{{ asset('site/image/cart.svg') }}" id="toCart{{ $prod->id }}" alt="card">
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
	</section>
	<!--end related product-->

@stop	

@section('script')
	<script src="{{ asset('site/js/simple-lightbox.min.js') }}"></script>

	{{--  <script src="{{ asset('site/js/product-info.js') }}"></script>  --}}
	<script>
		$(document).ready(function(){
			let total = 1,
			 max = '{{ $product->available_count }}';
			$('input[type=radio][name=size]').on('change',function(){
				let mySize = this.value,
				getSize = '{{ url('/get-available') }}',
				myProduct = '{{ $product->id }}';
				total = 1;
				$('.number').text(total)
				$.ajax({
                    type: "get",
                    url: `${getSize}/${myProduct}/${mySize}`,
                    success: function(data) {
						// alert(available)
						max = data.avilabel;
						$('.s-color').html(data.html);
					}
				});

			});
			
			
			$('.plus').on('click', function () {
				if (total<max) {
				total += 1;
				console.log(total)
				$('.number').text(total)
				};
			});
			$('.mins').on('click', function () {
				if (total > 0) {
					total -= 1;
					console.log(total + '1')
					$('.number').text(total)
				};
			});
			$("#add").on('submit',function(){
				var pro = '{{ $product->id }}',
				ul = '{{ url('/cart/add') }}';
				$.ajax({
                    type: "get",
                    url: ul+'/'+pro+'/'+total,
                    data: $(this).serialize(),
                    success: function(data) {
						swal ( 
						{
						title:'',
						text: data,
						type: "success",
						timer: 3000
						})
					total = 1;
					$('.number').text(total)
                    }
                });
				
				return false;    
			});
			//dynamic tabs
			$('.info-describe li').on('click',(function(){
				$(this).addClass('active').siblings().removeClass('active');
		//		console.log($(this).data('content'))
				$('.content-list >div').hide();
				$($(this).data('content')).fadeIn()
			}));
			//gallery
			var gallery = $('.gallery a').simpleLightbox();
			@foreach($products as $pro)
            $("#wishlist{{ $pro->id }}").on('submit',function(){
                // alert('{{ $product->id }}');
				if ('{{ $pro->id }}' !='{{ $product->id }}') {
					
				var pro = '{{ $pro->id }}',
                ul = '{{ url('/wishlist/add/') }}';
				$.ajax({
                    type: "get",
                    url: ul+'/'+pro,
                    success: function(message) {
                        // alert(message);
					swal ( 
						{
						title: "",
						text: message,
						type: "info",
						timer: 3000
					})
                       
                    }
                });
				}
                @auth
				return false;
                @endauth    
            });
			$('#toCart{{ $pro->id }}').on('click',function(){
                // alert('test{{ $product->id }}');
                var pro = '{{ $pro->id }}',
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
            $("#wishlist{{ $product->id }}").on('submit',function(){
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
			
		});
	</script>
	
@stop
@section('script')
    <script>
        $(document).ready(function(){
            
				
        });
    </script>
@endsection    