<?php
/**
 * Created by PhpStorm.
 * User: Iriska
 * Date: 12.11.2018
 * Time: 21:59
 */
$count_of_last_goods = get_field('count_of_last_goods');
if (empty($count_of_last_goods)) {
    $count_of_last_goods = 4;
}

$args = array(
    'post_type' => 'product',
    'stock' => 1,
    'posts_per_page' => $count_of_last_goods,
    'orderby' => 'date',
    'order' => 'DESC');
$loop = new WP_Query($args); ?>

<?php
if ($loop->have_posts()) : ?>
    <section class="last-goods decorated-top ">
        <div class="row" data-equalizer data-equalize-by-row="true" data-equalizer="title">

            <?php if ($last_goods_of_store_title = get_field('last_goods_of_store_title')): ?>
                <div class="columns small-12">
                    <h2 class="section-title text-center"><?php echo $last_goods_of_store_title; ?></h2>
                </div>
            <?php endif; ?>

            <?php while ($loop->have_posts()) :
            $loop->the_post();
            global $product; ?><!-- BEGIN of Post -->
            <div class="columns small-12 medium-3" data-equalizer-watch>
                <?php get_template_part('woocommerce/content-product') ?>
            </div>
            <?php endwhile; ?><!-- END of Post -->
        </div><!-- END of .post-type -->

    </section>
<?php endif;
wp_reset_query(); ?>

