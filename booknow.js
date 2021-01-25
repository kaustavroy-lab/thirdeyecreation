$(document).ready(function()
{
   $("#booknowLayoutGrid1").submit(function(event)
   {
      var isValid = $.validate.form(this);
      return isValid;
   });
   $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
   $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
   function skrollrInit()
   {
      skrollr.init({forceHeight: false, mobileCheck: function() { return false; }, smoothScrolling: false});
   }
   skrollrInit();
   $("#booknowEditbox1").validate(
   {
      required: true,
      bootstrap: true,
      type: 'custom',
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f]*$/,
      length_min: '3',
      length_max: '100',
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
      error_text: 'Required'
   });
   $("#booknowEditbox2").validate(
   {
      required: true,
      bootstrap: true,
      type: 'number',
      expr_min: '',
      expr_max: '',
      value_min: '10',
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
      error_text: '*Required'
   });
   $("#booknowEditbox3").validate(
   {
      required: true,
      bootstrap: true,
      type: 'custom',
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-]*$/,
      length_min: '3',
      length_max: '100',
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
      error_text: '*Required'
   });
   $("#booknowCombobox1").validate(
   {
      required: true,
      bootstrap: true,
      type: 'select',
      disallowfirstchoice: true,
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
      error_text: '*Required'
   });
   $("#booknowEditbox4").validate(
   {
      required: true,
      bootstrap: true,
      type: 'custom',
      param: /^[0-9-]*$/,
      length_min: '5',
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
      error_text: '*Required'
   });
   $("#booknowEditbox5").validate(
   {
      required: false,
      bootstrap: true,
      type: 'custom',
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-]*$/,
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
   $("#booknowEditbox6").validate(
   {
      required: true,
      bootstrap: true,
      type: 'text',
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
      error_text: '*Required'
   });
   $('img[data-src]').lazyload();
});
