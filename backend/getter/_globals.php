<?php

// todo: Hier die Getter für die Globalen Informationen definieren. Getter macht man dann, wenn man etwas mehrfach machen möchte. Funktion machen, sprich getter.

function get_globals_logo() {
    $logo_id = carbon_get_theme_option('logo');
    $logo = get_media_by_id($logo_id);
    return $logo;
}
