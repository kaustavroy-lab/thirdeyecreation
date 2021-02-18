   
   $(document).ready(function()
   {
      function skrollrInit()
      {
         skrollr.init({forceHeight: false, mobileCheck: function() { return false; }, smoothScrolling: false});
      }
      skrollrInit();
      $("#indexLayer5").stickylayer({orientation: 4, position: [0, 0], delay: 500});
      $("#indexLayer4").stickylayer({orientation: 6, position: [0, 0], delay: 500});
      $('img[data-src]').lazyload();
   });
   
   $(document).ready(function()
   {
      var $countup = $('#count-up h1');
      
      $countup.each(function() 
      {
        var $obj = $(this);
        $obj.data('value', parseInt($obj.html()));
        $obj.data('done', false);
        $obj.html('0');
      });
      $(window).bind('scroll', function() 
      {
         $countup.each(function() 
         {
            var $obj = $(this);
            if (!$obj.data('done') && $(window).scrollTop() + $(window).height() >= $obj.offset().top) 
            {
               $obj.data('done', true);
               $obj.animate({scroll: 1}, 
               { 
                  duration: 3000, 
                  step: function(now) 
                  {
                     var $obj = $(this);
                     var val = Math.round($obj.data('value') * now);
                     $obj.html(val);
                  }
               });
            }
         });
      }).triggerHandler('scroll');
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
                  