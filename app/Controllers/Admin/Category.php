<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Category as ModelsCategory;
use CodeIgniter\HTTP\ResponseInterface;

class Category extends BaseController
{
    protected $category;
    protected $rules;

    public function __construct()
    {
        $this->category  = new ModelsCategory();
        $this->rules = [
            'name' => 'required',
            'slug' => 'required',

        ];
    }
    public function index()
    {
        //
    }
}
