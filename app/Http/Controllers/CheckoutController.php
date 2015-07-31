<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    public function place(Order $orderModel, OrderItem $orderItem)
    {
    	if( !Session::has('cart') )
    	{	
    		return false;
    	}
    	
    	$cart = Session::get('cart');
    	
    	if( $cart->getTotal() > 0 )
    	{
    		$order = $orderModel->create([
    								'user_id' => 1,
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
    		dd( $order->items );
    	}
    }
}
