<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends BaseController
{
    protected $user;
    protected $rules;

    public function __construct()
    {
        $this->user  = new User();
        $this->rules = [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
        ];
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Post',
            'user' => $this->user->find(session()->get('id')),
        ];

        return view('editor/user/edit', $data);
    }

    public function update()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        $this->user->update(session()->get('id'), $data);

        return redirect()->back()->with('message', 'Sukses ubah data');
    }
}
