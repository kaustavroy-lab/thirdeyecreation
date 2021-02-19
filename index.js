   
   $(document).ready(function()
   {
      $("#CardContainer1").owlCarousel({autoplayTimeout:7000, margin: 16, autoplay: true, nav: false, loop: true, dots: false, items: 1, slideBy: 1});
      function skrollrInit()
      {
         skrollr.init({forceHeight: false, mobileCheck: function() { return false; }, smoothScrolling: false});
      }
      skrollrInit();
      $("a[data-rel='PhotoCollage1']").attr('rel', 'PhotoCollage1');
      $("#PhotoCollage1").magnificPopup({delegate:'a', type:'image', gallery: {enabled: true, navigateByImgClick: true}});
      $("#PhotoCollage1").photocollage({ effect: 'css', duration: 600, padding: 3, lazyload: true, matrix: '1,2,0,1,0,0,1,1,1' });
      $("a[data-rel='indexPhotoCollage1']").attr('rel', 'indexPhotoCollage1');
      $('#wb_indexPhotoCollage1 img').attr('title', '');$('#wb_indexPhotoCollage1').galleria({height:1});
      $("#indexPhotoCollage1").photocollage({ effect: 'none', duration: 600, padding: 3, lazyload: true, matrix: '2,0,2,0,1,1,0,0,0,0,2,0,4,0,0,0,0,0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0,1,1' });
      $('#indexLayer6').on('show.bs.modal', function (e) 
      {
         $('#indexLayer6 .modal-dialog').removeClass('animate-hide');
         $('#indexLayer6 .modal-dialog').addClass('animate-show');
      });
      $('#indexLayer6').on('hide.bs.modal', function (e)
      {
         $('#indexLayer6 .modal-dialog').removeClass('animate-show');
         var element = document.getElementById('indexLayer6');
         var forceReflow = element.offsetWidth;
         $('#indexLayer6 .modal-dialog').addClass('animate-hide');
      });
      $("#indexEditbox3").validate(
      {
         required: true,
         bootstrap: true,
         type: 'custom',
         param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ]*$/,
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
      $("#indexEditbox4").validate(
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
      $("#indexLayer5").stickylayer({orientation: 4, position: [0, 0], delay: 500});
      $("#indexLayer4").stickylayer({orientation: 6, position: [0, 0], delay: 500});
      $('img[data-src]').lazyload();
   });
      
      var wb_indexTimer2;
      function TimerStartindexTimer2()
      {
         wb_indexTimer2 = setTimeout(function()
         {
            var event = null;
            ShowObject('indexLayer1', 1);
         }, 20000);
      }
      function TimerStopindexTimer2()
      {
         clearTimeout(wb_indexTimer2);
      }
      TimerStartindexTimer2();
            
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
                  