<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;

class CategoriesController extends Controller
{
	private $categoryModel;	
    
    public function __construct(Category $categoryModel)
    {
    	$this->categoryModel = $categoryModel;
    }
    public function index()
    {
    	$categories = $this->categoryModel->all();
    	
    	return view('categories.index', compact('categories'));
    }
    
    public function create()
    {
    	return view('categories.create');
    }
    
    public function store(Request $request)
    {
    	$input = $request->all();
    	
    	$category = $this->categoryModel->fill( $input );
    	$category->save();
    	
    	return redirect('categories');
    }
}
