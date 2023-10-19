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
        // $offset = $this->request->getVar('offset') ?? 0;
        // $page = 1;

        // $author = $this->author->findAll(2, $offset);
        $author = $this->author->findAll();

        $totalAuthor = $this->author->countAllResults();


        return view('pages/author/index', compact('author', 
        // 'offset', 'page', 'totalAuthor'
    ));
    }


    // public function show(int $page = null)
    // {
    //     // $page = $page + 1;

    //     $offset = $this->request->getVar('offset');

    //     $author = $this->author->findAll(2, $offset);

    //     $totalAuthor = $this->author->countAllResults();

    //     return view('pages/author/index', compact('author', 'offset', 'page', 'totalAuthor'));
    // }


    public function new()
    {

        $author = $this->author->findAll();

        return view('pages/author/create', compact('author'));
    }


    public function create()
    {
        // validation
        $validation = \Config\Services::validation();
        $rules = [
            'name' => [
                'label'    => 'Name',
                'rules'    => 'required',
                'errors'    => [
                    'required'    => '{field} is required.'
                ]
            ],
            'email' => [
                'label'    => 'Email',
                'rules'    => 'required',
                'errors'    => [
                    'required'    => '{field} is required.'
                ]
            ],
            'password' => [
                'label'    => 'Password',
                'rules'    => 'required',
                'errors'    => [
                    'required'    => '{field} is required.'
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        // get data
        $body = $this->request->getVar();


        $this->author->insert([
            'name' => $body['name'],
            'email' => $body['email'],
            'password' => password_hash($body['password'], MHASH_MD5),
            'is_admin' => false,
        ]);


        return redirect()->to('/author')->with('success', 'Berhasil tambah Author');
    }

    public function update($id)
    {


        $status_admin = $this->author->find($id);

        $this->author->update($id, [
            'is_admin' => !$status_admin['is_admin']
        ]);

        return redirect()->back()->with('success', 'Sukses set Admin Author');
    }
    public function delete($id)
    {
        $this->author->delete($id);


        return redirect()->back()->with('success', 'Sukses delete Author');
    }
}
