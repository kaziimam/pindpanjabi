  <?php
    if(!empty($this->session->userdata('user_id'))){
      $is_user_login = 1;
      $user_id = $this->session->userdata('user_id');
    }else{
      $is_user_login = 0;
    }

    if($this->session->flashdata('flash_data')){ 
      $flash_message = $this->session->flashdata('flash_data');
    }
    
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pind Punjabi Dhaba | Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="shortcut icon" href="<?php echo base_url('/assest/images/favicon.png')?>" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Norican&family=Questrial&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('/assest/vendor/bootstrap-4.6.1-dist/css/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('/assest/css/style.css')?>" />
  </head>
  <body>
    <!-- Header -->
    <header class="site-header fixed-top">
      <div class="site-header__top d-none d-md-block py-2">
        <div class="container d-flex justify-content-between">
          <div class="top-contacts-container d-flex">
            <div class="contact mr-3">
              <span class="contact__icon mr-2"><i class="fas fa-phone"></i></span>
              <span class="contact__info"> <a class="text-light" href="tel:+1234567890">+1234567890</a> </span>
            </div>
            <div class="contact">
              <span class="contact__icon mr-2"><i class="fas fa-map-marker-alt"></i></span>
              <span class="contact__info">Kolkata</span>
            </div>
          </div>
          <ul class="top-social-links d-flex justify-content-end">
            <li class="top-social-link__item mr-3">
              <a href="" class="top-social-link__item--link" target="_blank"><i class="fab fa-facebook"></i></a>
            </li>
            <li class="top-social-link__item mr-3">
              <a href="" class="top-social-link__item--link" target="_blank"><i class="fab fa-instagram"></i></a>
            </li>
            <li class="top-social-link__item mr-3">
              <a href="" class="top-social-link__item--link" target="_blank"><i class="fab fa-youtube"></i></a>
            </li>
            <li class="top-social-link__item">
              <a href="" class="top-social-link__item--link" target="_blank"><i class="fab fa-pinterest"></i></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="site-header__bottom p-3">
        <div class="container d-flex justify-content-between align-items-center">
          <a href="<?php echo base_url();?>" class="site-header__logo d-inline-block">
            <img src="https://pindpunjabidhaba.com/wp-content/uploads/2022/02/Pind-Punjabi-dhaba_01-1.png" alt="" width="90" />
          </a>
          <!-- nav button -->
          <button role="button" class="site-header__btn--nav-toggler d-lg-none" id="siteMainNavToggler"><i class="fas fa-bars"></i></button>
          <!-- main navigation -->
          <nav class="site-main-nav" id="siteMainNav">
            <button role="button" class="site-main-nav__btn--close d-lg-none"><i class="fas fa-times"></i></button>
            <ul class="nav-menu d-lg-flex">
              <li class="nav-menu__item">
                <a href="<?php echo base_url();?>" class="nav-menu__item--link active">Home</a>
              </li>
              <li class="nav-menu__item">
                <a href="<?php echo base_url('home/aboutUs');?>" class="nav-menu__item--link">About Us</a>
              </li>
              <li class="nav-menu__item">
                <a href="<?php echo base_url('home/contact_us');?>" class="nav-menu__item--link">Contact Us</a>
              </li>
            </ul>
          </nav>

          <!-- site header call to action -->
          <div class="site-header__cta-buttons d-none d-lg-flex align-items-center">
            <div class="site-header__contact-lg d-flex align-items-center">
              <div class="contact__image">
                <img src="<?php echo base_url('/assest/images/delivery-man.png');?>" alt="delivery man icon" width="64" />
              </div>
              <div class="contact__content">
                <p class="text--para m-0">Call and Order in</p>
                <h4 class="text--primary m-0"><a href="tel:+1718-904-4450" class="contact--link">+1718-904-4450</a></h4>
              </div>
            </div>

           <?php if($is_user_login > 0):?>
            <div class="dropdown">
              <button class="site-header__cta-btn--your-account ml-3 dropdown-toggle" style="width: 45px;height: 45px;padding: 25px;border-radius: 5px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?php echo base_url('index.php/Home/user_details')?>"> <i class="fas fa-user"> </i> My Account</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/Home/logout_user')?>"><i class="fas fa-sign-out-alt"> </i> Logout</a>
              </div>
            </div>
            <?php else:?>
              <a class="site-header__cta-btn--your-account ml-4" style="cursor: pointer;" data-toggle="modal" data-target="#loginModal">
                <i class="fas fa-user"></i>
              </a>
            <?php endif;?>
            <button class="button button__secondary ml-3" data-toggle="modal" data-target="#selectOutletModal">Order Now</button>
          </div>
        </div>
      </div>
    </header>

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
    <!-- Hero section -->
    <!-- <?php //if($this->session->flashdata('flash_data')): ?>
      <div class="container">
          <div role="alert" class="<?php echo $flash_message['class'] ?>"><?php echo $flash_message['message']; ?></div>
      </div>
      <?php
        // sleep(10);
        // unset($_SESSION['flash_data']);
      ?>
    <?php //endif;?> -->


    <script>
      <?php 
        $config = array(
          'base_url'=>base_url('/').''
        );
        echo 'var global_config='. json_encode($config).';';
      ?>
    </script>
