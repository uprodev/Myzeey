<?php get_header();?>


    <div class="container">
        <div class="row align-items-center" >
            <div class="w-53 c-z-index-1" >
                <h1 class="text-white"><?php the_field('acf_banner_title'); ?></h1>
                <div class="main-banner-desc">
                    <p><?php the_field('acf_banner_second_title'); ?></p>
                </div>
                <a href="<?php echo esc_url(the_field('acf_banner_button')); ?>" class="link-style">Buy Now</a>
            </div>
            <?php 
                $bgimage = get_field('acf_banner_image');
                if( !empty( $bgimage ) ):
	        ?>
            <div class="w-47 c-z-index-1" >
                <div class="main-right-img fade-up" data-delay="0">
                    <img src="<?php echo esc_url($bgimage['url']); ?>">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- end main banner -->
<!-- Lock up your cables people -->
<section class="lock-up-your-cables-people bg-blue-medium section fp-auto-height-responsive" id="section2">
    <div class="container">
        <div class="row lock-up-your-cables-people-heading c-z-index-1">
            <h2 class="text-center text-white pb-3 d-none d-lg-block c-z-index-1">Lock up your cables people, <br> there’s a new kid on the block.</h2>
            <h2 class="text-center text-white pb-3 d-lg-none c-z-index-1">Lock up your cables people, there’s a new kid on the block.</h2>
            <div class="c-z-index-1">
                <p><?php the_field('acf_title_2'); ?></p>    
            </div>
        </div>
        <div class="lock-up-your-cables-people-img-section" >
            <div class="row position-relative d-none d-md-block">
                <div class="lock-up-your-cables-people-img-group-main position-relative">
                    <?php 
                        $bgimage = get_field('acf_image');
                        if( !empty( $bgimage ) ):
                    ?>
                    <div class="lock-up-your-cables-people-img-inner1 fade-up" data-delay="0">
                        <img src="<?php echo esc_url($bgimage['url']); ?>" alt="watch">
                    </div>
                    <?php endif; ?>
                    <?php 
                        $bgimage = get_field('acf_image_2');
                        if( !empty( $bgimage ) ):
                    ?>
                    <div class="lock-up-your-cables-people-img-inner2 fade-up" data-delay="0.2">
                        <img src="<?php echo esc_url($bgimage['url']); ?>" alt="Group">
                    </div>
                    <?php endif; ?>
                    <?php 
                        $bgimage = get_field('acf_image_3');
                        if( !empty( $bgimage ) ):
                    ?>
                    <div class="lock-up-your-cables-people-img-inner3 fade-up" data-delay="0.4">
                        <img src="<?php echo esc_url($bgimage['url']); ?>" alt="watch">
                    </div>
                    <?php endif; ?>
                </div>
                
                <?php 
                        $bgimage = get_field('acf_image_4');
                        if( !empty( $bgimage ) ):
                    ?>
                <div class="lock-up-your-cables-people-img-inner4 fade-up" data-delay="0.6">
                    <img src="<?php echo esc_url($bgimage['url']); ?>" alt="watch">
                </div>
                <?php endif; ?>
            </div>
            <div class="row d-md-none justify-content-center">
                <?php 
                    $bgimage = get_field('acf_image');
                    if( !empty( $bgimage ) ):
                ?>
                <div class="col-12">
                    <div class="lock-up-your-cables-people-img-inner fade-up">
                        <img src="<?php echo esc_url($bgimage['url']); ?>" alt="watch" class="border-radius-20-70">
                    </div>
                </div>
                <?php
                    endif; 
                    $bgimage = get_field('acf_image_3');
                    if( !empty( $bgimage ) ):
                ?>
                <div class="col-12">
                    <div class="lock-up-your-cables-people-img-inner fade-up">
                        <img src="<?php echo esc_url($bgimage['url']); ?>" alt="watch">
                    </div>
                </div>
                <?php 
                    endif;
                    $bgimage = get_field('acf_image_4');
                    if( !empty( $bgimage ) ):
                ?>
                <div class="col-12">
                    <div class="lock-up-your-cables-people-img-inner fade-up">
                        <img src="<?php echo esc_url($bgimage['url']); ?>" alt="watch" class="border-radius-70-20">
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- end Lock up your cables people -->
<!-- With unlimited personalisation options -->
<section class="with-unlimited-personalisation-options-section position-relative section fp-auto-height-responsive" id="section3">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center c-z-index-1 with-unlimited-personalisation-options-heading">
                <h2 class="text-center text-white pb-3 d-none d-lg-block c-z-index-1"><?php the_field('acf_fs_title'); ?></h2>
                <h2 class="text-center text-white pb-3 d-lg-none c-z-index-1">With unlimited personalisation options, you can throw out your old tatty cables.</h2>
                <div class="with-unlimited-personalisation-options-desc">
                    <p><?php the_field('acf_fs_title_2'); ?></p>
                    <a href="<?php echo esc_url(the_field('acf_stay_it_now')); ?>" class="link-style">Style It Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    $bgimage = get_field('acf_product_image');
    if( !empty( $bgimage ) ):
?>	
	<!-- <section class="with-unlimited-personalisation-options-product section" style="background-image: url(<?php echo esc_url($bgimage['url']); ?>)" id="section4"> -->
    <section class="with-unlimited-personalisation-options-product section"  id="section4">
	</section>
<?php endif; ?>
<!-- end With unlimited personalisation options -->
<!-- colour/cord/type -->
<section class="colour-cord-type-section position-relative bg-pink section fp-auto-height-responsive" id="section5">
    <div class="container">
        <div class="row position-relative justify-content-center d-none d-md-flex">
            <?php 
                if( have_rows('acf_cord_section') ):
                    while ( have_rows('acf_cord_section') ) : the_row();
            ?>
            <div class="desc-left-center c-z-index-1" >
                <div class="colour-cord-type-sub-heading"><?php the_sub_field('acf_title'); ?></div>
                <h3 class="colour-cord-type-heading">
                
                <?php the_sub_field('acf_title_2'); ?>
                    <div class="straight-line-drow">
                        
                    </div>
                </h3>
                <div class="colour-cord-type-inner-desc">
                    <p><?php the_sub_field('acf_discription'); ?></p>
                </div>
            </div>
            <?php 
                    endwhile;
                endif;
                $bgimage = get_field('acf_middle_image');
                if( !empty( $bgimage ) ):
            ?>
            <div class="col-md-6 col-xl-9">
                <img src="<?php echo esc_url($bgimage['url']); ?>" alt="colour cord type group" class="img-fluid">
            </div>
            <?php 
                endif;
                if( have_rows('acf_colour_section') ):
                    while ( have_rows('acf_colour_section') ) : the_row();
            ?>
            <div class="desc-right-top" >
                <div class="colour-cord-type-sub-heading"><?php the_sub_field('acf_title'); ?></div>
                <h3 class="colour-cord-type-heading">
                <?php the_sub_field('acf_title_2'); ?>
                    <div class="straight-line-drow">
                        
                    </div>
                </h3>
                <div class="colour-cord-type-inner-desc">
                    <p><?php the_sub_field('acf_discription'); ?></p>
                </div>
            </div>
            <?php 
                    endwhile;
                endif;
                if( have_rows('acf_type_section') ):
                    while ( have_rows('acf_type_section') ) : the_row();
            ?>
            <div class="desc-right-bottom" >
                <div class="colour-cord-type-sub-heading"><?php the_sub_field('acf_title'); ?></div>
                <h3 class="colour-cord-type-heading">
                <?php the_sub_field('acf_title_2'); ?>
                    <div class="straight-line-drow">
                        
                    </div>
                </h3>
                <div class="colour-cord-type-inner-desc">
                    <p><?php the_sub_field('acf_discription'); ?></p>
                </div>
            </div>
            <?php 
                    endwhile;
                endif;
            ?>
        </div>
        <div class="row position-relative justify-content-center d-md-none">
            <div><img src="<?php echo esc_url($bgimage['url']); ?>" alt="colour cord type group" class="img-fluid"></div>
        	<?php 
                if( have_rows('acf_cord_section') ):
                    while ( have_rows('acf_cord_section') ) : the_row();
            ?>
            <div class="col-md-6" >
               <div class="resposnive-colour-cord-type-col">
                    <div class="colour-cord-type-sub-heading"><?php the_sub_field('acf_title'); ?></div>
                    <h3 class="colour-cord-type-heading"> <?php the_sub_field('acf_title_2'); ?></h3>
                    <div class="colour-cord-type-inner-desc">
                        <p><?php the_sub_field('acf_discription'); ?></p>
                    </div>
               </div>
            </div>
            <?php 
                    endwhile;
                endif;
                if( have_rows('acf_colour_section') ):
                    while ( have_rows('acf_colour_section') ) : the_row();
            ?>
            <div class="col-md-6" >
                <div class="resposnive-colour-cord-type-col">
                    <div class="colour-cord-type-sub-heading"><?php the_sub_field('acf_title'); ?></div>
                    <h3 class="colour-cord-type-heading"> <?php the_sub_field('acf_title_2'); ?></h3>
                    <div class="colour-cord-type-inner-desc">
                        <p><?php the_sub_field('acf_discription'); ?></p>
                    </div>
                </div>
            </div>
            <?php 
                    endwhile;
                endif;
                if( have_rows('acf_type_section') ):
                    while ( have_rows('acf_type_section') ) : the_row();
            ?>
            <div class="col-md-6" >
                <div class="resposnive-colour-cord-type-col">
                    <div class="colour-cord-type-sub-heading"><?php the_sub_field('acf_title'); ?></div>
                    <h3 class="colour-cord-type-heading"> <?php the_sub_field('acf_title_2'); ?></h3>
                    <div class="colour-cord-type-inner-desc">
                        <p><?php the_sub_field('acf_discription'); ?></p>
                    </div>
                </div>
            </div>
            <?php 
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>
<!-- end colour/cord/type -->
<!-- MyZeey, your vibe -->
<section class="myzeey-your-vibe section fp-auto-height-responsive" id="section6">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center" >
                <h1 class="text-blue"><?php the_field('acf_title'); ?></h1>
            </div>
        </div>
        <div class="row">
            <?php 
                if( have_rows('acf_your_vibe_detail') ):
                    while ( have_rows('acf_your_vibe_detail') ) : the_row();
                    $bgimage = get_sub_field('acf_image');
            ?>
            <div class="col-12 myzeey-your-vibe-main-col" >
                <div class="row align-items-center fade-up">
                    <div class="col-md-6 myzeey-your-vibe-col myzeey-your-vibe-left">
                       <div class="myzeey-your-vibe-img myzeey-your-vibe-vactor1">
                            <img src="<?php echo esc_url($bgimage['url']); ?>" alt="your vibe" class="img-fluid">
                       </div>
                    </div>
                    <div class="col-md-6 myzeey-your-vibe-col myzeey-your-vibe-right">
                        <h5 class="myzeey-your-vibe-heading"><?php the_sub_field('acf_title'); ?></h5>
                        <div class="myzeey-your-vibe-desc">
                            <p><?php the_sub_field('acf_description'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                    endwhile;
                endif;
            ?>
        </div>
        <div class="row justify-content-between tested-and-adored-by align-items-center" >
            <div class="col-xl-4">
                <h5 class="tested-and-adored-by-heading"><?php the_field('acf_test_title'); ?></h5>
            </div>
            <div class="col-xl-8">
                <ul class="icon-list">
                    <?php
                        $images = get_field('acf_icons');
                        foreach( $images as $image ):
                    ?>
                    <li><img src="<?php echo esc_url($image['url']); ?>" alt="icon"></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end MyZeey, your vibe -->
<!-- Own it. Style it. Zeey it. -->
<?php 
        $bgimage = get_field('acf_bg_image');
        if( !empty( $bgimage ) ):
?>
<section class="own-style-zeey-it section fp-auto-height-responsive" id="section7" style="background-image: url(<?php echo esc_url($bgimage['url']); ?>);">
<?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center position-relative" >
            <?php 
                $bgimage = get_field('acf_image_5');
                if( !empty( $bgimage ) ):
            ?>
                <img src="<?php echo esc_url($bgimage['url']); ?>" alt="watch">
            <?php endif; ?>
                <h1 class="own-style-zeey-it-heading"><?php the_field('acf_main_title'); ?></h1>
                <a href="<?php echo esc_url(the_field('acf_banner_button')); ?>" class="link-style">Buy Now</a>
            </div>
        </div>
    </div>

<!-- end Own it. Style it. Zeey it. -->
<?php get_footer();?>
