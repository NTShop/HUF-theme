        </div><!-- End Main row -->
        
        <footer id="content-info" role="contentinfo">
            <div class="row">
                <?php wp_nav_menu(array('theme_location' => 'footer_navigation', 'container' => false, 'menu_class' => 'footer-nav')); ?>
            </div>
        </footer>
            
    </div><!-- Container End -->
    
    <!-- Included JS Files of Foundation -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/foundation.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>

    <!-- scripts-ck.js is the minified version of scripts.js -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/scripts-ck.js"></script>


    <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
         chromium.org/developers/how-tos/chrome-frame-getting-started -->
    <!--[if lt IE 7]>
        <script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
        <script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
    <![endif]-->
    
    <?php wp_footer(); ?>
</body>
</html>