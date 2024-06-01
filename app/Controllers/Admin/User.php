<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User as ModelsUser;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    protected $user;
    protected $rules;

    public function __construct()
    {
        $this->user  = new ModelsUser();
        $this->rules = [
            'username' => 'required',
            'password' => 'required',
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',

        ];
    }
    public function index()
    {
        //
    }
}