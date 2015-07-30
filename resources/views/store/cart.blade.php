@extends('store.store')



@section('content')

	<section id="cart_items">
		<div class="container">
		
			<div class="table-responsive cart_info">
		
				<table class="table table-condensed">
				
					<thead>
						<tr class="cart_menu">
							<td class="image">item</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="price">Qtd</td>
							<td class="price">Total</td>
							<td class="price">Delete</td>
						</tr>
					</thead>
					<tbody>
					@foreach($cart->all() as $k => $item)
						
						<tr>
							<td class="cart_product">
								<a href="{{ route('store.product', ['id' => $k]) }}">
									Imagem
								</a>
							</td>
							
							<td class="cart_description">
								<h4><a href="{{ route('store.product', ['id' => $k]) }}">{{ $item['name'] }}</a></h4>
								<p>Code: {{ $k }}</p>
							</td>
							
							<td class="cart_price">
								$ {{ $item['price'] }}
							</td>
							
							<td class="cart_quantity">
								{{ $item['qtd'] }}
							</td>
							
							<td class="cart_total">
								<p class="cart_total_price">$ {{ $item['price'] * $item['qtd'] }}</p>
							</td>
							
							<td class="cart_delete">
								<a href="#" class="cart_quantity_delete">Delete</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				
				</table>
			</div>
		
		</div>
	</section>

@stop