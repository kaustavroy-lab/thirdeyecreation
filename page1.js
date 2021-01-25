function submitcontact()
{
   var regexp;
   var page1FileUpload1 = document.getElementById('page1FileUpload1');
   var page1FileUpload1_file = document.getElementById('page1FileUpload1-file');
   if (!(page1FileUpload1.disabled ||
         page1FileUpload1.style.display === 'none' ||
         page1FileUpload1.style.visibility === 'hidden'))
   {
      var ext = page1FileUpload1_file.value.substr(page1FileUpload1_file.value.lastIndexOf('.'));
      if ((ext.toLowerCase() != ".jpg") &&
          (ext != ""))
      {
         alert("The \"file\" field contains an unapproved filename.");
         return false;
      }
   }
   return true;
}
$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
   $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
   $("#page1FileUpload1 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
   $('img[data-src]').lazyload();
});
