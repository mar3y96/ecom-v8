@extends('admin.layout.app')
@section('title','الطلبات')
@section('content')
<!-- Start PAGE HEADER-->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ '/admin/home' }}">احصائيات</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ url('admin/print-orders') }}">الطلبات</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>{{ $order->id }}</span>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->
    @if (session()->has('done'))
        <div class="alert alert-success">
            {{ session()->get('done') }}
        </div>
    @endif
<div class="tab-pane active" id="tab_6">
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>  البيانات
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
            {!! Form::model($order) !!}
            <div class="form-body form-horizontal form-bordered form-row-stripped">
                <div class="form-group">
                    <label class="control-label col-md-2">اسم العميل<span style="color: red">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" {{ 'disabled'}} value="{{ $order->name }}" style="padding: 2px" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">البريد الإلكتروني<span style="color: red">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" {{ 'disabled'}} value="{{ $order->email }}" style="padding: 2px" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">رقم الهاتف<span style="color: red">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" {{ 'disabled'}} value="{{ $order->phone }}" style="padding: 2px" >
                    </div>
                </div>
                @if ($style_image)
                    <div class="form-group">
                        <label class="control-label col-md-2">style image<span style="color: red">*</span></label>
                        <div class="col-md-9">
                                {!! Html::image($style_image->image,'',['width'=>'100px','height'=>'100px'])!!}
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label class="control-label col-md-2">الكمية <span style="color: red">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" {{ 'disabled'}} value="{{ $order->qty }}" style="padding: 2px" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">اللون <span style="color: red">*</span></label>
                    <div class="col-md-9">
                       <div style="min-height: 50px;width: 100px; background-color:{{ $order->color }} "></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">وصف <span style="color: red">*</span></label>
                    <div class="col-md-9">
                        {!! Form::textarea('description', null, ['disabled'=>'disabled','class'=>'form-control' ,'style'=>"padding: 2px" ]) !!}
                    </div>
                </div>
                @if ($order->design)
                    <div class="form-group">
                        <label class="control-label col-md-2"> التصميم<span style="color: red">*</span></label>
                        <div class="col-md-9">
                                {!! Html::image($order->design,'',['width'=>'100px','height'=>'100px'])!!}
                        </div>
                    </div>
                @endif
            </div>
            {!! Form::close() !!}
            <!-- END FORM-->
        </div>
    </div>
</div>
@stop