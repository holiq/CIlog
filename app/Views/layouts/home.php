<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? '' ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="/css/boxicons.css" />

    <link rel="stylesheet" href="/css/core.css" />
    <link rel="stylesheet" href="/css/theme-default.css" />

    <script src="/js/helpers.js"></script>
    <script src="/js/config.js"></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-white bg-white mb-5">
            <div class="container-fluid">
                <a class="navbar-brand fs-4" href="javascript:void(0)">Cilog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="javascript:void(0)">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Kategori</a>
                        </li>
                    </ul>
                    <form class="d-flex" onsubmit="return false">
                        <input class="form-control me-2" type="search" placeholder="Cari..." aria-label="Cari" />
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main id="main">
        <?= $this->renderSection('content') ?>
    </main>

    <script src="<?= base_url('js/core.js') ?>" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/main.js') ?>" crossorigin="anonymous"></script>
</body>

</html>