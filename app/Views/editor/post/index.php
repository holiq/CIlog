<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="container mt-4">

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Editor\Post::create') ?>" class="btn btn-success mb-3">Tambah Data</a>

    <div class="card">
        <div class="table-responsive mb-2">
            <table class="table text-nowrap table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Slug</th>
                        <th>Editor</th>
                        <th>Kategori</th>
                        <th>Dilihat</th>
                        <th>Tanggal Dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data as $post) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $post->title ?></td>
                            <td><?= $post->slug ?></td>
                            <td><?= $post->user_name ?></td>
                            <td><?= $post->category_name ?></td>
                            <td><?= $post->view ?></td>
                            <td><?= $post->created_at ?></td>
                            <td class="text-center">
                                <a href="<?= route_to('Editor\Post::edit', $post->id); ?>" class="btn-link">Edit</a>
                                <a href="<?= route_to('Editor\Post::destroy', $post->id); ?>" class="btn-link text-danger" onclick="destroy(event)">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <?= $pager->links('post', 'pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>