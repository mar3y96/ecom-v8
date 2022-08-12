@extends('admin.layout.app')
@section('title','الرسائل المرسله')
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
            <a href="{{ url('admin/contacts') }}">الرسائل المرسله </a>
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
                    <th> الموضوع </th>
                    <th> المرسل </th>
                    <th> التاريخ </th>
                    <th> خيارات </th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($messages as $message)
                <tr>
                    <td> {{ $i++}} </td>
                    <td><a href="{{ url('/admin/contacts', [$message->id]) }}">{{ $message->subject }}</a> </td>
                    <td> {{ $message->name}} </td>
                    <td> {{ \Carbon\Carbon::parse($message->created_at)->format('Y d M  ')}} </td>
                    <td>
                        {{ Form::open(['route'=>['admin.contact.destroy',$message->id],'method'=>'delete','style'=>'display:inline'])}}
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