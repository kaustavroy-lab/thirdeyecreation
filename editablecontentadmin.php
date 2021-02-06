<?php
   session_start();
   error_reporting(0);
   define('ADMIN_PASS', '21232f297a57a5a743894a0e4a801fc3');
   $session_timeout = 600;
   $username = 'admin';
   $labelHome = 'Home';
   $labelPage = 'Page';
   $labelObject = 'Object';
   $labelLabel = 'Label';
   $labelContent = 'Content';
   $labelAction = 'Action';
   $labelCaption = 'Editable Content Administrator';
   $labelLogin = 'Login';
   $labelLogout = 'Logout';
   $labelEdit = 'Edit';
   $labelSave = 'Save';
   $labelCancel = 'Cancel';
   $labelPassword = 'Password';
   $objects =
   [
      ['page' => 'page1.php', 'object' => 'page1EditableContent1', 'label' => 'page1EditableContent1']
   ];
   $admin_password = isset($_COOKIE['editablecontentadmin_pwd']) ? $_COOKIE['editablecontentadmin_pwd'] : '';

   if (empty($admin_password))
   {
      if (isset($_POST['admin_password']))
      {
         $admin_password = md5($_POST['admin_password']);
         if ($admin_password == ADMIN_PASS)
         {
            setcookie('editablecontentadmin_pwd', $admin_password, time() + $session_timeout);
         }
      }
   }
   else
   if ($admin_password == ADMIN_PASS)
   {
      setcookie('editablecontentadmin_pwd', $admin_password, time() + $session_timeout);
   }
   $authorized = ($admin_password == ADMIN_PASS);
   $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
   if ($authorized)
   {
      $content = isset($_POST['content']) ? $_POST['content'] : '';
      $id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
      $database = [];
      $database_path = '';
      $timestamp = date("y-m-d H:i:s", time());
      if ($action == 'edit' || $action == 'update')
      {
         $database_path = substr($objects[$id]['page'], 0, strrpos($objects[$id]['page'], '.')) . '.json';
         if (!file_exists($database_path)) 
         {
            $html = '';
            $document = new DOMDocument();
            if ($document->loadHTMLFile($objects[$id]['page']))
            {
               $element = $document->getElementById('wb_' . $objects[$id]['object']);
               foreach ($element->childNodes as $node)
               {
                  $html .= $document->saveHTML($node);
               }
            }
            $database = [['object' => $objects[$id]['object'], 'content' => $html, 'modified' => $timestamp]];
            file_put_contents($database_path, json_encode($database, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
         }
         $database = json_decode(file_get_contents($database_path), false);
      }
      if (!empty($action))
      {
         if ($action == 'update')
         {
            $found = false;
            foreach ($database as $key => $object)
            {
               if ($object->object == $objects[$id]['object'])
               {
                  $object->content = $content;
                  $object->modified = $timestamp;
                  $found = true;
                  break;
               }
            }
            if (!$found)
            {
               $database[] = ['object' => $objects[$id]['object'], 'content' => $content, 'modified' => $timestamp];
            }
            file_put_contents($database_path, json_encode($database, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            header('Location: '.basename(__FILE__));
            exit;
         }
         else
         if ($action == 'login')
         {
            $action = '';
         }
         else
         if ($action == 'logout')
         {
            session_unset();
            session_destroy();
            setcookie('editablecontentadmin_pwd', '', time() - 3600);
            header('Location: '.basename(__FILE__));
            exit;
         }
      }
   }
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Editable Content Administrator</title>
<link rel="stylesheet" href="editablecontentadmin.css" type="text/css">
<script type="text/javascript" src="jquery-1.12.4.min.js"></script>
<link rel="stylesheet" href="wwbeditor/wwbeditor.css" type="text/css">
<script type="text/javascript" src="wwbeditor/wwbeditor.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
   $('#editor').wwbeditor({});
   $('ul.tabs').each(function()
   {
      var $active, $content, $links = $(this).find('a');
      if (window.location.hash == '')
      {
         $active = $($links[0]);
      }
      else
      {
         $active = $($links.filter('[href="'+window.location.hash+'"]')[0] || $links[0]);
      }
      $active.addClass('active');
      $content = $($active.attr('href'));
      $links.not($active).each(function ()
      {
         $($(this).attr('href')).hide();
      });
      $(this).on('click', 'a', function(e)
      {
         $active.removeClass('active');
         $content.hide();
         $active = $(this);
         $content = $($(this).attr('href'));
         $active.addClass('active');
         $content.show();
         e.preventDefault();
      });
   });
});
</script>
</head>
<body>
<?php

   if (!$authorized)
   {
      echo "<table width=\"100%\" border=\"0\">\n";
      echo "<tr><td colspan=\"2\" align=\"center\">$labelCaption<br>&nbsp;</td></tr>\n";
      echo "<form method=\"post\" action=\"" .basename(__FILE__) . "\">\n";
      echo "<tr><td width=\"50%\" align=\"right\"><label for=\"admin_password\">$labelPassword&nbsp;&nbsp;</label></td><td><input class=\"form-control\" type=\"password\" id=\"admin_password\" name=\"admin_password\" size=\"20\"></td></tr>\n";
      echo "<tr><td>&nbsp;</td><td align=\"left\"><input class=\"btn\" type=\"submit\" value=\"$labelLogin\" name=\"submit\"></td></tr>\n";
      echo "<input type=\"hidden\" name=\"action\" value=\"login\">\n";
      echo "</form>\n";
      echo "</tr></td></table>\n";
   }
   else
   {
      echo "<ul id=\"nav\">\n";
      echo "   <li><a href=\"" . basename(__FILE__) . "\">$labelHome</a></li>\n";
      echo "   <li><a href=\"" . basename(__FILE__) . "?action=logout\">$labelLogout</a></li>\n";
      echo "</ul>\n";
      if (!empty($action))
      {
         if ($action == 'edit')
         {
            $content_value = '';
            $document = new DOMDocument();
            if ($document->loadHTMLFile($objects[$id]['page']))
            {
               $element = $document->getElementById('wb_' . $objects[$id]['object']);
               foreach ($element->childNodes as $node)
               {
                  $content_value .= $document->saveHTML($node);
               }
            }
            foreach ($database as $key => $object)
            {
               if ($object->object == $objects[$id]['object'])
               {
                  $content_value = $object->content;
                  break;
               }
            }
            echo "<form action=\"" . basename(__FILE__) . "\" method=\"post\">\n";
            echo "<input type=\"hidden\" name=\"action\" value=\"update\">\n";
            echo "<input type=\"hidden\" name=\"id\" value=\"". $id . "\">\n";
            echo "<table width=\"100%\" border=\"0\">\n";
            echo "<tr><td><label for=\"page\">$labelPage</label></td>\n";
            echo "<td><input class=\"form-control\" type=\"text\" style=\"width:100%;\" id=\"page\" name=\"page\" value=\"" . $objects[$id]['page'] . "\" disabled readonly></td></tr>\n";
            echo "<tr><td><label for=\"label\">$labelLabel</label></td>\n";
            echo "<td><input class=\"form-control\" type=\"text\" style=\"width:100%;\" id=\"label\" name=\"label\" value=\"" . $objects[$id]['label'] . "\" disabled readonly></td></tr>\n";
            echo "<tr><td><label for=\"object\">$labelObject</label></td>\n";
            echo "<td><input class=\"form-control\" type=\"text\" style=\"width:100%;\" id=\"object\" name=\"object\" value=\"" . $objects[$id]['object'] . "\" disabled readonly></td></tr>\n";
            echo "<tr><td><label for=\"editor\">$labelContent</label></td>\n";
            echo "<td><textarea id=\"editor\" style=\"width:100%;height:200px\" name=\"content\">" . $content_value . "</textarea></td></tr>\n";
            echo "</table>\n";
            echo "<input class=\"btn\" style=\"margin-top:6px;\" type=\"submit\" name=\"save\" value=\"$labelSave\">\n";
            echo "<a href=\"" . basename(__FILE__) . "\" class=\"btn\" style=\"margin-top:6px;\">$labelCancel</a>\n";
            echo "</form>\n";
         }
      }
      else
      {
         echo "<table class=\"table table-striped table-hover\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\n";
         echo "<thead><tr><th>$labelPage</th><th>$labelObject</th><th>$labelAction</th></tr></thead>\n";
         echo "<tbody>\n";
         for ($i=0; $i<count($objects); $i++)
         {
            echo "<tr>\n";
            echo "<td>" . $objects[$i]['page'] . "</td>\n";
            echo "<td>" . $objects[$i]['label'] . "</td>\n";
            echo "<td>\n";
            echo "   <a href=\"" . basename(__FILE__) . "?action=edit&id=" . $i . "\">$labelEdit</a>\n";
            echo "</td>\n";
            echo "</tr>\n";
         }
         echo "</tbody>\n";
         echo "</table>\n";
      }
   }

?>
</body>
</html>
