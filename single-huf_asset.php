<?php get_header(); ?>

    <?php if
    // check to see if user is logged in. 
    ( is_user_logged_in() ) : ?>

        <!-- Row for main content area -->
        <div id="content" class="eight columns" role="main">
                    <?php get_template_part('loop', 'single-huf_asset'); ?>
        </div><!-- End Content row -->
        
        <aside id="sidebar" class="four columns" role="complementary">
            <div class="infobox">
                <h3>Related Items by Topic</h3>
                <div>
                
                <?php
                global $post;
                $terms = get_the_terms( $post->ID , 'topic', 'string');
                $do_not_duplicate[] = $post->ID;
    
                if(!empty($terms)){
                    foreach ($terms as $term) {
                        query_posts( array(
                        'topic' => $term->slug,
                        'showposts' => 6,
                        'caller_get_posts' => 1,
                        'post__not_in' => $do_not_duplicate ) );
                        if(have_posts()){
                            while ( have_posts() ) : the_post(); $do_not_duplicate[] = $post->ID; ?>

                                <div <?php post_class('item') ?>>
                                        <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                                        <p class="excerpt"><?php the_excerpt(); ?></p>
                                        <a class="more" href="<?php the_permalink() ?>">View</a>
                                </div>

                            <?php endwhile; wp_reset_query();
                        }
                    }
                }
                ?>
                
            </div>

            <?php dynamic_sidebar("single_asset"); ?>

        </aside><!-- /#sidebar -->
        

    <?php
    //if not logged in show this content instead. 
     else : ?>

    <!-- Row for main content area -->
    <div id="content" class="eight columns" role="main">
        <?php get_template_part('visitor'); ?>
    </div><!-- End Content row -->

            <aside id="sidebar" class="four columns" role="complementary">
            <div class="infobox">
                <h3>User is not logged in.</h3>
                <div>
                    <p>What should we show here.</p>
                </div>
            </div>

            <?php dynamic_sidebar("single_asset"); ?>

        </aside><!-- /#sidebar -->


        <?php endif; ?>
<?php get_footer(); ?>