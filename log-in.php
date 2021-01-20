<?php
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formid']) && $_POST['formid'] == 'log-inlayoutgrid2')
{
   $mailto = 'kaustavroy338@gmail.com';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'Website form';
   $message = 'Values submitted from web site form:';
   $success_url = './gallery.html';
   $error_url = './about.html';
   $eol = "\n";
   $error = '';
   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field", "g-recaptcha-response");
   $boundary = md5(uniqid(time()));
   $header  = 'From: '.$mailfrom.$eol;
   $header .= 'Reply-To: '.$mailfrom.$eol;
   $header .= 'MIME-Version: 1.0'.$eol;
   $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
   $header .= 'X-Mailer: PHP v'.phpversion().$eol;
   try
   {
      if (!ValidateEmail($mailfrom))
      {
         $error .= "The specified email address (" . $mailfrom . ") is invalid!\n<br>";
         throw new Exception($error);
      }
      $message .= $eol;
      $message .= "IP Address : ";
      $message .= $_SERVER['REMOTE_ADDR'];
      $message .= $eol;
      foreach ($_POST as $key => $value)
      {
         if (!in_array(strtolower($key), $internalfields))
         {
            if (is_array($value))
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
            }
            else
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
            }
         }
      }
      $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
      $body .= '--'.$boundary.$eol;
      $body .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
      $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
      $body .= $eol.stripslashes($message).$eol;
      if (!empty($_FILES))
      {
         foreach ($_FILES as $key => $value)
         {
             if ($_FILES[$key]['error'] == 0)
             {
                $body .= '--'.$boundary.$eol;
                $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
                $body .= 'Content-Transfer-Encoding: base64'.$eol;
                $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
                $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
             }
         }
      }
      $body .= '--'.$boundary.'--'.$eol;
      if ($mailto != '')
      {
         mail($mailto, $subject, $body, $header);
      }
      header('Location: '.$success_url);
   }
   catch (Exception $e)
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $e->getMessage(), $errorcode);
      echo $errorcode;
   }
   exit;
}
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'loginform')
{
   $success_page = './index.html';
   if (isset($_SESSION['referrer']))
   {
      $success_page = $_SESSION['referrer'];
   }
   $error_page = './Career.html';
   $usernames = array('Kittu','abcd');
   $passwords = array('e8dc4081b13434b45189a720b77b6818','098f6bcd4621d373cade4e832627b4f6');
   $fullnames = array('Kaustav Roy','asdf');
   $crypt_pass = md5($_POST['password']);
   $found = false;
   $fullname = '';
   $session_timeout = 600;
   for ($i=0; $i<count($usernames); $i++)
   {
      if ($usernames[$i] == $_POST['username'] && $passwords[$i] == $crypt_pass)
      {
         $found = true;
         $fullname = $fullnames[$i];
      }
   }
   if ($found == false)
   {
      header('Location: '.$error_page);
      exit;
   }
   else
   {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['fullname'] = $fullname;
      $_SESSION['expires_by'] = time() + $session_timeout;
      $_SESSION['expires_timeout'] = $session_timeout;
      $rememberme = isset($_POST['rememberme']) ? true : false;
      if ($rememberme)
      {
         setcookie('username', $_POST['username'], time() + 3600*24*30);
         setcookie('password', $_POST['password'], time() + 3600*24*30);
      }
      header('Location: '.$success_page);
      exit;
   }
}
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
$database = './usersdb.php';
$success_page = './index.html';
$activated_page = './Career.html';
$error_message = "";
if (!file_exists($database))
{
   die('User database not found!');
   exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'signupform')
{
   $newusername = $_POST['username'];
   $newemail = $_POST['email'];
   $newpassword = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];
   $newfullname = $_POST['fullname'];
   $website = $_SERVER['HTTP_HOST'];
   $script = $_SERVER['SCRIPT_NAME'];
   $timestamp = time();
   $code = md5($website.$timestamp.rand(100000, 999999));
   if ($newpassword != $confirmpassword)
   {
      $error_message = 'Password and Confirm Password are not the same!';
   }
   else
   if (!preg_match("/^[A-Za-z0-9-_!@$]{1,50}$/", $newusername))
   {
      $error_message = 'Username is not valid, please check and try again!';
   }
   else
   if (!preg_match("/^[A-Za-z0-9-_!@$]{1,50}$/", $newpassword))
   {
      $error_message = 'Password is not valid, please check and try again!';
   }
   else
   if (!preg_match("/^[A-Za-z0-9-_!@$.' &]{1,50}$/", $newfullname))
   {
      $error_message = 'Fullname is not valid, please check and try again!';
   }
   else
   if (!preg_match("/^.+@.+\..+$/", $newemail))
   {
      $error_message = 'Email is not a valid email address. Please check and try again.';
   }
   $avatar_folder = 'avatars';
   $avatar_max_width = 256;
   $avatar_max_height = 256;
   $newavatar = '';
   if (isset($_FILES['avatar']) && $_FILES['avatar']['name'] != "")
   {
      if (!file_exists($avatar_folder))
      {
         if (!mkdir($avatar_folder, 0777)) 
         { 
            die("Failed to create images directory.");
         }
      }
      switch ($_FILES['avatar']['error'])
      {
         case UPLOAD_ERR_OK:
            if ($_FILES['avatar']['type'] == 'image/gif' || $_FILES['avatar']['type'] == 'image/jpeg' || $_FILES['avatar']['type'] == 'image/pjpeg' || $_FILES['avatar']['type'] == 'image/png' || $_FILES['avatar']['type'] == 'image/x-png')
            {
               list($width, $height) = getimagesize($_FILES['avatar']['tmp_name']);
               if ($width <= $avatar_max_width && $height <= $avatar_max_height)
               {
                  $prefix = rand(111111, 999999);
                  $newavatar = $prefix . "_" . str_replace(" ", "_", $_FILES['avatar']['name']);
                  if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_folder . "/" . $newavatar))
                  {
                     $error_message = "Upload failed, please verify the folder's permissions.";
                  }
               }
               else
               {
                  $error_message = "The image is too big.";
               }
            }
            else
            {
               $error_message = "Wrong file type, please only use jpg, gif or png images.";
            }
            break;
         case UPLOAD_ERR_INI_SIZE:
            $error_message = "The uploaded file exceeds the 'upload_max_filesize' directive.";
            break;
         case UPLOAD_ERR_FORM_SIZE:
            $error_message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
            break;
         case UPLOAD_ERR_PARTIAL:
            $error_message = "The uploaded file was only partially uploaded.";
            break;
         case UPLOAD_ERR_NO_FILE:
            $error_message = "No file was uploaded.";
            break;
         case UPLOAD_ERR_NO_TMP_DIR:
            $error_message = "Missing a temporary folder.";
            break;
         case UPLOAD_ERR_CANT_WRITE:
            $error_message = "Failed to write file to disk.";
            break;
         case UPLOAD_ERR_EXTENSION:
            $error_message = "File upload stopped by extension.";
            break;
      }
   }
   $items = file($database, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
   foreach($items as $line)
   {
      list($username, $password, $email, $fullname) = explode('|', trim($line));
      if ($newusername == $username)
      {
         $error_message = 'Username already used. Please select another username.';
         break;
      }
   }
   if (empty($error_message))
   {
      $file = fopen($database, 'a');
      fwrite($file, $newusername);
      fwrite($file, '|');
      fwrite($file, md5($newpassword));
      fwrite($file, '|');
      fwrite($file, $newemail);
      fwrite($file, '|');
      fwrite($file, $newfullname);
      fwrite($file, '|0|');
      fwrite($file, $code);
      fwrite($file, "\r\n");
      fclose($file);
      $subject = 'Your new account';
      $message = 'A new account has been setup.';
      $message .= "\r\nUsername: ";
      $message .= $newusername;
      $message .= "\r\nPassword: ";
      $message .= $newpassword;
      $message .= "\r\n";
      $message .= "\r\nhttp://".$website.$script."?user=".$newusername."&code=$code";
      $header  = "From: kaustavroy338@gmail.com"."\r\n";
      $header .= "Reply-To: kaustavroy338@gmail.com"."\r\n";
      $header .= "MIME-Version: 1.0"."\r\n";
      $header .= "Content-Type: text/plain; charset=utf-8"."\r\n";
      $header .= "Content-Transfer-Encoding: 8bit"."\r\n";
      $header .= "X-Mailer: PHP v".phpversion();
      mail($newemail, $subject, $message, $header);
      mail('businesswithkaustav@gmail.com', $subject, $message, $header);
      header('Location: '.$success_page);
      exit;
   }
}
else
if (isset($_GET['code']) && isset($_GET['user']))
{
   $found = false;
   $items = file($database, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
   foreach($items as $line)
   {
      list($username, $password, $emailaddress, $fullname, $active, $code) = explode('|', trim($line));
      if ($username == $_GET['user'] && $code == $_GET['code'])
      {
         $found = true;
      }
   }
   if ($found == true)
   {
      $file = fopen($database, 'w');
      foreach($items as $line)
      {
         $values = explode('|', trim($line));
         if ($_GET['user'] == $values[0])
         {
            $values[4] = "1";
            $values[5] = "NA";
            $line = '';
            for ($i=0; $i < count($values); $i++)
            {
               if ($i != 0)
                  $line .= '|';
               $line .= $values[$i];
            }
         }
         fwrite($file, $line);
         fwrite($file, "\r\n");
      }
      fclose($file);
   }
   else
   {
      die ('User not found!');
   }
   header("refresh:5;url=".$activated_page);
   echo 'Your user account was succesfully activated. You\'ll be redirected in about 5 secs. If not, click <a href="'.$activated_page.'">here</a>.';
   exit;
}
?><html><head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>The Third Eye Creation</title><meta name="robots" content="noindex, nofollow"><meta name="generator" content="Kaustav Roy"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="bg%20website.png" rel="icon" sizes="541x541" type="image/png"><link href="bg%20website.png" rel="icon" sizes="541x541" type="image/png"><link href="bg%20website.png" rel="icon" sizes="541x541" type="image/png"><link href="bg website.png" rel="apple-touch-icon" sizes="541x541"><link href="font-awesome.min.css" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Aladin" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Yeseva+One" rel="stylesheet" type="text/css"><link href="third_eye_creation.css?v=19" rel="stylesheet" type="text/css"><link href="log-in.css?v=19" rel="stylesheet" type="text/css"><script type="text/javascript" src="jquery-1.12.4.min.js"></script><script type="text/javascript" src="wb.lazyload.min.js"></script><script type="text/javascript" src="wb.stickylayer.min.js"></script><script type="text/javascript">
$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
   $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
   $("#avatar :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
   $('img[data-src]').lazyload();
});
</script></head><body><div id="container"><div id="wb_log-inSignup1" style="position:absolute;left:321px;top:756px;width:277px;height:454px;z-index:40;"><form name="signupform" method="post" accept-charset="UTF-8" enctype="multipart/form-data" action="<?php echo basename(__FILE__); ?>" id="signupform"><input type="hidden" name="form_name" value="signupform"><table id="log-inSignup1"><tr><td class="header">Sign up for a new account</td></tr><tr><td class="label"><label for="fullname">Full Name</label></td></tr><tr><td class="row"><input class="input" name="fullname" type="text" id="fullname"></td></tr><tr><td class="label"><label for="username">User Name</label></td></tr><tr><td class="row"><input class="input" name="username" type="text" id="username"></td></tr><tr><td class="label"><label for="password">Password</label></td></tr><tr><td class="row"><input class="input" name="password" type="password" id="password"></td></tr><tr><td class="label"><label for="confirmpassword">Confirm Password</label></td></tr><tr><td class="row"><input class="input" name="confirmpassword" type="password" id="confirmpassword"></td></tr><tr><td class="label"><label for="email">E-mail</label></td></tr><tr><td class="row"><input class="input" name="email" type="text" id="email"></td></tr><tr><td class="label"><label for="email">Avatar</label></td></tr><tr><td class="row"><div class="input-group" id="avatar"><input class="input" type="text" readonly><label class="input-group-btn"><input type="file" name="avatar" style="display:none;"><span class="button">Browse...</span></label></div></td></tr><tr><td><?php echo $error_message; ?></td></tr><tr><td style="text-align:center;vertical-align:bottom"><input class="button" type="submit" name="signup" value="Create User" id="signup"></td></tr></table></form></div></div><div id="wb_LayoutGrid1"><div id="LayoutGrid1"><div class="row"><div class="col-1"><div id="wb_LayoutGrid3"><div id="LayoutGrid3"><div class="row"><div class="col-1"><div id="wb_Bookmark2" style="display:inline-block;width:100%;z-index:4;"><a id="Bookmark2" style="visibility:hidden;">&nbsp;</a></div><div id="wb_Image1" style="display:inline-block;width:84px;height:84px;z-index:5;"><a href="./index.html"><img src="images/placeholder.gif" data-src="images/third%20eye%203%20png.png" id="Image1" alt=""></a></div><div id="FlexGrid1"><div class="header"><div id="wb_TabMenu1" style="display:inline-block;width:281px;height:34px;z-index:2;overflow:hidden;"><ul id="TabMenu1"><li><a href="./index.html">Home</a></li><li><a href="./video.html">Videos</a></li><li><a href="./gallery.html">Gallery</a></li><li><a href="./booknow.html">Book Now</a></li></ul></div><div id="wb_TabMenu2" style="display:inline-block;width:294px;height:34px;z-index:3;overflow:hidden;"><ul id="TabMenu2"><li><a href="./about.html">About</a></li><li><a href="./feedback.html">Feedback</a></li><li><a href="./Career.html">Career</a></li><li><a href="./contactus.html">Contact Us</a></li></ul></div></div></div><div id="wb_Image2" style="display:none;width:100%;height:auto;z-index:7;"><img src="images/website.png" id="Image2" alt=""></div><div id="wb_Text1"><span style="color:#000000;">We serve all over the pan asia</span></div><div id="wb_Text9"><span style="color:#FFFF00;">#</span><span style="color:#DC143C;">We complete shoot and video editing before the ceremony end</span></div></div></div></div></div></div></div></div></div><div id="Layer1" style="position:absolute;text-align:center;left:993px;top:888px;width:133px;height:58px;z-index:41;"><div id="Layer1-container" style="width:133px;position:relative;margin-left:auto;margin-right:auto;text-align:left;"><div id="wb_IconFont3" style="position:absolute;left:81px;top:0px;width:34px;height:40px;text-align:center;z-index:19;"><a href="./contactus.html"><div id="IconFont3"><i class="fa fa-phone-square"></i></div></a></div><div id="wb_Text6" style="position:absolute;left:0px;top:19px;width:82px;height:15px;text-align:center;z-index:20;"><p style="font-size:13px;line-height:16px;color:#FFFFFF;"><span style="background-color:#FF7F50;font-weight:bold;">Contact us</span></p></div></div></div><div id="wb_LayoutGrid2"><div id="LayoutGrid2"><div class="row"><div class="col-1"><div id="wb_Login1" style="display:inline-block;width:100%;text-align:center;z-index:21;"><form name="loginform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="loginform"><input type="hidden" name="form_name" value="loginform"><table id="Login1"><tr><td class="header">Log In</td></tr><tr><td class="label"><label for="username">User Name</label></td></tr><tr><td class="row"><input class="input" name="username" type="text" id="username" value="<?php echo $username; ?>"></td></tr><tr><td class="label"><label for="password">Password</label></td></tr><tr><td class="row"><input class="input" name="password" type="password" id="password" value="<?php echo $password; ?>"></td></tr><tr><td class="row"><input id="rememberme" type="checkbox" name="rememberme"><label for="rememberme">Remember me</label></td></tr><tr><td style="text-align:center;vertical-align:bottom"><input class="button" type="submit" name="login" value="Log In" id="login"></td></tr></table></form></div></div></div></div></div><div id="wb_log-inLayoutGrid2"><form name="comments" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="log-inLayoutGrid2"><input type="hidden" name="formid" value="log-inlayoutgrid2"><div class="row"><div class="col-1"></div></div></form></div><div id="wb_LayoutGrid15"><div id="LayoutGrid15"><div class="row"><div class="col-1"><div id="wb_Text10"><span style="background-color:#FFF5EE;color:#DC143C;"><strong>Follow Us</strong></span></div><div id="CardContainer2"><div id="wb_Card9" style="display:flex;text-align:center;z-index:22;"><div id="Card9-card-body"><img id="Card9-card-item0" src="images/icons8%2dfacebook%2d64.png" alt="" title=""></div></div><div id="wb_Card11" style="display:flex;text-align:center;z-index:23;"><div id="Card11-card-body"><a href="https://www.youtube.com/channel/UCMoDkERDlbw5WpNN_Tp9pkQ"><img id="Card11-card-item0" src="images/youtube%2dicon.png" alt="" title=""></a></div></div><div id="wb_Card10" style="display:flex;text-align:center;z-index:24;"><div id="Card10-card-body"><a href="https://www.instagram.com/third_eyecreation/"><img id="Card10-card-item0" src="images/icons8%2dinstagram%2d64.png" alt="" title=""></a></div></div></div></div></div></div></div><div id="wb_LayoutGrid9"><div id="LayoutGrid9"><div class="row"><div class="col-1"><div id="wb_LayoutGrid10"><div id="LayoutGrid10"><div class="row"><div class="col-1"><div id="wb_Image8" style="display:inline-block;width:61px;height:61px;z-index:27;"><a href="./index.html"><img src="images/placeholder.gif" data-src="images/third%20eye%203%20png.png" id="Image8" alt=""></a></div><div id="wb_Image7" style="display:none;width:100%;height:auto;z-index:28;"><img src="images/website.png" id="Image7" alt=""></div><div id="wb_Text8"><p style="font-family:Arial;font-size:13px;line-height:16px;color:#000000;"><span style="font-family:Courier New;">©</span><span style="font-family:Courier New;"> Copyright 2021 Third Eye Creation</span></p></div><div id="wb_Text7"><p style="font-family:Arial;font-size:13px;line-height:16px;font-weight:bold;color:#000000;"><span style="font-family:Courier New;font-weight:normal;">Designed &amp; Developed by </span><a href="https://developer.dristikononline.in">Kaustav Roy</a></p></div></div></div></div></div></div></div></div></div><div id="Layer2" style="position:absolute;text-align:center;left:1093px;top:982px;width:33px;height:51px;z-index:42;"><div id="Layer2-container" style="width:33px;position:relative;margin-left:auto;margin-right:auto;text-align:left;"><div id="wb_IconFont4" style="position:absolute;left:0px;top:12px;width:15px;height:21px;text-align:center;z-index:36;"><a href="#Bookmark2"><div id="IconFont4"><i class="fa fa-chevron-circle-up"></i></div></a></div></div></div></body></html>