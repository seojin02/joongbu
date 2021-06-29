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

    <!-- description  -->
    <meta name="description" content="">
    <title>Uplus x Netflix 기묘한 이벤트</title>

    <!-- style -->
    <link rel="stylesheet" href="/lib/mdl/material.min.css">
    <link rel="stylesheet" type="text/css" href="/css/common.css?ver=<?=Ver?>"/>
    <link rel="stylesheet" type="text/css" href="/css/event2.css?ver=<?=Ver?>"/>
    <link rel="stylesheet" href="assets/css/table-responsive.css">

    <!--카카오 api  -->
    <!-- <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script> -->
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=1947d202da9d152f7f40a7676b0ff3ac&libraries=services"></script>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coda+Caption:800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="/lib/fontawesome-free-5.0.8/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet"> <!--load all styles -->

    <!-- js  -->
    <script src="/lib/jQuery/jquery-3.3.1.min.js"></script>
    <script src="/lib/jQuery/jquery.rwdImageMaps.js"></script>
    <script src="/lib/mdl/material.min.js"></script>
    <script src="/js/common.js?ver=<?=Ver?>"></script>
    <script src="/js/event2.js?ver=<?=Ver?>"></script>

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
          <img src="/img/header_2.png" alt="uplusxNetflix Header Image" usemap="#header">
        </div>
        <div class="contents_01">
          <img src="/img/event_02_01.png" alt="">
        </div>
        <div class="contents_02">

          <!-- 시, 도 선택 -->
          <div class="area_wrapper si_do_wrapper">
            <!-- <span class="d-inblock si_gu_dong_label">시,도 선택</span> -->
            <span class="d-inblock">
              <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
              <div class="custom-select" style="width:200px;">
                <select id="siDoSelect">
                  <option value="">지역명</option>
                  <option value="서울">서울</option>
                  <option value="대전">대전</option>
                  <option value="대구">대구</option>
                  <option value="부산">부산</option>
                  <option value="광주">광주</option>
                  <option value="강원">강원</option>
                  <option value="경기">경기</option>
                  <option value="경남">경남</option>
                  <option value="경북">경북</option>
                  <option value="세종">세종</option>
                  <option value="울산">울산</option>
                  <option value="인천">인천</option>
                  <option value="전남">전남</option>
                  <option value="전북">전북</option>
                  <option value="제주">제주</option>
                  <option value="충남">충남</option>
                  <option value="충북">충북</option>
                </select>
              </div>
            </span>
          </div>

          <!-- 구,시 선택 -->
          <div class="area_wrapper gu_si_wrapper">
            <!-- <span class="d-inblock si_gu_dong_label">구,시 선택</span> -->
            <span class="d-inblock">
              <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
              <div class="custom-select" style="width:200px;">
                <select id="guSiSelect">
                  <option value="">상세지역</option>
                </select>
              </div>
            </span>
          </div>

          <!-- 동 선택 -->
          <!-- <div class="area_wrapper dong_wrapper d-none">
            <span class="d-inblock si_gu_dong_label">동 선택</span>
            <span class="d-inblock">
              <div class="custom-select" style="width:200px;">
                <select  id="dongSelect">
                  <option value="">동 선택</option>
                </select>
              </div>
            </span>
          </div> -->

          <!-- Accent-colored raised button with ripple -->
          <button onclick = "callDong()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            조회
          </button>
        </div>
        <div class="contents_03" style="padding: 2em;">
          <table id="posGrid" class="mdl-data-table mdl-js-data-table mdl-data-table__header--sorted-ascending mdl-shadow--2dp d-none">
              <thead>
                <tr>
                  <th class="mdl-data-table__cell--non-numeric">매장명</th>
                  <th>매장 주소</th>
                  <th>선택</th>
                </tr>
              </thead>
              <tbody id="posdataGrid">
              </tbody>
            </table>
        </div>
        <div class="contents_04">
          <div id="map" style="width:600px;height:470px;background:#23201d;margin: 20px auto;color:#fff;padding-top: 200px;">
            지역을 조회하면 지도가 표시가 됩니다.
          </div>
        </div>
    </center>

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

  </body>
</html>
