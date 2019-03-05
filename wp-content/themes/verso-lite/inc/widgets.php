<?php
/*
@package verso-lite
  =================
  WIDGET CLASS
  =================
*/

/*
  Edit default wordpress widgets
*/
function verso_lite_tag_cloud_font_change( $args ){

  $args['smallest'] = 11;
  $args['largest'] = 11;

  return $args;

}
add_filter( 'widget_tag_cloud_args', 'verso_lite_tag_cloud_font_change');

function verso_lite_list_categories_output_change( $links ) {
    if($links == '</a> <span>' ){
        return;
    }
    else{
    	$links = str_replace('(', '<span class="post_count">', $links);
    	$links = str_replace(')', '</span>', $links);
    }

	return $links;

}
add_filter( 'wp_list_categories', 'verso_lite_list_categories_output_change' );

function verso_lite_archive_postcount_filter ($links) {
   $links = str_replace('(', '<span class="count">', $links);
   $links = str_replace(')', '</span>', $links);
   return $links;
}
add_filter('get_archives_link', 'verso_lite_archive_postcount_filter');

/*
  Save Posts views
*/
function verso_lite_save_post_views( $postID ){
  $metaKey = 'verso_post_views';
  $views = get_post_meta( $postID, $metaKey, true );

  $count = ( empty($views) ? 0 : $views );
  $count++;

  update_post_meta( $postID, $metaKey, $count );

}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
