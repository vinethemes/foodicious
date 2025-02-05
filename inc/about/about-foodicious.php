<?php // About Foodicious

// Add About Foodicious Page
function foodicious_about_page() {
    add_theme_page( esc_html__( 'About Foodicious', 'foodicious' ), esc_html__( 'About Foodicious', 'foodicious' ), 'edit_theme_options', 'about-foodicious', 'foodicious_about_page_output' );
}
add_action( 'admin_menu', 'foodicious_about_page' );

// Render About foodicious HTML
function foodicious_about_page_output() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Welcome to Foodicious!', 'foodicious' ); ?></h1>
        <p class="welcome-text">
            <?php esc_html_e( 'Foodicious is free food blog WordPress Blog theme. It\'s perfect for any kind of blog: personal, multi-author, food, lifestyle, etc... Is fully Responsive and Retina Display ready, clean, modern and minimal. Coded with latest WordPress\' standards.', 'foodicious' ); ?>
        </p>

        <!-- Tabs -->
        <?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'foodicious_tab_1'; ?>

        <div class="nav-tab-wrapper">
            <a href="<?php echo esc_url('?page=about-foodicious&tab=foodicious_tab_1')?>" class="nav-tab <?php echo $active_tab == 'foodicious_tab_1' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Getting Started', 'foodicious' ); ?>
            </a>
            <a href="<?php echo esc_url('?page=about-foodicious&tab=foodicious_tab_2')?>" class="nav-tab <?php echo $active_tab == 'foodicious_tab_2' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Recommended Plugins', 'foodicious' ); ?>
            </a>
            <a href="<?php echo esc_url('?page=about-foodicious&tab=foodicious_tab_3')?>" class="nav-tab <?php echo $active_tab == 'foodicious_tab_3' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Support', 'foodicious' ); ?>
            </a>
            <a href="<?php echo esc_url('?page=about-foodicious&tab=foodicious_tab_4')?>" class="nav-tab <?php echo $active_tab == 'foodicious_tab_4' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Free vs Premium', 'foodicious' ); ?>
            </a>
        </div>

        <!-- Tab Content -->
        <?php if ( $active_tab == 'foodicious_tab_1' ) : ?>

            <div class="three-columns-wrap">

                <br>

                <div class="column-wdith-3">
                    <h3><?php esc_html_e( 'Theme Documentation', 'foodicious' ); ?></h3>
                    <p>
                        <?php esc_html_e( 'Highly recommended to begin with this, read the full theme documentation to understand the basics and even more details about how to use Foodicious. It is worth to spend 10 minutes and know almost everything about the theme.', 'foodicious' ); ?>
                    </p>
                    <a target="_blank" href="<?php echo esc_url('https://www.vinethemes.com/documentation/foodicious-theme-documentation/'); ?>" class="button button-primary"><?php esc_html_e( 'Read Documentation', 'foodicious' ); ?></a>
                </div>


                <div class="column-wdith-3">
                    <h3><?php esc_html_e( 'Theme Customizer', 'foodicious' ); ?></h3>
                    <p>
                        <?php esc_html_e( 'All theme options are located here. After reading the Theme Documentation we recommend you to open the Theme Customizer and play with some options. You will enjoy it.', 'foodicious' ); ?>
                    </p>
                    <a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Customize Your Site', 'foodicious' ); ?></a>
                </div>

            </div>

            <div class="four-columns-wrap">

                <h2><?php esc_html_e( 'Foodicious Premium - Predefined Styles', 'foodicious' ); ?></h2>
                <p>
                    <?php esc_html_e( 'Foodicious Premium\'s powerful setup allows you to easily create unique looking sites. Here are a few included examples that can be installed with one click in the ', 'foodicious' ); ?>
                    <a target="_blank" href="<?php echo esc_url('https://www.vinethemes.com/downloads/foodicious-food-blog-wordpress-theme/'); ?>"><?php esc_html_e( 'Foodicious Premium Theme.', 'foodicious' ); ?></a>
                    <?php esc_html_e( 'More details in the theme Documentation.', 'foodicious' ); ?>
                </p>

                <div class="column-wdith-4">
                    <div class="active-style"><?php esc_html_e( 'Active', 'foodicious' ); ?></div>

                    <div>
                        <h2><?php esc_html_e( 'Version 1', 'foodicious' ); ?></h2>
                        <a href="<?php echo esc_url('https://demo.vinethemes.com/foodicious/'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'foodicious' ); ?></a>
                    </div>
                </div>
                <div class="column-wdith-4">

                    <div>
                        <h2><?php esc_html_e( 'Version 2', 'foodicious' ); ?></h2>
                        <a href="<?php echo esc_url('https://demo.vinethemes.com/foodicious/?home=2'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'foodicious' ); ?></a>
                    </div>
                </div>
                <div class="column-wdith-4">

                    <div>
                        <h2><?php esc_html_e( 'Version 3', 'foodicious' ); ?></h2>
                        <a href="<?php echo esc_url('https://demo.vinethemes.com/foodicious/?home=3'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'foodicious' ); ?></a>
                    </div>
                </div>


            </div>

        <?php elseif ( $active_tab == 'foodicious_tab_2' ) : ?>

            <div class="three-columns-wrap">

                <br>
                <p><?php esc_html_e( 'Recommended Plugins are fully supported by Foodicious theme. They well build the theme by giving more and more features. These are highly recommended to install.', 'foodicious' ); ?></p>
                <br>

                <?php


                // Kirki
                foodicious_recommended_plugin( 'kirki', 'index', esc_html__( 'Kirki', 'foodicious' ), esc_html__( 'Theme advanced customizer options.', 'foodicious' ) );

                // MailChimp
                foodicious_recommended_plugin( 'mailchimp-for-wp', 'mailchimp-for-wp', esc_html__( 'Mailchimp', 'foodicious' ), esc_html__( 'Mail newsletters. Simple but flexible.', 'foodicious' ) );

                // Instagram Widget
                foodicious_recommended_plugin( 'wp-instagram-widget', 'wp-instagram-widget', esc_html__( 'WP Instagram Widget', 'foodicious' ), esc_html__( 'A WordPress widget for showing your latest Instagram photos.', 'foodicious' ) );



                ?>


            </div>

        <?php elseif ( $active_tab == 'foodicious_tab_3' ) : ?>

            <div class="three-columns-wrap">

                <br>

                <div class="column-wdith-3">
                    <h3>
                        <span class="dashicons dashicons-sos"></span>
                        <?php esc_html_e( 'Forums', 'foodicious' ); ?>
                    </h3>
                    <p>
                        <?php esc_html_e( 'Before asking a questions it\'s highly recommended to search on forums, but if you can\'t find the solution feel free to create a new topic.', 'foodicious' ); ?>
                    <hr>
                    <a target="_blank" href="<?php echo esc_url('https://www.vinethemes.com/forums/'); ?>"><?php esc_html_e( 'Go to Support Forums', 'foodicious' ); ?></a>
                    </p>
                </div>

                <div class="column-wdith-3">
                    <h3>
                        <span class="dashicons dashicons-book"></span>
                        <?php esc_html_e( 'Documentation', 'foodicious' ); ?>
                    </h3>
                    <p>
                        <?php esc_html_e( 'Need more details? Please check out foodicious Theme Documentation for detailed information.', 'foodicious' ); ?>
                    <hr>
                    <a target="_blank" href="<?php echo esc_url('https://www.vinethemes.com/documentation/foodicious-theme-documentation/'); ?>"><?php esc_html_e( 'Read Full Documentation', 'foodicious' ); ?></a>
                    </p>
                </div>


                <div class="column-wdith-3">
                    <h3>
                        <span class="dashicons dashicons-smiley"></span>
                        <?php esc_html_e( 'Donation', 'foodicious' ); ?>
                    </h3>
                    <p>
                        <?php esc_html_e( 'Even a small sum can help us a lot with theme development. If the foodicious theme is useful and our support is helpful, please don\'t hesitate to donate a little bit, at least buy us a Coffee or a Beer :)', 'foodicious' ); ?>
                    <hr>
                    <a target="_blank" href="<?php echo esc_url('https://www.paypal.me/oddthemes'); ?>"><?php esc_html_e( 'Donate with PayPal', 'foodicious' ); ?></a>
                    </p>
                </div>

            </div>

        <?php elseif ( $active_tab == 'foodicious_tab_4' ) : ?>

            <br><br>

            <table class="free-vs-pro form-table">
                <thead>
                <tr>
                    <th>
                        <a href="<?php echo esc_url('https://www.vinethemes.com/downloads/foodicious-food-blog-wordpress-theme/'); ?>" target="_blank" class="button button-primary button-hero">
                            <?php esc_html_e( 'Get Foodicious Premium', 'foodicious' ); ?>
                        </a>

                    </th>
                    <th><?php esc_html_e( 'Foodicious', 'foodicious' ); ?></th>
                    <th><?php esc_html_e( 'Foodicious Premium', 'foodicious' ); ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <h3><?php esc_html_e( '100% Responsive and Retina Ready', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'Theme adapts to any kind of device screen, from mobile phones to high resolution Retina displays.', 'foodicious' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Translation Ready', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'Each hard-coded string is ready for translation, means you can translate everything. Language "foodicious.pot" file included.', 'foodicious' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'MailChimp Support', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'The most popular email client plugin. Very simple but super flexible.', 'foodicious' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Image &amp; Text Logos', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'Upload your logo image(set the size) or simply type your text logo.', 'foodicious' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Featured Posts Slider', 'foodicious' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Showcase unlimited number of Blog Posts in header area. There are three Slider designs.', 'foodicious' ); ?>
                        </p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Background Image/Color', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'Set the custom body Background image or Color.', 'foodicious' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Header Background Image/Color', 'foodicious' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Set the custom header Background image or Color.', 'foodicious' ); ?>
                        </p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Instagram Widget Area', 'foodicious' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Set your Instagram Images in the footer.', 'foodicious' ); ?>
                        </p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>

                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Post Layouts', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'Standard, List and Grid Blog Feed layout.', 'foodicious' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Multi-level Sub Menu Support', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'Unlimited level of sub menus. Add as much as you need.', 'foodicious' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Right Sidebar', 'foodicious' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Right Widgetised area.', 'foodicious' ); ?>
                        </p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <!-- Only Pro -->
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Unlimited Colors', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'Tons of color options. You can customize your Header, Content and Footer separately as much as possible.', 'foodicious' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( '800+ Google Fonts', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'Rich Typography options. Choose from more than 800 Google Fonts, adjust Size, Line Height, Font Weight, etc...', 'foodicious' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Grid Layout', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'Choose from 1 up to 4 columns grid layout for your Blog Feed.', 'foodicious' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'List Layout', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'Choose from 1 up to 4 columns grid layout for your Blog Feed.', 'foodicious' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Advanced Footer Options', 'foodicious' ); ?></h3>
                        <p><?php esc_html_e( 'Theme and Author credit links in the footer are automatically removed.', 'foodicious' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>


                <tr>
                    <td></td>
                    <td colspan="2">
                        <a href="<?php echo esc_url('https://www.vinethemes.com/downloads/foodicious-food-blog-wordpress-theme/'); ?>" target="_blank" class="button button-primary button-hero">
                            <?php esc_html_e( 'Get Foodicious Premium', 'foodicious' ); ?>
                        </a>
                        <br>

                    </td>
                </tr>
                </tbody>
            </table>

        <?php endif; ?>

    </div><!-- /.wrap -->
    <?php
} // end foodicious_about_page_output

// Check if plugin is installed
function foodicious_check_installed_plugin( $slug, $filename ) {
    return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
}

// Generate Recommended Plugin HTML
function foodicious_recommended_plugin( $slug, $filename, $name, $description) {

    if ( $slug === 'facebook-pagelike-widget' ) {
        $size = '128x128';
    } else {
        $size = '256x256';
    }

    ?>

    <div class="plugin-card">
        <div class="name column-name">
            <h3>
                <?php echo esc_html( $name ); ?>
                <img src="<?php echo esc_url('https://ps.w.org/'. $slug .'/assets/icon-'. $size .'.png') ?>" class="plugin-icon" alt="">
            </h3>
        </div>
        <div class="action-links">
            <?php if ( foodicious_check_installed_plugin( $slug, $filename ) ) : ?>
                <button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'foodicious' ); ?></button>
            <?php else : ?>
                <a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
                    <?php esc_html_e( 'Install Now', 'foodicious' ); ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="desc column-description">
            <p><?php echo esc_html( $description ); ?></p>
        </div>
    </div>

    <?php
}

// enqueue ui CSS/JS
function foodicious_enqueue_about_page_scripts($hook) {

    if ( 'appearance_page_about-foodicious' != $hook ) {
        return;
    }

    // enqueue CSS
    wp_enqueue_style( 'foodicious-about-page-css', get_theme_file_uri( '/inc/about/css/about-foodicious-page.css' ) );

}
add_action( 'admin_enqueue_scripts', 'foodicious_enqueue_about_page_scripts' );