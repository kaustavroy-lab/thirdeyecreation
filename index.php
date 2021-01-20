<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>The Third Eye Creation</title>
<meta name="robots" content="index, follow">
<meta name="generator" content="Kaustav Roy">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bg website.png" rel="icon" sizes="541x541" type="image/png">
<link href="bg website.png" rel="icon" sizes="541x541" type="image/png">
<link href="bg website.png" rel="icon" sizes="541x541" type="image/png">
<link href="bg website.png" rel="apple-touch-icon" sizes="541x541">
<link href="owl.carousel.min.css" rel="stylesheet">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Aladin" rel="stylesheet">
<link href="third_eye_creation.css?v=15" rel="stylesheet">
<link href="index.css?v=15" rel="stylesheet">
<script src="jquery-1.12.4.min.js"></script>
<script src="wb.lazyload.min.js"></script>
<script src="owl.carousel.min.js"></script>
<script src="skrollr.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="wb.photocollage.min.js"></script>
<link rel="stylesheet" href="magnificpopup/magnific-popup.css">
<script src="magnificpopup/jquery.magnific-popup.min.js"></script>
<script>
$(document).ready(function()
{
   $("#CardContainer1").owlCarousel({autoplayTimeout:5000, margin: 16, autoplay: true, nav: false, loop: true, dots: false, items: 1, slideBy: 1});
   function skrollrInit()
   {
      skrollr.init({forceHeight: false, mobileCheck: function() { return false; }, smoothScrolling: false});
   }
   skrollrInit();
   $("#Layer1").stickylayer({orientation: 6, position: [0, 0], delay: 500});
   $("a[data-rel='PhotoCollage1']").attr('rel', 'PhotoCollage1');
   $("#PhotoCollage1").magnificPopup({delegate:'a', type:'image', gallery: {enabled: true, navigateByImgClick: true}});
   $("#PhotoCollage1").photocollage({ effect: 'scale', duration: 600, padding: 4, matrix: '1,1,1,1,1,4,0,0,0,1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1' });
   $("#Layer2").stickylayer({orientation: 4, position: [0, 0], delay: 500});
   $("a[data-rel='PhotoCollage2']").attr('rel', 'PhotoCollage2');
   $("#PhotoCollage2").magnificPopup({delegate:'a', type:'image', gallery: {enabled: true, navigateByImgClick: true}});
   $("#PhotoCollage2").photocollage({ effect: 'scale', duration: 600, padding: 4, matrix: '1,1,1,1,1,4,0,0,0,1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1' });
   $('img[data-src]').lazyload();
});
</script>
<script>
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
<div id="wb_Bookmark2" style="display:inline-block;width:100%;z-index:8;">
<a id="Bookmark2" style="visibility:hidden;">&nbsp;</a>

</div>
<div id="wb_Image1" style="display:inline-block;width:84px;height:84px;z-index:9;">
<a href="./index.php"><img src="images/placeholder.gif" data-src="images/third eye 3 png.png" id="Image1" alt=""></a>
</div>
<div id="FlexGrid1">
<div class="header">
<div id="wb_TabMenu1" style="display:inline-block;width:281px;height:34px;z-index:2;overflow:hidden;">
<ul id="TabMenu1">
<li><a href="./index.php" class="active">Home</a></li>
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
<div id="CardContainer1" class="owl-carousel owl-theme">
<div id="wb_Card1" style="display:flex;text-align:center;z-index:4;">
   <div id="Card1-card-body">
      <img id="Card1-card-item0" src="images/bg_2.jpg" alt="" title="">
   </div>
</div>
<div id="wb_Card2" style="display:flex;text-align:center;z-index:5;">
   <div id="Card2-card-body">
      <img id="Card2-card-item0" src="images/bg_3.jpg" alt="" title="">
   </div>
</div>
<div id="wb_Card4" style="display:flex;text-align:center;z-index:6;">
   <div id="Card4-card-body">
      <img id="Card4-card-item0" src="images/bg_4.jpg" alt="" title="">
   </div>
</div>
<div id="wb_Card3" style="display:flex;text-align:center;z-index:7;">
   <div id="Card3-card-body">
      <img id="Card3-card-item0" src="images/bg_5.jpg" alt="" title="">
   </div>
</div>
</div>
<div id="wb_Image2" style="display:none;width:100%;height:auto;z-index:12;">
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
<div id="wb_LayoutGrid7">
<div id="LayoutGrid7">
<div class="row">
<div class="col-1">
<div id="wb_LayoutGrid8">
<div id="LayoutGrid8">
<div class="row">
<div class="col-1">
<div id="wb_Image6" style="display:none;width:100%;height:auto;z-index:37;">
<img src="images/website.png" id="Image6" alt="">
</div>
<div id="wb_Image5" style="display:inline-block;width:100%;height:auto;z-index:38;">
<img src="images/website 2.png" id="Image5" alt="">
</div>
<div id="wb_PhotoCollage1" style="display:inline-block;width:100%;z-index:39;">
<div id="PhotoCollage1">
   <div class="thumbnails">
      <div class="thumbnail">
         <a href="images/bg_2.jpg" data-rel=""><img alt="" src="images/bg_2.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_3.jpg" data-rel=""><img alt="" src="images/bg_3.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_4.jpg" data-rel=""><img alt="" src="images/bg_4.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_5.jpg" data-rel=""><img alt="" src="images/bg_5.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_6.jpg" data-rel=""><img alt="" src="images/bg_6.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_7.jpg" data-rel=""><img alt="" src="images/bg_7.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_2.jpg" data-rel=""><img alt="" src="images/bg_2.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_5.jpg" data-rel=""><img alt="" src="images/bg_5.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_6.jpg" data-rel=""><img alt="" src="images/bg_6.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_7.jpg" data-rel=""><img alt="" src="images/bg_7.jpg" class="image"></a>
      </div>
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid5">
<div id="LayoutGrid5">
<div class="row">
<div class="col-1">
<div id="wb_LayoutGrid6">
<div id="LayoutGrid6">
<div class="row">
<div class="col-1">
<div id="wb_Image3" style="display:none;width:100%;height:auto;z-index:41;">
<img src="images/website.png" id="Image3" alt="">
</div>
<div id="wb_IconFont2" style="display:inline-block;width:28px;height:24px;text-align:center;z-index:42;" data-top="transform:;" data-10-bottom-top="transform:;">
<div id="IconFont2"><i class="fa fa-tasks"></i></div>
</div>
<div id="wb_Text4">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>SERVICES</strong></span>
</div>
<div id="wb_Text5">
<p style="font-size:13px;line-height:16px;color:#000000;">Services offered by Third Eye Creation starting from the pre-wedding to the wedding and post wedding function,"TEC" offers you with mind-blowing videos and pictures of your best moments with perfection and skills. We complete wedding and other ceremony video within a day. The wide range of services are: Photo booth&nbsp; "Model shoot "Bridal shoots •Pre-wedding shoot •Post-wedding shoot • Engagement Photography •&nbsp; Music video shoot •Music video shoot • Drone shots • Maternity shoot •Baby shoot •Rice ceremony shoot •Baby shower shoot •Outdoor shoot •Product Shoot • Candid photography •Fashion photography shoot •Cinematic Videos • Any types of editing • Advertisement Shoot • Live screening • Architectural photography shoot •Albums</p>
<p style="font-size:13px;line-height:16px;color:#000000;"><span style="font-weight:bold;">Your wish, Our commitment</span></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="Layer1" style="position:absolute;text-align:center;left:993px;top:888px;width:133px;height:58px;z-index:97;">
<div id="Layer1-container" style="width:133px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_IconFont3" style="position:absolute;left:81px;top:0px;width:34px;height:40px;text-align:center;z-index:46;">
<a href="./contactus.html"><div id="IconFont3"><i class="fa fa-phone-square"></i></div></a></div>
<div id="wb_Text6" style="position:absolute;left:0px;top:19px;width:82px;height:15px;text-align:center;z-index:47;">
<p style="font-size:13px;line-height:16px;color:#FFFFFF;"><span style="background-color:#FF7F50;font-weight:bold;">Contact us</span></p></div>
</div>
</div>
<div id="wb_LayoutGrid11">
<div id="LayoutGrid11">
<div class="row">
<div class="col-1">
<div id="wb_LayoutGrid12">
<div id="LayoutGrid12">
<div class="row">
<div class="col-1">
<div id="wb_Image9" style="display:none;width:100%;height:auto;z-index:51;">
<img src="images/website.png" id="Image9" alt="">
</div>
<div id="wb_Card5" style="display:flex;width:100%;text-align:center;z-index:52;">
   <div id="Card5-card-body">
      <img id="Card5-card-item0" src="images/bg_2.jpg" alt="" title="">
   </div>
</div>
<div id="wb_Card8" style="display:flex;width:100%;text-align:center;z-index:53;">
   <div id="Card8-card-body">
      <img id="Card8-card-item0" src="images/bg_3.jpg" alt="" title="">
   </div>
</div>
<div id="wb_Card7" style="display:flex;width:100%;text-align:center;z-index:54;">
   <div id="Card7-card-body">
      <img id="Card7-card-item0" src="images/bg_7.jpg" alt="" title="">
   </div>
</div>
<div id="wb_Card6" style="display:flex;width:100%;text-align:center;z-index:55;">
   <div id="Card6-card-body">
      <img id="Card6-card-item0" src="images/bg_6.jpg" alt="" title="">
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid2">
<div id="LayoutGrid2">
<div class="row">
<div class="col-1">
<div id="wb_PhotoCollage2" style="display:inline-block;width:100%;z-index:57;">
<div id="PhotoCollage2">
   <div class="thumbnails">
      <div class="thumbnail">
         <a href="images/bg_2.jpg" data-rel=""><img alt="" src="images/bg_2.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_3.jpg" data-rel=""><img alt="" src="images/bg_3.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_4.jpg" data-rel=""><img alt="" src="images/bg_4.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_5.jpg" data-rel=""><img alt="" src="images/bg_5.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_6.jpg" data-rel=""><img alt="" src="images/bg_6.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_7.jpg" data-rel=""><img alt="" src="images/bg_7.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_2.jpg" data-rel=""><img alt="" src="images/bg_2.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_5.jpg" data-rel=""><img alt="" src="images/bg_5.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_6.jpg" data-rel=""><img alt="" src="images/bg_6.jpg" class="image"></a>
      </div>
      <div class="thumbnail">
         <a href="images/bg_7.jpg" data-rel=""><img alt="" src="images/bg_7.jpg" class="image"></a>
      </div>
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="wb_count-up">
<div id="count-up">
<div class="row">
<div class="col-1">
</div>
<div class="col-2">
<div id="wb_FontAwesomeIcon1" style="display:inline-block;width:64px;height:64px;text-align:center;z-index:58;">
<div id="FontAwesomeIcon1"><i class="fa fa-thumbs-up"></i></div>
</div>
<div id="wb_Heading1" style="display:inline-block;width:100%;z-index:59;">
<h1 id="Heading1">300 +</h1>
</div>
<div id="wb_Text12">
<span style="color:#DC143C;font-family:Arial;font-size:13px;">Happy Customers</span>
</div>
</div>
<div class="col-3">
<div id="wb_FontAwesomeIcon2" style="display:inline-block;width:64px;height:64px;text-align:center;z-index:61;">
<div id="FontAwesomeIcon2"><i class="fa fa-camera"></i></div>
</div>
<div id="wb_Heading2" style="display:inline-block;width:100%;z-index:62;">
<h1 id="Heading2">400 +</h1>
</div>
<div id="wb_Text13">
<span style="color:#DC143C;font-family:Arial;font-size:13px;">Photo Shoots</span>
</div>
</div>
<div class="col-4">
<div id="wb_FontAwesomeIcon3" style="display:inline-block;width:64px;height:64px;text-align:center;z-index:64;">
<div id="FontAwesomeIcon3"><i class="fa fa-users"></i></div>
</div>
<div id="wb_Heading3" style="display:inline-block;width:100%;z-index:65;">
<h1 id="Heading3">60 +</h1>
</div>
<div id="wb_Text14">
<span style="color:#DC143C;font-family:Arial;font-size:13px;">Ceremony Cover</span>
</div>
</div>
<div class="col-5">
<div id="wb_FontAwesomeIcon4" style="display:inline-block;width:64px;height:64px;text-align:center;z-index:67;">
<div id="FontAwesomeIcon4"><i class="fa fa-video-camera"></i></div>
</div>
<div id="wb_Heading4" style="display:inline-block;width:100%;z-index:68;">
<h1 id="Heading4">100 +</h1>
</div>
<div id="wb_Text15">
<span style="color:#DC143C;font-family:Arial;font-size:13px;">Videography Shoot</span>
</div>
</div>
<div class="col-6">
<div id="wb_FontAwesomeIcon5" style="display:inline-block;width:64px;height:64px;text-align:center;z-index:70;">
<div id="FontAwesomeIcon5"><i class="fa fa-cut"></i></div>
</div>
<div id="wb_Heading5" style="display:inline-block;width:100%;z-index:71;">
<h1 id="Heading5">250 +</h1>
</div>
<div id="wb_Text16">
<span style="color:#DC143C;font-family:Arial;font-size:13px;">Video Editing</span>
</div>
</div>
<div class="col-7">

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
<div id="wb_Card9" style="display:flex;text-align:center;z-index:74;">
   <div id="Card9-card-body">
      <img id="Card9-card-item0" src="images/icons8-facebook-64.png" alt="" title="">
   </div>
</div>
<div id="wb_Card11" style="display:flex;text-align:center;z-index:75;">
   <div id="Card11-card-body">
      <a href="https://www.youtube.com/channel/UCMoDkERDlbw5WpNN_Tp9pkQ"><img id="Card11-card-item0" src="images/youtube-icon.png" alt="" title=""></a>
   </div>
</div>
<div id="wb_Card10" style="display:flex;text-align:center;z-index:76;">
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
<div id="wb_Image8" style="display:inline-block;width:61px;height:61px;z-index:79;">
<a href="./index.php"><img src="images/placeholder.gif" data-src="images/third eye 3 png.png" id="Image8" alt=""></a>
</div>
<div id="wb_Image7" style="display:none;width:100%;height:auto;z-index:80;">
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
<div id="Layer2" style="position:absolute;text-align:center;left:1093px;top:982px;width:33px;height:51px;z-index:98;">
<div id="Layer2-container" style="width:33px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_IconFont4" style="position:absolute;left:0px;top:12px;width:15px;height:21px;text-align:center;z-index:93;">
<a href="#Bookmark2"><div id="IconFont4"><i class="fa fa-chevron-circle-up"></i></div></a></div>
</div>
</div>
</body>
</html>