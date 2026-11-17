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
                // Mehrere Videos, die abwechselnd je einen Ausschnitt zeigen
                Field::make('complex', 'videos', 'Videos (wechseln automatisch)')
                    ->add_fields([
                        Field::make('file', 'video', 'Video')->set_type('video')->set_required(),
                        Field::make('text', 'start', 'Start bei Sekunde')
                            ->set_attribute('type', 'number')
                            ->set_attribute('min', 0)
                            ->set_default_value(0)
                            ->set_width(50),
                        Field::make('text', 'dauer', 'Dauer in Sekunden')
                            ->set_attribute('type', 'number')
                            ->set_attribute('min', 1)
                            ->set_default_value(4)
                            ->set_width(50),
                    ])
                    ->set_header_template('Ausschnitt <%- $_index + 1 %>')
                    ->set_layout('tabbed-horizontal'),
                // Altes Einzelvideo bleibt als Fallback erhalten
                Field::make('file', 'video_startseite', 'Einzelnes Video (Fallback, wenn oben nichts erfasst ist)')->set_type('video'),
            ])

            // overview_projects
            ->add_fields('overview_projects', 'Übersicht Projekte', [
                Field::make('image', 'title_section', 'Titel')->set_required(),
                Field::make('text', 'subline', 'Subline (z. B. «Selected.»)'),
                Field::make('rich_text', 'text', 'Text / Kategorien')->set_required(),
                Field::make('association', 'selection', 'Auswahl Projekte')
                ->set_types([
                        [
                        'type'      => 'post',
                        'post_type' => 'project',
                        ]
                
                        ])
            ])

            // -> About me
            ->add_fields('about', 'About', [
                Field::make('image', 'headline_image', 'Titelbild')->set_required(),
                Field::make('image', 'image', 'Bild')->set_required(),
                Field::make('text', 'subline', 'Subline')->set_required(),
                Field::make('rich_text', 'text', 'Text')->set_required(),
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
                $clips = [];
                foreach ($module['videos'] ?? [] as $clip) {
                    $media = get_media_by_id($clip['video']);
                    if (!$media || empty($media['src'])) {
                        continue;
                    }
                    $clips[] = [
                        'src'   => $media['src'],
                        'start' => max(0, (float) ($clip['start'] ?? 0)),
                        'dauer' => max(1, (float) ($clip['dauer'] ?? 4)),
                    ];
                }
                // Fallback: altes Einzelvideo
                if (!$clips && !empty($module['video_startseite'])) {
                    $media = get_media_by_id($module['video_startseite']);
                    if ($media && !empty($media['src'])) {
                        $clips[] = ['src' => $media['src'], 'start' => 0, 'dauer' => 0];
                    }
                }
                $module['clips'] = $clips;
                break;

            case 'overview_projects':
                $module['selection'] = array_map(function ($item) {
                    return (int) $item['id'];
                }, $module['selection'] ?? []);
                $module['title_section'] = get_media_by_id($module['title_section'], 'full');
                break;

                case 'about':
                    $module['headline_image'] = get_media_by_id($module['headline_image'], 'full');
                    $module['image'] = get_media_by_id($module['image'], 'full');
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