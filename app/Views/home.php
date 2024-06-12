<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-lg-9 mb-2">
            <?php foreach ($data as $post) : ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="mb-3"><a href="3" class="badge bg-label-primary"># <?= $post->category_name ?></a> | <?= $post->editor_name ?></div>
                        <h5 class="card-title"><a href="<?= route_to('Home::detail', $post->slug) ?>"><?= $post->title ?></a></h5>
                        <small class="text-muted"><?= $post->created_at ?></small>
                        <p class="card-text">
                            <?= substr(strip_tags($post->content), 0, 200) ?>...
                        </p>
                        <div class="badge bg-label-info"><i class="bx bx-show"></i><?= $post->view ?></div>
                        <div class="badge bg-label-secondary"><i class="bx bx-chat"></i><?= $post->total_comments ?></div>
                    </div>
                </div>
            <?php endforeach; ?>

            <hr>
            <div class="w-100 d-flex flex-row justify-content-center align-items-center">
                <?= $pager->links('post', 'pagination') ?>
            </div>
            <hr>
        </div>

        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Top Post</h4>
                </div>
                <div class="card-body">
                    <?php foreach ($top_post as $post) : ?>
                        <a href=""><?= substr(strip_tags($post->title), 0, 30) ?>...</a>
                        <div><a href="3" class="badge bg-label-primary"># <?= $post->category_name ?></a> | <?= $post->editor_name ?></div>
                        <hr>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Komentar Terbaru</h4>
                </div>
                <div class="card-body">
                    <?php foreach ($last_comment as $comment) : ?>
                        <a href="<?= route_to('Home::detail', $comment->slug) . '#comment-' . $comment->id ?>"><?= substr(strip_tags($comment->content), 0, 30) ?>...</a>
                        <h6><?= $comment->name ?? $comment->editor_name ?></h6>
                        <hr>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>