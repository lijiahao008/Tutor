@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{ Session::get('success')}}
	</div>
@endif

@if (Session::has('failed'))
	<div class="alert alert-danger" role="alert">
		<strong>Failed:</strong> {{ Session::get('failed')}}
	</div>
@endif

@if (count($errors)>0)
	<div class = "alert alert-danger" role= "alert">
		<strong>Error:</strong>
		@foreach ($errors -> all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</div>
@endif