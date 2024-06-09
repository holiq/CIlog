<?php
if (!empty($comments)) :
    $no = 20;
?>
    <?php foreach ($comments as $comment) : ?>
        <div class="relative mt-4" style="min-width: 400px; margin-left: <?= $no++ ?>px;" id="comment-<?= $comment->id ?>">
            <div class="d-flex align-items-center mb-2">
                <h5 class="mb-0 me-1"><?= $comment->name ?? $comment->editor_name ?></h5>
                <small class="text-muted">| <?= $comment->created_at ?> | #<?= $comment->id ?></small>
            </div>
            <div class="fr-view">
                <?= $comment->content ?>
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="reply(<?= $comment->id ?>)">Balas</button>

            <?php if (!empty($comment->replies)) : ?>
                <?= view('comment_reply', ['comments' => $comment->replies]) ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>