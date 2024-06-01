<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title-headings mb-4">
        <h3>Tambah user</h3>
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

    <a href="<?= route_to('User::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('User::store') ?>">
                <div class="mb-4">
                    <label for"name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-4">
                    <label for"email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="mb-4">
                    <label for"username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="mb-4">
                    <label for"role">Role</label>
                    <input type="text" name="role" id="role" class="form-control">
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