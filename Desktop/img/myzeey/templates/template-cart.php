<?php
/* template name: Cart */
session_start();
// if( empty($_SESSION))
// {
//     session_destroy();
//     wp_redirect( site_url("buy-now"), 302 ); die;
// }
get_header();
// echo '<pre>';
// print_r(WC()->cart->get_cart());
// die();
if(count(WC()->cart->get_cart()) == 0)
{
    session_destroy();
    ?>
    <!-- Cart -->
    <section class="bg-light-gray pt-40 pb-70 cart-section">
            <div class="container">
                <div class="row">
                    <div class="w-70" data-aos="fade-left">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-blue">Your cart is currently empty.</h3>
                                <a href="<?php echo site_url("buy-now");?>">Return to shop</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end Cart -->
    <?php
}
else {
        
        // $searchname         = trim($_SESSION["fname"]);
        // $nameandmessage     = trim($_SESSION["searchname"]);
        // //$hcharmprice        = trim($_SESSION["hcharmprice"]);
        // $htotalprice        = trim($_SESSION["htotalprice"]);
        // $hbeadingtype       = $_SESSION["hbeadingtype"];
        // $hcharmtype         = $_SESSION["hcharmtype"];
        //echo '<pre>';
        
        ?>
    
        <!-- Cart -->
        <section class="bg-light-gray pt-40 pb-70 cart-section">
            <div class="container">
                <div class="row">
                    <div class="w-70" data-aos="fade-left">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-blue">Shopping Cart</h3>
                            </div>
                        </div>
                        <div class="shopping-cart-list-main">
                            <ul>
                                <?php 
                                $cart_total_price = 0;
                                // echo '<pre>';
                                // print_r(WC()->cart->get_cart());
                                // die();
                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                    $_product = $cart_item; 
                                    $_productObj = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
									$itemKey = $cart_item["key"];
                                    $variation_id = $_product['variation_id'];
                                    $product_id = $_product['product_id'];
                                    if($product_id =="")
                                    {
                                        $product_id = $variation_id;
                                    }
                                    $productDetail = $_product['data'];
                                    
                                    $searchname         = $_product["searchname"];
                                    $nameandmessage     = $_product["nameandmessage"];
                                    $htotalprice        = $_product["htotalprice"];
                                    $hbeadingtype       = $_product["hbeadingtype"];
                                    $hcharmtype         = $_product["hcharmtype"];
                                    $cart_total_price   += $htotalprice;
                                      ?>
                                    
                                    <li>
                                    <div class="shopping-cart1 shopping-cart-img">
                                        <?php 
                                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );
                                           echo '<img src="'.$image[0].'">';
                                        ?>
                                    </div>
                                    <div class="shopping-cart2">
                                        <div class="shopping-cart-flex">
                                            <div class="shopping-cart-left">
                                                <h6 class="shopping-cart-title">
                                                    <?php echo $productDetail->get_name() ." x " .$cart_item['quantity']; ?> 
                                                </h6>
                                                <?php
                                                    if( $nameandmessage != "" && $product_id == 280 )
                                                    {
                                                        ?>
                                                            <div class="shopping-cart-sub-title">Message: <?php echo $nameandmessage; ?></div>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="shopping-cart-right">
                                                <?php if($product_id == 280 ) {?>
                                                    <div class="single-row-price-link">
                                                        <div class="shopping-cart-price"><?php echo get_woocommerce_currency_symbol().number_format($htotalprice,2); ?></div>
                                                        <?php  $editURL = site_url( "edit-cart" ). "/?key=".$cart_item_key;  ?>
                                                        <div><a href="<?php echo $editURL; ?>" class="shopping-cart-edit-link">Edit</a></div>
                                                        <?php /*echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                            'woocommerce_cart_item_remove_link',
                                                            sprintf(
                                                                '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                                esc_html__( 'Remove this item', 'woocommerce' ),
                                                                esc_attr( $product_id ),
                                                                esc_attr( $_productObj->get_sku() )
                                                            ),
                                                            $cart_item_key
                                                        ); */ ?> 
                                                        <div><a href="javascript:void(0)" class="shopping-cart-remove-item-link" data="<?php echo $itemKey;?>">Remove Item</a></div>
                                                    </div>
                                                <?php } else {?>
                                                    <div class="single-row-price-link">
                                                        <div class="shopping-cart-price"><?php echo WC()->cart->get_product_price( $productDetail ); ?></div>
                                                        <div><?php echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                            'woocommerce_cart_item_remove_link',
                                                            sprintf(
                                                                '<a href="%s" class="" aria-label="%s" data-product_id="%s" data-product_sku="%s">Remove Item</a>',
                                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                                esc_html__( 'Remove this item', 'woocommerce' ),
                                                                esc_attr( $product_id ),
                                                                esc_attr( $_productObj->get_sku() )
                                                            ),
                                                            $cart_item_key
                                                        );  ?> </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php
                                        if( ! empty($hcharmtype) && $product_id == 280 ){                                 
                                            ?>
                                                <div class="shopping-cart-flex">
                                                    <div class="shopping-cart-left">
                                                        <div class="shopping-cart-sub-title2">Selected charms:</div>
                                                    </div>
                                                    <div class="shopping-cart-right">
                                                    <ul class="shopping-cart-img-list shopping-cart-img-list-bg-diffrent">
                                                            <?php
                                                                $loop = 0;
                                                                foreach( $hcharmtype as $hcharmtypeList )
                                                                {
                                                                    if( have_rows('acf_pc_charm_listing', 280 ) ):
                                                                        while( have_rows('acf_pc_charm_listing' , 280 ) ) : the_row();
                                                                        $acf_pc_type_image = get_sub_field('acf_pc_type_image', 280 );
                                                                        $acf_pc_type_name = get_sub_field('acf_pc_type_name', 280 );
                                                                        $acf_pc_type_price = get_sub_field('acf_pc_type_price', 280 );
                                                                    ?>
                                                                    <?php 
                                                                        if($hcharmtypeList == $acf_pc_type_name):?>
                                                                            <li>                                                          
                                                                                <img src="<?php echo $acf_pc_type_image; ?>" title="<?php echo $hcharmtypeList; ?>">
                                                                                <div class="close-arrow">
                                                                                    <a href="javascript:void(0)" class="charmclose" title="<?php echo $acf_pc_type_name?>" price="<?php echo $acf_pc_type_price;?>" data="<?php echo $itemKey;?>"  data-loopnumber="<?php echo $loop; ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                                </div>
                                                                            </li>
                                                                        <?php endif;?>
                                                                    <?php 
                                                                        endwhile;
                                                                        // No value.
                                                                        else :
                                                                            // Do something...
                                                                        endif;
                                                                    ?>
                                                                    <?php
                                                                    $loop++;
                                                                }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                        if( ! empty($hbeadingtype) && $product_id == 280){
                                            //echo "<pre>"; print_r($hbeadingtype); die;
                                            ?>
                                                <div class="shopping-cart-flex">
                                                    <div class="shopping-cart-left">
                                                        <div class="shopping-cart-sub-title2">Selected beading:</div>
                                                    </div>
                                                    <div class="shopping-cart-right">
                                                    <ul class="shopping-cart-img-list">
                                                            <?php
                                                                $loop = 0;
                                                                foreach( $hbeadingtype as $hbeadingtypeList )
                                                                {
                                                                    if( have_rows('acf_pb_beading_type_listing', 280 ) ):
                                                                        while( have_rows('acf_pb_beading_type_listing' , 280 ) ) : the_row();
                                                                        $acf_pb_btl_type_image = get_sub_field('acf_pb_btl_type_image', 280 );
                                                                        $acf_pb_btl_type_name = get_sub_field('acf_pb_btl_type_name', 280 );
                                                                        $acf_pb_btl_type_price = get_sub_field('acf_pb_btl_type_price', 280 );
                                                                    ?>
                                                                    <?php 
                                                                        if($hbeadingtypeList == $acf_pb_btl_type_name):?>
                                                                        <li>
                                                                            <img src="<?php echo $acf_pb_btl_type_image; ?>" title="<?php echo $hbeadingtypeList; ?>">
                                                                            <div class="close-arrow">
                                                                                <a href="javascript:void(0)" class="beadingclose" data="<?php echo $itemKey;?>" title="<?php echo $acf_pb_btl_type_name;?>"  data-loopnumber="<?php echo $loop; ?>" price="<?php echo $acf_pb_btl_type_price;?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                            </div>
                                                                        </li>
                                                                    <?php endif;?>
                                                                    <?php 
                                                                        endwhile;
                                                                        // No value.
                                                                        else :
                                                                            // Do something...
                                                                        endif;
                                                                    ?>
                                                                    <?php
                                                                    $loop++;
                                                                }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </li>
                                 
                                <?php
                                }  
                                ?>
                            
                            </ul>
                        </div>
                    </div>
                    <div class="w-30" data-aos="fade-right">
                        <div class="row equal">
                            <div class="col-lg-12 col-md-6">
                                <div class="right-white-box">
                                    <table>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td><?php wc_cart_totals_subtotal_html(); ?><?php //echo get_woocommerce_currency_symbol().number_format($htotalprice,2); ?></td>
                                        </tr>
                                        <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                                        <tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                            <td><?php wc_cart_totals_coupon_label( $coupon ); ?></td>
                                            <td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                                            <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>
                                            <?php wc_cart_totals_shipping_html(); ?>
                                            <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>
                                        <?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>
                                            <tr class="shipping">
                                                <td><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></td>
                                                <td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php
                                        if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
                                            $taxable_address = WC()->customer->get_taxable_address();
                                            $estimated_text  = '';
                                            if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
                                                /* translators: %s location. */
                                                $estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
                                            }
                                            if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
                                                foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                                                    ?>
                                                    <tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                                        <td><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
                                                        <td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr class="tax-total">
                                                    <td><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
                                                    <td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>
                                        <tr class="order-total">
                                            <td><?php esc_html_e( 'Total', 'woocommerce' ); ?></td>
                                            <td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="right-white-box cmt-5">
                                    <p>Accepted payment methods</p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/payment.png" class="payment-method-img" alt="payment">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="right-white-box cmt-5">
                                    <a href="<?php echo site_url()?>/buy-now/" class="link-style-hover-blue-bg link-border-light-gray text-center">Get more Zeey!</a>
                                    <a href="<?php echo wc_get_checkout_url(); ?>" class="link-style-hover-blue-bg green text-center">Checkout</a>
                                    <?php //echo do_shortcode( '[add_to_cart id="'.$hproductid.'"]', false); ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end Cart -->
    <?php
    }
    get_footer();
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            jQuery("body").on('click', '.charmclose', function(event) {
                event.preventDefault();
                let removeid = jQuery(this).attr('data-loopnumber');
                let itemkey = jQuery(this).attr('data');
                let price = jQuery(this).attr('price');
                let title = jQuery(this).attr('title');
                let curObj = jQuery(this);
                jQuery.ajax({
                    type:    "POST",
                    url:     '<?php echo admin_url( 'admin-ajax.php' ); ?>',
                    dataType: 'html',
                    data:    { action:'remove_charmtypefromsession','loopid':removeid, 'cartitemkey':itemkey, 'charmtitle':title, 'charmprice':price },
                    beforeSend:function()
                    {
                    },
                    success: function(data,response)
                    {
                        console.log(data);
                        if( response == "success" )
                        {
                            location.reload();
                        }
                    }
            });
            });
            jQuery("body").on('click', '.beadingclose', function(event) {
                event.preventDefault();
                let itemkey = jQuery(this).attr('data');
                let price = jQuery(this).attr('price');
                let title = jQuery(this).attr('title');
                let removeid = jQuery(this).attr('data-loopnumber');
                let curObj = jQuery(this);
                jQuery.ajax({
                    type:    "POST",
                    url:     '<?php echo admin_url( 'admin-ajax.php' ); ?>',
                    dataType: 'html',
                    data:    { action:'remove_beadingtypefromsession','loopid':removeid, 'cartitemkey':itemkey, 'beadingtitle':title, 'beadingprice':price },
                    beforeSend:function()
                    {
                    },
                    success: function(data,response){
                        //console.log(data);
                        if( response == "success" ){
                            location.reload();
                        }
                    }
            });
            });
            jQuery("body").on('click', '.shopping-cart-remove-item-link', function(event) {
                event.preventDefault();
                /* Act on the event */
                let itemkey = jQuery(this).attr('data');
                let curObj = jQuery(this);
                jQuery.ajax({
                    type:    "POST",
                    url:     '<?php echo admin_url( 'admin-ajax.php' ); ?>',
                    dataType: 'html',
                    data:    { action:'remove_productsfromthecat','cartitemkey':itemkey },
                    beforeSend:function()
                    {
                    },
                    success: function(data,response)
                    {
                        console.log(data)
                        if( response == "success" )
                        {
                            location.reload();
                        }
                    }
            });
            });
        });
    </script>
