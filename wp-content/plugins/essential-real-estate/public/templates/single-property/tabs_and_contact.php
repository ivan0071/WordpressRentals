<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 17/01/2017
 * Time: 09:50 AM
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $post;
$property_id=get_the_ID();
$property_meta_data = get_post_custom($property_id);
// $property_types = get_the_terms($property_id, 'property-type');
// $property_type_arr = array();
// if ($property_types) {
//     foreach ($property_types as $property_type) {
//         $property_type_arr[] = $property_type->name;
//     }
// }

$property_status = get_the_terms($property_id, 'property-status');
$property_status_arr = array();
if ($property_status) {
    foreach ($property_status as $property_stt) {
        $property_status_arr[] = $property_stt->name;
    }
}

$property_features = get_the_terms($property_id, 'property-feature');

$property_label = get_the_terms($property_id, 'property-label');
$property_label_arr = array();
if ($property_label) {
    foreach ($property_label as $label) {
        $property_label_arr[] = $label->name;
    }
}
$property_identity = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_identity']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_identity'][0] : '';
$property_video = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_video_url']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_video_url'][0] : '';
$property_video_image = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_video_image']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_video_image'][0] : '';
$property_image_360 = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_image_360', true);
$property_image_360 = (isset($property_image_360) && is_array($property_image_360)) ? $property_image_360['url'] : '';
$property_virtual_tour = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_virtual_tour', true);
$property_virtual_tour_type = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_virtual_tour_type', true);
if (empty($property_virtual_tour_type)) {
    $property_virtual_tour_type = '0';
}
$price = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price'][0] : '';
$price_short = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_short']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_short'][0] : '';
$price_unit = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_unit']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_unit'][0] : '';
$price_prefix = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_prefix']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_prefix'][0] : '';
$price_postfix = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_postfix']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_postfix'][0] : '';
$property_year = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_year']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_year'][0] : '';
$property_rooms = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_rooms']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_rooms'][0] : '0';
$property_bathrooms = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_bathrooms']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_bathrooms'][0] : '0';
$property_bedrooms = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_bedrooms']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_bedrooms'][0] : '0';
$property_garage_size = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_garage_size']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_garage_size'][0] : '';
$property_size = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_size']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_size'][0] : '';
$additional_features = isset($property_meta_data[ERE_METABOX_PREFIX . 'additional_features']) ? $property_meta_data[ERE_METABOX_PREFIX . 'additional_features'][0] : '';
$measurement_units = ere_get_measurement_units();
$measurement_units_land_area = ere_get_measurement_units_land_area();

$additional_feature_title = $additional_feature_value = null;
if ($additional_features > 0) {
    $additional_feature_title = get_post_meta($property_id, ERE_METABOX_PREFIX . 'additional_feature_title', true);
    $additional_feature_value = get_post_meta($property_id, ERE_METABOX_PREFIX . 'additional_feature_value', true);
}
$property_garage = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_garage']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_garage'][0] : '0';
$property_land = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_land']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_land'][0] : '';
$additional_fields = ere_render_additional_fields();

$property_attach_floorplan_arg = get_post_meta(get_the_ID(), ERE_METABOX_PREFIX . 'property_attach_floorplan', false);
$property_attach_floorplans = (isset($property_attach_floorplan_arg) && is_array($property_attach_floorplan_arg) && count($property_attach_floorplan_arg) > 0) ? $property_attach_floorplan_arg[0] : '';
$property_attach_floorplans = explode('|', $property_attach_floorplans);
$property_attach_floorplans = array_unique($property_attach_floorplans);
$property_has_floorplans = false;
if ($property_attach_floorplan_arg && !empty($property_attach_floorplans[0])) {
    $property_has_floorplans = true;
}

$property_location = get_post_meta( get_the_ID(), ERE_METABOX_PREFIX . 'property_location', true );
$property_map_address = isset($property_location['address']) ? $property_location['address'] : '';
list( $propertyLat, $propertyLong ) =  isset($property_location['location']) ? explode( ',', $property_location['location'] ) : array('', '');

$agent_display_option = isset($property_meta_data[ ERE_METABOX_PREFIX . 'agent_display_option' ]) ? $property_meta_data[ ERE_METABOX_PREFIX . 'agent_display_option' ][0] : '';

wp_enqueue_script('bootstrap-tabcollapse');
?>

<div class="single-property-element property-info-tabs property-tab display-flex">
    <div class="ere-property-element property-tabs-left">
        <ul id="ere-features-tabs" class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#ere-description"><?php esc_html_e('Description', 'essential-real-estate'); ?></a>
            </li>
          <?php if ($property_has_floorplans == true): ?>
            <li>
                <a data-toggle="tab" href="#ere-floorplan"><?php esc_html_e('Floorplan', 'essential-real-estate'); ?></a>
            </li>
          <?php endif; ?>
            <li>
                <a id="map-link-<?php echo get_the_ID(); ?>" data-toggle="tab" href="#ere-map"><?php esc_html_e('Map', 'essential-real-estate'); ?></a>
            </li>
          <?php if (!empty($property_video)): ?>
            <li>
                <a data-toggle="tab" href="#ere-video"><?php esc_html_e('Video', 'essential-real-estate'); ?></a>
            </li>
          <?php endif; ?>
          <?php if ((!empty($property_image_360) || !empty($property_virtual_tour)) && ($property_virtual_tour_type == '0' || $property_virtual_tour_type == '1')): ?>
            <li>
                <a data-toggle="tab" href="#ere-virtual_tour_360"><?php esc_html_e('Virtual Tour', 'essential-real-estate'); ?></a>
            </li>
          <?php endif; ?>
        </ul>
        <div class="tab-content">
            <div id="ere-description" class="tab-pane fade in active">
				<strong><?php esc_html_e('Property full description', 'essential-real-estate'); ?></strong>
				<br>
				<?php the_content(); ?>
				<?php
                    $features_terms_id = array();
                    if (!is_wp_error($property_features) && $property_features != false) {
                        foreach ($property_features as $feature) {
                            $features_terms_id[] = intval($feature->term_id);
                        }
					}					
					if (count($features_terms_id) > 0) {
				?>
					<br>
					<strong><?php esc_html_e('Property Featues', 'essential-real-estate'); ?></strong>
					<br>
				<?php
					}
                    $all_features = get_categories(array(
                        'taxonomy' => 'property-feature',
                        'hide_empty' => 0,
                        'orderby' => 'term_id',
                        'order' => 'ASC'
                    ));
                    $parents_items = $child_items = array();
                    if ($all_features) {
                        foreach ($all_features as $term) {
                            if (0 == $term->parent) $parents_items[] = $term;
                            if ($term->parent) $child_items[] = $term;
                        };
                        $property_archive_link = get_post_type_archive_link('property');

                        if (is_taxonomy_hierarchical('property-feature') && count($child_items) > 0) {
                            foreach ($parents_items as $parents_item) {
                                echo '<h4>' . $parents_item->name . '</h4>';
                                echo '<div class="row mg-bottom-30">';
                                foreach ($child_items as $child_item) {
                                    if ($child_item->parent == $parents_item->term_id) {
                                        $term_link = get_term_link($child_item, 'property-feature');

                                        if (in_array($child_item->term_id, $features_terms_id)) {
                                            echo '<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap"><a href="' . esc_url($term_link) . '" class="feature-checked"><i class="fa fa-check-square-o"></i> ' . $child_item->name . '</a></div>';
                                        } else {
                                            $hide_empty_features = ere_get_option('hide_empty_features', 1);
                                            if ($hide_empty_features != 1) {
                                                echo '<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap"><a href="' . esc_url($term_link) . '" class="feature-unchecked"><i class="fa fa-square-o"></i> ' . $child_item->name . '</a></div>';
                                            }
                                        }
                                    };
                                };
                                echo '</div>';
                            };
                        } else {
                            echo '<div class="row">';
                            foreach ($parents_items as $parents_item) {
                                $term_link = get_term_link($parents_item, 'property-feature');

                                if (in_array($parents_item->term_id, $features_terms_id)) {
                                    echo '<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap"><a href="' . esc_url($term_link) . '" class="feature-checked"><i class="fa fa-check-square-o"></i> ' . $parents_item->name . '</a></div>';
                                } else {
                                    $hide_empty_features = ere_get_option('hide_empty_features', 1);
                                    if ($hide_empty_features != 1) {
                                        echo '<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap"><a href="' . esc_url($term_link) . '" class="feature-unchecked"><i class="fa fa-square-o"></i> ' . $parents_item->name . '</a></div>';
                                    }
                                }
                            };
                            echo '</div>';
                        };
                    };
                    ?>
				<?php /*
				<ul class="list-2-col ere-property-list">
                    <li>
                        <strong><?php esc_html_e('Property ID', 'essential-real-estate'); ?></strong>
                    <span><?php
                        if (!empty($property_identity)) {
                            echo esc_html($property_identity);
                        } else {
                            echo esc_html($property_id);
                        }
                        ?></span>
                    </li>
                    <?php if (!empty($price)): ?>
                        <li>
                            <strong><?php esc_html_e('Price', 'essential-real-estate'); ?></strong>
                        <span class="ere-property-price">
                                    <?php if (!empty($price_prefix)) {
                                        echo '<span class="property-price-prefix">' . $price_prefix . ' </span>';
                                    } ?>
                                    <?php echo ere_get_format_money($price_short, $price_unit) ?>
                                    <?php if (!empty($price_postfix)) {
                                        echo '<span class="property-price-postfix"> / ' . $price_postfix . '</span>';
                                    } ?>
                                </span>
                        </li>
                    <?php elseif (ere_get_option('empty_price_text', '') != ''): ?>
                        <li>
                            <strong><?php esc_html_e('Price', 'essential-real-estate'); ?></strong>
                            <span><?php echo ere_get_option('empty_price_text', '') ?></span>
                        </li>
                    <?php endif; ?>
                    <?php /* if (count($property_type_arr) > 0): ?>
                        <li>
                            <strong><?php esc_html_e('Property Type', 'essential-real-estate'); ?></strong>
                            <span><?php echo join(', ', $property_type_arr) ?></span>
                        </li>
                    <?php endif; * / ?>
                    <?php if (count($property_status_arr) > 0): ?>
                        <li>
                            <strong><?php esc_html_e('Property status', 'essential-real-estate'); ?></strong>
                            <span><?php echo join(', ', $property_status_arr) ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($property_rooms)): ?>
                        <li>
                            <strong><?php esc_html_e('Rooms', 'essential-real-estate'); ?></strong>
                            <span><?php echo esc_html($property_rooms) ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($property_bedrooms)): ?>
                        <li>
                            <strong><?php esc_html_e('Bedrooms', 'essential-real-estate'); ?></strong>
                            <span><?php echo esc_html($property_bedrooms) ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($property_bathrooms)): ?>
                        <li>
                            <strong><?php esc_html_e('Bathrooms', 'essential-real-estate'); ?></strong>
                            <span><?php echo esc_html($property_bathrooms) ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($property_year)): ?>
                        <li>
                            <strong><?php esc_html_e('Year Built', 'essential-real-estate'); ?></strong>
                            <span><?php echo esc_html($property_year) ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($property_size)): ?>
                        <li>
                            <strong><?php esc_html_e('Size', 'essential-real-estate'); ?></strong>

                            <span><?php echo sprintf('%s %s', ere_get_format_number($property_size), $measurement_units); ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($property_land)): ?>
                        <li>
                            <strong><?php esc_html_e('Land area', 'essential-real-estate'); ?></strong>
                       <span><?php $measurement_units = ere_get_measurement_units();
                           echo sprintf('%s %s', ere_get_format_number($property_land), $measurement_units_land_area); ?></span>
                        </li>
                    <?php endif; ?>

                    <?php if (count($property_label_arr) > 0): ?>
                        <li>
                            <strong><?php esc_html_e('Label', 'essential-real-estate'); ?></strong>
                            <?php if ($property_label_arr): ?>
                                <span><?php echo join(', ', $property_label_arr) ?></span><?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <?php if (!empty($property_garage)): ?>
                        <li>
                            <strong><?php esc_html_e('Garages', 'essential-real-estate'); ?></strong>
                            <span><?php echo esc_html($property_garage) ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($property_garage_size)): ?>
                        <li>
                            <strong><?php esc_html_e('Garage Size', 'essential-real-estate'); ?></strong>
                            <span><?php echo sprintf('%s %s', $property_garage_size, $measurement_units); ?></span>
                        </li>
                    <?php endif; ?>
                    <?php
                    if (count($additional_fields) > 0):
                        foreach ($additional_fields as $key => $field):
                            $property_field = get_post_meta($property_id, $field['id'], true);
                            if (!empty($property_field)):?>
                                <li>
                                    <strong><?php echo esc_html($field['title']); ?></strong>
                                <span><?php
                                    if ($field['type'] == 'checkbox_list') {
                                        $text = '';
                                        if (count($property_field) > 0) {
                                            foreach ($property_field as $value => $v) {
                                                $text .= $v . ', ';
                                            }
                                        }
                                        $text = rtrim($text, ', ');
                                        echo esc_html($text);
                                    } else {
                                        echo esc_html($property_field);
                                    }
                                    ?></span>
                                </li>
                                <?php
                            endif;
                        endforeach;
                    endif; ?>

                    <?php for ($i = 0; $i < $additional_features; $i++) { ?>
                        <?php if (!empty($additional_feature_title[$i]) && !empty($additional_feature_value[$i])): ?>
                            <li>
                                <strong><?php echo esc_html($additional_feature_title[$i]); ?></strong>
                                <span><?php echo esc_html($additional_feature_value[$i]) ?></span>
                            </li>
                        <?php endif; ?>
					<?php } 
				</ul>
				*/ ?>                
            </div>
          <?php if ($property_has_floorplans == true): ?>
            <div id="ere-floorplan" class="tab-pane fade">
                <div class="single-property-element property-attachments">
                    <div class="ere-property-element row">
                        <?php
                        foreach ($property_attach_floorplans as $attach_id):
                            $attach_url = wp_get_attachment_url($attach_id);
                            $file_type = wp_check_filetype($attach_url);
                            $file_type_name = isset($file_type['ext']) ? $file_type['ext'] : '';
                            if (!empty($file_type_name)):
                                $thumb_url = ERE_PLUGIN_URL . 'public/assets/images/attachment/attach-' . $file_type_name . '.png';
                                $file_name = basename($attach_url);
                                ?>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 media-thumb-wrap">
                                    <figure class="media-thumb">
                                        <img src="<?php echo esc_url($thumb_url); ?>" alt="">
                                    </figure>
                                    <div class="media-info">
                                        <strong><?php echo esc_html($file_name) ?></strong>
                                        <a target="_blank"
                                            href="<?php echo esc_url($attach_url); ?>"><?php esc_html_e('Download', 'essential-real-estate'); ?></a>
                                    </div>
                                </div>
                                <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
          <?php endif; ?>
            <div id="ere-map" class="tab-pane fade">
                <?php ere_get_template( 'single-property/property-on-map.php', array(
                    'propertyID' => get_the_ID(),
                    'propertyLat' => $propertyLat,
                    'propertyLong' => $propertyLong
                )); ?>
            </div>
            <?php if (!empty($property_video)) : ?>
                <div id="ere-video" class="tab-pane fade">
                    <div class="video<?php if (!empty($property_video_image)): ?> video-has-thumb<?php endif; ?>">
                        <div class="entry-thumb-wrap">
                            <?php if (wp_oembed_get($property_video)) : ?>
                                <?php
                                $image_src = ere_image_resize_id($property_video_image, 870, 420, true);
                                $width = '870';
                                $height = '420';
                                if (!empty($image_src)):?>
                                    <div class="entry-thumbnail property-video ere-light-gallery">
                                        <img class="img-responsive" src="<?php echo esc_url($image_src); ?>"
                                             width="<?php echo esc_attr($width) ?>"
                                             height="<?php echo esc_attr($height) ?>"
                                             alt="<?php the_title_attribute(); ?>"/>
                                        <a class="ere-view-video"
                                           data-src="<?php echo esc_url($property_video); ?>"><i
                                                class="fa fa-play-circle-o"></i></a>
                                    </div>
                                <?php else: ?>
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-full">
                                        <?php echo wp_oembed_get($property_video, array('wmode' => 'transparent')); ?>
                                    </div>
                                <?php endif; ?>
                            <?php else : ?>
                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-full">
                                    <?php echo wp_kses_post($property_video); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            if (!empty($property_image_360) && $property_virtual_tour_type == '0') :?>
                <div id="ere-virtual_tour_360" class="tab-pane fade">
                    <iframe width="100%" height="600" scrolling="no" allowfullscreen
                            src="<?php echo ERE_PLUGIN_URL . "public/assets/packages/vr-view/index.html?image=" . esc_url($property_image_360); ?>"></iframe>
                </div>
            <?php elseif (!empty($property_virtual_tour) && $property_virtual_tour_type == '1'): ?>
                <div id="ere-virtual_tour_360" class="tab-pane fade">
                    <?php echo(!empty($property_virtual_tour) ? do_shortcode($property_virtual_tour) : '') ?>
                </div>
            <?php endif; ?>
        </div>
	</div>
	<div class="ere-property-element property-contact-right" style="100%">

    Contact Agent
    <div class="single-property-element property-contact-agent">
        <div class="ere-property-element">
        <?php
        $property_agent       = isset($property_meta_data[ ERE_METABOX_PREFIX . 'property_agent' ]) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_agent' ][0] : '';
        $agent_type = '';$user_id=0;
        if ( $agent_display_option == 'author_info' || ( $agent_display_option == 'other_info') || ( $agent_display_option == 'agent_info' && ! empty( $property_agent ) ) ):
                $email = $avatar_src = $agent_link = $agent_name = $agent_position = $agent_facebook_url = $agent_twitter_url =
                $agent_googleplus_url = $agent_linkedin_url = $agent_pinterest_url = $agent_skype =
                $agent_youtube_url = $agent_vimeo_url = $agent_mobile_number = $agent_office_address = $agent_website_url = $agent_description = '';
                if ( $agent_display_option != 'other_info' ) {
                    $width = 270; $height = 340;
                    $no_avatar_src= ERE_PLUGIN_URL . 'public/assets/images/profile-avatar.png';
                    $default_avatar=ere_get_option('default_user_avatar','');
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
                    if( $agent_display_option == 'author_info') {
                        $user_id = $post->post_author;
                        $email = get_userdata( $user_id )->user_email;
                        $user_info      = get_userdata( $user_id );
                        // Show Property Author Info (Get info via User. Apply for User, Agent, Seller)
                        $author_picture_id = get_the_author_meta( ERE_METABOX_PREFIX . 'author_picture_id', $user_id );
                        $avatar_src = ere_image_resize_id($author_picture_id, $width, $height, true);

                        if(empty($user_info->first_name) && empty($user_info->last_name))
                        {
                            $agent_name=$user_info->user_login;
                        }
                        else
                        {
                            $agent_name     = $user_info->first_name . ' ' . $user_info->last_name;
                        }
                        $agent_facebook_url   = get_the_author_meta( ERE_METABOX_PREFIX . 'author_facebook_url', $user_id );
                        $agent_twitter_url    = get_the_author_meta( ERE_METABOX_PREFIX . 'author_twitter_url', $user_id );
                        $agent_googleplus_url = get_the_author_meta( ERE_METABOX_PREFIX . 'author_googleplus_url', $user_id );
                        $agent_linkedin_url   = get_the_author_meta( ERE_METABOX_PREFIX . 'author_linkedin_url', $user_id );
                        $agent_pinterest_url  = get_the_author_meta( ERE_METABOX_PREFIX . 'author_pinterest_url', $user_id );
                        $agent_instagram_url  = get_the_author_meta( ERE_METABOX_PREFIX . 'author_instagram_url', $user_id );
                        $agent_skype          = get_the_author_meta( ERE_METABOX_PREFIX . 'author_skype', $user_id );
                        $agent_youtube_url    = get_the_author_meta( ERE_METABOX_PREFIX . 'author_youtube_url', $user_id );
                        $agent_vimeo_url      = get_the_author_meta( ERE_METABOX_PREFIX . 'author_vimeo_url', $user_id );

                        $agent_mobile_number  = get_the_author_meta( ERE_METABOX_PREFIX . 'author_mobile_number', $user_id );
                        $agent_office_address = get_the_author_meta( ERE_METABOX_PREFIX . 'author_office_address', $user_id );
                        $agent_website_url    = get_the_author_meta( 'user_url', $user_id );

                        $author_agent_id = get_the_author_meta(ERE_METABOX_PREFIX . 'author_agent_id', $user_id);
                        if(empty($author_agent_id))
                        {
                            $agent_position = esc_html__( 'Property Seller', 'essential-real-estate' );
                            $agent_type = esc_html__( 'Seller', 'essential-real-estate' );
                            $agent_link = get_author_posts_url($user_id);
                        }
                        else
                        {
                            $agent_position = esc_html__( 'Property Agent', 'essential-real-estate' );
                            $agent_type = esc_html__( 'Agent', 'essential-real-estate' );
                            $agent_link = get_the_permalink($author_agent_id);
                        }
                    } else {
                        $agent_post_meta_data = get_post_custom( $property_agent);
                        $email = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_email']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_email'][0] : '';
                        $agent_name     = get_the_title($property_agent);
                        $avatar_id = get_post_thumbnail_id($property_agent);
                        $avatar_src = ere_image_resize_id($avatar_id, $width, $height, true);

                        $agent_facebook_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_facebook_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_facebook_url'][0] : '';
                        $agent_twitter_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_twitter_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_twitter_url'][0] : '';
                        $agent_googleplus_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_googleplus_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_googleplus_url'][0] : '';
                        $agent_linkedin_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_linkedin_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_linkedin_url'][0] : '';
                        $agent_pinterest_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_pinterest_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_pinterest_url'][0] : '';
                        $agent_instagram_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_instagram_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_instagram_url'][0] : '';
                        $agent_skype = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_skype']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_skype'][0] : '';
                        $agent_youtube_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_youtube_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_youtube_url'][0] : '';
                        $agent_vimeo_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_vimeo_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_vimeo_url'][0] : '';

                        $agent_mobile_number = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_mobile_number']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_mobile_number'][0] : '';
                        $agent_office_address = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_office_address']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_office_address'][0] : '';
                        $agent_website_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_website_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_website_url'][0] : '';

                        $agent_position = esc_html__( 'Property Agent', 'essential-real-estate' );
                        $agent_type = esc_html__( 'Agent', 'essential-real-estate' );
                        $agent_link     = get_the_permalink( $property_agent );
                    }
                } elseif ( $agent_display_option == 'other_info' ) {
                    $email = isset($property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_mail' ]) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_mail' ][0] : '';
                    $agent_name = isset($property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_name' ]) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_name' ][0] : '';
                    $agent_mobile_number = isset($property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_phone' ]) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_phone' ][0] : '';
                    $agent_description = isset($property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_description' ]) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_description' ][0] : '';
                }
                ?>
            
            <?php if ( ! empty( $email ) ): ?>
            <div class="contact-agent">
                <form action="#" method="POST" id="contact-agent-form" class="row">
                        <input type="hidden" name="target_email" value="<?php echo esc_attr( $email ); ?>">
                        <input type="hidden" name="property_url" value="<?php echo get_permalink(); ?>">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" name="sender_name" type="text"
                                    placeholder="<?php esc_html_e( 'Your name', 'essential-real-estate' ); ?>">
                                <div
                                    class="hidden name-error form-error"><?php esc_html_e( 'Please enter your Name!', 'essential-real-estate' ); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" name="sender_email" type="email"
                                    placeholder="<?php esc_html_e( 'Your e-mail adress', 'essential-real-estate' ); ?>">
                                <div class="hidden email-error form-error"
                                    data-not-valid="<?php esc_html_e( 'Your Email address is not Valid!', 'essential-real-estate' ) ?>"
                                    data-error="<?php esc_html_e( 'Please enter your Email!', 'essential-real-estate' ) ?>"><?php esc_html_e( 'Please enter your Email!', 'essential-real-estate' ); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" name="sender_phone" type="text"
                                    placeholder="<?php esc_html_e( 'Your phone number', 'essential-real-estate' ); ?>">
                                <div
                                    class="hidden phone-error form-error"><?php esc_html_e( 'Please enter your Phone!', 'essential-real-estate' ); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea class="form-control" name="sender_msg" rows="4"
                                        placeholder="<?php esc_html_e( 'Message', 'essential-real-estate' ); ?> *"><?php $title=get_the_title(); echo sprintf(__( 'Hello, I am interested in [%s]', 'essential-real-estate' ), $title) ?></textarea>
                                <div
                                    class="hidden message-error form-error"><?php esc_html_e( 'Please enter your Message!', 'essential-real-estate' ); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <?php if (ere_enable_captcha('contact_agent')) {do_action('ere_generate_form_recaptcha');} ?>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php wp_nonce_field('ere_contact_agent_ajax_nonce', 'ere_security_contact_agent'); ?>
                            <input type="hidden" name="action" id="contact_agent_with_property_url_action" value="ere_contact_agent_ajax">
                            <button type="submit"
                                    class="agent-contact-btn btn"><?php esc_html_e( 'Send', 'essential-real-estate' ); ?></button>
                            <div class="form-messages"></div>
                        </div>
                    </form>
            </div>
            <?php endif; ?>
        <?php endif; ?>
        </div>
    </div>











	</div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#ere-features-tabs').tabCollapse();
        });
    </script>
</div>
<div class="clear"></div>
