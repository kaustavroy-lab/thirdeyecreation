   
   $(document).ready(function()
   {
      $("#registrationon_tecThemeableButton1").button({ icon: 'ui-primary', iconPosition: 'beginning' });
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
      