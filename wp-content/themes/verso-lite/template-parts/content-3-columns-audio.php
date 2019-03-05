<?php
/*
@package verso
  =================
  Audio post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'verso-format-audio col-md-4 col-sm-6 col-xs-12' ); ?>>

    <div class="entry-image">
  		<?php echo verso_lite_get_embedded_media( array('audio', 'iframe') ); ?>
  	</div>
    <div class="entry-content text-center post-content-container">

        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ) ?>
          <div class="entry-date">
              <?php echo verso_lite_posted_date(); ?>
          </div>
          <div class="entry-meta">
            <?php echo verso_lite_posted_meta(); ?>
          </div>
        </header>

        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <div class="button-container">
            <a href="<?php the_permalink(); ?>" class="btn-verso"><?php esc_html_e('Read more...', 'verso-lite'); ?></a>
        </div>

    </div><!-- .entry-content -->

</article>
