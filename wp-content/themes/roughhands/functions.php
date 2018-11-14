<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/menu-walkers.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** Customization Admin */
require_once( 'library/custom-admin.php' );

/** Customization Admin */
require_once( 'library/plugin-activation-class.php' ); // Comment on production
require_once( 'library/recommended-plugins.php' ); // Comment on production

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/protocol-relative-theme-assets.php' );

// ACF Pro Options Page

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// Register your Google Map API key - replace 'xxx' with you key
if( function_exists('acf_update_setting') ) {
	function be_acf_init() {
		acf_update_setting('google_api_key', 'xxx');
	}
	add_action('acf/init', 'be_acf_init');
}

add_filter( 'wpcf7_validate_configuration', '__return_false' );


/**
 * Add second dark logo for site
 */
function roughhands_dark_logo_customizer_settings($wp_customize) {
// add a setting for the site logo
    $wp_customize->add_setting('dark_custom_logo');
// Add a control to upload the logo
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dark_custom_logo',
        array(
            'label' => 'Dark Logo',
            'section' => 'title_tagline',
            'settings' => 'dark_custom_logo',
        ) ) );
}
add_action('customize_register', 'roughhands_dark_logo_customizer_settings');

/**
 * Add second footer logo for site
 */
function roughhands_footer_logo_customizer_settings($wp_customize) {
// add a setting for the site logo
    $wp_customize->add_setting('footer_custom_logo');
// Add a control to upload the logo
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_custom_logo',
        array(
            'label' => 'Footer Logo',
            'section' => 'title_tagline',
            'settings' => 'footer_custom_logo',
        ) ) );
}
add_action('customize_register', 'roughhands_footer_logo_customizer_settings');


/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}