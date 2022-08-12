@extends('admin.layout.app')
@section('title')
    أكواد الخصومات 
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
            <a href="{{ url('admin/discount-codes') }}"> أكواد الخصومات</a>
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
            إضافة كود
          </button>
          
          <!-- Modal -->
          {!! Form::open(['url'=>'admin/discount-codes','files'=>true]) !!}
          <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">إضافة كود</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">كود الخصم <span style="color: red">*</span></label>
                                        <div class="col-md-9">
                                        {!! Form::text('code',null,['class'=>'form-control input-circle','min'=>'1','required']) !!}
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">قيمة الخصم (نسبة % من قيمة الطلب ) <span style="color: red">*</span></label>
                                        <div class="col-md-9">
                                        {!! Form::number('value',null,['class'=>'form-control input-circle','min'=>'1','required']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">تاريخ نهاية الخصم<span style="color: red">*</span></label>
                                        <div class="col-md-9">
                                            {!! Form::date('end_date',null,['class'=>'form-control input-circle','required']) !!}
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
                    <th> الكود </th>
                    <th> قيم الخصم </th>
                    <th> حالة الكود</th>
                    <th> تاريخ نهاية الخصم</th>
                    <th> خيارات </th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($discounts as $discount)
                <tr>
                    <td> {{ $i++}} </td>
                    <td> {{ $discount->code }}</td>
                    <td>{{ $discount->value }} %</td>
                    <td>
                        @if ($discount->end_date < now() && $discount->status !='used'  )
                            {{ trans('app.expired') }}
                            @else
                            {{ trans('app.'.$discount->status) }}
                        @endif
                    </td>
                    <td>{{ $discount->end_date }}</td>
                    <td>
                        <a href="{{ route('admin.discountCode.edit',['id'=>$discount->id])}}" class="btn btn-circle blue"><i class="fa fa-edit"></i></a>
                        {{--  {{ Form::open(['route'=>['admin.discountCode.destroy',$discount->id],'method'=>'delete','style'=>'display:inline'])}}
                        <button class="btn btn-circle red-mint" onclick="return confirm('متاكد من الحذف');"><i class="fa fa-times"></i></button>
                        {{ Form::close() }}  --}}
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
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>
@endsection