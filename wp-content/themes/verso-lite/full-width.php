<?php
/*
    Template Name: Page Full width
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
          var_dump("full-width");
				?>
			</div>
    	</div>
    </div>
*/ ?>
    <div class="container">
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
    </div><!-- .container -->

  </div> <!-- #primary -->

<?php get_footer(); ?>
