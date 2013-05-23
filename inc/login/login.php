<?php
function ytc_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo ot_get_option( 'logo' ) ?>);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'ytc_login_logo' );

function ytc_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'ytc_login_logo_url' );

function ytc_login_logo_url_title() {
    return get_bloginfo('description');
}
add_filter( 'login_headertitle', 'ytc_login_logo_url_title' );