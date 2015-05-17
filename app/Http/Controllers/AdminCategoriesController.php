<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminCategoriesController extends Controller {

    public function index()
    {
        dd('index@AdminCategoriesController');
    }
    
    public function create()
    {
        dd('create@AdminCategoriesController');
    }
    
    public function show($id)
    {
        dd('show@AdminCategoriesController');
    }
    
    public function delete($id)
    {
        dd('delete@AdminCategoriesController');
    }
}
