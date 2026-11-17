<?php

// Getter für die globalen Informationen (Backend → Globales)

function get_globals_logo() {
    $logo_id = carbon_get_theme_option('logo');
    return get_media_by_id($logo_id, 'full');
}

function get_globals_logo2() {
    $logo2_id = carbon_get_theme_option('logo2');
    if (!$logo2_id) {
        return false;
    }
    return get_media_by_id($logo2_id, 'full');
}

function get_globals_email(): string|false {
    $email = carbon_get_theme_option('email');
    if (!$email) {
        return false;
    }
    return $email;
}

function get_globals_socials(): array {
    $socials = carbon_get_theme_option('socials');
    return $socials ?: [];
}
