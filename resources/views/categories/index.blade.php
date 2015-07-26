@extends('app')


@section('content')
<div class="container">
	<h1>Categories</h1>
	
	<a class="btn btn-default" href="{{ route('categories.create') }}">New Category</a>
	<br><br>
	
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
		@foreach( $categories as $category )
		<tr>
			<td>{{ $category->id }}</td>
			<td>{{ $category->name }}</td>
			<td>{{ $category->description }}</td>
			<td>
				<a href="{{ route('categories.edit',['id' => $category->id]) }}">Edit</a> | 
				<a href="{{ route('categories.destroy',['id' => $category->id]) }}">Delete</a>				
			</td>
		</tr>
		@endforeach
		
	</table>
</div>
@endsection