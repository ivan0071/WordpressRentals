<?php
/**
 * @var $atts
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$agency = $layout_style = $item_amount = $items = $image_size = $show_paging = $dots = $nav = $nav_position = $autoplay = $autoplaytimeout =
$items_md = $items_sm = $items_xs = $items_mb = $paged = $post_not_in = $el_class = '';

extract(shortcode_atts(array(
	'agency'        => '',
	'layout_style'    => 'agent-slider',
	'item_amount'     => '12',
	'items'           => '3',
	'image_size'      => '270x340',
	'show_paging'     => '',
	'dots'            => '',
	'nav'             => 'true',
	'nav_position'    => 'center',
	'autoplay'        => 'true',
	'autoplaytimeout' => '1000',
	'items_md'        => '3',
	'items_sm'        => '2',
	'items_xs'        => '2',
	'items_mb'        => '1',
	'post_not_in'     => '',
	'el_class'        => '',
	'paged'           => '1'
), $atts));

$wrapper_attributes = array();
$wrapper_styles = array();

$wrapper_classes = array(
	'ere-agent',
	$layout_style,
	$el_class
);

$gf_item_wrap = '';

if ($layout_style == 'agent-slider') {
	$wrapper_classes[] = 'owl-carousel manual';
	$show_paging = 'false';

	if ($nav) {
		$wrapper_classes[] = 'owl-nav-' . $nav_position;
	}

	$owl_responsive_attributes = array();
	// Mobile <= 480px
	$owl_responsive_attributes[] = '"0" : {"items" : ' . $items_mb . ', "margin": 0}';

	// Extra small devices ( < 768px)
	$owl_responsive_attributes[] = '"481" : {"items" : ' . $items_xs . ', "margin": 30}';

	// Small devices Tablets ( < 992px)
	$owl_responsive_attributes[] = '"768" : {"items" : ' . $items_sm . ', "margin": 30}';

	// Medium devices ( < 1199px)
	$owl_responsive_attributes[] = '"992" : {"items" : ' . $items_md . ', "margin": 30}';

	// Medium devices ( > 1199px)
	$owl_responsive_attributes[] = '"1200" : {"items" : ' . $items . ', "margin": 30}';

	$owl_attributes = array(
		'"dots": ' . ($dots ? 'true' : 'false'),
		'"nav": ' . ($nav ? 'true' : 'false'),
		'"autoplay": ' . ($autoplay ? 'true' : 'false'),
		'"autoplayTimeout": ' . $autoplaytimeout,
		'"responsive": {' . implode(', ', $owl_responsive_attributes) . '}'
	);
	$wrapper_attributes[] = "data-plugin-options='{" . implode(', ', $owl_attributes) . "}'";
}
if ($layout_style == 'agent-grid') {
	$gf_item_wrap = 'ere-item-wrap';
	$wrapper_classes[] = 'row columns-' . $items . ' columns-md-' . $items_md . ' columns-sm-' . $items_sm . ' columns-xs-' . $items_xs . ' columns-mb-' . $items_mb . '';
}
$posts_per_page = $item_amount ? $item_amount : -1;

// $args = array(
// 	'post_type'      => 'agent',
// 	'paged'          => $paged,
// 	'posts_per_page' => $posts_per_page,
// 	'orderby'   => array(
// 		'menu_order'=>'ASC',
// 		'date' =>'DESC',
// 	),
// 	'post_status'    => 'publish',
// 	'post__not_in'   => array($post_not_in)
// );

// if ($agency != '') {
// 	$args['tax_query'] = array(
// 		array(
// 			'taxonomy' => 'agency',
// 			'field'    => 'slug',
// 			'terms'    => explode(',', $agency),
// 			'operator' => 'IN'
// 		)
// 	);
// }

// $data = new WP_Query($args);
// wp_reset_postdata();



// $args = array(
// 	'post_type' => 'property',
// 	'post_status' => 'publish',
// 	'meta_query' => array(
// 		'relation' => 'OR',
// 		array(
// 			'key' => ERE_METABOX_PREFIX . 'property_agent',
// 			'value' => explode(',', $agent_id),
// 			'compare' => 'IN'
// 		),
// 		array(
// 			'key' => ERE_METABOX_PREFIX . 'property_author',
// 			'value' => explode(',', $user_id),
// 			'compare' => 'IN'
// 		)
// 	)
// );
// $properties = new WP_Query($args);
//var_dump($properties->found_posts);


$args = array(
    'posts_per_page'    => -1,
    'orderby'           => 'post_date',
    'order'             => 'DESC',
	'post_status'      	=> 'publish',
	'post_type'      	=> 'property',
    'meta_query' => array(
        array(
            'key'     => 'real_estate_property_featured',
            'value'   => '1',
            'compare' => '=',
        ),
    ),
);
$featured_posts = new WP_Query($args);
//var_dump($featured_posts);

$min_suffix = ere_get_option('enable_min_css', 0) == 1 ? '.min' : '';
wp_print_styles( ERE_PLUGIN_PREFIX . 'home-featured-slider');

$min_suffix_js = ere_get_option('enable_min_js', 0) == 1 ? '.min' : '';
wp_enqueue_script(ERE_PLUGIN_PREFIX . 'owl_carousel', ERE_PLUGIN_URL . 'public/assets/js/ere-carousel' . $min_suffix_js . '.js', array('jquery'), ERE_PLUGIN_VER, true);
wp_enqueue_script(ERE_PLUGIN_PREFIX . 'home-featured-slider', ERE_PLUGIN_URL . 'public/templates/shortcodes/home-featured-slider/assets/js/home-featured-slider' . $min_suffix_js . '.js', array('jquery'), ERE_PLUGIN_VER, true);

?>
	<div class="ere-agent-wrap">
		<?php if ($featured_posts->have_posts()): ?>
			<div class="<?php echo join(' ', $wrapper_classes) ?>" <?php echo implode(' ', $wrapper_attributes); ?>>
				<?php
				$no_avatar_src= ERE_PLUGIN_URL . 'public/assets/images/profile-avatar.png';
				$default_avatar=ere_get_option('default_user_avatar','');
				if (preg_match('/\d+x\d+/', $image_size)) {
					$image_sizes = explode('x', $image_size);
					$width = $image_sizes[0];
					$height = $image_sizes[1];
					if($default_avatar!='')
					{
						if(is_array($default_avatar)&& $default_avatar['url']!='')
						{
							$resize = ere_image_resize_url($default_avatar['url'], $width, $height, true);
							if ($resize != null && is_array($resize)) {
								$no_avatar_src = $resize['url'];
							}
						}
					}
				} else {
					if($default_avatar!='')
					{
						if(is_array($default_avatar)&& $default_avatar['url']!='')
						{
							$no_avatar_src = $default_avatar['url'];
						}
					}
				}
				while ($featured_posts->have_posts()): $featured_posts->the_post();
					$agent_id = get_the_ID();
					$agent_name = get_the_title();
					$agent_link = get_the_permalink();

					$property_post_meta_data = get_post_custom($agent_id);

					$property_location_zip = isset($property_post_meta_data[ ERE_METABOX_PREFIX . 'property_location_zip' ] ) ? $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_location_zip' ][0] : '';
					
					$property_price_prefix      = isset( $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_price_prefix' ] ) ? $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_price_prefix' ][0] : '';
					$property_price_postfix      = isset( $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_price_postfix' ] ) ? $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_price_postfix' ][0] : '';
					$property_price              = isset( $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_price' ] ) ? $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_price' ][0] : '';
					$property_price_short              = isset( $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_price_short' ] ) ? $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_price_short' ][0] : '';
					$property_price_unit             = isset( $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_price_unit' ] ) ? $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_price_unit' ][0] : '';
					
					$property_rent_price         = isset( $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_rent_price' ] ) ? $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_rent_price' ][0] : '';
					$property_rent_charges         = isset( $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_rent_charges' ] ) ? $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_rent_charges' ][0] : '';
					$property_sale_price         = isset( $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_sale_price' ] ) ? $property_post_meta_data[ ERE_METABOX_PREFIX . 'property_sale_price' ][0] : '';
					
					$property_status = get_the_terms( $agent_id, 'property-status' );
					$for_rent = false;
					$for_sale = false;
					if ( $property_status ) :
						foreach ( $property_status as $status ) :
							if ($status->slug == "for-rent") :
								$for_rent = true;
							elseif ($status->slug == "for-sale") :
								$for_sale = true;
							endif;
						endforeach;
					endif;

					$agent_position = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_position']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_position'][0] : '';
					$agent_description = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_description']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_description'][0] : '';
					$email = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_email']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_email'][0] : '';
					$agent_facebook_url = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_facebook_url']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_facebook_url'][0] : '';
					$agent_twitter_url = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_twitter_url']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_twitter_url'][0] : '';
					$agent_googleplus_url = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_googleplus_url']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_googleplus_url'][0] : '';
					$agent_linkedin_url = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_linkedin_url']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_linkedin_url'][0] : '';
					$agent_pinterest_url = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_pinterest_url']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_pinterest_url'][0] : '';
					$agent_instagram_url = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_instagram_url']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_instagram_url'][0] : '';
					$agent_skype = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_skype']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_skype'][0] : '';
					$agent_youtube_url = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_youtube_url']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_youtube_url'][0] : '';
					$agent_vimeo_url = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_vimeo_url']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_vimeo_url'][0] : '';
					$agent_user_id = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'agent_user_id']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'agent_user_id'][0] : '';
					$user = get_user_by('id', $agent_user_id);
					if (empty($user)) {
						$agent_user_id = 0;
					}
					$property_bedrooms = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'property_bedrooms']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'property_bedrooms'][0] : '0';
                    $property_bathrooms = isset($property_post_meta_data[ERE_METABOX_PREFIX . 'property_bathrooms']) ? $property_post_meta_data[ERE_METABOX_PREFIX . 'property_bathrooms'][0] : '0';
					$avatar_id = get_post_thumbnail_id($agent_id);
					$avatar_src = $default_avatar_src = '';
					$item_class = '';
					$width = 270;
					$height = 340;
					if (preg_match('/\d+x\d+/', $image_size)) {
						$image_sizes = explode('x', $image_size);
						$width = $image_sizes[0];
						$height = $image_sizes[1];
						$avatar_src = ere_image_resize_id($avatar_id, $width, $height, true);
					} else {
						if (!in_array($image_size, array('full', 'thumbnail'))) {
							$image_size = 'full';
						}
						$avatar_src = wp_get_attachment_image_src($avatar_id, $image_size);
						if ($avatar_src && !empty($avatar_src[0])) {
							$avatar_src = $avatar_src[0];
						}
						if (!empty($avatar_src)) {
							list($width, $height) = getimagesize($avatar_src);
						}
					}
					?>
					<div class="agent-item <?php echo esc_attr($gf_item_wrap) ?>">
						<div class="agent-item-inner">
							<div class="agent-avatar">
								<a title="<?php echo esc_attr($agent_name) ?>"
								   href="<?php echo esc_url($agent_link) ?>"><img width="<?php echo esc_attr($width) ?>"
									 height="<?php echo esc_attr($height) ?>"
									 onerror="this.src = '<?php echo esc_url($no_avatar_src) ?>';"
									 src="<?php echo esc_url($avatar_src) ?>"
									 alt="<?php echo esc_attr($agent_name) ?>"
									 title="<?php echo esc_attr($agent_name) ?>"></a>
							</div>
							<div class="agent-content">
							<div class="agent-info">
								<div class="agent-info-section-left">
									<?php if (!empty($agent_name)): ?>
										<h2 class="agent-name"><a title="<?php echo esc_attr($agent_name) ?>"
																href="<?php echo esc_url($agent_link) ?>"><?php echo esc_html($agent_name) ?></a>
										</h2>
									<?php endif; ?>
									<?php if (!empty($property_location_zip)): ?>
										<p><?php echo esc_html($property_location_zip) ?></p>
									<?php endif; ?>
								</div>
								<div class="agent-info-section-right">
									<div class="property-rooms">
										<?php if (!empty($property_bedrooms)): ?>										
											<span class="fa fa-hotel"> <?php echo esc_html($property_bedrooms) ?></span>
										<?php endif; ?>
										&nbsp;
										<?php if (!empty($property_bathrooms)): ?>
											<span class="fa fa-bath"> <?php echo esc_html($property_bathrooms) ?></span>
										<?php endif; ?>
									</div>

									<?php if ($for_rent == true && $for_sale == true) { ?>
										<div class="property-price-div">			
											<?php if (!empty( $property_rent_price )): ?>
												<?php 
													$property_rent_price_total = (float)$property_rent_price;
													if (!empty( $property_rent_charges )) {
														$property_rent_price_total += (float)$property_rent_charges;
													}
												?>
												<span title="Rent Price" class="property-price"><?php echo ere_get_money_with_currency_symbol($property_rent_price_total); ?></span>
											<?php else: ?>
												<span title="Rent Price" class="property-price"><?php echo ere_get_money_with_currency_symbol(ere_get_option( 'empty_price_text', 'POA' )) ?></span>
											<?php endif; ?>	
											/
											<?php if (!empty( $property_sale_price )): ?>
												<span title="Sale Price" class="property-price"><?php echo ere_get_money_with_currency_symbol($property_sale_price); ?></span>
											<?php else: ?>
												<span title="Sale Price" class="property-price"><?php echo ere_get_money_with_currency_symbol(ere_get_option( 'empty_price_text', 'POA' )) ?></span>
											<?php endif; ?>	
										</div>
									<?php } else if ($for_rent == true) { ?>
										<div class="property-price-div">
											<?php if (!empty( $property_rent_price )): ?>
												<?php 
													$property_rent_price_total = (float)$property_rent_price;
													if (!empty( $property_rent_charges )) {
														$property_rent_price_total += (float)$property_rent_charges;
													}
												?>
												<span title="Rent Price" class="property-price"><?php echo ere_get_money_with_currency_symbol($property_rent_price_total); ?></span>
											<?php else: ?>
												<span title="Rent Price" class="property-price"><?php echo ere_get_money_with_currency_symbol(ere_get_option( 'empty_price_text', 'POA' )) ?></span>
											<?php endif; ?>	
										</div>
									<?php } else if ($for_sale == true) { ?>
										<?php if (!empty( $property_sale_price )): ?>
											<span title="Sale Price" class="property-price"><?php echo ere_get_money_with_currency_symbol($property_sale_price); ?></span>
											<?php else: ?>
											<span title="Sale Price" class="property-price"><?php echo ere_get_money_with_currency_symbol(ere_get_option( 'empty_price_text', 'POA' )) ?></span>
										<?php endif; ?>	
									<?php } ?>
									<?php /*
									<div class="property-price">111
										<?php if (!empty( $property_price ) ): ?>
											<span class="property-price">
											<?php if(!empty( $property_price_prefix )) {echo '<span class="property-price-prefix">'.$property_price_prefix.' </span>';} ?>
											<?php
											echo ere_get_format_money( $property_price_short,$property_price_unit );
											?>
											<?php if(!empty( $property_price_postfix )) {echo '<span class="property-price-postfix"> / '.$property_price_postfix.'</span>';} ?>
										</span>
										<?php elseif (ere_get_option( 'empty_price_text', '' )!='' ): ?>
											<span class="property-price"><?php echo ere_get_option( 'empty_price_text', '' ) ?></span>
										<?php endif; ?>
									</div> */ ?>
								</div>
								<br>
								<!--
								<span><?php /*
									$ere_property = new ERE_Property();
									$total_property = $ere_property->get_total_properties_by_user($agent_id, $agent_user_id);
									printf( _n( '%s property', '%s properties', $total_property, 'essential-real-estate' ), ere_get_format_number($total_property ));
									*/ ?></span>
								-->							


								<?php /* if (!empty($agent_description) && ($layout_style == 'agent-list')): ?>
									<p><?php echo esc_html($agent_description) ?></p>
								<?php endif; */ ?>
							</div>
							<?php /*
							<div class="agent-social">
								<?php if (!empty($agent_facebook_url)): ?>
									<a title="Facebook" href="<?php echo esc_url($agent_facebook_url); ?>">
										<i class="fa fa-facebook"></i>
									</a>
								<?php endif; ?>
								<?php if (!empty($agent_twitter_url)): ?>
									<a title="Twitter" href="<?php echo esc_url($agent_twitter_url); ?>">
										<i class="fa fa-twitter"></i>
									</a>
								<?php endif; ?>
								<?php if (!empty($agent_googleplus_url)): ?>
									<a title="Google Plus" href="<?php echo esc_url($agent_googleplus_url); ?>">
										<i class="fa fa-google-plus"></i>
									</a>
								<?php endif; ?>
								<?php if (!empty($email)): ?>
									<a title="Email" href="mailto:<?php echo esc_attr($email); ?>">
										<i class="fa fa-envelope"></i>
									</a>
								<?php endif; ?>
								<?php if (!empty($agent_skype)): ?>
									<a title="Skype" href="skype:<?php echo esc_url($agent_skype); ?>?call">
										<i class="fa fa-skype"></i>
									</a>
								<?php endif; ?>
								<?php if (!empty($agent_linkedin_url)): ?>
									<a title="Linkedin" href="<?php echo esc_url($agent_linkedin_url); ?>">
										<i class="fa fa-linkedin"></i>
									</a>
								<?php endif; ?>
								<?php if (!empty($agent_pinterest_url)): ?>
									<a title="Pinterest" href="<?php echo esc_url($agent_pinterest_url); ?>">
										<i class="fa fa-pinterest"></i>
									</a>
								<?php endif; ?>
								<?php if (!empty($agent_instagram_url)): ?>
									<a title="Instagram" href="<?php echo esc_url($agent_instagram_url); ?>">
										<i class="fa fa-instagram"></i>
									</a>
								<?php endif; ?>
								<?php if (!empty($agent_youtube_url)): ?>
									<a title="Youtube" href="<?php echo esc_url($agent_youtube_url); ?>">
										<i class="fa fa-youtube-play"></i>
									</a>
								<?php endif; ?>
								<?php if (!empty($agent_vimeo_url)): ?>
									<a title="Vimeo" href="<?php echo esc_url($agent_vimeo_url); ?>">
										<i class="fa fa-vimeo"></i>
									</a>
								<?php endif; ?>
							</div>
							*/ ?>
						</div>
						</div>
					</div>
				<?php
				endwhile;

				if ($show_paging != 'false') {
					?>
					<div class="agent-paging-wrap" data-admin-url="<?php echo ERE_AJAX_URL; ?>"
						 data-layout="<?php echo esc_attr($layout_style); ?>"
						 data-item-amount="<?php echo esc_attr($item_amount); ?>"
						 data-image-size="<?php echo esc_attr($image_size); ?>"
						 data-items="<?php echo esc_attr($items); ?>"
						 data-show-paging="<?php echo esc_attr($show_paging); ?>"
						 data-post-not-in="<?php echo esc_attr($post_not_in); ?>">
						<?php $max_num_pages = $featured_posts->max_num_pages;
						set_query_var('paged', $paged);
						ere_get_template('global/pagination.php', array('max_num_pages' => $max_num_pages));
						?>
					</div>
				<?php } ?>
			</div>
		<?php else: ?>
			<div class="item-not-found"><?php esc_html_e('No item found', 'essential-real-estate'); ?></div>
		<?php endif; ?>
	</div>
<?php
wp_reset_postdata();