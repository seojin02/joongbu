<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta charset="utf-8">

    <!-- short icon -->
    <link rel="shortcut icon" href="/img/favicon.png">

    <!-- open graph -->
    <meta property="og:title" content="Uplus 기묘한 이벤트">
    <meta property="og:description" content="Uplus 기묘한 이벤트">
    <meta property="og:image" content="https://www.uplus-strangevent.co.kr/img/meta/meta_img.jpg">

    <!-- description  -->
    <meta name="description" content="">
    <title>Uplus 기묘한 이벤트</title>

    <!-- style -->
    <link rel="stylesheet" type="text/css" href="/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/css/event3.css"/>

    <!--카카오 api  -->
    <!-- <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script> -->

    <!-- js  -->
    <script src="lib/jQuery/jquery-3.3.1.min.js"></script>
    <script src="lib/jQuery/jquery.rwdImageMaps.js"></script>
    <script src="js/common.js?ver=<?=Ver?>"></script>
    <script src="js/event3.js?ver=<?=Ver?>"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
  	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142976381-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

      //www.uplus-strange-event.co.kr
        gtag('config', 'UA-142976381-1');

      //www.uplus-strangevent.co.kr
      //이벤트용
        // gtag('config', 'UA-142976381-2');

    </script>
  </head>
  <body>
    <center>
        <div class="header">
          <img src="/img/header_3.png" alt="uplusxNetflix Header Image" usemap="#header">
        </div>
        <div class="contents_01">
          <div class="ifr_wrapper">
            <iframe id="youtubePlayer" width="720px" height="450px" src="https://www.youtube.com/embed/bFK8rpXQod0?playsinline=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <img src="/img/event_03_01.png" alt="" usemap="#regist">
        </div>
    </center>


    <!-- useMap -->
    <map name="header" id="header">
      <area shape="area" coords="0,0,335,130" class="pointer" onclick="move('/')" alt="기묘한이벤트하나">
      <area shape="area" coords="336,0,666,130" class="pointer" onclick="move('/event2')" alt="기묘한이벤트둘">
      <area shape="area" coords="667,0,1000,130" class="pointer" onclick="move('/event3')" alt="넷플릭스 아직도 안봐?">
    </map>

    <map name="regist" id="regist">
      <area shape="rect" coords="196,6098,805,6242"  class="pointer" onclick="move('/event3')" alt="넷플릭스 가입하기">
    </map>

  </body>
</html>
