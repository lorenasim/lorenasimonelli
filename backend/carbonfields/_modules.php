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
                // Hier wird die ID des Bildes in ein Medien-Array mit 'src' umgewandelt
                if (!empty($module['title_section'])) {
                    $module['title_section'] = get_media_by_id($module['title_section'], 'full');
                }
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
