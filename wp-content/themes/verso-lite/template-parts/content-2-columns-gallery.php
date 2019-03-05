<?php
/*
@package verso
  =================
  Gallery post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'verso-format-gallery col-md-6 col-sm-6 col-xs-12' ); ?>>

    <div class="entry-image post-image-container">
        <?php if( verso_lite_get_attachment() ): ?>

          <div id="post-gallery-<?php the_ID(); ?>" class="carousel slide verso-carousel-thumb" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

              <?php
                $attachments = verso_lite_get_bs_slides(verso_lite_get_attachment(7));
                foreach ($attachments as $attachment) :
              ?>

                <div class="item <?php echo $attachment['class']; ?> standard-featured background-image" style="background-image: url( <?php echo $attachment['url']; ?> );">

                  <div class="hide next-image-preview" data-image="<?php echo $attachment['next_img']; ?>"></div>
                  <div class="hide prev-image-preview" data-image="<?php echo $attachment['prev_img']; ?>"></div>

                  <?php if( !empty($attachment['caption']) ) : ?>
                  <div class="entry-excerpt image-caption">
                    <p>
                      <?php echo $attachment['caption']; ?>
                    </p>
                  </div>
                <?php endif; ?>

                </div>

              <?php endforeach; ?>

            </div> <!-- .carousel-inner -->
            <a class="left carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
              <div class="table">
                <div class="table-cell">

                  <div class="preview-container">
                    <span class="thumbnail-container background-image"></span>
                    <span class="fa fa-long-arrow-left" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                  </div><!-- .preview-container -->

                </div><!-- .table-cell -->
              </div><!-- .table -->
            </a>
            <a class="right carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
              <div class="table">
                <div class="table-cell">

                  <div class="preview-container">
                    <span class="thumbnail-container background-image"></span>
                    <span class="fa fa-long-arrow-right" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                  </div><!-- .preview-container -->

                </div><!-- .table-cell -->
              </div><!-- .table -->
            </a>
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
