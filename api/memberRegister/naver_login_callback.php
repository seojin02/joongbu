<?php session_start(); 
// NAVER LOGIN 
define('NAVER_CLIENT_ID', 'BXy2Ds0iba515kwhnXE3');
define('NAVER_CLIENT_SECRET', 'Y_o4z8CM9k');
define('NAVER_CALLBACK_URL', 'https://soohoon.co.kr/naverLogin.php');

if ($_SESSION['naver_state'] != $_GET['state']) { 
	// 오류가 발생하였습니다. 잘못된 경로로 접근 하신것 같습니다. 
} 
$naver_curl="https://nid.naver.com/oauth2.0/token?grant_type=authorization_code&client_id=".NAVER_CLIENT_ID."&client_secret=".NAVER_CLIENT_SECRET."&redirect_uri=".urlencode(NAVER_CALLBACK_URL)."&code=".$_GET['code']."&state=".$_GET['state']; 

// 토큰값 가져오기 
$is_post = false; 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $naver_curl); 
curl_setopt($ch, CURLOPT_POST, $is_post); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

$response = curl_exec ($ch); 
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
curl_close ($ch); 
if($status_code == 200) { 
			$responseArr = json_decode($response, true); 

			$_SESSION['naver_access_token'] = $responseArr['access_token']; 
			$_SESSION['naver_refresh_token'] = $responseArr['refresh_token']; // 토큰값으로 네이버 회원정보 가져오기
			
			$me_headers = array( 'Content-Type: application/json', sprintf('Authorization: Bearer %s', $responseArr['access_token']) );
			
			$me_is_post = false; 
			$me_ch = curl_init(); 
			curl_setopt($me_ch, CURLOPT_URL, "https://openapi.naver.com/v1/nid/me"); 
			curl_setopt($me_ch, CURLOPT_POST, $me_is_post); 
			curl_setopt($me_ch, CURLOPT_HTTPHEADER, $me_headers); 
			curl_setopt($me_ch, CURLOPT_RETURNTRANSFER, true); 
			$me_response = curl_exec ($me_ch); 
			$me_status_code = curl_getinfo($me_ch, CURLINFO_HTTP_CODE); 
			curl_close ($me_ch); $me_responseArr = json_decode($me_response, true); 

			if ($me_responseArr['response']['id']) { // 회원아이디(naver_ 접두사에 네이버 아이디를 붙여줌) 
			$mb_uid = 'naver_'.$me_responseArr['response']['id']; // 회원가입 DB에서 회원이 있으면(이미 가입되어 있다면) 토큰을 업데이트 하고 로그인함 
			
		/*	if () { // 멤버 DB에 토큰값 업데이트 $responseArr['access_token'] // 로그인 
			} // 회원정보가 없다면 회원가입 
			else { // 회원아이디 
			$mb_uid $mb_nickname = $me_responseArr['response']['nickname']; // 닉네임 
			$mb_email = $me_responseArr['response']['email']; // 이메일 
			$mb_gender = $me_responseArr['response']['gender']; // 성별 F: 여성, M: 남성, U: 확인불가 
			$mb_age = $me_responseArr['response']['age']; // 연령대 
			$mb_birthday = $me_responseArr['response']['birthday']; // 생일(MM-DD 형식) 
			$mb_profile_image = $me_responseArr['response']['profile_image']; // 프로필 이미지 // 멤버 DB에 토큰과 회원정보를 넣고 로그인 } } else { // 회원정보를 가져오지 못했습니다. 
			} } else { // 토큰값을 가져오지 못했습니다. } */
