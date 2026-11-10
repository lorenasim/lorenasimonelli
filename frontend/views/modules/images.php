<?php
$data = $args['data'];
?>

<section data-module="images">
    <div class="gallery">
        <?php foreach ($data['images'] as $image) : ?>
            <img src="<?= $image['src'] ?>" alt="">
        <?php endforeach; ?>
    </div>
</section>
