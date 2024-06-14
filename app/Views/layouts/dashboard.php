<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact">

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
    <link rel="stylesheet" href="/css/perfect-scrollbar.css" />

    <link rel="stylesheet" href="/froala/css/froala_editor.pkgd.min.css" />
    <script src="/froala/js/froala_editor.pkgd.min.js"></script>

    <script src="/js/helpers.js"></script>
    <script src="/js/config.js"></script>
</head>

<body>
    <style>
        .menu .app-brand.demo {
            height: 64px;
            margin-top: 12px;
        }

        .app-brand-logo.demo svg {
            width: 22px;
            height: 38px;
        }

        .app-brand-text.demo {
            font-size: 1.75rem;
            letter-spacing: -0.5px;
            text-transform: lowercase;
        }

        /* ! For .layout-navbar-fixed added fix padding top to .layout-page */
        /* Detached navbar */
        .layout-navbar-fixed .layout-wrapper:not(.layout-horizontal):not(.layout-without-menu) .layout-page {
            padding-top: 76px !important;
        }

        /* Default navbar */
        .layout-navbar-fixed .layout-wrapper:not(.layout-without-menu) .layout-page {
            padding-top: 64px !important;
        }

        .docs-page .layout-navbar-fixed.layout-wrapper:not(.layout-without-menu) .layout-page,
        .docs-page .layout-menu-fixed.layout-wrapper:not(.layout-without-menu) .layout-page {
            padding-top: 62px !important;
        }

        /* Navbar page z-index issue solution */
        .content-wrapper .navbar {
            z-index: auto;
        }

        .demo-blocks>* {
            display: block !important;
        }

        .demo-inline-spacing>* {
            margin: 1rem 0.375rem 0 0 !important;
        }

        /* ? .demo-vertical-spacing class is used to have vertical margins between elements. To remove margin-top from the first-child, use .demo-only-element class with .demo-vertical-spacing class. For example, we have used this class in forms-input-groups.html file. */
        .demo-vertical-spacing>* {
            margin-top: 1rem !important;
            margin-bottom: 0 !important;
        }

        .demo-vertical-spacing.demo-only-element> :first-child {
            margin-top: 0 !important;
        }

        .demo-vertical-spacing-lg>* {
            margin-top: 1.875rem !important;
            margin-bottom: 0 !important;
        }

        .demo-vertical-spacing-lg.demo-only-element> :first-child {
            margin-top: 0 !important;
        }

        .demo-vertical-spacing-xl>* {
            margin-top: 5rem !important;
            margin-bottom: 0 !important;
        }

        .demo-vertical-spacing-xl.demo-only-element> :first-child {
            margin-top: 0 !important;
        }

        .rtl-only {
            display: none !important;
            text-align: left !important;
            direction: ltr !important;
        }

        [dir='rtl'] .rtl-only {
            display: block !important;
        }

        /* Dropdown buttons going out of small screens */
        @media (max-width: 576px) {
            #dropdown-variation-demo .btn-group .text-truncate {
                width: 231px;
                position: relative;
            }

            #dropdown-variation-demo .btn-group .text-truncate::after {
                position: absolute;
                top: 45%;
                right: 0.65rem;
            }
        }

        .layout-demo-wrapper {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            margin-top: 1rem;
        }

        .layout-demo-placeholder img {
            width: 900px;
        }

        .layout-demo-info {
            text-align: center;
            margin-top: 1rem;
        }

        .layout-menu-fixed .layout-navbar-full .layout-menu,
        .layout-page {
            padding-top: 0px !important;
        }

        .content-wrapper {
            padding-bottom: 0px !important;
        }

        .fr-wrapper div a {
            display: none !important;
        }
    </style>

    <main class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php if (session()->get('username')) : ?>
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
                    <div class="app-brand demo mb-4">
                        <a href="<?= route_to('Admin\Dashboard::index') ?>" class="app-brand-link">
                            <span class="app-brand-text demo menu-text fw-bold ms-2">Cilog</span>
                        </a>

                        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                            <i class="bx bx-chevron-left bx-sm align-middle"></i>
                        </a>
                    </div>

                    <div class="menu-inner-shadow" style="display: block;"></div>

                    <ul class="menu-inner py-1 ps ps--active-y">
                        <li class="menu-item <?= active_nav('Admin\Dashboard::index') ?>">
                            <a href="<?= route_to('Admin\Dashboard::index') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home"></i>
                                <div data-i18n="Basic">Dashboard</div>
                            </a>
                        </li>

                        <?php if (session()->get('role') == 'Admin') : ?>
                            <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin Menu</span></li>
                            <li class="menu-item <?= active_nav(['Admin\Category::index', 'Admin\Category::create', 'Admin\Category::edit']) ?>">
                                <a href="<?= route_to('Admin\Category::index') ?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-box"></i>
                                    <div data-i18n="Basic">Kategori</div>
                                </a>
                            </li>
                            <li class="menu-item <?= active_nav(['Admin\Post::index', 'Admin\Post::create', 'Admin\Post::edit']) ?>">
                                <a href="<?= route_to('Admin\Post::index') ?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-note"></i>
                                    <div data-i18n="Basic">Post</div>
                                </a>
                            </li>
                            <li class="menu-item <?= active_nav(['Admin\Comment::index', 'Admin\Comment::create', 'Admin\Comment::edit']) ?>">
                                <a href="<?= route_to('Admin\Comment::index') ?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-chat"></i>
                                    <div data-i18n="Basic">Kometar</div>
                                </a>
                            </li>
                            <li class="menu-item <?= active_nav(['Admin\User::index', 'Admin\User::create', 'Admin\User::edit']) ?>">
                                <a href="<?= route_to('Admin\User::index') ?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-user"></i>
                                    <div data-i18n="Basic">User</div>
                                </a>
                            </li>
                        <?php endif; ?>

                        <li class="menu-header small text-uppercase"><span class="menu-header-text">Editor Menu</span></li>
                        <li class="menu-item <?= active_nav(['Editor\Post::index', 'Editor\Post::create', 'Editor\Post::edit']) ?>">
                            <a href="<?= route_to('Editor\Post::index') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-note"></i>
                                <div data-i18n="Basic">Post</div>
                            </a>
                        </li>
                        <li class="menu-item <?= active_nav(['Editor\Comment::index', 'Editor\Comment::create', 'Editor\Comment::edit']) ?>">
                            <a href="<?= route_to('Editor\Comment::index') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-chat"></i>
                                <div data-i18n="Basic">Komentar</div>
                            </a>
                        </li>
                        <li class="menu-item <?= active_nav('Editor\Profile::edit') ?>">
                            <a href="<?= route_to('Editor\Profile::edit') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-cog"></i>
                                <div data-i18n="Basic">Profile</div>
                            </a>
                        </li>
                    </ul>
                </aside>
            <?php endif; ?>

            <div class="layout-page">
                <?php if (session()->get('username')) : ?>
                    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav align-items-center justify-content-center w-100 me-3 me-xl-0">
                            <h4 class="nav-item px-0 me-xl-4 m-0">Panel Admin</h4>
                        </div>

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <span class="fs-6"><?= session()->get('username') ?></span>
                                    <i class="bx bx-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block"><?= session()->get('name') ?></span>
                                                    <small class="text-muted"><?= session()->get('role') ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= route_to('Auth\Login::destroy') ?>">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                <?php endif; ?>

                <div class="content-wrapper">
                    <?= $this->renderSection('content') ?>

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </main>

    <script src="<?= base_url('js/core.js') ?>" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/main.js') ?>" crossorigin="anonymous"></script>

    <script>
        let editor = new FroalaEditor('#editor', {
            toolbarButtons: [
                ["undo", "redo", ],
                ["bold", "italic", "underline", "textColor", "backgroundColor", "clearFormatting"],
                ["alignLeft", "alignCenter", "alignRight", "alignJustify"],
                ["formatOL", "formatUL"],
                ["paragraphFormat", "fontSize"],
                ["insertLink", "insertImage"]
            ],
            imageUploadURL: '<?= route_to('UploadImageController::uploadImage') ?>',
            // imageDeleteURL: '<?= route_to('UploadImageController::deleteImage') ?>',
            imageManagerUploadMethod: 'POST',
            // imageManagerDeleteMethod: 'POST',

            // events: {
            //     'image.removed': function($img) {
            //         var xhttp = new XMLHttpRequest();
            //         xhttp.onreadystatechange = function() {

            //             if (this.readyState == 4 && this.status == 200) {
            //                 console.log('image was deleted');
            //             }
            //         };
            //         xhttp.open("POST", "<?= route_to('UploadImageController::deleteImage') ?>", true);
            //         xhttp.send(JSON.stringify({
            //             src: $img.attr('src')
            //         }));
            //     }
            // }
        });
    </script>
</body>

</html>