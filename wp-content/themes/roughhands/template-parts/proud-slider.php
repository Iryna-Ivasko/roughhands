<?php
$proud_slider_images = get_field('proud_slider');
if ($proud_slider_images): ?>
    <section class="slider decorated-top ">
        <div class="row expanded columns">
            <?php if ($proud_slider_title = get_field('proud_slider_title')): ?>
                <h2 class="section-title text-center"><?php echo $proud_slider_title; ?></h2>
            <?php endif; ?>
            <div class="proud-slider">
                <?php foreach ($proud_slider_images as $proud_slider_image): ?>

                    <div class="proud-slider__slide">
                        <img src="<?php echo wp_get_attachment_image_url($proud_slider_image['id'], 'proud-slider'); ?>"
                             alt="<?php echo $proud_slider_image['alt']; ?>"/>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>