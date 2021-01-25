$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
   $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
   $("#page1LayoutGrid1").submit(function(event)
   {
      var isValid = $.validate.form(this);
      return isValid;
   });
   $("#page1FileUpload1 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
      input.blur();
   });
   $("#page1FileUpload1 .form-control").validate(
   {
      required: false,
      bootstrap: true,
      type: 'custom',
      param: /([^\/\\]+)\.(jpg)$/i,
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
      error_text: ''
   });
   $('img[data-src]').lazyload();
});
