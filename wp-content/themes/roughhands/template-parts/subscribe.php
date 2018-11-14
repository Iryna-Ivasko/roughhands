<section class="subscribe decorated-top">
    <div class="row" data-equalizer data-equalize-by-row="true">
        <?php if ($subscribe_title = get_field('subscribe_title')): ?>
            <div class="columns small-12">
                <h2 class="section-title text-center"><?php echo $subscribe_title; ?></h2>
            </div>
        <?php endif; ?>
        <div class="columns small-12">
            <?php echo do_shortcode('[contact-form-7 id="153" title="Subscribe form"]') ?>
            <?php if ($subscribe_caption_under_form = get_field('subscribe_caption_under_form')): ?>
                <p class="caption-under-form text-center"><?php echo $subscribe_caption_under_form; ?></p>
            <?php endif; ?>
        </div>

    </div><!-- END of .post-type -->

</section>
