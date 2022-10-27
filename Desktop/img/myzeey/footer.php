<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

	if(get_the_title() == "Buy Now" || get_the_title() == "Edit Cart" || get_the_title() == "Load Design"){
		$hide_footer = "hide-footer";
	}else{
		$hide_footer = "";
	}
?>
	<footer id="site-footer" role="contentinfo" class="header-footer-group <?php echo $hide_footer;?>">
		<div class="footer-bottom pt-4 pb-4">
			<div class="container">
				<div class="row justify-ceontent-between align-items-center ">
					<div class="col-lg-6">
						<div class="d-lg-flex align-items-center gap-4">
							<div class="footer-logo">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" alt="logo">
							</div>
							<div class="footer-left-detail">
								<span>Need help?</span>
								<span><a href="<?php echo site_url();?>/contact-us">Contact us</a></span>
								<span>or try our <a href="<?php echo site_url();?>/faqs">FAQs</a></span>
							</div>
						</div>
					</div>
					<div class="col-lg-6 footer-right-list">
						<div class="d-lg-flex align-items-center gap-4 justify-content-end">
							<div>Copyright MyZeey 2021</div>
							<ul>
								<li><a href="#">Privacy</a></li> 
								<li><a href="#">Terms </a></li>
								<li><a href="#">Shipping </a></li>
								<li><a href="#">Refunds</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #site-footer -->

<?php 
	if(is_front_page()){
		?></section> </div><?php
	}
?>

	<div class="scroll-top">
	 	<a href="#">
	 		<i class="fa fa-arrow-up" aria-hidden="true"></i>
	 	</a>
	</div>

	<?php wp_footer(); ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/aos.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/fullpage.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/gsap.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/ScrollTrigger.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/custom-script.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			jQuery("#payment").insertAfter('.woocommerce-additional-fields');
		});
	</script>

	

	</body>
</html>