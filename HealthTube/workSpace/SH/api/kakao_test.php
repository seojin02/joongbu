<?php 
$CLIENT_ID	= $kakao['3847753e211b724d097289d1bbb1c7bf']; 
$REDIRECT_URI	= $kakao['http://soohoon.co.kr/HealthTube/workSpace/SH/api/kakao_login_callback.php']; 
$authorize_code = $_GET["eLXGYFzcOctbh8ow2DeX6DYAYwaWL97KobVOcxIZdv9KUVpszRqodMDc0Z0AOEZ7JBhCkAorDSAAAAFqya"]; 

// POST the code to get an access token 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,"https://kauth.kakao.com/oauth/token"); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=authorization_code&client_id=".$CLIENT_ID."&redirect_uri=".$REDIRECT_URI."&code=".$authorize_code.""); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$result = curl_exec ($ch); 
curl_close ($ch); 

echo "res 1 : ". $result; 

$result = json_decode($result, true); 
$access_token = $result['meQqH_lutCNndW5QYsA3lshV8EiDMnJ1pOEz-QorDKcAAAFqya2xhA']; 

if($access_token){ 
// POST the access token to get user info 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,"https://kapi.kakao.com/v1/user/me"); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$access_token)); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec ($ch); 
echo "val 1 : ". $response; 
$response = json_decode($response, true); 
curl_close ($ch); 
} else { 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,"https://kauth.kakao.com/oauth/token"); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=refresh_token&client_id=".$CLIENT_ID."&refresh_token=".$result[T5d_gg9Gam-ta4Lsr1sDj9KkmSjpCCMDEHAB3QorDKcAAAFqya2xgw].""); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$result2 = curl_exec ($ch); 
curl_close ($ch); 
echo"res 2 : ". $result2; 

// POST the access token to get user info 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,"https://kapi.kakao.com/v1/user/me"); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$result2[meQqH_lutCNndW5QYsA3lshV8EiDMnJ1pOEz-QorDKcAAAFqya2xhA])); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec ($ch); 
echo "val 2 : ". $response; 
$response =  json_decode($response, true); 
curl_close ($ch); 
} 
?>