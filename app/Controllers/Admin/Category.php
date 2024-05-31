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
        $this->category = new ModelsCategory();
        $this->rules = [
            'name'  => 'required',
        ];
    }

    public function index()
    {
        $data = [
            'data'  => $this->category->paginate('5', 'category'),
            'title' => 'List Kategori',
            'pager' => $this->category->pager,
        ];

        return view('admin/kategori/index', $data);
    }

    public function create()
    {
        return view('admin/kategori/create', ['title' => 'Tambah Kategori']);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $data['slug'] = str_replace(' ', '-', $data['name']);

        $this->category->insert($data);

        return redirect()->route('Admin\Category::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edit Kategori',
            'category' => $this->category->find($id),
        ];

        return view('admin/kategori/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $data['slug'] = url_title(str: $data['name'], lowercase: true);

        $this->category->update($id, $data);

        return redirect()->route('Admin\Category::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->category->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}
