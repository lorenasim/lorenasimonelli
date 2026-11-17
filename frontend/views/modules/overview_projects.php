<?php
$data = $args['data'] ?? [];
?>

<section data-module="overview_projects" id="work">
    <div class="intro">
        <img class="title_section" src="<?= $data['title_section']['src'] ?>" alt="<?= $data['title_section']['alt'] ?>">
        <?php if (!empty($data['subline'])) : ?>
            <p class="subline"><?= $data['subline'] ?></p>
        <?php endif; ?>
    </div>

    <div class="content">
        <div class="text">
            <?= wpautop($data['text']) ?>
        </div>

        <div class="projects">
            <?php foreach ($data['selection'] as $project_id) : ?>
                <?php get_template_part('frontend/views/teaser/project', null, ['id' => $project_id]); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
