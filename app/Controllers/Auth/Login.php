<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;

class Login extends BaseController
{
    protected $user;
    protected $rules;

    public function __construct()
    {
        $this->user  = new User();
        $this->rules = [
            'username' => 'required',
            'password' => 'required',
        ];
    }
    public function index()
    {
        //
    }
}
