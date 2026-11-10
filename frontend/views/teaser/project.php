<?php 
$id = $args['id'];
$project = get_project_by_id($id);
?>

 <a href="<?= $project['link'] ?>" target="_self">
    <h3><?= $project['title'] ?></h3>
    <img class="image" src="<?= $project['image']['src'] ?>" alt="<?= $project['image']['alt'] ?>">
</a>