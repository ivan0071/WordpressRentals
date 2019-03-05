<?php
/*
  @package verso-lite
*/

if( post_password_required() ){
  return;
}

?>

<div id="comments" class="comments-area">

  <?php if( have_comments() ): ?>

  <h2 class="comments-title">

    <?php

        $comments_no = get_comments_number();
        if ( 1 == $comments_no ) {
          /* translators: %s: post title */
          printf( _x( 'One comment on &ldquo;%s&rdquo;', 'comments title', 'verso-lite' ), get_the_title() );
        } else {
          printf(
            /* translators: 1: number of comments, 2: post title */
            _nx(
              '%1$s comments on &ldquo;%2$s&rdquo;',
              '%1$s comments on &ldquo;%2$s&rdquo;',
              $comments_no,
              'comments title',
              'verso-lite'
            ),
            number_format_i18n( $comments_no ),
            get_the_title()
          );
        }

    ?>

  <div class="verso-separator"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div>
    </h2>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
        <?php verso_lite_get_post_navigation(); ?>
    <?php endif; // Check for comment navigation. ?>

  <ul class="comments-list">

    <?php

        $args = array(
            'type' => 'all',
            'avatar_size' => 72,
		    'style'      => 'ul',
		    'short_ping' => true,
      );

      wp_list_comments( $args );
    ?>

  </ol>

  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
      <?php verso_lite_get_post_navigation(); ?>
  <?php endif; // Check for comment navigation. ?>


<?php endif; ?>

  <?php if( !comments_open() && get_comments_counter() && post_type_supports( get_post_type(), 'comments' ) ): ?>

    <p class="no-comments"> <?php esc_html_e('Comments are closed', 'verso-lite'); ?> </p>

  <?php endif; ?>


  <?php

  $fields =  array(
    'author' =>
      '<div class="form-group col-sm-6 first_field"><input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) .'" required="required" placeholder="' . esc_html__( 'Name', 'verso-lite' ) . '" /></div>',

    'email' =>
      '<div class="form-group col-sm-6"><input id="email" name="email" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author_email'] ) .'" required="required" placeholder="' . esc_html__( 'Email', 'verso-lite' ) . '" /></div>',

    'url' =>
      '<div class="form-group col-sm-12 last_field"><input id="url" name="url" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) .'" placeholder="' . esc_html__( 'Website', 'verso-lite' ) . '" /></div>',

  );

    $args = array(

      'class_submit' => 'btn btn-lg review-submit-button',
      'label_submit' => esc_html__( 'Post reply', 'verso-lite' ),
      'comment_field' =>
        '<div class="form-group col-sm-12"><textarea id="comment" name="comment" class="form-control" required="required" placeholder="' . esc_html__( 'Message', 'verso-lite' ) . '"></textarea></div>',
      'fields' => apply_filters( 'comment_form_default_fields', $fields )

    );

    comment_form( $args );
  ?>

</div>
