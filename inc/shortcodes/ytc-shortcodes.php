<?php
// button
require_once(get_template_directory() . '/inc/shortcodes/ytc-button.php');

// youtube embed
require_once(get_template_directory() . '/inc/shortcodes/ytc-youtube.php');

// video embed
require_once(get_template_directory() . '/inc/shortcodes/ytc-vimeo.php');

// columns paragraph
require_once(get_template_directory() . '/inc/shortcodes/ytc-columns-paragraph.php');

// clearfix
require_once(get_template_directory() . '/inc/shortcodes/ytc-clearfix.php');

// widget button
require_once(get_template_directory() . '/inc/shortcodes/ytc-widget-button.php');

// do shortcodes in textwidget
add_filter('widget_text', 'do_shortcode');
