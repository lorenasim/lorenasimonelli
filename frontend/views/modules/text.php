<?php
$data = $args['data'];
?>

<section data-module="text">
    <h2><?= $data['title'] ?></h2>
    <div>
        <?= wpautop($data['text']) ?>
    </div>
</section>
