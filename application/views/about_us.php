<?php include('template/header.php');?>
<!-- page title -->
    <section class="page-title-section d-flex justify-content-center align-items-center page-title-section--contact-us">
      <div class="container">
        <h2 class="page-title text-center text--light">About Us</h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb d-flex justify-content-center p-0">
            <li class="breadcrumb-item"><a href="<?php echo base_url('');?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
          </ol>
        </nav>
      </div>
    </section>
    <!-- about detailed section -->
    <section class="about-detailed-section section--padding">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-12 col-lg-6 mb-4 mb-lg-0 pr-lg-5">
            <h4 class="text--cursive text--secondary text-center text-lg-left">Welcome</h4>
            <h2 class="text--heading text-center text-lg-left mb-4">Best burger ideas & traditions from the whole world</h2>
            <p class="text--para text-center text-lg-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <p class="text--para text-center text-lg-left">Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum. Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat.</p>
            <div class="text-center text-lg-left mt-4">
              <a href="/contact-us.html" class="button button__secondary d-inline-block">Contact Now</a>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-6 mt-3 mt-lg-0">
            <div class="row">
              <div class="col-6 pr-1">
                <div class="about-detailed__img-container about-detailed__img-container--lg border-radius--custom"></div>
              </div>
              <div class="col-6 pl-1">
                <div class="about-detailed__img-container about-detailed__img-container--sm border-radius--custom mb-2"></div>
                <div class="about-detailed__img-container about-detailed__img-container--sm border-radius--custom mt-1"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- why us section -->
    <section class="bg--light why-us-section section--padding position-relative">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex justify-content-center justify-content-md-start align-items-center">
            <div class="text-center text-md-left">
              <h4 class="text--cursive text--secondary">Why Us</h4>
              <h2 class="text--heading">Why people choose us</h2>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="why-us-block border-radius--custom bg--white">
              <img src=" <?php echo base_url('/assest/images/quality.png');?>" alt="Quality Assurance" class="why-us-block__icon" />
              <h4 class="text--heading mt-4 mb-1">Quality Assurance</h4>
              <p class="text--para">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="why-us-block border-radius--custom bg--white">
              <img src="<?php echo base_url('/assest/images/delivery.png');?>" alt="30 Minutes Gurranty Delivery" class="why-us-block__icon" />
              <h4 class="text--heading mt-4 mb-1">30 Minutes Gurranty Delivery</h4>
              <p class="text--para">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="why-us-block border-radius--custom bg--white">
              <img src="<?php echo base_url('/assest/images/target.png');?>" alt="Reliable and Secure" class="why-us-block__icon" />
              <h4 class="text--heading mt-4 mb-1">Happy Customers</h4>
              <p class="text--para">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="why-us-block border-radius--custom bg--white">
              <img src="<?php echo base_url('/assest/images/support.png');?>" alt="24x7 Support" class="why-us-block__icon" />
              <h4 class="text--heading mt-4 mb-1">24x7 Support</h4>
              <p class="text--para">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="why-us-block border-radius--custom bg--white">
              <img src="<?php echo base_url('/assest/images/verified.png');?>" alt="Reliable and Secure" class="why-us-block__icon" />
              <h4 class="text--heading mt-4 mb-1">Reliable and Secure</h4>
              <p class="text--para">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- select outlet featured section -->
    <section class="select-outlet-featured-section bg--dark section--padding">
      <div class="container text-center py-5">
        <div class="select-outlet-featured__video-button-container d-flex justify-content-center mb-4">
          <a href="#" class="select-outlet-featured__button--play">
            <i class="fa fa-play" aria-hidden="true"></i>
          </a>
        </div>
        <h2 class="text--light pt-3">Make the thing Anything is Possible</h2>
        <p class="text--light-muted">Enjoy our luscious dishes wherever you want</p>
        <div class="text-center mt-4">
          <a href="#" class="button button__secondary d-inline-block" data-toggle="modal" data-target="#selectOutletModal">Order Now</a>
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
    <!-- select outlet modal -->
    <div class="modal fade" id="selectOutletModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered border-0">
        <div class="modal-content">
          <div class="modal-header border-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pt-0 pb-5">
            <h4 class="text--heading text-center mb-4">Select Outlet</h4>
            <div class="select-outlet-container d-flex align-items-center justify-content-center">
              <div class="select-outlet__item text-center mx-3">
                <a href="<?php echo base_url('product-listing/New-Town');?>" class="select-outlet--link" class="rounded-circle d-block">
                  <img src=" <?php echo base_url('assest/images/new-town-outlet.jpg');?>" alt="outlet image" class="rounded-circle" width="150" />
                </a>
                <p class="text--heading mt-3 font-weight-bold">New Town, Kolkata</p>
              </div>
              <div class="select-outlet__item text-center mx-3">
                <a href="<?php echo base_url('product-listing/Salt-Lake');?>" class="select-outlet--link" class="rounded-circle d-block">
                  <img src="<?php echo base_url('/assest/images/salt-lake-outlet.jpg');?>" alt="outlet image" class="rounded-circle" width="150" />
                </a>
                <p class="text--heading mt-3 font-weight-bold">Salt Lake, Kolkata</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include('template/footer.php');?>