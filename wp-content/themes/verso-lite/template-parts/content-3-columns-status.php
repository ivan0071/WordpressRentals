<?php
/*
@package verso
  =================
  Status post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'verso-format-status col-md-4 col-sm-6 col-xs-12' ); ?>>

    <header class="entry-header">
        <div class="post-details">
			<div class="avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 70 ); ?>
			</div>
			<div class="status-info">
				<small class="author-links"> <?php the_author(); ?></span> &#64; <span class="time-links"> <?php the_time( get_option( 'date_format' ) ); ?></small>
				<?php the_content();	?>
			</div>
    	</div>
    </header>

</article>
