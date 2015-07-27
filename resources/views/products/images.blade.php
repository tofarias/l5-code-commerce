@extends('app')


@section('content')
<div class="container">
	<h1>Images of {!! $product->name !!}</h1>
	
	<a class="btn btn-default" href="{{ route('products.images.create', ['id' => $product->id]) }}">New Image</a>
	<br><br>
	
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Image</th>
			<th>Extension</th>
			<th>Action</th>
		</tr>
		@foreach( $product->images as $image )
		<tr>
			<td>{{ $image->id }}</td>
			<td><img src="{!! url('uploads/'.$image->id.'.'.$image->extension) !!}" width="100" height="100"></td>
			<td>{{ $image->extension }}</td>
			<td>				
			</td>
		</tr>
		@endforeach
		
	</table>
	
	<a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
	
</div>
@endsection