<?php
add_shortcode('ytc_youtube_embed', 'ytc_youtube_embed');

function ytc_youtube_embed($atts) {
    extract(shortcode_atts(
        array(
            'src' => '',
        ), $atts));

    $arr = preg_split("/http:\/\/(www.)?youtube.com\/watch\?v=/", $src);

    $src = 'http://www.youtube.com/embed/' . $arr[1];

    return '<div class="video-container">' .
                            
                '<iframe width="560" height="315" src="'.$src.'" frameborder="0" allowfullscreen></iframe>' .

            '</div>';
}