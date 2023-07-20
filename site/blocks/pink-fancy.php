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
    <div class="w-100 clearfix"></div>
    <div class="container overflow-hidden max-width-lg py-6">
        <div class="row g-5">
            <div class="col-md-4">
                <a href="services">
                    <?= $block->nodeHtml($block->xpath("/*[part(1)]")) ?>
                </a>
            </div>
            <div class="col-md-4">
                <a href="services">
                    <?= $block->nodeHtml($block->xpath("/*[part(2)]")) ?>
                </a>
            </div>
            <div class="col-md-4">
                <a href="services">
                    <?= $block->nodeHtml($block->xpath("/*[part(3)]")) ?>
                </a>
            </div>
        </div>
    </div>
</section>