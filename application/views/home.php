<?php include('template/header.php');?>

<section class="hero-section d-flex align-items-center justify-content-center">
      <div class="section__overlay section__overlay--color"></div>
      <div class="container text-center text-md-left">
        <div class="row align-items-center">
          <div class="col-12 col-md-6">
            <h1 class="text--light mb-lg-3">Unlimited Medium <span class="text--secondary">Pizzas</span></h1>
            <h4 class="text--primary mb-lg-3">Medium 2-topping* pizza</h4>
            <p class="text--light mb-lg-3">*Additional charge for premium toppings. Minimum of 2 required.</p>
            <div class="d-lg-flex align-items-center">
              <a href="#" class="button button__secondary d-inline-block mb-3" data-toggle="modal" data-target="#selectOutletModal">Order Now</a>
              <div class="hero-section-food__price-featured d-flex justify-content-center ml-lg-4">
                <h2 class="featured__price text--primary">$12.99</h2>
                <p class="featured__price--old ml-2 text--light-muted deco">$19.99</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <img src="<?php echo base_url('/assest/images/h1_pizza-1.png');?>" alt="" class="mx-auto" />
          </div>
        </div>
      </div>
    </section>

    <!-- Menus section -->
    <section class="menu-section section--padding">
      <div class="container">
        <a href="#" class="button button__secondary menu-section__btn--to-menu-page">Menus</a>
        <div class="swiper swiper-menus pb-5">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
              <a  data-toggle="modal" data-target="#selectOutletModal" class="menu text-center d-block">
                <div class="menu__thumbnail">
                  <img src="<?php echo base_url('/assest/images/categories/combo.png');?>" alt="" class="d-inline-block" />
                </div>
                <p class="text--sm menu__title text-uppercase mt-2">Combo</p>
              </a>
            </div>
            <div class="swiper-slide">
              <a  data-toggle="modal" data-target="#selectOutletModal" class="menu text-center d-block">
                <div class="menu__thumbnail">
                  <img src="<?php echo base_url('/assest/images/categories/kidsmenu.png');?>" alt="" class="d-inline-block" />
                </div>
                <p class="text--sm menu__title text-uppercase mt-2">Kids Menus</p>
              </a>
            </div>
            <div class="swiper-slide">
              <a  data-toggle="modal" data-target="#selectOutletModal" class="menu text-center d-block">
                <div class="menu__thumbnail">
                  <img src="<?php echo base_url('/assest/images/categories/pizza.png');?>" alt="" class="d-inline-block" />
                </div>
                <p class="text--sm menu__title text-uppercase mt-2">Pizza</p>
              </a>
            </div>
            <div class="swiper-slide">
              <a  data-toggle="modal" data-target="#selectOutletModal" class="menu text-center d-block">
                <div class="menu__thumbnail">
                  <img src="<?php echo base_url('/assest/images/categories/boxmeals.png');?>" alt="" class="d-inline-block" />
                </div>
                <p class="text--sm menu__title text-uppercase mt-2">Box Meals</p>
              </a>
            </div>
            <div class="swiper-slide">
              <a  data-toggle="modal" data-target="#selectOutletModal" class="menu text-center d-block">
                <div class="menu__thumbnail">
                  <img src="https://pindpunjabidhaba.com/wp-content/uploads/2020/09/category-11-1.png" alt="" class="d-inline-block" />
                </div>
                <p class="text--sm menu__title text-uppercase mt-2">Combo</p>
              </a>
            </div>
            <div class="swiper-slide">
              <a  data-toggle="modal" data-target="#selectOutletModal" class="menu text-center d-block">
                <div class="menu__thumbnail">
                  <img src="<?php echo base_url('/assest/images/categories/burger.png');?>" alt="" class="d-inline-block" />
                </div>
                <p class="text--sm menu__title text-uppercase mt-2">Burger</p>
              </a>
            </div>
            <div class="swiper-slide">
              <a  data-toggle="modal" data-target="#selectOutletModal" class="menu text-center d-block">
                <div class="menu__thumbnail">
                  <img src="https://pindpunjabidhaba.com/wp-content/uploads/2020/09/category-11-1.png" alt="" class="d-inline-block" />
                </div>
                <p class="text--sm menu__title text-uppercase mt-2">Combo</p>
              </a>
            </div>
            <div class="swiper-slide">
              <a  data-toggle="modal" data-target="#selectOutletModal" class="menu text-center d-block">
                <div class="menu__thumbnail">
                  <img src="<?php echo base_url('/assest/images/categories/chicken.png');?>" alt="" class="d-inline-block" />
                </div>
                <p class="text--sm menu__title text-uppercase mt-2">Chicken</p>
              </a>
            </div>
            <div class="swiper-slide">
              <a  data-toggle="modal" data-target="#selectOutletModal" class="menu text-center d-block">
                <div class="menu__thumbnail">
                  <img src="<?php echo base_url('/assest/images/categories/combo.png');?>" alt="" class="d-inline-block" />
                </div>
                <p class="text--sm menu__title text-uppercase mt-2">Drinks</p>
              </a>
            </div>
          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>

          <!-- If we need navigation buttons
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>-->
        </div>
      </div>
    </section>
    <!-- promo section -->
    <section class="promo-section section--padding bg--light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-6 col-lg-6 col-xl-4">
            <div class="promo p-3 p-sm-4 bg--white border-radius--custom mb-4 mb-xl-0">
              <div class="row align-items-center">
                <div class="col-5">
                  <h4 class="promo__heading">Other flavors</h4>
                  <p class="text--para text--sm mb-2 text-uppercase">New phenomenon burger test</p>
                  <h5 class="text--primary mb-0">$12.90</h5>
                </div>
                <div class="col-7">
                  <img src="https://demo2wpopal.b-cdn.net/poco/wp-content/uploads/2020/09/h1_banner1-1.png" alt="" class="mx-auto" />
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6 col-xl-4">
            <div class="promo p-3 p-sm-4 bg--white border-radius--custom mb-4 mb-xl-0 promo--other-flavours">
              <div class="row align-items-center">
                <div class="col-5">
                  <h4 class="promo__heading text--light">Other flavors</h4>
                  <p class="text--light-muted text--sm mb-2 text-uppercase">SAVE ROOM. WE MADE SALATS</p>
                  <h5 class="text--secondary mb-0">$12.90</h5>
                </div>
                <div class="col-7">
                  <img src="https://demo2wpopal.b-cdn.net/poco/wp-content/uploads/2020/09/h1_banner2-2.png" alt="" class="mx-auto" />
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6 col-xl-4">
            <div class="promo p-3 p-sm-4 bg--white border-radius--custom promo--find-store">
              <div class="row align-items-center">
                <div class="col-5 col-lg-6">
                  <h4 class="promo__heading">Find nearest Store</h4>
                  <p class="text--para text--sm mb-2 text-uppercase">New phenomenon burger test</p>
                  <a href="#" class="d-inline-block promo__contact--link">Contact Us</a>
                </div>
                <div class="col-7 col-lg-6">
                  <img src="https://demo2wpopal.b-cdn.net/poco/wp-content/uploads/2020/09/h1_banner3.png" alt="" class="mx-auto" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- featured ad section  -->
    <section class="featured-ad-section section--padding" data-parallax="scroll">
      <div class="section__overlay featured-ad-section__overlay"></div>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6 text-center">
            <div class="featured-ad-discount-container">
              <div class="featured-ad-discount__content d-inline-block">
                <h6 class="text--cursive text--primary">Get up to</h6>
                <h2 class="text--secondary">50%</h2>
                <h3 class="text--heading">OFF</h3>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 text-center mb-5 mb-lg-0">
            <h3 class="text--light text--cursive mb-3">HotFresh</h3>
            <h1 class="text--secondary text--uppercase mb-3">Hotdog</h1>
            <a href="#" class="d-inline-block button button__primary" data-toggle="modal" data-target="#selectOutletModal">Order Now</a>
          </div>
        </div>
      </div>
    </section>
    <!-- promo section v2 -->
    <section class="promo-section promo-section--v2 section--padding bg--light">
      <div class="row justify-content-center">
        <div class="col-12 col-md-4 col-xl-4 p-0">
          <div class="promo px-4 py-5 px-md-4 px-xl-5 mb-md-4 mb-xl-0 bg--primary">
            <div class="row align-items-center">
              <div class="col-7">
                <h4 class="promo__subheading text--cursive">Fast Food</h4>
                <h2 class="promo__heading text--secondary">Meals</h2>
                <p class="text--light-muted text--sm mb-2 text-uppercase">New phenomenon burger test</p>
                <h3 class="text--secondary mb-3">$12.90</h3>
                <a href="#" class="d-inline-block button button__white" data-toggle="modal" data-target="#selectOutletModal">Order Now</a>
              </div>
              <div class="col-5">
                <img src="<?php echo base_url('/assest/images/fast-food-promo.png');?>" alt="" class="mx-auto" />
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4 col-xl-4 p-0">
          <div class="promo px-4 py-5 px-md-4 px-xl-5 mb-md-4 mb-xl-0 bg--darkOrange">
            <div class="row align-items-center">
              <div class="col-7">
                <h4 class="promo__subheading text--cursive">House</h4>
                <h2 class="promo__heading text--secondary">Burgers</h2>
                <p class="text--light-muted text--sm mb-2 text-uppercase">New phenomenon burger test</p>
                <h3 class="text--secondary mb-3">$12.90</h3>
                <a href="#" class="d-inline-block button button__white" data-toggle="modal" data-target="#selectOutletModal">Order Now</a>
              </div>
              <div class="col-5">
                <img src="<?php echo base_url('/assest/images/burger-promo.png');?>" alt="" class="mx-auto" />
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4 col-xl-4 p-0">
          <div class="promo px-4 py-5 px-md-4 px-xl-5 mb-md-4 mb-xl-0 bg--secondary">
            <div class="row align-items-center">
              <div class="col-7">
                <h4 class="promo__subheading text--cursive">Hot Fresh</h4>
                <h2 class="promo__heading text--darkRed">Salads</h2>
                <p class="text--para text--sm mb-2 text-uppercase">New phenomenon burger test</p>
                <h3 class="text--heading mb-3">$12.90</h3>
                <a href="#" class="d-inline-block button button__white" data-toggle="modal" data-target="#selectOutletModal">Order Now</a>
              </div>
              <div class="col-5">
                <img src="<?php echo base_url('/assest/images/salats-promo.png');?>" alt="" class="mx-auto" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- testimonial section -->
    <section class="testimonial-section section--padding bg--light">
      <div class="container">
        <h2 class="text--heading mb-5 text-center">What your client says</h2>
        <!-- Slider main container -->
        <div class="swiper swiper-testimonial pb-5">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
              <div class="testimonial bg--white border-radius--custom">
                <div class="testimonial__author-container d-flex align-items-center mb-4">
                  <div class="author__image">
                    <img src="<?php echo base_url('/assest/images/client-2.jpg');?>" alt="" />
                  </div>
                  <div class="author__content ml-2">
                    <p class="author__title font-weight-bold mt-0 mb-1">Jane Doe</p>
                    <p class="text--sm text--para m-0">Designer</p>
                  </div>
                </div>
                <p class="author__quote text--para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt officia blanditiis dolor debitis. Eveniet, pariatur?</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial bg--white border-radius--custom">
                <div class="testimonial__author-container d-flex align-items-center mb-4">
                  <div class="author__image">
                    <img src="<?php echo base_url('/assest/images/client-3.jpg');?>" alt="" />
                  </div>
                  <div class="author__content ml-2">
                    <p class="author__title font-weight-bold mt-0 mb-1">Jane Doe</p>
                    <p class="text--sm text--para m-0">Designer</p>
                  </div>
                </div>
                <p class="author__quote text--para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt officia blanditiis dolor debitis. Eveniet, pariatur?</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial bg--white border-radius--custom">
                <div class="testimonial__author-container d-flex align-items-center mb-4">
                  <div class="author__image">
                    <img src="<?php echo base_url('/assest/images/client-4.jpg');?>" alt="" />
                  </div>
                  <div class="author__content ml-2">
                    <p class="author__title font-weight-bold mt-0 mb-1">Jane Doe</p>
                    <p class="text--sm text--para m-0">Designer</p>
                  </div>
                </div>
                <p class="author__quote text--para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt officia blanditiis dolor debitis. Eveniet, pariatur?</p>
              </div>
            </div>
          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>

          <!-- If we need navigation buttons
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>-->
        </div>
      </div>
    </section>
<?php include_once('template/footer.php');?>