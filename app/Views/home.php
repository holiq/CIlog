<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-xl-9">
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
        </div>
    </div>

    <?= $pager->links('post', 'pagination') ?>
</div>
<?= $this->endSection() ?>