<%
   Function ValidateEmail(email)
      Dim regEx

      Set regEx = New RegExp
      regEx.IgnoreCase = False
      regEx.Pattern = "^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$"

      ValidateEmail = regEx.Test(email)
   End Function

   Function IsInternalField(value)
      IsInternalField = False

      Dim internalFieldsArray(3)
      Dim lvalue

      internalFieldsArray(0) = "submit"
      internalFieldsArray(1) = "reset"
      internalFieldsArray(2) = "send"

      lvalue = LCase(value)

      Response.Write lvalue

      For Each item In internalFieldsArray
         If item = lvalue Then
            IsInternalField = True
         End If
      Next
   End Function


   If Request.ServerVariables("REQUEST_METHOD") = "POST" Then

      On Error Resume Next

      Dim strMailTo
      Dim strMailFrom
      Dim strSubject
      Dim strBody
      Dim strSuccessUrl
      Dim strErrorUrl
      Dim strError
      Dim strLine

      strMailTo = "yourname@yourdomain.com"
      strMailFrom = Request.Form("email")

      If strMailFrom = "" Then
         strMailFrom = strMailTo
      End If

      strSubject = "Contact Information"
      strBody = "Values submitted from web site form:"
      strSuccessUrl = "success.html"
      strErrorUrl = "error.html"
      strError = ""

      If ValidateEmail(strMailFrom) <> True Then
         Response.Redirect strErrorUrl
         Response.End
      End If

      strBody = strBody & vbCrLF

      For each inputField in Request.Form
         If IsInternalField(inputField) <> True Then
            For each inputValue in Request.Form(inputField)
               strLine = inputField  & " : " & inputValue & vbCrLF
               strBody = strBody & strLine
            Next
         End If
      Next

      Dim mailObject
      Set mailObject = CreateObject("CDO.Message")

      If err.number <> 0 Then
         Response.redirect error_url
	 Response.End
      End If

      mailObject.To = strMailTo
      mailObject.From = strMailFrom
      mailObject.Subject = strSubject
      mailObject.TextBody = strBody

      ' dim mailConfig
      ' set mailConfig = CreateObject("CDO.Configuration")
      ' mailConfig.Fields(cdoSendUsingMethod) = cdoSendUsingPort
      ' mailConfig.Fields(cdoSMTPServer) = "smtp_server_name" 
      ' mailConfig.Fields(cdoSMTPServerPort) = 25
      ' mailConfig.Fields(cdoSMTPConnectionTimeout) = 10
      ' mailConfig.Fields(cdoSMTPAuthenticate) = cdoBasic
      ' mailConfig.Fields(cdoSendUserName) = "username"
      ' mailConfig.Fields(cdoSendPassword) = "password"
      ' mailConfig.Fields.Update
      ' set mailObject.configuration = mailConfig

      mailObject.Send

      If err.number <> 0 Then
         Response.Redirect strErrorUrl
      else
         Response.Redirect strSuccessUrl
      end if

      Set mailObject = Nothing

      Response.End
   End If
%><?php
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formid']) && $_POST['formid'] == 'page1layoutgrid1')
{
   $mailto = 'kaustavroy338@gmail.com';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'Website form';
   $message = 'Values submitted from web site form:';
   $success_url = './index.php';
   $error_url = './404.php';
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
?>
<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>The Third Eye Creation</title>
<meta name="robots" content="noindex, nofollow">
<meta name="generator" content="Kaustav Roy">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bg%20website.png" rel="icon" sizes="541x541" type="image/png">
<link href="bg%20website.png" rel="icon" sizes="541x541" type="image/png">
<link href="bg%20website.png" rel="icon" sizes="541x541" type="image/png">
<link href="bg website.png" rel="apple-touch-icon" sizes="541x541">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Aladin" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Yeseva+One" rel="stylesheet">
<link href="third_eye_creation.css?v=25" rel="stylesheet">
<link href="page1.css?v=25" rel="stylesheet">
<script src="jquery-1.12.4.min.js"></script>
<script src="wb.lazyload.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script src="page1.js?v=25"></script>
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
<div id="wb_Bookmark2">
<a id="Bookmark2">&nbsp;</a>

</div>
<div id="wb_Image1">
<a href="./index.php"><img src="images/placeholder.gif" data-src="images/third%20eye%203%20png.png" id="Image1" alt=""></a>
</div>
<div id="FlexGrid1">
<div class="header">
<div id="wb_TabMenu1">
<ul id="TabMenu1">
<li><a href="./index.php">Home</a></li>
<li><a href="./video.php">Videos</a></li>
<li><a href="./gallery.php">Gallery</a></li>
<li><a href="./booknow.php">Book Now</a></li>
</ul>

</div>
<div id="wb_TabMenu2">
<ul id="TabMenu2">
<li><a href="./about.php">About</a></li>
<li><a href="./feedback.php">Feedback</a></li>
<li><a href="./Career.php">Career</a></li>
<li><a href="./contactus.php">Contact Us</a></li>
</ul>

</div>
</div>
</div>
<div id="wb_Image2">
<img src="images/website.png" id="Image2" alt="">
</div>
<div id="wb_Text1">
<span id="wb_uid0">We serve all over the pan asia</span>
</div>
<div id="wb_Text9">
<span id="wb_uid1">#</span><span id="wb_uid2">We complete shoot and video editing before the ceremony end</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="Layer1">
<div id="Layer1-container">
<div id="wb_IconFont3">
<a href="./contactus.php"><div id="IconFont3"><i class="fa fa-phone-square"></i></div></a></div>
<div id="wb_Text6">
<p id="wb_uid3"><span id="wb_uid4">Contact us</span></p></div>
</div>
</div>
<div id="wb_LayoutGrid15">
<div id="LayoutGrid15">
<div class="row">
<div class="col-1">
<div id="wb_Text10">
<span id="wb_uid5"><strong>Follow Us</strong></span>
</div>
<div id="CardContainer2">
<div id="wb_Card9">
   <div id="Card9-card-body">
      <img id="Card9-card-item0" src="images/icons8%2dfacebook%2d64.png" alt="" title="">
   </div>
</div>
<div id="wb_Card11">
   <div id="Card11-card-body">
      <a href="https://www.youtube.com/channel/UCMoDkERDlbw5WpNN_Tp9pkQ"><img id="Card11-card-item0" src="images/youtube%2dicon.png" alt="" title=""></a>
   </div>
</div>
<div id="wb_Card10">
   <div id="Card10-card-body">
      <a href="https://www.instagram.com/third_eyecreation/"><img id="Card10-card-item0" src="images/icons8%2dinstagram%2d64.png" alt="" title=""></a>
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
<div id="wb_Image8">
<a href="./index.php"><img src="images/placeholder.gif" data-src="images/third%20eye%203%20png.png" id="Image8" alt=""></a>
</div>
<div id="wb_Image7">
<img src="images/website.png" id="Image7" alt="">
</div>
<div id="wb_Text8">
<p id="wb_uid6"><span id="wb_uid7">©</span><span id="wb_uid8"> Copyright 2021 Third Eye Creation</span></p>
</div>
<div id="wb_Text7">
<p id="wb_uid9"><span id="wb_uid10">Designed &amp; Developed by </span><a href="https://developer.dristikononline.in">Kaustav Roy</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="Layer2">
<div id="Layer2-container">
<div id="wb_IconFont4">
<a href="#Bookmark2"><div id="IconFont4"><i class="fa fa-chevron-circle-up"></i></div></a></div>
</div>
</div>
<div id="wb_page1LayoutGrid1">
<form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="page1LayoutGrid1">
<input type="hidden" name="formid" value="page1layoutgrid1">
<div class="row">
<div class="col-1">
<div id="wb_page1LayoutGrid2">
<div id="page1LayoutGrid2">
<div class="row">
<div class="col-1">
<label for="page1Editbox1" id="page1Label1">Name:</label>
</div>
<div class="col-2">
<input type="text" id="page1Editbox1" name="name" value="" spellcheck="false">
</div>
</div>
</div>
</div>
<div id="wb_page1LayoutGrid3">
<div id="page1LayoutGrid3">
<div class="row">
<div class="col-1">
<label for="page1Editbox2" id="page1Label2">Email:</label>
</div>
<div class="col-2">
<input type="text" id="page1Editbox2" name="email" value="" spellcheck="false">
</div>
</div>
</div>
</div>
<div id="wb_page1LayoutGrid4">
<div id="page1LayoutGrid4">
<div class="row">
<div class="col-1">
</div>
<div class="col-2">
<input type="submit" id="page1Button1" name="" value="Send">
</div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
</body>
</html>