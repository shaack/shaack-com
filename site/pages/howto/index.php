<?php
/**  @var \Shaack\Reboot\Site $site */
$filenamesUnfiltered = scandir($site->getFsPath() . "/pages/howto", SCANDIR_SORT_NONE);
// remove files starting with . and allow only with .md extension
$filenames = array_filter($filenamesUnfiltered, function ($filename) {
    return !str_starts_with($filename, ".") && str_ends_with($filename, ".md");
});
// remove the .md extension from $filenames
$filenames = array_map(function ($filename) {
    return substr($filename, 0, strlen($filename) - 3);
}, $filenames);
natcasesort($filenames);
// split the array $filenames in two chunks
// if not divide able by two make the first chunk bigger
if (count($filenames) % 2 === 0) {
    $chunks = array_chunk($filenames, count($filenames) / 2);
} else {
    $chunks = array_chunk($filenames, count($filenames) / 2 + 1);
}
?>
<div class="block block-how-to block-with-padding">
    <div class="container-fluid max-width-lg">
        <h1>Knowledge Base</h1>
        <div class="row">
            <div class="col-md">
                <ul style="margin-bottom: 0">
                    <?php
                    foreach ($chunks[0] as $name) {
                        ?>
                        <li><a style="min-width: 320px;"
                               href="./howto/<?= $name ?>"><?= str_replace("-", " ", $name) ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md">
                <ul>
                    <?php
                    foreach ($chunks[1] as $name) {
                        ?>
                        <li><a style="min-width: 320px;"
                               href="./howto/<?= $name ?>"><?= str_replace("-", " ", $name) ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>