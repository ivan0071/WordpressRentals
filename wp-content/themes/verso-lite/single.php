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
                <?php
                    if( function_exists('verso_lite_custom_breadcrumbs') ) :
                      verso_lite_custom_breadcrumbs();
                    endif;
                    var_dump("single");
                ?>
            </div>
        </div>
    </div>
*/ ?>
    <main id="main" class="site-main" role="main">

      <div class="container">
          <div class="row">
              <div class="col-sm-8">
                  <?php
                    if( have_posts() ) :

                      while( have_posts() ): the_post();

                        verso_lite_save_post_views( get_the_ID() );

                        get_template_part( 'template-parts/single', get_post_format() );

                        echo verso_lite_post_navigation();

                        if( comments_open() ):
                          comments_template();
                        endif;

                      endwhile;

                    endif;
                  ?>
              </div>
              <div class="col-sm-4">
                  <?php get_sidebar(); ?>
              </div>
          </div>

      </div><!-- .container -->

    </main> <!-- #main -->
  </div> <!-- #primary -->

<?php get_footer(); ?>
