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
            @if (Request::is('admin/orders'))
                
            <span>الكل</span>
            @else
            <span>{{ trans('app.'.$status) }}</span>
            @endif
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->
@include('layouts.alert')
<div class="portlet box red" style="border:0px;">
                            <div class="pull-right" style="padding: 10px">
                                <a href="{{ url('admin/all-orders/print') }}" style="color :ivory">
                                    طباعة الطلبات 
                                </a>
                            </div>
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
                    <th> الطلبات </th>
                    <th> الكميه </th>
                    <th> السعر </th>
                    <th> الخصم </th>
                    <th> الشحن </th>
                    <th> الإجمالي  </th>
                    <th>  الحالة </th>
                    <th>  تفاصيل </th>
                    <th> خيارات </th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($orders as $order)
                <tr>
                    <td> {{ $i++}} </td>
                    <td> <a href="{{ route('admin.order.show',$order->id) }}">{{ $order->f_name }}</a> </td>
                    <td> {{ $order->count }} </td>
                    <td> {{ $order->subtotal }} </td>
                    <td> {{ $order->discount?$order->discount:'0' }} </td>
                    <td> {{ $order->shipping }} </td>
                    <td> {{ $order->total}} جنيه</td>
                    <td>
                        {{ Form::open(['route'=>['admin.order.update',$order->id],'method'=>'put','style'=>'display:inline','id'=>'form'.$order])}}
                    <select name="status" @if ($order->status=='delivered' || $order->status=='canceled' || $order->status=='canceled-user' || $order->status=='undelivered')
                        disabled
                            @endif  >
                                <option value="pending" {{ $order->status=='pending'?'selected':'' }}>معلق</option>
                                <option value="processing" {{ $order->status=='processing'?'selected':'' }} >جاهز للشحن</option>
                                <option value="shipping" {{ $order->status=='shipping'?'selected':'' }}>مشحون</option>
                                <option value="delivered" {{ $order->status=='delivered'?'selected':'' }}>تم التوصيل</option>
                                <option value="canceled" {{ $order->status=='canceled'?'selected':'' }}>تم إلغائه</option>
                                @if ($order->status=='canceled-user')
                                <option value="canceled-user" selected> تم إسترجاع الطلب</option>
                                @endif
                                <option value="undelivered" {{ $order->status=='undelivered'?'selected':'' }}> عدم نجاح التوصيل</option>
                            </select>
                            <button class="btn btn-circle blue"   @if ( $order->status=='delivered' || $order->status=='canceled' || $order->status=='canceled-user' || $order->status=='undelivered')
                                disabled="disabled"        
                                    @endif ><i class="fa fa-edit"></i></button>
                        {{ Form::close() }}
                    </td>
                    <td>
                        @if ($order->discount)
                           خصم قدره  {{ ($order->discount/$order->subtotal)*100 }}% من قيمة الطلب بكود {{ $order->discountCode->code }}
                        @endif
                    </td>
                    <td> <a class="btn btn-circle green" href="{{ url('/admin/orders/'.$order->id.'/print') }}"><i class="fa fa-print"></i></a></td>
                    {{-- <td>
                        {{ Form::open(['route'=>['admin.order.destroy',$order->id],'method'=>'delete','style'=>'display:inline'])}}
                        <button class="btn btn-circle red-mint" onclick="return confirm('متاكد من الحذف');"><i class="fa fa-times"></i></button>
                        {{ Form::close() }}
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop