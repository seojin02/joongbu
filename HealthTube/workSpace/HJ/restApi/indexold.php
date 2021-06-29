<?
	function setUser($fields)
	{
		$url = "http://9a98a5e9.ngrok.io/api.php";
//http://9a98a5e9.ngrok.io/api.php
//http://ccit2.dothome.co.kr/HealthTube/workSpace/HJ/restApi/api.php
		$ch = curl_init(); //핸들러 초기화
		curl_setopt($ch, CURLOPT_URL, $url); //URL 지정
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); //필수
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //결과값을 return하게 되어 변수에 저장 가능
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); //POST로 보낼 데이터 지정하기
		curl_setopt($ch, CURLOPT_POST, true); //0이 default 값이며 POST 통신을 위해 1로 설정
		$response = curl_exec($ch);
		curl_close ($ch);
		return $response;
	}
	
	$entityId = 'u1';
	$eventTime = date("c");
	$setData = array(  
										'event' => '$set',
										'entityType' => 'user',
										'entityId' => $entityId,
										'eventTime' => $eventTime
									);
	$setDataJson = json_encode($setData);

	$result = setUser($setDataJson);
	echo $result;
	//$resultJson = json_decode($result);
/*
	print_r($result);

	$event = $resultJson->event;
	$entityType = $resultJson->entityType;
	$entityId = $resultJson->entityId;
	$eventTime = $resultJson->eventTime;
  
	echo "<br/>";
	echo $event."  ".$entityType."  ".$entityId."  ".$eventTime;
*/
?>
