<?php
/*
@package verso
  =================
  Aside post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'verso-format-aside col-md-6 col-sm-6 col-xs-12' ); ?>>
    <div class="entry-content">
      	<div class="aside-container">
            <div class="aside-text-block">
    			<div class="entry-excerpt">
    			    <?php the_content(); ?>
    			</div>
    			<header class="entry-header">
    			    <div class="entry-meta">
    			      <?php echo verso_lite_posted_meta(); ?>
    			    </div>
    			</header>
            </div>
      	</div>
    </div><!-- .entry-content -->
</article>
