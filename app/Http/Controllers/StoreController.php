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
    	$pRecommended = Product::recommended()->get();
    	$categories = Category::all();
    	
    	return view('store.index', compact('categories', 'pFeatured', 'pRecommended'));
    }
    
    
    public function category($id)
    {
    	$categories = Category::all();
    	$category = Category::find($id);
    	
    	$products = Product::ofCategory( $id )->get();
    	
    	return view('store.category', compact('categories', 'products', 'category'));
    } 
    
}
