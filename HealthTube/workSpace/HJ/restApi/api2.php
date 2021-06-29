<?

$ch = curl_init(); //curl 사용 전 초기화 필수(curl handle)

$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($res, 0, $header_size);
$body = substr($res, $header_size);    
 
$body_json = json_decode($body, true);
print_r($body_json);

?>