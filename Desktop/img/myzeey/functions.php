<?php
/**
 * Twenty Twenty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'twentytwenty-fullscreen', 1980, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Twenty, use a find and replace
	 * to change 'twentytwenty' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentytwenty' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	/*
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 */
	if ( is_customize_preview() ) {
		require get_template_directory() . '/inc/starter-content.php';
		add_theme_support( 'starter-content', twentytwenty_get_starter_content() );
	}

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	$loader = new TwentyTwenty_Script_Loader();
	add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );

	add_theme_support( 'woocommerce' );

}

add_action( 'after_setup_theme', 'twentytwenty_theme_support' );

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';

// Handle SVG icons.
require get_template_directory() . '/classes/class-twentytwenty-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';

// Handle Customizer settings.
require get_template_directory() . '/classes/class-twentytwenty-customize.php';

// Require Separator Control class.
require get_template_directory() . '/classes/class-twentytwenty-separator-control.php';

// Custom comment walker.
require get_template_directory() . '/classes/class-twentytwenty-walker-comment.php';

// Custom page walker.
require get_template_directory() . '/classes/class-twentytwenty-walker-page.php';

// Custom script loader class.
require get_template_directory() . '/classes/class-twentytwenty-script-loader.php';

// Non-latin language handling.
require get_template_directory() . '/classes/class-twentytwenty-non-latin-languages.php';

// Custom CSS.
require get_template_directory() . '/inc/custom-css.php';

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Register and Enqueue Styles.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'twentytwenty-style', get_stylesheet_uri(), array(), $theme_version );
	wp_style_add_data( 'twentytwenty-style', 'rtl', 'replace' );

	// Add output of Customizer settings as inline style.
	wp_add_inline_style( 'twentytwenty-style', twentytwenty_get_customizer_css( 'front-end' ) );

	// Add print CSS.
	wp_enqueue_style( 'twentytwenty-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );

}

add_action( 'wp_enqueue_scripts', 'twentytwenty_register_styles' );

/**
 * Register and Enqueue Scripts.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'twentytwenty-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, false );
	wp_script_add_data( 'twentytwenty-js', 'async', true );

}

add_action( 'wp_enqueue_scripts', 'twentytwenty_register_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @since Twenty Twenty 1.0
 *
 * @link https://git.io/vWdr2
 */
function twentytwenty_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
//add_action( 'wp_print_footer_scripts', 'twentytwenty_skip_link_focus_fix' );

/**
 * Enqueue non-latin language styles.
 *
 * @since Twenty Twenty 1.0
 *
 * @return void
 */
function twentytwenty_non_latin_languages() {
	$custom_css = TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twentytwenty-style', $custom_css );
	}
}

add_action( 'wp_enqueue_scripts', 'twentytwenty_non_latin_languages' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'twentytwenty' ),
		'expanded' => __( 'Desktop Expanded Menu', 'twentytwenty' ),
		'mobile'   => __( 'Mobile Menu', 'twentytwenty' ),
		'footer'   => __( 'Footer Menu', 'twentytwenty' ),
		'social'   => __( 'Social Menu', 'twentytwenty' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'twentytwenty_menus' );

/**
 * Get the information about the logo.
 *
 * @since Twenty Twenty 1.0
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 * @return string
 */
function twentytwenty_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

add_filter( 'get_custom_logo', 'twentytwenty_get_custom_logo' );

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 *
	 * @since Twenty Twenty 1.0
	 */
	function wp_body_open() {
		/** This action is documented in wp-includes/general-template.php */
		do_action( 'wp_body_open' );
	}
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'twentytwenty' ) . '</a>';
}

add_action( 'wp_body_open', 'twentytwenty_skip_link', 5 );

/**
 * Register widget areas.
 *
 * @since Twenty Twenty 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentytwenty_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'twentytwenty' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'twentytwenty' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
			)
		)
	);

}

add_action( 'widgets_init', 'twentytwenty_sidebar_registration' );

/**
 * Enqueue supplemental block editor styles.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_block_editor_styles() {

	// Enqueue the editor styles.
	wp_enqueue_style( 'twentytwenty-block-editor-styles', get_theme_file_uri( '/assets/css/editor-style-block.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_style_add_data( 'twentytwenty-block-editor-styles', 'rtl', 'replace' );

	// Add inline style from the Customizer.
	wp_add_inline_style( 'twentytwenty-block-editor-styles', twentytwenty_get_customizer_css( 'block-editor' ) );

	// Add inline style for non-latin fonts.
	wp_add_inline_style( 'twentytwenty-block-editor-styles', TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'block-editor' ) );

	// Enqueue the editor script.
	//wp_enqueue_script( 'twentytwenty-block-editor-script', get_theme_file_uri( '/assets/js/editor-script-block.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'twentytwenty_block_editor_styles', 1, 1 );

/**
 * Enqueue classic editor styles.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_classic_editor_styles() {

	$classic_editor_styles = array(
		'/assets/css/editor-style-classic.css',
	);

	add_editor_style( $classic_editor_styles );

}

add_action( 'init', 'twentytwenty_classic_editor_styles' );

/**
 * Output Customizer settings in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @since Twenty Twenty 1.0
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
function twentytwenty_add_classic_editor_customizer_styles( $mce_init ) {

	$styles = twentytwenty_get_customizer_css( 'classic-editor' );

	if ( ! isset( $mce_init['content_style'] ) ) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;

}

add_filter( 'tiny_mce_before_init', 'twentytwenty_add_classic_editor_customizer_styles' );

/**
 * Output non-latin font styles in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
function twentytwenty_add_classic_editor_non_latin_styles( $mce_init ) {

	$styles = TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'classic-editor' );

	// Return if there are no styles to add.
	if ( ! $styles ) {
		return $mce_init;
	}

	if ( ! isset( $mce_init['content_style'] ) ) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;

}

add_filter( 'tiny_mce_before_init', 'twentytwenty_add_classic_editor_non_latin_styles' );

/**
 * Block Editor Settings.
 * Add custom colors and font sizes to the block editor.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_block_editor_settings() {

	// Block Editor Palette.
	$editor_color_palette = array(
		array(
			'name'  => __( 'Accent Color', 'twentytwenty' ),
			'slug'  => 'accent',
			'color' => twentytwenty_get_color_for_area( 'content', 'accent' ),
		),
		array(
			'name'  => _x( 'Primary', 'color', 'twentytwenty' ),
			'slug'  => 'primary',
			'color' => twentytwenty_get_color_for_area( 'content', 'text' ),
		),
		array(
			'name'  => _x( 'Secondary', 'color', 'twentytwenty' ),
			'slug'  => 'secondary',
			'color' => twentytwenty_get_color_for_area( 'content', 'secondary' ),
		),
		array(
			'name'  => __( 'Subtle Background', 'twentytwenty' ),
			'slug'  => 'subtle-background',
			'color' => twentytwenty_get_color_for_area( 'content', 'borders' ),
		),
	);

	// Add the background option.
	$background_color = get_theme_mod( 'background_color' );
	if ( ! $background_color ) {
		$background_color_arr = get_theme_support( 'custom-background' );
		$background_color     = $background_color_arr[0]['default-color'];
	}
	$editor_color_palette[] = array(
		'name'  => __( 'Background Color', 'twentytwenty' ),
		'slug'  => 'background',
		'color' => '#' . $background_color,
	);

	// If we have accent colors, add them to the block editor palette.
	if ( $editor_color_palette ) {
		add_theme_support( 'editor-color-palette', $editor_color_palette );
	}

	// Block Editor Font Sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => _x( 'Small', 'Name of the small font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the block editor.', 'twentytwenty' ),
				'size'      => 18,
				'slug'      => 'small',
			),
			array(
				'name'      => _x( 'Regular', 'Name of the regular font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the block editor.', 'twentytwenty' ),
				'size'      => 21,
				'slug'      => 'normal',
			),
			array(
				'name'      => _x( 'Large', 'Name of the large font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the block editor.', 'twentytwenty' ),
				'size'      => 26.25,
				'slug'      => 'large',
			),
			array(
				'name'      => _x( 'Larger', 'Name of the larger font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the block editor.', 'twentytwenty' ),
				'size'      => 32,
				'slug'      => 'larger',
			),
		)
	);

	add_theme_support( 'editor-styles' );

	// If we have a dark background color then add support for dark editor style.
	// We can determine if the background color is dark by checking if the text-color is white.
	if ( '#ffffff' === strtolower( twentytwenty_get_color_for_area( 'content', 'text' ) ) ) {
		add_theme_support( 'dark-editor-style' );
	}

}

add_action( 'after_setup_theme', 'twentytwenty_block_editor_settings' );

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 * @return string
 */
function twentytwenty_read_more_tag( $html ) {
	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
}

add_filter( 'the_content_more_link', 'twentytwenty_read_more_tag' );

/**
 * Enqueues scripts for customizer controls & settings.
 *
 * @since Twenty Twenty 1.0
 *
 * @return void
 */
function twentytwenty_customize_controls_enqueue_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// Add main customizer js file.
	wp_enqueue_script( 'twentytwenty-customize', get_template_directory_uri() . '/assets/js/customize.js', array( 'jquery' ), $theme_version, false );

	// Add script for color calculations.
	wp_enqueue_script( 'twentytwenty-color-calculations', get_template_directory_uri() . '/assets/js/color-calculations.js', array( 'wp-color-picker' ), $theme_version, false );

	// Add script for controls.
	wp_enqueue_script( 'twentytwenty-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array( 'twentytwenty-color-calculations', 'customize-controls', 'underscore', 'jquery' ), $theme_version, false );
	wp_localize_script( 'twentytwenty-customize-controls', 'twentyTwentyBgColors', twentytwenty_get_customizer_color_vars() );
}

add_action( 'customize_controls_enqueue_scripts', 'twentytwenty_customize_controls_enqueue_scripts' );

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Twenty Twenty 1.0
 *
 * @return void
 */
function twentytwenty_customize_preview_init() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script( 'twentytwenty-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview', 'customize-selective-refresh', 'jquery' ), $theme_version, true );
	wp_localize_script( 'twentytwenty-customize-preview', 'twentyTwentyBgColors', twentytwenty_get_customizer_color_vars() );
	wp_localize_script( 'twentytwenty-customize-preview', 'twentyTwentyPreviewEls', twentytwenty_get_elements_array() );

	wp_add_inline_script(
		'twentytwenty-customize-preview',
		sprintf(
			'wp.customize.selectiveRefresh.partialConstructor[ %1$s ].prototype.attrs = %2$s;',
			wp_json_encode( 'cover_opacity' ),
			wp_json_encode( twentytwenty_customize_opacity_range() )
		)
	);
}

add_action( 'customize_preview_init', 'twentytwenty_customize_preview_init' );

/**
 * Get accessible color for an area.
 *
 * @since Twenty Twenty 1.0
 *
 * @param string $area    The area we want to get the colors for.
 * @param string $context Can be 'text' or 'accent'.
 * @return string Returns a HEX color.
 */
function twentytwenty_get_color_for_area( $area = 'content', $context = 'text' ) {

	// Get the value from the theme-mod.
	$settings = get_theme_mod(
		'accent_accessible_colors',
		array(
			'content'       => array(
				'text'      => '#000000',
				'accent'    => '#cd2653',
				'secondary' => '#6d6d6d',
				'borders'   => '#dcd7ca',
			),
			'header-footer' => array(
				'text'      => '#000000',
				'accent'    => '#cd2653',
				'secondary' => '#6d6d6d',
				'borders'   => '#dcd7ca',
			),
		)
	);

	// If we have a value return it.
	if ( isset( $settings[ $area ] ) && isset( $settings[ $area ][ $context ] ) ) {
		return $settings[ $area ][ $context ];
	}

	// Return false if the option doesn't exist.
	return false;
}

/**
 * Returns an array of variables for the customizer preview.
 *
 * @since Twenty Twenty 1.0
 *
 * @return array
 */
function twentytwenty_get_customizer_color_vars() {
	$colors = array(
		'content'       => array(
			'setting' => 'background_color',
		),
		'header-footer' => array(
			'setting' => 'header_footer_background_color',
		),
	);
	return $colors;
}

/**
 * Get an array of elements.
 *
 * @since Twenty Twenty 1.0
 *
 * @return array
 */
function twentytwenty_get_elements_array() {

	// The array is formatted like this:
	// [key-in-saved-setting][sub-key-in-setting][css-property] = [elements].
	$elements = array(
		'content'       => array(
			'accent'     => array(
				'color'            => array( '.color-accent', '.color-accent-hover:hover', '.color-accent-hover:focus', ':root .has-accent-color', '.has-drop-cap:not(:focus):first-letter', '.wp-block-button.is-style-outline', 'a' ),
				'border-color'     => array( 'blockquote', '.border-color-accent', '.border-color-accent-hover:hover', '.border-color-accent-hover:focus' ),
				'background-color' => array( 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file .wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.bg-accent', '.bg-accent-hover:hover', '.bg-accent-hover:focus', ':root .has-accent-background-color', '.comment-reply-link' ),
				'fill'             => array( '.fill-children-accent', '.fill-children-accent *' ),
			),
			'background' => array(
				'color'            => array( ':root .has-background-color', 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.wp-block-button', '.comment-reply-link', '.has-background.has-primary-background-color:not(.has-text-color)', '.has-background.has-primary-background-color *:not(.has-text-color)', '.has-background.has-accent-background-color:not(.has-text-color)', '.has-background.has-accent-background-color *:not(.has-text-color)' ),
				'background-color' => array( ':root .has-background-background-color' ),
			),
			'text'       => array(
				'color'            => array( 'body', '.entry-title a', ':root .has-primary-color' ),
				'background-color' => array( ':root .has-primary-background-color' ),
			),
			'secondary'  => array(
				'color'            => array( 'cite', 'figcaption', '.wp-caption-text', '.post-meta', '.entry-content .wp-block-archives li', '.entry-content .wp-block-categories li', '.entry-content .wp-block-latest-posts li', '.wp-block-latest-comments__comment-date', '.wp-block-latest-posts__post-date', '.wp-block-embed figcaption', '.wp-block-image figcaption', '.wp-block-pullquote cite', '.comment-metadata', '.comment-respond .comment-notes', '.comment-respond .logged-in-as', '.pagination .dots', '.entry-content hr:not(.has-background)', 'hr.styled-separator', ':root .has-secondary-color' ),
				'background-color' => array( ':root .has-secondary-background-color' ),
			),
			'borders'    => array(
				'border-color'        => array( 'pre', 'fieldset', 'input', 'textarea', 'table', 'table *', 'hr' ),
				'background-color'    => array( 'caption', 'code', 'code', 'kbd', 'samp', '.wp-block-table.is-style-stripes tbody tr:nth-child(odd)', ':root .has-subtle-background-background-color' ),
				'border-bottom-color' => array( '.wp-block-table.is-style-stripes' ),
				'border-top-color'    => array( '.wp-block-latest-posts.is-grid li' ),
				'color'               => array( ':root .has-subtle-background-color' ),
			),
		),
		'header-footer' => array(
			'accent'     => array(
				'color'            => array( 'body:not(.overlay-header) .primary-menu > li > a', 'body:not(.overlay-header) .primary-menu > li > .icon', '.modal-menu a', '.footer-menu a, .footer-widgets a', '#site-footer .wp-block-button.is-style-outline', '.wp-block-pullquote:before', '.singular:not(.overlay-header) .entry-header a', '.archive-header a', '.header-footer-group .color-accent', '.header-footer-group .color-accent-hover:hover' ),
				'background-color' => array( '.social-icons a', '#site-footer button:not(.toggle)', '#site-footer .button', '#site-footer .faux-button', '#site-footer .wp-block-button__link', '#site-footer .wp-block-file__button', '#site-footer input[type="button"]', '#site-footer input[type="reset"]', '#site-footer input[type="submit"]' ),
			),
			'background' => array(
				'color'            => array( '.social-icons a', 'body:not(.overlay-header) .primary-menu ul', '.header-footer-group button', '.header-footer-group .button', '.header-footer-group .faux-button', '.header-footer-group .wp-block-button:not(.is-style-outline) .wp-block-button__link', '.header-footer-group .wp-block-file__button', '.header-footer-group input[type="button"]', '.header-footer-group input[type="reset"]', '.header-footer-group input[type="submit"]' ),
				'background-color' => array( '#site-header', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal', '.menu-modal-inner', '.search-modal-inner', '.archive-header', '.singular .entry-header', '.singular .featured-media:before', '.wp-block-pullquote:before' ),
			),
			'text'       => array(
				'color'               => array( '.header-footer-group', 'body:not(.overlay-header) #site-header .toggle', '.menu-modal .toggle' ),
				'background-color'    => array( 'body:not(.overlay-header) .primary-menu ul' ),
				'border-bottom-color' => array( 'body:not(.overlay-header) .primary-menu > li > ul:after' ),
				'border-left-color'   => array( 'body:not(.overlay-header) .primary-menu ul ul:after' ),
			),
			'secondary'  => array(
				'color' => array( '.site-description', 'body:not(.overlay-header) .toggle-inner .toggle-text', '.widget .post-date', '.widget .rss-date', '.widget_archive li', '.widget_categories li', '.widget cite', '.widget_pages li', '.widget_meta li', '.widget_nav_menu li', '.powered-by-wordpress', '.to-the-top', '.singular .entry-header .post-meta', '.singular:not(.overlay-header) .entry-header .post-meta a' ),
			),
			'borders'    => array(
				'border-color'     => array( '.header-footer-group pre', '.header-footer-group fieldset', '.header-footer-group input', '.header-footer-group textarea', '.header-footer-group table', '.header-footer-group table *', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal nav *', '.footer-widgets-outer-wrapper', '.footer-top' ),
				'background-color' => array( '.header-footer-group table caption', 'body:not(.overlay-header) .header-inner .toggle-wrapper::before' ),
			),
		),
	);

	/**
	 * Filters Twenty Twenty theme elements.
	 *
	 * @since Twenty Twenty 1.0
	 *
	 * @param array Array of elements.
	 */
	return apply_filters( 'twentytwenty_get_elements_array', $elements );
}

function theme_scripts() {
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'theme_scripts');

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_action('wp_ajax_get_calcualtion_html', 'fnget_price_calculation');
add_action('wp_ajax_nopriv_get_calcualtion_html', 'fnget_price_calculation');
function fnget_price_calculation()
{
	if( isset($_POST["action"]) && $_POST["action"] == "get_calcualtion_html" )
	{
		$product 	= wc_get_product( $_POST["productid"] );
		$variationDetails 	=	$product->get_available_variations();
		$variationPrice 	=	0;
		foreach( $variationDetails as $variationDetailList )
		{
			if( $variationDetailList["attributes"]["attribute_pa_clasp"] == $_POST["clasptypevalue"] )
			{
				$variationPrice = $variationDetailList["display_price"];
			}
		}
		//echo "<pre>"; print_r($_POST); die;

		$totalBPrice 	= 0;
		$totalCPrice 	= 0;
		$totalPrice     = 0;
		$basePrice 		= $_POST['mainprice'];

        if( $variationPrice != 0 )
        {
            $basePrice 		= $variationPrice;
        }

        $html = "<tr>
                    <td>Base Price</td>
                    <td><?php ".wc_price(trim($basePrice))."</td>
                </tr>";

		if( isset($_POST['beadingtypename']) && ! empty($_POST['beadingtypename']) )
		{
			foreach( $_POST['beadingtypename'] as $breadListing )
			{
				$totalBPrice = $totalBPrice + $breadListing["beadprice"];
			}
			$html .= "<tr>
                        <td>Beading x ".count($_POST['beadingtypename'])."</td>
                        <td>".wc_price($totalBPrice)."</td>
                    </tr>";
		}

		if( isset($_POST['charmtypename']) && ! empty($_POST['charmtypename']) )
		{
			foreach( $_POST['charmtypename'] as $charmListing )
			{
				$totalCPrice = $totalCPrice + $charmListing["charmprice"];
			}
			$html .= "<tr>
                        <td>Charm x ".count($_POST['charmtypename'])."</td>
                        <td>".wc_price($totalCPrice)."</td>
                    </tr>";
		}

		$totalPrice = $totalBPrice + $totalCPrice;
		$totalPrice = $totalPrice + $basePrice;

		$html .= "<tr>
                    <td>MyZeey Total</td>
                    <td>".wc_price($totalPrice)."</td>
                </tr>";
	}
	$var = array("total_html"=>$html, "total_price"=>$totalPrice);
	// echo $html; die;
	echo wp_send_json_success($var);
}

add_action('wp_ajax_add_to_cart', 'fnadd_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'fnadd_to_cart');
function fnadd_to_cart()
{
	$password = '';
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < 8; $i++) {
		$password .= $characters[rand(0, $charactersLength - 1)];
	}

	$productid = $_POST["productid"];
	$fname = $_POST["nameandmessage"];
	$searchname = $_POST["searchname"];
	$clasptypevalue = $_POST["clasptypevalue"];
	$beadingtypename = $_POST["beadingtypename"];
	$charmtypename = $_POST["charmtypename"];
	$clasptype_braiding_one = $_POST["clasptype_braiding_one"];
	$clasptype_braiding_two = $_POST["clasptype_braiding_two"];
	$clasptype_braiding_three = $_POST["clasptype_braiding_three"];
	$clasptype_braiding_four = $_POST["clasptype_braiding_four"];
	
	
	$id = wp_insert_post(array(
		'post_title'=>$password, 
		'post_type'=>'shared-myzeey', 
		'post_content'=>'demo text',
		'post_status' => 'publish',
		'meta_input' => array(
			'share_code' => $productid,
			'search_name' => $searchname,
			'clasp' => $clasptypevalue,
			'braiding_one' => $clasptype_braiding_one,
			'braiding_two' => $clasptype_braiding_two,
			'braiding_three' => $clasptype_braiding_three,
			'braiding_four' => $clasptype_braiding_four,
			'name_or_message' => $fname
		  ),
	  ));
	  $beading_field_key = 'field_623aa14bfe988';
		  $beading_sub_field = "beading_name";
		  
		  foreach ($beadingtypename as $key => $value) {
			  $classs_value[] = array($beading_sub_field => $value['beadname']);
			  update_field($beading_field_key, $classs_value, $id);
		  }
		  $charm_field_key = "field_623aa182fe98a";
		  $charm_sub_field = "charm_name";
		  
		  foreach ($charmtypename as $key => $value) {
			  $classc_value[] = array($charm_sub_field => $value['charmname']);
			  update_field($charm_field_key, $classc_value, $id);
		  }

	  echo wp_send_json_success($id);

	  

	// if( isset($_POST["action"]) && $_POST["action"] == "add_to_cart" )
	// {
	// 	//echo "<pre>"; print_r($_POST); die;
	// 	$product 	= wc_get_product( $_POST["productid"] );
	// 	$variationDetails 	=	$product->get_available_variations();
	// 	$variationPrice 	=	0;
	// 	$variationid 		= 	"";
	// 	$charmtype			=	"";
	// 	$beadingype			=	"";
	// 	$basePrice 			= 	$_POST['mainprice'];
	// 	$searchname         = 	"";
	// 	if( $_POST['searchname'] != "" )
	// 	{
	// 		$searchname     = 	$_POST['searchname'];
	// 	}
	// 	$nameandmessage     = 	"";
	// 	if( $_POST['nameandmessage'] != "" )
	// 	{
	// 		$nameandmessage	= 	$_POST['nameandmessage'];
	// 	}
		
	// 	foreach( $variationDetails as $variationDetailList )
	// 	{
	// 		if( $variationDetailList["attributes"]["attribute_pa_clasp"] == $_POST["clasptypevalue"] )
	// 		{
	// 			$basePrice 		= $variationDetailList["display_price"];
	// 			$variationid  	= $variationDetailList["variation_id"];
	// 		}
	// 	}

	// 	$totalBPrice 	= 0;
	// 	$totalCPrice 	= 0;
	// 	$totalPrice     = 0;
		

	// 	if( isset($_POST['beadingtypename']) && ! empty($_POST['beadingtypename']) )
	// 	{
	// 		foreach( $_POST['beadingtypename'] as $breadListing )
	// 		{
	// 			$totalBPrice = $totalBPrice + $breadListing["beadprice"];
	// 		}
	// 		$beadingype	= base64_encode(serialize($_POST['beadingtypename']));
	// 	}

	// 	if( isset($_POST['charmtypename']) && ! empty($_POST['charmtypename']) )
	// 	{
	// 		foreach( $_POST['charmtypename'] as $charmListing )
	// 		{
	// 			$totalCPrice = $totalCPrice + $charmListing["charmprice"];
	// 		}
	// 		$charmtype	= base64_encode(serialize($_POST['charmtypename']));
	// 	}

	// 	$totalPrice = $totalBPrice + $totalCPrice;
	// 	$totalPrice = ( $totalPrice + $basePrice );
	// 	$clasptype_braiding_one = trim($_POST['clasptype_braiding_one']);
	// 	$clasptype_braiding_two = trim($_POST['clasptype_braiding_two']);
	// 	$clasptype_braiding_three = trim($_POST['clasptype_braiding_three']);
	// 	$clasptype_braiding_four = trim($_POST['clasptype_braiding_four']);
	// 	$clasptypevalue 		= trim($_POST['clasptypevalue']);

	// 	$output = array(
	// 		"totalPrice"				=>	$totalPrice,
	// 		"beadingype"				=>	$beadingype,
	// 		"charmtype"					=>	$charmtype,
	// 		"searchname"				=>	$searchname,
	// 		"nameandmessage"			=>	$nameandmessage,
	// 		"totalBPrice"				=>	$totalBPrice,
	// 		"totalCPrice"				=>	$totalCPrice,
	// 		"variationid"				=>	$variationid,
	// 		"clasptype_braiding_one"	=>	$clasptype_braiding_one,
	// 		"clasptype_braiding_two"	=>	$clasptype_braiding_two,
	// 		"clasptype_braiding_three"	=>	$clasptype_braiding_three,
	// 		"clasptype_braiding_four"	=>	$clasptype_braiding_four,
	// 		"clasptypevalue"			=>	$clasptypevalue,
	// 	);
	// 	//echo json_encode($output); die;
	// 	echo $totalPrice."######".$beadingype."######".$charmtype."######".$searchname."######".$nameandmessage."######".$totalBPrice."######".$totalCPrice."######".$variationid."######".$clasptype_braiding_one."######".$clasptype_braiding_two."######".$clasptype_braiding_three."######".$clasptype_braiding_four."######".$clasptypevalue; die;
	// }
	// else
	// {
	// 	echo 0; die;
	// }
}

add_action( 'woocommerce_review_order_before_order_total', 'custom_cart_total' );
add_action( 'woocommerce_before_cart_totals', 'custom_cart_total' );
function custom_cart_total() {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
            return;
    session_start();
    //WC()->cart->total = $_SESSION["htotalprice"];
    //var_dump( WC()->cart->total);
}

add_filter('woocommerce_add_cart_item_data','add_item_data',10,3);
function add_item_data($cart_item_data, $product_id, $variation_id)
{
	session_start();
	if($product_id != 488){
	    if(isset($_SESSION['searchname'])){
	        $cart_item_data['searchname'] = sanitize_text_field($_SESSION['searchname']);
	    }

	    if(isset($_SESSION['fname'])){
	        $cart_item_data['nameandmessage'] = sanitize_text_field($_SESSION['fname']);
	    }

	    if( ! empty($_SESSION['hbeadingtype']) ){
	        $cart_item_data['hbeadingtype'] = $_SESSION['hbeadingtype'];
	    }

	    if( ! empty($_SESSION['hcharmtype'])){
	        $cart_item_data['hcharmtype'] = $_SESSION['hcharmtype'];
	    }
		
		if( ! empty($_SESSION['htotalprice'])){
	        $cart_item_data['htotalprice'] = $_SESSION['htotalprice'];
			$cart_item_data['cartitemprice'] = $_SESSION['htotalprice'];
	    }
	}
    return $cart_item_data;
}

add_action( 'woocommerce_before_calculate_totals', 'before_calculate_totals', 10, 1 );
function before_calculate_totals( $cart_obj ) {
	if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
		return;
	}
	// Iterate through each cart item
	foreach( $cart_obj->get_cart() as $key=>$value ) {
		if( isset( $value['cartitemprice'] ) && $value['product_id'] != 488) {
			$price = $value['cartitemprice'];
			$value['data']->set_price( ( $price ) );
		}
	}
}

add_filter('woocommerce_get_cart_item_from_session', 'get_cart_items_from_session', 1, 3 );
if(!function_exists('get_cart_items_from_session'))
{
    function get_cart_items_from_session($item, $values, $key)
    {
    	//echo "<pre>"; print_r($values); die;
    	if (array_key_exists( 'hbeadingtype', $values ) )
        {
        	$item['hbeadingtype'] = $values['hbeadingtype'];
        }

        if (array_key_exists( 'hcharmtype', $values ) )
        {
        	$item['hcharmtype'] = $values['hcharmtype'];
        } 

        if (array_key_exists( 'nameandmessage', $values ) )
        {
        	$item['nameandmessage'] = $values['nameandmessage'];
        }

        if (array_key_exists( 'searchname', $values ) )
        {
        	$item['searchname'] = $values['searchname'];
        }

        if (array_key_exists( 'hclasptype', $values ) )
        {
        	$item['hclasptype'] = $values['hclasptype'];
        }

        if (array_key_exists( 'hclasptype_braiding_one', $values ) )
        {
        	$item['hclasptype_braiding_one'] = $values['hclasptype_braiding_one'];
        }

        if (array_key_exists( 'hclasptype_braiding_two', $values ) )
        {
        	$item['hclasptype_braiding_two'] = $values['hclasptype_braiding_two'];
        }

        if (array_key_exists( 'hclasptype_braiding_three', $values ) )
        {
        	$item['hclasptype_braiding_three'] = $values['hclasptype_braiding_three'];
        }

        if (array_key_exists( 'hclasptype_braiding_four', $values ) )
        {
        	$item['hclasptype_braiding_four'] = $values['hclasptype_braiding_four'];
        }

        return $item;
    }
}

add_action('woocommerce_add_order_item_meta','add_values_to_order_item_meta',1,2);
if(!function_exists('add_values_to_order_item_meta'))
{
  function add_values_to_order_item_meta($item_id, $values)
  {
        global $woocommerce,$wpdb;
        //echo "<pre>"; print_r($values); die;
        if( $values['nameandmessage'] != "" )
        {
            wc_add_order_item_meta($item_id,'__nameandmessage',$values['nameandmessage']);  
        }

        if( $values['searchname'] != "" )
        {
            wc_add_order_item_meta($item_id,'__searchname',$values['searchname']);  
        }
		
        if(!empty($values['hcharmtype']))
        {	
			$i = 1;
			foreach($values['hcharmtype'] as $charmtypeName){
				wc_add_order_item_meta($item_id,'__hcharmtype'.$i, $charmtypeName);
				$i++;
			}
        }

        if(!empty($values['hbeadingtype']))
        {
			$i = 1;
			foreach($values['hbeadingtype'] as $breadingtypeName){
				wc_add_order_item_meta($item_id,'__hbeadingtype'.$i, $breadingtypeName);
				$i++;
			} 
        }

        if( $values['hclasptype'] != "" )
        {
            wc_add_order_item_meta($item_id,'__hclasptype',$values['hclasptype']);  
        }

        if( $values['hclasptype_braiding_one'] != "" )
        {
            wc_add_order_item_meta($item_id,'__hclasptype_braiding_one',$values['hclasptype_braiding_one']);  
        }

        if( $values['hclasptype_braiding_two'] != "" )
        {
            wc_add_order_item_meta($item_id,'__hclasptype_braiding_two',$values['hclasptype_braiding_two']);  
        }

        if( $values['hclasptype_braiding_three'] != "" )
        {
            wc_add_order_item_meta($item_id,'__hclasptype_braiding_three',$values['hclasptype_braiding_three']);  
        }

        if( $values['hclasptype_braiding_four'] != "" )
        {
            wc_add_order_item_meta($item_id,'__hclasptype_braiding_four',$values['hclasptype_braiding_four']);  
        }
  }
}

add_filter( 'woocommerce_add_to_cart_redirect', 'bbloomer_redirect_checkout_add_cart' );
function bbloomer_redirect_checkout_add_cart() {
   return wc_get_checkout_url();
}

add_action('wp_ajax_remove_charmtypefromsession', 'remove_charmtypefromsession');
add_action('wp_ajax_nopriv_remove_charmtypefromsession', 'remove_charmtypefromsession');
function remove_charmtypefromsession()
{
	global $woocommerce;
	if( isset($_POST["action"]) && $_POST["action"] == "remove_charmtypefromsession" ){
		$itemremovekey = $_POST["cartitemkey"];
		$charmnameremove = $_POST["charmtitle"];
		$charmpriceremove = $_POST["charmprice"];
		session_start();
		$removeid = $_POST["loopid"];
		unset($_SESSION["hcharmtype"][$removeid]); 
		$_SESSION["hcharmtype"] = array_values($_SESSION["hcharmtype"]);
		
		$cart_item_content = $woocommerce->cart->get_cart_item($itemremovekey);
		$charmtype = (array)$cart_item_content['hcharmtype'];
		
		if (($key = array_search($charmnameremove, $charmtype)) !== false) {
			unset($charmtype[$key]);
		}
		$woocommerce->cart->cart_contents[$itemremovekey]['hcharmtype'] = $charmtype;

		$newprice = $woocommerce->cart->cart_contents[$itemremovekey]['cartitemprice'] - $charmpriceremove;
		$woocommerce->cart->cart_contents[$itemremovekey]['htotalprice'] = $newprice;
		$woocommerce->cart->cart_contents[$itemremovekey]['cartitemprice'] = $newprice;
		$woocommerce->cart->set_session();
		
		//WC()->cart->total = $_SESSION["htotalprice"];
		echo 1; die;
	} else {
		echo 0; die;
	}
}

add_action('wp_ajax_remove_beadingtypefromsession', 'remove_beadingtypefromsession');
add_action('wp_ajax_nopriv_remove_beadingtypefromsession', 'remove_beadingtypefromsession');
function remove_beadingtypefromsession()
{
	global $woocommerce;
	if( isset($_POST["action"]) && $_POST["action"] == "remove_beadingtypefromsession" ){
		$itemremovekey = $_POST["cartitemkey"];
		$beadingnameremove = $_POST["beadingtitle"];
		$beadingpriceremove = $_POST["beadingprice"];
		session_start();
		$removeid = $_POST["loopid"];
		unset($_SESSION["hbeadingtype"][$removeid]);
		$_SESSION["hbeadingtype"] = array_values($_SESSION["hbeadingtype"]);
		$cart_item_content = $woocommerce->cart->get_cart_item($itemremovekey);
		$beadingtype = (array)$cart_item_content['hbeadingtype'];
		
		if (($key = array_search($beadingnameremove, $beadingtype)) !== false) {
			unset($beadingtype[$key]);
		}
		$woocommerce->cart->cart_contents[$itemremovekey]['hbeadingtype'] = $beadingtype;
		
		$newprice = $woocommerce->cart->cart_contents[$itemremovekey]['cartitemprice'] - $beadingpriceremove;
		$woocommerce->cart->cart_contents[$itemremovekey]['htotalprice'] = $newprice;
		$woocommerce->cart->cart_contents[$itemremovekey]['cartitemprice'] =  $newprice;
		$woocommerce->cart->set_session();
		
		//WC()->cart->total = $_SESSION["htotalprice"];
		//echo wp_send_json_success($woocommerce->cart->get_cart_item($itemremovekey));
		echo 1; die;
	} else {
		echo 0; die;
	}
}

add_action('wp_ajax_remove_productsfromthecat', 'remove_productsfromthecat');
add_action('wp_ajax_nopriv_remove_productsfromthecat', 'remove_productsfromthecat');
function remove_productsfromthecat()
{
	global $woocommerce;

	if( isset($_POST["action"]) && $_POST["action"] == "remove_productsfromthecat" ){
		
		$itemremovekey = $_POST["cartitemkey"];
		$woocommerce->cart->remove_cart_item($itemremovekey);
		echo wp_send_json_success($woocommerce->cart);
	} else {
		echo 0; die;
	}
}

add_action('wp_ajax_get_search_html', 'get_search_html');
add_action('wp_ajax_nopriv_get_search_html', 'get_search_html');
function get_search_html()
{
	$data = array();
	if( isset($_POST["action"]) && $_POST["action"] == "get_search_html" && $_POST["searchname"] != "" ){
		if( have_rows('acf_pl_search_name_listing', 280) ):
		    while( have_rows('acf_pl_search_name_listing', 280) ) : the_row();
		        array_push($data, strtolower(get_sub_field('acf_snl_search_listing_name')));
		    endwhile;
		endif;

		$input = strtolower(preg_quote($_POST["searchname"], '~'));
		$result = preg_grep('~' . $input . '~', $data);
		$response = array();	
		$response['res'] = 'success';

		$html = "<ul class='search-box-selected-value'>";
		if( count($result) > 0 ){
			foreach( $result as $resultList ){
				$html .= "<li>".$resultList."</li>";
			}
		} else {
			$html .= "<li>No Result Found</li>";
			$response['res'] = "fail";
		}
		$html .= "</ul>";

		$response['resHTML'] = $html;

		echo json_encode($response); die;

	} else {
		echo 0; die;
	}
}

//add_action('woocommerce_new_order','clear_the_cart');
function clear_the_cart() 
{
    global $woocommerce;
    $woocommerce->cart->empty_cart();
}

function force_individual_cart_items( $cart_item_data, $product_id ) {
	$unique_cart_item_key = md5( microtime() . rand() );
	$cart_item_data['unique_key'] = $unique_cart_item_key;
  
	return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'force_individual_cart_items', 10, 2 );

add_action('template_redirect', 'remove_shop_breadcrumbs' );
function remove_shop_breadcrumbs(){
    if (is_product())
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}

remove_action( 'woocommerce_order_details_after_order_table', 'woocommerce_order_again_button' );

add_filter( 'woocommerce_product_tabs', 'my_remove_all_product_tabs', 98 );
function my_remove_all_product_tabs( $tabs ) {
  unset( $tabs['description'] );        // Remove the description tab
  unset( $tabs['reviews'] );       // Remove the reviews tab
  unset( $tabs['additional_information'] );    // Remove the additional information tab
  return $tabs;
}

add_action( 'wp', 'bbloomer_remove_sidebar_product_pages' );

function bbloomer_remove_sidebar_product_pages() {
	if ( is_product() ) {
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	}
}

add_action( 'init', 'shared_myzeey_cpt' );
function shared_myzeey_cpt() {
	$labels = array(
	'name'               => __( 'Shared-Myzeey' ),
	'singular_name'      => __( 'Shared-Myzeey' ),
	'add_new'            => __( 'Add New Shared-Myzeey' ),
	'add_new_item'       => __( 'Add New Shared-Myzeey' ),
	'edit_item'          => __( 'Edit Shared-Myzeey' ),
	'new_item'           => __( 'New Shared-Myzeey' ),
	'all_items'          => __( 'All Shared-Myzeey' ),
	'view_item'          => __( 'View Shared-Myzeey' ),
	'search_items'       => __( 'Search Shared-Myzeey' ),
	'featured_image'     => 'Feature Image',
	'set_featured_image' => 'Add Feature Image'
	);
	$args = array(
	'labels'            => $labels,
	'description'       => '',
	'public'            => true,
	'menu_position'     => 5,
	'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
	'has_archive'       => true,
	'show_in_admin_bar' => true,
	'show_in_nav_menus' => true,
	'query_var'         => true,
	);
register_post_type( 'shared-myzeey', $args);
}

add_filter( 'posts_where', 'qirolab_posts_where', 10, 2 );
function qirolab_posts_where( $where, &$wp_query )
{
    global $wpdb;
    if ( $title = $wp_query->get( 'search_title' ) ) {
        $where .= " AND " . $wpdb->posts . ".post_title LIKE '" . esc_sql( $wpdb->esc_like( $title ) ) . "%'";
    }
    return $where;
}

add_action('wp_ajax_load_more', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more', 'load_more_posts');

function load_more_posts() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'load_more_nonce')) {
        exit;
    }

    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    $post_type = $args['post_type'];

    query_posts( $args );

    if (have_posts()):
        while (have_posts()) : the_post();
            ?>
				<div class="cell <?php echo get_field("size", get_the_ID()); ?>">
					<a href="<?php the_permalink(); ?>">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>">
						<div class="blog-desc-main <?php echo get_field("color", get_the_ID()); ?>">
							<h5 class="blog-desc-heading"><?php the_title(); ?></h5>
							<a href="<?php the_permalink(); ?>" class="blog-desc-link">Read article </a>
						</div>
					</a>
				</div>
			<?php 
        endwhile;
    endif;

    die;
}

add_action( 'wp_footer', 'contact_form_sent' );

function contact_form_sent() {
?>
	<script type="text/javascript">
		document.addEventListener( 'wpcf7mailsent', function( event ) {
			jQuery('.wpcf7-form').removeClass('init');
		    setTimeout(function(){
	  			jQuery('.wpcf7-form').removeClass('sent').addClass('init');
			}, 5000); 
		}, false );
	</script>
<?php
}