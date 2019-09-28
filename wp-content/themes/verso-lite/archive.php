<?php
/*
  @package verso-lite
*/
get_header(); ?>

  <div id="primary" class="content-area">
<?php /*
    <div class="verso-breadcrumb">
        <div class="container">
            <div class="verso-breadcrumb-banner">
                <header class="archive-header">
                    <?php the_archive_title('<h2 class="page-title">','</h2>'); ?>
                </header>
                <?php
                if( function_exists('verso_lite_custom_breadcrumbs') ) :
                    verso_lite_custom_breadcrumbs();
                endif;
                var_dump("archive");
                ?>
            </div>
        </div>
    </div>
*/ ?>
    <main id="main" class="site-main" role="main">
        <div class="container verso-blog-container">
            <div class="row">
              <div class="col-sm-8">
                  <div class="verso-posts-container">

                    <?php
                      if( have_posts() ) :
                        while( have_posts() ): the_post();

                          get_template_part( 'template-parts/content', get_post_format() );

                        endwhile;
                      endif;

                      verso_lite_pagination_bar();
                    ?>

                  </div><!-- .container -->
              </div>
              <div class="col-sm-4">
                  <?php get_sidebar(); ?>
              </div>

            </div>
        </div>
    </main> <!-- #main -->
  </div> <!-- #primary -->

<?php get_footer(); ?>
