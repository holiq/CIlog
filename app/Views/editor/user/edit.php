<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="container mt-4">

    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('error') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Admin\Profile::update') ?>">

                <div class="mb-4">
                    <label for"name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $user->name ?>">
                </div>
                <div class="mb-4">
                    <label for"username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $user->username ?>">
                </div>
                <div class="mb-4">
                    <label for"email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?= $user->email ?>">
                </div>
                <div class="mb-4">
                    <label for"password">Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>


                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>