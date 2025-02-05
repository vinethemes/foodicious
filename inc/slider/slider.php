<?php
    /**
     * Template for the post excerpt slider on the homepage.
     *
     * @package foodicious
     * @since foodicious 1.0
     */
    ?>

    <!--  scroller -->
    <?php if( is_home() && get_theme_mod( 'foodicious_customizer_slider_disable' ) != 'disable' ) {

        if(get_theme_mod('foodicious_slider_designs')=='Slider1'){ ?>

            <div class="foodicious_slides">
                    <?php
                    $foodicious_image_size = "foodicious-medium-image";
                    $foodicious_number23 = get_theme_mod( 'foodicious_slider_slides' );
                    $foodicious_category=get_theme_mod('foodicious_slider_category');

                        $foodicious_featured_list_args  = array(
                            'posts_per_page' => $foodicious_number23,
                            'cat' => $foodicious_category
                        );
                        $foodicious_featured_list_posts = new WP_Query( $foodicious_featured_list_args );
                    ?>

                    <?php while( $foodicious_featured_list_posts->have_posts() ) : $foodicious_featured_list_posts->the_post() ?>
                <div class="item-slide">


                <div class="slide-wrap">

                    <div class="feat-item-wrapper">
                        <div class="feat-overlay">
                            <div class="feat-inner">
                                <div class="scroll-post">
                                    <?php echo foodicious_getCategory(); ?>
                                </div>
                                <h2 class="feat-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="slider-meta">
                                    <div class="post-date">
                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                    </div>
                                    <div class="postcomment"><?php comments_popup_link( __( '0', 'foodicious' ), __( '1', 'foodicious' ), __( '%', 'foodicious' ),'','' ); ?></div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <?php if ( has_post_thumbnail() ) {
                        $foodicious_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $foodicious_image_size ); ?>
                        <div class="image-slide">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <div class="feat-item" style="background-image:url(<?php if(!$foodicious_image) { echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); } else { echo esc_url($foodicious_image[0]); } ?>);"></div>
                            </a>
                        </div>
                    <?php }
                    else { ?>
                        <div class="image-slide">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <div class="feat-item" style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                            </a>
                        </div>
                    <?php } ?>


                </div>

                </div>

            <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
            </div><!-- slides -->

        <?php }

        else if(get_theme_mod( 'foodicious_slider_designs' ) != 'Slider2' && get_theme_mod( 'foodicious_slider_designs' ) != 'Slider3'){ ?>
            <div class="foodicious_slides ">
                <?php
                $foodicious_image_size = "foodicious-medium-image";
                $foodicious_number23 = get_theme_mod( 'foodicious_slider_slides' );
                $foodicious_category=get_theme_mod('foodicious_slider_category');

                $foodicious_featured_list_args  = array(
                    'posts_per_page' => $foodicious_number23,
                    'cat' => $foodicious_category
                );
                $foodicious_featured_list_posts = new WP_Query( $foodicious_featured_list_args );
                ?>

                <?php while( $foodicious_featured_list_posts->have_posts() ) : $foodicious_featured_list_posts->the_post() ?>
                    <div class="item-slide">


                        <div class="slide-wrap">

                            <div class="feat-item-wrapper">
                                <div class="feat-overlay">
                                    <div class="feat-inner">
                                        <div class="scroll-post">
                                            <?php echo foodicious_getCategory(); ?>
                                        </div>
                                        <h2 class="feat-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <div class="slider-meta">
                                            <div class="post-date">
                                                <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                            </div>
                                            <div class="postcomment"><?php comments_popup_link( __( '0', 'foodicious' ), __( '1', 'foodicious' ), __( '%', 'foodicious' ),'','' ); ?></div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <?php if ( has_post_thumbnail() ) {
                                $foodicious_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $foodicious_image_size ); ?>
                                <div class="image-slide">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item" style="background-image:url(<?php if(!$foodicious_image) { echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); } else { echo esc_url($foodicious_image[0]); } ?>);"></div>
                                    </a>
                                </div>
                            <?php }
                            else { ?>
                                <div class="image-slide">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item" style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                                    </a>
                                </div>
                            <?php } ?>


                        </div>

                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div><!-- slides -->
        <?php
        }

        if(get_theme_mod('foodicious_slider_designs')=='Slider2'){ ?>

            <div class="foodicious_slides2 container">
                <?php
                $foodicious_image_size = "foodicious-large-image";
                $foodicious_number23 = get_theme_mod( 'foodicious_slider_slides' );
                $foodicious_category=get_theme_mod('foodicious_slider_category');

                if($foodicious_number23!=0&&$foodicious_number23>5){
                    $foodicious_number23=5;
                }
                else{
                    $foodicious_number23=5;
                }
                $foodicious_featured_list_args  = array(
                    'posts_per_page' => $foodicious_number23,
                    'cat' => $foodicious_category
                );
                $foodicious_featured_list_posts = new WP_Query( $foodicious_featured_list_args );
                ?>

                <?php while( $foodicious_featured_list_posts->have_posts() ) : $foodicious_featured_list_posts->the_post() ?>
                    <div class="item-slide">


                        <?php if ( has_post_thumbnail() ) {
                            $foodicious_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $foodicious_image_size ); ?>
                            <div class="image-slide">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <div class="feat-item" style="background-image:url(<?php if(!$foodicious_image) { echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); } else { echo esc_url($foodicious_image[0]); } ?>);"></div>
                                </a>
                            </div>
                        <?php }
                        else { ?>
                            <div class="image-slide">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <div class="feat-item" style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                                </a>
                            </div>
                        <?php } ?>


                        <div class="feat-item-wrapper">
                            <div class="feat-overlay">
                                <div class="feat-inner">
                                    <div class="scroll-post">
                                        <?php echo foodicious_getCategory(); ?>
                                    </div>
                                    <h2 class="feat-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="slider-meta">
                                        <div class="post-date">
                                            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                        </div>
                                        <div class="postcomment"><?php comments_popup_link( __( '0', 'foodicious' ), __( '1', 'foodicious' ), __( '%', 'foodicious' ),'','' ); ?></div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div><!-- slides -->

        <?php }


    if(get_theme_mod('foodicious_slider_designs')=='Slider3'){ ?>

        <div class="foodicious_slides3">
            <?php
            $foodicious_image_size = "foodicious-large-image";
            $foodicious_number23 = get_theme_mod( 'foodicious_slider_slides' );
            $foodicious_category=get_theme_mod('foodicious_slider_category');

            $foodicious_featured_list_args  = array(
                'posts_per_page' => $foodicious_number23,
                'cat' => $foodicious_category
            );
            $foodicious_featured_list_posts = new WP_Query( $foodicious_featured_list_args );
            ?>

            <?php while( $foodicious_featured_list_posts->have_posts() ) : $foodicious_featured_list_posts->the_post() ?>
                <div class="item-slide">


                    <?php if ( has_post_thumbnail() ) {
                        $foodicious_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $foodicious_image_size ); ?>
                        <div class="image-slide">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <div class="feat-item" style="background-image:url(<?php if(!$foodicious_image) { echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); } else { echo esc_url($foodicious_image[0]); } ?>);"></div>
                            </a>
                        </div>
                    <?php }
                    else { ?>
                        <div class="image-slide">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <div class="feat-item" style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                            </a>
                        </div>
                    <?php } ?>


                    <div class="feat-item-wrapper">
                        <div class="feat-overlay">
                            <div class="feat-inner">
                                <div class="scroll-post">
                                    <?php echo foodicious_getCategory(); ?>
                                </div>
                                <h2 class="feat-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="slider-meta">
                                    <div class="post-date">
                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                    </div>
                                    <div class="postcomment"><?php comments_popup_link( __( '0', 'foodicious' ), __( '1', 'foodicious' ), __( '%', 'foodicious' ),'','' ); ?></div>
                                </div>

                            </div>
                        </div>




                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- slides -->

    <?php } ?>


    <?php } ?>