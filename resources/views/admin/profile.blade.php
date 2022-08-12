@extends('admin.layout.app')
@section('title')
الصفحة الشخصية
@stop
@section('style')
<style type="text/css">
    .form .form-bordered .form-group .control-label{
    text-align: right;
    }
</style>
@stop
@section('content')
<div class="tab-pane active" id="tab_6">
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>تعديل بياناتى
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title="">
                </a>
                <a href="javascript:;" class="remove" data-original-title="" title="">
                </a>
            </div>
        </div>
        <div class="portlet-body form">
            <br>
            @include('layouts.alert')
            <!-- BEGIN FORM-->
            {!! Form::model($user, ['route'=>['admin.profile.update'], 'method' => 'put','files' => true, 'autocomplete'=>'off' ] ) !!}
            <div class="form-body form-horizontal form-bordered form-row-stripped">
                <div class="form-group">
                    <label class="control-label col-md-2">{{ trans('app.name') }} <span style="color: red">*</span></label>
                    <div class="col-md-4">
                        {!! Form::text('name',null,['class'=>'form-control input-circle']) !!}
                    </div>
                    <label class="control-label col-md-2">{{ trans('app.email') }}<span style="color: red">*</span></label>
                    <div class="col-md-4">
                        {!! Form::email('email',null,['class'=>'form-control input-circle lesson_from','min'=>'1']) !!}
                    </div>
                </div>
                <div class="form-group">
                   
                    <label class="control-label col-md-2">{{ trans('app.password') }}<span style="color: red">*</span></label>
                    <div class="col-md-9">
                        <input type="password" name="password" class="form-control input-circle">
                         {!! "<span style='color: red' >اتركه فارغا اذا كنت لا تريد تغيره</span>" !!}
                    </div>

                </div>

               
	            <div class="form-actions">
	                <div class="row">
	                    <div class="col-md-offset-3 col-md-9">
	                        <button type="submit" class="btn green"><i class="fa fa-check"></i> تعديل</button>
	                    </div>
	                </div>
	            </div>
            </div>
            {!! Form::close() !!}
            <!-- END FORM-->
        </div>
    </div>
</div>
@stop