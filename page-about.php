<?php 
// Template Name: About Page
get_header(); ?>

        <!-- Row for main content area -->
        <div id="content" class="eight columns" role="main">
    
            <div class="post-box">
                <?php get_template_part('loop', 'page'); ?>
            </div>

        </div><!-- End Content row -->
        
        <aside id="sidebar" class="four columns" role="complementary">
            <div class="infobox">
                <h3>What you will find on this site</h3>
                
                <!-- Video Sample -->
                <div class="item format-video">
                    <h4>Video</h4>
                    <p>Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue.</p>
                    <a class="more sample fancybox" href="#video-sample">View Sample</a>
                    <div id="video-sample" class="visualyhidden">
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
                    </div>
                </div>

                <!--Audio Sample -->
                <div class="item format-audio">
                    <h4>Audio</h4>
                    <p>Mauris iaculis porttitor posueret. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus.</p>
                    <a class="more sample fancybox" href="#audio-sample">View Sample</a>
                </div>

                <!-- Text Sample -->
                <div class="item format-image">
                    <h4>Text</h4>
                    <p>Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo unc eu ullamcorper orci.</p>
                    <a class="more sample fancybox" href="#text-sample">View Sample</a>
                </div>
            </div><!-- infobox -->

            <a class="huf-button blue" href="<?php echo site_url(); ?>/level/level-1/">Level 1 <span>View</span></a>
            <a class="huf-button yellow" href="<?php echo site_url(); ?>/level/level-2/">Level 2 <span>View</span></a>
            <a class="huf-button green" href="<?php echo site_url(); ?>/level/level-3/">Level 1 <span>View</span></a>

        </aside>
        
<?php get_footer(); ?>