$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
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
   $('img[data-src]').lazyload();
});
