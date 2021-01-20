$(document).ready(function()
{
   $("a[data-rel='PhotoGallery1']").attr('rel', 'PhotoGallery1');
   $("#PhotoGallery1").magnificPopup({delegate:'a', type:'image', gallery: {enabled: true, navigateByImgClick: true}});
   $("a[data-rel='PhotoGallery2']").attr('rel', 'PhotoGallery2');
   $("#PhotoGallery2").magnificPopup({delegate:'a', type:'image', gallery: {enabled: true, navigateByImgClick: true}});
   $("a[data-rel='PhotoGallery3']").attr('rel', 'PhotoGallery3');
   $("#PhotoGallery3").magnificPopup({delegate:'a', type:'image', gallery: {enabled: true, navigateByImgClick: true}});
   $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
   $('img[data-src]').lazyload();
});
