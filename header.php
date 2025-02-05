<?php
    /**
     *
     * Displays all of the <head> section and everything before <div id="content-wrap">
     *
     * @package foodicious
     * @since foodicious 1.0
     */
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="profile" href="http://gmpg.org/xfn/11" />

        <?php if ( is_singular() && pings_open() ) { ?>
            <link rel="pingback" href="<?php echo esc_url(get_bloginfo( 'pingback_url' )); ?>" />
        <?php } ?>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
    <?php
    //wp_body_open hook from WordPress 5.2
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    else { do_action( 'wp_body_open' ); }
    ?>
    <a class="skip-link" href="#content"><?php _e( 'Skip to main content', 'foodicious' ); ?></a>
        <div id="wrapper" class="clearfix">


                        <div class="foodicious-top-bar">
                            <div class="menu-wrap">

                                <div class="header-inside clearfix">



                                    <div class="hearder-holder">



                                        <?php if( is_front_page() && is_home() ) { ?>

                                            <div class="logo-default">
                                                <div class="logo-text">

                                                    <?php
                                                    if (has_custom_logo()) {
                                                        the_custom_logo();
                                                        if (display_header_text()==true){ ?>

                                                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

                                                            <span class="site-description"><?php bloginfo( 'description' ); ?></span>
                                                            <?php
                                                        }
                                                    }

                                                    else {

                                                    if (display_header_text() == true){
                                                    ?>
                                                    <span class="only-text">
                                                    <h1>
                                                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo( 'name' ); ?></a>
                                                    </h1>
                                                    <span><?php bloginfo('description') ?></span>
                                                    </span>
                                                    <?php
                                                    }
                                                    }
                                                    ?><!-- otherwise show the site title and description -->

                                                </div>

                                            </div>

                                        <?php } else { ?>

                                            <div class="logo-default">
                                                <div class="logo-text">

                                                    <?php
                                                    if (has_custom_logo()) {
                                                        the_custom_logo();
                                                        if (display_header_text()==true){ ?>

                                                    <span class="only-text">
                                                            <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>

                                                            <span class="site-description"><?php bloginfo( 'description' ); ?></span>
                                                    </span>
                                                            <?php

                                                        }
                                                    }

                                                    else {

                                                    if (display_header_text() == true){
                                                    ?>
                                                    <h2>
                                                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo( 'name' ); ?></a>
                                                    </h2>
                                                    <span><?php bloginfo('description') ?></span>
                                                    <?php
                                                    }
                                                    }
                                                    ?><!-- otherwise show the site title and description -->

                                                </div>

                                            </div>

                                        <?php } ?>



                                        <?php if ( has_header_image() ) { ?>
                                            <img src="<?php header_image(); ?>" class="header-image" alt="<?php esc_attr_e( 'Header image','foodicious' ); ?>" />
                                        <?php } ?>

                                    </div>

                                </div><!-- header inside -->

                                <?php if ( has_nav_menu( 'main' ) ) { ?>
                                    <div class="top-bar">
                                        <div class="menu-wrap-inner">
                                            <a class="menu-toggle" href="#"><i class="fa fa-bars"></i></a>
                                            <?php wp_nav_menu( array( 'theme_location' => 'main', 'menu_class' => 'main-nav clearfix' ) ); ?>

                                        </div>
                                    </div><!-- top bar -->
                                <?php } ?>




                            </div>
                            <div class="social-links">

                                <div class="socials">

                                    <?php if ( get_theme_mod( 'foodicious_facebook' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_facebook' ) ); ?>" class="facebook" data-foodicious-title="<?php esc_attr_e( 'Facebook','foodicious' ); ?>" target="_blank"><span class="font-icon-social-facebook"><i class="fa fa-facebook"></i></span></a>
                                    <?php endif;  ?>

                                    <?php if ( get_theme_mod( 'foodicious_twitter' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_twitter' ) ); ?>" class="twitter" data-foodicious-title="<?php esc_attr_e( 'Twitter','foodicious' ); ?>" target="_blank"><span class="font-icon-social-twitter"><i class="fa fa-twitter"></i></span></a>
                                    <?php endif;  ?>


                                    <?php if ( get_theme_mod( 'foodicious_pinterest' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_pinterest' ) ); ?>" class="pinterest" data-foodicious-title="<?php esc_attr_e( 'Pinterest','foodicious' ); ?>" target="_blank"><span class="font-icon-social-pinterest"><i class="fa fa-pinterest"></i></span></a>
                                    <?php endif;  ?>

                                    <?php if ( get_theme_mod( 'foodicious_linkedin' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_linkedin' ) ); ?>" class="linkedin" data-foodicious-title="<?php esc_attr_e( 'Linkedin','foodicious' ); ?>" target="_blank"><span class="font-icon-social-linkedin"><i class="fa fa-linkedin"></i></span></a>
                                    <?php endif;  ?>

                                    <?php if ( get_theme_mod( 'foodicious_instagram' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_instagram' ) ); ?>" class="instagram" data-foodicious-title="<?php esc_attr_e( 'Instagram','foodicious' ); ?>" target="_blank"><span class="font-icon-social-instagram"><i class="fa fa-instagram"></i></span></a>
                                    <?php endif;  ?>
                                    <?php if ( get_theme_mod( 'foodicious_bloglovin' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_bloglovin' ) ); ?>" class="bloglovin" data-foodicious-title="<?php esc_attr_e( 'Bloglovin','foodicious' ); ?>" target="_blank"><span class="font-icon-social-bloglovin"><i class="fa fa-heart"></i></span></a>
                                    <?php endif;  ?>
                                    <?php if ( get_theme_mod( 'foodicious_snapchat' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_snapchat' ) ); ?>" class="snapchat" data-foodicious-title="<?php esc_attr_e( 'Snapchat','foodicious' ); ?>" target="_blank"><span class="font-icon-social-snapchat"><i class="fa fa-snapchat"></i></span></a>
                                    <?php endif;  ?>
                                    <?php if ( get_theme_mod( 'foodicious_tumblr' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_tumblr' ) ); ?>" class="tumblr" data-foodicious-title="<?php esc_attr_e( 'Tumblr','foodicious' ); ?>" target="_blank"><span class="font-icon-social-tumblr"><i class="fa fa-tumblr"></i></span></a>
                                    <?php endif;  ?>
                                    <?php if ( get_theme_mod( 'foodicious_youtube' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_youtube' ) ); ?>" class="youtube" data-foodicious-title="<?php esc_attr_e( 'Youtube','foodicious' ); ?>" target="_blank"><span class="font-icon-social-youtube"><i class="fa fa-youtube-play"></i></span></a>
                                    <?php endif;  ?>
                                    <?php if ( get_theme_mod( 'foodicious_dribbble' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_dribbble' ) ); ?>" class="dribbble" data-foodicious-title="<?php esc_attr_e( 'Dribbble','foodicious' ); ?>" target="_blank"><span class="font-icon-social-dribbble"><i class="fa fa-dribbble"></i></span></a>
                                    <?php endif;  ?>
                                    <?php if ( get_theme_mod( 'foodicious_soundcloud' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_soundcloud' ) ); ?>" class="soundcloud" data-foodicious-title="<?php esc_attr_e( 'Soundcloud','foodicious' ); ?>" target="_blank"><span class="font-icon-social-soundcloud"><i class="fa fa-soundcloud"></i></span></a>
                                    <?php endif;  ?>
                                    <?php if ( get_theme_mod( 'foodicious_vimeo' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_vimeo' ) ); ?>" class="vimeo" data-foodicious-title="<?php esc_attr_e( 'Vimeo','foodicious' ); ?>" target="_blank"><span class="font-icon-social-vimeo"><i class="fa fa-vimeo"></i></span></a>
                                    <?php endif;  ?>
                                    <?php if ( get_theme_mod( 'foodicious_rss' ) ) : ?>
                                        <a href="<?php echo esc_url( get_theme_mod( 'foodicious_rss' ) ); ?>" class="rss" data-foodicious-title="<?php esc_attr_e( 'RSS','foodicious' ); ?>" target="_blank"><span class="font-icon-social-rss"><i class="fa fa-envelope-o"></i></span></a>
                                    <?php endif;  ?>

                                    <?php if(!get_theme_mod('foodicious_general_search_icon')) : ?>
                                        <button class="button ct_icon search" id="open-trigger">
                                            <i class="fa fa-search"></i>
                                        </button>


                                        <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                                            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                                                <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">

                                                    <main class="modal__content" id="modal-1-content">
                                                        <div id="modal-1-content">
                                                            <?php get_search_form(); ?>

                                                        </div>
                                                    </main>

                                                </div>
                                                <button class="button" id="close-trigger">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </div>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            </div>

                        </div><!-- top bar -->

            <?php if( !is_home() ) : ?>
                <?php if(get_theme_mod( 'foodicious_featured_box' ) == true) : ?>

                    <?php get_template_part('inc/featured-box/featured_box'); ?>

                <?php endif; ?>
            <?php endif; ?>


            <div id="main" class="clearfix">
