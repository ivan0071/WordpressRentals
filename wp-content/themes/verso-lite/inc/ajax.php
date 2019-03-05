<?php
/*
@package verso-lite
  =================
  AJAX FUNCTIONS
  =================
*/
add_action( 'wp_ajax_nopriv_verso_lite_load_more', 'verso_lite_load_more' );
add_action( 'wp_ajax_verso_lite_load_more', 'verso_lite_load_more' );

function verso_lite_load_more(){

  $paged = $_POST["page"]+1;
  $prev = $_POST["prev"];
  $archive = $_POST["archive"];

  if( $prev == 1 && $_POST["page"] != 1 ){
    $paged = $_POST["page"]-1;
  }

  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'paged' => $paged
  );

  if( $archive != '0' ){

    $archVal = explode('/', $archive);
    $flipped = array_flip($archVal);

    switch (isset( $flipped )) {

      case $flipped["category"] :
        $type = "category_name";
        $key = "category";
        break;

      case $flipped["tag"] :
        $type = "tag";
        $key = $type;
        break;

      case $flipped["author"] :
        $type = "author";
        $key = $type;
        break;

    }

    $currKey = array_keys($archVal, $key);
    $nextKey = $currKey[0]+1;
    $value = $archVal[ $nextKey ];

    $args[ $type ] = $value;

    //check page trail and remove "page" value
    if( isset( $flipped["page"] ) ){
      $pageVal = explode('page', $archive);
      $page_trail = $pageVal[0];
    }
    else{
      $page_trail = $archive;
    }

  }
  else{
    $page_trail = '/';
  }

  $query = new WP_Query( $args );
  //To find next page
  $argsNextPage = $args;
  $argsNextPage['paged'] = $paged+1;
  $queryNextPage = new WP_Query( $argsNextPage );
    if( $queryNextPage->have_posts() ) :
        $hasNextPage = 1;
    else:
      $hasNextPage = 0;
    endif;
  if( $query->have_posts() ) :
      ob_start();

    echo '<div class="page-limit"  data-page="' . $page_trail . 'page/' . $paged . '/">';

    while( $query->have_posts() ): $query->the_post();

    $verso_lite_settings = verso_lite_get_theme_options();
    $verso_lite_blog_layout = $verso_lite_settings['verso_lite_blog_layout'];

    if ($verso_lite_blog_layout =='blog_default_display') {
        get_template_part( 'template-parts/content', get_post_format() );
    }
    else if ($verso_lite_blog_layout =='blog_1_column_display') {
        get_template_part( 'template-parts/content-1-columns', get_post_format() );
    }
    else if ($verso_lite_blog_layout =='blog_2_column_display') {
        get_template_part( 'template-parts/content-2-columns', get_post_format() );
    }
    else if ($verso_lite_blog_layout =='blog_3_column_display') {
        get_template_part( 'template-parts/content-3-columns', get_post_format() );
    }
    else{
        get_template_part( 'template-parts/content', get_post_format() );
    }

    endwhile;

    echo '</div>';

    $out = ob_get_contents();
    ob_end_clean();
  else:
    $out = 0;

  endif;
  $result['content'] = $out;
  $result['has_next'] = $hasNextPage;
  echo json_encode($result);

  wp_reset_postdata();

  die();
}

function verso_lite_hasNext($currentPage){
  $paged = $currentPage;
  $prev = $currentPage;

  if( $prev == 1 && $currentPage != 1 ){
    $paged = $currentPage-1;
  }

  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'paged' => $paged
  );

  $query = new WP_Query( $args );
  //To find next page
  $argsNextPage = $args;
  $argsNextPage['paged'] = $paged+1;
  $queryNextPage = new WP_Query( $argsNextPage );
    if( $queryNextPage->have_posts() ) :
        return true;
    else:
      return false;
    endif;
}

function verso_lite_check_paged( $num = null ){

  $output = '';

  if( is_paged() ){
    $output = 'page/' . get_query_var( 'paged' );
  }

  if( $num == 1 ){
    $paged = ( get_query_var( 'paged' ) == 0 ? 1 : get_query_var( 'paged' ) );
    return $paged;
  }
  else{
    return $output;
  }

}
