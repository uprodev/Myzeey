<?php
/* template name: Charms */
get_header();
?>

<!-- <style>
  header.dakrblue {
    display:none;
  }
</style> -->

<div class="charms-wrapper">
    <!-- <header class="charms-header">
			<nav class="navbar navbar-expand-xl">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?php echo site_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png" alt="logo" class="main-logo">
					</a>
					
					<div class="header-icon-main-resposnive ">
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
						<a href="<?php echo site_url(); ?>/cart/" class="header-icon">
							<i>
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
			</nav>
		</header> -->

    <div class="charms-headline text-center text-white">
      <div class="container">
        <h1><?php the_title() ?></h1>
        <?php the_content() ?>
      </div>
    </div>
    <div class="charms-main">
      <div class="container-fluid">
        <div class="charms-categories">
          <h2>Shop by Category</h2>
          <div class="cat-list d-flex">
            <div class="cat-new">
              <div class="cat-item">
                <div class="cat-image"></div>
                <div class="cat-title">New</div>
              </div>
            </div>
            <div class="cat-scroll">
              <div class="inner d-inline-flex">
                <div class="cat-item">
                  <div class="cat-image"></div>
                  <div class="cat-title">Football</div>
                </div>
                <div class="cat-item">
                  <div class="cat-image"></div>
                  <div class="cat-title">Football</div>
                </div>
                <div class="cat-item">
                  <div class="cat-image"></div>
                  <div class="cat-title">Football</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="charms-cards">
          <div class="row">
            <div class="col-6">
              <div class="card">
                  <div class="card-img-top">
                    <figure></figure>
                    <button type="button" class="btn-like">
                      <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M8.745 2.4832C7.2955 0.860002 4.87832 0.423362 3.06215 1.90973C1.24599 3.3961 0.990302 5.88121 2.41654 7.63921L8.745 13.5L15.0735 7.63921C16.4998 5.88121 16.2753 3.38047 14.4279 1.90973C12.5805 0.439002 10.1946 0.860002 8.745 2.4832Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </button>
                  </div>
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Cat 1</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="card-options">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="card-price">£100</div>
                        <div class="card-amount d-flex align-items-center">
                          <button id="btnAmountMin" type="button" class="btn-amount">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1666 8.66675H3.83325" stroke="#818181" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                          </button>
                          <input type="text" value="2">
                          <button id="btnAmountPlus" type="button" class="btn-amount">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 4.33325V12.6666" stroke="#818181" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.1666 8.5H3.83325" stroke="#818181" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                          </button>
                        </div>
                      </div>
                      <a href="#" class="btn">Add to Selection</a>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-6">
              <div class="card">
                  <div class="card-img-top">
                    <figure></figure>
                    <button type="button" class="btn-like active">
                      <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M8.745 2.4832C7.2955 0.860002 4.87832 0.423362 3.06215 1.90973C1.24599 3.3961 0.990302 5.88121 2.41654 7.63921L8.745 13.5L15.0735 7.63921C16.4998 5.88121 16.2753 3.38047 14.4279 1.90973C12.5805 0.439002 10.1946 0.860002 8.745 2.4832Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </button>
                  </div>
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Cat 1</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="card-options">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="card-price">£100</div>
                        <div class="card-amount d-flex align-items-center">
                          <button id="btnAmountMin" type="button" class="btn-amount">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1666 8.66675H3.83325" stroke="#818181" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                          </button>
                          <input type="text" value="2">
                          <button id="btnAmountPlus" type="button" class="btn-amount">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 4.33325V12.6666" stroke="#818181" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.1666 8.5H3.83325" stroke="#818181" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                          </button>
                        </div>
                      </div>
                      <a href="#" class="btn">Add to Selection</a>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-6">
              <div class="card">
                  <div class="card-img-top">
                    <figure></figure>
                    <button type="button" class="btn-like">
                      <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M8.745 2.4832C7.2955 0.860002 4.87832 0.423362 3.06215 1.90973C1.24599 3.3961 0.990302 5.88121 2.41654 7.63921L8.745 13.5L15.0735 7.63921C16.4998 5.88121 16.2753 3.38047 14.4279 1.90973C12.5805 0.439002 10.1946 0.860002 8.745 2.4832Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </button>
                  </div>
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Cat 1</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="card-options">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="card-price">£100</div>
                        <div class="card-amount d-flex align-items-center">
                          <button id="btnAmountMin" type="button" class="btn-amount">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1666 8.66675H3.83325" stroke="#818181" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                          </button>
                          <input type="text" value="2">
                          <button id="btnAmountPlus" type="button" class="btn-amount">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 4.33325V12.6666" stroke="#818181" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.1666 8.5H3.83325" stroke="#818181" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                          </button>
                        </div>
                      </div>
                      <a href="#" class="btn">Add to Selection</a>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-6">
              <div class="card">
                  <div class="card-img-top">
                    <figure></figure>
                    <button type="button" class="btn-like">
                      <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M8.745 2.4832C7.2955 0.860002 4.87832 0.423362 3.06215 1.90973C1.24599 3.3961 0.990302 5.88121 2.41654 7.63921L8.745 13.5L15.0735 7.63921C16.4998 5.88121 16.2753 3.38047 14.4279 1.90973C12.5805 0.439002 10.1946 0.860002 8.745 2.4832Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </button>
                  </div>
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Cat 1</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="card-options">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="card-price">£100</div>
                        <div class="card-amount d-flex align-items-center">
                          <button id="btnAmountMin" type="button" class="btn-amount">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1666 8.66675H3.83325" stroke="#818181" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                          </button>
                          <input type="text" value="2">
                          <button id="btnAmountPlus" type="button" class="btn-amount">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 4.33325V12.6666" stroke="#818181" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.1666 8.5H3.83325" stroke="#818181" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                          </button>
                        </div>
                      </div>
                      <a href="#" class="btn">Add to Selection</a>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="charms-panel">
  <div class="container-fluid">
    <div class="charms-panel-inner">
      <div class="charms-panel-list">
        <div class="charms-panel-list-inner">
          <div class="item active">
            <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-charms-tmp.png" alt=""></figure>
            <button type="button" class="charms-item-remove">
              <svg width="10" height="3" viewBox="0 0 10 3" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.16658 1.66675H0.833252" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
          <div class="item active">
            <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-charms-tmp.png" alt=""></figure>
            <button type="button" class="charms-item-remove">
              <svg width="10" height="3" viewBox="0 0 10 3" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.16658 1.66675H0.833252" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
          <div class="item active">
            <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-charms-tmp.png" alt=""></figure>
            <button type="button" class="charms-item-remove">
              <svg width="10" height="3" viewBox="0 0 10 3" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.16658 1.66675H0.833252" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
          <div class="item">
            <figure></figure>
            <button type="button" class="charms-item-remove">
              <svg width="10" height="3" viewBox="0 0 10 3" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.16658 1.66675H0.833252" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
          <div class="item">
            <figure></figure>
            <button type="button" class="charms-item-remove">
              <svg width="10" height="3" viewBox="0 0 10 3" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.16658 1.66675H0.833252" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
          <div class="item">
            <figure></figure>
            <button type="button" class="charms-item-remove">
              <svg width="10" height="3" viewBox="0 0 10 3" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.16658 1.66675H0.833252" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
          <div class="item">
            <figure></figure>
            <button type="button" class="charms-item-remove">
              <svg width="10" height="3" viewBox="0 0 10 3" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.16658 1.66675H0.833252" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
          <div class="item">
            <figure></figure>
            <button type="button" class="charms-item-remove">
              <svg width="10" height="3" viewBox="0 0 10 3" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.16658 1.66675H0.833252" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
          <div class="item">
            <figure></figure>
            <button type="button" class="charms-item-remove">
              <svg width="10" height="3" viewBox="0 0 10 3" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.16658 1.66675H0.833252" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
          <div class="item">
            <figure></figure>
            <button type="button" class="charms-item-remove">
              <svg width="10" height="3" viewBox="0 0 10 3" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.16658 1.66675H0.833252" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
      <div class="charms-panel-options">
        <div class="charms-panel-counter">
          <span id="itemsCounter">3</span>/10
        </div>
        <div class="charms-panel-toggler">
          <button type="button" class="charms-panel-toggler-btn">
            <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 6.00008L5 1.69238L1 6.00008" stroke="#818181" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class="charms-panel-footer">
      <a href="#" class="btn">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.75001 8.75V8C4.52352 8 4.30915 8.10235 4.16676 8.27849C4.02437 8.45463 3.9692 8.68568 4.01666 8.90715L4.75001 8.75ZM19.25 8.75L19.9834 8.90715C20.0308 8.68568 19.9756 8.45463 19.8332 8.27849C19.6909 8.10235 19.4765 8 19.25 8V8.75ZM6.66124 17.6691L7.39459 17.5119L6.66124 17.6691ZM17.3388 17.6691L16.6054 17.5119L17.3388 17.6691ZM4.75001 9.5H19.25V8H4.75001V9.5ZM18.5166 8.59285L16.6054 17.5119L18.0721 17.8262L19.9834 8.90715L18.5166 8.59285ZM15.3832 18.5H8.61684V20H15.3832V18.5ZM7.39459 17.5119L5.48336 8.59285L4.01666 8.90715L5.92788 17.8262L7.39459 17.5119ZM8.61684 18.5C8.02742 18.5 7.51809 18.0882 7.39459 17.5119L5.92788 17.8262C6.19959 19.0941 7.32011 20 8.61684 20V18.5ZM16.6054 17.5119C16.4819 18.0883 15.9726 18.5 15.3832 18.5V20C16.6799 20 17.8004 19.0942 18.0721 17.8262L16.6054 17.5119Z" fill="white"/>
          <path d="M7.28845 8.26279C7.15746 8.65575 7.36983 9.08049 7.76279 9.21147C8.15575 9.34246 8.58049 9.13009 8.71147 8.73713L7.28845 8.26279ZM9.96147 4.98713C10.0925 4.59417 9.88009 4.16943 9.48713 4.03845C9.09417 3.90746 8.66943 4.11983 8.53845 4.51279L9.96147 4.98713ZM8.71147 8.73713L9.96147 4.98713L8.53845 4.51279L7.28845 8.26279L8.71147 8.73713Z" fill="white"/>
          <path d="M15.2885 8.73713C15.4195 9.13009 15.8442 9.34246 16.2372 9.21147C16.6301 9.08049 16.8425 8.65575 16.7115 8.26279L15.2885 8.73713ZM15.4615 4.51279C15.3305 4.11983 14.9058 3.90746 14.5128 4.03845C14.1199 4.16943 13.9075 4.59417 14.0385 4.98713L15.4615 4.51279ZM16.7115 8.26279L15.4615 4.51279L14.0385 4.98713L15.2885 8.73713L16.7115 8.26279Z" fill="white"/>
        </svg>
        Checkout
      </a>
    </div>
  </div>
</div>

<?php
get_footer();
?>