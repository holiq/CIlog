<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title-headings mb-4">
        <h3>Tambah category</h3>
    </div>

    <?php if (! empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('message') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Category::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Category::store') ?>">
                <div class="mb-4">
                    <label for"name">Nama Category</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>