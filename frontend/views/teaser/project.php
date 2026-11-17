<?php 
$id = $args['id'];
$project = get_project_by_id($id);
?>

<a href="<?= $project['link'] ?>" target="_self" class="project-link">
    <h3><?= with_dot($project['title']) ?></h3>
    <div class="media">
        <?php if ($project['image']) : ?>
            <img class="image" src="<?= $project['image']['src'] ?>" alt="<?= $project['image']['alt'] ?>" loading="lazy">
        <?php endif; ?>
        <span class="play" aria-hidden="true"></span>
    </div>
</a>
