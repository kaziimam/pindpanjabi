  <?php
    if(!empty($this->session->userdata('user_id'))){
      $is_user_login = 1;
      $user_id = $this->session->userdata('user_id');
    }else{
      $is_user_login = 0;
    }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PindPunjabiDhaba | Outlet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Norican&family=Questrial&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('/assest/vendor/bootstrap-4.6.1-dist/css/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('/assest/css/style.css')?>" />
    <link rel="shortcut icon" href="<?php echo base_url('/assest/images/favicon.png')?>" type="image/x-icon" />
  </head>
  <body>
    <!-- header outlet -->
    <header class="outlet-header bg--white">
      <div class="container py-3 d-flex justify-content-between align-items-center">
        <a href="<?php echo base_url()?>" class="outlet-header__logo d-inline-block">
          <img src="<?php echo base_url('/assest/images/logo.png')?>" alt="" width="90" />
        </a>
        <div>
          <nav class="outlet-nav" id="siteMainNav">
            <button role="button" class="outlet-nav__btn--close d-none"><i class="fas fa-times"></i></button>
            <ul class="nav-menu d-flex">
              <li class="nav-menu__item">
                <a href="" class="nav-menu__item--link active d-flex">
                  <span class="link__icon"><i class="fas fa-user"></i></span>
                  <div class="link__text ml-2">Sign In</div>
                </a>
              </li>
              <li class="nav-menu__item nav-menu__item--cart ml-4">
                <a href="" class="nav-menu__item--link d-flex">
                  <span class="cart-count">0</span>
                  <span class="link__icon"><i class="fas fa-shopping-basket"></i></span>
                  <div class="link__text">Cart</div>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

     <script>
    <?php 
    
    $config = array(
      'base_url'=>base_url('/').''
    );
    echo 'var global_config='. json_encode($config).';';

    ?>
    </script>