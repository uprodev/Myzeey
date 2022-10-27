<?php
session_start();
if(isset($_GET['key'])){
    $itemkey = $_GET['key'];
}

if( isset($_POST['fsubmit']) )
{  
    $_SESSION['hcharmtype'] = $_POST["charmtype"];
    $_SESSION['hbeadingtype'] = $_POST["beadingtype"];
    $_SESSION['searchname'] = $_POST["searchname"];
    $_SESSION['fname']      = $_POST["fname"];
    $_SESSION['htotalprice'] = $_POST["htotalprice"];

    $woocommerce->cart->cart_contents[$itemkey]['hcharmtype'] = $_SESSION['hcharmtype'];
    $woocommerce->cart->cart_contents[$itemkey]['hbeadingtype'] = $_SESSION['hbeadingtype'];
    $woocommerce->cart->cart_contents[$itemkey]['searchname'] = $_SESSION['searchname'];
    $woocommerce->cart->cart_contents[$itemkey]['nameandmessage'] = $_SESSION['fname'];
	$woocommerce->cart->cart_contents[$itemkey]['htotalprice'] = $_SESSION['htotalprice'];
	$woocommerce->cart->cart_contents[$itemkey]['cartitemprice'] = $_SESSION['htotalprice'];
    $woocommerce->cart->cart_contents[$itemkey]['variation']['attribute_pa_clasp'] = $_POST["clasptype"]; 
    $woocommerce->cart->cart_contents[$itemkey]['variation']['attribute_pa_braiding_one'] = $_POST["clasptype_braiding_one"];
    $woocommerce->cart->cart_contents[$itemkey]['variation']['attribute_pa_braiding_two'] = $_POST["clasptype_braiding_two"];
    $woocommerce->cart->cart_contents[$itemkey]['variation']['attribute_pa_braiding_three'] = $_POST["clasptype_braiding_three"];
    $woocommerce->cart->cart_contents[$itemkey]['variation']['attribute_pa_braiding_four'] = $_POST["clasptype_braiding_four"];
    $woocommerce->cart->set_session();
    
    //WC()->cart->total = $_SESSION["htotalprice"];
    
    $url = wc_get_checkout_url();
    header("Location: $url"); die;
}

$cart_item_content = $woocommerce->cart->get_cart_item($itemkey);
$claps_edit = $cart_item_content['variation']['attribute_pa_clasp'];
$braiding_one_edit = $cart_item_content['variation']['attribute_pa_braiding_one'];
$braiding_two_edit = $cart_item_content['variation']['attribute_pa_braiding_two'];
$braiding_three_edit = $cart_item_content['variation']['attribute_pa_braiding_three'];
$braiding_four_edit = $cart_item_content['variation']['attribute_pa_braiding_four'];
$hcharmtype = $cart_item_content['hcharmtype'];
$hbeadingtype = $cart_item_content['hbeadingtype'];
$searchname = $cart_item_content['searchname'];
$nameandmessage = $cart_item_content['nameandmessage'];
$splitMessage = str_split($nameandmessage);

$charmvalue = array();
if( !empty($hcharmtype) )
{
    foreach( $hcharmtype as $charmlist )
    {
        array_push($charmvalue, $charmlist);
        $countcharm;
    }
}

$beadingvalue = array();
if( ! empty($hbeadingtype) )
{
    foreach($hbeadingtype as $beadinglist )
    {
        array_push($beadingvalue, $beadinglist);
    }
}
/* template name: Edit Cart */
get_header();
$productId = "280";
$product = wc_get_product( $productId );
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.6-rc.1/dist/css/select2.min.css" rel="stylesheet" />
<!-- get page name -->
<div class="get-page-name" style="display:none">
    <?php the_title(); ?>
</div>
<!-- end get page name -->
<!-- Buy Now -->
<section class="buy-now-section">
    <div class="row">
        <div class="buy-now-left">
            <div class="buy-now-inner">
                <div class="buy-now-img">
                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/left-side.png" class="img-fluid" alt="watch"> -->
                    <div class="buy-now-img-main">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/case-bottom.png" alt="case bottom" class="buynow-case-bottom">
                        <img src="" alt="case top" class="buynow-case-top">
                        <img src="" alt="position1" class="buynow-wire-position buynow-wireposition1">
                        <img src="" alt="position2" class="buynow-wire-position buynow-wireposition2">
                        <img src="" alt="position3" class="buynow-wire-position buynow-wireposition3">
                        <img src="" alt="position4" class="buynow-wire-position buynow-wireposition4">

                        <ul class="type-latter-show">
                            <li class="latter-img1" <?php echo ($splitMessage[0] != '') ? "style='display:block;'" : ''; ?>><img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/<?php echo ($splitMessage[0] != '') ? strtolower($splitMessage[0]).'.png' : ''; ?>"></li>
                            <li class="latter-img2" <?php echo ($splitMessage[1] != '') ? "style='display:block;'" : ''; ?>><img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/<?php echo ($splitMessage[1] != '') ? strtolower($splitMessage[1]).'.png' : ''; ?>"></li>
                            <li class="latter-img3" <?php echo ($splitMessage[2] != '') ? "style='display:block;'" : ''; ?>><img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/<?php echo ($splitMessage[2] != '') ? strtolower($splitMessage[2]).'.png' : ''; ?>"></li>
                            <li class="latter-img4" <?php echo ($splitMessage[3] != '') ? "style='display:block;'" : ''; ?>><img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/<?php echo ($splitMessage[3] != '') ? strtolower($splitMessage[3]).'.png' : ''; ?>"></li>
                            <li class="latter-img5" <?php echo ($splitMessage[4] != '') ? "style='display:block;'" : ''; ?>><img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/<?php echo ($splitMessage[4] != '') ? strtolower($splitMessage[4]).'.png' : ''; ?>"></li>
                            <li class="latter-img6" <?php echo ($splitMessage[5] != '') ? "style='display:block;'" : ''; ?>><img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/<?php echo ($splitMessage[5] != '') ? strtolower($splitMessage[5]).'.png' : ''; ?>"></li>  
                            <li class="latter-img7" <?php echo ($splitMessage[6] != '') ? "style='display:block;'" : ''; ?>><img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/<?php echo ($splitMessage[6] != '') ? strtolower($splitMessage[6]).'.png' : ''; ?>"></li>
                            <li class="latter-img8" <?php echo ($splitMessage[7] != '') ? "style='display:block;'" : ''; ?>><img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/<?php echo ($splitMessage[7] != '') ? strtolower($splitMessage[7]).'.png' : ''; ?>"></li>
                            <li class="latter-img9" <?php echo ($splitMessage[8] != '') ? "style='display:block;'" : ''; ?>><img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/<?php echo ($splitMessage[8] != '') ? strtolower($splitMessage[8]).'.png' : ''; ?>"></li>
                            <li class="latter-img10" <?php echo ($splitMessage[9] != '') ? "style='display:block;'" : ''; ?>><img src="<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/<?php echo ($splitMessage[9] != '') ? strtolower($splitMessage[9]).'.png' : ''; ?>"></li>
                            
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="buy-now-right" id="style-1">
            <form action="<?php echo site_url();?>/edit-cart/?key=<?php echo $itemkey;?>" method="POST" id="buynowform">
                <div class="buy-now-right-box">
                    <div class="number-style"><span>1.</span></div>
                    <h6 class="buy-now-right-heading">What’s your Zeey?</h6>
                    <div class="buy-now-right-box-desc">
                        <p>Your Zeey, your cable, the heart of MyLeedy</p>    
                    </div>
                    
                    <div class="buy-now-search-form">
                        <div>
                            <div class="from-group">
                                <select id="messagename" class="from-control js-example-basic-single" name="searchname">
                                    <option value="0">Search</option>
                                    <?php 
                                        if( have_rows('acf_pl_search_name_listing', 280) ):
                                            while( have_rows('acf_pl_search_name_listing', 280) ) : the_row();
                                                echo '<option value="'.strtolower(get_sub_field('acf_snl_search_listing_name')).'">'.get_sub_field('acf_snl_search_listing_name').'</option>';
                                            endwhile;
                                        endif;
                                    ?>
                                </select>

                                <!-- <input type="text" class="from-control" name="searchname" placeholder="Search" value="<?php echo $searchname; ?>" id="messagename">
                                <button><i class="fa fa-search"></i></button> -->
                            </div>
                            <div class="searchresult searchresult-show"></div>
                            <div class="error-msg-alert-search">Please fill the Search</div>
                        </div>
                    </div>
                    <div class="search-after-display" style="display: block;">
                        High 5! You're good to go.
                    </div>
                    <div class="search-after-display clear-text-box key-up-show-text" style="display: block;">
                        Change Selection
                    </div>
                    <?php 
                    $searchhide = "";
                    if( isset($_SESSION['searchname'])  && !empty($_SESSION['searchname'] ) ) {
                        $searchhide = "hide-link-your-phone";   
                    }
                    ?>
                    <a href="#" class="textred open-model <?php echo $searchhide; ?>" >
                        Can’t find your phone?
                    </a>
                </div>
                <div class="buy-now-right-box">
                    <h6 class="buy-now-right-heading">Got a share code?</h6>
                    <div class="buy-now-right-box-desc">
                        <p>You can load a previous design that you or a friend has created here</p>
                    </div>
                    <a href="#" class="buy-now-link-style open-model-load-design">Load design</a>
                    <div class="buy-now-down-arrow"><i class="fa fa-chevron-down"></i></div>
                </div>
                <div class="buy-now-right-box2 scroll-dwon-stop">
                    <div class="number-style"><span>2.</span></div>
                    <h6 class="buy-now-right-heading">Clasp</h6>
                    <div class="custom-radio">
                        <ul class="color-piker clasp-section">
                            <?php
                                $clasp_terms = get_terms( array(
                                    'taxonomy' => 'pa_clasp',
                                    'hide_empty' => false,
                                ) );
                                foreach($clasp_terms as $clasp_terms_list){
                                    $color_code = get_term_meta( $clasp_terms_list->term_id, 'acf_ct_color_code', true );
                                    $color_image = get_field('add_clasp_image', $clasp_terms_list);
                                    $color_image_back = get_field('add_clasp_back_image', $clasp_terms_list);
                                    $default = ""; 
                                    if($clasp_terms_list->slug == $claps_edit ){
                                        $default = 'checked="checked"';
                                    }
                                    ?>
                                    <li>
                                        <div class="lengend-action-buttons">
                                            <label >
                                                <input type="radio" name="clasptype" <?php echo $default;?> class="getpriceajax" value="<?php echo $clasp_terms_list->slug; ?>">
                                                <span name="clasptype" class="clasptype getpriceajax <?php echo $clasp_terms_list->slug; ?>" data-actualname="<?php echo $clasp_terms_list->name; ?>"  data-name="<?php echo $clasp_terms_list->slug; ?>" data-src="<?php echo $color_image; ?>,<?php echo $color_image_back;?>">
                                                    <style>
                                                        ul.color-piker li span.<?php echo $clasp_terms_list->slug; ?>:after{
                                                            background: <?php echo $color_code; ?>;
                                                        }
                                                    </style>
                                                </span>
                                            </label>
                                        </div>
                                    </li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="current-color">Midnight Blue</div>
                    <div class="error-msg-alert">Please select one clasp colour</div>
                </div>
                <div class="buy-now-right-box2">
                    <div class="number-style"><span>3.</span></div>
                    <h6 class="buy-now-right-heading">Braiding</h6>
                    <div class="buy-now-right-box-desc">
                        <p>Select 4 colours below to form the colour of your braiding</p>
                    </div>
                    
                    <!-- tab -->
                    <div class="tab">
                        <ul class="tabs">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        </ul>
    
                        <div class="tab_content">
                            <div class="custom-radio"> 
                                <div class="tabs_item">
                                    <ul class="color-piker">
                                        <?php
                                            $braiding_one = get_terms( array(
                                                'taxonomy' => 'pa_braiding_one',
                                                'hide_empty' => false,
                                            ) );
                                            foreach($braiding_one as $braiding_one_list)
                                            {
                                                $color_code = get_term_meta( $braiding_one_list->term_id, 'acf_ct_color_code', true );
                                                $braiding_one_color_image = get_field('add_braiding_one_image', $braiding_one_list);
                                                $default = ""; 
                                                if($braiding_one_list->slug == $braiding_one_edit){
                                                    $default = 'checked="checked"';
                                                }
                                                ?>
                                                <li>
                                                    <div class="lengend-action-buttons">
                                                        <label>
                                                            <input type="radio" name="clasptype_braiding_one" class="getpriceajax" value="<?php echo $braiding_one_list->slug; ?>" <?php echo $default;?>>
                                                            <span name="clasptype" class="clasptype_braiding_one getpriceajax <?php echo $braiding_one_list->slug; ?>" data-name="<?php echo $braiding_one_list->slug; ?>" data-src="<?php echo $braiding_one_color_image; ?>">
                                                                <style>
                                                                    ul.color-piker li span.<?php echo $braiding_one_list->slug; ?>:after{
                                                                        background: <?php echo $color_code; ?>;
                                                                    }
                                                                </style>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                    <div class="error-msg-alert1">Please select one colour from Tab 1</div>
                                </div>
                                <div class="tabs_item">
                                    <ul class="color-piker">
                                        <?php
                                            $braiding_two = get_terms( array(
                                                'taxonomy' => 'pa_braiding_two',
                                                'hide_empty' => false,
                                            ) );
                                            foreach($braiding_two as $braiding_two_list)
                                            {
                                                $color_code = get_term_meta( $braiding_two_list->term_id, 'acf_ct_color_code', true );
                                                $braiding_two_color_image = get_field('add_braiding_two_image', $braiding_two_list);

                                                $default = ""; 
                                                if($braiding_two_list->slug == $braiding_two_edit){
                                                    $default = 'checked="checked"';
                                                }
                                                ?>
                                                <li>
                                                    <div class="lengend-action-buttons">
                                                        <label>
                                                            <input type="radio" name="clasptype_braiding_two"  class="getpriceajax" value="<?php echo $braiding_two_list->slug; ?>" <?php echo $default;?>>
                                                            <span name="clasptype" class="clasptype_braiding_two getpriceajax <?php echo $braiding_two_list->slug; ?>" data-name="<?php echo $braiding_two_list->slug; ?>" data-src="<?php echo $braiding_two_color_image;?>">
                                                                <style>
                                                                    ul.color-piker li span.<?php echo $braiding_two_list->slug; ?>:after{
                                                                        background: <?php echo $color_code; ?>;
                                                                    }
                                                                </style>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                     <div class="error-msg-alert2">Please select one colour from Tab 2</div>
                                </div>
                                <div class="tabs_item">
                                    <ul class="color-piker">
                                        <?php
                                            $braiding_three = get_terms( array(
                                                'taxonomy' => 'pa_braiding_three',
                                                'hide_empty' => false,
                                            ) );
                                            foreach($braiding_three as $braiding_three_list)
                                            {
                                                $color_code = get_term_meta( $braiding_three_list->term_id, 'acf_ct_color_code', true );
                                                $braiding_three_color_image = get_field('add_braiding_three_image', $braiding_three_list);
                                                $default = ""; 
                                                if($braiding_three_list->slug == $braiding_three_edit){
                                                    $default = 'checked="checked"';
                                                }
                                                ?>
                                                <li>
                                                    <div class="lengend-action-buttons">
                                                        <label>
                                                            <input type="radio" name="clasptype_braiding_three"  class="getpriceajax" value="<?php echo $braiding_three_list->slug; ?>" <?php echo $default;?>>
                                                            <span name="clasptype" class="clasptype_braiding_three getpriceajax <?php echo $braiding_three_list->slug; ?>" data-name="<?php echo $braiding_three_list->slug; ?>" data-src="<?php echo $braiding_three_color_image;?>">
                                                                <style>
                                                                    ul.color-piker li span.<?php echo $braiding_three_list->slug; ?>:after{
                                                                        background: <?php echo $color_code; ?>;
                                                                    }
                                                                </style>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                    <div class="error-msg-alert3">Please select one colour from Tab 3</div>
                                </div>    
                                <div class="tabs_item">                                    
                                    <ul class="color-piker">
                                        <?php
                                            $braiding_four = get_terms( array(
                                                'taxonomy' => 'pa_braiding_four',
                                                'hide_empty' => false,
                                            ) );
                                            foreach($braiding_four as $braiding_four_list)
                                            {
                                                $color_code = get_term_meta( $braiding_four_list->term_id, 'acf_ct_color_code', true );
                                                $braiding_four_color_image = get_field('add_braiding_four_image', $braiding_four_list);
                                                $default = ""; 
                                                if($braiding_four_list->slug == $braiding_four_edit){
                                                    $default = 'checked="checked"';
                                                }
                                                ?>
                                                    <li>
                                                    <div class="lengend-action-buttons">
                                                        <label>
                                                            <input type="radio" name="clasptype_braiding_four"  class="getpriceajax" value="<?php echo $braiding_four_list->slug; ?>" <?php echo $default;?>>
                                                            <span name="clasptype" class="clasptype_braiding_four getpriceajax <?php echo $braiding_four_list->slug; ?>" data-name="<?php echo $braiding_four_list->slug; ?>" data-src="<?php echo $braiding_four_color_image;?>">
                                                                <style>
                                                                    ul.color-piker li span.<?php echo $braiding_four_list->slug; ?>:after{
                                                                        background: <?php echo $color_code; ?>;
                                                                    }
                                                                </style>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                    <div class="error-msg-alert4">Please select one colour from Tab 4</div>
                                </div>                  
                            </div>
                        </div>
                    </div>
                    <!-- end tab -->
                </div>
                <div class="buy-now-right-box3">
                    <div class="number-style"><span>4.</span></div>
                    <h6 class="buy-now-right-heading">Make it yours</h6>
                    <div class="buy-now-right-box-desc">
                        <p>Add your name or a message</p>    
                    </div>
                    <div class="buy-now-form2">
                        <div>
                            <div class="from-group">
                                <input type="text" class="from-control getpriceajax" name="fname" placeholder="Max. 10 characters" value="<?php echo $nameandmessage; ?>" id="fname">
                                <!-- <button>Submit</button> -->
                            </div>
                            <div class="error-msg-alert-fname">Add your name or a message</div>
                        </div>
                    </div>
                </div>
                <div class="buy-now-right-box4">
                    <div class="number-style"><span>5.</span></div>
                    <h6 class="buy-now-right-heading">Add your beading</h6>
                    <div class="buy-now-right-box-desc">
                        <p>You can select up to 3</p>    
                    </div>
                    <div class="from-checkbox">
                        <ul class="img-list-create">
                            <?php
                                $beadingtotalprice = 0;
                                if( have_rows('acf_pb_beading_type_listing', $productId) ):
                                    while( have_rows('acf_pb_beading_type_listing', $productId) ) : the_row();
                                   
                                    if( ! empty($beadingvalue) && in_array(get_sub_field("acf_pb_btl_type_name"), $beadingvalue) ) { 
                                        
                                        $checked = "checked"; 
                                        $beadingprice = get_sub_field('acf_pb_btl_type_price');
                                        $beadingtotalprice = $beadingtotalprice + $beadingprice;
                                    }else{
                                        $checked = "";
                                        $beadingprice = '';
                                    }
                                        ?>
                                            <li>
                                                <div class="currect-arrow">
                                                <div class="from-group same-shipping-checkbox">
                                                        <label class="same-shipping-checkbox-label">
                                                        <img src="<?php echo get_sub_field("acf_pb_btl_type_image"); ?>">
                                                        <input type="checkbox" name="beadingtype[]" class="beadingtype getpriceajax" value="<?php echo get_sub_field("acf_pb_btl_type_name"); ?>" data-image="<?php echo get_sub_field("acf_pb_btl_type_image"); ?>"  data-price="<?php echo get_sub_field("acf_pb_btl_type_price"); ?>" <?php echo $checked;?> <?php echo $beadingtotalprice;?>>
                                                        <span name="beadingtype" class="checkmark getpriceajax" data-name="<?php echo get_sub_field("acf_pb_btl_type_name"); ?>" datta-image="<?php echo get_sub_field("acf_pb_btl_type_image"); ?>" data-price="<?php echo get_sub_field("acf_pb_btl_type_price"); ?>"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        
                                    endwhile;
                                endif;
                            ?>
                        </ul>
                        <div class="error-msg-alert-beadingtype">Please sellect Atleast one box</div>
                    </div>
                </div>
                <div class="buy-now-right-box4">
                    <div class="number-style"><span>6.</span></div>
                    <h6 class="buy-now-right-heading">Add some charm</h6>
                    <div class="buy-now-right-box-desc">
                        <p>You can select up to 4</p>    
                    </div>
                    <div class="from-checkbox">
                        <ul class="img-list-create add-some-charm">
                            <?php
                            $charmtotalprice = 0;
                                if( have_rows('acf_pc_charm_listing', $productId) ):
                                    while( have_rows('acf_pc_charm_listing', $productId) ) : the_row();
                                        if( ! empty($charmvalue) && in_array(get_sub_field("acf_pc_type_name"), $charmvalue) ) { 
                                            $checked = "checked"; 
                                            $charmprice = get_sub_field('acf_pc_type_price');
                                            $charmtotalprice = $charmtotalprice + $charmprice;
                                        }else{
                                            $checked = "";
                                            $charmprice = '';
                                        }
                                        ?>
                                            <li>
                                                <div class="currect-arrow">
                                                <div class="from-group same-shipping-checkbox">
                                                        <label class="same-shipping-checkbox-label">
                                                        <img src="<?php echo get_sub_field("acf_pc_type_image"); ?>">
                                                        <input type="checkbox" name="charmtype[]" class="charmtype getpriceajax" value="<?php echo get_sub_field("acf_pc_type_name"); ?>"  data-image="<?php echo get_sub_field("acf_pc_type_image"); ?>" data-price="<?php echo get_sub_field("acf_pc_type_price"); ?>" <?php echo $checked;?> <?php echo $charmtotalprice;?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        //$totalcharm_price += echo get_sub_field("acf_pc_type_price");
                                    endwhile;
                                endif;
                            ?>                        
                        </ul>
                        <div class="error-msg-alert-charmtype">Please sellect Atleast one box</div>
                        <div class="error-msg-alert-only-four">You can select upto 4 Charm type</div>
                    </div>
                </div>
                <div class="buy-now-right-box4 table-design buy-now-mb-8">
                    <h6 class="buy-now-right-heading">Finished?</h6>
                    <div class="buy-now-right-box-desc">
                        <p>You can choose to checkout now, or add this to your cart & style another</p>
                    </div>
                    <table id="pricehtml">
                        <tr>
                            <td>Base Price</td>
                            <td><?php echo wc_price($product->get_price()); ?></td>
                            <?php 
                                $total_edit = 1500;
                                
                            ?>
                        </tr>
                        <tr>
                            <?php 
                                if( !empty($_SESSION['hcharmtype']) )
                                {
                                    $countcharm = 0;
                                    foreach( $_SESSION['hcharmtype'] as $charmlist )
                                    {
                                        array_push($charmvalue, $charmlist);
                                        $countcharm++;
                                    }
                                }
                            ?>
                            <td>Charms x <?php echo $countcharm;?></td>
                            <td>£<?php echo $charmtotalprice;?></td>
                            <?php  $total_edit += $charmtotalprice;
                            ?>
                        </tr>
                        <tr>
                            <?php 
                                $beadingvalue = array();
                                if( ! empty($_SESSION['hbeadingtype']) )
                                {
                                    $countbeading = 0;
                                    foreach( $_SESSION['hbeadingtype'] as $beadinglist )
                                    {
                                        array_push($beadingvalue, $beadinglist);
                                        $countbeading++;
                                    }
                                }
                                ?>
                            <td>Beading x <?php echo $countbeading;?></td>
                            <td>£<?php echo $beadingtotalprice;?></td>
                            <?php $total_edit += $beadingtotalprice;?>
                        </tr> 
                        <tr>
                            <td>MyZeey Total</td>
                            <td>£<?php echo $total_edit;?><?php //echo wc_price($product->get_price()); ?></td>
                        </tr>
                    </table>
                    <!-- <a href="javascript:void(0)" data-baseprice="<?php echo $product->get_price(); ?>" class="link-style-hover-blue-bg bg-green" id="checkoutbtn">Checkout</a> -->
                    <input type="submit" data-baseprice="<?php echo $product->get_price(); ?>" name="fsubmit" class="link-style-hover-blue-bg bg-green" id="checkoutbtn" value="Checkout">
                    <!-- <a href="javascript:void(0)" class="link-style-hover-blue-bg link-border-light-gray">Get more Zeey!</a>
                    <a href="javascript:void(0)" class="link-style-hover-blue-bg link-border-blue"><i class="fa fa-share"></i> Share this design </a> -->
                    <input type="hidden" name="htotalprice" id="htotalprice" value="<?php echo $total_edit;?>">
                    <input type="hidden" name="hcharmprice" id="hcharmprice" value="">
                    <input type="hidden" name="hbeadingprice" id="hbeadingprice" value="">
                </div>
            </form>
        </div>
    </div>
</section>
<!-- end Buy Now -->

<!-- load design  Popup -->
<section class="modal-load-design">
        <div class="modal-overlay modal-toggle"></div>
        <div class="modal-wrapper modal-transition">
            <div class="phone-search-popup-main" data-aos="flip-up">
                <div class="phone-search-popup" >
                    <div class="position-relative">
                        <a href="#" class="close-phone-search-popup close-load-design-popup"><i class="fa fa-times" aria-hidden="true"></i></a>
                        <div class="phone-search-popup-inner-box">
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <h5 class="phone-search-popup-title">Enter your share code below</h5>
                                    <p>
                                    This will populate your zeey with an existing design that someone has created for you.
                                    </p> 
                                    <div class="phone-search-popup-from">
                                    
                                    <form action="<?php echo site_url();?>/load-design" method="POST">
                                       <input type="text" name="loadmoretext" placeholder="Enter your product share code" class="loadmoretext">
                                        <div class="load-design-error">Please fill the textbox</div>
                                        <input type="submit" value="Submit" name="dsubmit" id="load-design-submit" class="mt-4">
                                    </form>
                                    <?php 
                                    ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- end load design  Popup -->

<!-- Phone Search Popup -->
<section class="modal">
    <div class="modal-overlay modal-toggle"></div>
    <div class="modal-wrapper modal-transition">
        <div class="phone-search-popup-main" data-aos="flip-up">
            <div class="phone-search-popup" >
                <div class="position-relative">
                    <a href="#" class="close-phone-search-popup"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <div class="phone-search-popup-inner-box">
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <h5 class="phone-search-popup-title">The dream’s not over yet…</h5>
                                <p>
                                The list of phones we support is growing all the time, we just haven’t got round to yours yet. Let us know which phone you need a MyLeedy for and we might bump you up the queue! We’ll also email you when it’s for sale.
                                </p> 
                                <div class="phone-search-popup-from">
                                
                                    <?php echo do_shortcode('[contact-form-7 id="251" title="Phone Search Popup"]   ') ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end Phone Search Popup -->

<script type="text/javascript">
var getsrcimg = "<?php echo get_template_directory_uri(); ?>/assets/images/buy-now/";
</script>
<?php
get_footer();
?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.6-rc.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {

        jQuery('.js-example-basic-single').select2();

        // Bind an event
        jQuery('.js-example-basic-single').on('select2:select', function (e) { 
            jQuery('.search-after-display').show();
            jQuery(".textred.open-model").hide();
        });

        jQuery (document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });

        var currentName = "<?php echo $searchname ?>";

        $('.js-example-basic-single').val(currentName).trigger('change');
        
        let clasptypevalue  = "",
            searchname      = "",
            nameandmessage  = "",
            beadingtypename = new Array(),
            charmtypename   = new Array(),
            mainprice       = jQuery("#checkoutbtn").attr('data-baseprice'),
            productid       = "<?php echo $productId; ?>";
		
		jQuery('input[name="beadingtype[]"]:checked').each(function(index, el) {
			beadingtypename.push({
				beadname: jQuery(this).val(),
				beadimage: jQuery(this).attr("data-image"),
				beadprice: jQuery(this).attr("data-price"),
			});
		});
		
		jQuery('input[name="charmtype[]"]:checked').each(function(index, el) {
			charmtypename.push({
				charmname: jQuery(this).val(),
				charmimage: jQuery(this).attr("data-image"),
				charmprice: jQuery(this).attr("data-price"),
			});
		});

        jQuery("body").on('change', '.getpriceajax', function(event) {
            event.preventDefault();
			
            beadingtypename = new Array();
            jQuery('input[name="beadingtype[]"]:checked').each(function(index, el) {
                beadingtypename.push({
                    beadname: jQuery(this).val(),
                    beadimage: jQuery(this).attr("data-image"),
                    beadprice: jQuery(this).attr("data-price"),
                });
            });

            charmtypename = new Array();
            jQuery('input[name="charmtype[]"]:checked').each(function(index, el) {
                charmtypename.push({
                    charmname: jQuery(this).val(),
                    charmimage: jQuery(this).attr("data-image"),
                    charmprice: jQuery(this).attr("data-price"),
                });
            });

            if( jQuery(this).attr('name') == "clasptype" ){
                clasptypevalue = jQuery(this).val();
                get_calcualtion_html(productid, mainprice, clasptypevalue, beadingtypename, charmtypename)
            }
            if( jQuery(this).attr('name') == "beadingtype[]" ){
                if( jQuery('input[name="beadingtype[]"]:checked').length <= 3 ){
                    get_calcualtion_html(productid, mainprice, clasptypevalue, beadingtypename, charmtypename)
                } else {
                    $(".error-msg-alert-only-three").show();
                    setTimeout(function() { $(".error-msg-alert-only-three").hide(); }, 3000);   
                    jQuery(this).prop('checked', false);
                    return false;
                }
            }
            if( jQuery(this).attr('name') == "charmtype[]" ){
                if( jQuery('input[name="charmtype[]"]:checked').length <= 4 ){
                    get_calcualtion_html(productid, mainprice, clasptypevalue, beadingtypename, charmtypename);
                } else {
                    $(".error-msg-alert-only-four").show();
                    setTimeout(function() { $(".error-msg-alert-only-four").hide(); }, 3000);   
                    jQuery(this).prop('checked', false);
                    return false;
                }
            }
        });
        // jQuery("body").on('keyup', 'input[name=searchname]', function(event) {
        //     event.preventDefault();
        //         var searchname = $(this).val();
        //         jQuery(".searchresult").html("").hide();

        //         if( searchname.length > 1 ){
        //             jQuery.ajax({
        //                 type:    "POST",
        //                 url:     '<?php echo admin_url( 'admin-ajax.php' ); ?>',
        //                 dataType: 'html',
        //                 data:    { action:'get_search_html', 'searchname':searchname },
        //                 beforeSend:function(){
        //                 },
        //                 success: function(data,response){
        //                     var res = jQuery.parseJSON(data);
        //                     if( response == "success" ){
        //                         if(res.res = "fail"){
        //                             jQuery('.search-after-display').hide();
        //                             jQuery(".textred.open-model").show();
        //                         }
        //                         jQuery(".searchresult").html(res.resHTML).show();
        //                     }
        //                 }
        //            });
        //         }
        //         else
        //         {
        //             jQuery(".searchresult").html("").hide(); 
        //             jQuery('.search-after-display').hide();
        //             jQuery(".textred.open-model").show();   
        //         }
        // });

        jQuery("body").on('click', '.search-box-selected-value li', function(event) {
            jQuery("#messagename").val(jQuery(this).text());
            if(jQuery(this).text() == "No Result Found"){
                jQuery('.search-after-display').hide();
                jQuery(".textred.open-model").show();
            } else {
                jQuery('.search-after-display').show();
                jQuery(".textred.open-model").hide();
            }
        });

        function get_calcualtion_html(productid, mainprice, clasptypevalue, beadingtypename, charmtypename)
        {
            jQuery.ajax({
                type:    "POST",
                url:     '<?php echo admin_url( 'admin-ajax.php' ); ?>',
                dataType: 'json',
                data:    { action:'get_calcualtion_html', 'productid':productid, 'mainprice':mainprice, 'clasptypevalue':clasptypevalue, 'beadingtypename':beadingtypename, 'charmtypename':charmtypename },
                beforeSend:function()
                {
                },
                success: function(data,response)
                {
                    if( response == "success" )
                    {
                        console.log(data.data.total_html);
                        jQuery("#pricehtml").html(data.data.total_html);
                        jQuery('#htotalprice').val(data.data.total_price);
                        return false;
                    }
                }
           });
        }
        // jQuery("body").on('click', '#checkoutbtn', function(event) {
        //     event.preventDefault();
        //     var beadingtypename = new Array();
        //     var charmtypename   = new Array();
        //     var searchname      = jQuery('input[name=searchname]').val();
        //     var nameandmessage  = jQuery('input[name=fname]').val();
        //     jQuery('input[name=beadingtype]:checked').each(function(index, el) {
        //         beadingtypename.push({
        //             beadname: jQuery(this).val(),
        //             beadimage: jQuery(this).attr("data-image"),
        //             beadprice: jQuery(this).attr("data-price"),
        //         });
        //     });
        //     jQuery('input[name=charmtype]:checked').each(function(index, el) {
        //         charmtypename.push({
        //             charmname: jQuery(this).val(),
        //             charmimage: jQuery(this).attr("data-image"),
        //             charmprice: jQuery(this).attr("data-price"),
        //         });
        //     });
            
        //     var baseprice           = jQuery("#basepricesetion").attr('data-baseprice'),
        //     searchname              = jQuery("input[name=searchname]").val(),
        //     nameandmessage          = jQuery("input[name=fname]").val(),
        //     clasptypevalue          = jQuery("input[name=clasptype]").val(),
        //     clasptype_braiding_one  = jQuery("input[name=clasptype_braiding_one]").val(),
        //     clasptype_braiding_two  = jQuery("input[name=clasptype_braiding_two]").val(),
        //     clasptype_braiding_three  = jQuery("input[name=clasptype_braiding_three]").val(),
        //     clasptype_braiding_four  = jQuery("input[name=clasptype_braiding_four]").val();
        //     //get_calcualtion_html(baseprice, clasptypevalue, beadingtypename, charmtypename);
        //     jQuery.ajax({
        //         type:    "POST",
        //         url:     '<?php //echo admin_url( 'admin-ajax.php' ); ?>',
        //         dataType: 'html',
        //         data:    { action:'add_to_cart','productid':productid, 'mainprice':mainprice, 'clasptypevalue':clasptypevalue, 'beadingtypename':beadingtypename, 'charmtypename':charmtypename, 'clasptype_braiding_one':clasptype_braiding_one, 'clasptype_braiding_two':clasptype_braiding_two, 'clasptype_braiding_three':clasptype_braiding_three, 'clasptype_braiding_four':clasptype_braiding_four, 'searchname':searchname, 'nameandmessage':nameandmessage },
        //         beforeSend:function()
        //         {
        //         },
        //         success: function(data,response)
        //         {
        //             //console.log(data); return false;
        //             if( response == "success" && data != 0 )
        //             {
        //                 // jQuery("#addtocartwithattribute").attr('href', data);
        //                 // jQuery("#addtocartwithattribute").click();
        //                 // window.location = data;
        //                 var dataInfo = data.split("######");
        //                 console.log(dataInfo);
        //                 jQuery("#hclasptype").val(dataInfo[12]);
        //                 jQuery("#hclasptype_braiding_four").val(dataInfo[11]);
        //                 jQuery("#hclasptype_braiding_three").val(dataInfo[10]);
        //                 jQuery("#hclasptype_braiding_two").val(dataInfo[9]);
        //                 jQuery("#hclasptype_braiding_one").val(dataInfo[8]);
        //                 jQuery("#hproductid").val(dataInfo[7]);
        //                 jQuery("#hbeadingprice").val(dataInfo[6]);
        //                 jQuery("#hcharmprice").val(dataInfo[5]);
        //                 jQuery("#hsearchname").val(dataInfo[4]);
        //                 jQuery("#hfname").val(dataInfo[3]);
        //                 jQuery("#hbeadingtype").val(dataInfo[1]);
        //                 jQuery("#hcharmtype").val(dataInfo[2]);
        //                 jQuery("#htotalprice").val(dataInfo[0]);
        //                 jQuery("#add2cartbutton").trigger("click");
        //             }
        //             else
        //             {
        //                 console.log("Else");
        //                 jQuery("#addtocartredirect").click();
        //             }
        //         }
        //    });
        // });
        
       jQuery("#checkoutbtn").click(function() {

            var setval = 0;

            if($("input#messagename").val() == '' || $("input#messagename").val() == 'No Result Found'){
                setval = 1;
                $(".error-msg-alert-search").show();
                $("input#messagename").addClass("validation-error-show");
            }else{
                $(".error-msg-alert-search").hide();
                $("input#messagename").removeClass("validation-error-show");
            }
            if($("input#fname").val() == '' || $("input#fname").val().length >= 10 ){
                setval = 1;
                $(".error-msg-alert-fname").show();
                if($("input#fname").length <= 10){ $(".error-msg-alert-fname").text('Max 10 character'); }
                $("input#fname").addClass("validation-error-show");
            }else{
                $(".error-msg-alert-fname").hide();
                $("input#fname").removeClass("validation-error-show");
            }
            if( $('input[name="clasptype"]:checked').length > 0 ){
                $(".error-msg-alert").hide()
                $('input[name="clasptype').removeClass("validation-error-show");
            }else{
                setval = 1;
                $(".error-msg-alert").show();
                $('input[name="clasptype').addClass("validation-error-show");
            }
            if( $('input[name="clasptype_braiding_one"]:checked').length > 0 ){
                $(".error-msg-alert1").hide()
                $('input[name="clasptype_braiding_one').removeClass("validation-error-show");
            }else{
                setval = 1;
                $(".error-msg-alert1").show();
                $('input[name="clasptype_braiding_one').addClass("validation-error-show");
            }
            if( $('input[name="clasptype_braiding_two"]:checked').length > 0 ){
                $(".error-msg-alert2").hide()
                $('input[name="clasptype_braiding_two').removeClass("validation-error-show");
            }else{
                setval = 1;
                $(".error-msg-alert2").show();
                $('input[name="clasptype_braiding_two').addClass("validation-error-show");
            }
            if( $('input[name="clasptype_braiding_three"]:checked').length > 0 ){
                $(".error-msg-alert3").hide()
                $('input[name="clasptype_braiding_three').removeClass("validation-error-show");
            }else{
                setval = 1;
                $(".error-msg-alert3").show();
                $('input[name="clasptype_braiding_three').addClass("validation-error-show");
            }
            if( $('input[name="clasptype_braiding_four"]:checked').length > 0 ){
                $(".error-msg-alert4").hide()
                $('input[name="clasptype_braiding_four').removeClass("validation-error-show");
            }else{
                setval = 1;
                $(".error-msg-alert4").show();
                $('input[name="clasptype_braiding_four').addClass("validation-error-show");
            }
            /*if( $('input[name="charmtype[]"]:checked').length > 0 ){
                $(".error-msg-alert-charmtype").hide()
                $('input[name="charmtype[]"]').removeClass("validation-error-show");
            }else{
                setval = 1;
                $(".error-msg-alert-charmtype").show();
                $('input[name="charmtype[]"]').addClass("validation-error-show");
            }
            if( $('input[name="beadingtype[]"]:checked').length > 0 ){
                $(".error-msg-alert-beadingtype").hide();
                $('input[name="beadingtype[]"]').removeClass("validation-error-show");
            }else{
                setval = 1;
                $(".error-msg-alert-beadingtype").show();
                $('input[name="beadingtype[]"]').addClass("validation-error-show");
            }*/
            if(setval == 1){
                // $(".buy-now-right").animate({ scrollTop: 0 }, 1000);
                $("#buynowform .validation-error-show").first().focus();
                return false;
            }else{
                return true;
            }
        });

        if( jQuery('input[name="clasptype"]:checked').length > 0 ){
            var getimgpath =  jQuery('input[name="clasptype"]:checked').next().attr("data-src");
            var splitimgpath = getimgpath.split(",");
            jQuery(".buynow-case-top").attr("src", splitimgpath[0]).fadeIn();
            jQuery(".buynow-case-bottom").attr("src", splitimgpath[1]);
            jQuery('.current-color').text(jQuery('input[name="clasptype"]:checked').next().attr("data-actualname"));
        }

        if( jQuery('input[name="clasptype_braiding_one"]:checked').length > 0 ){
            var getimgpath = jQuery('input[name="clasptype_braiding_one"]:checked').next().attr("data-src");
            jQuery(".buynow-wireposition1").attr("src", getimgpath).fadeIn();
        }   
        
        if( jQuery('input[name="clasptype_braiding_two"]:checked').length > 0 ){
            var getimgpath = jQuery('input[name="clasptype_braiding_two"]:checked').next().attr("data-src");
            jQuery(".buynow-wireposition2").attr("src", getimgpath).fadeIn();
        };  
        
        if( jQuery('input[name="clasptype_braiding_three"]:checked').length > 0 ){
            var getimgpath = jQuery('input[name="clasptype_braiding_three"]:checked').next().attr("data-src");
            jQuery(".buynow-wireposition3").attr("src", getimgpath).fadeIn();
        };   
        
        if( jQuery('input[name="clasptype_braiding_four"]:checked').length > 0 ){
            var getimgpath = jQuery('input[name="clasptype_braiding_four"]:checked').next().attr("data-src");
            jQuery(".buynow-wireposition4").attr("src", getimgpath).fadeIn();
        };  
    });
</script>
