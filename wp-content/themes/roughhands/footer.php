<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<footer class="site-footer small-text-center">
    <div class="row">

        <?php if (get_theme_mod('footer_custom_logo')) :
            $custom_logo = get_theme_mod('footer_custom_logo'); ?>
            <div class="column small-12 medium-2">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img class="footer-logo" src="<?php echo $custom_logo ?>" alt="<?php bloginfo('name'); ?>"/>
                </a>
            </div>
        <?php else : ?>
            <div class="column medium-2">
                <?php bloginfo('name'); ?>
            </div>
        <?php endif ?>

        <?php dynamic_sidebar('footer-wide-widgets'); ?>
        <?php dynamic_sidebar('footer-narrow-widgets'); ?>
    </div>
</footer>

<?php if (get_theme_mod('wpt_mobile_menu_layout') == 'offcanvas') : ?>
    </div><!-- Close off-canvas wrapper inner -->
    </div><!-- Close off-canvas wrapper -->
    </div><!-- Close off-canvas content wrapper -->
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
