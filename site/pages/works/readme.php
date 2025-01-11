<?php
/** @var Shaack\Reboot\Reboot $reboot */
/** @var Shaack\Reboot\Site $site */

/** @var Shaack\Reboot\Request $request */

use Shaack\Reboot\Block;
use Shaack\Utils\HttpUtils;

$isLocal = $site->getAddOn("Project")->isLocal();
$project = HttpUtils::sanitizeFileName($request->getParam("project"));
if($isLocal) {
    $projectPath = $reboot->getBaseFsPath() . "/../" . $project;
} else {
    $projectPath = $reboot->getBaseFsPath() . "/web/projekte/" . $project;
}
$content = file_get_contents($projectPath . "/README.md");
$block = new Block($site, "text", $content);
echo($block->render($request));