<a href="services">
    <h1 class="big" id="name">
        Stefan Haack</h1>
    <p id="claim">_</p>
</a>
<script type="module">
    import {ShellWrite} from "./src/ShellWrite.js"
    const fortunes = [
        // "“I didn’t have time to write a short letter, so I wrote a long one instead.” – Mark Twain",
        "“Less is more.” — Mies van der Rohe",
        // "Simplicity is your friend.",
        // "”Everything should be made as simple as possible, but not simpler.” – Einstein",
        /*
        "You cannot achieve the impossible without attempting the absurd.",
        "Good salesmen and good repairmen will never go hungry.",
        "If it's not tested, it doesn't work.",
        "All the troubles you have will pass away very quickly.",
        "Do, or do not; there is no try.",
        "A complex system that works is invariably found to have evolved from a simple system that works.",
        "Happiness is the greatest good.",
        "Opportunities multiply when you seize them."
         */
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