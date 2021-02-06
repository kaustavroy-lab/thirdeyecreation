$(document).ready(function()
{
   $("a[data-rel='PhotoGallery1']").attr('rel', 'PhotoGallery1');
   $("#PhotoGallery1").magnificPopup({delegate:'a', type:'image', gallery: {enabled: true, navigateByImgClick: true}});
   $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
   $("#galleryLayer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
   $('img[data-src]').lazyload();
});
