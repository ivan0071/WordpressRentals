<?php
/*
  @package verso-lite
*/
get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
            //SELECT BLOG LAYOUT
            $verso_lite_settings = verso_lite_get_theme_options();
            $verso_lite_blog_layout = $verso_lite_settings['verso_lite_blog_layout'];
            $verso_lite_blog_sidebar_layout = $verso_lite_settings['verso_lite_blog_sidebar_layout'];
            $verso_lite_blog_pagination_style = $verso_lite_settings['verso_lite_blog_pagination_style'];

            $blog_col_class = '';
            if(($verso_lite_blog_layout == 'blog_2_column_display') || ($verso_lite_blog_layout == 'blog_3_column_display')){
                $blog_col_class = 'verso-blog-colums';
            }
        ?>
        <div class="container verso-blog-container <?php echo $blog_col_class ?>">

            <div class="row">
               <div class="col-sm-8">
                   <div class="verso-posts-container">

                     <?php
                       if( have_posts() ) :

                         echo '<div class="page-limit" data-page="' . $_SERVER["REQUEST_URI"] .'">';

                         while( have_posts() ): the_post();

                             if ($verso_lite_blog_layout =='blog_default_display') {
                                 get_template_part( 'template-parts/content', get_post_format() );
                             }
                             else if ($verso_lite_blog_layout =='blog_1_column_display') {
                                 get_template_part( 'template-parts/content-1-columns', get_post_format() );
                             }
                             else if ($verso_lite_blog_layout =='blog_2_column_display') {
                                 get_template_part( 'template-parts/content-2-columns', get_post_format() );
                             }
                             else if ($verso_lite_blog_layout =='blog_3_column_display') {
                                 get_template_part( 'template-parts/content-3-columns', get_post_format() );
                             }
                             else{
                                 get_template_part( 'template-parts/content', get_post_format() );
                             }
                         endwhile;

                         echo '</div>';

                       endif;
                     ?>

                   </div><!-- .container -->

                   <div class="verso-navigation"><div class="verso-default-navigation"><?php posts_nav_link(); ?></div></div>
                 </div>
                 <div class="col-sm-4">
                   <?php get_sidebar(); ?>
                 </div>
            </div>
        </div>

    </main> <!-- #main -->
</div> <!-- #primary -->

<?php get_footer(); ?>
