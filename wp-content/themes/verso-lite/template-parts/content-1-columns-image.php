<?php
/*
@package verso
  =================
  Image post format
  =================
*/
if ( has_post_thumbnail() ) {
	$imgclass = 'col-md-4';
	$conclass = 'col-md-8';
}
else {
	$imgclass = 'col-md-12';
	$conclass = 'col-md-12';
}
?>
<?php if( verso_lite_get_attachment() ) { ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'verso-format-image'); ?>>

      <header class="entry-header text-center background-image" style="background-image:url(<?php echo verso_lite_get_attachment(); ?>);">

        <?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ) ?>

        <div class="entry-date">
            <?php echo verso_lite_posted_date(); ?>
        </div>

        <div class="entry-meta">
          <?php echo verso_lite_posted_meta(); ?>
        </div>

        <div class="entry-excerpt image-caption">
          <?php the_excerpt(); ?>
        </div>

      </header>

    </article>
<?php } else{ ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <div class="entry-image post-image-container <?php echo $imgclass; ?>">
          		<div class="entry-image-container">
          			<?php
          				// check if the post has a Post Thumbnail assigned to it.
          				if ( has_post_thumbnail() ) : ?>
          			    <a class="standard-featured-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          			        <?php the_post_thumbnail(); ?>
          			    </a>
          				<?php endif;
          			?>
          		</div>
          	</div>
            <div class="entry-content text-center post-content-container <?php echo $conclass; ?>">
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
        </div>
    </article>
<?php }?>
