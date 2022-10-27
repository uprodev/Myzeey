<?php
/* template name: Gift a zee */
get_header();
?>
<!-- Gift a Zeey -->
<section class="bg-blue pt-40 pb-80 gift-a-zeey">
    <div class="container">
        <div class="row">
            <div class="col-lg-5" data-aos="zoom-in">
                <?php
                $bgimage     = get_field('acf_left_banner_image');
                ?>
                <img src="<?php echo esc_url($bgimage['url']); ?>" class="fluid-img">
            </div>
            <div class="col-lg-7" data-aos="zoom-in">
                <h3 class="text-white"><?php the_field('acf_title'); ?></h3>
                <p><?php the_field('acf_description'); ?></p>
                <div class="gift-a-zeey-form">
                    <?php echo do_shortcode('[contact-form-7 id="212" title="Gift a Zeey"]  ') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end Gift a Zeey -->
<?php
get_footer();
?>