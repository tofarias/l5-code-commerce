<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Category;

class AdminCategoriesController extends Controller {

    public function index()
    {
        dd('index@AdminCategoriesController');
    }
    
    public function create()
    {
        dd('create@AdminCategoriesController');
    }
    
    public function show($id = null)
    {
        $categories = !is_null($id) ? Category::where('id', $id)->get() : Category::all();
        
        foreach ($categories as $category) {
        	echo $category->name.'<br>';
        }
    }
    
    public function delete($id)
    {
        dd('delete@AdminCategoriesController');
    }
}
