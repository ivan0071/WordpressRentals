<?php
if(!function_exists('verso_lite_get_option_defaults_values')):
	/******************** VERSO LITE DEFAULT OPTION VALUES ******************************************/
	function verso_lite_get_option_defaults_values() {
        $verso_default_values = array(
			/*Color options */
			'verso_lite_site_primary_color' => '#3B99D7',
			'verso_lite_site_primary_dark_color' => '#2D3E50',
			'verso_lite_site_secondary_color' => '#FC694C',
			'verso_lite_site_secondary_dark_color' => '#fc421d',
			'verso_lite_site_gradient_color1' => '#1ad6fd',
			'verso_lite_site_gradient_color2' => '#1d62f0',

			/*Header Color options */
			'verso_lite_header_background_color' => '#ffffff',
			'verso_lite_menu_link_color' => '#A1B1BA',
			'verso_lite_menu_link_hover_color' => '#3B99D7',
			'verso_lite_menu_active_color' => '#3B99D7',
			'verso_lite_submenu_background_color' => '#2D3E50',
			'verso_lite_submenu_link_color' => '#ffffff',
			'verso_lite_submenu_active_background' => '#3B99D7',
			'verso_lite_submenu_active_link_color' => '#ffffff',

			/*Layout options */
			'verso_lite_design_layout' => 'wide-layout',
			'verso_lite_sidebar_layout_options' => 'right',
			'verso_lite_blog_layout' => 'blog_default_display',
			'verso_lite_blog_sidebar_layout' => 'blog_with_right_sidebar_display',
			'verso_lite_blog_pagination_style' => 'loadmore_pagination',

			/*Header variations */
			'verso_lite_header_layout' => 'header-layout1',

            /*Social Icons */
			'verso_lite_header_affix_display' =>0,
			'verso_lite_top_social_icons' =>0,
			'verso_lite_bottom_social_icons'	=>0,
			'verso_lite_site_footer_links'	=>0,
			'verso_lite_social_facebook'=> '',
			'verso_lite_social_twitter'=> '',
			'verso_lite_social_pinterest'=> '',
			'verso_lite_social_dribbble'=> '',
			'verso_lite_social_instagram'=> '',
			'verso_lite_social_flickr'=> '',
			'verso_lite_social_googleplus'=> '',
			'verso_lite_social_linkedin'=>'',

			/*Custom Background Image */
			'verso_lite_breadcrumb_bg_image'=> get_template_directory_uri() . '/img/home-parallax.png',

        );
        return apply_filters( 'verso_lite_get_option_defaults_values', $verso_default_values );
    }
endif;
