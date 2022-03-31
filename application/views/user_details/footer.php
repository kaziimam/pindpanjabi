
    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer__top bg--dark">
        <div class="container">
          <div class="site-footer__logo d-flex justify-content-center">
            <a href="#"><img src="https://pindpunjabidhaba.com/wp-content/uploads/2022/02/Pind-Punjabi-dhaba_01-1.png" alt="logo light" width="80" /></a>
          </div>
          <div class="row mt-5 text-center justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
              <div class="site-footer__content mb-5">
                <h4 class="content__heading text--uppercase mb-4">Address</h4>
                <p class="text--sm text--light-muted">120, Lorem Ipsum Street, Kolkata 700700</p>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
              <div class="site-footer__content mb-5">
                <h4 class="content__heading text--uppercase mb-4">Book a table</h4>
                <p class="text--sm text--light-muted">Lorem ipsum dolor sit amet dolor sit costa rica hsyanley</p>
                <h5 class="text--primary"><a href="tel:(850) 435-4155" class="site-footer__contact--phone">(850) 435-4155</a></h5>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
              <div class="site-footer__content mb-5">
                <h4 class="content__heading text--uppercase mb-4">Openning Hours</h4>
                <p class="text--sm text--light-muted mb-1"><span>Monday - Friday</span>: <span class="text--light">8am - 4pm</span></p>
                <p class="text--sm text--light-muted"><span>Saturday</span>: <span class="text--light">9am - 5pm</span></p>
                <ul class="site-footer-social-links d-flex justify-content-center">
                  <li class="site-footer-link__item mr-3">
                    <a href="" class="site-footer-link__item--link" target="_blank"><i class="fab fa-facebook"></i></a>
                  </li>
                  <li class="site-footer-link__item mr-3">
                    <a href="" class="site-footer-link__item--link" target="_blank"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li class="site-footer-link__item mr-3">
                    <a href="" class="site-footer-link__item--link" target="_blank"><i class="fab fa-youtube"></i></a>
                  </li>
                  <li class="site-footer-link__item">
                    <a href="" class="site-footer-link__item--link" target="_blank"><i class="fab fa-pinterest"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-3">
              <div class="site-footer__content">
                <h4 class="content__heading text--uppercase mb-4">Newsletter</h4>
                <p class="text--sm text--light-muted">Subscribe to the weekly newsletter for all the latest updates</p>
                <form action="#" class="site-footer__subscribe-form d-flex justify-content-center" id="footerSubscribeForm">
                  <div class="input-container d-flex justify-content-between">
                    <input type="email" name="subscribeEmail" placeholder="Your Email..." class="subscribe-form__input" required />
                    <button type="submit" class="subscribe-form__btn--submit">Subscribe</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="site-footer__bottom bg--primary">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-6 text-center text-md-left">
              <p class="text--sm text--light mb-md-0">Copyright © 2022. All Rights Reserved. Made By <a href="https://thinksurfmedia.com/" target="_blank" class="site-creator--link">Think Surf Media</a></p>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right">
              <p class="mb-md-0"><img src="https://pindpunjabidhaba.com/wp-content/uploads/2020/08/footer_img1-1.png" alt="payment methods" class="d-inline-block" /></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
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
                <a href="<?php echo base_url('product-listing/New-Town')?>" class="select-outlet--link" class="rounded-circle d-block">
                  <img src="<?php echo base_url('/assest/images/new-town-outlet.jpg');?>" alt="outlet image" class="rounded-circle" width="150" />
                </a>
                <p class="text--heading mt-3 font-weight-bold">New Town, Kolkata</p>
              </div>
              <div class="select-outlet__item text-center mx-3">
                <a href="<?php echo base_url('product-listing/Salt-Lake')?>" class="select-outlet--link" class="rounded-circle d-block">
                  <img src="<?php echo base_url('/assest/images/salt-lake-outlet.jpg');?>" alt="outlet image" class="rounded-circle" width="150" />
                </a>
                <p class="text--heading mt-3 font-weight-bold">Salt Lake, Kolkata</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('/assest/vendor/bootstrap-4.6.1-dist/js/bootstrap.bundle.min.js');?>"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
    <script src="<?php echo base_url('/assest/js/script.js')?>"></script>
    
    <script src="<?php echo base_url('/assest/js/cart.js')?>"></script>
  </body>
</html>
