<?php
add_shortcode('ytc_btn', 'ytc_btn');

function ytc_btn($atts, $content = null) {
    extract(shortcode_atts(
        array(
            'color' => 'red',
            'to' => ''
        ), $atts));

    return '<a href="'.$to.'" class="'.$color.'-btn">'.$content.'</a>';
}