<?php
    /**
     * Theme options via the Customizer.
     *
     * @package foodicious
     * @since foodicious 1.0
     */

    // ------------- Theme Customizer  ------------- //

    add_action( 'customize_register', 'foodicious_customizer_register' );

    function foodicious_customizer_register( $wp_customize ) {



// Pro Version
        class Foodicious_Customize_Pro_Version extends WP_Customize_Control {
            public $type = 'pro_options';

            public function render_content() {
                echo '<span>Upgrade to <strong></strong></span>';
                echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<strong> '. esc_html__( 'Foodicious Premium', 'foodicious' ) .'<strong></a>';
                echo '</a>';
            }
        }

        // Pro Version Links
        class Foodicious_Customize_Pro_Version_Links extends WP_Customize_Control {
            public $type = 'pro_links';

            public function render_content() {
                ?>
                <ul>
                    <li class="customize-control">
                        <h3><?php esc_html_e( 'Upgrade', 'foodicious' ); ?> <span>*</span></h3>
                        <p><?php esc_html_e( 'There are lots of reasons to upgrade to Pro version. Unlimited custom Colors, rich Typography options, multiple variation of Blog Feed layout and way much more. Also Premium Support included.', 'foodicious' ); ?></p>
                        <a href="<?php echo esc_url('https://www.vinethemes.com/downloads/foodicious-food-blog-wordpress-theme/'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Get Foodicious Premium', 'foodicious' ); ?></a>
                    </li>
                    <li class="customize-control">
                        <h3><?php esc_html_e( 'Documentation', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'Read how to customize the theme, set up widgets, and learn all the possible options available to you.', 'foodicious' ); ?></p>
                        <a href="<?php echo esc_url('https://www.vinethemes.com/documentation/foodicious-theme-documentation/'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Documentation', 'foodicious' ); ?></a>
                    </li>
                    <li class="customize-control">
                        <h3><?php esc_html_e( 'Support', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'For Foodicious theme related questions feel free to post on our support forums.', 'foodicious' ); ?></p>
                        <a href="<?php echo esc_url('https://www.vinethemes.com/forums/'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Support', 'foodicious' ); ?></a>
                    </li>

                </ul>
                <?php
            }
        }


        /*
        ** Pro Version =====
        */

        // add Colors section
        $wp_customize->add_section( 'foodicious_pro' , array(
            'title'		 => esc_html__( 'About Foodicious', 'foodicious' ),
            'priority'	 => 1,
            'capability' => 'edit_theme_options'
        ) );

        // Pro Version
        $wp_customize->add_setting( 'pro_version_', array(
            'sanitize_callback' => 'foodicious_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Foodicious_Customize_Pro_Version_Links ( $wp_customize,
                'pro_version_', array(
                    'section'	=> 'foodicious_pro',
                    'type'		=> 'pro_links',
                    'label' 	=> '',
                    'priority'	=> 1
                )
            )
        );





        //Slick Slider
        $wp_customize->add_section( 'foodicious_customizer_slider', array(
            'title'       => esc_html__( 'Slider Options', 'foodicious' ),
            'description' => esc_html__( 'Configure your Slider here.', 'foodicious' ),
            'priority'    => 1
        ) );


        $wp_customize->add_setting( 'foodicious_customizer_slider_disable', array(
            'default'    => 'enable',
            'section'  => 'foodicious_customizer_slider',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'foodicious_sanitize_radio',
        ) );

        $wp_customize->add_control( 'foodicious_slider_select_box', array(
            'settings' => 'foodicious_customizer_slider_disable',
            'label'    => esc_html__( 'Homepage Slider', 'foodicious' ),
            'section'  => 'foodicious_customizer_slider',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'foodicious' ),
                'disable' => esc_html__( 'Disable', 'foodicious' ),
                ),
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'foodicious_slider_category', array(
            'default' => '0',
            'sanitize_callback'	=> 'absint',
            'section'  => 'foodicious_customizer_slider',

        ) );
         $wp_customize->add_control(new foodicious_Customize_Category_Control( $wp_customize, 'foodicious_slider_category', array(
                    'label'    => esc_html__( 'Category for Slider', 'foodicious' ),
                    'section'  => 'foodicious_customizer_slider',
                    'settings' => 'foodicious_slider_category',
                    'priority'	 => 7
                )
            )
        );

        $wp_customize->add_setting( 'foodicious_slider_slides', array(
            'default' => '3',
            'sanitize_callback'	=> 'absint',
            'section'  => 'foodicious_customizer_slider',
        ) );

        $wp_customize->add_control( 'foodicious_slider_slides', array(
                    'label'      => esc_html__('Number of Posts for Slider','foodicious'),
                    'section'    => 'foodicious_customizer_slider',
                    'settings'   => 'foodicious_slider_slides',
                    'type'		 => 'number',
                    'priority'	 => 8
                )
        );

        $wp_customize->add_setting( 'foodicious_slider_designs', array(
            'default'    => 'Slider1',
            'section'  => 'foodicious_customizer_slider',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'foodicious_sanitize_radio',
        ) );

        $wp_customize->add_control( 'foodicious_slider_designs', array(
            'type' => 'radio',
            'label'    => esc_html__( 'Slider Designs', 'foodicious' ),
            'section'  => 'foodicious_customizer_slider',
            'choices'  => array(
                'Slider1'  => esc_html__( 'Carousel', 'foodicious' ),
                'Slider2' => esc_html__( 'Grid', 'foodicious' ),
                'Slider3' => esc_html__( 'Modern Carousel', 'foodicious' ),
            ),
            'priority' => 9
        ) );


        // Featured Boxes Starts

        $wp_customize->add_section( 'foodicious_featured_boxes' , array(
            'title'      => esc_html__( 'Featured Boxes','foodicious'),
            'description'=> esc_html__( 'Configure Featured Boxes', 'foodicious' ),
            'priority'   => 2,
        ) );

        // Featured Boxes
        $wp_customize->add_setting('foodicious_featured_box', array(
            'default'     => false,
            'section'  => 'foodicious_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'foodicious_sanitize_checkbox',
        ) );
        $wp_customize->add_setting('foodicious_promo1_title', array(
            'default'     => '',
            'section'  => 'foodicious_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('foodicious_promo1_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'foodicious_promo1_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('foodicious_promo2_title', array(
            'default'     => '',
            'section'  => 'foodicious_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('foodicious_promo2_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'foodicious_promo2_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('foodicious_promo3_title', array(
            'default'     => '',
            'section'  => 'foodicious_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('foodicious_promo3_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'foodicious_promo3_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('foodicious_promo4_title', array(
            'default'     => '',
            'section'  => 'foodicious_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('foodicious_promo4_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'foodicious_promo4_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('foodicious_promo5_title', array(
            'default'     => '',
            'section'  => 'foodicious_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('foodicious_promo5_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'foodicious_promo5_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('foodicious_promo6_title', array(
            'default'     => '',
            'section'  => 'foodicious_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('foodicious_promo6_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'foodicious_promo6_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('foodicious_promo7_title', array(
            'default'     => '',
            'section'  => 'foodicious_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('foodicious_promo7_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'foodicious_promo7_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('foodicious_promo8_title', array(
            'default'     => '',
            'section'  => 'foodicious_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('foodicious_promo8_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'foodicious_promo8_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'featured_boxes',
                array(
                    'label'      => esc_html__('Enable Featured Boxes','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_featured_box',
                    'type'		 => 'checkbox',
                    'priority'	 => 1
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo1_title',
                array(
                    'label'      => esc_html__('Featured Box1 Title','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo1_title',
                    'type'		 => 'text',
                    'priority'	 => 3
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo1_image',
                array(
                    'label'      => esc_html__('Featured Box1 Image','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo1_image',
                    'priority'	 => 4
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo1_url',
                array(
                    'label'      => esc_html__('Featured Box1 URL','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo1_url',
                    'type'		 => 'url',
                    'priority'	 => 5
                )
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo2_title',
                array(
                    'label'      => esc_html__('Featured Box2 Title','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo2_title',
                    'type'		 => 'text',
                    'priority'	 => 6
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo2_image',
                array(
                    'label'      => esc_html__('Featured Box2 Image','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo2_image',
                    'priority'	 => 7
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo2_url',
                array(
                    'label'      => esc_html__('Featured Box2 URL','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo2_url',
                    'type'		 => 'url',
                    'priority'	 => 8
                )
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo3_title',
                array(
                    'label'      => esc_html__('Featured Box3 Title','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo3_title',
                    'type'		 => 'text',
                    'priority'	 => 9
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo3_image',
                array(
                    'label'      => esc_html__('Featured Box3 Image','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo3_image',
                    'priority'	 => 10
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo3_url',
                array(
                    'label'      => esc_html__('Featured Box3 URL','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo3_url',
                    'type'		 => 'url',
                    'priority'	 => 11
                )
            )
        );


        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo4_title',
                array(
                    'label'      => esc_html__('Featured Box4 Title','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo4_title',
                    'type'		 => 'text',
                    'priority'	 => 12
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo4_image',
                array(
                    'label'      => esc_html__('Featured Box4 Image','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo4_image',
                    'priority'	 => 13
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo4_url',
                array(
                    'label'      => esc_html__('Featured Box4 URL','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo4_url',
                    'type'		 => 'url',
                    'priority'	 => 14
                )
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo5_title',
                array(
                    'label'      => esc_html__('Featured Box5 Title','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo5_title',
                    'type'		 => 'text',
                    'priority'	 => 15
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo5_image',
                array(
                    'label'      => esc_html__('Featured Box5 Image','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo5_image',
                    'priority'	 => 16
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo5_url',
                array(
                    'label'      => esc_html__('Featured Box5 URL','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo5_url',
                    'type'		 => 'url',
                    'priority'	 => 17
                )
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo6_title',
                array(
                    'label'      => esc_html__('Featured Box6 Title','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo6_title',
                    'type'		 => 'text',
                    'priority'	 => 18
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo6_image',
                array(
                    'label'      => esc_html__('Featured Box6 Image','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo6_image',
                    'priority'	 => 19
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo6_url',
                array(
                    'label'      => esc_html__('Featured Box6 URL','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo6_url',
                    'type'		 => 'url',
                    'priority'	 => 20
                )
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo7_title',
                array(
                    'label'      => esc_html__('Featured Box7 Title','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo7_title',
                    'type'		 => 'text',
                    'priority'	 => 21
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo7_image',
                array(
                    'label'      => esc_html__('Featured Box7 Image','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo7_image',
                    'priority'	 => 22
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo7_url',
                array(
                    'label'      => esc_html__('Featured Box7 URL','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo7_url',
                    'type'		 => 'url',
                    'priority'	 => 23
                )
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo8_title',
                array(
                    'label'      => esc_html__('Featured Box8 Title','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo8_title',
                    'type'		 => 'text',
                    'priority'	 => 24
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo8_image',
                array(
                    'label'      => esc_html__('Featured Box8 Image','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo8_image',
                    'priority'	 => 25
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo8_url',
                array(
                    'label'      => esc_html__('Featured Box8 URL','foodicious'),
                    'section'    => 'foodicious_featured_boxes',
                    'settings'   => 'foodicious_promo8_url',
                    'type'		 => 'url',
                    'priority'	 => 26
                )
            )
        );
        // Featured Boxes End


        //General Options

        $wp_customize->add_section( 'foodicious_general_options', array(
            'title'       => esc_html__( 'General Options', 'foodicious' ),
            'description' => esc_html__( 'Configure Your Theme Settings Here.', 'foodicious' ),
            'priority'    => 3
        ) );

        $wp_customize->add_setting( 'foodicious_general_search_icon', array(
            'section'  => 'foodicious_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'foodicious_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'foodicious_general_search_icon', array(
            'settings' => 'foodicious_general_search_icon',
            'label'    => esc_html__( 'Hide Top Search Icon', 'foodicious' ),
            'section'  => 'foodicious_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'foodicious_general_responsive', array(
            'section'  => 'foodicious_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'foodicious_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'foodicious_general_responsive', array(
            'settings' => 'foodicious_general_responsive',
            'label'    => esc_html__( 'Disable Responsive', 'foodicious' ),
            'section'  => 'foodicious_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'foodicious_general_sidebar_home', array(
            'section'  => 'foodicious_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'foodicious_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'foodicious_general_sidebar_home', array(
            'settings' => 'foodicious_general_sidebar_home',
            'label'    => esc_html__( 'Disable Sidebar on Homepage and Archive Pages', 'foodicious' ),
            'section'  => 'foodicious_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'foodicious_general_sidebar_post', array(
            'section'  => 'foodicious_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'foodicious_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'foodicious_general_sidebar_post', array(
            'settings' => 'foodicious_general_sidebar_post',
            'label'    => esc_html__( 'Disable Sidebar on Posts', 'foodicious' ),
            'section'  => 'foodicious_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'foodicious_general_sidebar_page', array(
            'section'  => 'foodicious_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'foodicious_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'foodicious_general_sidebar_page', array(
            'settings' => 'foodicious_general_sidebar_page',
            'label'    => esc_html__( 'Disable Sidebar on Pages', 'foodicious' ),
            'section'  => 'foodicious_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );

        $wp_customize->add_setting( 'foodicious_general_author_post', array(
            'section'  => 'foodicious_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'foodicious_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'foodicious_general_author_post', array(
            'settings' => 'foodicious_general_author_post',
            'label'    => esc_html__( 'Disable Author Box on Posts', 'foodicious' ),
            'section'  => 'foodicious_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );

        $wp_customize->add_setting( 'foodicious_general_post_summary', array(
            'default' => 'excerpt',
            'section'  => 'foodicious_general_options',
            'sanitize_callback'	=> 'foodicious_sanitize_radio',
        ) );

        $wp_customize->add_control( 'foodicious_general_post_summary', array(
            'type' => 'radio',
            'label'    => esc_html__( 'Homepage and Archive Post Summary Type', 'foodicious' ),
            'section'  => 'foodicious_general_options',
            'choices'  => array(
                'excerpt'  => esc_html__( 'Use Excerpt', 'foodicious' ),
                'full' => esc_html__( 'Use Full Post', 'foodicious' ),
            ),
            'priority' => 9
        ) );
        $wp_customize->add_setting( 'foodicious_general_post_layout', array(
            'default' => 'standard',
            'section'  => 'foodicious_general_options',
            'sanitize_callback'	=> 'foodicious_sanitize_radio',
        ) );
        $wp_customize->add_control( 'foodicious_general_post_layout', array(
            'type' => 'radio',
            'label'    => esc_html__( 'Homepage and Archive Post Layout Type', 'foodicious' ),
            'section'  => 'foodicious_general_options',
            'choices'  => array(
                'grid'  => esc_html__( 'Grid Layout', 'foodicious' ),
                'standard' => esc_html__( 'Standard Post', 'foodicious' ),
                'list' => esc_html__( 'List Post [Only in Premium Version]', 'foodicious' ),
            ),
            'priority' => 10
        ) );

        // Pro Version
        $wp_customize->add_setting( 'pro_version_colors2', array(
            'sanitize_callback' => 'foodicious_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Foodicious_Customize_Pro_Version ( $wp_customize,
                'pro_version_colors2', array(
                    'section'	  => 'foodicious_general_options',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'foodicious' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/foodicious-food-blog-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );


        // Footer Settings
        $wp_customize->add_section( 'foodicious_footer_settings', array(
            'title'       => esc_html__( 'Footer Settings', 'foodicious' ),
            'description' => esc_html__( 'Configure Your Footer Here. You can\'t change our footer links in the free version of this theme.', 'foodicious' ),
            'priority'    => 8
        ) );

        $wp_customize->add_setting(
            'footer_copyright',
            array(
                'default'     => 'Copyright 2021.',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control('footer_copyright', array(
                    'label'      => esc_html__('Footer Copyright Text','foodicious'),
                    'section'    => 'foodicious_footer_settings',
                    'settings'   => 'footer_copyright',
                    'type'		 => 'text',
                    'priority'	 => 1
                )
        );


        // Pro Version
        $wp_customize->add_setting( 'pro_version_colors3', array(
            'sanitize_callback' => 'foodicious_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Foodicious_Customize_Pro_Version ( $wp_customize,
                'pro_version_colors3', array(
                    'section'	  => 'foodicious_footer_settings',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'foodicious' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/foodicious-food-blog-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );


    }


// Adding controls to default customizer panel
    add_action('customize_register','foodicious_customizer_options');
    /*
     * Add in our custom Main Color setting and control to be used in the Customizer in the Colors section
     *
     */
    function foodicious_customizer_options( $wp_customize ) {
        $wp_customize->add_setting(
            'foodicious_main_color', //give it an ID
            array(
                'default' => '#fc4544', // Give it a default
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'      => 'refresh'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'foodicious_custom_main_color', //give it an ID
                array(
                    'label'      => esc_html__( 'Main Color', 'foodicious' ), //set the label to appear in the Customizer
                    'section'    => 'colors', //select the section for it to appear under
                    'settings'   => 'foodicious_main_color' //pick the setting it applies to
                )
            )
        );
        $wp_customize->add_setting(
            'foodicious_main_text', //give it an ID
            array(
                'default' => '#fc4544', // Give it a default
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'      => 'refresh'
            )
        );
        $wp_customize->add_control(
            new Foodicious_Customize_Pro_Version(
                $wp_customize,
                'foodicious_custom_text', //give it an ID
                array(
                    'label'      => esc_html__( 'Upgrade', 'foodicious' ), //set the label to appear in the Customizer
                    'section'    => 'colors', //select the section for it to appear under
                    'settings'   => 'foodicious_main_text', //pick the setting it applies to
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/foodicious-food-blog-wordpress-theme/' ),
                )
            )
        );



    }



    /*
    * Adding a section to manage social links
    */
    function foodicious_sociallink_customizer( $wp_customize ) {
        $wp_customize->add_section( 'foodicious_social_section' , array(
            'title' => esc_html__( 'Social Links', 'foodicious' ),
            'priority' => 30,
            'description' => 'Setting for Social media Icons. Add a link to each of your Social Media Profiles. Leave the field empty for the icons you don\'t want to be displayed.',

        ) );

        $wp_customize->add_setting( 'foodicious_facebook', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'foodicious_twitter', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );

        $wp_customize->add_setting( 'foodicious_pinterest', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );

        $wp_customize->add_setting( 'foodicious_linkedin', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'foodicious_instagram', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'foodicious_bloglovin', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'foodicious_snapchat', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'foodicious_tumblr', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'foodicious_youtube', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'foodicious_dribbble', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'foodicious_soundcloud', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'foodicious_vimeo', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'foodicious_rss', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );


        $wp_customize->add_control( 'facebook', array(
            'type' => 'url',
            'label' => esc_html__( 'Facebook', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_facebook',
        ) );
        $wp_customize->add_control( 'twitter', array(
            'type' => 'url',
            'label' => esc_html__( 'Twitter', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_twitter',
        ) );
        $wp_customize->add_control( 'linkedin', array(
            'type' => 'url',
            'label' => esc_html__( 'Linkedin', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_linkedin',
        ) );
        $wp_customize->add_control( 'pinterest', array(
            'type' => 'url',
            'label' => esc_html__( 'Pinterest', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_pinterest',
        ) );

        $wp_customize->add_control( 'instagram', array(
            'type' => 'url',
            'label' => esc_html__( 'Instagram', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_instagram',
        ) );
        $wp_customize->add_control( 'bloglovin', array(
            'type' => 'url',
            'label' => esc_html__( 'Bloglovin', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_bloglovin',
        ) );
        $wp_customize->add_control( 'snapchat', array(
            'type' => 'url',
            'label' => esc_html__( 'Snapchat', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_snapchat',
        ) );
        $wp_customize->add_control( 'tumblr', array(
            'type' => 'url',
            'label' => esc_html__( 'Tumblr', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_tumblr',
        ) );
        $wp_customize->add_control( 'youtube', array(
            'type' => 'url',
            'label' => esc_html__( 'Youtube', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_youtube',
        ) );
        $wp_customize->add_control( 'dribbble', array(
            'type' => 'url',
            'label' => esc_html__( 'Dribbble', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_dribbble',
        ) );
        $wp_customize->add_control( 'soundcloud', array(
            'type' => 'url',
            'label' => esc_html__( 'Soundcloud', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_soundcloud',
        ) );
        $wp_customize->add_control( 'vimeo', array(
            'type' => 'url',
            'label' => esc_html__( 'Vimeo', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_vimeo',
        ) );
        $wp_customize->add_control( 'rss', array(
            'type' => 'url',
            'label' => esc_html__( 'Rss', 'foodicious' ),
            'section' => 'foodicious_social_section',
            'settings' => 'foodicious_rss',
        ) );


    }
    add_action('customize_register', 'foodicious_sociallink_customizer');

    function foodicious_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }


    //checkbox sanitization function
    function foodicious_sanitize_checkbox( $input ){

        //returns true if checkbox is checked
        return (( isset( $input ) && true === $input ) ? true : false );
    }

    //radio box sanitization function
    function foodicious_sanitize_radio( $input, $setting ){
    $valid = array(
        'Slider1' => 'Slider1',
        'Slider2' => 'Slider2',
        'Slider3' => 'Slider3',
        'excerpt' => 'excerpt',
        'full' => 'full',
        'standard' => 'standard',
        'grid' => 'grid',
        'enable' => 'enable',
        'disable' => 'disable',
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
    }

    function foodicious_panels_js() {
        wp_enqueue_style( 'foodicious-customizer-ui-css', get_theme_file_uri( '/customizer-ui.css' ) );
    }
    add_action( 'customize_controls_enqueue_scripts', 'foodicious_panels_js' );
