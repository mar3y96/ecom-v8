	<div class="form-body form-horizontal form-bordered form-row-stripped">
		
		<div class="form-group">
			<label class="control-label col-md-2">اسم المنتج ar<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::text('name_ar',null,['class'=>'form-control input-circle',$process =='show'?'disabled':'','required']) !!}
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2">اسم المنتج en<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::text('name_en',null,['class'=>'form-control input-circle',$process =='show'?'disabled':'','required']) !!}
			</div>
		</div>
		@if ($process !='show')
			<div class="form-group">
				<label class="control-label col-md-2">صورة المنتج الرئيسية<span style="color: red">*</span></label>
				<div class="col-md-9">
					{!! Form::file('main_image',null,['class'=>'form-control input-circle']) !!}
				</div>
			</div>
		@endif
		@if($process == 'edit' || $process =='show')
			<div class="row">
		        <div class="col-md-8">
		        	<br>
		              <img src="{{ $product->main_image}}" width="200" />
		        	<br>
		        </div>
	   		</div>
		@endif

		<div class="form-group">
			<label class="control-label col-md-2">وصف قصير  ar<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::text('short_description_ar',null,['class'=>'form-control input-circle',$process =='show'?'disabled':'','required']) !!}
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2">وصف قصير  en<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::text('short_description_en',null,['class'=>'form-control input-circle',$process =='show'?'disabled':'','required']) !!}
			</div>
		</div>


		<div class="form-group">
			<label class="control-label col-md-2">السعر<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::number('price',null,['class'=>'form-control input-circle',$process =='show'?'disabled':'','required']) !!}
			</div>
		</div>


		<div class="form-group">
			<label class="control-label col-md-2">وصف للمنتج ar<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::textarea('description_ar',null,['class'=>'form-control input-circle',$process =='show'?'disabled':'','required']) !!}
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2">وصف للمنتج en<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::textarea('description_en',null,['class'=>'form-control input-circle',$process =='show'?'disabled':'','required']) !!}
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2">النوع<span style="color: red">*</span></label>
			<div class="col-md-9">
				<select class="form-control" name="category_id" {{ $process=='show'?'disabled':'' }} style="padding: 2px" required>
						<option value="1"
						@if ($process!='create' && $product->category_id=='1')
							selected
						@endif
						>رجالي </option>
						<option value="2" @if ($process!='create' && $product->category_id=='2')
								selected
							@endif>حريمي  </option>
						<option value="3" @if ($process!='create' && $product->category_id=='3')
								selected
							@endif>اطفال </option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2">الأحجام المتاحه <span style="color: red">*</span></label>
			<div class="col-md-9">
				{{-- <select class="form-control" name="size[]" multiple {{ $process=='show'?'disabled':'' }} id="sizeSelect"> --}}
						{{-- <option value="S" @if(in_array('S', $product->size) ) {{'selected'}} @endif>s</option> --}}
						{{-- <option value="M" @if(in_array('M', $product->size) ) {{'selected'}} @endif>m</option> --}}
						{{-- <option value="L" @if(in_array('L', $product->size) ) {{'selected'}} @endif>l</option> --}}
						{{-- <option value="X" @if(in_array('X', $product->size) ) {{  }}'selected'}} @endif>x</option> --}}
						{{-- <option value="XX" @if(in_array('XX', $product->size) ) {{'selected'}} @endif>xx</option> --}}
						{{-- <option value="3X" @if(in_array('3X', $product->size) ) {{'selected'}} @endif>3x</option> --}}
					
					
					<label for="" class="control-label " style="margin: 0 30px">
						S
						<input type="checkbox" name="size[]" value="S" id="chkS" @if($process != 'create' && in_array('S', $product->size) ) {{'checked'}} @endif {{ $process=='show'?'disabled':'' }} >
					</label>
					
					<label for=""  style="margin: 0 30px">
						M
						<input type="checkbox" name="size[]" value="M" id="chkM" @if($process != 'create' && in_array('M', $product->size) ) {{'checked'}} @endif {{ $process=='show'?'disabled':'' }} >
					</label>
					<label for="" style="margin: 0 30px">
						L
						<input type="checkbox" name="size[]" value="L" id="chkL" @if($process != 'create' && in_array('L', $product->size) ) {{'checked'}} @endif {{ $process=='show'?'disabled':'' }}>
					</label>
					<label for="" style="margin: 0 30px">
						X
						<input type="checkbox" name="size[]" value="X" id="chkX" @if($process != 'create' && in_array('X', $product->size) ) {{'checked'}} @endif {{ $process=='show'?'disabled':'' }}>
					</label>
					<label for="" style="margin: 0 30px">
						XX
						<input type="checkbox" name="size[]" value="XX" id="chkXX" @if($process != 'create' && in_array('XX', $product->size) ) {{'checked'}} @endif {{ $process=='show'?'disabled':'' }}>
					</label>
					<label for="" style="margin: 0 30px">
						3X
						<input type="checkbox" name="size[]" value="3X" id="chk3X" @if($process != 'create' && in_array('3X', $product->size) ) {{'checked'}} @endif {{ $process=='show'?'disabled':'' }}>
					</label>
					
				{{-- </select> --}}
			</div>
		</div>
		<div class="form-group sizes" @if($process == 'create' || !in_array('S', $product->size) )  style='display:none'  @endif id='dvS'>
			<label class="control-label col-md-2"> العدد المتاح من S<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::number('S_available_count',null,['class'=>'form-control input-circle ','min'=>0,$process =='show'?'disabled':'']) !!}
			</div>
		</div>
		<div class="form-group sizes" @if($process == 'create' || !in_array('M', $product->size) )  style='display:none'  @endif id='dvM'>
			<label class="control-label col-md-2">  العدد المتاح من M<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::number('M_available_count',null,['class'=>'form-control input-circle ','min'=>0,$process =='show'?'disabled':'']) !!}
			</div>
		</div>
		<div class="form-group sizes" @if($process == 'create' || !in_array('L', $product->size) )  style='display:none'  @endif id='dvL'>
			<label class="control-label col-md-2">العدد المتاح من L<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::number('L_available_count',null,['class'=>'form-control input-circle ','min'=>0,$process =='show'?'disabled':'']) !!}
			</div>
		</div>
		<div class="form-group sizes" @if($process == 'create' || !in_array('X', $product->size) )  style='display:none'  @endif id='dvX'>
			<label class="control-label col-md-2">العدد المتاح من X<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::number('X_available_count',null,['class'=>'form-control input-circle ','min'=>0,$process =='show'?'disabled':'']) !!}
			</div>
		</div>
		<div class="form-group sizes" @if($process == 'create' || !in_array('XX', $product->size) )  style='display:none'  @endif id='dvXX' >
			<label class="control-label col-md-2">العدد المتاح من XX<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::number('XX_available_count',null,['class'=>'form-control input-circle ','min'=>0,$process =='show'?'disabled':'']) !!}
			</div>
		</div>
		<div class="form-group sizes" @if($process == 'create' || !in_array('3X', $product->size) )  style='display:none'  @endif id='dv3X'>
			<label class="control-label col-md-2">العدد المتاح من 3X<span style="color: red">*</span></label>
			<div class="col-md-9">
				{!! Form::number('3X_available_count',null,['class'=>'form-control input-circle  ','min'=>0,$process =='show'?'disabled':'']) !!}
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
	