<?php
add_shortcode('ytc_widget_btn_group', 'ytc_widget_btn_group');

function ytc_widget_btn_group($atts, $content = null) {
    return  '<div class="widget-btn-group">' . 
                do_shortcode($content) . 
            '</div> <!-- .widget-btn-group -->';
}

add_shortcode('ytc_widget_btn', 'ytc_widget_btn');

function ytc_widget_btn($atts, $content = null) {
    extract(shortcode_atts(
        array(
            'color' => 'red',
            'to' => ''
        ), $atts)); 

    $color .= '-bg';
        
    return '<a href="'.$to.'" class="widget-btn '.$color.'">'.$content.'</a>';   
}

add_shortcode('ytc_widget_btn_full', 'ytc_widget_btn_full');

function ytc_widget_btn_full($atts, $content = null) {
    extract(shortcode_atts(
        array(
            'color' => 'red',
            'to' => ''
        ), $atts)); 

    $color .= '-bg';
        
    return '<a href="'.$to.'" class="widget-btn-full '.$color.'">'.$content.'</a>';   
}