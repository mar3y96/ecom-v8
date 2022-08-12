@extends('admin.layout.app')

@section('title')
	العضو {{ $user->f_name}}
@stop

@section('content')
	<!-- BEGIN PAGE HEADER-->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="{{ url('admin/home') }}">لوحة التحكم</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="{{ url('admin/users') }}">الاعضاء</a>
			</li>
		</ul>
		
	</div>
	<!-- END PAGE HEADER-->
	<div class="tab-pane active" id="tab_6">
		<div class="portlet box blue ">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i> العضو {{ $user->f_name}} 
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
				{!! Form::model($user)!!}
					@include('admin.users._form',['process'=>'show'])
				{!! Form::close()!!}
				<!-- END FORM-->
			</div>
		</div>
	</div>
@stop