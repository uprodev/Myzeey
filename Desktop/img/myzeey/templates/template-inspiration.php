<?php
/* Template Name: Inspiration */
get_header();
?>

<!-- banner -->
<section class="inspiration-banner-section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="inspiration-banner position-relative">
					<h1 class="text-blue"><?php the_field('acf_banner_title'); ?></h1>
					<div class="inspiration-desc">
						<p><?php the_field('acf_banner_title_2'); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- banner -->

<!-- Inspiration list -->
<section class="blogs-list pt-20 pb-20">
	<div class="container">
		<div class="masonry-grid" >
		<?php
		wp_reset_postdata();
		$args = array(
			'post_type'      	=> 'post',
			'posts_per_page' 	=> 	8,
			'post_status'     	=> 'publish',
			'order'         	=> 'DESC',
			'tax_query' => array(
				    array(
				        'taxonomy' => 'category', //double check your taxonomy name in you dd 
				        'field'    => 'id',
				        'terms'    => 3,
				    ),
		   		),
			);

		$inspirationData = new WP_Query($args);
		if ($inspirationData->have_posts()) :
			while ($inspirationData->have_posts()) : $inspirationData->the_post();
				$viceoIconClass = "";
				$iconHTML = "";
				if(get_field('type') == 'video'){
					$viceoIconClass = "inspiration-video-play";
					$iconHTML = '<div class="inspiration-play-main">
				        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64.32" height="64.32" viewBox="0 0 64.32 64.32">
                          <defs>
                            <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                              <stop offset="0" stop-color="#3888ff"/>
                              <stop offset="1" stop-color="#2039cf"/>
                            </linearGradient>
                          </defs>
                          <g id="Group_192" data-name="Group 192" transform="translate(-1120 -1198.34)">
                            <circle id="Ellipse_53" data-name="Ellipse 53" cx="32.16" cy="32.16" r="32.16" transform="translate(1120 1198.34)" fill="url(#linear-gradient)"/>
                            <g id="Polygon_1" data-name="Polygon 1" transform="translate(1171.5 1213) rotate(90)" fill="none">
                              <path d="M17.5,0,35,30H0Z" stroke="none"/>
                              <path d="M 17.5 5.953907012939453 L 5.223112106323242 27 L 29.77688789367676 27 L 17.5 5.953907012939453 M 17.5 0 L 35 30 L 0 30 L 17.5 0 Z" stroke="none" fill="#fff"/>
                            </g>
                          </g>
                        </svg>
                    </div>';
				}
				?>
				<div class="cell <?php echo get_field("size", get_the_ID()); ?> <?php echo $viceoIconClass; ?>">
				    <?php echo $iconHTML; ?>
					<a href="<?php the_permalink(); ?>">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>">
						<div class="blog-desc-main <?php echo get_field("color", get_the_ID()); ?>">
							<h5 class="blog-desc-heading"><?php the_title(); ?></h5>
							<?php if(get_field('type') == 'video'){ ?>
								<a href="<?php the_permalink(); ?>" class="blog-desc-link">Watch Video </a>
							<?php } else { ?>
								<a href="<?php the_permalink(); ?>" class="blog-desc-link">Read article </a>
							<?php } ?>
						</div>
					</a>
				</div>
			<?php 
			endwhile;
		endif;
		wp_reset_postdata();
		?>
		</div>
		<?php
		if (  $inspirationData->max_num_pages > 1 ) :
		?>
		<div class="text-center">
			<a href="#" class="load-more-data">Load more</a>
		</div>
		<?php endif; ?>
	</div>
</section>
<!-- end Inspiration list -->

<!-- Own it. Style it. Zeey it. -->
<?php 
        $bgimage 	= get_field('acf_banner_image');
		$watchImg 	= get_field('acf_watch_image');

		$link       = get_field('acf_buy_now');
		$link_url   = $link['url'];
		$link_title = $link['title'];
?>
<section class="own-style-zeey-it mt-90" style="background-image: url(<?php echo esc_url($bgimage['url']); ?>">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center position-relative" data-aos="zoom-in">
				<img src="<?php echo esc_url($watchImg['url']); ?>" alt="watch">
				<h1 class="own-style-zeey-it-heading"><?php the_field('acf_heading'); ?></h1>
				<a href="<?php echo esc_url( $link_url ); ?>" class="link-style"><?php echo esc_html( $link_title ); ?></a>
			</div>
		</div>
	</div>
</section>
<!-- end Own it. Style it. Zeey it. -->
<?php
	wp_enqueue_script('load-more', get_template_directory_uri() . '/assets/js/index.js', array(), '1.0.0', true);
	wp_localize_script( 'load-more', 'load_more', array(
	    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
	    'posts' => json_encode( $inspirationData->query_vars ),
	    'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
	    'max_page' => $inspirationData->max_num_pages,
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
	                    //reset button text
	                    button.text( 'Load More' );
	                    //append new data
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