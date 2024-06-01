<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Post extends BaseController
{
    protected $post;
    protected $rules;

    public function __construct()
    {
        $this->post  = new ModelsPost();
        $this->rules = [
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            

        ];
    }
    public function index()
    {
        
    }
}
