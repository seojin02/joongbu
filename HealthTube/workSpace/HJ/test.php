<?
	$eventServerUrl = 'http://745e8a4d.ngrok.io/events.json';
	$accessKey = array('accessKey'=>'ibWRlqjmIuu7pWykNQSQnXRtEtQI63OkvqE8gjoN09YR3ovXTh5xTnql-0qTzPrt');

	function setUser($url, $key, $fields)
	{
		$url = $url.'?'.http_build_query($key, '', '&');
		echo $url; 
	}

		$eventTime = date("c");
		$entityId = 1;

		$setData = array(  
							'event' => '$set',
							'entityType' => 'user',
							'entityId' => $entityId,
							'eventTime' => $eventTime
						);

		$setDataJson = json_encode($setData);

		$result = setUser($eventServerUrl, $accessKey, $setDataJson);
?>