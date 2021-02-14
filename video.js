   
   var playerYouTube1;
   var playerYouTube2;
   function onYouTubeIframeAPIReady() {
      playerYouTube1 = new YT.Player('YouTube1', {
         events: {
         }
      });
      playerYouTube2 = new YT.Player('YouTube2', {
         events: {
         }
      });
   }
   
   $(document).ready(function()
   {
      const plyrYouTube1 = new Plyr('#wb_YouTube1', {loadSprite: false, iconUrl: 'plyr.svg'});
      const plyrYouTube2 = new Plyr('#wb_YouTube2', {loadSprite: false, iconUrl: 'plyr.svg'});
      $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
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
      