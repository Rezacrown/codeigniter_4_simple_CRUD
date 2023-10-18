<?php

namespace App\Controllers\Crud;

use App\Controllers\BaseController;
use App\Models\AuthorModel;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends BaseController
{

    protected $author;

    public function __construct()
    {
        $this->author = new AuthorModel;
    }

    // 
    public function login()
    {

        // check user
        if (session()->get('verified')) {
            return redirect()->to('/post');
        } else {
            return view('pages/auth/login');
        }
    }


    public function signin()
    {

        $validation = \Config\Services::validation();
        $rules = [
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
            return redirect()->back()->with('validation', $validation->getErrors());
        }

        // get data
        $data = $this->request->getVar();
        $user = $this->author->where('email', $data['email'])->first();

        // check valid data
        if ($user['password'] !== $data['password']) {
            return redirect()->back()->with('error', 'invalid credentials');
        } else {
            session()->set('verified', rand());
            return redirect()->to('/post');
        }
    }
}
