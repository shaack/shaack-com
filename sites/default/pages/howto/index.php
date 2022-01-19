<h1>Knowledge Base</h1>
<ul>
    <?php
    /**  @var \Shaack\Reboot\Site $site */
    $filenames = scandir($site->getFsPath() . "/pages/howto", SCANDIR_SORT_NONE);
    natcasesort($filenames);

    foreach ($filenames as $file) {
        if (str_ends_with($file, ".md")) {
            $name = substr($file, 0, strlen($file) - 3)
            ?>
            <li><a href="./howto/<?= $name ?>"><?= str_replace("-", " ", $name) ?></a></li>
            <?php
        }
    }
    ?>
</ul>
