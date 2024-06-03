<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="container mt-4">

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('message') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Admin\Comment::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Admin\Comment::update', $comment->id) ?>">

                <div class="mb-4">
                    <label for"post_id">Judul Post</label>
                    <select name="post_id" id="post_id" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach ($posts as $data) : ?>
                            <option value="<?= $data->id ?>"<?= $data->id == $comment->post_id ? 'selected' : '' ?>><?= $data->title ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for"editor">Komentar</label>
                    <textarea name="content" class="form-control" id="editor"><?= $comment->content ?></textarea>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>