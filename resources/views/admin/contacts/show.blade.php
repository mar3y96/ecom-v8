@extends('admin.layout.app')

@section('title')
	 {{ $message->subject}}
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
				<a href="{{ url('admin/contacts') }}">الرسائل</a>
			</li>
		</ul>
		
	</div>
	<!-- END PAGE HEADER-->
	<div class="tab-pane active" id="tab_6">
		<div class="portlet box blue ">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i> {{ $message->subject}} 
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
				{!! Form::model($message)!!}
                <div class="form-body form-horizontal form-bordered form-row-stripped">
                    <div class="form-group">
                        <label class="control-label col-md-2">اسم المرسل<span style="color: red">*</span></label>
                        <div class="col-md-9">
                            {!! Form::text('name',null,['class'=>'form-control input-circle','disabled']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">البريد الإلكتروني <span style="color: red">*</span></label>
                        <div class="col-md-9">
                            {!! Form::text('email',null,['class'=>'form-control input-circle','disabled']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">موضوع الرساله  <span style="color: red">*</span></label>
                        <div class="col-md-9">
                            {!! Form::text('subject',null,['class'=>'form-control input-circle','disabled']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">محتوي الرساله  <span style="color: red">*</span></label>
                        <div class="col-md-9">
                            {!! Form::textarea('content',null,['class'=>'form-control input-circle','disabled']) !!}
                        </div>
                    </div>
                </div>                
				{!! Form::close()!!}
				<!-- END FORM-->
			</div>
		</div>
	</div>
@stop