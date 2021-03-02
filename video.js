   
   var playerYouTube1;
   var playerYouTube2;
   var playervideoYouTube1;
   function onYouTubeIframeAPIReady() {
      playerYouTube1 = new YT.Player('YouTube1', {
         events: {
         }
      });
      playerYouTube2 = new YT.Player('YouTube2', {
         events: {
         }
      });
      playervideoYouTube1 = new YT.Player('videoYouTube1', {
         events: {
         }
      });
   }
   
   $(document).ready(function()
   {
      const plyrYouTube1 = new Plyr('#wb_YouTube1', {loadSprite: false, iconUrl: 'plyr.svg'});
      const plyrYouTube2 = new Plyr('#wb_YouTube2', {loadSprite: false, iconUrl: 'plyr.svg'});
      const plyrvideoYouTube1 = new Plyr('#wb_videoYouTube1', {loadSprite: false, iconUrl: 'plyr.svg'});
      $("#indexLayer5").stickylayer({orientation: 4, position: [0, 0], delay: 500});
      $("#indexLayer4").stickylayer({orientation: 6, position: [0, 0], delay: 500});
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
                  