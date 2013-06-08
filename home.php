<?php get_header(); ?>

    <div class="content-wrap">
        <div class="content-inside container">

            <div class="row-fluid">
                <div class="articles span8">

                    <?php 
                    $display_home_slider = ot_get_option('display_home_slider');
                    $sliders = ot_get_option('ytc_home_slider', array());

                    if (!empty($sliders) && $display_home_slider == 'true') {
                        require(get_template_directory() . '/inc/featured-slider/featured-slider.php'); 
                    }
                    ?>

                    <div class="column-sidebar-wrap row-fluid">

                        <!-- HOMEPAGE FIRST COLUMN SIDEBAR  -->
                        <aside class="column-sidebar span6">
                            
                            <?php get_sidebar('column-1'); ?>

                        </aside> <!-- column-sidebar -->

                        <!-- HOMEPAGE SECOND COLUMN SIDEBAR  -->
                        <aside class="column-sidebar span6">

                            <?php get_sidebar('column-2'); ?>

                        </aside> <!-- .column-sidebar -->

                    </div>

                </div> <!-- .articles -->

                <aside class="main-sidebar span4">

                    <?php get_sidebar('home'); ?>

                </aside> <!-- .main-sidebar -->
            </div> <!-- end row -->
        </div> <!-- .container -->
    </div> <!-- content-wrap -->


<?php get_footer(); ?>