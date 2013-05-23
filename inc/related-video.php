<?php
/*RELATED POST*/
$id = get_the_id();

$terms = get_the_terms($id, 'video_cat');
$cats = array();

foreach ($terms as $term) {
    $cats[] = $term->term_id;
} 

// randomize the related videos
$randomize_related_videos = ot_get_option('ytc_randomize_related_videos');
if (isset($randomize_related_videos[0]) && $randomize_related_videos[0] === 'rand')
    $order_related_videos = 'rand';
else 
    $order_related_videos = 'date';


// get the number of related videos
$num_related_videos = (int) ot_get_option('ytc_num_related_videos');
if ($num_related_videos <= 0)
    $num_related_videos = 3;

$loop = new WP_Query(
    array(
        'post_type' => 'video',
        'posts_per_page' => $num_related_videos, // user option
        'tax_query' => array(
                    array(
                        'taxonomy' => 'video_cat',
                        'field' => 'id',
                        'terms' => $cats,
                        'operator'=> 'IN' //Or 'AND' or 'NOT IN'
                     )),
        'orderby' => $order_related_videos, // user option
        'post__not_in' => array($id)
    )
);

if ($loop->have_posts()) : ?>

    <div class="related-posts related-videos">
        <h2><?php _e('Related Videos', 'ytc'); ?></h2>

        <div class="row-fluid">

            <?php 
            $current_post = 0;
            while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="span4 related-post related-video">

                    <figure class="related-post-thumbnail">
                        <a href="<?php the_permalink(); ?>#post-<?php the_ID(); ?>"><?php the_post_thumbnail('post-thumbnail-size'); ?></a>
                    </figure>

                    <a class="related-post-title" title="<?php the_title(); ?>" 
                        href="<?php the_permalink(); ?>#post-<?php the_ID(); ?>"><?php the_title(); ?></a>
                </div>  
            <?php 
                $current_post++;
                if ($current_post % 3 == 0) 
                    echo '</div><div class="row-fluid">';

            endwhile; ?>

        </div> <!-- .row-fluid -->
    </div> <!-- .related-posts -->
<?php wp_reset_query();
endif; ?>