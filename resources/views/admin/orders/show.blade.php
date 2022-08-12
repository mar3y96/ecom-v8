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
            <a href="{{ url('admin/orders') }}">الطلبات</a>
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
                    <label class="control-label col-md-2">اسم المشتري<span style="color: red">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" {{ 'disabled'}} value="{{ $order->f_name }} {{ $order->s_name }}" style="padding: 2px" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">العنوان<span style="color: red">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" {{ 'disabled'}} value="{{ $order->address }}" style="padding: 2px" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">رقم الهاتف<span style="color: red">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" {{ 'disabled'}} value="{{ $order->phone }}" style="padding: 2px" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">{{ trans('app.email') }}<span style="color: red">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" {{ 'disabled'}} value="{{ $order->email }}" style="padding: 2px" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">المدينة<span style="color: red">*</span></label>
                    <div class="col-md-9">
                        <select class="form-control" {{ 'disabled'}} >
                            @include('layouts.cities')
                        </select>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- END FORM-->
        </div>
    </div>
</div>
<div class="portlet box red" style="border:0px;">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-users"></i> التفاصيل
        </div>
    </div>
    <div class="portlet-body" style="display: block;">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th> # </th>
                    <th> المنتج </th>
                    <th> الكميه </th>
                    <th> الحجم </th>
                    <th> سعر القطعه </th>
                    <th> السعر الكلي </th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($order->orderItems as $item)
                <tr>
                    <td> {{ $i++}} </td>
                    <td> <a href="{{ route('admin.products.show',$item->id) }}">{{ $item->name_en }}</a> </td>
                    <td> {{ $item->pivot->qty }} </td>
                    <td> {{ $item->pivot->size }}</td>
                    <td> {{ $item->price}} جنيه</td>
                    <td> {{ $item->price*$item->pivot->qty }} جنيه</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop