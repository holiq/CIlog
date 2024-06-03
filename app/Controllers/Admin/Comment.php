<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Comment as ModelsComment;
use App\Models\Post;
use CodeIgniter\HTTP\ResponseInterface;

class Comment extends BaseController
{
    protected $comment;
    protected $post;
    protected $rules;

    public function __construct()
    {
        $this->comment  = new ModelsComment();
        $this->post = new Post();
        $this->rules = [
            'content' => 'required',
            'post_id' => 'required',
        ];
    }

    public function index()
    {
        $data = [
            'data'  => $this->comment->withPost()->withEditor()->paginate('5', 'comment'),
            'title' => 'List Komentar',
            'pager' => $this->comment->pager,
        ];

        return view('admin/comment/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Komentar',
            'posts' => $this->post->select('id, title')->findAll(),
        ];

        return view('admin/comment/create', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        // if (session()->get('id')) {
        //     $data['user_id'] = session()->get('id');
        //     $data['type'] = 'Editor';
        // } else {
        //     $data['type'] = 'Pengunjung';
        // }

        $data['user_id'] = session()->get('id');
        $data['type'] = 'Editor';

        $this->comment->save($data);

        return redirect()->route('Admin\Comment::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title'    => 'Edit Komentar',
            'comment' => $this->comment->find($id),
            'posts' => $this->post->select('id, title')->findAll(),
        ];

        return view('admin/comment/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->comment->update($id, $data);

        return redirect()->route('Admin\Comment::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->comment->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}
