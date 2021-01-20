<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'loginform')
{
   $success_page = './index.php';
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
?>
<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>The Third Eye Creation</title>
<meta name="robots" content="noindex, nofollow">
<meta name="generator" content="Kaustav Roy">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bg website.png" rel="icon" sizes="541x541" type="image/png">
<link href="bg website.png" rel="icon" sizes="541x541" type="image/png">
<link href="bg website.png" rel="icon" sizes="541x541" type="image/png">
<link href="bg website.png" rel="apple-touch-icon" sizes="541x541">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Aladin" rel="stylesheet">
<link href="third_eye_creation.css?v=15" rel="stylesheet">
<link href="log-in.css?v=15" rel="stylesheet">
<script src="jquery-1.12.4.min.js"></script>
<script src="wb.lazyload.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
   $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
   $('img[data-src]').lazyload();
});
</script>
</head>
<body>
<div id="container">
</div>
<div id="wb_LayoutGrid1">
<div id="LayoutGrid1">
<div class="row">
<div class="col-1">
<div id="wb_LayoutGrid3">
<div id="LayoutGrid3">
<div class="row">
<div class="col-1">
<div id="wb_Bookmark2" style="display:inline-block;width:100%;z-index:4;">
<a id="Bookmark2" style="visibility:hidden;">&nbsp;</a>

</div>
<div id="wb_Image1" style="display:inline-block;width:84px;height:84px;z-index:5;">
<a href="./index.php"><img src="images/placeholder.gif" data-src="images/third eye 3 png.png" id="Image1" alt=""></a>
</div>
<div id="FlexGrid1">
<div class="header">
<div id="wb_TabMenu1" style="display:inline-block;width:281px;height:34px;z-index:2;overflow:hidden;">
<ul id="TabMenu1">
<li><a href="./index.php">Home</a></li>
<li><a href="./video.html">Videos</a></li>
<li><a href="./gallery.html">Gallery</a></li>
<li><a href="./booknow.html">Book Now</a></li>
</ul>

</div>
<div id="wb_TabMenu2" style="display:inline-block;width:294px;height:34px;z-index:3;overflow:hidden;">
<ul id="TabMenu2">
<li><a href="./about.html">About</a></li>
<li><a href="./feedback.html">Feedback</a></li>
<li><a href="./Career.html">Career</a></li>
<li><a href="./contactus.html">Contact Us</a></li>
</ul>

</div>
</div>
</div>
<div id="wb_Image2" style="display:none;width:100%;height:auto;z-index:7;">
<img src="images/website.png" id="Image2" alt="">
</div>
<div id="wb_Text1">
<span style="color:#000000;">We serve all over the pan asia</span>
</div>
<div id="wb_Text9">
<span style="color:#FFFF00;">#</span><span style="color:#DC143C;">We complete shoot and video editing before the ceremony end</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="Layer1" style="position:absolute;text-align:center;left:993px;top:888px;width:133px;height:58px;z-index:40;">
<div id="Layer1-container" style="width:133px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_IconFont3" style="position:absolute;left:81px;top:0px;width:34px;height:40px;text-align:center;z-index:19;">
<a href="./contactus.html"><div id="IconFont3"><i class="fa fa-phone-square"></i></div></a></div>
<div id="wb_Text6" style="position:absolute;left:0px;top:19px;width:82px;height:15px;text-align:center;z-index:20;">
<p style="font-size:13px;line-height:16px;color:#FFFFFF;"><span style="background-color:#FF7F50;font-weight:bold;">Contact us</span></p></div>
</div>
</div>
<div id="wb_LayoutGrid2">
<div id="LayoutGrid2">
<div class="row">
<div class="col-1">
<div id="wb_Login1" style="display:inline-block;width:100%;text-align:center;z-index:21;">
<form name="loginform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<table id="Login1">
<tr>
   <td class="header">Log In</td>
</tr>
<tr>
   <td class="label"><label for="username">User Name</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="username" type="text" id="username" value="<?php echo $username; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="password">Password</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="password" type="password" id="password" value="<?php echo $password; ?>"></td>
</tr>
<tr>
   <td class="row"><input id="rememberme" type="checkbox" name="rememberme"><label for="rememberme">Remember me</label></td>
</tr>
<tr>
   <td style="text-align:center;vertical-align:bottom"><input class="button" type="submit" name="login" value="Log In" id="login"></td>
</tr>
</table>
</form>

</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid15">
<div id="LayoutGrid15">
<div class="row">
<div class="col-1">
<div id="wb_Text10">
<span style="background-color:#FFF5EE;color:#DC143C;"><strong>Follow Us</strong></span>
</div>
<div id="CardContainer2">
<div id="wb_Card9" style="display:flex;text-align:center;z-index:22;">
   <div id="Card9-card-body">
      <img id="Card9-card-item0" src="images/icons8-facebook-64.png" alt="" title="">
   </div>
</div>
<div id="wb_Card11" style="display:flex;text-align:center;z-index:23;">
   <div id="Card11-card-body">
      <a href="https://www.youtube.com/channel/UCMoDkERDlbw5WpNN_Tp9pkQ"><img id="Card11-card-item0" src="images/youtube-icon.png" alt="" title=""></a>
   </div>
</div>
<div id="wb_Card10" style="display:flex;text-align:center;z-index:24;">
   <div id="Card10-card-body">
      <a href="https://www.instagram.com/third_eyecreation/"><img id="Card10-card-item0" src="images/icons8-instagram-64.png" alt="" title=""></a>
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid9">
<div id="LayoutGrid9">
<div class="row">
<div class="col-1">
<div id="wb_LayoutGrid10">
<div id="LayoutGrid10">
<div class="row">
<div class="col-1">
<div id="wb_Image8" style="display:inline-block;width:61px;height:61px;z-index:27;">
<a href="./index.php"><img src="images/placeholder.gif" data-src="images/third eye 3 png.png" id="Image8" alt=""></a>
</div>
<div id="wb_Image7" style="display:none;width:100%;height:auto;z-index:28;">
<img src="images/website.png" id="Image7" alt="">
</div>
<div id="wb_Text8">
<p style="font-family:Arial;font-size:13px;line-height:16px;color:#000000;"><span style="font-family:Courier New;">©</span><span style="font-family:Courier New;"> Copyright 2021 Third Eye Creation</span></p>
</div>
<div id="wb_Text7">
<p style="font-family:Arial;font-size:13px;line-height:16px;font-weight:bold;color:#000000;"><span style="font-family:Courier New;font-weight:normal;">Designed &amp; Developed by </span><a href="https://developer.dristikononline.in">Kaustav Roy</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="Layer2" style="position:absolute;text-align:center;left:1093px;top:982px;width:33px;height:51px;z-index:41;">
<div id="Layer2-container" style="width:33px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_IconFont4" style="position:absolute;left:0px;top:12px;width:15px;height:21px;text-align:center;z-index:36;">
<a href="#Bookmark2"><div id="IconFont4"><i class="fa fa-chevron-circle-up"></i></div></a></div>
</div>
</div>
</body>
</html>