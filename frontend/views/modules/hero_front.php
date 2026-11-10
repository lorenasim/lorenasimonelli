<?php
$data = $args['data'];
//hier kommt mein Startseiten Hero rein
?>
<section data-module="hero_front">

<video class="hero-video" autoplay muted loop playsinline>
        <source src="<?= $data['video_startseite']['src'] ?? $data['video_startseite']; ?>" type="video/mp4">
        Dein Browser unterstützt kein Video-Tag.
    </video>

</section>