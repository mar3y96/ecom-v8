@extends('admin.layout.app')
@section('title')
    المنتجات
@stop
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
            <a href="{{ url('admin/products') }}">المنتجات</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>الكل</span>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->
@include('layouts.alert')
    @if (session()->has('done'))
        <div class="alert alert-success">
            {{ session()->get('done') }}
        </div>
    @endif
<div class="portlet box red" style="border:0px;">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-users"></i> الكل
        </div>
    </div>
    <div class="portlet-body" style="display: block;">
        <a href="{{ url('admin/products/create') }}" class="btn btn-info">اضافة</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th> # </th>
                    <th> المنتجات </th>
                    <th> العدد المتاح </th>
                    <th> صور </th>
                    <th> خيارات </th>
                    <th> best offer </th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($products as $product)
                <tr>
                    <td> {{ $i++}} </td>
                    <td> <a href="{{ route('admin.products.show',$product->id) }}">{{ $product->name_ar }}</a> </td>
                    <td>{{ $product->available_count }}</td>
                    <td>
                        <a href="{{ route('admin.products.images',$product->id) }}" class="btn btn-circle green">
                            <i class="fa fa-image"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.products.edit',[$product->id])}}" class="btn btn-circle blue"><i class="fa fa-edit"></i></a>
                        {{ Form::open(['route'=>['admin.products.destroy',$product->id],'method'=>'delete','style'=>'display:inline'])}}
                        <button class="btn btn-circle red-mint" {{ $product->orders->count()>0?'disabled':' ' }} onclick="return confirm('متاكد من الحذف');"><i class="fa fa-times"></i></button>
                        {{ Form::close() }}
                    </td>
                    <td>
                        <input type="radio" {{ $product->best_offer ?'checked':'' }} name="best_offer" id="bestOffer{{ $product->id }}" value="{{ $product->id }}" class="form-control" style="width: 50px;height: 2em;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
@section('script')
<script>
    $(document).ready(function(){
        @foreach($products as $pro)
        $('#bestOffer{{ $pro->id }}').change(function(){
            let ul = '{{ url('/admin/products/best-offer') }}'
            let pro = '{{ $pro->id }}';
            $.get(`${ul}/${pro}`, function(data){
                console.log(pro);
            });
        })
        @endforeach()
    });
</script>
@endsection