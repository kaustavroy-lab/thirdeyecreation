   
   $(document).ready(function()
   {
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
                  