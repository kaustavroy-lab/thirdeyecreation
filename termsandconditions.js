   
   $(document).ready(function()
   {
      $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
      $('img[data-src]').lazyload();
   });
