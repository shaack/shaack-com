<?php
/** @var Shaack\Reboot\Site $site */
/** @var Shaack\Reboot\Page $page */
/** @var Shaack\Reboot\Request $request */
$navbarConfig = $site->getConfig()['navbar'];
$structure = $navbarConfig['structure'];
?>
<div class="container-fluid max-width-lg">
    <div class="row mb-4">
        <div class="col-md">
            <p>
                <b>Dipl.-Ing. Stefan Haack</b><br/>
                Wittinger Str. 140L<br/>
                29223 Celle
            </p>
            <p>
                <a href="mailto:shaack@gmail.com">shaack@gmail.com</a><br/>
                <a href="tel:+4951414039511">+49 5141 403 95 11</a><br/>
            </p>
        </div>
        <div class="col-md">
            <nav>
                <h3>shaack.com</h3>
                <ul class="list-unstyled">
                    <?php if ($structure) {
                        foreach ($structure as $label => $path) {
                            ?>
                            <li><a href="<?= $site->getWebPath() . $path ?>"><?= $label ?></a></li>
                            <?php
                        }
                    } ?>
                </ul>
            </nav>
        </div>
    </div>
    <div>
        <div class="col-md">
            <nav>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="/legal-notice">Legal notice</a></li>
                    <li class="list-inline-item"><a href="/data-privacy-policy">Data privacy policy</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>