@extends('store.store')

@section('categories')
	@include('store.partial.categories')
@stop

@section('content')

<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">

            	@if( count($product->images) )
            	<img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt=""/>
            	@else
            	<img src="{{ url('images/no-img.jpg') }}" alt=""/>
            	@endif

            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                    	@foreach($product->images as $images)
                    	<a href="#">
                    		<img src="{{ url('uploads/'.$images->id.'.'.$images->extension) }}" alt="" width="80">
                    	</a>
                    	@endforeach
                    </div>

                </div>

            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->

                <h2>{{ $product->category->name }} :: {{ $product->name }}</h2>

                <p>{{ $product->description }}</p>
                                <span>
                                    <span>$ {{ number_format($product->price, 2, ",", ".") }}</span>
                                        <a href="#" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>Add to Cart
                                        </a>
                                </span>
            </div>
            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->
</div>

@stop