   
   $(document).ready(function()
   {
      $("a[data-rel='PhotoGallery1']").attr('rel', 'PhotoGallery1');
      $("#PhotoGallery1").magnificPopup({delegate:'a', type:'image', gallery: {enabled: true, navigateByImgClick: true}});
      $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
      $('#indexLayer1').on('show.bs.modal', function (e) 
      {
         $('#indexLayer1 .modal-dialog').removeClass('animate-hide');
         $('#indexLayer1 .modal-dialog').addClass('animate-show');
      });
      $('#indexLayer1').on('hide.bs.modal', function (e)
      {
         $('#indexLayer1 .modal-dialog').removeClass('animate-show');
         var element = document.getElementById('indexLayer1');
         var forceReflow = element.offsetWidth;
         $('#indexLayer1 .modal-dialog').addClass('animate-hide');
      });
      $("#indexEditbox1").validate(
      {
         required: true,
         bootstrap: true,
         type: 'custom',
         param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f]*$/,
         length_min: '3',
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
         error_text: 'Enter Your Correct Name'
      });
      $("#indexEditbox2").validate(
      {
         required: true,
         bootstrap: true,
         type: 'number',
         expr_min: '',
         expr_max: '',
         value_min: '',
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
         error_text: 'Enter Your Correct Number'
      });
      $("a[href*='#links']").click(function(event)
      {
         event.preventDefault();
         $('html, body').stop().animate({ scrollTop: $('#wb_links').offset().top }, 600, 'easeOutSine');
      });
      $('img[data-src]').lazyload();
   });
   
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());
   
     gtag('config', 'G-08TX0J3LS1');
   
     window.OneSignal = window.OneSignal || [];
     OneSignal.push(function() {
       OneSignal.init({
         appId: "f3ff023e-7e2c-4ed3-bd00-8753f090ffc4",
       });
     });
      
      var wb_indexTimer1;
      function TimerStartindexTimer1()
      {
         wb_indexTimer1 = setTimeout(function()
         {
            var event = null;
            $('#indexLayer1').modal('show');
         }, 30000);
      }
      function TimerStopindexTimer1()
      {
         clearTimeout(wb_indexTimer1);
      }
      TimerStartindexTimer1();
            
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
                  