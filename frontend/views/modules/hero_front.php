<?php
$data = $args['data'];
$clips = $data['clips'] ?? [];
?>

<section data-module="hero_front">
    <?php foreach ($clips as $i => $clip) : ?>
        <video
            class="hero-video<?= $i === 0 ? ' is-active' : '' ?>"
            muted
            playsinline
            preload="<?= $i === 0 ? 'auto' : 'metadata' ?>"
            <?= count($clips) === 1 ? 'loop autoplay' : '' ?>
            data-start="<?= esc_attr($clip['start']) ?>"
            data-dauer="<?= esc_attr($clip['dauer']) ?>"
        >
            <source src="<?= esc_url($clip['src']) ?>" type="video/mp4">
        </video>
    <?php endforeach; ?>
</section>
