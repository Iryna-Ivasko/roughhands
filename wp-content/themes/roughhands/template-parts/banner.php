<?php
// If a feature image is set, get the id, so it can be injected as a css background property
if (has_post_thumbnail($post->ID)) :
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
    $image = $image[0];
    ?>


    <?php $banner_title = get_field('banner_title');
    $banner_text = get_field('banner_text');
    $banner_button_title = get_field('banner_button_title');
    $banner_button_link = get_field('banner_button_link'); ?>

    <?php if ($banner_title || $banner_text || ($banner_button_title && $banner_button_link)): ?>
    <div class="banner-content">
        <div class="row columns">
            <?php if ($banner_title): ?>
                <h1 class="banner-title"><?php echo $banner_title ?></h1>
            <?php else: ?>
                <h1 class="banner-title"><?php the_title() ?></h1>
            <?php endif; ?>
            <?php if ($banner_text): ?>
                <div class="banner-text"><?php echo $banner_text ?></div>
            <?php endif; ?>
            <?php if ($banner_button_title && $banner_button_link): ?>
                <a class="button"
                   href="<?php echo $banner_button_link ?>"> <?php echo $banner_button_title ?></a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php endif;
