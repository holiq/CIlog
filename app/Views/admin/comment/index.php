<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="container mt-4">

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Admin\Comment::create') ?>" class="btn btn-success mb-3">Tambah Data</a>

    <div class="card">
        <div class="table-responsive mb-2">
            <table class="table text-nowrap table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Post</th>
                        <th>Tipe</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Komentar</th>
                        <th>Tanggal Dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data as $comment) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $comment->title ?></td>
                            <td><?= $comment->type ?></td>
                            <td><?= $comment->name ?? $comment->editor_name ?></td>
                            <td><?= $comment->email ?? $comment->editor_email ?></td>
                            <td><?= substr(strip_tags($comment->content), 0, 30) ?>...</td>
                            <td><?= $comment->created_at ?></td>
                            <td class="text-center">
                                <a href="<?= route_to('Admin\Comment::edit', $comment->id); ?>" class="btn-link">Edit</a>
                                <a href="<?= route_to('Admin\Comment::destroy', $comment->id); ?>" class="btn-link text-danger" onclick="destroy(event)">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <?= $pager->links('comment', 'pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>