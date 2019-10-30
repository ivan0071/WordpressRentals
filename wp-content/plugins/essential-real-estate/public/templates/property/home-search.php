<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 10/01/2017
 * Time: 1:50 CH
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $post;
$features = '';
$resid_type = '';
$resid_furnished_type = '';
$commer_offices = '';
$commer_retail = '';
$commer_leisure = '';
$commer_industrial = '';
$commer_land = '';
$commer_other = '';
$title = isset($_GET['title']) ? $_GET['title'] : '';
$address = isset($_GET['address']) ? $_GET['address'] : '';
$city_name = isset($_GET['city']) ? $_GET['city'] : '';
$is_exclusive_default = '';
$is_exclusive = isset($_GET['excl']) ? $_GET['excl'] :$is_exclusive_default;
$status_default = ''; //ere_get_property_status_default_value();
$status = isset($_GET['status']) ? $_GET['status'] :$status_default;
$type = isset($_GET['type']) ? $_GET['type'] : '';
$location_zip_default = '';
$location_zip = isset($_GET['postcode']) ? $_GET['postcode'] :$location_zip_default;
$group_default = '';
$group = isset($_GET['group']) ? $_GET['group'] :$group_default;
$bedrooms = isset($_GET['bedrooms']) ? $_GET['bedrooms'] : '';
$bathrooms = isset($_GET['bathrooms']) ? $_GET['bathrooms'] : '';
$min_price = isset($_GET['min-price']) ? $_GET['min-price'] : '';
$max_price = isset($_GET['max-price']) ? $_GET['max-price'] : '';
$min_area = isset($_GET['min-area']) ? $_GET['min-area'] : '';
$max_area = isset($_GET['max-area']) ? $_GET['max-area'] : '';
$country = isset($_GET['country']) ? $_GET['country'] : '';
$state = isset($_GET['state']) ? $_GET['state'] : '';
$neighborhood = isset($_GET['neighborhood']) ? $_GET['neighborhood'] : '';
$garage = isset($_GET['garage']) ? $_GET['garage'] : '';
$label = isset($_GET['label']) ? $_GET['label'] : '';
$min_land_area = isset($_GET['min-land-area']) ? $_GET['min-land-area'] : '';
$max_land_area = isset($_GET['max-land-area']) ? $_GET['max-land-area'] : '';
$property_identity = isset($_GET['property_identity']) ? $_GET['property_identity'] : '';
$featured_search = isset($_GET['features-search']) ? $_GET['features-search'] : '';
if($featured_search == '1'){
    $features = isset($_GET['other_features']) ? $_GET['other_features'] : '';
    if(!empty($features)) {
        $features = explode( ';',$features );
    }
}
$resid_type_search = isset($_GET['resid-type-search']) ? $_GET['resid-type-search'] : '';
if($resid_type_search == '1'){
    $resid_type = isset($_GET['resid_type']) ? $_GET['resid_type'] : '';
    if(!empty($resid_type)) {
        $resid_type = explode( ';',$resid_type );
    }
}
$resid_furnished_type_search = isset($_GET['resid-furnished-type-search']) ? $_GET['resid-furnished-type-search'] : '';
if($resid_furnished_type_search == '1'){
    $resid_furnished_type = isset($_GET['resid_furnished_type']) ? $_GET['resid_furnished_type'] : '';
    if(!empty($resid_furnished_type)) {
        $resid_furnished_type = explode( ';',$resid_furnished_type );
    }
}
$commer_offices_search = isset($_GET['commer-offices-search']) ? $_GET['commer-offices-search'] : '';
if($commer_offices_search == '1'){
    $commer_offices = isset($_GET['commer_offices']) ? $_GET['commer_offices'] : '';
    if(!empty($commer_offices)) {
        $commer_offices = explode( ';',$commer_offices );
    }
}
$commer_retail_search = isset($_GET['commer-retail-search']) ? $_GET['commer-retail-search'] : '';
if($commer_retail_search == '1'){
    $commer_retail = isset($_GET['commer_retail']) ? $_GET['commer_retail'] : '';
    if(!empty($commer_retail)) {
        $commer_retail = explode( ';',$commer_retail );
    }
}
$commer_leisure_search = isset($_GET['commer-leisure-search']) ? $_GET['commer-leisure-search'] : '';
if($commer_leisure_search == '1'){
    $commer_leisure = isset($_GET['commer_leisure']) ? $_GET['commer_leisure'] : '';
    if(!empty($commer_leisure)) {
        $commer_leisure = explode( ';',$commer_leisure );
    }
}
$commer_industrial_search = isset($_GET['commer-industrial-search']) ? $_GET['commer-industrial-search'] : '';
if($commer_industrial_search == '1'){
    $commer_industrial = isset($_GET['commer_industrial']) ? $_GET['commer_industrial'] : '';
    if(!empty($commer_industrial)) {
        $commer_industrial = explode( ';',$commer_industrial );
    }
}
$commer_land_search = isset($_GET['commer-land-search']) ? $_GET['commer-land-search'] : '';
if($commer_land_search == '1'){
    $commer_land = isset($_GET['commer_land']) ? $_GET['commer_land'] : '';
    if(!empty($commer_land)) {
        $commer_land = explode( ';',$commer_land );
    }
}
$commer_other_search = isset($_GET['commer-other-search']) ? $_GET['commer-other-search'] : '';
if($commer_other_search == '1'){
    $commer_other = isset($_GET['commer_other']) ? $_GET['commer_other'] : '';
    if(!empty($commer_other)) {
        $commer_other = explode( ';',$commer_other );
    }
}

$meta_query = $tax_query=array();
$parameters=$keyword_array='';
$property_item_class = array('property-item');
$property_content_class = array('property-content');
$property_content_attributes = array();

$wrapper_classes = array(
    'ere-property clearfix',
);
$custom_property_layout_style = ere_get_option( 'search_property_layout_style', 'property-grid' );
$custom_property_items_amount = ere_get_option( 'search_property_items_amount', '6' );
$custom_property_image_size = ere_get_option( 'search_property_image_size', '330x180' );
$custom_property_columns      = ere_get_option( 'search_property_columns', '3' );
$custom_property_columns_gap  = ere_get_option( 'search_property_columns_gap', 'col-gap-30' );
$custom_property_items_md = ere_get_option( 'search_property_items_md', '3' );
$custom_property_items_sm = ere_get_option( 'search_property_items_sm', '2' );
$custom_property_items_xs = ere_get_option( 'search_property_items_xs', '1' );
$custom_property_items_mb = ere_get_option( 'search_property_items_mb', '1' );

if(isset( $_SESSION["property_view_as"] ) && !empty( $_SESSION["property_view_as"] ) && in_array($_SESSION["property_view_as"], array('property-list', 'property-grid', 'property-map'))) {
    $custom_property_layout_style = $_SESSION["property_view_as"];
}
$property_item_class = array();

$wrapper_classes = array(
    'ere-property clearfix',
    $custom_property_layout_style,
    $custom_property_columns_gap
);

if($custom_property_layout_style=='property-list'){
    $wrapper_classes[] = 'list-1-column';
}

if ( $custom_property_columns_gap == 'col-gap-30' ) {
    $property_item_class[] = 'mg-bottom-30';
} elseif ( $custom_property_columns_gap == 'col-gap-20' ) {
    $property_item_class[] = 'mg-bottom-20';
} elseif ( $custom_property_columns_gap == 'col-gap-10' ) {
    $property_item_class[] = 'mg-bottom-10';
}

$wrapper_classes[]     = 'columns-' . $custom_property_columns;
$wrapper_classes[]     = 'columns-md-' . $custom_property_items_md;
$wrapper_classes[]     = 'columns-sm-' . $custom_property_items_sm;
$wrapper_classes[]     = 'columns-xs-' . $custom_property_items_xs;
$wrapper_classes[]     = 'columns-mb-' . $custom_property_items_mb;
$property_item_class[] = 'ere-item-wrap';

$orderby = 'date';
$order   = 'DESC';

$args = array(
    'posts_per_page'      => $custom_property_items_amount,
    'post_type'           => 'property',
    'orderby'   => array(
        'menu_order'=>'ASC',
        'date' =>'DESC',
    ),
    'offset'              => ( max( 1, get_query_var( 'paged' ) ) - 1 ) * $custom_property_items_amount,
    'ignore_sticky_posts' => 1,
    'post_status'         => 'publish',
);

$for_rent = false;
$for_sale = false;
if (isset($status) && !empty($status)) {
    $statuses_list = explode(",", $status);
    if (count($statuses_list) == 1) {
        if ($status == "for-rent") {
            $for_rent = true;
        } else if ($status == "for-sale") {
            $for_sale = true;
        }
    } else if (count($statuses_list) > 1) {
        foreach($statuses_list as $statuses_list_item){
            if ($statuses_list_item == "for-rent") {
                $for_rent = true;
            } else if ($statuses_list_item == "for-sale") {
                $for_sale = true;
            }
        }
    }
}
if ($for_rent == false &&  $for_sale == false) {
    $for_rent = true;
    $for_sale = true;
}

if (isset($_GET['sortby']) && in_array($_GET['sortby'], array('a_price', 'd_price', 'a_date', 'd_date', 'featured', 'most_viewed'))) {
    if ($_GET['sortby'] == 'a_price') {
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'ASC';

        if ($for_rent == true) {
            $args['meta_key'] = ERE_METABOX_PREFIX . 'property_rent_price';
        }
        if ($for_sale == true) {
            $args['meta_key'] = ERE_METABOX_PREFIX . 'property_sale_price';
        }
    } else if ($_GET['sortby'] == 'd_price') {
        $args['orderby'] = 'meta_value_num';        
        $args['order'] = 'DESC';

        if ($for_rent == true) {
            $args['meta_key'] = ERE_METABOX_PREFIX . 'property_rent_price';
        }
        if ($for_sale == true) {
            $args['meta_key'] = ERE_METABOX_PREFIX . 'property_sale_price';
        }
    } else if ($_GET['sortby'] == 'featured') {
        $args['orderby'] = array(
            'meta_value_num' => 'DESC',
            'date' => 'DESC',
        );
        $args['meta_key'] = ERE_METABOX_PREFIX . 'property_featured';
    }
    else if ($_GET['sortby'] == 'most_viewed') {
        $args['orderby'] = 'meta_value_num';
        $args['meta_key'] = ERE_METABOX_PREFIX . 'property_views_count';
        $args['order'] = 'DESC';
    }
    else if ($_GET['sortby'] == 'a_date') {
        $args['orderby'] = 'date';
        $args['order'] = 'ASC';
    } else if ($_GET['sortby'] == 'd_date') {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    }
}
else{
    $featured_toplist = ere_get_option('featured_toplist', 1);
    if($featured_toplist!=0)
    {
        $args['orderby'] = array(
            'menu_order'=>'ASC',
            'meta_value_num' => 'DESC',
            'date' => 'DESC',
        );
        $args['meta_key'] = ERE_METABOX_PREFIX . 'property_featured';
    }
}
//Query get properties with keyword location
if (isset($address) ? $address : '') {
    $meta_query[] = array(
        'key' => ERE_METABOX_PREFIX. 'property_address',
        'value' => $address,
        'type' => 'CHAR',
        'compare' => 'LIKE',
    );

    $parameters.=sprintf( __('Keyword: <strong>%s</strong>; ', 'essential-real-estate'), $address );
}
if (isset($title) ? $title : '') {
    $args['s'] = $title;
    $parameters.=sprintf( __('Title: <strong>%s</strong>; ', 'essential-real-estate'), $title );
}

//Query get properties with keyword property_location_zip
if (isset($location_zip) && !empty($location_zip)) {
    $meta_query[] = array(
        'key' => ERE_METABOX_PREFIX. 'property_location_zip',
        'value' => str_replace("-", " ", $location_zip),
        'type' => 'CHAR',
        'compare' => 'LIKE',
    );
}

//Query get properties with keyword property_group
if ($group != '') {
    $meta_query[] = array(
        'key' => ERE_METABOX_PREFIX. 'property_group',
        'value' => $group,
        'type' => 'CHAR',
        'compare' => '=',
    );
}

//tax query property type
if (isset($type) && !empty($type)) {
    $tax_query[] = array(
        'taxonomy' => 'property-type',
        'field' => 'slug',
        'terms' => $type
    );
    $parameters.=sprintf( __('Type: <strong>%s</strong>; ', 'essential-real-estate'), $type );
}

//tax query property status
if (isset($status) && !empty($status)) {
    $statuses_list = explode(",", $status);
    if (count($statuses_list) == 1) {
        $tax_query[] = array(
            'taxonomy' => 'property-status',
            'field' => 'slug',
            'terms' => $status
        );
    } else if (count($statuses_list) > 1) {
        $nested_query = array(
            'relation' => 'OR',
        );
        foreach($statuses_list as $statuses_list_item){
            $nested_query[] = array(
                'taxonomy' => 'property-status',
                'field' => 'slug',
                'terms' => $statuses_list_item
            );
        }
        $tax_query[] = $nested_query;
    }

    $parameters.=sprintf( __('Status: <strong>%s</strong>; ', 'essential-real-estate'), $status );
}

//tax query property label
if (isset($label) && !empty($label)) {
    $tax_query[] = array(
        'taxonomy' => 'property-label',
        'field' => 'slug',
        'terms' => $label
    );
    $parameters.=sprintf( __('Label: <strong>%s</strong>; ', 'essential-real-estate'), $label );
}

//initial cities and cities search

// if (!empty($city)) {
//     $tax_query[] = array(
//         'taxonomy' => 'property-city',
//         'field' => 'slug',
//         'terms' => $city
//     );
//     $parameters.=sprintf( __('City / Town: <strong>%s</strong>; ', 'essential-real-estate'), $city );
// }

//city name check
if (isset($city_name) && !empty($city_name)) {
    if ($city_name == 'international') {
        $meta_query[] = array(
            'relation' => 'OR',
            array(
              'key' => ERE_METABOX_PREFIX . 'property_city_name',
              'value' => '', //<--- not required but necessary in this case
              'compare' => 'NOT EXISTS',
            ),
            array(
              'key' => ERE_METABOX_PREFIX . 'property_city_name',
              'value' => 'london',
              'type' => 'CHAR',
              'compare' => '!=',
            ),
        );
    } else {
        $meta_query[] = array(
            'key' => ERE_METABOX_PREFIX . 'property_city_name',
            'value' => $city_name,
            'type' => 'CHAR',
            'compare' => '=',
        );
    }
}

//Query get properties with keyword property_is_exclusive
if ($is_exclusive != '') {
    $meta_query[] = array(
        'key' => ERE_METABOX_PREFIX. 'property_is_exclusive',
        'value' => $is_exclusive,
        'type' => 'CHAR',
        'compare' => '=',
    );
}

//bathroom check
if (!empty($bathrooms)) {
    $bathrooms = sanitize_text_field($bathrooms);
    $meta_query[] = array(
        'key' => ERE_METABOX_PREFIX. 'property_bathrooms',
        'value' => $bathrooms,
        'type' => 'CHAR',
        'compare' => '=',
    );
    $parameters.=sprintf( __('Bathrooms: <strong>%s</strong>; ', 'essential-real-estate'), $bathrooms );
}
// bedrooms check
if (!empty($bedrooms)) {
    $bedrooms = sanitize_text_field($bedrooms);
    $meta_query[] = array(
        'key' => ERE_METABOX_PREFIX. 'property_bedrooms',
        'value' => $bedrooms,
        'type' => 'CHAR',
        'compare' => '=',
    );
    $parameters.=sprintf( __('Bedrooms: <strong>%s</strong>; ', 'essential-real-estate'), $bedrooms );
}
// to do: property_pet and property_story
// bedrooms check
// if (!empty($garage)) {
//     $garage = sanitize_text_field($garage);
//     $meta_query[] = array(
//         'key' => ERE_METABOX_PREFIX. 'property_garage',
//         'value' => $garage,
//         'type' => 'CHAR',
//         'compare' => '=',
//     );
//     $parameters.=sprintf( __('Garage: <strong>%s</strong>; ', 'essential-real-estate'), $garage );
// }

/**
 * Min Max Price & Area Property
 */
if (!empty($min_price) && !empty($max_price)) {
    $min_price = doubleval(ere_clean($min_price));
    $max_price = doubleval(ere_clean($max_price));

    if ($min_price >= 0 && $max_price >= $min_price) {
        if ($for_rent == true && $for_sale == true) {
            $nested_query = array(
                'relation' => 'OR',
            );
            $nested_query[] = array(
                'key' => ERE_METABOX_PREFIX. 'property_rent_price',
                'value' => array($min_price, $max_price),
                'type' => 'NUMERIC',
                'compare' => 'BETWEEN',
            );
            $nested_query[] = array(
                'key' => ERE_METABOX_PREFIX. 'property_sale_price',
                'value' => array($min_price, $max_price),
                'type' => 'NUMERIC',
                'compare' => 'BETWEEN',
            );
            $meta_query[] = $nested_query;            
        } else {
            if ($for_rent == true) {
                $meta_query[] = array(
                    'key' => ERE_METABOX_PREFIX. 'property_rent_price',
                    'value' => array($min_price, $max_price),
                    'type' => 'NUMERIC',
                    'compare' => 'BETWEEN',
                );
            }
            if ($for_sale == true) {
                $meta_query[] = array(
                    'key' => ERE_METABOX_PREFIX. 'property_sale_price',
                    'value' => array($min_price, $max_price),
                    'type' => 'NUMERIC',
                    'compare' => 'BETWEEN',
                );
            }
        }
        $parameters.=sprintf( __('Price: <strong>%s - %s</strong>; ', 'essential-real-estate'), $min_price, $max_price);
    }
} else if (!empty($min_price)) {
    $min_price = doubleval(ere_clean($min_price));
    if ($min_price >= 0) {
        if ($for_rent == true && $for_sale == true) {
            $nested_query = array(
                'relation' => 'OR',
            );
            $nested_query[] = array(
                'key' => ERE_METABOX_PREFIX. 'property_rent_price',
                'value' => $min_price,
                'type' => 'NUMERIC',
                'compare' => '>=',
            );
            $nested_query[] = array(
                'key' => ERE_METABOX_PREFIX. 'property_sale_price',
                'value' => $min_price,
                'type' => 'NUMERIC',
                'compare' => '>=',
            );
            $meta_query[] = $nested_query;            
        } else {
            if ($for_rent == true) {
                $meta_query[] = array(
                    'key' => ERE_METABOX_PREFIX. 'property_rent_price',
                    'value' => $min_price,
                    'type' => 'NUMERIC',
                    'compare' => '>=',
                );
            }
            if ($for_sale == true) {
                $meta_query[] = array(
                    'key' => ERE_METABOX_PREFIX. 'property_sale_price',
                    'value' => $min_price,
                    'type' => 'NUMERIC',
                    'compare' => '>=',
                );
            }
        }
        $parameters.=sprintf( __('Min Price: <strong>%s</strong>; ', 'essential-real-estate'), $min_price);
    }
} else if (!empty($max_price)) {
    $max_price = doubleval(ere_clean($max_price));
    if ($max_price >= 0) {
        if ($for_rent == true && $for_sale == true) {
            $nested_query = array(
                'relation' => 'OR',
            );
            $nested_query[] = array(
                'key' => ERE_METABOX_PREFIX. 'property_rent_price',
                'value' => $max_price,
                'type' => 'NUMERIC',
                'compare' => '<=',
            );
            $nested_query[] = array(
                'key' => ERE_METABOX_PREFIX. 'property_sale_price',
                'value' => $max_price,
                'type' => 'NUMERIC',
                'compare' => '<=',
            );
            $meta_query[] = $nested_query;
        } else {
            if ($for_rent == true) {
                $meta_query[] = array(
                    'key' => ERE_METABOX_PREFIX. 'property_rent_price',
                    'value' => $max_price,
                    'type' => 'NUMERIC',
                    'compare' => '<=',
                );
            }
            if ($for_sale == true) {
                $meta_query[] = array(
                    'key' => ERE_METABOX_PREFIX. 'property_sale_price',
                    'value' => $max_price,
                    'type' => 'NUMERIC',
                    'compare' => '<=',
                );
            }
        }
        $parameters.=sprintf( __('Max Price: <strong>%s</strong>; ', 'essential-real-estate'), $max_price);
    }
}

// min and max area logic
if (!empty($min_area) && !empty($max_area)) {
    $min_area = intval($min_area);
    $max_area = intval($max_area);

    if ($min_area >= 0 && $max_area >= $min_area) {
        $meta_query[] = array(
            'key' => ERE_METABOX_PREFIX. 'property_size',
            'value' => array($min_area, $max_area),
            'type' => 'NUMERIC',
            'compare' => 'BETWEEN',
        );
        $parameters.=sprintf( __('Size: <strong>%s - %s</strong>; ', 'essential-real-estate'), $min_area, $max_area);
    }

} else if (!empty($max_area)) {
    $max_area = intval($max_area);
    if ($max_area >= 0) {
        $meta_query[] = array(
            'key' => ERE_METABOX_PREFIX. 'property_size',
            'value' => $max_area,
            'type' => 'NUMERIC',
            'compare' => '<=',
        );
        $parameters.=sprintf( __('Max Area: <strong> %s</strong>; ', 'essential-real-estate'), $max_area);
    }
} else if (!empty($min_area)) {
    $min_area = intval($min_area);
    if ($min_area >= 0) {
        $meta_query[] = array(
            'key' => ERE_METABOX_PREFIX. 'property_size',
            'value' => $min_area,
            'type' => 'NUMERIC',
            'compare' => '>=',
        );
        $parameters.=sprintf( __('Min Area: <strong> %s</strong>; ', 'essential-real-estate'), $min_area);
    }
}
// min and max land area logic
if (!empty($min_land_area) && !empty($max_land_area)) {
    $min_land_area = intval($min_land_area);
    $max_land_area = intval($max_land_area);

    if ($min_land_area >= 0 && $max_land_area >= $min_land_area) {
        $meta_query[] = array(
            'key' => ERE_METABOX_PREFIX. 'property_land',
            'value' => array($min_land_area, $max_land_area),
            'type' => 'NUMERIC',
            'compare' => 'BETWEEN',
        );
        $parameters.=sprintf( __('Land size: <strong>%s - %s</strong>; ', 'essential-real-estate'), $min_land_area, $max_land_area);
    }

} else if (!empty($max_land_area)) {
    $max_land_area = intval($max_land_area);
    if ($max_land_area >= 0) {
        $meta_query[] = array(
            'key' => ERE_METABOX_PREFIX. 'property_land',
            'value' => $max_land_area,
            'type' => 'NUMERIC',
            'compare' => '<=',
        );
        $parameters.=sprintf( __('Max Land size: <strong>%s</strong>; ', 'essential-real-estate'), $max_land_area);
    }
} else if (!empty($min_land_area)) {
    $min_land_area = intval($min_land_area);
    if ($min_land_area >= 0) {
        $meta_query[] = array(
            'key' => ERE_METABOX_PREFIX. 'property_land',
            'value' => $min_land_area,
            'type' => 'NUMERIC',
            'compare' => '>=',
        );
        $parameters.=sprintf( __('Min Land size: <strong>%s</strong>; ', 'essential-real-estate'), $min_land_area);
    }
}
/*Country*/
if (!empty($country)) {
    $meta_query[] = array(
        'key' => ERE_METABOX_PREFIX. 'property_country',
        'value' => $country,
        'type' => 'CHAR',
        'compare' => '=',
    );
    $parameters.=sprintf( __('Country: <strong>%s</strong>; ', 'essential-real-estate'), $country);
}

/*Search advanced by Province / State*/
if (!empty($state)) {
    $tax_query[] = array(
        'taxonomy' => 'property-state',
        'field' => 'slug',
        'terms' => $state
    );
    $parameters.=sprintf( __('State: <strong>%s</strong>; ', 'essential-real-estate'), $state);
}
/*Search advanced by neighborhood*/
if (!empty($neighborhood)) {
    $tax_query[] = array(
        'taxonomy' => 'property-neighborhood',
        'field' => 'slug',
        'terms' => $neighborhood
    );
    $parameters.=sprintf( __('Neighborhood: <strong>%s</strong>; ', 'essential-real-estate'), $neighborhood);
}
if (!empty($property_identity)) {
    $property_identity = sanitize_text_field($property_identity);
    $meta_query[] = array(
        'key' => ERE_METABOX_PREFIX. 'property_identity',
        'value' => $property_identity,
        'type' => 'CHAR',
        'compare' => '=',
    );
    $parameters.=sprintf( __('Property ID: <strong>%s</strong>; ', 'essential-real-estate'), $bathrooms );
}
/* other featured query*/
if (!empty($features)) {
    foreach($features as $feature){
        $tax_query[] = array(
            'taxonomy' => 'property-feature',
            'field' => 'slug',
            'terms' => $feature
        );
        $parameters.=sprintf( __('Feature: <strong>%s</strong>; ', 'essential-real-estate'), $feature);
    }
}
/* property residential type query */
$nested_query[] = array();
if (!empty($resid_type) && (strval($group) == '0')) {
    if (count($resid_type) == 1) {
        $tax_query[] = array(
            'taxonomy' => 'property-residential-type',
            'field' => 'slug',
            'terms' => $resid_type
        );
    } else if (count($resid_type) > 1) {
        $nested_query = array(
            'relation' => 'OR',
        );
        foreach($resid_type as $resid_type_item){
            $nested_query[] = array(
                'taxonomy' => 'property-residential-type',
                'field' => 'slug',
                'terms' => $resid_type_item
            );
        }
        $tax_query[] = $nested_query;
    }
    //$parameters.=sprintf( __('Status: <strong>%s</strong>; ', 'essential-real-estate'), $status );
}
/* property residential furnished type query */
$nested_query[] = array();
if (!empty($resid_furnished_type) && (strval($group) == '0')) {
    if (count($resid_furnished_type) == 1) {
        $tax_query[] = array(
            'taxonomy' => 'property-resid-furnished-type',
            'field' => 'slug',
            'terms' => $resid_furnished_type
        );
    } else if (count($resid_furnished_type) > 1) {
        $nested_query = array(
            'relation' => 'OR',
        );
        foreach($resid_furnished_type as $resid_furnished_type_item){
            $nested_query[] = array(
                'taxonomy' => 'property-resid-furnished-type',
                'field' => 'slug',
                'terms' => $resid_furnished_type_item
            );
        }
        $tax_query[] = $nested_query;
    }
    //$parameters.=sprintf( __('Status: <strong>%s</strong>; ', 'essential-real-estate'), $status );
}
/* property commertial offices query */
$nested_query[] = array();
if (!empty($commer_offices) && (strval($group) == '1')) {
    if (count($commer_offices) == 1) {
        $tax_query[] = array(
            'taxonomy' => 'property-commer-offices',
            'field' => 'slug',
            'terms' => $commer_offices
        );
    } else if (count($commer_offices) > 1) {
        $nested_query = array(
            'relation' => 'OR',
        );
        foreach($commer_offices as $commer_offices_item){
            $nested_query[] = array(
                'taxonomy' => 'property-commer-offices',
                'field' => 'slug',
                'terms' => $commer_offices_item
            );
        }
        $tax_query[] = $nested_query;
    }
    //$parameters.=sprintf( __('Status: <strong>%s</strong>; ', 'essential-real-estate'), $status );
}
/* property commertial retail query */
$nested_query[] = array();
if (!empty($commer_retail) && (strval($group) == '1')) {
    if (count($commer_retail) == 1) {
        $tax_query[] = array(
            'taxonomy' => 'property-commer-retail',
            'field' => 'slug',
            'terms' => $commer_retail
        );
    } else if (count($commer_retail) > 1) {
        $nested_query = array(
            'relation' => 'OR',
        );
        foreach($commer_retail as $commer_retail_item){
            $nested_query[] = array(
                'taxonomy' => 'property-commer-retail',
                'field' => 'slug',
                'terms' => $commer_retail_item
            );
        }
        $tax_query[] = $nested_query;
    }
    //$parameters.=sprintf( __('Status: <strong>%s</strong>; ', 'essential-real-estate'), $status );
}
/* property commertial leisure query */
$nested_query[] = array();
if (!empty($commer_leisure) && (strval($group) == '1')) {
    if (count($commer_leisure) == 1) {
        $tax_query[] = array(
            'taxonomy' => 'property-commer-leisure',
            'field' => 'slug',
            'terms' => $commer_leisure
        );
    } else if (count($commer_leisure) > 1) {
        $nested_query = array(
            'relation' => 'OR',
        );
        foreach($commer_leisure as $commer_leisure_item){
            $nested_query[] = array(
                'taxonomy' => 'property-commer-leisure',
                'field' => 'slug',
                'terms' => $commer_leisure_item
            );
        }
        $tax_query[] = $nested_query;
    }
    //$parameters.=sprintf( __('Status: <strong>%s</strong>; ', 'essential-real-estate'), $status );
}
/* property commertial industrial query */
$nested_query[] = array();
if (!empty($commer_industrial) && (strval($group) == '1')) {
    if (count($commer_industrial) == 1) {
        $tax_query[] = array(
            'taxonomy' => 'property-commer-industrial',
            'field' => 'slug',
            'terms' => $commer_industrial
        );
    } else if (count($commer_industrial) > 1) {
        $nested_query = array(
            'relation' => 'OR',
        );
        foreach($commer_industrial as $commer_industrial_item){
            $nested_query[] = array(
                'taxonomy' => 'property-commer-industrial',
                'field' => 'slug',
                'terms' => $commer_industrial_item
            );
        }
        $tax_query[] = $nested_query;
    }
    //$parameters.=sprintf( __('Status: <strong>%s</strong>; ', 'essential-real-estate'), $status );
}
/* property commertial land query */
$nested_query[] = array();
if (!empty($commer_land) && (strval($group) == '1')) {
    if (count($commer_land) == 1) {
        $tax_query[] = array(
            'taxonomy' => 'property-commer-land',
            'field' => 'slug',
            'terms' => $commer_land
        );
    } else if (count($commer_land) > 1) {
        $nested_query = array(
            'relation' => 'OR',
        );
        foreach($commer_land as $commer_land_item){
            $nested_query[] = array(
                'taxonomy' => 'property-commer-land',
                'field' => 'slug',
                'terms' => $commer_land_item
            );
        }
        $tax_query[] = $nested_query;
    }
    //$parameters.=sprintf( __('Status: <strong>%s</strong>; ', 'essential-real-estate'), $status );
}
/* property commertial other query */
$nested_query[] = array();
if (!empty($commer_other) && (strval($group) == '1')) {
    if (count($commer_other) == 1) {
        $tax_query[] = array(
            'taxonomy' => 'property-commer-other',
            'field' => 'slug',
            'terms' => $commer_other
        );
    } else if (count($commer_other) > 1) {
        $nested_query = array(
            'relation' => 'OR',
        );
        foreach($commer_other as $commer_other_item){
            $nested_query[] = array(
                'taxonomy' => 'property-commer-other',
                'field' => 'slug',
                'terms' => $commer_other_item
            );
        }
        $tax_query[] = $nested_query;
    }
    //$parameters.=sprintf( __('Status: <strong>%s</strong>; ', 'essential-real-estate'), $status );
}

$args['meta_query'] = array(
    'relation' => 'AND',
    $meta_query
);

$tax_count = count($tax_query);
if ($tax_count > 0) {
    $args['tax_query'] = array(
        'relation' => 'AND',
        $tax_query
    );
}

$argsMap = $args;
$custom_property_items_amount_map = 1000;
$argsMap['posts_per_page'] = $custom_property_items_amount_map;
$argsMap['offset'] = ( max( 1, get_query_var( 'paged' ) ) - 1 ) * $custom_property_items_amount_map;
$dataMap    = new WP_Query( $argsMap );

$data       = new WP_Query( $args );
$search_query=$args;
$total_post = $data->found_posts;
$min_suffix = ere_get_option('enable_min_css', 0) == 1 ? '.min' : '';
$min_suffix_js = ere_get_option('enable_min_js', 0) == 1 ? '.min' : '';
wp_print_styles( ERE_PLUGIN_PREFIX . 'property');
wp_print_styles( ERE_PLUGIN_PREFIX . 'archive-property');
wp_enqueue_script(ERE_PLUGIN_PREFIX . 'archive-property', ERE_PLUGIN_URL . 'public/assets/js/property/ere-archive-property' . $min_suffix_js . '.js', array('jquery'), ERE_PLUGIN_VER, true);
?>
<div id="home-search-wrap" class="ere-advanced-search-wrap ere-property-wrap">
    <b><span class="search-title-text">SEARCH PROPERTIES</span></b>
    <?php do_action('ere_home_search_before_main_content');
    $enable_saved_search = ere_get_option('enable_saved_search', 1);
    if($enable_saved_search==1):
        $data_target='#ere_save_search_modal';
        if (!is_user_logged_in()){
            $data_target='#ere_signin_modal';
        }
        ?>
        <?php /*
        <div class="advanced-saved-searches">
            <button type="button" class="btn btn-primary btn-xs btn-save-search" data-toggle="modal" data-target="<?php echo $data_target; ?>">
                <?php esc_html_e( 'Save Search', 'essential-real-estate' ) ?></button>
        </div>
        */ ?>
        <?php ere_get_template('global/save-search-modal.php',array('parameters'=>$parameters,'search_query'=>$search_query));
    endif; ?>
    <div class="ere-archive-property">
        <div class="above-archive-property">
            <div class="archive-property-action sort-view-property">
                <div class="sort-property property-filter property-dropdown">
                    <span class="property-filter-placeholder"><?php esc_html_e( 'Sort By', 'essential-real-estate' ); ?></span>
                    <ul>
                        <li><a data-sortby="default" href="<?php
                            $pot_link_sortby = add_query_arg( array( 'sortby' => 'default' ) );
                            echo esc_url( $pot_link_sortby ) ?>"
                               title="<?php esc_html_e( 'Default Order', 'essential-real-estate' ); ?>"><?php esc_html_e( 'Default Order', 'essential-real-estate' ); ?></a>
                        </li>
                        <li><a data-sortby="featured" href="<?php
                            $pot_link_sortby = add_query_arg( array( 'sortby' => 'featured' ) );
                            echo esc_url( $pot_link_sortby ) ?>"
                               title="<?php esc_html_e( 'Featured', 'essential-real-estate' ); ?>"><?php esc_html_e( 'Featured', 'essential-real-estate' ); ?></a>
                        </li>
                        <li><a data-sortby="most_viewed" href="<?php
                            $pot_link_sortby = add_query_arg( array( 'sortby' => 'most_viewed' ) );
                            echo esc_url( $pot_link_sortby ) ?>"
                               title="<?php esc_html_e( 'Most Viewed', 'essential-real-estate' ); ?>"><?php esc_html_e( 'Most Viewed', 'essential-real-estate' ); ?></a>
                        </li>
                        <li><a data-sortby="a_price" href="<?php
                            $pot_link_sortby = add_query_arg( array( 'sortby' => 'a_price' ) );
                            echo esc_url( $pot_link_sortby ) ?>"
                               title="<?php esc_html_e( 'Price (Low to High)', 'essential-real-estate' ); ?>"><?php esc_html_e( 'Price (Low to High)', 'essential-real-estate' ); ?></a>
                        </li>
                        <li><a data-sortby="d_price" href="<?php
                            $pot_link_sortby = add_query_arg( array( 'sortby' => 'd_price' ) );
                            echo esc_url( $pot_link_sortby ) ?>"
                               title="<?php esc_html_e( 'Price (High to Low)', 'essential-real-estate' ); ?>"><?php esc_html_e( 'Price (High to Low)', 'essential-real-estate' ); ?></a>
                        </li>
                        <li><a data-sortby="a_date" href="<?php
                            $pot_link_sortby = add_query_arg( array( 'sortby' => 'a_date' ) );
                            echo esc_url( $pot_link_sortby ) ?>"
                               title="<?php esc_html_e( 'Date (Old to New)', 'essential-real-estate' ); ?>"><?php esc_html_e( 'Date (Old to New)', 'essential-real-estate' ); ?></a>
                        </li>
                        <li><a data-sortby="d_date" href="<?php
                            $pot_link_sortby = add_query_arg( array( 'sortby' => 'd_date' ) );
                            echo esc_url( $pot_link_sortby ) ?>"
                               title="<?php esc_html_e( 'Date (New to Old)', 'essential-real-estate' ); ?>"><?php esc_html_e( 'Date (New to Old)', 'essential-real-estate' ); ?></a>
                        </li>
                    </ul>
                </div>
                <div class="view-as" data-admin-url="<?php echo ERE_AJAX_URL; ?>">
                    <span data-view-as="property-list" class="view-as-list" title="<?php esc_html_e( 'View as List', 'essential-real-estate' ) ?>">
                        <i class="fa fa-list-ul"></i>
                    </span>
                    <span data-view-as="property-grid" class="view-as-grid" title="<?php esc_html_e( 'View as Grid', 'essential-real-estate' ) ?>">
                        <i class="fa fa-th-large"></i>
                    </span>                    
                    <span data-view-as="property-map" class="view-as-map" title="<?php esc_html_e( 'View as Map', 'essential-real-estate' ) ?>">
                        <i id="markerMapBtn" class="fa fa-map-marker"></i>
                    </span>
                </div>
            </div>
        </div>
        <?php 
            $hideNoMapClass = "";
            $hideMapClass = "hiddenClass";
            if (isset( $custom_property_layout_style ) && !empty( $custom_property_layout_style ) && in_array($custom_property_layout_style, array('property-map'))) {
                $hideNoMapClass = "hiddenClass";
                $hideMapClass = "";
            }
        ?>
        <?php if(isset( $custom_property_layout_style ) && !empty( $custom_property_layout_style ) && in_array($custom_property_layout_style, array('property-list', 'property-grid', 'property-map'))) : ?>
            <div class="map-no <?php echo join( ' ', $wrapper_classes ) ?> <?php echo $hideNoMapClass ?>">
                <?php if ( $data->have_posts() ) :
                    while ( $data->have_posts() ): $data->the_post(); ?>

                        <?php ere_get_template( 'content-property.php', array(
                            'custom_property_image_size' => $custom_property_image_size,
                            'property_item_class' => $property_item_class
                        )); ?>

                    <?php endwhile;
                else: ?>
                    <div class="item-not-found"><?php esc_html_e( 'No item found', 'essential-real-estate' ); ?></div>
                <?php endif; ?>
                <div class="clearfix"></div>
                <?php
                $max_num_pages = $data->max_num_pages;
                ere_get_template( 'global/pagination.php', array( 'max_num_pages' => $max_num_pages ) );
                wp_reset_postdata(); ?>
            </div>
            <div class="map-yes <?php echo $hideMapClass ?>">

                <?php
                    $titleArr = [];
                    $latArr = [];
                    $longArr = [];
                    $latArrSum = 0;
                    $longArrSum = 0;
                    if ( $dataMap->have_posts() ) {
                        while ( $dataMap->have_posts() ) : $dataMap->the_post();
                            $propertyTitleTmp = $post->post_title;
                            $titleArr[] = $propertyTitleTmp;
                            //$property_location = get_post_meta( $post->ID, ERE_METABOX_PREFIX . 'property_location', true );
                            $property_map_address = isset($property_location['address']) ? $property_location['address'] : '';
                            $property_meta_data = get_post_custom($post->ID);
                            //list( $latTmp, $longTmp ) =  isset($property_location['location']) ? explode( ',', $property_location['location'] ) : array('', '');
                            $latTmp = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_location_latitude']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_location_latitude'][0] : '';
                            $longTmp = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_location_longitude']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_location_longitude'][0] : '';
                            if ($latTmp != null && $latTmp != '' && is_float((float)$latTmp) &&
                                $longTmp != null && $longTmp != '' && is_float((float)$longTmp)) 
                            {
                                $latArr[] = $latTmp;
                                $longArr[] = $longTmp;
                                $latArrSum += $latTmp;
                                $longArrSum += $longTmp;
                            }
                        endwhile;
                    }
                    $arrayCountLatLong = count($latArr);
                    if ($arrayCountLatLong > 0) {
                        $latAverageView = $latArrSum / $arrayCountLatLong;
                        $longAverageView = $longArrSum / $arrayCountLatLong;   
                    } else {
                        $latAverageView = 51.507351;
                        $longAverageView = -0.127758;   
                    }
                    $mapDefaultZoom = 10;

                    if (isset($city_name) && !empty($city_name)) {
                        if ($city_name == 'international') {
                            $latAverageView = 37.0902;
                            $longAverageView = -95.7129;
                            $mapDefaultZoom = 4;
                        }
                    }                                   

                    $latLongData = array(
                        'titleArr' => $titleArr,
                        'latArr' => $latArr,
                        'longArr' => $longArr,
                        'latArrSum' => $latArrSum,
                        'longArrSum' => $longArrSum,
                        'arrayCountLatLong' => $arrayCountLatLong,
                        'latAverageView' => $latAverageView,
                        'longAverageView' => $longAverageView,
                        'mapDefaultZoom' => $mapDefaultZoom
                    );
                ?>

                <?php ere_get_template( 'content-property-map.php', array(
                    'dataMap' => $dataMap,
                    'latLongData' => $latLongData,
                    'custom_property_image_size' => $custom_property_image_size,
                    'property_item_class' => $property_item_class
                )); ?>

            </div>
        <?php endif; ?>
        <div class="ere-heading">                
            <?php echo ere_get_format_number($total_post); ?>
            <?php esc_html_e(' results', 'essential-real-estate') ?>
        </div>
    </div>
    <?php do_action('ere_home_search_after_main_content'); ?>
</div>