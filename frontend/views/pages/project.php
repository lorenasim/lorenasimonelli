<?php
$project = get_project_by_id(get_the_ID());
?>

<main data-page="project">
    <video src="<?= $project['video']['src'] ?>" autoplay muted loop></video>
    <h1 class="title "><?= $project['title'] ?></h1>
    <p class="bereich_title"><?= $project['bereich_title'] ?></p>
    <div>
        <?= wpautop($project['text_story']) ?>
        <?= wpautop($project['text_people']) ?>
    <div
</main>
