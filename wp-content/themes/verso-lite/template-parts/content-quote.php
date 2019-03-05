<?php
/*
@package verso
  =================
  Quote post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'verso-format-quote' ); ?>>
    <header class="entry-header text-center">
        <h1 class="quote-content"><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php echo get_the_content(); ?></a></h1>
        <?php the_title( '<h2 class="quote-author">- ',' -</h2>' ) ?>
    </header>
</article>
