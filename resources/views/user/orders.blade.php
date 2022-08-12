@extends('layouts.app')

@section('title',trans('site.orders'))	

@section('style')
<link rel="stylesheet" href="{{ asset('site/css/product_info.css')}}">
<link rel="stylesheet" href="{{ asset('site/css/profile.css')}}">
<link rel="stylesheet" href="{{ asset('site/css/order.css')}}">
@if (app()->getLocale()=='ar')
<link rel="stylesheet" href="{{ asset('site/css/product_info-rtl.css')}}">
<link rel="stylesheet" href="{{ asset('site/css/profile-rtl.css')}}">
@endif
@stop
@section('content')
<!--start order-->
<section class="order profile">
	<div class="container">
		<div class="title">
			
		</div>

		<!--start bread crumb-->
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ '/' }}"><div class="img"></div></a></li>
				<li class="breadcrumb-item active arrest-bread" aria-current="page">{{ trans('site.orders') }}</li>
			</ol>
		</nav>
		<!--end bread crumb-->

		<!--start cart-container-->
		<div class="order-container">
			<div class="row">
				<div class="col-md-4">
					<div class="dashboard">
						<img src="{{ asset('site/image/profile-pic.png')}}" alt="prfile picture" class="img-fluid">
						<ul class="list-unstyled">
							<li><a href="{{ url('/home') }}">{{ trans('site.acountDetails') }}</a></li>
							<li><a href="#" class="active">{{ trans('site.orders') }}</a></li>
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
				<div class="col-md-8">
						
					<div class="orders-info">
						<div class="header">
							<div class="row">
								<div class="col-2">
									<h4>{{ trans('site.order') }}</h4>
								</div>
								<div class="col-2">
									<h4>{{ trans('site.date') }}</h4>
								</div>
								<div class="col-2">
									<h4>{{ trans('site.status') }}</h4>
								</div>
								<div class="col-3">
									<h4>{{ trans('site.total') }}</h4>
								</div>
								<div class="col-3">
									<h4>{{ trans('site.action') }}</h4>
								</div>
							</div>
						</div>
						@foreach ($orders as $order)
							
							<div class="order-item-info">
								<div class="row">
									<div class="col-2">
										<p>#{{ $order->id }}</p>
									</div>
									<div class="col-2">
										<p>{{  \Carbon\Carbon::parse($order->created_at)->format('M , d')  }}</p>
									</div>
									<div class="col-2">
										<p>{{ trans('site.'.$order->status) }}</p>
									</div>
									<div class="col-3">
										<p>{{ $order->total }} {{ trans('site.egp') }} {{ trans('site.for') }} {{ $order->count }} {{ trans('site.piece') }}</p>
									</div>
									<div class="col-3">
										{{-- <span>pay</span> --}}
										<form action="{{ url('/order/cancel',$order->id) }}" method="POST" id="cancel{{ $order->id }}">
											@csrf
											<span><a href="{{ url('/order-status',$order->id) }}">{{ trans('site.view') }}</a></span>
											<button ><span>{{ trans('site.cancel') }}</span></button>
										</form>
									</div>
								</div>
							</div>
							
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--end cart-->
@stop
@section('script')
	<script>
		$(document).ready(function(){
			@foreach($orders as $order)
			$('#cancel{{ $order->id }}').on('submit',function(){
				var status = '{{$order->status  }}';
				// alert(status);
				if (status != 'pending'&& status != 'shipping'&& status != 'processing') {
					swal ( 
						{
						title: "",
						text: 'you can\'t cancel this order',
						type: "error",
						timer: 3000
						})
					return false;
				}
			});
			@endforeach
		});
	</script>
@endsection