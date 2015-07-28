<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;

class StoreController extends Controller
{
    public function index()
    {
    	$pFeatured = Product::featured()->get();
    	$categories = Category::all();
    	
    	return view('store.index', compact('categories', 'pFeatured'));
    }
}
