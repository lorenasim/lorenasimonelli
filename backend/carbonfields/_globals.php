<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// -> Inhaltsfeld-Konfiguration der globalen Einstellungen des Themes
Container::make('theme_options', 'Globales')
    ->add_fields([
        field::make('image', 'logo','Logo'),
        field::make('image', 'logo2','Logo2'),
        field::make('complex', 'socials', 'Socials')
            ->add_fields([
                field::make('text', 'title', 'Titel'),
                field::make('text', 'link', 'Link'),
            ])
            ->set_header_template('<% if (title) { %><%- title %><% } %>')
            ->set_layout('tabbed-vertical'),
            // todo: Globale Inhaltsfelder hier ergänzen
    ]);
