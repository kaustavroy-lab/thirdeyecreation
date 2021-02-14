   
   $(document).ready(function()
   {
      $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
      $("#Progressbar1").progressbar(
      {
         value: 80
      });
      $("#Progressbar2").progressbar(
      {
         value: 23
      });
      $("#Progressbar3").progressbar(
      {
         value: 10
      });
      $("#Progressbar4").progressbar(
      {
         value: 0
      });
      $("#Progressbar5").progressbar(
      {
         value: 0
      });
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
      