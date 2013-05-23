<?php 
function colourBrightness($hex, $percent) {
    // Work out if hash given
    $hash = '';
    if (stristr($hex,'#')) {
        $hex = str_replace('#','',$hex);
        $hash = '#';
    }
    /// HEX TO RGB
    $rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
    //// CALCULATE
    for ($i=0; $i<3; $i++) {
        // See if brighter or darker
        if ($percent > 0) {
            // Lighter
            $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
        } else {
            // Darker
            $positivePercent = $percent - ($percent*2);
            $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
        }
        // In case rounding up causes us to go to 256
        if ($rgb[$i] > 255) {
            $rgb[$i] = 255;
        }
    }
    //// RBG to Hex
    $hex = '';
    for($i=0; $i < 3; $i++) {
        // Convert the decimal digit to hex
        $hexDigit = dechex($rgb[$i]);
        // Add a leading zero if necessary
        if(strlen($hexDigit) == 1) {
        $hexDigit = "0" . $hexDigit;
        }
        // Append to the hex string
        $hex .= $hexDigit;
    }
    return $hash.$hex;
}

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

$custom_styles = ot_get_option('ytc_custom_style');

foreach ($custom_styles as $custom_style) {
    break;
}

$body_bg = $custom_style['ytc_body_background'];
$body_text_color = $custom_style['ytc_body_text_color'];

$heading_text_color = $custom_style['ytc_heading_color'];

$link_color = $custom_style['ytc_link_color'];
$link_hover_color = $custom_style['ytc_link_hover_color'];

$border_color = $custom_style['ytc_border_color'];

$logo_text_color = $custom_style['ytc_logo_text_color'];
$logo_text_hover_color = $custom_style['ytc_logo_text_hover_color'];
$site_des_text_color = $custom_style['ytc_site_des_text_color'];

$top_menu_bg = $custom_style['ytc_top_menu_background'];
$top_menu_link_color = $custom_style['ytc_top_menu_link_color'];
$top_menu_link_hover_color = $custom_style['ytc_top_menu_link_hover_color'];

$main_menu_bg = $custom_style['ytc_main_menu_background'];
$main_menu_link_color = $custom_style['ytc_main_menu_link_color'];
$main_menu_link_hover_color = $custom_style['ytc_main_menu_link_hover_color'];
$main_menu_link_bg_hover_color = $custom_style['ytc_main_menu_link_background_hover_color'];

$footer_bg = $custom_style['ytc_footer_bg'];
$footer_text_color = $custom_style['ytc_footer_text_color'];
$footer_heading_color = $custom_style['ytc_footer_heading_text_color'];
$footer_link_color = $custom_style['ytc_footer_link_color'];
$footer_link_hover_color = $custom_style['ytc_footer_link_hover_color'];

$content_inside_bg_color = $custom_style['ytc_content_inside_bg_color'];

ob_start();
?>

<style>
/* body custom style */
body {
    background-image: url(<?php echo $body_bg['background-image']; ?>);
    background-attachment: <?php echo $body_bg['background-attachment']; ?>;
    background-repeat: <?php echo $body_bg['background-repeat']; ?>;
    background-position: <?php echo $body_bg['background-position']; ?>;
    background-color: <?php echo $body_bg['background-color']; ?>;
    color: <?php echo $body_text_color; ?>;
}

/* heading custom style */
h1, h2, h3, h4, h5, h6,
.article-preview-content header h2 a {
    color: <?php echo $heading_text_color; ?>
}

/* link color */
a,

/* category widget */
.category-post-widget a,
.category-post-widget .recent-category-post .more-post a {
    color: <?php echo $link_color; ?>;
}

a:hover,
.article-preview-content header h2 a:hover,

/* category post widget more post */
.category-post-widget .recent-category-post .more-post a:hover {
    color: <?php echo $link_hover_color; ?>;
}

/* form input */
form input[type="text"],
form input[type="password"],
form textarea {
    color: <?php echo $body_text_color; ?>;
}

/* logo custom style */
.site-name a {
    color: <?php echo $logo_text_color; ?>;
}
.site-name a:hover {
    color: <?php echo $logo_text_hover_color; ?>;
}

.site-description {
    color: <?php echo $site_des_text_color; ?>;
}


/* price in shop page */
.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,
.woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins,
/* price in single product page */
.woocommerce div.product span.price, .woocommerce-page div.product span.price, .woocommerce #content div.product span.price, .woocommerce-page #content div.product span.price, .woocommerce div.product p.price, .woocommerce-page div.product p.price, .woocommerce #content div.product p.price, .woocommerce-page #content div.product p.price,
.woocommerce div.product span.price ins, .woocommerce-page div.product span.price ins, .woocommerce #content div.product span.price ins, .woocommerce-page #content div.product span.price ins, .woocommerce div.product p.price ins, .woocommerce-page div.product p.price ins, .woocommerce #content div.product p.price ins, .woocommerce-page #content div.product p.price ins {
    
    color: <?php echo $link_hover_color; ?>;
}

/* body text color for sale price */
/* sale price in shop page */
.woocommerce ul.products li.product .price del, .woocommerce-page ul.products li.product .price del,

/* sale price single product page */
.woocommerce div.product span.price del, .woocommerce-page div.product span.price del, .woocommerce #content div.product span.price del, .woocommerce-page #content div.product span.price del, .woocommerce div.product p.price del, .woocommerce-page div.product p.price del, .woocommerce #content div.product p.price del, .woocommerce-page #content div.product p.price del {

    color: <?php echo $body_text_color; ?>;
}


/* top menu */
.top-menu-wrap {
    background-image: url(<?php echo $top_menu_bg['background-image']; ?>);
    background-attachment: <?php echo $top_menu_bg['background-attachment']; ?>;
    background-repeat: <?php echo $top_menu_bg['background-repeat']; ?>;
    background-position: <?php echo $top_menu_bg['background-position']; ?>;
    background-color: <?php echo $top_menu_bg['background-color']; ?>;
}

.top-menu-navigation a {
    color: <?php echo $top_menu_link_color; ?>;
}

.top-menu-navigation ul li a:hover,
.top-menu-navigation ul .current-menu-item a {
    color: <?php echo $top_menu_link_hover_color; ?>;
}

.top-menu-navigation ul li ul {
    background-color: <?php echo $top_menu_bg['background-color']; ?>;
    border-color: <?php echo colourBrightness($top_menu_bg['background-color'], -0.8); ?>;
}

.top-menu-navigation ul li ul li a {
    color: <?php echo $top_menu_link_color; ?>;
    border-color: <?php echo colourBrightness($top_menu_bg['background-color'], 0.9); ?>;
}

.top-menu-navigation ul li ul li a:hover {
    background-color: <?php echo colourBrightness($top_menu_bg['background-color'], 0.95); ?>;
    color: <?php echo $top_menu_link_hover_color; ?>;
}

.top-menu-navigation ul .current-menu-item li a {
    color: <?php echo $top_menu_link_color; ?>;
}

/* footer copyright */
.footer-copyright-wrap {
    color: <?php echo $top_menu_link_color; ?>;
    background-color: <?php echo $top_menu_bg['background-color']; ?>;
    border-top: 1px solid <?php echo colourBrightness($top_menu_bg['background-color'], 0.93); ?>;
}

.footer-copyright-wrap a {
    color: <?php echo $top_menu_link_hover_color; ?>;
}


/*******************************************************************************
 * MAIN MENU
 ******************************************************************************/
/* main menu background */
.main-menu-navigation {
    background-image: url(<?php echo $main_menu_bg['background-image']; ?>);
    background-attachment: <?php echo $main_menu_bg['background-attachment']; ?>;
    background-repeat: <?php echo $main_menu_bg['background-repeat']; ?>;
    background-position: <?php echo $main_menu_bg['background-position']; ?>;
    background-color: <?php echo $main_menu_bg['background-color']; ?>;
}

/* main menu link */
.main-menu-navigation a {
    color: <?php echo $main_menu_link_color; ?>;
}

.main-menu-navigation ul li a:hover,
.main-menu-navigation ul .current-menu-item a {
    color: <?php echo $main_menu_link_hover_color; ?>;
    background-color: <?php echo $main_menu_link_bg_hover_color; ?>;
}

.main-menu-navigation ul .current-menu-item li a {
    color: <?php echo $main_menu_link_color; ?>;
    background-color: <?php echo $main_menu_bg['background-color']; ?>;
}

/* sub menu */
.main-menu-navigation ul li ul {
    background-color: <?php echo $main_menu_bg['background-color']; ?>;
    border-color: <?php echo colourBrightness($main_menu_bg['background-color'], -0.92); ?>;
}

/* sub menu link */
.main-menu-navigation ul li ul li a {
    border-color: <?php echo colourBrightness($main_menu_bg['background-color'], 0.9); ?>;
}

.main-menu-navigation ul li ul li a:hover {
    color: <?php echo $main_menu_link_hover_color; ?>;
    background-color: <?php echo colourBrightness($main_menu_bg['background-color'], 0.95); ?>;
}

/* button */
form input[type="submit"],
.tag-container a,
.woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button {
    color: <?php echo $main_menu_link_color; ?>;
    background-color: <?php echo $main_menu_bg['background-color']; ?>;
}

form input[type="submit"]:hover,
.tag-container a:hover,
.woocommerce a.button:hover, .woocommerce-page a.button:hover, .woocommerce button.button:hover, .woocommerce-page button.button:hover, .woocommerce input.button:hover, .woocommerce-page input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce-page #respond input#submit:hover, .woocommerce #content input.button:hover, .woocommerce-page #content input.button:hover {
    background-color: <?php echo colourBrightness($main_menu_bg['background-color'], 0.95); ?>
}

.woocommerce a.add_to_cart_button,
.woocommerce-page a.add_to_cart_button,
.woocommerce a.product_type_grouped,
.woocommerce-page a.product_type_grouped,
.woocommerce a.product_type_variable,
.woocommerce-page a.product_type_variable,
.woocommerce a.product_type_external,
.woocommerce-page a.product_type_external {
    color: <?php echo $main_menu_link_color; ?>;
    <?php if ($main_menu_bg['background-color'] != '') : ?>
        border: none;       
    <?php endif; ?>
}

.woocommerce a.button.loading, .woocommerce-page a.button.loading, .woocommerce button.button.loading, .woocommerce-page button.button.loading, .woocommerce input.button.loading, .woocommerce-page input.button.loading, .woocommerce #respond input#submit.loading, .woocommerce-page #respond input#submit.loading, .woocommerce #content input.button.loading, .woocommerce-page #content input.button.loading {
    color: <?php echo colourBrightness($main_menu_link_hover_color, 0.8); ?>;;
    
    <?php if ($main_menu_bg['background-color'] != '') : ?>
        border: none;
    <?php endif; ?>
}

/* featured slider caption */
.flex-caption {
    color: <?php echo $main_menu_link_hover_color; ?>;
}

<?php 
if ($main_menu_bg['background-color'] != '')
    $caption_bg = hex2rgb($main_menu_bg['background-color']); 
else 
    $caption_bg = array('','',''); ?>

.slidertext, .slidertitle {
    background: <?php echo 'rgba(' . $caption_bg[0] . ',' . 
                        $caption_bg[1] . ',' . 
                        $caption_bg[2] . ',0.5)'; ?>; 
}

.flex-control-paging li a {
    background: <?php echo 'rgba(' . $caption_bg[0] . ',' . 
                        $caption_bg[1] . ',' . 
                        $caption_bg[2] . ',0.5)'; ?>; 
}

.flex-control-paging li a.flex-active,
.flex-control-paging li a:hover {
    background: <?php echo $main_menu_bg['background-color']; ?>; 
}




/*******************************************************************************
 * FOOTER SIDEBAR
 ******************************************************************************/
.main-footer {
    background-image: url(<?php echo $footer_bg['background-image']; ?>);
    background-attachment: <?php echo $footer_bg['background-attachment']; ?>;
    background-repeat: <?php echo $footer_bg['background-repeat']; ?>;
    background-position: <?php echo $footer_bg['background-position']; ?>;
    background-color: <?php echo $footer_bg['background-color']; ?>;
    color: <?php echo $footer_text_color; ?>;
    border-top-color: <?php echo colourBrightness($footer_bg['background-color'], -0.95); ?>;
    border-bottom: 1px solid <?php echo colourBrightness($footer_bg['background-color'], -0.93); ?>;
}

.main-footer a {
    color: <?php echo $footer_link_color; ?>;
}

.main-footer a:hover {
    color: <?php echo $footer_link_hover_color; ?>;
}

.main-footer h1,
.main-footer h2,
.main-footer h3,
.main-footer h4,
.main-footer h5,
.main-footer h6 {
    color: <?php echo $footer_heading_color; ?>;    
}

.woocommerce .main-footer  ul.cart_list li, 
.woocommerce-page .main-footer  ul.cart_list li, 
.woocommerce .main-footer ul.product_list_widget li, 
.woocommerce-page .main-footer ul.product_list_widget li {
    border-color: <?php echo colourBrightness($footer_bg['background-color'], 0.93); ?>;
}


/*******************************************************************************
 * CONTENT INSIDE
 ******************************************************************************/
.content-inside,
form input[type="text"],
form input[type="password"],
form textarea,

/* cart page */
.woocommerce .quantity input.qty, .woocommerce-page .quantity input.qty, .woocommerce #content .quantity input.qty, .woocommerce-page #content .quantity input.qty,
.woocommerce .quantity .plus, .woocommerce-page .quantity .plus, .woocommerce #content .quantity .plus, .woocommerce-page #content .quantity .plus, .woocommerce .quantity .minus, .woocommerce-page .quantity .minus, .woocommerce #content .quantity .minus, .woocommerce-page #content .quantity .minus,
.woocommerce .quantity .plus:hover, .woocommerce-page .quantity .plus:hover, .woocommerce #content .quantity .plus:hover, .woocommerce-page #content .quantity .plus:hover, .woocommerce .quantity .minus:hover, .woocommerce-page .quantity .minus:hover, .woocommerce #content .quantity .minus:hover, .woocommerce-page #content .quantity .minus:hover,

/* coupon form */
.woocommerce table.cart td.actions .coupon .input-text, .woocommerce-page table.cart td.actions .coupon .input-text, .woocommerce #content table.cart td.actions .coupon .input-text, .woocommerce-page #content table.cart td.actions .coupon .input-text,

/* sort form */
.woocommerce .woocommerce-ordering select, .woocommerce-page .woocommerce-ordering select,

/* menu selection */
.main-menu-selection,
.top-menu-selection,

/* category post widget more post */
.category-post-widget .recent-category-post .more-post a:hover
{
    background-color: <?php echo $custom_style['ytc_content_inside_bg_color']; ?>;
}


/*******************************************************************************
 * BORDER COLOR
 *******************************************************************************/
.content-inside, 
form input[type="text"], 
form input[type="password"], 
form textarea,
.post-content,
.commentslist article,
.commentslist article header,

/* border bottom for list */
.woocommerce ul.cart_list li, .woocommerce-page ul.cart_list li, .woocommerce ul.product_list_widget li, .woocommerce-page ul.product_list_widget li,

/*cart page */ 
.woocommerce table.shop_table, .woocommerce-page table.shop_table,
.woocommerce table.shop_table td, .woocommerce-page table.shop_table td,

/* plus, minus button */
.woocommerce .quantity input.qty, .woocommerce-page .quantity input.qty, .woocommerce #content .quantity input.qty, .woocommerce-page #content .quantity input.qty,
.woocommerce .quantity .plus, .woocommerce-page .quantity .plus, .woocommerce #content .quantity .plus, .woocommerce-page #content .quantity .plus, .woocommerce .quantity .minus, .woocommerce-page .quantity .minus, .woocommerce #content .quantity .minus, .woocommerce-page #content .quantity .minus,

/* coupon form */
.woocommerce table.cart td.actions .coupon .input-text, .woocommerce-page table.cart td.actions .coupon .input-text, .woocommerce #content table.cart td.actions .coupon .input-text, .woocommerce-page #content table.cart td.actions .coupon .input-text,


/* post info  */
.post-info, .home-meta-comment-social,

/* combo widget */
.combo-widget .inside,
.combo-widget .tabs li a,
.combo-widget .tabs li a.selected,

/* sort form */
.woocommerce .woocommerce-ordering, .woocommerce-page .woocommerce-ordering,

/* menu selection */
.main-menu-selection,
.top-menu-selection,

/* category post widget */
.category-post-widget .category-post-container,
.category-post-widget .recent-category-post li a:first-child,


/* blog author */
.article-author,

/* related post */
.related-posts

{
    border-color: <?php echo $custom_style['ytc_border_color']; ?>;
}

/* comment count number color */
.commentslist article header::before {
    color: <?php echo $custom_style['ytc_border_color']; ?>;
}



/* plus, minus button color */
.woocommerce .quantity input.qty, .woocommerce-page .quantity input.qty, .woocommerce #content .quantity input.qty, .woocommerce-page #content .quantity input.qty,
.woocommerce .quantity .plus, .woocommerce-page .quantity .plus, .woocommerce #content .quantity .plus, .woocommerce-page #content .quantity .plus, .woocommerce .quantity .minus, .woocommerce-page .quantity .minus, .woocommerce #content .quantity .minus, .woocommerce-page #content .quantity .minus,

/* coupon form color */
.woocommerce table.cart td.actions .coupon .input-text, .woocommerce-page table.cart td.actions .coupon .input-text, .woocommerce #content table.cart td.actions .coupon .input-text, .woocommerce-page #content table.cart td.actions .coupon .input-text,

/* sort form */
.woocommerce .woocommerce-ordering select, .woocommerce-page .woocommerce-ordering select,

/* menu selection */
.main-menu-selection,
.top-menu-selection
{
    color: <?php echo $body_text_color; ?>;
}


/* category post widget arrow */
.category-post-widget .recent-category-post li a:before {
    content: none;
}



/* single product page */
.woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active {
    border-bottom-color: <?php echo $custom_style['ytc_content_inside_bg_color']; ?>;
}

.woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce-page div.product .woocommerce-tabs ul.tabs li, .woocommerce #content div.product .woocommerce-tabs ul.tabs li, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li,

.woocommerce div.product .woocommerce-tabs ul.tabs:before, .woocommerce-page div.product .woocommerce-tabs ul.tabs:before, .woocommerce #content div.product .woocommerce-tabs ul.tabs:before, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs:before,

.woocommerce table.shop_attributes, .woocommerce-page table.shop_attributes,
.woocommerce table.shop_attributes th, .woocommerce-page table.shop_attributes th,
.woocommerce table.shop_attributes td, .woocommerce-page table.shop_attributes td,
.woocommerce div.product div.social, .woocommerce-page div.product div.social, .woocommerce #content div.product div.social, .woocommerce-page #content div.product div.social,

.woocommerce div.product div.images img, .woocommerce-page div.product div.images img, .woocommerce #content div.product div.images img, .woocommerce-page #content div.product div.images img,

.woocommerce #reviews #comments ol.commentlist li .comment-text, .woocommerce-page #reviews #comments ol.commentlist li .comment-text

{
    border-color: <?php echo $border_color; ?>;
}


div.pp_woocommerce .pp_content_container {
    background-color: <?php echo $custom_style['ytc_content_inside_bg_color']; ?>;
}


/* price widget */
.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range {
    background-color: <?php echo $link_color; ?>;
}

.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle {
    background-color: <?php echo $main_menu_bg['background-color']; ?>; 
}

.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content, .woocommerce-page .widget_price_filter .price_slider_wrapper .ui-widget-content {
    background-color: <?php echo $border_color; ?>;
}


/* sale */
.woocommerce span.onsale, .woocommerce-page span.onsale {
    color: <?php echo $main_menu_link_hover_color; ?>; 
    background-color: <?php echo $main_menu_bg['background-color']; ?>; 
}


/* woocommerce message */
.woocommerce-message, .woocommerce-error, .woocommerce-info {
    color: <?php echo $body_text_color; ?>;
    background-color: <?php echo $custom_style['ytc_content_inside_bg_color']; ?>;
    border-color: <?php echo $border_color; ?>;
}


/* checkout page */
.woocommerce form.login, .woocommerce-page form.login, .woocommerce form.checkout_coupon, .woocommerce-page form.checkout_coupon, .woocommerce form.register, .woocommerce-page form.register,

.woocommerce-checkout .form-row .chzn-container-single .chzn-single

{
    border-color: <?php echo $border_color; ?>;
}

.woocommerce-checkout .form-row .chzn-container-single .chzn-single {
    display: none;
}

.woocommerce form .form-row select, .woocommerce-page form .form-row select {
    
    color: <?php echo $body_text_color; ?>;
    background: <?php echo $custom_style['ytc_content_inside_bg_color']; ?>;
    
    <?php if ($border_color != '') : ?>
        border: 1px solid <?php echo $border_color; ?>;
    <?php endif; ?>
}


.woocommerce #payment ul.payment_methods, .woocommerce-page #payment ul.payment_methods {
    border-color: <?php echo $border_color; ?>;
}

.woocommerce #payment, .woocommerce-page #payment {
    background: <?php echo $custom_style['ytc_content_inside_bg_color']; ?>;
    border-bottom-color: <?php echo $border_color; ?>;;
}

.woocommerce #payment div.payment_box, .woocommerce-page #payment div.payment_box {
    background: <?php echo $custom_style['ytc_content_inside_bg_color']; ?>;
    border-color: <?php echo $border_color; ?>;
}

.woocommerce #payment div.payment_box:after, .woocommerce-page #payment div.payment_box:after {
    content: none;
}



/* combo widget */
.combo-widget .tabs li a {
    color: <?php echo $heading_text_color; ?>;
}



/* shop paginate */
.woocommerce nav.woocommerce-pagination, .woocommerce-page nav.woocommerce-pagination, .woocommerce #content nav.woocommerce-pagination, .woocommerce-page #content nav.woocommerce-pagination,

.woocommerce nav.woocommerce-pagination ul, .woocommerce-page nav.woocommerce-pagination ul, .woocommerce #content nav.woocommerce-pagination ul, .woocommerce-page #content nav.woocommerce-pagination ul,

.woocommerce nav.woocommerce-pagination ul li, .woocommerce-page nav.woocommerce-pagination ul li, .woocommerce #content nav.woocommerce-pagination ul li, .woocommerce-page #content nav.woocommerce-pagination ul li
{
    border-color: <?php echo $border_color; ?>;
}

.woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li span.current, .woocommerce #content nav.woocommerce-pagination ul li span.current, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce-page nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus {
    color: <?php echo $body_text_color; ?>;
    background-color: <?php echo $custom_style['ytc_content_inside_bg_color']; ?>;
}

.woocommerce nav.woocommerce-pagination ul li a, .woocommerce-page nav.woocommerce-pagination ul li a, .woocommerce #content nav.woocommerce-pagination ul li a, .woocommerce-page #content nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce-page nav.woocommerce-pagination ul li span, .woocommerce #content nav.woocommerce-pagination ul li span, .woocommerce-page #content nav.woocommerce-pagination ul li span {
    color: <?php echo $link_color; ?>;
}



/* border for align */
.alignleft, .alignright, .aligncenter, .alignnone {
    border-color: <?php echo $border_color; ?>;
}


/* logo, slogan */


</style>


<?php $styles = ob_get_clean(); 
    echo $styles;
?>