<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Category;
use CodeCommerce\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use CodeCommerce\Http\Requests\ProductImageRequest;

class ProductsController extends Controller
{
	private $model;	
    
    public function __construct(Product $model)
    {
    	$this->model = $model;
    }
    public function index()
    {
    	$products = $this->model->paginate(10);
    	
    	return view('products.index', compact('products'));
    }
    
    public function create( Category $category)
    {
    	$categories = $category->lists('name', 'id');
    	
    	return view('products.create', compact('categories'));
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
    
    public function edit($id, Category $category)
    {
    	$categories = $category->lists('name', 'id');
    	
    	$product = $this->model->find($id);
    	 
    	return view('products.edit', compact('product', 'categories'));
    }
    
	public function update(ProductRequest $request, $id)
    {
    	$product = $this->model->find($id)->update($request->all());
    	 
    	return redirect()->route('products');
    }
    
    public function images($id)
    {
    	$product = $this->model->find($id);
    	
    	return view('products.images', compact('product'));
    }
    
    public function createImage($id)
    {
    	$product = $this->model->find($id);
    	 
    	return view('products.create_image', compact('product'));
    }
    
    public function storeImage(ProductImageRequest $request, $id, ProductImage $productImage)
    {
    	$file = $request->file('image');
    	$extension = $file->getClientOriginalExtension();
    	
    	$image = $productImage::create(['product_id' => $id, 'extension' => $extension]);
    	
		Storage::disk('public_local')->put($image->id .'.'. $extension, File::get($file));

		return redirect()->route('products.images', ['id' => $id]);
    }
    
    public function destroyImage(ProductImage $productImage, $id)
    {
    	$image = $productImage->find($id);
    	
    	
    	if( file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension) )
    	{
    		Storage::disk('public_local')->delete($image->id .'.'. $image->extension);
    		$image->delete();
    	}
    	
    	$product = $image->product;
    	return redirect()->route('products.images', ['id' => $product->id]);
    }
}
