<?php
/*
Template Name: Home
*/
get_header(); ?>

    <main class="main-content">

        <?php while (have_posts()) : the_post(); ?>
            <?php if (get_the_content() || $content_title = get_field('content_title')): ?>
                <section class="page-content">
                    <div class="row column">
                        <article <?php post_class() ?> >
                            <?php if ($content_title): ?>
                                <h2 class="page-content__title text-center"><?php echo $content_title; ?></h2>
                            <?php endif; ?>

                            <div class="page-content__entry text-center">
                                <?php the_content(); ?>
                                <?php edit_post_link(__('Edit', 'foundationpress'), '<span class="edit-link">', '</span>'); ?>
                            </div>

                            <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'foundationpress'), 'after' => '</p></nav>')); ?>
                        </article>
                    </div>
                </section>
            <?php endif; ?>
        <?php endwhile; ?>

        <?php get_template_part('template-parts/benefits') ?>
        <?php get_template_part('template-parts/proud-slider') ?>
        <?php get_template_part('template-parts/masters') ?>
        <?php get_template_part('template-parts/last-goods') ?>
        <?php get_template_part('template-parts/subscribe') ?>
    </main>

<?php get_footer();
