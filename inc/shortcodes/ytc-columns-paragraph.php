<?php
add_shortcode('ytc_columns', 'ytc_columns_paragraph');

function ytc_columns_paragraph($atts, $content = '') {

    return '<div class="row-fluid">'. do_shortcode($content) .'</div>';

}

// two columns
add_shortcode('ytc_one_half', 'ytc_one_half_paragraph');

function ytc_one_half_paragraph($atts, $content = '') {
    return '<div class="span6 one_half">'.$content.'</div>';
}


// three columns
add_shortcode('ytc_one_third', 'ytc_one_third_paragraph');

function ytc_one_third_paragraph($atts, $content = '') {
    return '<div class="span4 one_third">'.$content.'</div>';
}

add_shortcode('ytc_two_third', 'ytc_two_third_paragraph');

function ytc_two_third_paragraph($atts, $content = '') {
    return '<div class="span8 two_third">'.$content.'</div>';
}


// four columns 
add_shortcode('ytc_one_fourth', 'ytc_one_fourth_paragraph');

function ytc_one_fourth_paragraph($atts, $content = '') {
    return '<div class="span3 one_fourth">'.$content.'</div>';
}

add_shortcode('ytc_three_fourth', 'ytc_three_fourth_paragraph');

function ytc_three_fourth_paragraph($atts, $content = '') {
    return '<div class="span9 three_fourth">'.$content.'</div>';
}

// six columns
add_shortcode('ytc_one_sixth', 'ytc_one_sixth_paragraph');

function ytc_one_sixth_paragraph($atts, $content = '') {
    return '<div class="span2 one_sixth">' . $content . '</div>';
}

add_shortcode('ytc_five_sixth', 'ytc_five_sixth_paragraph');

function ytc_five_sixth_paragraph($atts, $content = '') {
    return '<div class="span10 five_sixth">' . $content . '</div>';
}

