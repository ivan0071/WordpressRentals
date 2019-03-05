<?php
/*
@package verso-lite
  =================
  ADMIN ENQUEUE FUNCTIONS
  =================
*/
function verso_lite_load_admin_scripts( $hook ){

  //echo $hook;

  //register css admin section
  wp_register_style( 'verso-lite-admin', get_template_directory_uri() . '/css/verso-lite.admin.css', array() , '1.0.0', 'all'  );

  //register js admin section
  wp_register_script( 'verso-lite-admin-script', get_template_directory_uri() . '/js/verso-lite.admin.js', array('jquery'), '1.0.0', true );

  if( 'appearance_page_jtheme_verso' == $hook ){

    wp_enqueue_media();

    wp_enqueue_style( 'verso-admin' );

    wp_enqueue_script( 'verso-admin-script' );

  }

}
add_action( 'admin_enqueue_scripts', 'verso_lite_load_admin_scripts' );

/*
  =================
  FRONT-END ENQUEUE FUNCTIONS
  =================
*/
function verso_lite_load_scripts(){

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array() , '3.3.7', 'all'  );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array() , '4.7.0', 'all'  );
    wp_enqueue_style( 'fontello', get_template_directory_uri() . '/css/fontello.css', array() , '1.0.0', 'all'  );
    wp_enqueue_style( 'verso-fonts', verso_lite_fonts_url(), array(), null );
    wp_enqueue_style( 'verso-lite', get_template_directory_uri() . '/css/verso-lite.css', array() , '1.0.0', 'all'  );
    wp_enqueue_style( 'verso-lite-style', get_stylesheet_uri() );

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') , '3.3.7', 'all'  );
    wp_enqueue_script( 'verso-lite', get_template_directory_uri() . '/js/verso-lite.js', array('jquery') , '1.0.0', 'all'  );

}
add_action( 'wp_enqueue_scripts', 'verso_lite_load_scripts' );

/* Enqueue comment reply script */
function verso_lite_enqueue_comments_reply() {
	if( get_option( 'thread_comments' ) )  {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'verso_lite_enqueue_comments_reply' );

/*
	* Add google font
*/
function verso_lite_fonts_url() {
	$fonts_url = '';
	$oswald = _x( 'on', 'Oswald: on or off', 'verso-lite' );
	$quatcento_sans = _x( 'on', 'Quattrocento Sans: on or off', 'verso-lite' );

	if ( 'off' !== $oswald || 'off' !== $quatcento_sans ) {
		$font_families = array();

		if ( 'off' !== $oswald ) {
		$font_families[] = 'Oswald:400,700';
		}
		if ( 'off' !== $quatcento_sans ) {
		$font_families[] = 'Quattrocento Sans:400,700';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}
