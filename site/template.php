<?php

/** @var Shaack\Reboot\Site $site */
/** @var Shaack\Reboot\Page $page */
/** @var Shaack\Reboot\Request $request */

$v = "2307201659";

?>
<!doctype html>
<html data-bs-theme="light" lang="en">
<head>
    <base href="<?= $site->getWebPath() ?>"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/styles/screen.css?v=<?= $v ?>">
    <link rel="stylesheet" href="/assets/fontawesome-subset/css/all.min.css?v=<?= $v ?>">
    <title>Stefan Haack, IT-Consulting & Development</title>
</head>
<body>
<header>
    <?php include "_navbar.php" ?>
</header>
<main>
    <?= $page->render($request) ?>
</main>
<footer class="bg-dark text-dark">
    <?php include "_footer.php" ?>
</footer>
<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
