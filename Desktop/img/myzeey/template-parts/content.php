<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
?>
<?php
	$post_slug = $post->post_name;
	if($post_slug == "checkout"){
		$checkout_banner_section = "checkout-hide-section";
		$checkout_detail = "checkout-detail-section";
	}else{
		$checkout_banner_section = "";
		$checkout_detail = "";
	}
?>
<?php
	$page_slug = $post->post_name;
	if( $page_slug == "my-account"){
		$hide_sections = "hide-section";
	}else{
		$hide_sections = "";
	}
?>
<?php 
	if(!empty($_GET['key'])){
		$share_page_class = 'share-page';
	}else{
		$share_page_class = "";
	}
?>
<!-- banner -->
<section class="blog-detail-banner blue position-relative pt-20 <?php echo $checkout_banner_section ?> <?php echo $hide_sections ?>" >
	<div class="container">
		<div class="row justify-content-center position-relative">
			<div class="blog-detail-banner-left" data-aos="fade-left">
				<h1 class="blog-detail-banner-heading d-none d-lg-block"><?php the_title(); ?></h1>
				<h1 class="blog-detail-banner-heading d-lg-none"><?php the_title(); ?></h1>
				<div class="blog-detail-date <?php echo $hide_sections; ?> "><?php echo get_the_date('d.m.y'); ?></div>
			</div>
			<div class="blog-detail-banner-right" data-aos="fade-right">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>">
			</div>
		</div>
	</div>
</section>
<!-- end banner -->
<!-- blog desc -->
<section class="blog-detail-desc-main pt-100 pb-100 <?php echo $checkout_detail ?> <?php echo $share_page_class;?>">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="blog-detail-desc" data-aos="fade-down">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end blog desc -->
<!-- blog list -->
<section class="blogs-list <?php echo $checkout_banner_section ?> <?php echo $hide_sections;?>">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center mb-50">
				<h2 class="text-blue">Fancy some more?</h2>
			</div>
		</div>
		<div class="masonry-grid" data-aos="fade-down">
			<?php
			$currentPostID = get_the_ID();
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => 	4,
				'post_status'     => 'publish',
				'order'          => 'DESC',
				'post__not_in'    => array($currentPostID),
			);
			$childPages = new WP_Query($args);
			if ($childPages->have_posts()) :
				$cnt = 0;
				//Loop
				while ($childPages->have_posts()) : $childPages->the_post();
					// echo ($cnt);
					if ($cnt == 0 || $cnt == 3) {
			?>
						<div class="cell big">
						<?php } else { ?>
							<div class="cell small">
							<?php } ?>
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>">
								<?php if ($cnt == 0) { ?>
									<div class="blog-desc-main blue">
									<?php } else if ($cnt == 1) { ?>
										<div class="blog-desc-main sky-blue">
										<?php } else if ($cnt == 2) { ?>
											<div class="blog-desc-main green">
											<?php } else { ?>
												<div class="blog-desc-main pink">
												<?php } ?>
												<h5 class="blog-desc-heading"><?php the_title(); ?></h5>
												<a href="<?php the_permalink(); ?>" class="blog-desc-link">Read article</a>
												</div>
							</a>
							</div>
					<?php
					$cnt++;
				endwhile;
			endif;
			wp_reset_postdata();
					?>
						</div>
		</div>
</section>
<!-- end blog list -->
<!-- get involved -->
<section class="mt-80 blue get-involved <?php echo $checkout_banner_section ?> <?php echo $hide_sections;?>">
	<div class="container">
		<div class="row" data-aos="zoom-in">
			<h2 class="get-involved-heading">Get involved</h2>
			<div class="get-involved-detail text-center">
				<p>Subscribe today for trends, news and updates from MyZeey</p>
			</div>
			<div class="blog-form">
				<?php //echo do_shortcode('[contact-form-7 id="154" title="Contact form 1"]') ?>

				<?php echo do_shortcode('[email-subscribers-form id="1"]') ?>	
			</div>
		</div>
	</div>
</section>
<!-- end get involved -->