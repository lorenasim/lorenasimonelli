<?php
$data = $args['data'] ?? [];
?>

<section data-module="overview_projects">
    <img class="title_section" src="<?= $data['title_section']['src'] ?>" alt="Titel Sektion">
    
    <div class="projects">
        <?php foreach ($data['selection'] as $project_id) : ?>
            <?php 
            get_template_part(
                'frontend/views/teaser/project',
                null,
                [
                    'id' => $project_id
                ]
            ); 
            ?>
        <?php endforeach; ?>
    </div>
</section>