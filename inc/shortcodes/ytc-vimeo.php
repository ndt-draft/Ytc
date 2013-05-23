<?php
add_shortcode('ytc_vimeo_embed', 'ytc_vimeo_embed');

function ytc_vimeo_embed($atts) {
    extract(shortcode_atts(
        array(
            'src' => '',
        ), $atts));


    $arr = preg_split('/http:\/\/(www.)?vimeo.com\//', $src);
    $src = $arr[1];

    return '<div class="video-container">'.
           '<iframe src="http://player.vimeo.com/video/' . $src . '?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'

           .'</div>';


}