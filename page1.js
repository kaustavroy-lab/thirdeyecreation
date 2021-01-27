$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
   $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
   $("#page1LayoutGrid1").submit(function(event)
   {
      var isValid = $.validate.form(this);
      return isValid;
   });
   LoadValue('page1Editbox1', 'session', 0);
   LoadValue('page1Editbox2', 'session', 0);
   $("#page1LayoutGrid1").submit(function(event)
   {
      StoreValue('page1Editbox1', 'session', 0);
      StoreValue('page1Editbox2', 'session', 0);
      return true;
   });
   $("#page1FileUpload1 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
      input.blur();
   });
   $("#page1FileUpload1 .form-control").validate(
   {
      required: true,
      bootstrap: true,
      type: 'custom',
      param: /([^\/\\]+)\.(pdf)$/i,
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
            const scriptURL = 'https://script.google.com/macros/s/AKfycbzr7xdp8kPWuM1trtibP6H0SJ7p1WLNmhdVb4jmpNSavKbp25OEuafz/exec'
            const form = document.forms['google-sheet']
          
            form.addEventListener('submit', e => {
              e.preventDefault()
              fetch(scriptURL, { method: 'POST', body: new FormData(form)})
                .then(response => alert("Thanks for Contacting us..! We Will Contact You Soon..."))
                .catch(error => console.error('Error!', error.message))
            })
          