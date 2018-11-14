<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php if (get_theme_mod('wpt_mobile_menu_layout') == 'offcanvas') : ?>
<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <?php get_template_part('template-parts/mobile-off-canvas'); ?>
        <?php endif; ?>

        <?php $responsiveToggleId = get_theme_mod('wpt_mobile_menu_layout') == 'offcanvas' ? 'mobile-menu' : 'site-navigation' ?>
        <header class="site-header <?php echo has_post_thumbnail($post->ID) ? ' banner dimming-effect' : '';
        echo (has_post_thumbnail($post->ID)) ? ' dark' : ' light'; ?>"
            <?php if (has_post_thumbnail($post->ID)) :
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                $image = $image[0];
                ?>
                style="background-image: url('<?php echo $image ?>')"
            <?php endif; ?>>
            <div class="site-title-bar title-bar" data-responsive-toggle="site-navigation" data-hide-for="large">
                <div class="title-bar-title">
                    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php if (has_post_thumbnail($post->ID)) : ?>

                            <?php if (has_custom_logo()) :
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                                ?>
                                <img src="<?php echo $image[0] ?>" alt="<?php bloginfo('name'); ?>"/>
                            <?php else : ?>
                                <?php bloginfo('name'); ?>
                            <?php endif ?>

                        <?php else: ?>

                            <?php if (get_theme_mod('dark_custom_logo')) :
                                $custom_logo = get_theme_mod('dark_custom_logo'); ?>
                                <img src="<?php echo $custom_logo ?>" alt="<?php bloginfo('name'); ?>"/>
                            <?php else : ?>
                                <?php bloginfo('name'); ?>
                            <?php endif ?>

                        <?php endif; ?>
                    </a>
                </div>
                <div class="title-bar-right">
                    <button class="menu-icon" type="button"
                            data-toggle="<?php echo $responsiveToggleId ?>"></button>
                </div>
            </div>

            <div class="row columns">
                <nav id="site-navigation" class="main-navigation top-bar">

                    <?php foundationpress_top_bar(); ?>
                    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php if (has_post_thumbnail($post->ID)) : ?>

                            <?php if (has_custom_logo()) :
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                                ?>
                                <img src="<?php echo $image[0] ?>" alt="<?php bloginfo('name'); ?>"/>
                            <?php else : ?>
                                <?php bloginfo('name'); ?>
                            <?php endif ?>

                        <?php else: ?>

                            <?php if (get_theme_mod('dark_custom_logo')) :
                                $custom_logo = get_theme_mod('dark_custom_logo'); ?>
                                <img src="<?php echo $custom_logo ?>" alt="<?php bloginfo('name'); ?>"/>
                            <?php else : ?>
                                <?php bloginfo('name'); ?>
                            <?php endif ?>

                        <?php endif; ?>
                    </a>
                    <?php if (!get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') == 'topbar') : ?>
                        <?php get_template_part('template-parts/mobile-top-bar'); ?>
                    <?php endif; ?>


                </nav>
            </div>
            <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>"
               title="<?php _e('View your shopping cart'); ?>">
                <?php echo sprintf(_n('%d item', '%d items', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?>
                - <?php echo WC()->cart->get_cart_total(); ?>
            </a>
            <?php get_template_part('template-parts/banner'); ?>
        </header>
