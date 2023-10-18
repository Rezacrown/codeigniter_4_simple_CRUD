<?php

namespace App\Controllers\Crud;

use App\Controllers\BaseController;
use App\Models\AuthorModel;

class AuthorController extends BaseController
{
    public $author;

    public function __construct()
    {
        $this->author = new AuthorModel;
    }

    public function index()
    {

        $author = $this->author->findAll();

        return view('pages/author/index', compact('author'));
    }
}
