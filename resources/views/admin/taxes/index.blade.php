@extends('admin.layout.app')
@section('title')
    الشحن
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
            <a href="{{ url('admin/discount-codes') }}">الشحن</a>
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
        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modelId">
                إضافة محافظة
          </button>
          
          <!-- Modal -->
          {!! Form::open(['url'=>'admin/tax']) !!}
          <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">إضافة محافظة </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">سعر الشحن <span style="color: red">*</span></label>
                                        <div class="col-md-9">
                                        {!! Form::number('value',null,['class'=>'form-control input-circle','min'=>'1','required']) !!}
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">اسم المحافظة بالعربي <span style="color: red">*</span></label>
                                        <div class="col-md-9">
                                        {!! Form::text('city_name_ar',null,['class'=>'form-control input-circle','min'=>'1','required']) !!}
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">اسم المحافظة بالانجليزي <span style="color: red">*</span></label>
                                        <div class="col-md-9">
                                        {!! Form::text('city_name_en',null,['class'=>'form-control input-circle','min'=>'1','required']) !!}
                                        </div>
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

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th> # </th>
                    <th> سعر الشحن </th>
                    <th> اسم المحافظة بالعربي </th>
                    <th> اسم المحافظة بالانجليزي</th>
                    <th> خيارات </th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($taxes as $tax)
                <tr>
                    <td> {{ $i++}} </td>
                    <td>{{ $tax->value }}</td>
                    <td> {{ $tax->city_name_ar }}</td>
                    <td>{{ $tax->city_name_en }} </td>
                    <td><a href="{{ route('admin.tax.edit',['id'=>$tax->id])}}" class="btn btn-circle blue"><i class="fa fa-edit"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
@section('script')
<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>
@endsection