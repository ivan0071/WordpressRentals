<?php
/*
@package verso
  =================
  Link post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'verso-format-link col-md-4 col-sm-6 col-xs-12' ); ?>>
  <header class="entry-header text-center">

    <?php
      $link = verso_lite_grab_url();
      the_title( '<h1 class="entry-title"><a href="'. $link .'" target="_blank">','</a></h1>' );
    ?>
  </header>

</article>
