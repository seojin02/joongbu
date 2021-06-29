<?php
session_start();
// NAVER LOGIN
define('NAVER_CLIENT_ID', 'BXy2Ds0iba515kwhnXE3');
define('NAVER_CLIENT_SECRET', 'Y_o4z8CM9k');
define('NAVER_CALLBACK_URL', 'https://soohoon.co.kr/naverLogin.php');

// 네이버 로그인 접근토큰 요청 예제
$naver_state = md5(microtime() . mt_rand());
$_SESSION['naver_state'] = $naver_state;
$naver_apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".NAVER_CLIENT_ID."&redirect_uri=".urlencode(NAVER_CALLBACK_URL)."&state=".$naver_state;
?>
