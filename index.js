$(document).ready(function()
{
   $("#CardContainer1").owlCarousel({autoplayTimeout:5000, margin: 16, autoplay: true, nav: false, loop: true, dots: false, items: 1, slideBy: 1});
   function skrollrInit()
   {
      skrollr.init({forceHeight: false, mobileCheck: function() { return false; }, smoothScrolling: false});
   }
   skrollrInit();
   $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
   $("a[data-rel='PhotoCollage1']").attr('rel', 'PhotoCollage1');
   $("#PhotoCollage1").magnificPopup({delegate:'a', type:'image', gallery: {enabled: true, navigateByImgClick: true}});
   $("#PhotoCollage1").photocollage({ effect: 'scale', duration: 600, padding: 4, matrix: '1,1,1,1,1,4,0,0,0,1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1' });
   $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
   $("a[data-rel='PhotoCollage2']").attr('rel', 'PhotoCollage2');
   $("#PhotoCollage2").magnificPopup({delegate:'a', type:'image', gallery: {enabled: true, navigateByImgClick: true}});
   $("#PhotoCollage2").photocollage({ effect: 'scale', duration: 600, padding: 4, matrix: '1,1,1,1,1,4,0,0,0,1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1' });
   $('img[data-src]').lazyload();
   if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {$('#preloader').remove();}
});
$(window).on('load', function()
{
   $('#preloader').remove();
});
$(document).ready(function()
{
   var $countup = $('#count-up h1');
   
   $countup.each(function() 
   {
     var $obj = $(this);
     $obj.data('value', parseInt($obj.html()));
     $obj.data('done', false);
     $obj.html('0');
   });
   $(window).bind('scroll', function() 
   {
      $countup.each(function() 
      {
         var $obj = $(this);
         if (!$obj.data('done') && $(window).scrollTop() + $(window).height() >= $obj.offset().top) 
         {
            $obj.data('done', true);
            $obj.animate({scroll: 1}, 
            { 
               duration: 3000, 
               step: function(now) 
               {
                  var $obj = $(this);
                  var val = Math.round($obj.data('value') * now);
                  $obj.html(val);
               }
            });
         }
      });
   }).triggerHandler('scroll');
});
