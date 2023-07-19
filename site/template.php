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
    <?php /*
        <ul class="nav--navbar">
            <li>
                <a class="<?= $request->getPath() == "/" || $request->getPath() == "/simplicity" ? "active" : "" ?>"
                   href="/">shaack.com</a>
            </li>
            <?php
            $structure = $navbarConfig['structure'];
            if ($structure) {
                foreach ($structure as $label => $path) {
                    ?>
                    <li>
                        <a class="<?= substr($request->getPath(), 0, strlen($path)) === $path ? "active" : "" ?>"
                           href="<?= $site->getWebPath() . $path ?>"><?= $label ?></a>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
 */ ?>
</header>
<main>
    <section>
        <?= $page->render($request) ?>
    </section>
</main>
<?php if ($request->getPath() != "/") { ?>
    <footer>
        <nav>
            <ul>
                <li><a href="/legal-notice">Legal notice</a></li>
                <li><a href="/data-privacy-policy">Data privacy policy</a></li>
            </ul>
        </nav>
    </footer>
<?php } ?>
<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
