<?php

  /*
    This is the template for Footer

    @package verso-lite
  */
$verso_lite_settings = verso_lite_get_theme_options();
?>

</div><!-- #content -->
<footer class="verso-footer">
    <?php
    if (    is_active_sidebar( 'footer-sidebar-1'  )
        && is_active_sidebar( 'footer-sidebar-2' )
        && is_active_sidebar( 'footer-sidebar-3'  )
        &&  is_active_sidebar( 'footer-sidebar-4' )
    ): {?>
        <div class="verso-footer-container">
            <div class="versofooter container" role="complementary">
                <div class="row">
                    <div class="first col-md-3 col-sm-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
                        <?php
                        if($verso_lite_settings['verso_bottom_social_icons'] == 0): ?>
                            <div class="footer-social-block">
                                <?php do_action('footer_social_links'); ?>
                            </div> <!-- end .footer-social-block -->
                        <?php endif; ?>
                    </div><!-- .first .widget-area -->

                    <div class="second col-md-3 col-sm-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                    </div><!-- .second .widget-area -->

                    <div class="third col-md-3 col-sm-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
                    </div><!-- .third .widget-area -->

                    <div class="fourth col-md-3 col-sm-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
                    </div><!-- .fourth .widget-area -->
                </div>

            </div>
        </div>
    <?php }
    elseif ( is_active_sidebar( 'footer-sidebar-1'  )
        && is_active_sidebar( 'footer-sidebar-2' )
        && is_active_sidebar( 'footer-sidebar-3'  )
        &&  !is_active_sidebar( 'footer-sidebar-4' )
    ) : {?>
        <div class="verso-footer-container">
            <div class="versofooter container" role="complementary">
                <div class="row">
                    <div class="first col-md-4 col-sm-4 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
                        <?php
                        if($verso_lite_settings['verso_bottom_social_icons'] == 0): ?>
                            <div class="footer-social-block">
                                <?php do_action('footer_social_links'); ?>
                            </div> <!-- end .footer-social-block -->
                        <?php endif; ?>
                    </div><!-- .first .widget-area -->

                    <div class="second col-md-4 col-sm-4 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                    </div><!-- .second .widget-area -->

                    <div class="third col-md-4 col-sm-4 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
                    </div><!-- .third .widget-area -->
                </div>
            </div>
        </div>
    <?php }
    elseif ( is_active_sidebar( 'footer-sidebar-1'  )
        && is_active_sidebar( 'footer-sidebar-2' )
        && !is_active_sidebar( 'footer-sidebar-3'  )
        &&  !is_active_sidebar( 'footer-sidebar-4' )
    ) : {?>
        <div class="verso-footer-container">
            <div class="versofooter container" role="complementary">
                <div class="row">
                    <div class="first col-md-6 col-sm-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
                        <?php
                        if($verso_lite_settings['verso_bottom_social_icons'] == 0): ?>
                            <div class="footer-social-block">
                                <?php do_action('footer_social_links'); ?>
                            </div> <!-- end .footer-social-block -->
                        <?php endif; ?>
                    </div><!-- .first .widget-area -->

                    <div class="second col-md-6 col-sm-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                    </div><!-- .second .widget-area -->

                </div>
            </div>
        </div>
    <?php }
    elseif ( is_active_sidebar( 'footer-sidebar-1'  )
        && !is_active_sidebar( 'footer-sidebar-2' )
        && !is_active_sidebar( 'footer-sidebar-3'  )
        &&  !is_active_sidebar( 'footer-sidebar-4' )
    ) : {?>
        <div class="verso-footer-container">
            <div class="versofooter container" role="complementary">
                <div class="row">
                    <div class="first col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
                        <?php
                        if($verso_lite_settings['verso_bottom_social_icons'] == 0): ?>
                            <div class="footer-social-block">
                                <?php do_action('footer_social_links'); ?>
                            </div> <!-- end .footer-social-block -->
                        <?php endif; ?>
                    </div><!-- .first .widget-area -->
                </div>
            </div>
        </div>
    <?php }
    endif;
    ?>
    <div class="verso-footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="site-footer-info">
                        <span><?php esc_html_e('Copyright &copy; ', 'verso-lite'); ?> <?php echo date('Y ') . '<a href="' . esc_url( home_url( '/' ) ) .'" >' . esc_attr( get_bloginfo('name')) . '</a>';?></span>
                        <span><?php esc_html_e(' All Rights Reserved', 'verso-lite'); ?></span>
                        <span><?php esc_html_e(' Designed by', 'verso-lite'); ?><a href="<?php echo esc_url('http://themeparrot.com', 'verso-lite'); ?>"> <?php esc_html_e('ThemeParrot', 'verso-lite'); ?></a></span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="site-footer-links pull-right">
                        <?php
                        if($verso_lite_settings['verso_lite_site_footer_links'] == 0):
                            if ( has_nav_menu( 'footernav' ) ) {
                                wp_nav_menu( array(
                                  'theme_location' => 'footernav',
                                  'container' => false,
                                  'menu_class' => 'nav nav-pills'
                                ));
                            }
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- BACK TO TOP -->
  <div id="back-to-top" data-spy="affix" data-offset-top="300" class="back-to-top hidden-xs affix-top">
    <button class="btn btn-primary" title="<?php esc_html_e('Back to Top', 'verso-lite'); ?>"><i class="fa fa-long-arrow-up"></i></button>
  </div>
<!-- //BACK TO TOP -->

</div><!-- #page -->


<?php wp_footer(); ?>
</body>
</html>
