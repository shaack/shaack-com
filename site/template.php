<?php

/** @var Shaack\Reboot\Site $site */
/** @var Shaack\Reboot\Page $page */
/** @var Shaack\Reboot\Request $request */

$v = "2501102102";
$content = $page->render($request);
$pageConfig = $page->getConfig(); // the frontmatter config
$hideNav = !!$page->getConfig()["hide-nav"];
$navbarConfig = $site->getConfig()['nav'];
?>
<!doctype html>
<html data-bs-theme="light" lang="en">
<head>
    <base href="<?= $site->getWebPath() ?>"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/styles/screen.css?v=<?= $v ?>">
    <!-- <link rel="stylesheet" href="/assets/fontawesome-subset/css/all.min.css?v=<?= $v ?>"> -->
    <title>shaack.com, IT-Consulting & Development</title>
</head>
<body class="<?= $page->getConfig()["hide-nav"] ? "bg-gray2" : "" ?>">
<?php if (!$pageConfig["hide-nav"]) { ?>
<header>
    <?php include "_navbar.php" ?>
</header>
<?php } ?>
<main>
    <?= $content ?>
</main>
<footer class="container-fluid max-width-lg">
    <nav class="navbar navbar-legal navbar-dark">
        <ul class="navbar-nav">
            <?php
            $navService = $navbarConfig['service'];
            foreach ($navService as $label => $path) { ?>
                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= $site->getWebPath() . $path ?>"><?= $label ?></a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</footer>
<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
