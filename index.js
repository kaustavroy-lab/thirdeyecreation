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
   $("#PhotoCollage1").photocollage({ effect: 'css', duration: 600, padding: 3, lazyload: true, matrix: '1,2,0,1,0,0,1,1,1' });
   $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
   $("a[data-rel='indexPhotoCollage1']").attr('rel', 'indexPhotoCollage1');
   $('#wb_indexPhotoCollage1 img').attr('title', '');$('#wb_indexPhotoCollage1').galleria({height:1});
   $("#indexPhotoCollage1").photocollage({ effect: 'none', duration: 600, padding: 3, lazyload: true, matrix: '1,2,0,1,0,0,1,1,1' });
   $('#indexLayer1').on('show.bs.modal', function (e) 
   {
      $('#indexLayer1 .modal-dialog').removeClass('animate-hide');
      $('#indexLayer1 .modal-dialog').addClass('animate-show');
   });
   $('#indexLayer1').on('hide.bs.modal', function (e)
   {
      $('#indexLayer1 .modal-dialog').removeClass('animate-show');
      var element = document.getElementById('indexLayer1');
      var forceReflow = element.offsetWidth;
      $('#indexLayer1 .modal-dialog').addClass('animate-hide');
   });
   $("#indexEditbox1").validate(
   {
      required: true,
      bootstrap: true,
      type: 'custom',
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ]*$/,
      length_min: '3',
      color_text: '#000000',
      color_hint: '#00FF00',
      color_error: '#FF0000',
      color_border: '#808080',
      nohint: false,
      font_family: 'Arial',
      font_size: '13px',
      position: 'topleft',
      offsetx: 0,
      offsety: 0,
      effect: 'none',
      error_text: 'Enter Your Correct Name'
   });
   $("#indexEditbox2").validate(
   {
      required: true,
      bootstrap: true,
      type: 'number',
      expr_min: '',
      expr_max: '',
      value_min: '',
      value_max: '',
      length_min: '9',
      length_max: '10',
      color_text: '#000000',
      color_hint: '#00FF00',
      color_error: '#FF0000',
      color_border: '#808080',
      nohint: false,
      font_family: 'Arial',
      font_size: '13px',
      position: 'topleft',
      offsetx: 0,
      offsety: 0,
      effect: 'none',
      error_text: 'Enter Your Correct Number'
   });
   $('img[data-src]').lazyload();
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
var wb_indexTimer1;
function TimerStartindexTimer1()
{
   wb_indexTimer1 = setTimeout(function()
   {
      var event = null;
      $('#indexLayer1').modal('show');
   }, 15000);
}
function TimerStopindexTimer1()
{
   clearTimeout(wb_indexTimer1);
}
TimerStartindexTimer1();
