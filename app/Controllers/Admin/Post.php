<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Post as ModelsPost;
use CodeIgniter\HTTP\ResponseInterface;

class Post extends BaseController
{
    protected $category;
    protected $post;
    protected $rules;

    public function __construct()
    {
        $this->category = new Category();
        $this->post  = new ModelsPost();
        $this->rules = [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ];
    }

    public function index()
    {
        $data = [
            'data'  => $this->post->withCategory()->withUser()->paginate('5', 'post'),
            'title' => 'List Post',
            'pager' => $this->post->pager,
        ];

        return view('admin/post/index', $data);
    }

    public function my()
    {
        $data = [
            'data'  => $this->post->withCategory()->withUser()->where('user_id', session()->get('id'))->paginate('5', 'post'),
            'title' => 'List Post',
            'pager' => $this->post->pager,
        ];

        return view('admin/post/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Post',
            'categories' => $this->category->findAll(),
        ];

        return view('admin/post/create', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $data['slug'] = url_title(str: $data['title'], lowercase: true);
        $data['view'] = 1;
        $data['user_id'] = session()->get('id');

        $this->post->save($data);

        return redirect()->route('Admin\Post::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edit Post',
            'post' => $this->post->find($id),
            'categories' => $this->category->findAll(),
        ];

        return view('admin/post/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $data['slug'] = url_title(str: $data['title'], lowercase: true);

        $this->post->update($id, $data);

        return redirect()->route('Admin\Post::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->post->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}
