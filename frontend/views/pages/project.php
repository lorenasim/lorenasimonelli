<?php 
$project = get_project_by_id(get_the_ID());
?>

<main data-page="project">
    <!-- Video im gleichen Stil wie auf der Startseite -->
    <section data-module="hero_front">
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="<?= $project['video']['src'] ?>" type="video/mp4">
        </video>
    </section>

    <h1 class="title"><?= $project['title'] ?></h1>
    <h1 class="people"><?= $project['title'] ?></h1>
    <p class="bereich_title"><?= $project['bereich_title'] ?></p>
    
    <div class="project-content">
        <?= wpautop($project['text_story']) ?>
        <?= wpautop($project['text_people']) ?>
    </div>
</main>