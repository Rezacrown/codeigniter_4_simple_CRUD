<?php

namespace App\Controllers\Crud;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\CategoryModel;
use App\Models\AuthorModel;

class PostController extends BaseController
{
    protected $post;
    protected $category;
    protected $author;

    public function __construct()
    {
        $this->post = new PostModel;
        $this->category = new CategoryModel;
        $this->author = new AuthorModel;
    }

    public function index()
    {
        $title = 'Posts';
        $posts = $this->post->findAll();

        return view('pages/post', compact('posts', 'title'));
    }

    public function new()
    {
        $title = 'Create Post';

        $category = $this->category->findAll();
        $author = $this->author->findAll();

        return view('pages/create', compact('category', 'author', 'title'));
    }


    public function create()
    {

        // validate request data
        $validation = \Config\Services::validation();
        $rules = [
            'name' => [
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required.'
                ]
            ],
            'category_id' => [
                'label' => 'Category',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} is required.',
                    'numeric' => '{field} must be number'
                ]
            ],
            'author_id' => [
                'label' => 'Author',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} is required.',
                    'numeric' => '{field} must be number'
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        // get data
        $body = $this->request->getVar();

        $this->post->insert($body);

        return redirect()->to('/post')->with('success', "berhasil create post");
    }


    public function edit($name)
    {
        $title = 'Create Post';


        $post = $this->post->where('name', $name)->first();
        // var_dump($post);

        $category = $this->category->findAll();
        $author = $this->author->findAll();

        return view('pages/edit', compact('post', 'category', 'author', 'title'));
    }


    public function update($id)
    {

        // validasi request
        $validation = \Config\Services::validation();
        $rules = [
            'name' => [
                'label'    => 'Name',
                'rules'    => 'required',
                'errors'    => [
                    'required'    => '{field} is required.'
                ]
            ],
            'category_id' => [
                'label'    => 'Category',
                'rules'    => 'required|numeric',
                'errors'    => [
                    'required'    => '{field} is required.',
                    'numeric'    => '{field} must be number'
                ]
            ],
            'author_id' => [
                'label'    => 'Author',
                'rules'    => 'required|numeric',
                'errors'    => [
                    'required'    => '{field} is required.',
                    'numeric'    => '{field} must be number'
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        // get data for update
        $post = $this->post->find($id);

        $post['name'] = $this->request->getVar('name');
        $post['category_id'] = $this->request->getVar('category_id');
        $post['author_id'] = $this->request->getVar('author_id');

        // update data and redirect
        $this->post->save($post);

        return redirect()->to('/post')->with('success', 'berhasil update data post');
    }


    public function delete($id)
    {

        $this->post->delete($id);

        return redirect()->back();
    }
}
