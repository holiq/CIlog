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
        $data = [
            'data'  => $this->user->paginate('5', 'user'),
            'title' => 'List User',
            'pager' => $this->user->pager,
        ];

        return view('admin/user/index', $data);
    }

    public function create()
    {
        return view('admin/user/create', ['title' => 'Tambah User']);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->user->save($data);

        return redirect()->route('Admin\User::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title'    => 'Edit User',
            'user' => $this->user->find($id),
        ];

        return view('admin/user/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        unset($this->rules['password']);

        if (!$data['password']) {
            unset($data['password']);
        } else {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->user->update($id, $data);

        return redirect()->route('Admin\User::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->user->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}
