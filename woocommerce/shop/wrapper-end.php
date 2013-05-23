                </div> <!-- .articles -->

                <aside class="main-sidebar span4">

                    <?php if (!is_singular('product'))
                        get_sidebar('shop'); 
                    else 
                        get_sidebar('single-product'); ?>

                </aside> <!-- .main-sidebar -->
            </div> <!-- end row -->
        </div> <!-- .container -->
    </div> <!-- content-wrap -->