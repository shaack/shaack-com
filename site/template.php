<?php

/** @var Shaack\Reboot\Site $site */
/** @var Shaack\Reboot\Page $page */
/** @var Shaack\Reboot\Request $request */

$v = "2307191303";

?>
<!doctype html>
<html lang="en">
<head>
    <base href="<?= $site->getWebPath() ?>"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/styles/screen.css?v=<?= $v ?>">
    <title>shaack.com</title>
</head>
<body class="dev">
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
