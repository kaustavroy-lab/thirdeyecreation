   
   $(document).ready(function()
   {
      $("#shopsCardContainer1").owlCarousel({autoplayTimeout:5000, margin: 16, autoplay: true, nav: false, loop: true, dots: false, items: 1, slideBy: 1});
      $('img[data-src]').lazyload();
   });
