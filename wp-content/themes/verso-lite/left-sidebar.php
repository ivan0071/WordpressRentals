<?php
/*
    Template Name: Page with Left sidebar
    @package verso-lite
*/
get_header(); ?>

  <div id="primary" class="content-area">
<?php /*
    <div class="verso-breadcrumb">
      	<div class="container">
            <div class="verso-breadcrumb-banner">
                <header class="page-header">
					<?php single_post_title('<h2 class="page-title">','</h2>'); ?>
				</header>
				<?php
					if( function_exists('verso_lite_custom_breadcrumbs') ) :
					  verso_lite_custom_breadcrumbs();
          endif;
          var_dump("left-sidebar");
				?>
			</div>
      	</div>
    </div>
*/ ?>
    <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-9 col-sm-push-3 col-md-9 col-md-push-3">
              <main id="main" class="site-main" role="main">

                  <?php
                    if( have_posts() ) :

                      while( have_posts() ): the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
         				if ( comments_open() || get_comments_number() ) :
         					comments_template();
         				endif;

                      endwhile;

                    endif;
                  ?>

              </main> <!-- #main -->
          </div>
          <div class="col-xs-12 col-sm-3 col-sm-pull-9 col-md-3 col-md-pull-9">
              <?php get_sidebar(); ?>
          </div>
      </div>
    </div><!-- .container -->

  </div> <!-- #primary -->

<?php get_footer(); ?>
