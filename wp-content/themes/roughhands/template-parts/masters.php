<?php
$count_of_masters = get_field('count_of_masters');
if(empty($count_of_masters)){
    $count_of_masters = -1;
}
$arg = array(
    'post_type' => 'barber_master', /*<-- Enter name of Custom Post Type here*/
    'order' => 'DESC',
    'posts_per_page' => $count_of_masters
);
$the_query = new WP_Query($arg);
if ($the_query->have_posts()) : ?>
    <section class="masters decorated-top">
        <div class="row"  data-equalizer data-equalize-by-row="true">
            <?php if ($masters_title = get_field('masters_title')): ?>
                <div class="columns small-12">
                    <h2 class="section-title text-center"><?php echo $masters_title; ?></h2>
                </div>
            <?php endif; ?>

            <?php while ($the_query->have_posts()) :
            $the_query->the_post(); ?><!-- BEGIN of Post -->
            <div class="columns small-12 medium-4" data-equalizer-watch>
                <div class="master text-center">
                    <a class="master__link image" href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('master-preview', array('class' => ' master__image img-responsive')); ?>
                    </a>
                    <a class="master__link" href="<?php the_permalink(); ?>">
                        <h4><?php the_title(); ?></h4>
                    </a>
                    <div class="master__text">
                        <?php the_excerpt(); ?>
                    </div>
                    <?php if ($additional_information = get_field('additional_information')): ?>
                        <div class="additional-information">
                            <?php echo $additional_information; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; ?><!-- END of Post -->
        </div><!-- END of .post-type -->

    </section>
<?php endif;
wp_reset_query(); ?>
