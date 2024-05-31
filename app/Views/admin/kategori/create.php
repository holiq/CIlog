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

    <a href="<?= route_to('Admin\Category::index') ?>" class="btn btn-md btn-warning mb-3"><i class="bx bx-chevron-left"></i>Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Admin\Category::store') ?>">
                <div class="mb-4">
                    <label for"name">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary form-control">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>