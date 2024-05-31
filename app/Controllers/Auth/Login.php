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
        return view('auth/login', ['title' => 'Login Admin']);
    }

    public function process()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $check = $this->user->where('username', $data['username'])->first();

        if ($check) {
            if (password_verify($data['password'], $check['password'])) {
                session()->set('name', $check['name']);
                session()->set('username', $check['username']);
                session()->set('role', $check['role']);

                return redirect()->route('Admin\Dashboard::index')->with('message', 'Selamat datang ' . $data['username']);
            }
        }

        return redirect()->back()->with('errors', ['Invalid Username or Password!']);
    }

    public function destroy()
    {
        session()->destroy();

        return redirect()->route('Home::index');
    }
}
