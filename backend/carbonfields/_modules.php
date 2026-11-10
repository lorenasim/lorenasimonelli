<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// -> Konfiguration der verschiedenen Module
Container::make('post_meta', 'Module')
    ->where('post_type', '=', 'page')
    ->add_fields([
        Field::make('complex', 'modules', 'Module')
            // -> example
            ->add_fields('example', 'Beispiel', [
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('image', 'image', 'Bild')->set_required(),
            ])
            // hero_front
            ->add_fields('hero_front', 'Hero Startseite', [
                Field::make('file', 'video_startseite', 'Video Startseite')->set_type('video'),

            ])

            // overview_projects
            ->add_fields('overview_projects', 'Übersicht Projekte', [
                Field::make('image', 'title_section', 'Titel')->set_required(),
                Field::make('association', 'selection', 'Auswahl Projekte')
                ->set_types([
                        [
                        'type'      => 'post',
                        'post_type' => 'project',
                        ]
                
                        ])
            ])
            // Text
            ->add_fields('text', 'Text', [
                Field::make('text', 'title', 'Titel'),
                Field::make('rich_text', 'text', 'Text')
                ])

            // Bilder
            ->add_fields('images', 'Bilder', [
                Field::make('media_gallery', 'images', 'Bilder')

                ])

            // Videos
            ->add_fields('file', 'Video', [
                Field::make('file', 'video', 'Video')->set_type('video'),

                ])
                
            // todo: add new modules here
            // -> SETTINGS
            ->set_layout('tabbed-vertical')
    ]);

// -> Funktion, um die Module und die entsprechenden Templates auf der Seite zu laden
function render_modules (): void {
    $modules = carbon_get_the_post_meta('modules');
    if (empty($modules)) {
        return;
    }
    foreach ($modules as $module) {
        // -> Modifiziere die Daten des Moduls, falls nötig, basierend auf dem Modultyp
        switch ($module['_type']) {
            case 'example':
                $module['image'] = get_media_by_id($module['image'], 'full');
                break;

            case 'hero_front':
                $module['video_startseite'] = get_media_by_id($module['video_startseite']);
                break;

            case 'overview_projects':
                $module['selection'] = array_map(function ($item) {
                    return (int) $item ['id'];
                }, $module['selection']);
                $module['title_section'] = get_media_by_id($module['title_section'], 'full');
                break;

            case 'images':
                $module['images'] = array_map(function ($id) {
                    return get_media_by_id($id, 'full');
                }, $module['images']);
                break;

            case 'file':
                $module['video'] = get_media_by_id($module['video']);
                break;
        }
        
        // -> Laden des Templates basierend auf dem Modultyp und weitergeben der Daten
        get_template_part(
            'frontend/views/modules/' . $module['_type'],
            null,
            [
                'data' => $module
            ]
        );
    }
}