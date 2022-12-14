@if (Session::has('done')) 
	<div class="alert alert-success">
    	{{ Session::get('done')}}
	</div>
@endif

@if (Session::has('error')) 
	<div class="alert alert-danger">
    	{{ Session::get('error')}}
	</div>
@endif

@if(count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>
	    		{{ $error}}
			</li>
			@endforeach
		</ul>
	</div>
@endif