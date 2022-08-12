@extends('admin.layout.app')

@section('title')
	تعديل منتج {{ $product->name_en}}
@stop

@section('content')
	<!-- BEGIN PAGE HEADER-->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="{{ '/admin/home' }}">احصائيات</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="{{ url('admin/products') }}">المنتجات</a>
			</li>
		</ul>
	</div>
	<!-- END PAGE HEADER-->
	<div class="tab-pane active" id="tab_6">
		@include('layouts.alert')
		<div class="portlet box blue ">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>  تعديل منتج {{ $product->name_en}}
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse" data-original-title="" title="">
					</a>
					<a href="javascript:;" class="remove" data-original-title="" title="">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
					{!! Form::model($product,['route'=>['admin.products.update',$product],'method'=>'put','files'=>true])!!}
					@include('admin.products._form',['btn'=> 'تعديل' ,'process'=>'edit'])
					{!! Form::close()!!}
				<!-- END FORM-->
			</div>
		</div>
	</div>
@stop
@section('script')
	<script>
		$(function() {
			$("#chkS").click(function () {
				if ($(this).is(":checked")) {
					$("#dvS").show();
					$('input[name=S_available_count]').prop('required', true);
				} else {
					$('input[name=S_available_count]').val('0');
					$('input[name=S_available_count]').removeAttr('required');
					$("#dvS").hide();
				}
			});
			$("#chkM").click(function () {
				if ($(this).is(":checked")) {
					$("#dvM").show();
					$('input[name=M_available_count]').prop('required', true);
				} else {
					$('input[name=M_available_count]').val('0');
					$('input[name=M_available_count]').removeAttr('required');
					$("#dvM").hide();
				}
			});
			$("#chkL").click(function () {
				if ($(this).is(":checked")) {
					$("#dvL").show();
					$('input[name=L_available_count]').prop('required', true);
				} else {
					$('input[name=L_available_count]').val('0');
					$('input[name=L_available_count]').removeAttr('required');
					$("#dvL").hide();
				}
			});
			$("#chkX").click(function () {
				if ($(this).is(":checked")) {
					$('input[name=X_available_count]').prop('required', true);
					$("#dvX").show();
				} else {
					$('input[name=X_available_count]').val('0');
					$('input[name=X_available_count]').removeAttr('required');
					$("#dvX").hide();
				}
			});
			$("#chkXX").click(function () {
				if ($(this).is(":checked")) {
					$("#dvXX").show();
					$('input[name=XX_available_count]').prop('required', true);
				} else {
					$('input[name=XX_available_count]').val('0');
					$('input[name=XX_available_count]').removeAttr('required');
					$("#dvXX").hide();
				}
			});
			$("#chk3X").click(function () {
				if ($(this).is(":checked")) {
					$("#dv3X").show();
					$('input[name=3X_available_count]').prop('required', true);
				} else {
					$('input[name=3X_available_count]').val('0');
					$('input[name=3X_available_count]').removeAttr('required');
					$("#dv3X").hide();
				}
			});
		});
	</script>
@endsection