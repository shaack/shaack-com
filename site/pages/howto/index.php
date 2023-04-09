<h1>Knowledge Base</h1>
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
$chunks = array_chunk($filenames, count($filenames) / 2 + 1);
// add an overlapping element to the second chunk
?>
<div class="d-flex-sm">
    <div class="flex-col">
        <ul style="margin-bottom: 0">
            <?php
            foreach ($chunks[0] as $name) {
                ?>
                <li><a style="min-width: 320px;" href="./howto/<?= $name ?>"><?= str_replace("-", " ", $name) ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="flex-col">
        <ul>
            <?php
            foreach ($chunks[1] as $name) {
                ?>
                <li><a style="min-width: 320px;" href="./howto/<?= $name ?>"><?= str_replace("-", " ", $name) ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>