<?php

namespace App\Controllers;

use App\Models\Post;

class Home extends BaseController
{
    protected $post;

    public function __construct()
    {
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
        return view('post');
    }
}
