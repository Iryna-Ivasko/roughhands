<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<li <?php wc_product_class(); ?>>
    <?php do_action('woocommerce_before_shop_loop_item'); ?>
    <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>"
       title="<?php the_title(); ?>">
        <div class="image-grow">
            <?php if (has_post_thumbnail($loop->post->ID))
                echo get_the_post_thumbnail($loop->post->ID, 'product-preview');
            else echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="232px" height="160px" />'; ?>
        </div>

        <h4 class="product__title" data-equalizer-watch="title"><?php the_title(); ?></h4>

        <div class="product__text">
            <?php the_excerpt(); ?>
        </div>
    </a>
    <div class="price-and-add-to-card">
        <?php do_action('woocommerce_after_shop_loop_item_title'); ?>
        <div class="card-buttons">
            <?php do_action('woocommerce_after_shop_loop_item'); ?>
        </div>
    </div>

</li>

