<?php
  // 네이버 로그인 접근토큰 요청 예제
  $client_id = "DzPzkNpGMr8alAhibzRz";
  $redirectURI = urlencode("http://soohoon.co.kr/api/naver/callback.php");
  $state = "http://soohoon.co.kr/naverOAuth.php";
  $apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".$client_id."&redirect_uri=".$redirectURI."&state=".$state;
?><a href="<?php echo $apiURL ?>"><img height="50" src="http://static.nid.naver.com/oauth/small_g_in.PNG"/></a>