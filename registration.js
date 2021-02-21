   
   $(document).ready(function()
   {
      $("#booknowLayoutGrid1").submit(function(event)
      {
         var isValid = $.validate.form(this);
         return isValid;
      });
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
         error_text: '*Please Enter Your Event Date'
      });
      $("#registrationEditbox1").validate(
      {
         required: true,
         bootstrap: true,
         type: 'email',
         length_min: '8',
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
         error_text: 'Enter Your Email Address'
      });
      $("#indexLayer5").stickylayer({orientation: 4, position: [0, 0], delay: 500});
      $("#indexLayer4").stickylayer({orientation: 6, position: [0, 0], delay: 500});
      $('img[data-src]').lazyload();
   });
      
      var disabled_message = "";
      document.oncontextmenu = function() 
      { 
         return false; 
      }
      document.onmousedown = function md(e) 
      { 
        try 
        { 
           if (event.button==2||event.button==3) 
           {
              if (disabled_message != '')
                 alert(disabled_message);
              return false; 
           }
        }  
        catch (e) 
        { 
           if (e.which == 3) return false; 
        } 
      }
                        
                  var disabled_message = "";
                  document.oncontextmenu = function() 
                  { 
                     return false; 
                  }
                  document.onmousedown = function md(e) 
                  { 
                    try 
                    { 
                       if (event.button==2||event.button==3) 
                       {
                          if (disabled_message != '')
                             alert(disabled_message);
                          return false; 
                       }
                    }  
                    catch (e) 
                    { 
                       if (e.which == 3) return false; 
                    } 
                  }
                  