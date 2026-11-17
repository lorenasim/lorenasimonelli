<?php

function get_project_by_id(int $id): array {
    //collect data
    $title = get_the_title($id);
    $image_id = carbon_get_post_meta($id, 'image');
    $image = $image_id ? get_media_by_id($image_id, 'large') : false;

    // Hier holen wir die Video-ID und wandeln sie direkt in ein Media-Array um (wie bei den anderen Modulen)
    $video_id = carbon_get_post_meta($id, 'video');
    $video = $video_id ? get_media_by_id($video_id) : false;

    $bereich_title = carbon_get_post_meta($id, 'bereich_title');
    $behind_title = carbon_get_post_meta($id, 'behind_title');
    $text_story = carbon_get_post_meta($id, 'text_story');
    $text_people = carbon_get_post_meta($id, 'text_people');
    $link = get_permalink($id);
    
    //return data
    return [
        'title' => $title,
        'image' => $image,
        'video' => $video, 
        'bereich_title' => $bereich_title,
        'behind_title' => $behind_title,
        'text_story' => $text_story,
        'text_people' => $text_people,
        'link' => $link
    ];
}
 