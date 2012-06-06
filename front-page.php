<?php get_header(); ?>
        
        <section id="site-intro" class="clearfix">
            <!-- Row for main content area -->
            <div id="content" class="eight columns" role="main">
                <section id="video-tabs">
                    <ul class="tabs-content">
                        
                        <li class="active" id="level1Tab">
                                <video width="638" height="359" poster="<?php echo get_stylesheet_directory_uri(); ?>/images/level1-poster.png" controls="controls" preload="none">
                                    <!-- MP4 for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7 -->
                                    <source type="video/mp4" src="<?php echo site_url(); ?>/wp-content/uploads/2012/04/sample-level1.mp4" />
                                    <!-- Flash fallback for non-HTML5 browsers without JavaScript -->
                                    <object width="320" height="240" type="application/x-shockwave-flash" data="flashmediaelement.swf">
                                        <param name="movie" value="flashmediaelement.swf" />
                                        <param name="flashvars" value="controls=true&file=<?php echo site_url(); ?>/wp-content/uploads/2012/04/sample-level1.mp4" />
                                        <!-- Image as a last resort -->
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/level1-poster.png" width="638" height="359" title="No video playback capabilities" />
                                    </object>
                                </video>
                        </li>
                        
                        <li id="level2Tab">
                            <video width="638" height="359" poster="<?php echo get_stylesheet_directory_uri(); ?>/images/level2-poster.png" controls="controls" preload="none">
                                <!-- MP4 for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7 -->
                                <source type="video/mp4" src="<?php echo site_url(); ?>/wp-content/uploads/2012/04/sample-level2.mp4" />
                                <!-- Flash fallback for non-HTML5 browsers without JavaScript -->
                                <object width="320" height="240" type="application/x-shockwave-flash" data="flashmediaelement.swf">
                                    <param name="movie" value="flashmediaelement.swf" />
                                    <param name="flashvars" value="controls=true&file=<?php echo site_url(); ?>/wp-content/uploads/2012/04/sample-level2.mp4" />
                                    <!-- Image as a last resort -->
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/level2-poster.png" width="638" height="359" title="No video playback capabilities" />
                                </object>
                            </video>
                        </li>
                        
                        <li id="level3Tab">
                            <video width="638" height="359" poster="<?php echo get_stylesheet_directory_uri(); ?>/images/level3-poster.png" controls="controls" preload="none">
                                <!-- MP4 for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7 -->
                                <source type="video/mp4" src="<?php echo site_url(); ?>/wp-content/uploads/2012/04/sample-level3.mp4" />
                                <!-- Flash fallback for non-HTML5 browsers without JavaScript -->
                                <object width="320" height="240" type="application/x-shockwave-flash" data="flashmediaelement.swf">
                                    <param name="movie" value="flashmediaelement.swf" />
                                    <param name="flashvars" value="controls=true&file=<?php echo site_url(); ?>/wp-content/uploads/2012/04/sample-level3.mp4" />
                                    <!-- Image as a last resort -->
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/level3-poster.png" width="638" height="359" title="No video playback capabilities" />
                                </object>
                            </video>
                        </li>

                    </ul>

                    <dl class="tabs">
                      <dd id="lvl-1"><a href="#level1" class="active">Level 1</a></dd>
                      <dd id="lvl-2"><a href="#level2">Level 2</a></dd>
                      <dd id="lvl-3"><a href="#level3">Level 3</a></dd>
                    </dl>

                </section>


            </div><!-- End Content row -->
            <div class="four columns">

                <script type="text/javascript">
                    $(function(){

                        // Accordion event: 'mouseover',
                        $("#home-accordion").accordion({ header: "h3",  autoHeight: false });
                        
                        //hover states on the static widgets
                        $('#dialog_link, ul#icons li').hover(
                            function() { $(this).addClass('ui-state-hover'); }, 
                            function() { $(this).removeClass('ui-state-hover'); }
                        );
                        
                    });
                </script>

                <div id="home-accordion">
                    
                    <h3><a href="#">Recent Library Additions</a></h3>
                    <div>
                        <?php $loop = new WP_Query( array( 'post_type' => 'huf_asset', 'posts_per_page' => 10 ) ); ?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div <?php post_class('item') ?>>
                                <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                                <p class="excerpt"><?php the_excerpt(); ?></p>
                                <a class="more" href="<?php the_permalink() ?>">View</a>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    

                    <!-- Lets see the topics -->
                    <h3><a href="#">Topics</a></h3>
                    <div>
                        <?php 
                        //list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)
                        $taxonomy     = 'topic';
                        $orderby      = 'name'; 
                        $show_count   = 1;      // 1 for yes, 0 for no
                        $pad_counts   = 0;      // 1 for yes, 0 for no
                        $hierarchical = 0;      // 1 for yes, 0 for no
                        $title        = '';
                        $args = array(
                          'taxonomy'     => $taxonomy,
                          'orderby'      => $orderby,
                          'show_count'   => $show_count,
                          'pad_counts'   => $pad_counts,
                          'hierarchical' => $hierarchical,
                          'title_li'     => $title
                        );
                        ?>
                        <ul>
                        <?php wp_list_categories( $args ); ?>
                        </ul>
                    </div>


                    <!-- Let's see the Levels -->
                    <h3><a href="#">Levels</a></h3>
                    <div>
                        <?php 
                        //list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)
                        $taxonomy     = 'level';
                        $orderby      = 'name'; 
                        $show_count   = 1;      // 1 for yes, 0 for no
                        $pad_counts   = 0;      // 1 for yes, 0 for no
                        $hierarchical = 0;      // 1 for yes, 0 for no
                        $title        = '';
                        $args = array(
                          'taxonomy'     => $taxonomy,
                          'orderby'      => $orderby,
                          'show_count'   => $show_count,
                          'pad_counts'   => $pad_counts,
                          'hierarchical' => $hierarchical,
                          'title_li'     => $title
                        );
                        ?>
                        <ul>
                        <?php wp_list_categories( $args ); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="level-intro" class="row">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Boxes')) : ?><?php endif; ?>
        </section>
<?php get_footer(); ?>