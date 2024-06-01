<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Comment extends BaseController
{
    protected $comment;
    protected $rules;

    public function __construct()
    {
        $this->comment  = new ModelsComment();
        $this->rules = [
            'content' => 'required',
            'post_id' => 'required',

        ];
    }
    public function index()
    {
       
    }
}
