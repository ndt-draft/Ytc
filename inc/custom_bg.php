<?php
$header_bg_type = ot_get_option('ytc_header_bg_type');

if ($header_bg_type === 'normal')
    $header_bg = ot_get_option('ytc_header_bg', array());
else 
    $header_bg = array(
        'from' => ot_get_option('ytc_header_gradient_bg_from', '#f8f8f8'),
        'to'   => ot_get_option('ytc_header_gradient_bg_to', 'white')
    );

$layout = ot_get_option('ytc_layout', 'stretch');
$content_bg = ot_get_option('ytc_content_bg', array());
$body_bg = ot_get_option('ytc_body_bg', array());

$custom_bg = '';

ob_start();

if (!empty($header_bg) && $header_bg_type === 'normal') { ?>
    .logo-wrap {
        background-image: url(<?php echo $header_bg['background-image']; ?>);
        background-color: <?php echo $header_bg['background-color']; ?>;
        background-repeat: <?php echo $header_bg['background-repeat']; ?>;
        background-position: <?php echo $header_bg['background-position']; ?>;
        background-attachment: <?php echo $header_bg['background-attachment']; ?>;
    }
<?php } else { // gradient background ?>
    .logo-wrap {
        background: <?php echo $header_bg['from']; ?>;
        background: -webkit-gradient(linear, left top, left bottom, 
            from(<?php echo $header_bg['from']; ?>), 
            to(<?php echo $header_bg['to']; ?>));
        background: -webkit-linear-gradient(<?php echo $header_bg['from']; ?>, <?php echo $header_bg['to']; ?>);
        background: -moz-linear-gradient(center top, <?php echo $header_bg['from']; ?> 0%, <?php echo $header_bg['to']; ?> 100%);
        background: -moz-gradient(center top, <?php echo $header_bg['from']; ?> 0%, <?php echo $header_bg['to']; ?> 100%);
    }
<?php }

if ($layout === 'box') { ?>

    .content-wrap {
        padding-bottom: 40px;
    }    
    
    
    .content-inside {
        padding: 20px;
        background: white;
    }

    <?php
    if (!empty($body_bg)) { ?>
        body {
            background-image: url(<?php echo $body_bg['background-image']; ?>);
            background-color: <?php echo $body_bg['background-color']; ?>;
            background-repeat: <?php echo $body_bg['background-repeat']; ?>;
            background-position: <?php echo $body_bg['background-position']; ?>;
            background-attachment: <?php echo $body_bg['background-attachment']; ?>;
        }
    <?php }

    if (!empty($content_bg)) { ?>
        .content-wrap {
            background-image: url(<?php echo $content_bg['background-image']; ?>);
            background-color: <?php echo $content_bg['background-color']; ?>;
            background-repeat: <?php echo $content_bg['background-repeat']; ?>;
            background-position: <?php echo $content_bg['background-position']; ?>;
            background-attachment: <?php echo $content_bg['background-attachment']; ?>;
        }
    <?php }
}

$custom_bg = ob_get_clean();

echo '<style>' . $custom_bg . '</style>';