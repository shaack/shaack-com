<?php

/** @var Shaack\Reboot\Site $site */
/** @var Shaack\Reboot\Page $page */
/** @var Shaack\Reboot\Request $request */

$v = 5;

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
    <nav>
        <?php $navbarConfig = $site->getConfig()['navbar']; ?>
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
    </nav>
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
</body>
</html>
