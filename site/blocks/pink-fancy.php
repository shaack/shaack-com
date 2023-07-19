<?php
/**
 * Author and copyright: Stefan Haack (https://shaack.com)
 * Repository: https://github.com/shaack/reboot-cms
 * License: MIT, see file 'LICENSE'
 */

/**  @var \Shaack\Reboot\Block $block */
?>
<section class="block block-pink-fancy">
    <div class="mask-1"></div>
    <div class="mask-2"></div>
    <div class="container w-100 overflow-hidden max-width-lg py-6">
        <div class="row g-5">
            <div class="col-md-4">
                <?= $block->nodeHtml($block->xpath("/*[part(1)]")) ?>
            </div>
            <div class="col-md-4">
                <?= $block->nodeHtml($block->xpath("/*[part(2)]")) ?>
            </div>
            <div class="col-md-4">
                <?= $block->nodeHtml($block->xpath("/*[part(3)]")) ?>
            </div>
        </div>
    </div>
</section>