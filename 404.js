   
   $(document).ready(function()
   {
      $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
      $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
      $("#wb_TabMenu2").affix({offset:{top: $("#wb_TabMenu2").offset().top}});
      $('img[data-src]').lazyload();
   });
