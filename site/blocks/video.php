<section class="block block-video max-width-md mx-auto container-fluid">
    <video preload="none" class="shadow-lg" width="100%" autoplay muted>
        <source src="assets/videos/it-consulting.m4v" type="video/mp4"/>
        Your browser does not support the video tag.
    </video>
    <script>
        document.getElementsByTagName('video')[0].onended = function () {
            this.load()
            this.play()
        }
    </script>
</section>