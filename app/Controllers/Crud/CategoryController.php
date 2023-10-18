<?php

namespace App\Controllers\Crud;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public $category;

    public function __construct()
    {
        $this->category = new CategoryModel;
    }

    public function index()
    {

        $category = $this->category->findAll();

        return view('pages/category/index', compact('category'));
    }


    public function new()
    {

        return view('pages/category/create');
    }
    public function create()
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
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('route')->withInput()->with('validation', $validation->getErrors());
        }


        // get request
        $body = $this->request->getVar();

        $this->category->save($body);


        return redirect()->to('/category')->with('success', 'Sukses tambah category');
    }


    public function delete($id)
    {
        try {
            $this->category->delete($id);

            return redirect()->back()->with('success', 'Sukses delete category');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', 'Gagal delete category');
        }
    }
}
