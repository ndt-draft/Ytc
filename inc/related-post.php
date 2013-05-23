<?php
/*RELATED POST*/
$id = get_the_id();

$terms = get_the_terms($id, 'category');
$cats = array();

foreach ($terms as $term) {
    $cats[] = $term->cat_ID;
} 

// number of related posts
$num_related_posts = (int) ot_get_option('ytc_num_related_posts');

if ($num_related_posts <= 0)
    $num_related_posts = 3;

// randomize related posts
$randomize_related_posts = ot_get_option('ytc_randomize_related_posts');

if (isset($randomize_related_posts[0]) && $randomize_related_posts[0] === 'rand')
    $order_related_posts = 'rand';
else
    $order_related_posts = 'date';

$loop = new WP_Query(
    array(
        'posts_per_page' => $num_related_posts, // user option
        'category__in' => $cats,
        'orderby' => $order_related_posts, // user option
        'post__not_in' => array($id) 
    )
);

if ($loop->have_posts()) : ?>

    <div class="related-posts">
        <h2><?php _e('Related posts', 'ytc'); ?></h2>

        <div class="row-fluid">

            <?php 
            $current_post = 0;
            while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="span4 related-post">

                    <figure class="related-post-thumbnail">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail-size'); ?></a>
                    </figure>

                    <a class="related-post-title" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>  

                <?php
                $current_post++; 
                if ($current_post % 3 == 0) echo '</div><div class="row-fluid">';
            endwhile; ?>

        </div> <!-- .row-fluid -->
    </div> <!-- .related-posts -->
<?php wp_reset_query();
endif; ?>