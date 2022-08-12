@extends('admin.layout.app')

@section('title')
	مديرين الموقع
@stop

@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ url('admin/home') }}">{{ trans('admin.dashboard')}}</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ url('admin/admins') }}">{{ trans('app.admins')}}</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>{{ trans('admin.all')}}</span>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->
    @if (session()->has('done'))
        <div class="alert alert-success">
            {{ session()->get('done') }}
        </div>
    @endif
<div class="portlet box red" style="border:0px;">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-users"></i>{{ trans('admin.all') }}
        </div>
    </div>
    <div class="portlet-body" style="display: block;">
        <a href="{{ url('admin/admins/create') }}" class="btn btn-info">{{ trans('app.add') }}</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th> # </th>
                    <th> {{ trans('app.admins') }} </th>
                    <th> {{ trans('app.options') }} </th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($admins as $admin )
				<tr>
					<td>{!! $i++ !!}</td>
					<td>
						<a href="{{ url('admin/admins/'.$admin->id) }}" class="">{{ $admin->name }}</a>
					</td>
					<td>
                        @if(auth()->guard('admin')->user()->pre == '1')
						{!! Form::open(['route' => ['admin.admins.destroy', $admin->id], 'method' => 'delete']) !!}
						<a href="{!!Url('/')!!}/admin/admins/{!! $admin->id !!}/edit" class="btn btn-icon-only red">
							<i class="fa fa-edit"></i>
						</a>
    						@if(auth()->guard('admin')->user()->id != $admin->id )
    						<button class="btn btn-icon-only purple" onClick="return confirm('متأكد من حذف : {!! $admin->name !!} ؟')">
    								<i class="fa fa-times"></i>
    						</button>
                            @endif
						@endif
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
						
            </tbody>
        </table>
    </div>
</div>	


@stop