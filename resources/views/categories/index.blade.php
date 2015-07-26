@extends('app')


@section('content')
<div class="container">
	<h1>Categories</h1>
	
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
				<a href="{{ route('categories.destroy',['id' => $category->id]) }}">Delete</a>
			</td>
		</tr>
		@endforeach
		
	</table>
</div>
@endsection