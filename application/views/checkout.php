<?php include('template/header.php')?>

  <?php if($is_user_login <1){
      $not_login_icon = "fas fa-times-circle text-danger";
      $not_login_button = "disabled";
      $not_login_border = "";
      $not_login_bg = "opacity-75 bg--white";
    }else{
      $not_login_icon = "fas fa-check-circle";
      $not_login_bg = " bg--white";
      $not_login_button = "";
      $not_login_border = "";
    }
  ?>

  
  <style>
    .opacity-75 {
        opacity: .7 !important;
    }
</style>


    <ul class="ecommerce-cta-wrapper d-flex d-lg-none">
      <li class="ecommerce-cta__item">
        <a href="#" class="ecommerce-cta__item--link text-center">
          <span class="ecommerce-cta__item-icon"><i class="fas fa-store"></i></span>
          <span class="ecommerce-cta__item-text">Shop</span>
        </a>
      </li>
      <li class="ecommerce-cta__item">
        <a href="#" class="ecommerce-cta__item--link text-center">
          <span class="ecommerce-cta__item-icon"><i class="fas fa-user-alt"></i></span>
          <span class="ecommerce-cta__item-text">My Account</span>
        </a>
      </li>
      <li class="ecommerce-cta__item">
        <button class="ecommerce-cta__item--link text-center" id="searchButtonMobile">
          <span class="ecommerce-cta__item-icon"><i class="fas fa-search"></i></span>
          <span class="ecommerce-cta__item-text">Search</span>
        </button>
      </li>
      <li class="ecommerce-cta__item">
        <a href="#" class="ecommerce-cta__item--link text-center">
          <span class="ecommerce-cta__item-icon">
            <i class="fas fa-heart"></i>
            <span class="ecommerce-cta__item-val-highlighter">0</span>
          </span>
          <span class="ecommerce-cta__item-text">Wishlist</span>
        </a>
      </li>
      <li class="ecommerce-cta__item">
        <a href="#" class="ecommerce-cta__item--link text-center">
          <span class="ecommerce-cta__item-icon">
            <i class="fas fa-shopping-basket"></i>
            <span class="ecommerce-cta__item-val-highlighter">0</span>
          </span>
          <span class="ecommerce-cta__item-text">Cart</span>
        </a>
      </li>
    </ul>
    <!-- form search for mobile -->
    <form action="#" class="food-search-form d-lg-none">
      <div class="input-container d-flex justify-content-between">
        <input type="text" name="foodSearchItem" placeholder="Search food here..." class="food-search-form__input" required />
        <button type="submit" class="food-search-form__btn--search"><i class="fas fa-search"></i></button>
      </div>
    </form>
    <section class="checkout-wrapper py-5 bg--light">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-7 col-lg-7 col-xl-8">
            <div class="checkout-steps-wrapper">
              <div class="checkout-step px-4 py-5 px-md-5 bg--white border-radius--custom mb-5 mb-md-4">
                <h3 class="text--heading d-flex justify-content-center justify-content-md-start align-items-center">
                  Account Login<span class="checkout-step__account-login--status text-success ml-2 ml-md-3 ml-lg-4"><i class="<?=$not_login_icon?>"></i></span>
                </h3>
                <div class="checkout-step__cta-container mt-3 text-center text-md-left">
                  <?php if(empty($user_id)):?>
                  <a href="#" class="button button__primary mr-3 d-inline-block" data-toggle="modal" data-target="#loginModal">Login</a>
                  <?php else:?>
                    <!-- <p><b>Full Name: </b> </p> -->
                  <?php endif;?>
                </div>
                <div class="checkout-step__icon">
                  <i class="fas fa-sign-in-alt"></i>
                </div>
              </div>
              <div class="checkout-step px-4 py-5 px-md-5 border-radius--custom mb-5 mb-md-4 <?php echo $not_login_border." ".$not_login_bg;?>">
                <h3 class="text--heading d-flex justify-content-center justify-content-md-start align-items-center">
                  Delivery Address<span class="checkout-step__delivery-address-status text-success ml-2 ml-md-3 ml-lg-4"><i class="<?=$not_login_icon?>"></i></span>
                </h3>
                <div class="checkout-step__delivery-address-container row mt-3">
                  <?php foreach($data['user_address'] as $user_address){ ?>
                    <div class="col-12 col-md-6 col-lg-6">
                      <div class="checkout-step__added-address border-radius--custom pt-4 pb-3 px-3" style="height: 125px;margin-bottom: 15px;<?php if($user_address['is_default'] > 0){ echo "border-color: #00a850";} ?>">
                       
                      <!-- <a role="button" class="delete_address checkout-step__btn--remove-address" onclick="deleteaddress(<?php //echo $user_address['id']?>)" data-id="<?php //echo $user_address['id']?>" style="right: 56px;"><i class="fas fa-trash-alt"></i></a> -->
                        <a role="button" class="checkout-step__btn--remove-address make_default_address" data-id="<?php echo $user_address['id']?>"  class="trigger-btn">
                          <?php if($user_address['is_default'] > 0){ ?><?php echo '<i class="fas fa-check-circle  text-success"></i>';}else{ echo '<i class="fas fa-check-circle"></i>';}?></i></a>
                        <p class="text--para text--xs mt-3 mb-0"><?php echo $user_address['address']. " , City: ".$user_address['city']. " , Zipcode: ". $user_address['zip_code']." , Nare; ". $user_address['landmark'];?></p>
                      </div>
                    </div>
                  <?php }?>
                  <div class="col-12 col-md-12 col-lg-12 text-center text-md-left mt-3 mt-md-0">
                    <button class="d-inline-block checkout-step__btn--add-adress" id="addAddressButton"<?=$not_login_button?>>
                      <span class="mr-1"><i class="fas fa-plus"></i></span>Add Address
                    </button>
                  </div>
                </div>
                <div class="checkout-step__icon">
                  <i class="fas fa-map-marker-alt"></i>
                </div>
              </div>
              <div class="checkout-step checkout-step px-4 py-5 px-md-5 border-radius--custom mb-5 mb-md-4  <?php echo $not_login_border." ".$not_login_bg;?>">
                <h3 class="text--heading d-flex justify-content-center justify-content-md-start align-items-center mb-4">
                  Choose Payment Methods<span class="checkout-step__delivery-address-status text-success ml-2 ml-md-3 ml-lg-4"><i class="<?=$not_login_icon?>"></i></span>
                </h3>
                <div class="text-center text-md-left">
                  <a href="#" class=" place_order button button__secondary d-inline-block" <?=$not_login_button?>>Pay Now</a>
                </div>
                <div class="checkout-step__icon">
                  <i class="fas fa-wallet"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-5 col-lg-5 col-xl-4">
            <div class="checkout__cart-review cart-container bg--white border-radius--custom" style="padding: 15px;">
              
              <?php
              
              $items = $data['cart']['items'];
              $resturant = $data['cart']['current_restaurant'];
              
              ?>
              <a href="<?php echo $resturant['url']; ?>" class="cart-review__header cart-review-selected-outlet px-4 py-3 d-flex position-sticky top-0">
                <div class="selected-outlet__image mr-3">
                  <img src="<?php echo $resturant['image']; ?>" class="border-radius--custom" alt="outlet image" width="50" />
                </div>
                <div class="selected-outlet__content">
                  <p class="text--heading font-weight-bold mb-0"><?php echo $resturant['name']; ?></p>
                  <p class="text--para text--xs"><?php echo $resturant['city'].','.$resturant['address']; ?></p>
                </div>
              </a>
              
              <div class="cart-review__body px-4">
                
                <!--cart items-->
                
                <?php 
                $item_total = 0;
                foreach($items as $id=>$item){
                  $price = $item['price'];
                  $item_total += $price;
                ?>
                
                <div class="cart-order__cta d-flex justify-content-between mb-4" >
                  <span class="cart-order__food-type cart-order__food-type--<?php echo $item['is_veg']; ?> mr-2">
                    <i class="fas fa-utensils"></i>
                  </span>
                  <span class="cart-order__food-title text--xs text--heading pr-2"><?php echo $item['name']; ?></span>
                  <div class="cart-item-count__btn d-flex" data-id="<?php echo $id;?>">
                    <span class="cart-item-count__btn--decrease">-</span>
                    <span class="cart-item-count"><?php echo $item['qty']; ?></span>
                    <span class="cart-item-count__btn--increase">+</span>
                  </div>
                  <span class="cart-order__calculated-price-container text--xs text--heading pl-2">
                    <span class="cart-order__calculated-price-currency"><i class="fas fa-rupee-sign"></i></span>
                    <span class="cart-order__calculated-price-value"><?php echo $price; ?></span>
                  </span>
                </div>
                
                <?php } ?>
                <!--end cart items-->
                
                <!--suggestion-->
                <div class="cart-review__user-suggestion-form mb-3 d-flex align-items-center bg--light border-radius--custom px-3 py-1">
                  <span class="user-suggestion-form__quote-icon"><i class="fas fa-quote-left"></i></span>
                  <input type="text" name="userSuggestionAboutOrder" placeholder="Any suggestions? We will pass it on." class="user-suggestion-form__input w-100 py-2 px-3 bg--light border-0 border-radius--custom text--xs" />
                </div>
                <!--end suggestion-->
                
                <!--apply coupon-->
                <div class="cart-review__apply-coupan-form d-flex align-items-center mb-3 border-radius--custom px-3 py-1">
                  <span><img src="<?php echo base_url('assest/images/coupan-code-icon.png')?>" alt="coupan-code-icon" width="20" /></span>
                  <input type="text" name="coupon_code" placeholder="Apply coupon code here..." class="apply-coupan-form__input w-100 py-2 px-3 border-0 border-radius--custom text--xs outline--none" />
                </div>
                
                <!--subtotal-->
                <div class="cart-review__subtotal-container">
                  
                  <!--item total-->
                  <div class="subtotal-item d-flex justify-content-between mb-2">
                    <p class="text--para text--xs m-0">Item Total</p>
                    <p class="text--para text--xs m-0">
                      <span class="subtotal-item__currency"><i class="fas fa-rupee-sign"></i></span><span class="subtotal-item__value"><?php echo $item_total;?></span>
                    </p>
                  </div>
                </div>
                <!--end subtotal container-->
                
                <!--cart to pay-->
                <div class="cart-order__total-container d-flex justify-content-between mb-4 py-3">
                  <div>
                    <p class="font-weight-bold text--heading mb-0">To Pay</p>
                  </div>
                  <div>
                    <span class="cart-order__total-price-container text--heading pl-2">
                      <span class="cart-order__total-price-currency"><i class="fas fa-rupee-sign"></i></span>
                      <span class="cart-order__total-price-value"><?php echo $item_total;?></span>
                    </span>
                  </div>
                </div>
                <!--cart to pay end-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>





    <!-- Add address sidebar -->
    <!-- <h1> <?php //if($is_user_login > 0){echo "user ". $user_id;}?></h1> -->
    <?php if($is_user_login > 0):?>
    <div class="add-address-form bg--white position-fixed py-5 px-4" id="addAddressForm">
      <button type="role" class="text--heading add-address-form__btn--close" id="addAddressFormButtonClose"><i class="fas fa-times"></i></button>
        <?php echo form_open_multipart('index.php/home/add_new_address/'.$this->uri->segment(2));?>
            <div class="row">
            <div class="input-container col-12">
            <label for="Add Address">Zip code<span class="text--darkRed">*</span></label>
            <input type="text" class="add-address-form__input-address" name="zip_code" require="required" sidebar-hide="false" />
            <span class="error-text text--darkRed mt-2">This field is required</span>
            </div>
            <div class="input-container col-12">
            <label for="Add Address">City<span class="text--darkRed">*</span></label>
            <input type="text" class="add-address-form__input-door-flat-no" name="city" require="required" sidebar-hide="false" />
            <span class="error-text text--darkRed mt-2">This field is required</span>
            </div>
            <div class="input-container col-12">
            <label for="Add Address">Landmark<span class="text--darkRed">*</span></label>
            <input type="text" class="add-address-form__input-city" name="landmark" require="required" sidebar-hide="false" />
            <span class="error-text text--darkRed mt-2">This field is required</span>
            </div>
            
            <div class="input-container col-12">
            <label for="Add Address">Address with room/door no<span class="text--darkRed">*</span></label>
            <input type="text" class="add-address-form__input-door-flat-no" value="West Bengal" name="address" require="required" sidebar-hide="false" />
            <span class="error-text text--darkRed mt-2">This field is required</span>
            </div>
            <?php echo form_input(['name' => 'id', 'value' => $user_id,'type'=> 'hidden'])?>
            <div class="col-12 mt-2">
                <button type="submit" class="d-block button button__primary w-100">Save address & proceed</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <?php endif;?>


    
    <!-- Modal HTML  -->
      <div id="addressDeleteModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
          <div class="modal-content">
            <div class="icon-box fas fa-check-circle text-success" style="font-size:100px">
              <!-- <img class="modal-title w-100" src="<?php //echo base_url('/assest/images/icon/delete_round_border.svg'); ?>" alt=""> -->
            </div>
            <div class="modal-header flex-column">
              <h4 class="modal-title w-100">Are you sure want ?</h4>	
            </div>
            <div class="modal-body">
              <p>Do you really want to make this address Default address? </p>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <a  type="button" class="btn btn-success address-delete-button">Default</a>
            </div>
          </div>
        </div>
      </div>     


<style>

.modal-confirm {		
	color: #636363;
	width: 400px;
}
.modal-confirm .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
	text-align: center;
	font-size: 14px;
}
.modal-confirm .modal-header {
	border-bottom: none;   
	position: relative;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -10px;
}
.cart-item-count__btn.d-flex{
  pointer-events: none;
}
</style>

<script type="module"src="<?php echo base_url('/assest/js/');?>login.js" type="text/javascript"></script>
<script type="text/javascript">
  function deleteaddress(id){
      if (confirm('Are you sure,  After click ok Your Address will be deleted from Database')) {
          location.replace("<?php echo base_url('/index.php/home/delete_address/');?>"+id);
      }
  }
</script>


  <?php
    $item_name = $item;
    $string = '';
    foreach($item_name as $t){
      $string = $t;
      $data[] = $string;
    }

    // echo "<pre>";
    // print_r($data);
    if(!empty($data['user_address']) ){
      foreach($data['user_address'] as $address){
        if($address['is_default'] >0){
          $address_string = $address;
          $address_json[] = $address_string;
        }
      }
    }else{
      $address_json = '';
    }

    $place = $data['cart']['current_restaurant']['uniqueId'];
    $product = json_encode($data['cart']['items']);
    $product_id = json_encode(array_keys($data['cart']['items']));
    if(!empty($data['user_address'])){
        $shipping_address = json_encode($address_json[0]['id']);
      }else{
      $shipping_address = "";
    }

    $place_order_data = array
    (
      'product_id'=>  $product_id, 
      'product'=> $product,
      'shipping_address' => $shipping_address,
      'total_price' => $item_total,
      'outlet_palce' => $place
    );
  ?>

    
<?php include('template/footer.php')?>

<script>

  $(document).ready(function() {
    $(".place_order").click(function() {
        var product_id = <?php echo $place_order_data['product_id']?>;
        var product = <?php echo json_encode($place_order_data['product'])?>;
        var shipping_address = <?php echo $place_order_data['shipping_address']?>;
        var total_price = <?php echo $place_order_data['total_price']?>;
        var place = <?php echo $place_order_data['outlet_palce'];?>;
        
        $.ajax({
          type: "POST",
          url: "<?php echo base_url()?>index.php/home/placeOrder",
          data: {
          product_id: product_id,
          product: product,
          address_id: shipping_address,
          total_price: total_price,
          place:place,
          payment_mode: "COD"
        },
        cache: false,
        success: function(data) {
        window.location.href =  global_config.base_url+'home/flashMessage?msg=Order Place Successfull&typ=success&ttl=WOW!';
        },
        error: function(xhr, status, error) {
        alert("Somthing Went Wromg!");
        }
      });
    });
  });
  
</script>