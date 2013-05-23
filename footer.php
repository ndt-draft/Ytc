    <footer class="main-footer">

        <div class="container">

            <div class="footer-sidebar row">
                <div class="footer-sidebar-column span4">
                    
                    <?php get_sidebar('footer-column-1'); ?>

                    <div class="row-fluid">
                        <div class="span6"><?php get_sidebar('small-footer-column-1'); ?></div>
                        <div class="span6"><?php get_sidebar('small-footer-column-2'); ?></div>
                    </div>

                </div> <!-- .footer-sidebar-column -->

                <div class="footer-sidebar-column span4">
                    
                    <?php get_sidebar('footer-column-2'); ?>

                    <div class="row-fluid">
                        <div class="span6"><?php get_sidebar('small-footer-column-3'); ?></div>
                        <div class="span6"><?php get_sidebar('small-footer-column-4'); ?></div>
                    </div>

                </div> <!-- .footer-sidebar-column -->

                <div class="footer-sidebar-column span4">
                    
                    <?php get_sidebar('footer-column-3'); ?>

                    <div class="row-fluid">
                        <div class="span6"><?php get_sidebar('small-footer-column-5'); ?></div>
                        <div class="span6"><?php get_sidebar('small-footer-column-6'); ?></div>
                    </div>

                </div> <!-- .footer-sidebar-column -->
            </div> <!-- .footer-sidebar .row -->

        </div> <!-- .container -->

    </footer> <!-- .main-footer -->

    <div class="footer-copyright-wrap">

        <div class="container">
            <div class="row">
                <div class="copyright-note span8">
                    <?php 
                    $footer_left_text = ot_get_option('footer_left_text');
                    
                    if (trim($footer_left_text) != '') :
                        print $footer_left_text;
                    else : ?>
                
                        <p>&copy; <?php echo date('Y'); ?> <a href=""><?php bloginfo('name'); ?></a>. <?php _e('All right reserved.', 'ytc'); ?></p>
                
                    <?php endif; ?>

                </div>

                <div class="copyright-note span4">
                    <?php 
                    $footer_right_text = ot_get_option('footer_right_text');
                    
                    if (trim($footer_right_text) != '') :
                        print $footer_right_text;
                    else : ?>
                
                        <a class="top-link" href="#top"><?php _e('Go to Top', 'ytc'); ?></a>
                    <?php endif; ?>
                    
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .footer-copyright -->

    <?php wp_footer(); ?>

    <!-- quick css -->
    <style>
        <?php echo ot_get_option('custom_css', ''); ?>
    </style>
    
    <!-- google analytics code -->
    <?php print ot_get_option('google_analytics_code', ''); ?>
</body>
</html>