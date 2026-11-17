<?php 
$project = get_project_by_id(get_the_ID());
$behind_title = $project['behind_title'] ?: 'Behind the project.';
?>

<main data-page="project">
    <section class="project-hero">
        <?php if ($project['video'] && !empty($project['video']['src'])) : ?>
            <video class="hero-media" autoplay muted loop playsinline
                <?php if ($project['image']) : ?>poster="<?= $project['image']['src'] ?>"<?php endif; ?>>
                <source src="<?= $project['video']['src'] ?>" type="video/mp4">
            </video>
        <?php elseif ($project['image']) : ?>
            <img class="hero-media" src="<?= $project['image']['src'] ?>" alt="<?= $project['image']['alt'] ?>">
        <?php endif; ?>
    </section>

    <div class="project-head">
        <h1 class="title"><?= with_dot($project['title']) ?></h1>
        <p class="bereich_title"><?= $project['bereich_title'] ?></p>
    </div>

    <span class="divider" aria-hidden="true"></span>

    <h2 class="behind-title"><?= $behind_title ?></h2>

    <div class="project-content">
        <?php if ($project['text_story']) : ?>
            <div class="block block--story">
                <h3>Story.</h3>
                <?= wpautop($project['text_story']) ?>
            </div>
        <?php endif; ?>

        <?php if ($project['text_people']) : ?>
            <div class="block block--people">
                <h3>People.</h3>
                <?= wpautop($project['text_people']) ?>
            </div>
        <?php endif; ?>
    </div>
</main>
