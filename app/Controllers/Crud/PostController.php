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
        // $posts = $this->post->where('is_public', true)->findAll();
        $posts = [];


        // ambil data user
        $user = session()->get('verified');

        // cek admin apa bukan
        $is_admin = $this->author->where('email', $user['email'] ?? null)->where('is_admin', true)->first();


        // cek post yg akan ditampilkan
        if ($is_admin) {
            $posts = $this->post->findAll();
            $is_admin = true;
        } else {
            $posts = $this->post->where('is_public', true)->findAll();
            $is_admin = false;
        }


        return view('pages/post', compact('posts', 'title', 'is_admin'));
    }

    public function new()
    {
        $title = 'Create Post';

        $category = $this->category->findAll();
        // get data author
        // $author = $this->author->findAll();
        $author = session()->get('verified');

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

        // get request
        $body = $this->request->getVar();

        // custom payload for save
        $payload = [
            'name' => $body['name'],
            'description' => $body['description'],
            'category_id' => $body['category_id'],
            'author_id' => $body['author_id'],
            'is_public' => true,
        ];

        $this->post->insert($payload);

        return redirect()->to('/post')->with('success', "berhasil create post");
    }


    public function edit($name)
    {
        $title = 'Create Post';


        $post = $this->post->where('name', $name)->first();
        // var_dump($post);

        $category = $this->category->findAll();
        // $author = $this->author->findAll();
        $author = session()->get('verified');

        return view('pages/edit', compact('post', 'category', 'author', 'title'));
    }


    public function update($name)
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
        $body = $this->request->getVar();
        $post = $this->post->where('author_id', $body['author_id'])->where('name', $name)->first();


        // update data and redirect
        $post['name'] = $body['name'];
        $post['description'] = $body['description'];
        $post['category_id'] = $body['category_id'];
        $post['is_public'] = true;


        $this->post->save($post);

        return redirect()->to('/post')->with('success', 'berhasil update data post');
    }


    public function delete($id)
    {

        $this->post->delete($id);

        return redirect()->back();
    }
}
