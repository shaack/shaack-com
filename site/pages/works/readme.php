<?php
/** @var Shaack\Reboot\Reboot $reboot */
/** @var Shaack\Reboot\Site $site */

/** @var Shaack\Reboot\Request $request */

use Shaack\Reboot\Block;
use Shaack\Utils\HttpUtils;

$project = HttpUtils::sanitizeFileName($request->getParam("project"));
$content = file_get_contents($reboot->getBaseFsPath() . "/web/projekte/" . $project . "/README.md");
$block = new Block($site, "text", $content);
echo($block->render($request));