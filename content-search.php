<article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">

    <div class="article-preview-content">
        
        <header>
            
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-info">
                <span class="thetime"><?php the_time(get_option('date_format')); ?></span> 
            </div>

        </header>

        <?php the_excerpt(); ?>

    </div> <!-- end article-preview-content -->
</article>