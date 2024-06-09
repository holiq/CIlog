<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    protected $category;
    protected $comment;
    protected $post;

    public function __construct()
    {
        $this->category = new Category();
        $this->comment = new Comment();
        $this->post = new Post();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'total_category' => $this->category->countAllResults(),
            'total_comment' => $this->comment->countAllResults(),
            'total_post' => $this->post->countAllResults(),
            'top_post' => $this->post->withCategory()->withUser()->orderBy('view', 'desc')->findAll(5),
            'last_comment' => $this->comment->withPost()->withEditor()->orderBy('id', 'desc')->findAll(5)
        ];

        return view('admin/dashboard', $data);
    }
}
