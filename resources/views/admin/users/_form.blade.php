	<div class="form-body form-horizontal form-bordered form-row-stripped">
		<div class="form-group">
			<label class="control-label col-md-2"> الاسم الأول<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::text('f_name',null,['class'=>'form-control input-circle',$process =='show'?'disabled':'']) !!}
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2"> الاسم الثاني<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::text('l_name',null,['class'=>'form-control input-circle',$process =='show'?'disabled':'']) !!}
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2">البريد الالكتروني<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::text('email',null,['class'=>'form-control input-circle',$process =='show'?'disabled':'']) !!}
			</div>
		</div>

		@if(isset($btn))
		<div class="form-actions">
			<div class="row">
				<div class="col-md-offset-3 col-md-9">
					<button type="submit" class="btn btn-circle blue"><i class="fa fa-check"></i> {{ $btn }} </button>
				</div>
			</div>
		</div>
		@endif
	</div>
	