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
				<a href="{{ url('admin/discount-codes') }}"> أكواد الخصومات</a>
			</li>
		</ul>
		
	</div>
	<!-- END PAGE HEADER-->
	<div class="tab-pane active" id="tab_6">
		<div class="portlet box blue ">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i> عرض كود الخصم 
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
				{!! Form::model($code,['route'=>['admin.discountCode.update',$code],'method'=>'put'])!!}
				<div class="form-body form-horizontal form-bordered form-row-stripped">
					<div class="form-group">
						<label class="control-label col-md-2">كود الخصم<span style="color: red">*</span></label>
						<div class="col-md-9">
							{!! Form::text('code',null,['class'=>'form-control input-circle']) !!}
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2">قيمة الخصم (نسبة % من قيمة الطلب ) <span style="color: red">*</span></label>
						<div class="col-md-9">
							{!! Form::text('value',null,['class'=>'form-control input-circle']) !!}
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2">تاريخ نهاية الخصم<span style="color: red">*</span></label>
						<div class="col-md-9">
							{!! Form::date('end_date',null,['class'=>'form-control input-circle']) !!}
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