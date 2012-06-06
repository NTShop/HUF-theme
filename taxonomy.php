<?php get_header(); ?>

        <!-- Row for main content area -->
        <div id="content" class="eight columns" role="main">
                <h1>
                    <?php if (is_day()) : ?>
                        <?php printf(__('Daily Archives: %s', 'reverie'), get_the_date()); ?>
                    <?php elseif (is_month()) : ?>
                        <?php printf(__('Monthly Archives: %s', 'reverie'), get_the_date('F Y')); ?>
                    <?php elseif (is_year()) : ?>
                        <?php printf(__('Yearly Archives: %s', 'reverie'), get_the_date('Y')); ?>
                    <?php else : ?>
                        <?php single_cat_title(); ?>
                    <?php endif; ?>
                </h1>
                <hr>
                <?php get_template_part('loop', 'taxonomy'); ?>
            

        </div><!-- End Content row -->
        
        <aside id="sidebar" class="four columns" role="complementary">
            <div class="sidebar-box">
                <?php if ( is_tax( 'level')) {?>
                    <?php dynamic_sidebar("levels-page"); ?>
                <?php } else if ( is_tax( 'topic')) { ?>
                <div class="infobox">
                                  <h3>Topics</h3>
                                    <div>
                                      <?php 
                                        $args = array( 'taxonomy' => 'topic' );
                                        $terms = get_terms('topic', $args);
                                        $count = count($terms); $i=0;
                                        $url = site_url();
                                        if ($count > 0) {
                                            $term_list = '<ul class="my_term-archive">';
                                            foreach ($terms as $term) {
                                                $i++;
                                              $term_list .= '<li><a href="' . $url . '/topic/' . $term->slug . '">' . $term->name . '</a></li>';
                                              if ($count != $i) $term_list .= ''; else $term_list .= '</ul>';
                                            }
                                            echo $term_list;
                                        }
                                      ?>
                                    </div>
                                </div>
                <?php } else { ?>
                <!-- and the fall back -->
                <?php } ?>
            </div>
        </aside><!-- /#sidebar -->
        
<?php get_footer(); ?>