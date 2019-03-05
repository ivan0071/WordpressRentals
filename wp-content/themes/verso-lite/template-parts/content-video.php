<?php
/*
@package verso
  =================
  Video post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'verso-format-video' ); ?>>

    <div class="entry-image post-image-container">
        <?php if( verso_lite_get_embedded_media() ) : ?>
            <div class="embed-responsive embed-responsive-16by9">
              <?php echo verso_lite_get_embedded_media( array('video', 'iframe') ); ?>
            </div>
        <?php endif; ?>
        <div class="entry-date">
            <?php echo verso_lite_posted_date(); ?>
        </div>
  	</div>
    <div class="entry-content post-content-container">

        <header class="entry-header">
            <div class="entry-meta">
              <?php echo verso_lite_posted_meta(); ?>
            </div>
          <?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ) ?>
        </header>
        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="entry-footer">
            <div class="button-container">
                <a href="<?php the_permalink(); ?>" class="btn-verso"><?php esc_html_e('Read More', 'verso-lite'); ?><i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>

    </div><!-- .entry-content -->

</article>
