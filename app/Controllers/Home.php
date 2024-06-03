<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Post;

class Home extends BaseController
{
    protected $comment;
    protected $post;

    public function __construct()
    {
        $this->comment = new Comment();
        $this->post = new Post();
    }

    public function index(): string
    {
        $data = [
            'data'  => $this->post->withCategoryAndUserAndTotalComments()->paginate('5', 'post'),
            'title' => 'Cilog',
            'pager' => $this->post->pager,
        ];

        return view('home', $data);
    }

    public function detail(string $slug): string
    {
        $post = $this->post->withCategory()->withUser()->where('posts.slug', $slug)->first();

        if (!session()->get($post->title)) {
            $this->post->update($post->id, [
                'view' => $post->view + 1,
            ]);

            session()->set($post->title, $post->id);
        }

        $data = [
            'title' => 'Cilog | ' . htmlspecialchars($post->title),
            'post' => $post,
            'comments' => $this->comment->getComments($post->id),
        ];

        return view('post', $data);
    }

    public function comment($slug)
    {
        $data = $this->request->getPost();
        $rules = [
            'content' => 'required',
        ];

        if (session()->get('id')) {
            $data['user_id'] = session()->get('id');
            $data['type'] = 'Editor';
        } else {
            $rules['name'] = 'required';
            $rules['email'] = 'required';
            $data['type'] = 'Pengunjung';
        }

        if (!$data['comment_id']) {
            unset($data['comment_id']);
        }

        $post = $this->post->where('posts.slug', $slug)->first();

        $data['post_id'] = $post->id;

        if (!$this->validateData($data, $rules)) {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }

        $this->comment->save($data);

        return redirect()->back()->with('message', 'Komentar terkirim!');
    }
}
