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
function homepage_flag_image_attachment_add_custom_fields($form_fields, $post) {
	$form_fields["home_page_flag"] = array(
		"label" => __("Show on home page"),
		"input" => "text",
		"value" => (get_post_meta($post->ID, "home_page_flag", true)) ? (get_post_meta($post->ID, "home_page_flag", true)) : '0',
		//"helps" => __("Show on home page."),
	);
	return $form_fields;
}
add_filter("attachment_fields_to_edit", "homepage_flag_image_attachment_add_custom_fields", null, 2);

/* Save custom field value */
function homepage_flag_image_attachment_save_custom_fields($post, $attachment) {
	if(isset($attachment['home_page_flag'])) {
		update_post_meta($post['ID'], 'home_page_flag', $attachment['home_page_flag']);
	} else {
		delete_post_meta($post['ID'], 'home_page_flag');
	}
	return $post;
}
add_filter("attachment_fields_to_save", "homepage_flag_image_attachment_save_custom_fields", null , 2);

// function homepage_flag_image_attachment_columns($columns) {
// 	$columns['home_page_flag'] = __("Homepage Flag");
// 	return $columns;
// }
// add_filter("manage_media_columns", "homepage_flag_image_attachment_columns", null, 2);
 
// function homepage_flag_image_attachment_show_column($name) {
// 	global $post;
// 	switch ($name) {
// 		case 'home_page_flag':
// 			$value = get_post_meta($post->ID, "home_page_flag", true);
// 			echo $value;
// 			break;
// 	}
// }
// add_action('manage_media_custom_column', 'homepage_flag_image_attachment_show_column', null, 2);

/* Add custom field to attachment */
function title_image_attachment_add_custom_fields($form_fields, $post) {
	$form_fields["home_page_title"] = array(
		"label" => __("Title over the image in the home page"),
		"input" => "textarea",
		"value" => (get_post_meta($post->ID, "home_page_title", true)) ? (get_post_meta($post->ID, "home_page_title", true)) : '',
		//"helps" => __("Show on home page."),
	);
	return $form_fields;
}
add_filter("attachment_fields_to_edit", "title_image_attachment_add_custom_fields", null, 2);

/* Save custom field value */
function title_image_attachment_save_custom_fields($post, $attachment) {
	if(isset($attachment['home_page_title'])) {
		update_post_meta($post['ID'], 'home_page_title', $attachment['home_page_title']);
	} else {
		delete_post_meta($post['ID'], 'home_page_title');
	}
	return $post;
}
add_filter("attachment_fields_to_save", "title_image_attachment_save_custom_fields", null , 2);



/* Add custom field to attachment */
function content_image_attachment_add_custom_fields($form_fields, $post) {
	$form_fields["home_page_content"] = array(
		"label" => __("Content over the image in the home page"),
		"input" => "textarea",
		"value" => (get_post_meta($post->ID, "home_page_content", true)) ? (get_post_meta($post->ID, "home_page_content", true)) : '',
		//"helps" => __("Show on home page."),
	);
	return $form_fields;
}
add_filter("attachment_fields_to_edit", "content_image_attachment_add_custom_fields", null, 2);

/* Save custom field value */
function content_image_attachment_save_custom_fields($post, $attachment) {
	if(isset($attachment['home_page_content'])) {
		update_post_meta($post['ID'], 'home_page_content', $attachment['home_page_content']);
	} else {
		delete_post_meta($post['ID'], 'home_page_content');
	}
	return $post;
}
add_filter("attachment_fields_to_save", "content_image_attachment_save_custom_fields", null , 2);
?>