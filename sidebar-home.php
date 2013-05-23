<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-sidebar')) : ?>

    <div class="sidebar-widget">
        
        <h4><?php _e('Search', 'ytc'); ?></h4>

        <?php get_search_form(); ?>

    </div> <!-- .footer-sidebar-widget -->

<?php endif; ?>