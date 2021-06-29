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
    <!-- <link rel="stylesheet" type="text/css" href="/css/table-responsive.css?ver=<?=Ver?>"/> -->

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
		<style>
		/*
	Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
	*/
	@media
	  only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {

		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr {
			display: block;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

    tr {
      margin: 0 0 1rem 0;
    }
      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
		td {
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee;
			position: relative;
			padding-left: 50%;
		}

		td:before {
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 0;
			left: 6px;
			width: 45%;
			padding-right: 10px;
			white-space: nowrap;
		}

		/*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/
		td:nth-of-type(1):before { content: "매장명"; }
		td:nth-of-type(2):before { content: "매장 주소"; }
		td:nth-of-type(3):before { content: "선택"; }
	}
		</style>
  </head>
  <body>
<table role="table">
  <thead role="rowgroup">
    <tr role="row">
      <th role="columnheader">매장명</th>
      <th role="columnheader">매장 주소</th>
      <th role="columnheader">선택</th>
    </tr>
  </thead>
  <tbody role="rowgroup">
    <tr role="row">
      <td role="cell">James</td>
      <td role="cell">Matman</td>
      <td role="cell">Chief Sandwich Eater</td>
    </tr>
    <tr role="row">
      <td role="cell">The</td>
      <td role="cell">Tick</td>
      <td role="cell">Crimefighter Sorta</td>
    </tr>
    <tr role="row">
      <td role="cell">Jokey</td>
      <td role="cell">Smurf</td>
      <td role="cell">Giving Exploding Presents</td>
    </tr>
    <tr role="row">
      <td role="cell">Cindy</td>
      <td role="cell">Beyler</td>
      <td role="cell">Sales Representative</td>
    </tr>
    <tr role="row">
      <td role="cell">Captain</td>
      <td role="cell">Cool</td>
      <td role="cell">Tree Crusher</td>
    </tr>
  </tbody>
</table>
  </body>
</html>
