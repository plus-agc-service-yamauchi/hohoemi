<footer id="contact">
  <div class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018<span class="d-block d-md-none"><br></span> 社会福祉法人ほほえみ - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- footer -->
<!-- JavaScript dependencies -->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Script: Smooth scrolling between anchors in a same page -->
<script src="<?php bloginfo('template_url');?>/js/smooth-scroll.js"></script>
<script src="<?php bloginfo('template_url');?>/js/animate.js"></script>
<script src="<?php bloginfo('template_url');?>/js/wow.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.fatNav.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
<!-- Script: Animated entrance -->
<script src="<?php bloginfo('template_url');?>/js/animate-in.js"></script>
<script>
$('.slick-slider').slick({
  dots: true,
  arrows: false,
  infinite: true,
  autoplay: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [{
    breakpoint: 1024,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: true,
      dots: true
    }
  },
  {
    breakpoint: 600,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 1
    }
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  }
]
});
</script>
<script>
new WOW().init();
</script>
<script>
$(document).ready(function() {
  $.fatNav();
});
</script>
</body>

</html>
