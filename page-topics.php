<?php 
// Template Name: Topics
get_header(); ?>
        <!-- Row for main content area -->
        <div id="content" class="eight columns" role="main">
            

                <?php
                // this will grab all the Levels and spit out items contained inside
                $post_type = 'huf_asset';
                $tax = 'topic';
                $tax_terms = get_terms( $tax );
                if ($tax_terms) {
                  foreach ($tax_terms  as $tax_term) {
                  $args = array(
                    'post_type' => $post_type,
                    "$tax" => $tax_term->slug,
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'caller_get_posts'=> 1,
                  );
                    $my_query = null;
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) : ?>
                      
                      <section class="section-divider <?php echo $tax_term->slug; ?> clearfix">
                        <h2><?php echo $tax_term->name; ?></h2>
                        <p><?php echo $tax_term->description; ?></p>
                        <a class="view-all" href="<?php echo site_url(); ?>/topic/<?php echo $tax_term->slug; ?>" title="View All <?php echo $tax_term->name; ?> Assets">View All</a>


                        <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                          <div class="asset-preview">
                            <a href="<?php the_permalink(); ?>">
                          <?php
                                if ( has_post_format( 'video' )) {
                                  echo post_thumb_noheight(get_the_post_thumbnail(get_the_ID(),'asset-thumb'));
                                }

                                elseif ( has_post_format( 'audio' )) {
                                  echo '<img src="'.get_stylesheet_directory_uri() .'/images/preview-poster-audio.gif"/>';
                                }

                                elseif ( has_post_format( 'image' )) {
                                  echo '<img src="'.get_stylesheet_directory_uri() .'/images/preview-poster-text.gif"/>';
                                }

                                else {
                                  echo 'Please select Post Format';
                                }
                              ?>
                            </a>
                            <h4><?php the_title(); ?></h4>
                            <time datetime="<?php the_time('c'); ?>"><?php the_time('F jS, Y'); ?></time>
                          </div>


                        <?php endwhile; // end of loop ?>
                      </section>

                    <?php else : ?>
                    <?php endif; // if have_posts()
                    wp_reset_query();

                  } // end foreach #tax_terms
                }
                ?>



            

        </div><!-- End Content row -->
        
        <aside id="sidebar" class="four columns" role="complementary">
            <div class="sidebar-box">
                <div class="infobox">
                  <h3>Topics</h3>
                    <div>
                      <?php 
                        $args = array( 'taxonomy' => 'topic' );
                        $terms = get_terms('topic', $args);
                        $count = count($terms); $i=0;
                        if ($count > 0) {
                            $term_list = '<ul class="my_term-archive">';
                            foreach ($terms as $term) {
                                $i++;
                              $term_list .= '<li><a href="/topic/' . $term->slug . '">' . $term->name . '</a></li>';
                              if ($count != $i) $term_list .= ''; else $term_list .= '</ul>';
                            }
                            echo $term_list;
                        }
                      ?>
                    </div>
                </div>
            </div>
        </aside><!-- /#sidebar -->
        
<?php get_footer(); ?>