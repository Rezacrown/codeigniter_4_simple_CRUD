<?php

namespace App\Validation;

use CodeIgniter\HTTP\Request;

class PostValidation
{
    public function custom_rule(Request $request): bool
    {

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
        if ($validation->run($request->getBody())) {
            return true;
        }

        return false;
    }
}
