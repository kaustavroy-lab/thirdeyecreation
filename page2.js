$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
   $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
   $('img[data-src]').lazyload();
});
