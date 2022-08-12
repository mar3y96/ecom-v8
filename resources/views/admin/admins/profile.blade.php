@extends('admin.layout')

@section('title')
	تعديل بياناتي 
@stop

@section('content')
	<!-- BEGIN PAGE HEADER-->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="{{ url('admin/home') }}">{{ trans('admin.dashboard')}}</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				 <a href="{{ url('admin/admins') }}">{{ trans('app.admins')}}</a>
			</li>
		</ul>
		
	</div>
	<!-- END PAGE HEADER-->
	<div class="tab-pane active" id="tab_6">
		<div class="portlet box blue ">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>  تعديل بياناتي 
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse" data-original-title="" title="">
					</a>
					<a href="javascript:;" class="remove" data-original-title="" title="">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				@include('layouts.alert')
				<!-- BEGIN FORM-->
					{!! Form::model($admins,['url'=>['admin/profile'],'method'=>'put','files'=>true])!!}
						<div class="form-body form-horizontal form-bordered form-row-stripped">
							<div class="form-group">
								<label class="control-label col-md-2">{{ trans('app.name') }}</label>
								<div class="col-md-9">
									{!! Form::text('name',null,['class'=>'form-control input-circle']) !!}
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2"> {{ trans('app.email') }}</label>
								<div class="col-md-9">
									{!! Form::text('email',null,['class'=>'form-control input-circle']) !!}
								</div>
							</div>
						
							<div class="form-group">
								<label class="control-label col-md-2">{{ trans('app.password') }} </label>
								<div class="col-md-9">
									{!! Form::text('newPassword','',['class'=>'form-control input-circle']) !!}
									<span style="color: red;">أتركه فارغا إذا كنت لا تريد تغيره</span>
								</div>
							</div>
							@if(!empty($admins->img))
							<div class="form-group">
								<label class="control-label col-md-2">الصورة الشخصية</label>
								<div class="col-md-3">
									<a href="javascript:;" class="thumbnail">
									<img src="{{ asset('admin/images/admins/'.$admins->img) }}" alt="100%x180" style="height: 180px; width: 100%; display: block;" data-src="holder.js/100%x180">
									</a>
									<br>
								</div>
							</div>
							@endif
							<div class="form-group">
								<label class="control-label col-md-2">تغير الصورة الشخصية</label>
								<div class="col-md-9">
									{!! Form::file('img','',['class'=>'form-control input-circle']) !!}
								</div>
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn btn-circle blue"><i class="fa fa-check"></i> تعديل</button>
									</div>
								</div>
							</div>

						</div>
					{!! Form::close()!!}
				<!-- END FORM-->
			</div>
		</div>
	</div>
@stop