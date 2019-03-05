<?php
/*
    Template name: 404 error page
    @package verso-lite
*/
get_header(); ?>

  <div id="primary" class="content-area">
    <div class="verso-breadcrumb">
        <div class="container">
            <div class="verso-breadcrumb-banner">
                <header class="page-header">
                    <h2 class="page-title">
                        <?php esc_html_e('404 Error', 'verso-lite'); ?>
                    </h2>
                </header>
                <?php
                    if( function_exists('verso_lite_custom_breadcrumbs') ) :
                      verso_lite_custom_breadcrumbs();
                    endif;
                ?>
            </div>
        </div>
    </div>
    <main id="main" class="site-main" role="main">

        <section class="error-404 not-found">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-push-6">
                        <div class="page-content">
                            <div class="error">
                                <div class="errorboxoutline">
                                    <div class="error-code">
                                        <span class="first-err"><?php echo '4'; ?></span><span class=""><?php echo '0'; ?></span><span class="last-err"><?php echo '4'; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .page-content -->
                    </div>
                    <div class="col-sm-6 col-sm-pull-6">
                        <div class="page-content">
                            <div class="error">
                                <div class="outline">
                                    <div class="error-message">
                                        <h3 class="error-msg-reaction"><?php esc_html_e( 'Oops!', 'verso-lite' ); ?></h3>
                                      <h4 class="error-page-text"><?php esc_html_e( 'This page could not be found.', 'verso-lite' ); ?></h4>
                                      <p>
                                            <?php esc_html_e( 'The page you are looking for might have been removed. had its name changed, or is temporarily unavailble. Please try one of the following pages:', 'verso-lite' ); ?>
                                      </p>
                                    </div>
                                    <div class="errorboxbody">
                                      <a title="<?php esc_html_e("Go to the Home Page", 'verso-lite') ?> " href="<?php echo esc_url( home_url('/') ); ?>" class="button-home"><?php esc_html_e('Home Page', 'verso-lite'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .page-content -->
                    </div>
                </div>
            </div><!-- .container -->
        </section><!-- .error-404 -->

    </main> <!-- #main -->
  </div> <!-- #primary -->

<?php get_footer(); ?>
