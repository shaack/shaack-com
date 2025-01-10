<?php
/** @var Shaack\Reboot\Site $site */
/** @var Shaack\Reboot\Page $page */
/** @var Shaack\Reboot\Request $request */
$navbarConfig = $site->getConfig()['nav'];
$structure = $navbarConfig['main'];
$expandSize = "md";
?>
<nav class="navbar navbar-expand-<?= $expandSize ?> navbar-dark bg-dark fixed-top">
    <div class="container-fluid max-width-lg">
        <button class="navbar-toggler ms-auto border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-3 mb-<?= $expandSize ?>-0">
                <li class="nav-item">
                    <a class="fw-bold nav-link <?= $request->getPath() == "/" ? "active" : "" ?>"
                       href="/">shaack.com</a>
                </li>
                <?php if ($structure) {
                    foreach ($structure as $label => $path) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?= str_starts_with($request->getPath(), $path) ? "active" : "" ?>"
                               aria-current="page" href="<?= $site->getWebPath() . $path ?>"><?= $label ?></a>
                        </li>
                        <?php
                    }
                } ?>
            </ul>
        </div>
    </div>
</nav>
