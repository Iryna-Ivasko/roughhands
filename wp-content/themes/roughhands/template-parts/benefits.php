<?php
/**
 * Created by PhpStorm.
 * User: Iriska
 * Date: 12.11.2018
 * Time: 9:28
 */

 if (have_rows('benefits')): ?>
    <section class="benefits text-center">
        <div class="row"data-equalizer data-equalize-by-row="true">
            <?php while (have_rows('benefits')): the_row();
                // Declare variables below
                $benefits_image = get_sub_field('benefits_image');
                $benefits_title = get_sub_field('benefits_title');
                $benefits_text = get_sub_field('benefits_text');
                $more = get_sub_field('services_with_excerpt_read_more');
                $more_link = get_sub_field('services_with_excerpt_read_more_link');
                // Use variables below ?>
                <div class="large-4 medium-4 small-12 columns" data-equalizer-watch>
                    <div class="benefit">
                        <?php if ($benefits_image) : ?>
                            <img class="benefit__image"  src="<?php echo wp_get_attachment_image_url($benefits_image['id'], 'benefits'); ?>"
                                 alt="<?php echo $benefits_image['title']; ?>"/>
                        <?php endif; ?>
                        <h3 class="benefit__title"><?php echo $benefits_title; ?></h3>
                        <p class="benefit__text"><?php echo $benefits_text; ?></p>
                    </div>
                </div><!--end of .columns -->
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>