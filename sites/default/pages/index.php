<?php
$fortunes = [
    "<< WAIT >>",
    "Imitation is the sincerest form of plagarism.",
    "Real Users find the one combination of bizarre input values that shuts down the system for days.",
    "If we spoke a different language, we would perceive a somewhat different world. -- Wittgenstein",
    "A few hours grace before the madness begins again.",
    "Nothing is illegal if one hundred businessmen decide to do it. -- Andrew Young",
    "What!?  Me worry? -- Alfred E. Newman",
    "\"Just the facts, Ma'am\" -- Joe Friday",
    "Are we live or on tape?",
    "Always do what cannot be wrong.",
    "It looks like it's up to me to save our skins. Get into that garbage chute, flyboy! -- Princess Leia Organa",
    "Drive defensively. Buy a tank.",
    "Life is a game. Money is how we keep score. -- Ted Turner",
    "Your mode of life will be changed for the better because of new developments.",
    "The important thing is not to stop questioning.",
    "1 + 1 = 3, for large values of 1.",
    "The Ranger isn't gonna like it, Yogi.",
    "WYSIWYG: What You See Is What You Get.",
    "Words are the voice of the heart.",
    "Experience is what causes a person to make new mistakes instead of old ones.",
    "Planning replaces coincidence by error.",
    "The sooner our happiness together begins, the longer it will last. -- Miramanee, \"The Paradise Syndrome\", stardate 4842.6",
    "If the meanings of \"true\" and \"false\" were switched, then this sentence would not be false.",
    "Creativity is no substitute for knowing what you are doing.",
    "He who has imagination without learning has wings but no feet.",
    "All the troubles you have will pass away very quickly.",
    "It's ten o'clock; do you know where your processes are?",
    "Rotten wood cannot be carved. -- Confucius, \"Analects\", Book 5, Ch. 9",
    "All generalizations are false, including this one. -- Mark Twain",
    "Give me enough medals, and I'll win any war. -- Napoleon",
    "Good salesmen and good repairmen will never go hungry. -- R.E. Schenk",
    "Ahead warp factor one, Mr. Sulu.",
    "You cannot achieve the impossible without attempting the absurd.",
    "QED.",
    "In theory there is no difference between theory and practice. In practice there is.",
    "If it's not tested, it doesn't work.",
    "A computer lets you make more mistakes faster than any other invention, with the possible exceptions of handguns and Tequilla.	-- Mitch Ratcliffe",
    "Opportunities multiply when you seize them. -- Sunzi",
    "Time = Good moves",
    "Do, or do not; there is no try.",
    "Happiness is the greatest good.",
    "I'd rather just believe that it's done by little elves running around.",
    "We'll pivot at warp 2 and bring all tubes to bear, Mr. Sulu!",
    "Put not your trust in money, but put your money in trust.",
    "You can observe a lot just by watching. -- Yogi Berra",
    "A complex system that works is invariably found to have evolved from a simple system that works.",
    "Each new user of a new system uncovers a new class of bugs. -- Kernighan",
    "For every complex problem there is an answer that is clear, simple and wrong."
];
?>
<a href="/services">
    <h1 class="big" id="name">
        Stefan Haack</h1>
    <p id="claim" style="visibility: hidden">
        <?php /* $fortunes[rand(0, count($fortunes) - 1)]; */ ?>
        Planning and development
    </p>
</a>
<script type="module">
    import {ShellWrite} from "./src/ShellWrite.js"

    // new ShellWrite(document.getElementById("name"))
    new ShellWrite(document.getElementById("claim"))
</script>