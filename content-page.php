<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->

    <div class="entry-content post-content">
        <?php the_content(); ?>
        
        <?php $args = array(
            'before' => '<p class="post-navigation">',
            'after' => '</p>',
            'pagelink' => __('Page %', 'ytc')
        ); ?>

        <?php wp_link_pages($args); ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->