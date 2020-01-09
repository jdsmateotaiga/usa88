    <footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">aside</div>
          <div class="col-md-6">asd</div>
          <div class="col-md-3">asd</div>
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
        $('#slider').owlCarousel({
            loop: true,
            items: 1,
            nav: true,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            autoplay:true,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            animateOut: 'fadeOut',
            dots: false,
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
      });
    </script>
  </body>
</html>
