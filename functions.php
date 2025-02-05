<?php
/**
 * foodicious functions, scripts and styles.
 *
 * @package foodicious
 * @since foodicious 1.0
 */


if ( ! function_exists( 'foodicious_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 * @since foodicious 1.0
 */
function foodicious_setup() {


	/* Add Customizer settings */
	require( get_template_directory() . '/customizer.php' );

	/* Add default posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );
    //add_theme_support( 'custom-header' );



	/* Add editor styles */
	add_editor_style();

	/* Enable support for Post Thumbnails */
	add_theme_support( 'post-thumbnails' );


    add_image_size( 'foodicious-random-thumb', 450, 450, true );
    add_image_size('foodicious-thumb', 200, 120);

	set_post_thumbnail_size( 150, 150, true ); // Default Thumb
    add_theme_support( "title-tag" );
    add_image_size( 'foodicious-large-image', 9999, 9999, false  );// Large Post Image
    add_image_size( 'foodicious-medium-image', 900, 600, false  );// Large Post Image
    add_image_size( 'foodicious-small-image', 715, 500, false  );// Large Post Image
	/* Custom Background Support */
	add_theme_support( 'custom-background' );

        $args = array(
            'width'         => 2000,
            'height'        => 300,

        );
        add_theme_support( 'custom-header', $args );


       add_theme_support('custom-logo', array(
           'size' => 'foodicious-thumb'
       ));


    add_action('after_setup_theme', 'foodicious_setup');



	/* Register Menu */
	register_nav_menus( array(
		'main' 		=> __( 'Main Menu', 'foodicious' )
	) );

	/* Make theme available for translation */
	load_theme_textdomain( 'foodicious', get_template_directory() . '/languages' );

	/* Add gallery format and custom gallery support */
	add_theme_support( 'post-formats', array( 'gallery' ) );
	add_theme_support( 'array_themes_gallery_support' );

	// Add support for legacy widgets
	add_theme_support( 'array_toolkit_legacy_widgets' );

	// Theme Activation Notice
    global $pagenow;

    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
        add_action( 'admin_notices', 'foodicious_activation_notice' );
    }
}
endif; // foodicious_setup
add_action( 'after_setup_theme', 'foodicious_setup' );


/* Enqueue scripts and styles */
function foodicious_scripts() {

	$version = wp_get_theme()->Version;

	//Main Stylesheet
	wp_enqueue_style( 'foodicious-style', get_stylesheet_uri() );
    
	//Font Awesome
	wp_enqueue_style( 'foodicious-font-awesome', get_template_directory_uri() . "/includes/css/font-awesome.css", array(), '4.7.0', 'screen' );
    //grid css

	//Fitvids
	wp_enqueue_script( 'foodicious-jquery-fitvids', get_template_directory_uri() . '/includes/js/fitvid/jquery.fitvids.js', array( 'jquery' ), '1.0.3', true );

	//matchheight
    wp_enqueue_script( 'foodicious-jquery-matchheight', get_template_directory_uri() . '/includes/js/matchheight/matchheight.js', array( 'jquery' ), $version, true );

    //micromodal
    wp_enqueue_script( 'foodicious-jquery-micromodal', get_template_directory_uri() . '/includes/js/micromodal/micromodal.js', array( 'jquery' ), $version, true );

    //outline.js
    wp_enqueue_script( 'foodicious-jquery-outline', get_template_directory_uri() . '/includes/js/outline/outline.js', array( 'jquery' ), $version, true );

    //Custom Scripts
	wp_enqueue_script( 'foodicious-custom-js', get_template_directory_uri() . '/includes/js/custom/custom.js', array( 'jquery' ), $version, true );



    //Slickslider
	wp_enqueue_script( 'foodicious-jquery-slickslider', get_template_directory_uri() . '/includes/js/slickslider/slick.min.js', array( 'jquery' ), '1.8.0', true );

    wp_enqueue_script( 'foodicious-jquery-slicknav', get_template_directory_uri() . '/includes/js/slicknav/jquery.slicknav.min.js', array( 'jquery' ), $version, true );


    wp_register_style('foodicious-responsive', get_template_directory_uri() . '/css/responsive.css');

    if(!get_theme_mod('foodicious_general_responsive')) {
        wp_enqueue_style('foodicious-responsive');
    }
	//HTML5 IE Shiv
	wp_enqueue_script( 'foodicious-jquery-htmlshiv', get_template_directory_uri() . '/includes/js/html5/html5shiv.js', array(), '3.7.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'foodicious_scripts' );

function foodicious_excerpt_more( $more ) {
    if ( !is_admin()) {
        return '...';
    }
}
add_filter('excerpt_more', 'foodicious_excerpt_more');



// Widgets
include(get_template_directory() . '/inc/widgets/about_widget.php');
include(get_template_directory() . '/inc/widgets/social_widget.php');
include(get_template_directory() . '/inc/widgets/category_post_widget.php');

/* Set the content width */
if ( ! isset( $content_width ) )
	$content_width = 690; /* pixels */


/* Register sidebars */
function foodicious_register_sidebars() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'foodicious' ),
		'id'            => 'sidebar',
		'description'   => __( 'Widgets in this area will be shown on the sidebar of all pages.', 'foodicious' ),
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</div>'
	) );
    register_sidebar( array(
        'name'          => __( 'Below Slider', 'foodicious' ),
        'id'            => 'below-slider',
        'description'   => __( 'This widget area is for Newsletter, Ads, Most popular widgets, etc.', 'foodicious' ),
        'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="below-slider">',
        'after_title' => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Left', 'foodicious' ),
        'id'            => 'footer-left',
        'description'   => __( 'This widget area is for Footer Widgets.', 'foodicious' ),
        'before_widget' => '<div id="%1$s" class="footerleft widget clearfix %2$s">',
        'after_widget' => '</div>'
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Center', 'foodicious' ),
        'id'            => 'footer-center',
        'description'   => __( 'This widget area is for Footer Widgets.', 'foodicious' ),
        'before_widget' => '<div id="%1$s" class="footercenter widget clearfix %2$s">',
        'after_widget' => '</div>'
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Right', 'foodicious' ),
        'id'            => 'footer-right',
        'description'   => __( 'This widget area is for Footer Widgets.', 'foodicious' ),
        'before_widget' => '<div id="%1$s" class="footerright widget clearfix %2$s">',
        'after_widget' => '</div>'
    ) );
    register_sidebar(array(
        'name' => __('Instagram Footer','foodicious'),
        'id' => 'sidebar-2',
        'before_widget' => '<div id="%1$s" class="instagram-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="instagram-title">',
        'after_title' => '</h4>',
        'description' => __('Use the "Instagram" widget here. IMPORTANT: For best result set number of photos to 8.','foodicious')
    ));
    register_sidebar(array(
        'name' => __('Footer Top','foodicious'),
        'id' => 'footer-top',
        'before_widget' => '<div id="%1$s" class="footer-top %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-top-title">',
        'after_title' => '</h4>',
        'description' => __('Use the "Footer Top" widget here.','foodicious')
    ));
}
add_action( 'widgets_init', 'foodicious_register_sidebars' );


// Notice after Theme Activation
function foodicious_activation_notice() {
    echo '<div class="notice notice-success is-dismissible">';
    echo '<p>'. esc_html__( 'Thank you for choosing Foodicious! Now, we highly recommend you to visit our welcome page.', 'foodicious' ) .'</p>';
    echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=about-foodicious' ) ) .'" class="button button-primary">'. esc_html__( 'Get Started with Foodicious', 'foodicious' ) .'</a></p>';
    echo '</div>';
}


/* Custom Excerpt Length only for List Post on Homepage */

if(get_theme_mod('foodicious_general_post_layout')=='list'){

    function foodicious_custom_excerpt_length( $length ) {
        if ( !is_admin()) {
            return 40;
        }
    }
    add_filter('excerpt_length', 'foodicious_custom_excerpt_length', 999);
}



/* Custom Excerpt Length only for Slider 1 */

function foodicious_custom_excerpt_length_slider( $length ) {
    return 53;
}
add_filter( 'excerpt_length', 'foodicious_custom_excerpt_length_slider', 999 );




/* Custom Comment Output */
function foodicious_comments( $comment, $args, $depth ) {
	 ?>
	<li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">

		<div class="comment-block" id="comment-<?php comment_ID(); ?>">
			<div class="comment-info">
				<div class="comment-foodicious vcard clearfix">
					<?php echo get_avatar( $comment->comment_foodicious_email, 75 ); ?>

					<div class="comment-meta commentmetadata">
						<?php /* translators: %s: comment author link */ printf(__('<cite class="fn">%s</cite>', 'foodicious'), get_comment_author_link()) ?>
					</div>
                    <p class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
                    </p>
                    <a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php /* translators: %s: comment date */ printf(__('%1$s at %2$s', 'foodicious'), get_comment_date(),  get_comment_time()) ?></a>
				</div>
			</div><!-- comment info -->

			<div class="comment-text">
				<?php comment_text() ?>

				<div class="comment-bottom">

					<?php edit_comment_link(__('Edit', 'foodicious'),' ', '' ) ?>

				</div>
			</div><!-- comment text -->

			<?php if ($comment->comment_approved == '0') : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'foodicious') ?></em>
			<?php endif; ?>
		</div>
<?php
}

function foodicious_cancel_comment_reply_button( $html, $link, $text ) {
    $style = isset($_GET['replytocom']) ? '' : ' style="display:none;"';
    $button = '<div id="cancel-comment-reply-link"' . $style . '>';
    return $button . '<i class="fa fa-times"></i> </div>';
}

add_action( 'cancel_comment_reply_link', 'foodicious_cancel_comment_reply_button', 10, 3 );


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */



/**
 * Sets the foodiciousdata global when viewing an author archive.
 *
 * It removes the need to call the_post() and rewind_posts() in an foodicious
 * template to print information about the foodicious.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function foodicious_setup_foodicious() {
	global $wp_query;

	if ( $wp_query->is_foodicious() && isset( $wp_query->post ) ) {
		$GLOBALS['foodiciousdata'] = get_userdata( $wp_query->post->post_foodicious );
	}
}
add_action( 'wp', 'foodicious_setup_foodicious' );


/**
 * Return the Google font stylesheet URL
 */
function foodicious_add_google_fonts() {
    wp_enqueue_style( 'foodicious-playfair-display-google-webfonts', 'https://webfonts.googleapis.com/css2?family=Playfair+Display:wght@400;700', false );
    wp_enqueue_style( 'foodicious-open-sans-google-webfonts', 'https://webfonts.googleapis.com/css?family=Open+Sans:400,600,700', false );
}
add_action( 'wp_enqueue_scripts', 'foodicious_add_google_fonts' );

/* Start Category Count in Span */

add_filter('wp_list_categories', 'foodicious_cat_count_span');
function foodicious_cat_count_span($links) {
    $links = str_replace('</a> (', '</a> <span>', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

/* End Category Count in Span */


/* Start Archive Count in Span */

add_filter('get_archives_link', 'foodicious_archive_count_span');
function foodicious_archive_count_span($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="archiveCount">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

/* End Archive Count in Span */

function foodicious_wpb_author_info_box( $content ) {

global $post;

// Detect if it is a single post with a post author
if ( is_single() && isset( $post->post_author ) ) {

// Get author's display name 
$display_name = get_the_author_meta( 'display_name', $post->post_author );

// If display name is not available then use nickname as display name
if ( empty( $display_name ) )
$display_name = get_the_author_meta( 'nickname', $post->post_author );

// Get author's biographical information or description
$user_description = get_the_author_meta( 'user_description', $post->post_author );

// Get author's website URL 
$user_website = get_the_author_meta('url', $post->post_author);

// Get link to the foodicious archive page
$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));

    $author_details='';

if ( ! empty( $user_description ) )
// author avatar and bio

    $author_details = '<p class="foodicious_details">' . get_avatar( get_the_author_meta('user_email') , 160 ) . '</p>';

if ( ! empty( $display_name ) ) {


    $author_details .= '<div class="foodicious_author">' . __('Written By', 'foodicious') . '</div>';

    $author_details .= '<p class="foodicious_name">' . '<a href="' . esc_url($user_posts) . '">' . esc_html($display_name) . '</a></p><p>' . nl2br($user_description) . '</p>';
}

// Pass all this info to post content  
$content = $content . '<footer class="foodicious_bio_section" >' . $author_details . '</footer>';
}
echo $content;
}

function foodicious_getCategory()
{
    $category = get_the_category();
    $useCatLink = true;
    // If post has a category assigned.
    if ($category) {
        $category_display = '';
        $category_link = '';
        if (class_exists('WPSEO_Primary_Term')) {
            $wpseo_primary_term = new WPSEO_Primary_Term('category', get_the_id());
            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
            $term = get_term($wpseo_primary_term);
            if (is_wp_error($term)) {
                // Default to first category if an error is returned
                $category_display = $category[0]->name;
                $category_link = get_category_link($category[0]->term_id);
            } else {
                // Primary category
                $category_display = $term->name;
                $category_link = get_category_link($term->term_id);
            }
        } else {
            // Default, display the first category in WP's list of assigned categories
            $category_display = $category[0]->name;
            $category_link = get_category_link($category[0]->term_id);

        }

        // Display category
        if (!empty($category_display)) {
            if ($useCatLink == true && !empty($category_link)) {
                echo '<span class="post-category">';
                echo '<a href="' . esc_url($category_link) . '">' . esc_html($category_display) . '</a>';

                echo '</span>';
            } else {
                echo '<span class="post-category">' . esc_html($category_display) . '</span>';
            }
        }

    }
}

//theme options
include(get_template_directory() . '/foodicious_custom_controller.php');
include(get_template_directory() . '/customizer_style.php');
//kirki themeoptions

if (  class_exists( 'kirki' ) ) {
    include(get_template_directory() . '/theme-options.php');
}

if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

// Add our function to the post content filter 
add_action( 'foodicious_authorbox', 'foodicious_wpb_author_info_box' );

require get_template_directory() . '/tgm-plugin-activation.php';


// About Foodicious
require get_parent_theme_file_path( '/inc/about/about-foodicious.php' );



