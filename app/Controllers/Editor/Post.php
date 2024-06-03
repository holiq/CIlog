<?php

namespace App\Controllers\Editor;

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
            'data'  => $this->post->withCategory()->withUser()->onlyMyPost()->paginate('5', 'post'),
            'title' => 'List Post',
            'pager' => $this->post->pager,
        ];

        return view('editor/post/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Post',
            'categories' => $this->category->findAll(),
        ];

        return view('editor/post/create', $data);
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

        return redirect()->route('Editor\Post::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edit Post',
            'post' => $this->post->onlyMyPost()->find($id),
            'categories' => $this->category->findAll(),
        ];

        return view('editor/post/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $data['slug'] = url_title(str: $data['title'], lowercase: true);

        $this->post->onlyMyPost()->update($id, $data);

        return redirect()->route('Editor\Post::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->post->onlyMyPost()->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}
