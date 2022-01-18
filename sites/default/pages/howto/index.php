<h1>Knowledge Base</h1>
<ul class="list-inline">
    <?php
    /**  @var \Shaack\Reboot\Site $site */
    $files = scandir($site->getFsPath() . "/pages/howto");
    foreach ($files as $file) {
        if (str_ends_with($file, ".md")) {
            $name = substr($file, 0, strlen($file) - 3)
            ?>
            <li><a href="./howto/<?= $name ?>"><?= str_replace("-", " ", $name) ?></a></li>
            <?php
        }
    }
    ?>
</ul>
