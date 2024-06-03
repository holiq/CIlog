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

    <a href="<?= route_to('Admin\Post::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Admin\Post::store') ?>">
                <div class="mb-4">
                    <label for"title">Judul</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="mb-4">
                    <label for"category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach ($categories as $data) : ?>
                            <option value="<?= $data->id ?>"><?= $data->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for"editor">Konten</label>
                    <textarea name="content" class="form-control" id="editor"></textarea>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>