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
    public function login_page()
    {

        // check user
        // if (session()->get('verified')) {
        //     return redirect()->to('/post');
        // } else {
        // }


        return view('pages/auth/login');
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
        if (!password_verify($data['password'], $user['password'])) {
            return redirect()->back()->with('error', 'invalid credentials');
        } else {
            session()->set('verified', $user);
            return redirect()->to('/post');
        }
    }

    public function register_page()
    {
        // check user
        // if (session()->get('verified')) {
        //     return redirect()->to('/post');
        // } else {
        // }
        return view('pages/auth/register');
    }

    public function register()
    {

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
            return redirect()->back()->with('validation', $validation->getErrors());
        }

        // get data
        $data = $this->request->getVar();

        // check user
        $user = $this->author->where('email', $data['email'])->first();
        if ($user) {
            return redirect()->back()->withInput()->with('error', 'Invalid crendentials, akun sudah terdaftar');
        } else {
            $user = $this->author->save([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], CRYPT_SHA256),
            ]);

            session()->set('verified', $user);

            return redirect()->to('/post');
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
