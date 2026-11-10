<?php

// todo: Hier die Getter für die Globalen Informationen definieren. Getter macht man dann, wenn man etwas mehrfach machen möchte. Funktion machen, sprich getter.

function get_modules_overview_projects() {
    $title_section_id = carbon_get_post_meta($id, 'title_section');
    $title_section = get_media_by_id($title_section);
    js_log($title_section);
}

