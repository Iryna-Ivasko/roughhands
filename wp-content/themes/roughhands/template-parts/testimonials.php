<?php if (have_rows('testimonials')): ?>
    <section class="testimonials small-text-center decorated-top">
        <div class="row" data-equalizer data-equalize-by-row="true">
            <?php while (have_rows('testimonials')):
            the_row();
            // Declare variables below
            $testimonial_photo = get_sub_field('testimonial_photo');
            $title = get_sub_field('services_with_excerpt_title');
            $text = get_sub_field('services_with_excerpt_excerpt');
            $more = get_sub_field('services_with_excerpt_read_more');
            $more_link = get_sub_field('services_with_excerpt_read_more_link');
            // Use variables below
            ?>

            <div class="column small-12 medium-6 " data-equalizer-watch>
                <img class="testimonial__image"
                     src="<?php echo wp_get_attachment_image_url($testimonial_photo['id'], 'testimonial-photo'); ?>"
                     alt="<?php echo $testimonial_photo['title']; ?>"/>
            </div>
            <div class="column small-12 medium-6 testimonial__content" data-equalizer-watch>
                <div class="vertical-center">
                    <?php if ($masters_title = get_sub_field('testimonial_title')): ?>
                        <h2 class="section-title "><?php echo $masters_title; ?></h2>
                    <?php endif; ?>
                    <?php if ($testimonial_text = get_sub_field('testimonial_text')): ?>
                        <p class="quote">'<?php echo $testimonial_text; ?>'</p>
                    <?php endif; ?>
                    <?php if ($testimonial_author = get_sub_field('testimonial_author')): ?>
                        <h4 class="aughtor"><?php echo $testimonial_author; ?></h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        </div><!-- END of .post-type -->
    </section>
<?php endif; ?>




