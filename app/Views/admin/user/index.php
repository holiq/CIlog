<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="container mt-4">

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Admin\User::create') ?>" class="btn btn-success mb-3">Tambah Data</a>

    <div class="card">
        <div class="table-responsive mb-2">
            <table class="table text-nowrap table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data as $user) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $user->name ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->role ?></td>
                            <td class="text-center">
                                <a href="<?= route_to('Admin\User::edit', $user->id); ?>" class="btn-link">Edit</a>
                                <a href="<?= route_to('Admin\User::destroy', $user->id); ?>" class="btn-link text-danger" onclick="destroy(event)">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <?= $pager->links('user', 'pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>