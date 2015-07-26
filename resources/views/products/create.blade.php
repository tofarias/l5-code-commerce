@extends('app')


@section('content')
<div class="container">
	<h1>Create Product</h1>
	
	@if( $errors->any() )
		<ul class="alert">
		@foreach($errors->all() as $error)
			<li>{!! $error !!}</li>
		@endforeach
		</ul>
	@endif
	{!! Form::open( ['route' => 'products.store'] ) !!}
		
		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		 </div>
		 
		 <div class="form-group">
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		 </div>
		 
		 <div class="form-group">
			{!! Form::label('price', 'Price (USD): ') !!}
			{!! Form::text('price', null, ['class' => '']) !!}
		 </div>
		 
		 <div class="form-group">
			{!! Form::label('featured', 'Featured:') !!}
			{!! Form::checkbox('featured', 1, false, array('class' => '')) !!}
		 </div>
		 
		 <div class="form-group">
			{!! Form::label('recommend', 'Recommend:') !!}
			{!! Form::checkbox('recommend', 1, false, array('class' => '')) !!}
		 </div>
		 
		 <div class="form-group">
		 {!! Form::submit('Add product', ['class' => 'btn btn-primary form-control']) !!}
		 </div>
		
	{!! Form::close() !!}
	
</div>
@endsection