@extends('store.store')


@section('content')

<div class="container">
	
	<h3>Meus Pedidos</h3>
	
	<table class="table">
	
	<tbody>
		<tr>
			<th>#ID</th>
			<th>Itens</th>
			<th>Valor</th>
			<th>Status</th>
		</tr>
	</tbody>
	
	@foreach( $orders as $k => $order )
	<tr>
		<td>{{ $order->id }}</td>
		<td>
			<ul>
				@foreach( $order->items as $item )
				<li>{{ $item->product->name }}</li>
				@endforeach
			</ul>
		</td>
		<td>{{ $order->total }}</td>
		<td>{{ $order->status }}</td>
	</tr>
	@endforeach
	
	</table>
		

</div>

@stop