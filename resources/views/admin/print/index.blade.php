@extends('admin.layout.app')
@section('title',' طلبات الطباعة')
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
            <a href="{{ url('admin/print-orders') }}">طلبات الطباعة</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>   
            <span>الكل</span>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->
    @include('layouts.alert')
<div class="portlet box red" style="border:0px;">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-users"></i> الكل
        </div>
    </div>
    <div class="portlet-body" style="display: block;">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th> # </th>
                    <th>اسم العميل </th>
                    <th> الكميه </th>
                    <th> خيارات </th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($orders as $order)
                <tr>
                    <td> {{ $i++}} </td>
                    <td> <a href="{{ route('admin.print.show',$order->id) }}">{{ $order->name }}</a> </td>
                    <td> {{ $order->qty }} </td>
                    <td>
                        {{ Form::open(['route'=>['admin.print.destroy',$order->id],'method'=>'delete','style'=>'display:inline'])}}
                        <button class="btn btn-circle red-mint" onclick="return confirm('متاكد من الحذف');"><i class="fa fa-times"></i></button>
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop