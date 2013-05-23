<?php get_header(); ?>

<div class="content-wrap">
    <div class="content-inside container">

        <div class="row-fluid">
            <div class="articles span8">

                <?php get_template_part('content', 'notfound'); ?>

            </div> <!-- .articles -->

            <aside class="main-sidebar span4">
                <?php get_sidebar('fourohfour'); ?>
            </aside> <!-- .main-sidebar -->
        </div> <!-- end row -->
    </div> <!-- .container -->
</div> <!-- content-wrap -->


<?php get_footer(); ?>