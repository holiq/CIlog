<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-xxl my-4">
    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Admin\Category::create') ?>" class="btn btn-primary mb-2">Tambah Data</a>

    <div class="card">
        <div class="table-responsive mb-2">
            <table class="table text-nowrap table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Kategori</th>
                        <th>Slug Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $row) : ?>
                        <tr>
                            <td><?= $row->name ?></td>
                            <td><?= $row->slug ?></td>
                            <td class="text-center">
                                <a href="<?= route_to('Admin\Category::edit', $row->id); ?>" class="btn-link">Edit</a>
                                <a href="<?= route_to('Admin\Category::destroy', $row->id); ?>" class="btn-link text-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <?= $pager->links('row', 'pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>