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
                <h2 class="page-title">
                    <?php esc_html_e('Search', 'verso-lite'); ?>
                </h2>
                <?php
                    if( function_exists('verso_lite_custom_breadcrumbs') ) :
                      verso_lite_custom_breadcrumbs();
                    endif;
                    var_dump("search");
                ?>
            </div>
        </div>
    </div>
*/ ?>
    <main id="main" class="site-main" role="main">
        <div class="container">

            <div class="search-container">
                <div class="search-content">
                    <?php get_search_form(); ?>
                    <h4>
                        <?php esc_html_e('Search Results for','verso-lite'); ?>
                        <span class="text-primary">
                            <?php the_search_query(); ?>
                        </span>
                    </h4>
                </div>
            </div>
            <hr />

            <?php
              if( have_posts() ) :

                while( have_posts() ): the_post();

                  get_template_part( 'template-parts/content', 'search' );

                endwhile;

              endif;

            ?>

            <nav class="text-center">
                <?php verso_lite_pagination_bar();  ?>
            </nav>

        </div><!-- .container -->

    </main> <!-- #main -->
  </div> <!-- #primary -->

<?php get_footer(); ?>
