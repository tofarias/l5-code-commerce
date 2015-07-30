<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
	private $cart;
	
	/**
	 * 
	 * @param Cart $cart
	 */
	public function __construct(Cart $cart)
	{
		$this->cart = $cart;
	}
	
    public function index()
    {
    	if( !Session::has('cart') )
    	{
    		Session::set('cart', $this->cart);
    	}
    	
    	return view('store.cart', ['cart' => Session::get('cart')]);
    }
}
