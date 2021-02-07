$(document).ready(function()
{
   $("#booknowLayoutGrid1").submit(function(event)
   {
      var isValid = $.validate.form(this);
      return isValid;
   });
   $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
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
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-, . /]*$/,
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
   $("#booknowEditbox6").validate(
   {
      required: true,
      bootstrap: true,
      type: 'text',
      length_min: '2',
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
      error_text: '*Please Enter Your Date Of Birth'
   });
   $("#CareerEditbox1").validate(
   {
      required: true,
      bootstrap: true,
      type: 'email',
      length_min: '10',
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
   $("#CareerEditbox2").validate(
   {
      required: false,
      bootstrap: true,
      type: 'custom',
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-, . /]*$/,
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
   $("#CareerEditbox3").validate(
   {
      required: true,
      bootstrap: true,
      type: 'custom',
      param: /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/,
      length_min: '4',
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
   $("#CareerEditbox4").validate(
   {
      required: true,
      bootstrap: true,
      type: 'custom',
      param: /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/,
      length_min: '4',
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
   $("#CareerEditbox5").validate(
   {
      required: true,
      bootstrap: true,
      type: 'custom',
      param: /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/,
      length_min: '4',
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
   $("#CareerEditbox6").validate(
   {
      required: false,
      bootstrap: true,
      type: 'text',
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
      error_text: ''
   });
   $("#CareerEditbox7").validate(
   {
      required: true,
      bootstrap: true,
      type: 'custom',
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-, . / " ; : -]*$/,
      length_min: '10',
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
      error_text: 'minimum 50 words'
   });
   $("#CareerCheckbox1").validate(
   {
      required: true,
      bootstrap: true,
      type: 'checkbox',
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
      error_text: 'Accept To Continue'
   });
   $("#CareerCheckbox1").change(function()
   {
      if ($('#CareerCheckbox1').is(':checked'))
      {
         ShowObjectWithEffect('booknowButton1', 1, '', 0);
      }
      if (!$('#CareerCheckbox1').is(':checked'))
      {
         ShowObjectWithEffect('booknowButton1', 0, '', 0);
      }
   });
   $("#CareerCheckbox1").trigger('change');
   $('img[data-src]').lazyload();
});
