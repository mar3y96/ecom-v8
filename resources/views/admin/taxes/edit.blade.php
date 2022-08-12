@extends('admin.layout.app')

@section('title')
 	عرض الخصم
@stop

@section('content')
	<!-- BEGIN PAGE HEADER-->
    @include('layouts.alert')

	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="{{ '/admin/home' }}">لوحة التحكم</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="{{ url('admin/tax') }}"> الشحن</a>
			</li>
		</ul>
		
	</div>
	<!-- END PAGE HEADER-->
	<div class="tab-pane active" id="tab_6">
		<div class="portlet box blue ">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>الشحن لمحافظة {{ $tax->city_name_ar }} 
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
				{!! Form::model($tax,['route'=>['admin.tax.update',$tax],'method'=>'put'])!!}
				<div class="form-body form-horizontal form-bordered form-row-stripped">
					<div class="form-group">
						<label class="control-label col-md-2"> قيمة الشحن<span style="color: red">*</span></label>
						<div class="col-md-9">
							{!! Form::number('value',null,['class'=>'form-control input-circle']) !!}
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2">اسم المحافظة بالعربي <span style="color: red">*</span></label>
						<div class="col-md-9">
							{!! Form::text('city_name_ar',null,['class'=>'form-control input-circle']) !!}
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2">اسم المحافظة بالإنجليزية<span style="color: red">*</span></label>
						<div class="col-md-9">
							{!! Form::text('city_name_en',null,['class'=>'form-control input-circle']) !!}
						</div>
					</div>
				</div>
				<div class="form-actions">
					<div class="row">
						<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn btn-circle blue"><i class="fa fa-check"></i> تعديل </button>
						</div>
					</div>
				</div>
				{!! Form::close()!!}
				<!-- END FORM-->
			</div>
		</div>
	</div>
@stop