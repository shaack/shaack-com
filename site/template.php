<?php

/** @var Shaack\Reboot\Site $site */
/** @var Shaack\Reboot\Page $page */
/** @var Shaack\Reboot\Request $request */

$v = "2501102102";
$content = $page->render($request);
$pageConfig = $page->getConfig(); // the frontmatter config
$hideNav = !!@$page->getConfig()["hide-nav"];
$navbarConfig = $site->getConfig()['nav'];
?>
<!doctype html>
<html data-bs-theme="light" lang="en">
<head>
    <base href="<?= $site->getWebPath() ?>"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/vendor/prism/theme-tomorrow-night.css" />
    <link rel="stylesheet" href="/assets/styles/screen.css?v=<?= $v ?>">
    <!-- <link rel="stylesheet" href="/assets/fontawesome-subset/css/all.min.css?v=<?= $v ?>"> -->
    <title>shaack.com // consulting, coding, coaching and chess</title>
</head>
<body class="<?= $hideNav ? "bg-gray2" : "" ?>" data-bs-theme="dark">
<?php if (!$hideNav) { ?>
<header>
    <?php include "_navbar.php" ?>
</header>
<?php } ?>
<main>
    <?= $content ?>
</main>
<footer class="container-fluid max-width-lg">
    <nav class="navbar navbar-legal navbar-dark">
        <div class="row w-100 <?= $hideNav ? "animate-fade-in" : "" ?>">
            <?php
            $navService = $navbarConfig['service'];
            foreach ($navService as $label => $path) { ?>
                <div class="col-auto pe-4 pb-4">
                    <a class="nav-link" href="<?= $site->getWebPath() . $path ?>"><?= $label ?></a>
                </div>
            <?php } ?>
        </div>
    </nav>
</footer>
<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/vendor/prism/prism.js"></script>
</body>
</html>
