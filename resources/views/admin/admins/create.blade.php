@extends('admin.layout.app')

@section('title')
	{{ trans('app.add') }} {{ trans('admin.siteAdmins') }}
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
				<a href="{{ url('admin/admins') }}">{{ trans('admin.siteAdmins') }}</a>
			</li>
		</ul>
		
	</div>
	<!-- END PAGE HEADER-->
	<div class="tab-pane active" id="tab_6">
		<div class="portlet box blue ">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i> {{ trans('app.add') }} {{ trans('admin.siteAdmins') }}
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
				{!! Form::open(['route'=>['admin.admins.store'] ,'files' => true ,'autocomplete'=>'off'] ) !!}
					@include('admin.admins._form',['btn'=>trans('app.add'),'process'=>'create'])
				{!! Form::close() !!}
				<!-- END FORM-->
			</div>
		</div>
	</div>
@stop