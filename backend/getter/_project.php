<?php

function get_project_by_id(int $id): array {
    //collect data
    $title = get_the_title($id);
    $image_id = carbon_get_post_meta($id, 'image');
    $image = get_media_by_id($image_id);
    $bereich_title = carbon_get_post_meta($id, 'bereich_title');
    $bereich_title = carbon_get_post_meta($id, 'bereich_title');
    $behind_title = carbon_get_post_meta($id, 'behind_title');
    $text_story = carbon_get_post_meta($id, 'text_story');
    $text_people = carbon_get_post_meta($id, 'text_people');
    $link = get_permalink($id);
    
    //return data
    return [
        'title' => $title,
        'image' => $image,
        'bereich_title' => $bereich_title,
        'behind_title' => $behind_title,
        'text_story' => $text_story,
        'text_people' => $text_people,
        'link' => $link
    ];
}
 