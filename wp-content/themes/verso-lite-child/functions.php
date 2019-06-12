<?php
/*
    @package verso-lite-child
*/
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
 
    $parent_style = 'verso-lite-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}



/* Add custom field to attachment */
function ic_image_attachment_add_custom_fields($form_fields, $post) {
	$form_fields["home_page_flag"] = array(
		"label" => __("Show on home page"),
		"input" => "text",
		"value" => (get_post_meta($post->ID, "home_page_flag", true)) ? (get_post_meta($post->ID, "home_page_flag", true)) : '0',
		//"helps" => __("Show on home page."),
	);
	return $form_fields;
}
add_filter("attachment_fields_to_edit", "ic_image_attachment_add_custom_fields", null, 2);

/* Save custom field value */
function ic_image_attachment_save_custom_fields($post, $attachment) {
	if(isset($attachment['home_page_flag'])) {
		update_post_meta($post['ID'], 'home_page_flag', $attachment['home_page_flag']);
	} else {
		delete_post_meta($post['ID'], 'home_page_flag');
	}
	return $post;
}
add_filter("attachment_fields_to_save", "ic_image_attachment_save_custom_fields", null , 2);

// function ic_image_attachment_columns($columns) {
// 	$columns['home_page_flag'] = __("Homepage Flag");
// 	return $columns;
// }
// add_filter("manage_media_columns", "ic_image_attachment_columns", null, 2);
 
// function ic_image_attachment_show_column($name) {
// 	global $post;
// 	switch ($name) {
// 		case 'home_page_flag':
// 			$value = get_post_meta($post->ID, "home_page_flag", true);
// 			echo $value;
// 			break;
// 	}
// }
// add_action('manage_media_custom_column', 'ic_image_attachment_show_column', null, 2);
?>