<?php
/**
 * Author and copyright: Stefan Haack (https://shaack.com)
 * Repository: https://github.com/shaack/reboot-cms
 * License: MIT, see file 'LICENSE'
 */
/**  @var \Shaack\Reboot\Block $block */
?>
<section class="block block-hero">
    <div class="container-fluid max-width-lg">
            <a href="services" class="text-claim text-decoration-none font-monospace">
                > <span id="claim">_</span>
            </a>
            <img class="avatar" alt="" src="/assets/images/shaack.png"/>
    </div>
    <div class="separator-1"></div>
</section>
<script type="module">
    import {ShellWrite} from "/src/ShellWrite.js"

    const fortunes = [
        "Stefan Haack\nInformation Technology\nConsulting & Development"
    ]
    const fortune = fortunes[Math.floor(Math.random() * fortunes.length)];
    documentReady(() => {
        setTimeout(() => {
            new ShellWrite(document.getElementById("claim"), fortune)
        }, 200)
    })

    function documentReady(callback) {
        document.addEventListener("DOMContentLoaded", callback)
        if (document.readyState === "interactive" || document.readyState === "complete") {
            callback()
        }
    }
</script>