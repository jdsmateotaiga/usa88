</main>
    <footer>
      <div class="container">
        <div class="row">
          <div class="footer-item footer-logo col-md-2 text-center">
            <div>
              <a href="#">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/logo2.gif" alt="<?= get_bloginfo( 'name' ) ?>">
              </a>
            </div>
          </div>
          <div class="footer-item col-md-8">
            <p>USA88 is a trusted lubricant manufacturing and distribution company that aims to provide the best lubrication solution for total customer satisfaction.</p>
          </div>
          <div class="footer-item footer-contact col-md-2">
            <h4>CONTACT US:</h4>
            <ul>
              <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:027443467">(02) 744 3467</a></li>
              <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:usa88@gmail.com">usa88@gmail.com</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <?php wp_footer(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js" integrity="sha256-399DNRyfIpWIy1ZV0KmEIIuIQ5sBHdLu9MBtVHrNtt8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        var owl = $('#slider');
        owl.owlCarousel({
            loop: true,
            items: 1,
            nav: false,
            // navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            autoplay:true,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            animateOut: 'fadeOut',
            dots: false,
        });
        owl.on('changed.owl.carousel', function(event) {
            var item = event.item.index - 2;     // Position of the current item
            $('#slider .slider-content').removeClass('animated fadeInLeft');
            $('.owl-item').not('.cloned').eq(item).find('.slider-content').addClass('animated fadeInLeft');
        });
        $(window).scroll(function(){
          nav_scroll();
        });
        nav_scroll();
        function nav_scroll() {
          var sticky = $('.sticky, main'),
              scroll = $(window).scrollTop();
          if (scroll > 1) {
            sticky.addClass('fixed');
          } else if(scroll < 15) {
            sticky.removeClass('fixed');
          }
        }
        $(document).on("scroll", onScroll);
        function onScroll(event){
          var scrollPos = $(document).scrollTop();
          $('.navbar-nav li a').each(function () {
              var currLink = $(this);
              var refElement = $(currLink.attr("href"));

                if((scrollPos + $(window).height()) === $(document).height()) {
                  $('.scroll_nav .contact').addClass('active').siblings().removeClass('active');
                } else {
                  try {
                    if ((refElement.position().top - 120) <= scrollPos && (refElement.position().top) + refElement.height() - 120 > scrollPos) {
                      currLink.addClass("active").siblings().removeClass('active');
                    } else{
                        currLink.removeClass("active");
                    }
                  } catch(e) {
                    console.log('scrolling');
                  }
                }
          });
        }
        $('.scroll-div a').click(function(e){
          e.preventDefault();
          var id = $(this).attr('href');
          $('body, html').animate({
            scrollTop: $(id).offset().top - 30
          })
        })
      });
    </script>
  </body>
</html>
