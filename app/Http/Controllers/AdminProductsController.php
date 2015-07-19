<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Product;

class AdminProductsController extends Controller {

    public function index()
    {
        dd('index@AdminProductsController');
    }
        
    public function create()
    {
        dd('create@AdminProductsController');
    }
    
    public function show($id = null)
    {
    	$products = !is_null($id) ? Product::where('id', $id)->get() : Product::all();
        
        foreach ($products as $product) {
        	echo $product->name.': $'.$product->price.'<br>';
        }
    }
    
    public function delete($id)
    {
        dd('delete@AdminProductsController');
    }

}
