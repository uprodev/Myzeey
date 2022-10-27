<?php
/* template name: Checkout */

get_header();
?>

<!-- Checkout -->
<section class="bg-light-gray pt-40 pb-70 checkout-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-blue">Checkout</h3>
            </div>
        </div>
        <div class="row">
            <div class="w-70" data-aos="fade-left">
                <div class="left-white-box">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-5 col-lg-4">
                            <div class="discount-code-heading">Have a discount code?</div>
                        </div>
                        <div class="col-md-7 col-lg-8 ">
                           <div class="discount-code-from">
                                <form>
                                    <div class="from-group">
                                        <input type="text" class="from-control" name="couponcode" placeholder="Coupon code">
                                    </div>
                                    <div class="from-group">
                                        <input type="Submit" value="Apply" class="from-button">
                                    </div>
                                </form>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="left-white-box checkout-form cmt-5">
                    <form>
                        <div class="row">
                            <div class="checkout-left-heading">Your Info</div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="fname" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="lname" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="phoneno" placeholder="Phone Number">
                                </div>
                            </div>
                            <hr>
                            <div class="checkout-left-heading">Your Info</div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="address1" placeholder="Address Line 1">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="address2" placeholder="Address Line 2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="City" placeholder="City">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="Country" placeholder="Country">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="Country" placeholder="Country">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="Postcode" placeholder="Postcode">
                                </div>
                            </div>
                            <hr>
                            <div class="d-md-flex align-items-center justify-content-between">
                                <div class="checkout-left-heading">Your Info</div>
                                <div class="from-group same-shipping-checkbox">
                                    <label class="same-shipping-checkbox-label">Same as shipping
                                      <input type="checkbox">
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="d-md-flex align-items-center justify-content-between cmb-5">
                                <div class="checkout-left-heading">Payment Information</div>
                                 <img src="<?php echo get_template_directory_uri(); ?>/assets/images/payment.png" class="payment-method-img max-w-215" alt="payment">
                            </div>
                            <div class="col-md-12">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="cardname" placeholder="Name on card">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="from-group">
                                    <input type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" maxlength="19" class="from-control" name="cardnumber" placeholder="Card number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="expirydate" placeholder="Expiry date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input type="text" class="from-control" name="Postcode" placeholder="Postcode">
                                </div>
                            </div>
                            <div class="col-12 contact-us-btn">
                                <input type="Submit" value="Pay £102.99" class="from-button">
                                <div class="button-with-privacy">By completing this purchase you agree to both our <a href="#">privacy policy</a> and <a href="#">terms & conditions.</a></div>
                            </div>
                        </div>
                    </form>
                </div>   
            </div>
            <div class="w-30" data-aos="fade-right">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="right-white-box">
                            <div class="d-flex justify-content-between">
                                <div class="right-heading">Items in order</div>
                                <a href="#" class="shopping-cart-edit-link">Edit</a>
                            </div>
                            <hr class="heading-border-bottom">
                            <div class="checkout-items-list">
                                <ul>
                                    <li>
                                        <div class="checkout-items-col1">
                                             <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cart-img.png" alt="checkout img">
                                        </div> 
                                        <div class="checkout-items-col2">
                                             <h6 class="shopping-cart-title">MyLeedy</h6>
                                             <div class="shopping-cart-sub-title">Message: Matty’s Zeey</div>
                                            <div class="shopping-cart-sub-title">X 4 charms</div>
                                            <div class="shopping-cart-sub-title">X 4 beading</div>
                                        </div>
                                        <div class="checkout-items-col3">
                                            <div class="shopping-cart-price">£49.99</div>
                                        </div>   
                                    </li>
                                    <li>
                                        <div class="checkout-items-col1">
                                             <img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/charm1.png" alt="checkout img">
                                        </div> 
                                        <div class="checkout-items-col2">
                                             <h6 class="shopping-cart-title">MyLeedy</h6>
                                             <div class="shopping-cart-sub-title">Message: Matty’s Zeey</div>
                                            <div class="shopping-cart-sub-title">X 4 charms</div>
                                            <div class="shopping-cart-sub-title">X 4 beading</div>
                                        </div>
                                        <div class="checkout-items-col3">
                                            <div class="shopping-cart-price">£49.99</div>
                                        </div>   
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="right-white-box cmt-5">
                            <table>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>£99.98</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>+ £23.00</td>
                                </tr>
                                 <tr>
                                    <td>Total</td>
                                    <td>£102.99</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end Checkout -->

<?php
get_footer();
?>



