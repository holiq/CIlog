<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-xxl my-4">
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

    <a href="<?= route_to('Admin\Category::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Admin\Category::update', $category->id) ?>">
                <div class="mb-4">
                    <label for"name">Nama Kategory</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $category->name ?>">
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>