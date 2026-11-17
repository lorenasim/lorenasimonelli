<?php
$data = $args['data'];
?>

<section data-module="about">
    <img class="headline_image" src="<?= $data['headline_image']['src'] ?>" alt="<?= $data['headline_image']['alt'] ?>">
    <img class="image" src="<?= $data['image']['src'] ?>" alt="<?= $data['image']['alt'] ?>">
    <p class="subline"><?= $data['subline'] ?></p>
    <div class="about-text">
        <?= wpautop($data['text']) ?>
    </div>
</section>