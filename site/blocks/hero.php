<?php
/**
 * Author and copyright: Stefan Haack (https://shaack.com)
 * Repository: https://github.com/shaack/reboot-cms
 * License: MIT, see file 'LICENSE'
 */
/** @var Shaack\Reboot\Block $block */
/** @var Shaack\Reboot\Site $site */
/** @var Shaack\Reboot\Request $request */
?>
<section class="block block-hero">
    <div class="container-fluid max-width-lg">
        <img class="img-fluid mb-5 hero-brand" src="/assets/images/shaack_com_logo.svg" alt="shaack.com"/>
        <nav class="navbar navbar-dark">
            <?php
            $navbarConfig = $site->getConfig()['nav'];
            ?>
            <ul class="navbar-nav">
                <?php
                $navMain = $navbarConfig['main'];
                foreach ($navMain as $label => $path) {
                    $active = false;
                    if ($path === "/") {
                        $active = $request->getPath() === $path;
                    } else {
                        $active = str_starts_with($request->getPath(), $path);
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $active ? "active" : "" ?>"
                           href="<?= $site->getWebPath() . $path ?>"><?= $label ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
    </div>
</section>