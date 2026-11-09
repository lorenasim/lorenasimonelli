<?php
$data = $args['data'];
js_log($data);
?>

<section data-module="hero_front">
    <mark>Hier kommt mein Startseiten-Hero rein</mark>

<video class="hero-video" autoplay muted loop playsinline>
        <source src="<?= $data['video_startseite']['src'] ?? $data['video_startseite']; ?>" type="video/mp4">
        Dein Browser unterstützt kein Video-Tag.
    </video>

</section>