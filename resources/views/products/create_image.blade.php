@extends('app')


@section('content')
<div class="container">
	<h1>Upload Image</h1>
	
	@if( $errors->any() )
		<ul class="alert">
		@foreach($errors->all() as $error)
			<li>{!! $error !!}</li>
		@endforeach
		</ul>
	@endif
	
	{!! Form::open( ['route' => ['products.images.store', $product->id], 'method' => 'post', 'enctype' => 'multipart/form-data'] ) !!}
		
		 <div class="form-group">
			{!! Form::label('image', 'Image:') !!}
			{!! Form::file('image', null, ['class' => 'form-control']) !!}
		 </div>
		 
		 <div class="form-group">
		 {!! Form::submit('Upload Image', ['class' => 'btn btn-primary -form-control']) !!}
		 </div>
		
	{!! Form::close() !!}
	
</div>
@endsection