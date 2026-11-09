
<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Projekt')
    ->where('post_type', '=', 'project')
    ->add_fields([
        Field::make('image', 'image', 'Bild'),

        Field::make('file', 'video', 'Video')
            ->set_type('video'),

        Field::make('text', 'title', 'Titel')
            ->set_required(),

        Field::make('text', 'bereich_title', 'Bereich')
            ->set_required(),

        Field::make('text', 'behind_title', 'Titel Behind the project')
            ->set_required(),

        Field::make('rich_text', 'text_story', 'Text Story')
            ->set_required(),

        Field::make('rich_text', 'text_people', 'Text People')
            ->set_required(),
    ]);
