<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment extends Model
{
    protected $table            = 'comments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['content', 'post_id', 'user_id', 'comment_id', 'name', 'email', 'type', 'created_at'];

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

    public function withPost()
    {
        return $this->join('posts', 'posts.id = comments.post_id')->select('comments.*, posts.title');
    }

    public function withEditor()
    {
        return $this->join('users', 'users.id = comments.user_id', 'left')
            ->select('comments.*, users.name AS editor_name, users.email AS editor_email');
    }

    public function onlyMyComment($myPost)
    {
        return $this->whereIn('post_id', $myPost);
    }

    public function getComments($postId, $parentId = null)
    {
        $comments = $this->withEditor()->where(['post_id' => $postId, 'comment_id' => $parentId])
            ->orderBy('id', 'DESC')
            ->findAll();

        foreach ($comments as &$comment) {
            $comment->replies = $this->getComments($postId, $comment->id);
        }

        return $comments;
    }
}
