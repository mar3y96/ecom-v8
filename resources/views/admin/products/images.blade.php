@extends('admin.layout.app')
@section('title')
    صور {{ $product->name_en }}
@stop
@section('content')


<!-- Start PAGE HEADER-->

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ url('admin/home') }}" >{{ trans('admin.dashboard')}}</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ url('admin/products') }}">المنتجات</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ url('admin/products/'.$product->id) }}"> {{  $product->name_en }}</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ url('admin/products/'.$product->id.'/images') }}">صور</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>{{ trans('admin.all')}}</span>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->
    @include('layouts.alert')
<div class="portlet box red" style="border:0px;">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-users"></i> صور {{  $product['name_en'] }}
        </div>
    </div>
    <div class="portlet-body" style="display: block;">
       <!-- Button trigger modal -->
       <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modelId">
         إضافة
       </button>
       
       <!-- Modal -->
       {!! Form::open(['url'=>['admin/products/images',$product->id],'files'=>true]) !!}
       <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                       <div class="modal-header">
                               <h5 class="modal-title">إضافة صور</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                   <div class="modal-body">
                       <div class="container-fluid">
                            <div class="form-group">
                                <label class="control-label col-md-2">الصور<span style="color: red">*</span></label>
                                <div class="col-md-9">
                                    {!! Form::file('images[]',['class'=>'form-control input-circle','multiple']) !!}
                                </div>
                            </div>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                       <button type="submit" class="btn btn-primary">إضافة</button>
                   </div>
               </div>
           </div>
       </div>
       
       {!! Form::close() !!}
       
       <script>
           $('#exampleModal').on('show.bs.modal', event => {
               var button = $(event.relatedTarget);
               var modal = $(this);
               // Use above variables to manipulate the DOM
               
           });
       </script>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th> # </th>
                    <th>{{ trans('app.image') }}</th>
                    
                    <th> {{ trans('app.options') }} </th>
                   
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @if ($product && $product->images->count()>0)
                    @foreach($product->images as $image)
                    <tr>
                        <td> {{ $i++}} </td>
                        <td>
                            <a href="{{ $image->image}}">
                                <img class="panel-img-top" src="{{ $image->image}}" alt="Card image" style="width: 250px;height: 200px">
                            </a>
                        </td>
                        <td>
                            {{ Form::open(['route'=>['admin.products.images.destroy',$image->id],'method'=>'delete','style'=>'display:inline'])}}
                            <button class="btn btn-circle red-mint" onclick="return confirm('متاكد من الحذف');"><i class="fa fa-times"></i></button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop
