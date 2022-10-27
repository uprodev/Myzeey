<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/aos.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/fullpage.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	<?php
	wp_body_open();
	?>
	<!-- 
		home page -  dakrblue  
		contact/faq page - light-gray
		blogs - bg-white 
	-->
	<?php
	if (get_the_title() == "Blogs" || get_the_title() == "Inspiration" || get_the_title() == "Buy Now" || get_the_title() == "Cart" || get_the_title() == "Checkout" || get_the_title() == "Load Design" || get_the_title() == "Edit Cart") {
		$class = 'bg-white';
	} else if (get_the_title() == "Contact Us" || get_the_title() == "FAQS") {
		$class = 'light-gray';
	} else if (get_the_title() == "Charms") {
		$class = 'dakrblue charms-header';
	}
	else {
		$class = 'dakrblue';
	}
	if(get_the_title() == "Buy Now" || get_the_title() == "Cart" || get_the_title() == "Checkout" || get_the_title() == "Load Design" || get_the_title() == "Edit Cart"){
		$padding_class = " p-0";
	}else{
		$padding_class = "";
	}
	if(get_the_title() == "Buy Now" || get_the_title() == "Load Design" || get_the_title() == "Edit Cart"){
		$buy_now_logo_black = "buy-now-logo";
	}else{
		$buy_now_logo_black = "";
	}

	if(is_front_page()){
		$bgimage = get_field('acf_product_image');

		?>
		<div class="fullpage-bg">
			<div class="fullpage-bg-img">
				<img src="<?php echo esc_url($bgimage['url']); ?>"/>
			</div>
		</div>
		<div id="fullpage">
			<section class="main-banner position-relative section fp-auto-height-responsive" id="section1">
		<?php
	}
	?>
		<header class="<?php echo $class;  echo $padding_class; ?>">
			<nav class="navbar navbar-expand-xl">
				<div class="container">
					<a class="navbar-brand" href="<?php echo site_url(); ?>">
						<?php if ($class == 'dakrblue' || $class == 'dakrblue charms-header' || get_the_title() == "Buy Now" || get_the_title() == "Load Design" || get_the_title() == "Edit Cart") { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png" alt="logo" class="main-logo <?php echo $buy_now_logo_black; ?>">
						<?php } else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo" class="main-logo">
						<?php } ?>
					</a>
					<?php 
						if(get_the_title() == "Cart" || get_the_title() == "Checkout" || get_the_title() == "Buy Now" || get_the_title() == "Load Design" || get_the_title() == "Edit Cart"){
							$hide_menu = "hide-menu-hamberger";
						}else{
							$hide_menu = "";
						}
					?>
					<button class="navbar-toggler <?php echo $hide_menu;?>" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-bars hamburger-menu"></i>
						<i class="fas fa-times resposnive-close-btn"></i>
					</button>
					<?php 
						if(get_the_title() == "Buy Now" || get_the_title() == "Cart" || get_the_title() == "Checkout" || get_the_title() == "Load Design" || get_the_title() == "Edit Cart") {
								$headericonblack = "header-icon-black";
						}else{
							$headericonblack = "";
						}
						?>
					<div class="header-icon-main-resposnive <?php echo $headericonblack; ?>">
						<a href="<?php echo site_url(); ?>/my-account/" class="header-icon">
								<i>
									<svg id="user" xmlns="http://www.w3.org/2000/svg" width="20.297" height="20" viewBox="0 0 23.297 25">
										<g id="Group_46" data-name="Group 46" transform="translate(0 14.081)">
											<g id="Group_45" data-name="Group 45">
											<path id="Path_39" data-name="Path 39" d="M29.088,288.389c-7.512,0-11.648,3.553-11.648,10.006a.912.912,0,0,0,.912.912H39.824a.912.912,0,0,0,.912-.912C40.737,291.943,36.6,288.389,29.088,288.389Zm-9.79,9.094c.359-4.824,3.648-7.269,9.79-7.269s9.432,2.444,9.791,7.269Z" transform="translate(-17.44 -288.389)" fill="#fff"/>
											</g>
										</g>
										<g id="Group_48" data-name="Group 48" transform="translate(5.596)">
											<g id="Group_47" data-name="Group 47">
											<path id="Path_40" data-name="Path 40" d="M138.1,0a5.98,5.98,0,0,0-6.052,6.174,6.073,6.073,0,1,0,12.1,0A5.98,5.98,0,0,0,138.1,0Zm0,10.919a4.513,4.513,0,0,1-4.227-4.745A4.149,4.149,0,0,1,138.1,1.825a4.2,4.2,0,0,1,4.227,4.349A4.513,4.513,0,0,1,138.1,10.919Z" transform="translate(-132.049)" fill="#fff"/>
											</g>
										</g>
									</svg>
								</i>
						</a>
						<?php
							if (get_the_title() == "Cart" || get_the_title() == "Checkout") {
								$show_green_cart = "show-green-cart";
							}else{
								$show_green_cart = "";
							}
			
						?>
						<a href="<?php echo site_url(); ?>/cart/" class="header-icon">
							<i class="<?php echo $show_green_cart; ?>">
								<svg id="shopping-bag" xmlns="http://www.w3.org/2000/svg" width="20.297" height="20" viewBox="0 0 20.735 25">
									<g id="Group_50" data-name="Group 50" transform="translate(0 7.997)">
										<g id="Group_49" data-name="Group 49">
										<path id="Path_41" data-name="Path 41" d="M64.387,176.651l-1.235-12a.975.975,0,0,0-.97-.875H45.927a.975.975,0,0,0-.97.873l-1.269,12a3.77,3.77,0,0,0,3.734,4.128H60.687a3.714,3.714,0,0,0,2.749-1.217A3.788,3.788,0,0,0,64.387,176.651Zm-2.4,1.605a1.74,1.74,0,0,1-1.3.576H47.423a1.82,1.82,0,0,1-1.794-1.978L46.8,165.731H61.3l1.145,11.116A1.807,1.807,0,0,1,61.991,178.257Z" transform="translate(-43.67 -163.78)" fill="#fff"/>
										</g>
									</g>
									<g id="Group_52" data-name="Group 52" transform="translate(4.955)">
										<g id="Group_51" data-name="Group 51">
										<path id="Path_42" data-name="Path 42" d="M150.737,0a5.6,5.6,0,0,0-5.592,5.592V8.973H147.1V5.592a3.641,3.641,0,0,1,7.283,0V8.973h1.95V5.592A5.6,5.6,0,0,0,150.737,0Z" transform="translate(-145.145)" fill="#fff"/>
										</g>
									</g>
								</svg>
							</i>
						</a>
					</div>
					<?php if (get_the_title() == "Buy Now" || get_the_title() == "Cart" || get_the_title() == "Checkout" || get_the_title() == "Load Design" || get_the_title() == "Edit Cart") {
						
						?>
					<div class="collapse navbar-collapse ml-auto w-100 justify-content-end main-nav" id="navbarSupportedContent">
						<div class="header-icon-main header-icon-black">
							<a href="<?php echo site_url(); ?>/my-account/" class="header-icon">
							<i>
									<svg id="user" xmlns="http://www.w3.org/2000/svg" width="20.297" height="20" viewBox="0 0 23.297 25">
										<g id="Group_46" data-name="Group 46" transform="translate(0 14.081)">
											<g id="Group_45" data-name="Group 45">
											<path id="Path_39" data-name="Path 39" d="M29.088,288.389c-7.512,0-11.648,3.553-11.648,10.006a.912.912,0,0,0,.912.912H39.824a.912.912,0,0,0,.912-.912C40.737,291.943,36.6,288.389,29.088,288.389Zm-9.79,9.094c.359-4.824,3.648-7.269,9.79-7.269s9.432,2.444,9.791,7.269Z" transform="translate(-17.44 -288.389)" fill="#fff"/>
											</g>
										</g>
										<g id="Group_48" data-name="Group 48" transform="translate(5.596)">
											<g id="Group_47" data-name="Group 47">
											<path id="Path_40" data-name="Path 40" d="M138.1,0a5.98,5.98,0,0,0-6.052,6.174,6.073,6.073,0,1,0,12.1,0A5.98,5.98,0,0,0,138.1,0Zm0,10.919a4.513,4.513,0,0,1-4.227-4.745A4.149,4.149,0,0,1,138.1,1.825a4.2,4.2,0,0,1,4.227,4.349A4.513,4.513,0,0,1,138.1,10.919Z" transform="translate(-132.049)" fill="#fff"/>
											</g>
										</g>
									</svg>
								</i>
							</a>
							<?php
									if (get_the_title() == "Cart" || get_the_title() == "Checkout") {
										$show_green_cart = "show-green-cart";
									}else{
										$show_green_cart = "";
									}
					
								?>
								<a href="<?php echo site_url(); ?>/cart/" class="header-icon">
									<i class="<?php echo $show_green_cart; ?>" >
										<svg id="shopping-bag" xmlns="http://www.w3.org/2000/svg" width="20.297" height="20" viewBox="0 0 20.735 25">
											<g id="Group_50" data-name="Group 50" transform="translate(0 7.997)">
												<g id="Group_49" data-name="Group 49">
												<path id="Path_41" data-name="Path 41" d="M64.387,176.651l-1.235-12a.975.975,0,0,0-.97-.875H45.927a.975.975,0,0,0-.97.873l-1.269,12a3.77,3.77,0,0,0,3.734,4.128H60.687a3.714,3.714,0,0,0,2.749-1.217A3.788,3.788,0,0,0,64.387,176.651Zm-2.4,1.605a1.74,1.74,0,0,1-1.3.576H47.423a1.82,1.82,0,0,1-1.794-1.978L46.8,165.731H61.3l1.145,11.116A1.807,1.807,0,0,1,61.991,178.257Z" transform="translate(-43.67 -163.78)" fill="#fff"/>
												</g>
											</g>
											<g id="Group_52" data-name="Group 52" transform="translate(4.955)">
												<g id="Group_51" data-name="Group 51">
												<path id="Path_42" data-name="Path 42" d="M150.737,0a5.6,5.6,0,0,0-5.592,5.592V8.973H147.1V5.592a3.641,3.641,0,0,1,7.283,0V8.973h1.95V5.592A5.6,5.6,0,0,0,150.737,0Z" transform="translate(-145.145)" fill="#fff"/>
												</g>
											</g>
										</svg>
									</i>
								</a>
						</div>
					</div>
					<?php }else{ ?>
					<div class="collapse navbar-collapse ml-auto w-100 justify-content-end main-nav" id="navbarSupportedContent">
						<ul class="navbar-nav ">
							<?php
							$args = array(
								'theme_location' 	=> 'top-menu',
								'menu_class' 		=> 'navbar-nav ',
								'container' 		=> 'li',
								'container_class'   => false,
								'menu' 				=> 'Header Menu',
							);
							wp_nav_menu($args);
							?>
							<li class="resposnive-in-show">
								<a href="<?php echo get_permalink(488); ?>" class="nav-link">Gift a Zeey</a>
							</li>
							<li class="resposnive-in-show">
								<a href="<?php echo site_url(); ?>/buy-now/" class="nav-link">Buy Now</a>
							</li>
						</ul>
						<div class="header-icon-main">
							<a href="<?php echo site_url(); ?>/my-account/" class="header-icon">
								<i>
									<svg id="user" xmlns="http://www.w3.org/2000/svg" width="20.297" height="20" viewBox="0 0 23.297 25">
										<g id="Group_46" data-name="Group 46" transform="translate(0 14.081)">
											<g id="Group_45" data-name="Group 45">
											<path id="Path_39" data-name="Path 39" d="M29.088,288.389c-7.512,0-11.648,3.553-11.648,10.006a.912.912,0,0,0,.912.912H39.824a.912.912,0,0,0,.912-.912C40.737,291.943,36.6,288.389,29.088,288.389Zm-9.79,9.094c.359-4.824,3.648-7.269,9.79-7.269s9.432,2.444,9.791,7.269Z" transform="translate(-17.44 -288.389)" fill="#fff"/>
											</g>
										</g>
										<g id="Group_48" data-name="Group 48" transform="translate(5.596)">
											<g id="Group_47" data-name="Group 47">
											<path id="Path_40" data-name="Path 40" d="M138.1,0a5.98,5.98,0,0,0-6.052,6.174,6.073,6.073,0,1,0,12.1,0A5.98,5.98,0,0,0,138.1,0Zm0,10.919a4.513,4.513,0,0,1-4.227-4.745A4.149,4.149,0,0,1,138.1,1.825a4.2,4.2,0,0,1,4.227,4.349A4.513,4.513,0,0,1,138.1,10.919Z" transform="translate(-132.049)" fill="#fff"/>
											</g>
										</g>
									</svg>
								</i>
							</a>
							<?php
									if (get_the_title() == "Cart" || get_the_title() == "Checkout") {
										$show_green_cart = "show-green-cart";
									}else{
										$show_green_cart = "";
									}
					
								?>
							<a href="<?php echo site_url(); ?>/cart/" class="header-icon">
								<i class="<?php echo $show_green_cart; ?>">
									<svg id="shopping-bag" xmlns="http://www.w3.org/2000/svg" width="20.297" height="20" viewBox="0 0 20.735 25">
										<g id="Group_50" data-name="Group 50" transform="translate(0 7.997)">
											<g id="Group_49" data-name="Group 49">
											<path id="Path_41" data-name="Path 41" d="M64.387,176.651l-1.235-12a.975.975,0,0,0-.97-.875H45.927a.975.975,0,0,0-.97.873l-1.269,12a3.77,3.77,0,0,0,3.734,4.128H60.687a3.714,3.714,0,0,0,2.749-1.217A3.788,3.788,0,0,0,64.387,176.651Zm-2.4,1.605a1.74,1.74,0,0,1-1.3.576H47.423a1.82,1.82,0,0,1-1.794-1.978L46.8,165.731H61.3l1.145,11.116A1.807,1.807,0,0,1,61.991,178.257Z" transform="translate(-43.67 -163.78)" fill="#fff"/>
											</g>
										</g>
										<g id="Group_52" data-name="Group 52" transform="translate(4.955)">
											<g id="Group_51" data-name="Group 51">
											<path id="Path_42" data-name="Path 42" d="M150.737,0a5.6,5.6,0,0,0-5.592,5.592V8.973H147.1V5.592a3.641,3.641,0,0,1,7.283,0V8.973h1.95V5.592A5.6,5.6,0,0,0,150.737,0Z" transform="translate(-145.145)" fill="#fff"/>
											</g>
										</g>
									</svg>
								</i>
							</a>
							<a href="<?php echo get_permalink(488); ?>" class="header-link-style">Gift a Zeey</a>
							<a href="<?php echo site_url(); ?>/buy-now/" class="header-link-style">Buy Now</a>
						</div>
					</div>
				<?php } ?>	
				</div>
			</nav>
		</header>
