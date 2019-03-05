<?php
/*
@package verso-lite
  =================
  THEME SUPPORT OPTIONS
  =================
*/
if ( ! function_exists( 'verso_lite_setup' ) ) :
    function verso_lite_setup() {

        /*
    	 * Make theme available for translation.
    	 * Translations can be filed in the /languages/ directory.
    	 * If you're building a theme based on verso lite, use a find and replace
    	 * to change 'verso-lite' to the name of your theme in all the template files.
    	*/
	    load_theme_textdomain( 'verso-lite', get_template_directory() . '/languages' );

        /* Activate Post formats */
        add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

        /* Activate Nav Menu options */
        register_nav_menu( 'primary', esc_html__( 'Header Primary Navigation Menu', 'verso-lite' ) );
        register_nav_menu( 'footernav', esc_html__( 'Footer Navigation Menu', 'verso-lite' ) );
        register_nav_menu( 'offcanvas', esc_html__( 'Off Canvas Menu', 'verso-lite' ) );

        /* Activate Custom Header */
        add_theme_support( 'custom-header');

        /* Activate Custom Background */
        add_theme_support( 'custom-background' );

        /* Activate Custom Logo */
        add_theme_support( 'custom-logo', array(
        	'height'      => 100,
        	'width'       => 400,
        	'flex-height' => true,
        	'flex-width'  => true,
        	'header-text' => array( 'site-title', 'site-description' ),
        ) );

        /* Activate Post thumbnails */
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'verso-lite-category-thumb', 300, 500 );

        /*
    	 * Let WordPress manage the document title.
    	 * By adding theme support, we declare that this theme does not use a
    	 * hard-coded <title> tag in the document head, and expect WordPress to
    	 * provide it for us.
    	*/
        add_theme_support( 'title-tag' );

        function verso_lite_document_title_separator( $sep ) {

            $sep = "|";

            return $sep;
        }
        add_filter( 'document_title_separator', 'verso_lite_document_title_separator' );

        /* Add default posts and comments RSS feed links to head.*/
        add_theme_support( 'automatic-feed-links' );

        /* Activate Html5 features */
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

        /*enables Selective Refresh for Widgets being managed within the Customizer */
        add_theme_support( 'customize-selective-refresh-widgets' );

        /* Set the content width in pixels, based on the theme's design and stylesheet */
        if ( ! isset( $content_width ) ) {
        	$content_width = 600;
        }

        /* Activate woocommerce */
        add_theme_support( 'woocommerce' );

    }
endif;
add_action( 'after_setup_theme', 'verso_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function verso_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'verso_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'verso_lite_content_width', 0 );

/**
 * Registers an editor stylesheet for the theme.
 */
function verso_lite_theme_add_editor_styles() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Laila' );
    add_editor_style( $font_url );
    add_editor_style( 'css/verso-lite-custom-editor-style.css' );
}
add_action( 'admin_init', 'verso_lite_theme_add_editor_styles' );

/*
  ============================
  SIDEBAR FUNCTIONS
  ============================
*/
function verso_lite_sidebar_init(){

  register_sidebar(
    array(
      'name' => esc_html__( 'Verso Lite Sidebar', 'verso-lite' ),
      'id' => 'sidebar-1',
      'description' => esc_html__('Dynamic Verso Lite Sidebar', 'verso-lite'  ),
      'before_widget' => '<section id="%1$s" class="verso-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<div class="verso-widget-title"><h2>',
      'after_title' => '</h2><div class="verso-separator"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div></div>'
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Top Banner info', 'verso-lite' ),
      'id' => 'top-banner-info',
      'description' => esc_html__( 'Dynamic Tob Banner Info', 'verso-lite'  ),
      'before_widget' => '<section id="%1$s" class="verso-widget verso-dark-widget verso-topbar-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<div class="verso-widget-title"><h2>',
      'after_title' => '</h2><div class="verso-separator"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div></div>'
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Top Bar', 'verso-lite' ),
      'id' => 'top-bar',
      'description' => esc_html__('Dynamic Top Bar', 'verso-lite'  ),
      'before_widget' => '<section id="%1$s" class="verso-widget verso-topbar-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<div class="verso-widget-title"><h2>',
      'after_title' => '</h2><div class="verso-separator"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div></div>'
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( ' Top Bar info', 'verso-lite' ),
      'id' => 'top-bar-info',
      'description' => esc_html__( 'Dynamic Top Bar Info', 'verso-lite'  ),
      'before_widget' => '<section id="%1$s" class="verso-widget verso-topbar-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<div class="verso-widget-title"><h2>',
      'after_title' => '</h2><div class="verso-separator"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div></div>'
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Shop Sidebar', 'verso-lite' ),
      'id' => 'sidebar-2',
      'description' => esc_html__('Dynamic Shop Sidebar', 'verso-lite'  ),
      'before_widget' => '<section id="%1$s" class="verso-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<div class="verso-widget-title"><h2>',
      'after_title' => '</h2><div class="verso-separator"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div></div>'
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Footer 1', 'verso-lite' ),
      'id' => 'footer-sidebar-1',
      'description' => esc_html__('Footer Sidebar 1', 'verso-lite' ),
      'before_widget' => '<section id="%1$s" class="verso-widget verso-dark-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<div class="verso-widget-title"><h2>',
      'after_title' => '</h2><div class="verso-separator"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div></div>'
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Footer 2', 'verso-lite' ),
      'id' => 'footer-sidebar-2',
      'description' => esc_html__('Footer Sidebar 2', 'verso-lite' ),
      'before_widget' => '<section id="%1$s" class="verso-widget verso-dark-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<div class="verso-widget-title"><h2>',
      'after_title' => '</h2><div class="verso-separator"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div></div>'
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Footer 3', 'verso-lite' ),
      'id' => 'footer-sidebar-3',
      'description' => esc_html__('Footer Sidebar 3', 'verso-lite' ),
      'before_widget' => '<section id="%1$s" class="verso-widget verso-dark-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<div class="verso-widget-title"><h2>',
      'after_title' => '</h2><div class="verso-separator"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div></div>'
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Footer 4', 'verso-lite' ),
      'id' => 'footer-sidebar-4',
      'description' => esc_html__('Footer Sidebar 4', 'verso-lite' ),
      'before_widget' => '<section id="%1$s" class="verso-widget verso-dark-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<div class="verso-widget-title"><h2>',
      'after_title' => '</h2><div class="verso-separator"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div></div>'
    )
  );
}
add_action( 'widgets_init', 'verso_lite_sidebar_init' );

/*
  ============================
  WOOCOMMERCE FUNCTIONS
  ============================
*/
/**
 * Place a cart icon with number of items and total cost in the menu bar.
 * Add Cart icon and count to header if WC is active
 */
function verso_lite_cart_shopping_bag(){
     global $woocommerce;
     ?>
     <div class="head-cart">
         <?php do_action('cart_mini'); ?>
     </div>
    <div class="shopping-bag">
    <?php
     if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
      the_widget( 'WC_Widget_Cart', 'title=' );
     } else {
      the_widget( 'WooCommerce_Widget_Cart', 'title=' );
     } ?>
    </div>
  <?php
}

function verso_lite_wc_cart_count() {

    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        $count = WC()->cart->cart_contents_count;
        ?>
        <a class="cart-content" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php echo esc_html_e('View your shopping cart', 'verso-lite'); ?>">
            <span class="shop-cart-icon"><i class="icon-cart"></i></span>
            <?php if ( $count > 0 ) echo '<span class="circle">' . $count . '</span>'; ?>
        </a>
        <?php
    }

}
add_action( 'cart_mini', 'verso_lite_wc_cart_count' );
/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function verso_lite_header_add_to_cart_fragment( $fragments ) {

    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?>
    <a class="cart-content" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php echo esc_html_e('View your shopping cart', 'verso-lite'); ?>">
        <span class="shop-cart-icon"><i class="icon-cart"></i></span>
        <?php if ( $count > 0 ) echo '<span class="circle">' . $count . '</span>'; ?></a>
    <?php

    $fragments['a.cart-content'] = ob_get_clean();

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'verso_lite_header_add_to_cart_fragment' );


function verso_lite_header_icon_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_html_e('View your shopping cart', 'verso-lite'); ?>">
        <span class="shop-cart-content">
            <span class="shop-cart-icon">
                <i class="icon-cart"></i>
                <?php if ( $woocommerce->cart->cart_contents_count > 0 ) echo '<span class="circle">' . $woocommerce->cart->cart_contents_count . '</span>'; ?>
            </span>
            <span class="shop-cart-total">
                <span><?php echo esc_html__('My cart','verso-lite'); ?></span><br />
                <?php echo $woocommerce->cart->get_cart_total(); ?>
            </span>
        </span>
    </a>
	<?php

	$fragments['a.cart-customlocation'] = ob_get_clean();

	return $fragments;

}
add_filter('add_to_cart_fragments', 'verso_lite_header_icon_add_to_cart_fragment');


// Change number or products per row to 3
if (!function_exists('verso_lite_loop_columns')) {
	function verso_lite_loop_columns() {
		return 3; // 3 products per row
	}
}
add_filter('loop_shop_columns', 'verso_lite_loop_columns', 1, 10 );

// ---------------------------------------------
// Remove Cross Sells From Default Position
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

// Add them back UNDER the Cart Table
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );

// Display Cross Sells on 3 columns instead of default 4
add_filter( 'woocommerce_cross_sells_columns', 'verso_lite_change_cross_sells_columns' );
function verso_change_cross_sells_columns( $columns ) {
    return 4;
}
add_filter( 'woocommerce_cross_sells_total', 'verso_lite_change_cross_sells_product_no' );
function verso_change_cross_sells_product_no( $columns ) {
    return 4;
}

// ---------------------------------------------
// Add div for image and content wrapper
// ---------------------------------------------

function verso_lite_hooks_close_div() {
    echo '</div>';
}

function verso_lite_hooks_open_image_div() {
    echo '<div class="product-image-wrapper">';
}
add_action('woocommerce_before_shop_loop_item', 'verso_lite_hooks_open_image_div', 7);
add_action('woocommerce_before_shop_loop_item_title', 'verso_lite_hooks_close_div', 12);

function verso_lite_hooks_open_content_div() {
    echo '<div class="product-content-wrapper">';
}
add_action('woocommerce_shop_loop_item_title', 'verso_lite_hooks_open_content_div', 7);
add_action('woocommerce_after_shop_loop_item', 'verso_lite_hooks_close_div', 12);

function verso_lite_hooks_open_cart_div() {
    echo '<div class="product-cart-wrapper">';
}
add_action('woocommerce_after_shop_loop_item', 'verso_lite_hooks_open_cart_div', 8);
add_action('woocommerce_after_shop_loop_item', 'verso_lite_hooks_close_div', 11);

function verso_lite_hooks_open_title_div() {
    echo '<div class="product-title-wrapper">';
}
add_action('woocommerce_shop_loop_item_title', 'verso_lite_hooks_open_title_div', 8);
add_action('woocommerce_after_shop_loop_item', 'verso_lite_hooks_close_div', 4);


/*
  ============================
  BLOG LOOP CUSTOM FUNCTIONS
  ============================
*/
// Add sticky class to sticky post
function verso_lite_post_classes( $classes ){
    if ( is_sticky() ) {
        $classes[] = 'sticky';
    }
    return $classes;
}
add_filter('post_class', 'verso_lite_post_classes');

// Filter the except length to 20 characters.
function verso_lite_custom_excerpt_length( $length ) {
    global $post;
    if ($post->post_type == 'post')
    return 25;
    else if ($post->post_type == 'products')
    return 65;
    else if ($post->post_type == 'testimonial')
    return 75;
    else
    return 45;
}
add_filter( 'excerpt_length', 'verso_lite_custom_excerpt_length', 999 );

function verso_lite_posted_date(){

  /* Get the month, and day of the current post. */
	$month = get_the_time( 'M' );
	$day = get_the_time( 'd' );
	$posted_on = '';

	/* Add a link to the daily archive. */
	$posted_on .= $day . ' <span class="post-month">' . $month . '</span></a>';

    return $posted_on;
}

function verso_lite_posted_meta(){

    /* Get the year, month, and day of the current post. */
    $archive_year  = get_the_time('Y');
    $archive_month = get_the_time('m');
    $archive_day   = get_the_time('d');

    $categories = get_the_category();
    $seperator = ", ";
    $output = '';
    $i = 1;
    if( !empty($categories) ):
        foreach ($categories as $category) :
            if( $i > 1 ): $output .= $seperator; endif;
            $output .= '<a href="'. esc_url( get_category_link( $category->term_id ) ) .'" alt="'. esc_attr( 'View all post in%s', $category->name ) .'">' . esc_html( $category->name ) . '</a>';
            $i++;
        endforeach;
    endif;

    return '<div class="text-left">
                <span class="posted-by">'. esc_html__('By ', 'verso-lite') . get_the_author_posts_link() .'</span> <span class="meta-seperator">|</span> <span class="posted-on"><a href="'. get_day_link( $archive_year, $archive_month, $archive_day) .'">' . get_the_date() . '</a></span><span class="meta-seperator">|</span><span class="posted-in">'.
                esc_html__('In ', 'verso-lite') .$output. '</span> ' . get_the_tag_list('<span class="meta-seperator">|</span><span class="tags-list">'. esc_html__('Tags:', 'verso-lite').' ', ', ', '</span>') . '
            </div>';

}

function verso_lite_posted_footer(){
    global $post;
    $permalink = get_permalink($post->ID);
    $title = get_the_title();
    $comments_num = get_comments_number();
    if( comments_open() ){
        if( $comments_num == 0 ){
            $comments = esc_html__('Leave a comment', 'verso-lite');
        }
        elseif( $comments_num > 1 ){
            $comments = esc_html__('Comments ', 'verso-lite' ) . '<span class="comments-count">'.$comments_num.'</span>';
        }
        else{
            $comments = esc_html__('Comment ', 'verso-lite' ) . '<span class="comments-count">1</span>';
        }
        $comments = '<a class="comments-link scroll-down" href="' . get_comments_link() . '">'. $comments . '</a>';
    }
    else{
        $comments = esc_html__('Comments are closed', 'verso-lite');
    }
    return '<div class="post-footer-container">
          <div class="text-left">
            <div class="comments-counter-list"> ' . $comments .'</div>
          </div>
    </div>';
}

/*
	-------------------
	NUMERIC PAGINATION
	-------------------
*/
function verso_lite_pagination_bar() {
    if( is_singular() )
		return;

	global $wp_query;
    $label_prev = '<i class="fa fa-angle-double-left"></i>';
    $label_next = '<i class="fa fa-angle-double-right"></i>';

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="verso-navigation"><div class="verso-nav-block"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link($label_prev) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>&hellip;</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>&hellip;</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link($label_next) );

	echo '</ul></div></div>' . "\n";
}

//Post formats
/*
	-------------------
	GALLERY POST FORMAT
	-------------------
*/
function verso_lite_get_attachment( $num = 1 ){
  $output = '';
	if( has_post_thumbnail() && $num == 1 ):
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array (
			'post_type' => 'attachment',
			'posts_per_page' => $num,
			'post_parent' => get_the_ID()
		));
		if($attachments && $num == 1):
			foreach ($attachments as $attachment) :
				$output = wp_get_attachment_url($attachment->ID);
			endforeach;
		elseif ($attachments && $num > 1) :
			$output = $attachments;
		endif;

		wp_reset_postdata();

	endif;

	return $output;
}

function verso_lite_get_bs_slides( $attachments ){

  $output = array();
  $count = count($attachments)-1;

  for( $i=0; $i <= $count; $i++ ):

    $active = ($i == 0 ? ' active' : '');

    $n = ( $i == $count ? 0 : $i+1 );
    $nxtImg = wp_get_attachment_thumb_url( $attachments[$n]->ID );
    $p = ( $i == 0 ? $count : $i-1 );
    $prevImg = wp_get_attachment_thumb_url( $attachments[$p]->ID );
    $output[$i] = array(
      'class' => $active,
      'url'   => wp_get_attachment_url( $attachments[$i]->ID ),
      'next_img' => $nxtImg,
      'prev_img' => $prevImg,
      'caption' => $attachments[$i]->post_excerpt
    );

  endfor;

  return $output;
}

/*
	-------------------
	AUDIO AND VIDEO POST FORMAT
	-------------------
*/
function verso_lite_get_embedded_media( $type = array() ){
	$content = do_shortcode( apply_filters('the_content', get_the_content() ) );
	$embed = get_media_embedded_in_content( $content, $type );
	if( in_array( 'audio', $type) ):
		$output = str_replace('?visual=true','?visual=false',$embed[0]);
	else:
        if(isset($embed[0])){
				$output = $embed[0];
		} else {
			$output = '';
		}
	endif;
	return $output;
}


/* CHAT POST FORMAT */
function verso_lite_format_chat_content( $content ) {
	global $_post_format_chat_ids;

	/* If this is not a 'chat' post, return the content. */
	if ( !has_post_format( 'chat' ) )
		return $content;

	/* Set the global variable of speaker IDs to a new, empty array for this chat. */
	$_post_format_chat_ids = array();

	/* Allow the separator (separator for speaker/text) to be filtered. */
	$separator = apply_filters( 'verso_post_format_chat_separator', ':' );

	/* Open the chat transcript div and give it a unique ID based on the post ID. */
	$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript">';

	/* Split the content to get individual chat rows. */
	$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );

	/* Loop through each row and format the output. */
	foreach ( $chat_rows as $chat_row ) {

		/* If a speaker is found, create a new chat row with speaker and text. */
		if ( strpos( $chat_row, $separator ) ) {

			/* Split the chat row into author/text. */
			$chat_row_split = explode( $separator, trim( $chat_row ), 2 );

			/* Get the chat author and strip tags. */
			$chat_author = strip_tags( trim( $chat_row_split[0] ) );

			/* Get the chat text. */
			$chat_text = trim( $chat_row_split[1] );

			/* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
			$speaker_id = verso_format_chat_row_id( $chat_author );

			/* Open the chat row. */
			$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

			/* Add the chat row author. */
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><cite class="fn">' . apply_filters( 'verso_post_format_chat_author', $chat_author, $speaker_id ) . '</cite>' . $separator . '</div>';

			/* Add the chat row text. */
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'verso_post_format_chat_text', $chat_text, $chat_author, $speaker_id ) ) . '</div>';

			/* Close the chat row. */
			$chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
		}

		/**
		 * If no author is found, assume this is a separate paragraph of text that belongs to the
		 * previous speaker and label it as such, but let's still create a new row.
		 */
		else {

			/* Make sure we have text. */
			if ( !empty( $chat_row ) ) {

				/* Open the chat row. */
				$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

				/* Don't add a chat row author.  The label for the previous row should suffice. */

				/* Add the chat row text. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'verso_post_format_chat_text', $chat_row, $chat_author, $speaker_id ) ) . '</div>';

				/* Close the chat row. */
				$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
			}
		}
	}

	/* Close the chat transcript div. */
	$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";

	/* Return the chat content and apply filters for developers. */
	return apply_filters( 'verso_lite_post_format_chat_content', $chat_output );
}
add_filter( 'the_content', 'verso_lite_format_chat_content' );

add_filter( 'verso_lite_post_format_chat_text', 'wpautop' );

function verso_lite_format_chat_row_id( $chat_author ) {
	global $_post_format_chat_ids;

	/* Let's sanitize the chat author to avoid craziness and differences like "John" and "john". */
	$chat_author = strtolower( strip_tags( $chat_author ) );

	/* Add the chat author to the array. */
	$_post_format_chat_ids[] = $chat_author;

	/* Make sure the array only holds unique values. */
	$_post_format_chat_ids = array_unique( $_post_format_chat_ids );

	/* Return the array key for the chat author and add "1" to avoid an ID of "0". */
	return absint( array_search( $chat_author, $_post_format_chat_ids ) ) + 1;
}


/*
	-------------------
	LINK POST FORMAT
	-------------------
*/
function verso_lite_grab_url(){
  if( ! preg_match('/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ){
    return false;
  }
  return esc_url_raw( $links[1] );
}

/*
	-------------------
	Grab current uri
	-------------------
*/
function verso_lite_grab_current_uri(){
  $http = ( isset( $_SERVER["HTTPS"] ) ? 'https://' : 'http://' );
  $referer =  $http . $_SERVER["HTTP_HOST"];
  $archive_url = $referer . $_SERVER["REQUEST_URI"];

  return $archive_url;
}
/*
  ============================
  SINGLE POST CUSTOM FUNCTIONS
  ============================
*/
function verso_lite_post_navigation(){

  $nav = '<div class="row">';

  $prev = get_previous_post_link( '<div class="post-link-nav"><span class="previous">%link</span></div>', '%title' );
  $nav .= '<div class="col-xs-12 col-sm-6">' . $prev . '</div>';

  $next = get_next_post_link( '<div class="post-link-nav"><span class="next">%link</span></div>', '%title' );
  $nav .= '<div class="col-xs-12 col-sm-6 text-right">' . $next . '</div>';

  $nav .= '</div>';

  return $nav;
}

function verso_lite_get_post_navigation(){
  if( get_comment_pages_count() > 1 && get_option('page_comments') ):

    require get_template_directory() . '/inc/templates/verso-lite-comment-nav.php';

  endif;
}

/*
  ============================
  COMMENT FORM CUSTOM FUNCTIONS
  ============================
*/
function verso_lite_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'verso_lite_move_comment_field_to_bottom' );
