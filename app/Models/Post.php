<?php

namespace App\Models;

use CodeIgniter\Model;

class Post extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'slug', 'user_id', 'category_id', 'content', 'view', 'created_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function withCategory()
    {
        return $this->join('categories', 'categories.id = posts.category_id')->select('posts.*, categories.name AS category_name');
    }

    public function withUser()
    {
        return $this->join('users', 'users.id = posts.user_id')->select('posts.*, users.name AS editor_name');
    }

    public function onlyMyPost()
    {
        return $this->where('posts.user_id', session()->get('id'));
    }

    public function getIdPost()
    {
        return $this->findColumn('id');
    }

    public function withCategoryAndUserAndTotalComments()
    {
        return $this->select('posts.*, categories.name AS category_name, users.name AS editor_name, COUNT(comments.id) as total_comments')
            ->join('categories', 'categories.id = posts.category_id')
            ->join('users', 'users.id = posts.user_id')
            ->join('comments', 'posts.id = comments.post_id', 'left')
            ->groupBy('posts.id')
            ->orderBy('posts.id', 'desc');
    }
}
