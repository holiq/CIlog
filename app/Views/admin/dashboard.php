<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>
<div class="container-xxl my-4">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between flex-row flex-xl-column">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="alert alert-warning flex-shrink-0 mb-0">
                            <i class="bx bx-box"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-end align-items-xl-start">
                        <span class="fw-medium d-block mb-1">Total Kategory</span>
                        <h3 class="card-title mb-2"><?= $total_category ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between flex-row flex-xl-column">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="alert alert-primary flex-shrink-0 mb-0">
                            <i class="bx bx-note"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-end align-items-xl-start">
                        <span class="fw-medium d-block mb-1">Total Post</span>
                        <h3 class="card-title mb-2"><?= $total_post ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between flex-row flex-xl-column">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="alert alert-info flex-shrink-0 mb-0">
                            <i class="bx bx-note"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-end align-items-xl-start">
                        <span class="fw-medium d-block mb-1">Total Komentar</span>
                        <h3 class="card-title mb-2"><?= $total_comment ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h4>Top Post</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Editor</th>
                        <th>Views</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($top_post as $post) : ?>
                        <tr>
                            <td><a href="<?= route_to('Home::detail', $post->slug) ?>"><?= substr(strip_tags($post->title), 0, 30) ?>...</a></td>
                            <td><?= $post->editor_name ?></td>
                            <td><?= $post->view ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h4>Komentar Terakhir</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Nama</th>
                        <th>Komentar</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($last_comment as $comment) : ?>
                        <tr>
                            <td><a href="<?= route_to('Home::detail', $comment->slug) . '#comment-' . $comment->id ?>"><?= substr(strip_tags($comment->title), 0, 20) ?>...</a></td>
                            <td><?= $comment->name ?? $comment->editor_name ?></td>
                            <td><?= substr(strip_tags($comment->content), 0, 30) ?>...</td>
                            <td><?= $comment->created_at ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>