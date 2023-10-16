<?php

namespace App\Controllers\Crud;

use App\Controllers\BaseController;
use App\Models\PostModel;

class PostController extends BaseController
{
    protected $post;

    public function __construct()
    {
        $this->post = new PostModel;
    }

    public function index()
    {
        $posts = $this->post->findAll();

        return view('pages/post', compact('posts'));
    }
}
