<?php if (isset($_GET['post_type']) && $_GET['post_type'] == 'video') :

    get_template_part('search', 'video');

elseif (isset($_GET['post_type']) && $_GET['post_type'] == 'post') : 

    get_template_part('search', 'post');

else: // all
    
    get_template_part('search', 'all');

endif;