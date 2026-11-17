<?php
$data = $args['data'];
$video = $data['video_startseite'] ?? false;
?>

<section data-module="hero_front">
    <?php if ($video && !empty($video['src'])) : ?>
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="<?= $video['src'] ?>" type="video/mp4">
        </video>
    <?php endif; ?>
</section>
