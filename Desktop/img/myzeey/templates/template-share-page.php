<?php
/* template name: Share Page */
get_header();
?>
<!-- Share Page -->
<section class="bg-blue share-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center" data-aos="zoom-in">
                <!-- <h3 class="text-white mb-1"><?php the_field('acf_heading'); ?></h3> -->
                <div class="unique-code">
                    <?php $latest_cpt = get_posts("post_type=shared-myzeey&numberposts=1");?>
                    <?php 
                        
                       $args = array(  
                           'post_type' => 'shared-myzeey',
                           'post_status' => 'publish',
                           'posts_per_page' => 1, 
                       );
                       $loop = new WP_Query( $args ); 
                       while ( $loop->have_posts() ) : $loop->the_post();
                   ?>
                    
                    <p>Your unique share code is: <span><?php the_title(); ?></span></p>
                <?php 
                    endwhile;
                ?>
                </div>
                <p><?php the_field('acf_desc', 22); ?></p>
                <div class="social-icon">
                    <ul>
                        <?php
                        $link1      = get_field('acf_twitter', 22);
                        $link2      = get_field('acf_facebook', 22);
                        $link3      = get_field('acf_linkedin', 22);
                        // print_r($link1);die;
                        $link_url1   = $link1['url'];
                        $link_url2   = $link2['url'];
                        $link_url3   = $link3['url'];
                        ?>
                        <li><a href="<?php echo esc_url( $link_url1 ); ?>"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="<?php echo esc_url( $link_url2 ); ?>"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="<?php echo esc_url( $link_url3 ); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end Share Page -->
<?php
get_footer();
?>