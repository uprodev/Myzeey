<?php
/* Template Name: Blogs */
get_header();
?>
<!-- blog list -->
<section class="blogs-list pt-20 pb-20">
	<div class="container">
		<div class="masonry-grid">
		<?php
		$args = array(
			'post_type'      	=> 'post',
			'category_name'     => 'Blog',
			'post_status'     	=> 'publish',
			'posts_per_page'    => '8',
			'order'         	=> 'DESC',
		);
		$childPages = new WP_Query($args);
		// echo '<pre>';
		// print_r($childPages);
		// die();

		if ($childPages->have_posts()) :
			while ($childPages->have_posts()) : $childPages->the_post();
				?>
				<div class="cell <?php echo get_field("size", get_the_ID()); ?>">
					<a href="<?php the_permalink(); ?>">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>">
						<div class="blog-desc-main <?php echo get_field("color", get_the_ID()); ?>">
							<h5 class="blog-desc-heading"><?php the_title(); ?></h5>
							<a href="<?php the_permalink(); ?>" class="blog-desc-link">Read article</a>
						</div>
					</a>
				</div>
				<?php
			endwhile;
		endif;
		$childPages->reset_postdata();
		?>
			</div>	
		</div>
		<?php
		if ( $childPages->max_num_pages > 1 ) :
		?>
		<div class="text-center">
			<a href="#" class="load-more-data">Load more</a>
		</div>
		<?php endif; ?>
	</div>
</section>
<!-- end blog list -->
<!-- get involved -->
<section class="mt-90 blue get-involved">
	<div class="container">
		<div class="row" data-aos="zoom-in">
			<h2 class="get-involved-heading">Get involved</h2>
			<div class="get-involved-detail text-center">
				<p>Subscribe today for trends, news and updates from MyZeey</p>
			</div>
			<div class="blog-form">
				<!-- <?php //echo do_shortcode('[contact-form-7 id="154" title="Contact form 1"]') ?> -->
				<?php //echo do_shortcode('[newsletter]'); ?>	
				<?php echo do_shortcode('[email-subscribers-form id="1"]') ?>	
			</div>
		</div>
	</div>
</section>
<!-- end get involved -->
<?php
	wp_enqueue_script('load-more', get_template_directory_uri() . '/assets/js/index.js', array(), '1.0.0', true);
	wp_localize_script( 'load-more', 'load_more', array(
	    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
	    'posts' => json_encode( $childPages->query_vars ),
	    'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
	    'max_page' => $childPages->max_num_pages,
	    'nonce' => wp_create_nonce('load_more_nonce')
	) );
?>
<script>
	jQuery('.load-more-data').click(function(){
	        var button = jQuery(this),
	            data = {
	                'action': 'load_more',
	                'query': load_more.posts,
	                'page' : load_more.current_page,
	                'nonce': load_more.nonce
	            };

	        jQuery.ajax({
	            url : load_more.ajaxurl,
	            data : data,
	            type : 'POST',
	            beforeSend : function ( xhr ) {
	                button.text('Loading...');
	            },
	            success : function( data ){
	                if( data ) {
	                    button.text( 'Load More' );
	                    console.log(data);
	                    jQuery('.masonry-grid').append(data);
	                    load_more.current_page++;
	                    if ( load_more.current_page == load_more.max_page )
	                        button.remove();
	                } else {
	                    button.remove();
	                }
	            }
	        });
	    });
</script>
<?php get_footer(); ?>