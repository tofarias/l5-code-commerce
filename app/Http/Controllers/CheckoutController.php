<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Session;
use CodeCommerce\Category;


class CheckoutController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function place(Order $orderModel, OrderItem $orderItem)
    {
    	if( !Session::has('cart') )
    	{	
    		return redirect()->route('cart');
    	}
    	
    	$cart = Session::get('cart');
    	
    	if( $cart->getTotal() > 0 )
    	{
    		$order = $orderModel->create([
    								'user_id' => \Auth::user()->id,
    								'total' => $cart->getTotal(),
    								]);
    		
    		foreach ( $cart->all() as $k => $item)
    		{
    			
    			$order->items()->create( [
				    					'product_id' => $k,
				    					'price' => $item['price'],
				    					'qtd' => $item['qtd'],    					
				    			] );
    			
    			
    		}
    		
    		$cart->clear();
    		
    		return view('store.checkout', compact('order', 'cart'));
    	}
    	
    	$categories = Category::all();
    	
    	return view('store.checkout', ['cart' => 'empty', 'categories' => $categories]);
    }
}
