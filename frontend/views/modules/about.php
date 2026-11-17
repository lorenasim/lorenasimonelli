<?php
$data = $args['data'];
?>

<section data-module="about" id="about">
    <img class="image" src="<?= $data['image']['src'] ?>" alt="<?= $data['image']['alt'] ?>" loading="lazy">

    <div class="about-text">
        <?= wpautop($data['text']) ?>
    </div>

    <div class="heading">
        <img class="headline_image" src="<?= $data['headline_image']['src'] ?>" alt="<?= $data['headline_image']['alt'] ?>">
        <p class="subline"><?= $data['subline'] ?></p>
    </div>
</section>
