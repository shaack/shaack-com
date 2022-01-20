<?php
$quotes = [
    // "Simplicity is your friend",
    "Everything should be made as simple as possible, but not simpler."
];
?>
<a href="/services">
    <h1 class="big" id="name">
        Stefan Haack</h1>
    <p id="claim" style="visibility: hidden">
        <?= $quotes[rand(0, count($quotes) - 1)]; ?>
    </p>
</a>
<script type="module">
    import {ShellWrite} from "./src/ShellWrite.js"

    new ShellWrite(document.getElementById("claim"))
</script>