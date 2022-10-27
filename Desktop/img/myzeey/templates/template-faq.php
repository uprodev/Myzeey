<?php
/* template name: FAQ */
get_header();
?>
<!-- Faq -->
<section class="bg-light-gray pt-40 pb-70 faq-list">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-blue"><?php the_field('acf_title'); ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="w-70" data-aos="fade-left">
                <div class="faq-main">
                    <?php
                    if (have_rows('acf_faq')) :
                        $cnt = 1;
                        while (have_rows('acf_faq')) : the_row();
                    ?>
                            <div class="faq">
                                <button class="faq-toggle">
                                    <div class="faq-title">
                                    <?php the_sub_field('acf_quetion'); ?>
                                    </div>
                                    <i class="fas fa-plus"></i>
                                    <i class="fas fa-minus"></i>
                                </button>
                                <div class="faq-text">
                                    <p><?php the_sub_field('acf_answer'); ?></p>
                                </div>
                            </div>
                    <?php
                            $cnt++;
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="w-30" data-aos="fade-right">
                <div class="row equal">
                    <div class="col-lg-12 col-md-6">
                        <div class="right-white-box">
                            <div class="right-heading"><?php the_field('acf_heading'); ?></div>
                            <div>
                            <?php
                                    $link       = get_field('acf_button');
                                    $link_url   = $link['url'];
                                    $link_title = $link['title'];
                                ?>
                                <a href="<?php echo esc_url( $link_url ); ?>" class="link-style2"><?php echo esc_html( $link_title ); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="right-white-box cmt-5">
                            <ul>
                                <?php
                                    $link       = get_field('acf_terms_&_condition');
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
<!-- end Faq -->
<?php
get_footer();
?>