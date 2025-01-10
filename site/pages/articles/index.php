<h1>Knowledge Base</h1>
<?php
/**  @var Site $site */

use Shaack\Reboot\Site;

$filenames = scandir($site->getFsPath() . "/pages/blog", SCANDIR_SORT_NONE);
natcasesort($filenames);
$chunks = array_chunk($filenames, count($filenames) / 2 + 1);
?>
<div class="d-flex-sm">
    <div class="flex-col">
        <ul style="margin-bottom: 0">
            <?php
            foreach ($chunks[0] as $file) {
                if (str_ends_with($file, ".md")) {
                    $name = substr($file, 0, strlen($file) - 3)
                    ?>
                    <li><a style="min-width: 320px;" href="./howto/<?= $name ?>"><?= str_replace("-", " ", $name) ?></a></li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
    <div class="flex-col">
        <ul>
            <?php
            foreach ($chunks[1] as $file) {
                if (str_ends_with($file, ".md")) {
                    $name = substr($file, 0, strlen($file) - 3)
                    ?>
                    <li><a href="./howto/<?= $name ?>"><?= str_replace("-", " ", $name) ?></a></li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>