<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>
<div class="container position-relative">
    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

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

    <div class="card mb-2">
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <a href="3" class="badge bg-label-primary"><i class="bx bx-hash"></i> <?= $post->category_name ?></a>
                <span class="badge bg-label-info mx-1"><i class="bx bx-show"></i><?= $post->view ?></span>
                <span class="fs-6">| <?= $post->editor_name ?></span>
            </div>
            <h3 class="card-title mb-0"><?= $post->title ?></h3>
            <small class="text-muted"><?= $post->created_at ?></small>
            <hr>
            <div>
                <?= $post->content ?>
            </div>
            <button type="button" onclick="comment()" class="btn btn-primary form-control py-3">KOMENTAR</button>
            <hr>
            <div class="overflow-auto">
                <?php foreach ($comments as $comment) : ?>
                    <div class="relative mt-4" style="min-width: 400px; margin-left: 0px;">
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="mb-0 me-1"><?= $comment->name ?? $comment->editor_name ?></h5>
                            <small class="text-muted">| <?= $comment->created_at ?> | #<?= $comment->id ?></small>
                        </div>
                        <div>
                            <?= $comment->content ?>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="reply(<?= $comment->id ?>)">Balas</button>

                        <?php if (!empty($comment->replies)) : ?>
                            <?= view('comment_reply', ['comments' => $comment->replies]) ?>
                        <?php endif; ?>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="card mb-4" id="comment">
        <div class="card-body">
            <button class="btn btn-outline-danger btn-sm d-none mb-2" id="cancel" onclick="cancel()">Batal</button>

            <div id="reply" class="d-flex d-none align-content-center align-items-center mb-2">
                <h6 class="mb-0">Balas #<span id="target"></span></h6>
                <button class="btn btn-outline-danger btn-sm ms-2" onclick="cancel()">Batal</button>
            </div>

            <form action="<?= route_to('Home::comment', $post->slug) ?>" method="post">
                <input type="hidden" name="comment_id" id="comment_id" value="">

                <?php if (session()->get('id')) : ?>
                    <h5>Komentar sebagai: <?= session()->get('name') ?></h5>
                <?php else : ?>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>
                <?php endif; ?>

                <div class="mb-4">
                    <label for"komentar">Komentar</label>
                    <textarea name="content" class="form-control" id="komentar"></textarea>
                </div>

                <button type="submit" class="btn btn-primary form-control">Kirim</button>
            </form>
        </div>
    </div>
</div>
<script>
    function comment() {
        let comment = document.getElementById('comment');
        comment.classList.add("sticky-bottom", "shadow");

        document.getElementById("cancel").classList.remove("d-none");
    }

    function reply(id) {
        let comment = document.getElementById('comment');
        comment.classList.add("sticky-bottom", "shadow");

        let reply = document.getElementById("reply");
        reply.classList.remove("d-none");

        document.getElementById("target").innerHTML = id
        document.getElementById("comment_id").value = id
    }

    function cancel() {
        let comment = document.getElementById('comment');
        comment.classList.remove("sticky-bottom", "shadow");

        let reply = document.getElementById("reply");
        reply.classList.add("d-none");

        document.getElementById("cancel").classList.add("d-none")

        document.getElementById("comment_id").value = ''
    }
</script>
<?= $this->endSection() ?>