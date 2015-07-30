@foreach( $products as $product )            
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">


                    @if( count($product->images) )
                    <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" width="100" height="100" alt="" />
                    @else
                    <img src="{{ url('images/no-img.jpg') }}" width="50" height="120" alt="" />
                    @endif

                    
                    <h2>$ {!! $product->price !!}</h2>
                    <p>{{ $product->name }}</p>
                    <a href="{{ route('store.product', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                    <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>$ {!! $product->price !!}</h2>
                         <p>{{ $product->name }}</p>
                        <a href="{{ route('store.product', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                        <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach