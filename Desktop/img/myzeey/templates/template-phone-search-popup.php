<?php
/* template name: Phone Search Popup */

get_header();
?>

<!-- Phone Search Popup -->
<section class="phone-search-popup-main" data-aos="flip-up">
    <div class="phone-search-popup" >
        <div class="position-relative">
            <a href="#" class="close-phone-search-popup"><i class="fa fa-times" aria-hidden="true"></i></a>
            <div class="phone-search-popup-inner-box">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <h5 class="phone-search-popup-title"><?php the_field('acf_heading'); ?></h5>
                        <p>
                        <?php the_field('acf_desc'); ?>
                        </p> 
                        <div class="phone-search-popup-from">
                           
                            <?php echo do_shortcode('[contact-form-7 id="251" title="Phone Search Popup"]   ') ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end Phone Search Popup -->

<?php get_footer(); ?>