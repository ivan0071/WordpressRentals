<?php
/*
@package verso
  =================
  Standard post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-sm-6 col-xs-12'); ?>>

    <div class="entry-image post-image-container">
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
