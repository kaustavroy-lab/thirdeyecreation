   
   $(document).ready(function()
   {
      $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
      $("#Progressbar1").progressbar(
      {
         value: 80
      });
      $("#Progressbar2").progressbar(
      {
         value: 23
      });
      $("#Progressbar3").progressbar(
      {
         value: 10
      });
      $("#Progressbar4").progressbar(
      {
         value: 0
      });
      $("#Progressbar5").progressbar(
      {
         value: 0
      });
      $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
      $("#wb_TabMenu2").affix({offset:{top: $("#wb_TabMenu2").offset().top}});
      $('img[data-src]').lazyload();
   });
