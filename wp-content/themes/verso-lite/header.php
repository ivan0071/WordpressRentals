<?php
/*
 * @package verso-lite
 */
?>
 <!DOCTYPE html>
 <html <?php language_attributes(); ?>>
     <?php $verso_lite_settings = verso_lite_get_theme_options(); ?>
     <head>
         <meta charset="<?php bloginfo( 'charset' ); ?>" >
         <meta name="viewport" content="width=device-width, initial-scale=1" >
         <link rel="profile" href="http://gmpg.org/xfn/11">

         <?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
           <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
         <?php endif; ?>

         <?php wp_head(); ?>
     </head>
   <body <?php body_class(); ?>>

     <div id="page" class="site">

     <!-- preloader -->
     <div id="preloader" class="loader">
         <div id = "versoLoader" class = "box">
             <span class = "letter"><?php esc_html_e('L', 'verso-lite') ?></span>

             <div class = "versoLoaderCircle box">
                 <div class = "versoLoaderInner box">
                     <div class = "versoLoaderCore box"></div>
                 </div>
             </div>

             <span class = "letter box"><?php esc_html_e('A', 'verso-lite') ?></span>
             <span class = "letter box"><?php esc_html_e('D', 'verso-lite') ?></span>
             <span class = "letter box"><?php esc_html_e('I', 'verso-lite') ?></span>
             <span class = "letter box"><?php esc_html_e('N', 'verso-lite') ?></span>
             <span class = "letter box"><?php esc_html_e('G', 'verso-lite') ?></span>
             <span class = "letter box">.</span>
             <span class = "letter box">.</span>
         </div>
     </div>

      <!-- sidebar-closed -->
     <div class="verso-sidebar sidebar-closed visible-xs">
       <div class="verso-sidebar-container">
         <a class="js-toggleSidebar sidebar-close">
           <span class="fa fa-close"></span>
         </a>
         <div class="sidebar-scroll">
             <div class="verso-offcanvas-menu">
                 <div class="visible-xs">
                     <?php
                       wp_nav_menu( array(
                         'theme_location' => 'offcanvas',
                         'container' => false,
                         'menu_class' => 'nav navbar-nav navbar-collapse'
                       ));
                     ?>
                 </div>
             </div>
         </div>
       </div>
     </div>
     <div class="sidebar-overlay js-toggleSidebar"> </div>

    <div class="nav_wrapper">
         <div class="topbar-container">
             <div class="container">
                 <div class="row">
                     <div class="col-sm-8">
                         <?php
                             if ( is_active_sidebar( 'top-banner-info' ) ) {
                                 dynamic_sidebar( 'top-banner-info' );
                             }
                         ?>
                     </div>
                     <div class="col-sm-4">
                         <div class="topbar-right">
                               <div class="text-right topbar-icons">

                                   <?php
                                   if($verso_lite_settings['verso_lite_top_social_icons'] == 0):
                                       echo '<div class="header-social-block">';
                                           do_action('topbar_social_links');
                                       echo '</div>'.'<!-- end .header-social-block -->';
                                   endif;
                                   ?>
                               </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <header class="header-container">
             <?php if ( get_header_image() ) : ?>
                 <div class="nav-container" style="background: url('<?php header_image(); ?>') no-repeat scroll center/cover;">
             <?php else : ?>
                 <div class="nav-container">
             <?php endif; // End header image check. ?>
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-2 col-md-3 col-sm-2 col-xs-4 site-branding">
                             <?php
                               $custom_logo_id = get_theme_mod( 'custom_logo' );
                               $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                             ?>
                             <h1 class="site-title">
                                 <a href="<?php echo esc_url( home_url( '/' ) );  ?>">
                                     <?php
                                         if ( has_custom_logo() ) {
                                                 echo '<img class="logo-img" src="'. esc_url( $logo[0] ) .'" alt="'. esc_attr( get_bloginfo( 'name' ) ) .' logo">';
                                         } else {
                                                 echo '<span class="logo-text">'. esc_attr( get_bloginfo( 'name' ) ) .'</span>';
                                         }
                                     ?>
                                 </a>
                             </h1>
                             <?php
                                 $description = get_bloginfo( 'description');
                                 if ( $description) :
                                 echo '<span class="site-description">';	echo esc_attr($description); echo '</span>';
                                 endif;
                             ?>
                         </div>
                         <div class="col-lg-10 col-md-9 col-sm-10 col-xs-8 menu-container">
                             <nav class="navbar navbar-default navbar-verso main-navigation">
                                 <div class="verso-offcanvas-toggle-menu">
                                     <a class="js-toggleSidebar sidebar-open">
                                       <i class="icon-menu-outline"></i>
                                     </a>
                                 </div>
                                 <div class="head-search pull-right">
                                      <div id="search-toggle" class="toggle-search head-search-toggle"><i class="icon-search"></i></div>
                                      <div class="search-expand">
                                          <div class="search-expand-inner">
                                              <?php get_search_form(); ?>
                                          </div>
                                      </div>
                                      <div class="search-overlay head-search-toggle"></div>
                                 </div><!--/.head-search-->
                                 <?php if ( class_exists( 'WooCommerce' ) ):
                                    // code that requires WooCommerce ?>
                                      <div class="product-cart">
                                        <div class="product-shopping-bag active">
                                            <?php verso_lite_cart_shopping_bag(); ?>
                                        </div>
                                      </div>
                                 <?php endif; ?>
                                 <div class="hidden-xs">
                                     <?php
                                       wp_nav_menu( array(
                                         'theme_location' => 'primary',
                                         'container' => false,
                                         'menu_class' => 'nav navbar-nav'
                                       ));
                                     ?>
                                 </div>
                             </nav><!--/.navbar-verso-->
                         </div>
                     </div><!-- .row -->
                 </div> <!-- .container -->
             </div><!-- .nav-container -->
         </header><!-- .header-container -->
         <?php
         if($verso_lite_settings['verso_lite_header_affix_display'] == 0): ?>
             <div class="affix-header-container">
                 <div class="container">
                     <div class="row">
                         <div class="col-md-3 col-sm-2 col-xs-4 site-branding">
                             <?php
                               $custom_logo_id = get_theme_mod( 'custom_logo' );
                               $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                             ?>
                             <h1 class="site-title">
                                 <a href="<?php echo esc_url( home_url( '/' ) );  ?>">
                                     <?php
                                         if ( has_custom_logo() ) {
                                                 echo '<img class="logo-img" src="'. esc_url( $logo[0] ) .'" alt="'. esc_attr( get_bloginfo( 'name' ) ) .' logo">';
                                         } else {
                                                 echo '<span class="logo-text">'. esc_attr( get_bloginfo( 'name' ) ) .'</span>';
                                         }
                                     ?>
                                 </a>
                             </h1>
                         </div>
                         <div class="col-md-9 col-sm-10 col-xs-8 menu-container">
                             <nav class="navbar navbar-default navbar-verso main-navigation hidden-xs">
                                 <?php
                                   wp_nav_menu( array(
                                     'theme_location' => 'primary',
                                     'container' => false,
                                     'menu_class' => 'nav navbar-nav pull-right'
                                   ));
                                 ?>
                             </nav><!--/.navbar-verso-->
                         </div>
                     </div><!-- .row -->
                 </div> <!-- .container -->
             </div><!-- .affix-header-container -->
         <?php endif; ?>
     </div>
     <div id="content" class="site-content">
