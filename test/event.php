<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta charset="utf-8">

    <!-- short icon -->
    <link rel="shortcut icon" href="/img/favicon.png">

    <!-- open graph -->
    <meta property="og:title" content="Uplus x Netflix 기묘한 이벤트">
    <meta property="og:description" content="Uplus x Netflix 기묘한 이벤트">
    <meta property="og:image" content="/img/meta/kakao_link.png">
    <meta property="og:image:width" content="520">
    <meta property="og:image:height" content="2000">

    <!-- description  -->
    <meta name="description" content="">
    <title>Uplus x Netflix 기묘한 이벤트</title>

    <!-- style -->
    <link rel="stylesheet" href="/lib/mdl/material.min.css">
    <link rel="stylesheet" type="text/css" href="/css/common.css"/>

    <!--카카오 api  -->
    <!-- <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script> -->

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Coda+Caption:800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="/lib/fontawesome-free-5.0.8/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet"> <!--load all styles -->

    <!-- js  -->
    <script src="/lib/jQuery/jquery-3.3.1.min.js"></script>
    <script src="/lib/jQuery/jquery.rwdImageMaps.js"></script>
    <script src="/lib/mdl/material.min.js"></script>
    <script src="/js/common.js?ver=<?=Ver?>"></script>
    <script src="/js/event1.js?ver=<?=Ver?>"></script>

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
          <img src="/img/header.png" alt="uplusxNetflix Header Image" usemap="#header">
        </div>
        <div class="contents_01">
          <img src="/img/event_01_01.png" alt="">
        </div>
        <div class="contents_02">
          <img src="/img/event_01_02.png" alt="">
        </div>
        <div id="Question01" class="contents_03">
          <img src="/img/question/01_default.png" alt="" usemap="#Question01">
        </div>
        <div id="Question02" class="contents_04">
          <img src="/img/question/02_default.png" alt="" usemap="#Question02">
        </div>
        <div id="Question03" class="contents_05">
          <img src="/img/question/03_default.png" alt="" usemap="#Question03">
        </div>
        <div class="contents_06">
          <img src="/img/event_01_03.jpg" alt=""  usemap="#enter">
        </div>
        <div class="contents_07">
          <div class="dday_wrap">
            <p class="dday_count"><?=WINDAY?></p>
          </div>
          <img src="/img/event_01_04.png" alt="">
        </div>
    </center>

    <div class="popup2 d-none">
      <div class="mdl-custom-popup-wrapper">
        <div class="demo-card-square mdl-card mdl-shadow--2dp mdl-custom-popup">
          <div class="close" style="width: 20px;float: right;position: absolute;right: 0;">
             <i class="fas fa-times"></i>
          </div>
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text nanum-gothic">감사합니다!</h2>
          </div>
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text nanum-gothic">당첨 시 연락 받을 수 있는 귀하의 정보를 입력해 주세요.</h2>
          </div>
          <div class="mdl-card__supporting-text">
            <!-- 이름 필드 -->
              <form action="#">
                <div class="mdl-textfield mdl-js-textfield">
                  <input class="mdl-textfield__input" type="text" id="userName">
                  <label class="mdl-textfield__label" for="userName">이름</label>
                </div>
              </form>
              <!-- 전화번호 필드 -->
              <form action="#">
                <div class="mdl-textfield mdl-js-textfield">
                  <input class="mdl-textfield__input" type="text" pattern="^01([0|1|6|7|8|9]?)?([0-9]{7,8})$" id="phoneNumber">
                  <label class="mdl-textfield__label" for="phoneNumber">전화번호</label>
                  <span class="mdl-textfield__error">전화번호 형식이 아닙니다('-'제외하고 입력해주세요)</span>
                </div>
              </form>
          </div>
          <!-- 고객정보 수집 처리 -->
          <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="private_chk" style=" margin-left: 20px;">
            <input type="checkbox" id="private_chk" class="mdl-checkbox__input">
            <span class="mdl-checkbox__label">개인정보 수집동의</span>
            <p style="font-size:13px; width: 90%;" aria-describedby="basic-addon1">
              본 이벤트 참여를 위해 <a href="/private.html" target="_blank">개인정보 수집 이용에 관한 사항</a>에 동의합니다. 동의하지 않으면 이벤트에 참여하실 수 없습니다.
            </p>
          </label>
          <div class="ok_btn submit" onclick="insertUser();">
             <i class="fas fa-check-circle insert-user-icon"></i>확인
          </div>
        </div>
      </div>
    </div>

    <div class="popup d-none">
      <div class="popup_wrapper">
        <div class="p_contents">
          <div class="close">
             <i class="fas fa-times"></i>
          </div>
          <p class="text">
          </p>
          <div class="ok_btn check">
             <i class="fas fa-check-circle" style="margin-right:3px;"></i>확인
          </div>
        </div>
      </div>
    </div>


    <!-- useMap -->
    <map name="header" id="header">
      <area shape="area" coords="0,0,335,130" class="pointer" onclick="move('/')" alt="기묘한이벤트하나">
      <area shape="area" coords="336,0,666,130" class="pointer" onclick="move('/event2')" alt="기묘한이벤트둘">
      <area shape="area" coords="667,0,1000,130" class="pointer" onclick="move('/event3')"alt="넷플릭스 아직도 안봐?">
    </map>

    <map name="Question01" id="Question01">
      <area shape="rect" coords="254,67,890,147" class="pointer" onclick="questionSelect(1, 1)">
      <area shape="rect" coords="254,121,890,153" class="pointer"onclick="questionSelect(1, 2)">
      <area shape="rect" coords="254,168,890,211" class="pointer" onclick="questionSelect(1, 3)">
      <area shape="rect" coords="254,224,890,264" class="pointer" onclick="questionSelect(1, 4)">
    </map>

    <map name="Question02" id="Question02">
      <area shape="rect" coords="254,115,890,151" class="pointer" onclick="questionSelect(2, 1)">
      <area shape="rect" coords="254,164,890,203" class="pointer"onclick="questionSelect(2, 2)">
      <area shape="rect" coords="254,218,890,257" class="pointer" onclick="questionSelect(2, 3)">
      <area shape="rect" coords="254,271,890,308" class="pointer" onclick="questionSelect(2, 4)">
    </map>

    <map name="Question03" id="Question03">
      <area shape="rect" coords="249,113,890,153" class="pointer" onclick="questionSelect(3, 1)">
      <area shape="rect" coords="249,165,890,206" class="pointer"onclick="questionSelect(3, 2)">
      <area shape="rect" coords="249,220,890,260" class="pointer" onclick="questionSelect(3, 3)">
      <area shape="rect" coords="249,270,890,313" class="pointer" onclick="questionSelect(3, 4)">
    </map>

    <map name="enter">
      <area shape="rect" coords="191,50,808,200" class="pointer" onclick="chkEnter(true)">
    </map>

  </body>
</html>
