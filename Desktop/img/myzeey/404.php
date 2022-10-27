<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
get_header();
?>
<!-- Faq -->
<section class="bg-light-gray pt-40 pb-70 faq-list">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-blue">Page Not Found</h3>
            </div>
        </div>
        <div class="row">
            <div class="w-70" data-aos="fade-left">
                <div class="left-white-box">
                    <div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'twentytwenty' ); ?></p></div>
					<?php
					get_search_form(
						array(
							'aria_label' => __( '404 not found', 'twentytwenty' ),
						)
					);
					?>
                </div>
            </div>
            <div class="w-30" data-aos="fade-right">
                <div class="row equal">
                    <div class="col-lg-12 col-md-6">
                    	<div class="right-white-box">
						<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>
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
