<?php
/* template name: Contact Us */
get_header();
?>
<!-- contact -->
<section class="bg-light-gray pt-40 pb-70 contact-us-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-blue">Contact us</h3>
            </div>
        </div>
        <div class="row">
            <div class="w-70" data-aos="fade-left">
                <div class="left-white-box contact-form">
                    <div class="left-heading"><?php the_field('acf_label_1'); ?></div>
                    <p><?php the_field('acf_label_2'); ?></p>
                    <?php echo do_shortcode('[contact-form-7 id="168" title="Contact Us"]')?>
                </div>
            </div>
            <div class="w-30" data-aos="fade-right">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="right-white-box">
                            <div class="right-heading"><?php the_field('acf_label'); ?></div>
                            <div>
                                <a href="mailto:<?php the_field('acf_email'); ?>" class="contact-with-us"><?php the_field('acf_email'); ?></a>
                            </div>
                            <div>
                                <a href="tel:<?php the_field('acf_contact_number'); ?>" class="contact-with-us"><?php the_field('acf_contact_number'); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="right-white-box cmt-5">
                            <ul>
                                <?php
                                    $link       = get_field('acf_terms_&_conditions');
                                    $link_url   = $link['url'];
                                    $link_title = $link['title'];
                                ?>
                                <li><a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
                                <?php
                                    $link1      = get_field('acf_shipping_information');
                                    // print_r($link1);die;
                                    $link_url1   = $link1['url'];
                                    $link_title1 = $link1['title'];
                                ?>
                                <li><a href="<?php echo esc_url( $link_url1 ); ?>"><?php echo esc_html( $link_title1 ); ?></a></li>
                                <?php
                                    $link2       = get_field('acf_refund_policy');
                                    $link_url2   = $link2['url'];
                                    $link_title2 = $link2['title'];
                                ?>
                                <li><a href="<?php echo esc_url( $link_url2 ); ?>"><?php echo esc_html( $link_title2 ); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact -->
<?php
get_footer();
?>
