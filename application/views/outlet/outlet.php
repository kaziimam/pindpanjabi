<?php include('header.php');?>

<?php //echo "<pre>"; print_r(count($data[3]));exit();?>
<!-- outlet overiew -->
<div class="outlet-overview bg--dark py-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-12 col-lg-3 pr-0">
            <div class="outlet__image mb-3">
              <img style="border-radius: 5px; height: 125px;" src="<?php echo base_url('assest/images/').$data[0][0]['img']?>" alt="outlet-image" />
            </div>
          </div>
          <div class="col-12 col-12 col-lg-6 d-flex flex-column justify-content-end">
            <div class="outlet__details position-relative pl-4">
                <input type="hidden" value="<?php echo $data[0][0]['id']; ?>" name="outlet_id"/>
                <input type="hidden" value="<?php echo $data[0][0]['name']; ?>" name="outlet_name"/>
                <input type="hidden" value="<?php echo base_url('/product-listing/').str_replace(' ','-',$data[0][0]['name']); ?>" name="outlet_url"/>
                <input type="hidden" value="<?php echo base_url('/').'assest/images/'.$data[0][0]['img']; ?>" name="outlet_img"/>
                <input type="hidden" value="<?php echo $data[0][0]['city']; ?>" name="outlet_city"/>
                <input type="hidden" value="<?php echo $data[0][0]['address']; ?>" name="outlet_address"/>
              <h3 class="outlet__title font-weight-normal"><?php echo $data[0][0]['name']?></h3>
              <p class="outlet__location text--light-muted text--xs mb-2"><?php echo $data[0][0]['address'].", ".$data[0][0]['city'].", ".$data[0][0]['zip_code']?></p>
              <div class="row outlet__highlighter-info mr-5 pb-2">
                <div class="col-4">
                  <p class="text--light mb-1 outlet__rating">
                    <span><i class="fas fa-star"></i></span><span class="ml-1 outlet__rating--value"><?php echo $data[0][0]['rateing']?></span>
                  </p>
                  <!-- <p class="text--xs text--light-muted m-0">500+ Ratings</p> -->
                </div>
                <div class="col-4">
                  <p class="text--light outlet__delivery-time mb-1">31 Mins</p>
                  <p class="text--xs text--light-muted m-0">Delivery Time</p>
                </div>
                <div class="col-4">
                  <p class="text--light outlet__cost-two-plate mb-1">
                    <span><i class="fas fa-rupee-sign"></i></span><span class="ml-1">400</span>
                  </p>
                  <p class="text--xs text--light-muted m-0">Cost for two</p>
                </div>
              </div>
              <div class="outlet__top-cta-container d-flex">
                <form class="input-container">
                  <input type="text" class="outlet__top-cta-input" name="outletFoodSearchText" placeholder="Search for dishes..." />
                  <button class="outlet__top-cta-input--reset"><i class="fas fa-times"></i></button>
                  <span class="outlet__top-cta-input-icon"><i class="fas fa-search"></i></span>
                </form>
                <div class="input-container d-flex align-items-center justify-content-center px-2">

                  <input type="checkbox" name="filterVeg" />
                  <label for="filterVegFood" class="text--heading mb-0 ml-2">Veg</label>
                  
                   
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-12 col-lg-3">
            <div class="outlet__offer-text-container d-none d-lg-block p-3 pt-4 pb-3">
              <h5 class="offer__heading text-uppercase">Offer</h5>
              <ul class="offer-list">
                <li class="offer-list__item d-flex flex-wrap">
                  <span class="item__icon mr-2"><img src="<?php echo base_url('assest/images/discount.png')?>" alt="" width="24" /></span>
                  <span class="item__text text--xs">20% off up to ₹50 | Use code TRYNEW</span>
                </li>
                <li class="offer-list__item d-flex flex-wrap">
                  <span class="item__icon mr-2"><img src="<?php echo base_url('assest/images/discount.png')?>" alt="" width="24" /></span>
                  <span class="item__text text--xs">20% off up to ₹125 | Use KOTAK125 Above ₹500</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- menu list for single outlet -->
    <section class="menu-list-section">
      <div class="container">
        <div class="row">
          <div class="col-3 menu-categories-sidebar-col">
            <div class="menu-categories-sidebar py-4">
              <nav id="menuCategoriesSidebarNav" class="navbar navbar-light p-0">
                <nav class="nav nav-pills flex-column w-100">
                    <?php foreach($data['categories'] as $product_category){ 
                      $product_category_nospace = str_replace(" ","","$product_category");
                    ?>
                      <a class="nav-link" href="<?php echo "#".$product_category_nospace?>"><?php echo $product_category;?></a>
                    <?php }?>
                </nav>
              </nav>
            </div>
          </div>
          <div class="col-6">
            <div class="menu-content" id="menuItems" data-target="#menuCategoriesSidebarNav">
              <?php foreach($data['products'] as $product_category=>$products){ ?>
                <?php $product_category_nospace = str_replace(" ","","$product_category");?>

                <section class="menu-list-section pt-5 pb-4 pl-4" style="border-bottom:1px solid #dddddd" id="<?php echo $product_category_nospace?>">
                  <h3 class="menu-list-section__heading text--heading mb-0"><?php echo $product_category; ?></h3>
                  <p class="menu-list-section__item-count text-uppercase text--xs font-weight-bold text--para"><?php echo count($data['products'][$product_category]);?> Items</p>

                  <?php foreach($products as $product){?>
                      
                    <div class="menu-list-item py-4" <?php 
                    
                      if($product['is_veg']){
                        echo 'data-veg="true"';
                      }
                      
                      ?>
                      >
                      <div class="row flex-row-reverse flex-md-row">
                        <div class="col-8 col-md-8 col-lg-8">
                          <div class="menu-list-item__overview mb-2 mb-lg-3">
                            <span class="item-type item-type--<?php if($product['is_veg']){
                          echo 'veg';
                        }else{
                        echo 'nonveg'; 
                        }?> text--xs"><i class="fas fa-utensils"></i></span>
                          </div>
                          <div class="d-flex align-items-center">
                            <p class="text--heading menu-list-item__title text-capitalize mb-2 mb-lg-3"><?php echo $product['name'] ?></p>
                            <div class="star-container ml-3 mb-2 mb-lg-3">
                              <div class="stars-outer"><div class="stars-inner" style="width: 85%"></div></div>
                              <span class="number-rating"></span>
                            </div>
                          </div>
                          <p class="text--heading menu-list-item__price mb-2 mb-lg-3">
                            <span class="menu-list-item__price-icon"><i class="fas fa-rupee-sign"></i></span>
                            <span class="menu-list-item__price-value"><?=$product['selling_price']?></span>
                          </p>
                          <p class="text--para text--xs mt-1 mt-md-0"><?php echo $product['product_discription'];?></p>
                        </div>
                        <div class="col-4 col-md-4 col-lg-4">
                          <div class="menu-list-item__cta-wrapper">
                            <a href="#" class="menu-list-item__image d-inline-block" data-toggle="modal" data-target="#menuItemModal">
                              <img src="<?php echo base_url('assest/images/product/').$product['img']?>" alt="menu-item-image" class="border-radius--custom" />
                            </a>
                            <a href="#" class="menu-list-item__btn--cart text-center">
                              <span class="text--primary text--sm text-uppercase btn-text" data-veg="<?php if($product['is_veg']){
                          echo 'veg';
                        }else{
                        echo 'nonveg'; 
                        }?>" data-price="<?php echo $product['selling_price'];?>" data-name="<?php echo $product['name'];?>" data-id="<?php echo $product['product_id'];?>">Add</span>
                              <div class="cart-item-count__btn d-flex">
                                <span class="cart-item-count__btn--decrease">-</span>
                                <span class="cart-item-count">0</span>
                                <span class="cart-item-count__btn--increase">+</span>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </section>
              <?php }?>
              
              <h6 class="search-result__error-text text--darkRed text-center mt-5">Oops, no item has been found.</h6>
            </div>
          </div>
          <div class="col-12 col-md-4 col-lg-3">
            <div class="cart-container py-5">

              <div class="cart-container__empty">
                <h4 class="text--heading mb-2">Empty Cart</h4>
                <div class="empty-cart__image">
                  <img src="<?php echo base_url('/'); ?>assest/images/empty-cart-icon.jpg" alt="" />
                </div>
                <p class="text--para text--lg">Oops, your cart is empty.<br>Go ahead, order some yummy items from the menu.</p>
              </div>
              
            </div>
          </div>

        </div>
      </div>
    </section>
    <section class="dummy-section bg--light section--padding"></section>
                   
<h1><?php echo $this->session->userdata('cart_item');?></h1>
<?php include('footer.php');?>