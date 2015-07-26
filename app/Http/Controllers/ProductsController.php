<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
private $model;	
    
    public function __construct(Product $model)
    {
    	$this->model = $model;
    }
    public function index()
    {
    	$products = $this->model->all();
    	
    	return view('products.index', compact('products'));
    }
    
    public function create()
    {
    	return view('products.create');
    }
    
    public function store(ProductRequest $request)
    {
    	$product = $this->model->fill( $request->all() );
    	$product->save();
    	
    	return redirect()->route('products');
    }
    
    public function destroy($id)
    {
    	$this->model->find($id)->delete($id);
    	
    	return redirect()->route('products');
    }
    
    public function edit($id)
    {
    	$product = $this->model->find($id);
    	 
    	return view('products.edit', compact('product'));
    }
    
	public function update(ProductRequest $request, $id)
    {
    	#dd( $request->all() );
    	$product = $this->model->find($id)->update($request->all());
    	 
    	return redirect()->route('products');
    }
}
