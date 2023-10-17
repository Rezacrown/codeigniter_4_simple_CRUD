<?php

namespace App\Controllers\Crud;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public $category;

    public function __construct() {
        $this->category = new CategoryModel;
    }

    public function index()
    {
        $category = $this->category->findAll();
        
        return view('pages/category/index', compact('category'));
    }
}
