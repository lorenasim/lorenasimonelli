<?php 
$project = get_project_by_id(get_the_ID());
$behind_title = $project['behind_title'] ?: 'Behind the project.';
?>

<main data-page="project">
    <section class="project-hero">
        <?php if ($project['video'] && !empty($project['video']['src'])) : ?>
            <!-- Video: zuerst Vorschaubild mit Play-Button, beim Klick startet das Video mit Ton -->
            <div class="project-player" data-player>
                <video class="hero-media" preload="metadata" playsinline
                    <?php if ($project['image']) : ?>poster="<?= esc_url($project['image']['src']) ?>"<?php endif; ?>>
                    <source src="<?= esc_url($project['video']['src']) ?>" type="video/mp4">
                </video>
                <button class="play-button" type="button" aria-label="Video abspielen">
                    <span aria-hidden="true"></span>
                </button>
            </div>
        <?php elseif ($project['image']) : ?>
            <img class="hero-media" src="<?= esc_url($project['image']['src']) ?>" alt="<?= esc_attr($project['image']['alt']) ?>">
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
