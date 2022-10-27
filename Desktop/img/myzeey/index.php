<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
get_header();
?>
<section class="bg-light-gray pt-40 pb-70 contact-us-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-blue"><?php the_title(); ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="w-70" data-aos="fade-left">
                <div class="left-white-box contact-form">
                   <?php the_content; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- site-content -->
<?php
get_footer();
