<?
	require_once 'dbconn.php';
	require_once 'eventInfo.php';
	
	function setUser($url, $key, $fields)
	{
		$url = $url.'?'.http_build_query($key, '', '&');
	 
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

	if(isset($_POST['name']) && trim($_POST['name']) != ""){
		$nameInput = $_POST['name'];
	}else{
		echo '<script>alert("이름을 입력해주세요");</script>';
		echo '<script>history.back();</script>';
		exit;
	}

    if(isset($nameInput)){
		$conn = new DBC; 
		$conn->DBI(); 

		try{
			/*웹 서버 DB에 입력*/
			$query = "INSERT INTO pioUserT(name) 
					  VALUES (:name);";
			$conn->DBQ($query);
			$conn->result->bindParam(':name', $name); 
			$name = $nameInput;
			$conn->DBE();

			/*idx 1. 이벤트 서버 코드 2. 작업 완료 여부*/
			$LastId = $conn->LastId();
			
			if(isset($LastId)){
				/*이벤트 서버에 입력*/
				$entityId = 'u'.$LastId;
				$eventTime = date("c");
				//$accessKey = array('accessKey'=>'qUdgp9kyeG-uT2kl7BTl4H3iI68vWLQSkH3SAIti_6jPr_LyrJBGYoHeTLO0jAr2');
				$setData = array(  
								  'event' => '$set',
								  'entityType' => 'user',
								  'entityId' => $entityId,
								  'eventTime' => $eventTime
								);

				$setDataJson = json_encode($setData);

				$result = setUser($eventServerUrl, $accessKey, $setDataJson);

				$resultJson = json_decode($result);

				$eventId = $resultJson->eventId;
				$message = $resultJson->message; //에러 메시지(트랜잭션 적용 경우 에러 메시지 뜨면 rollback 후 다시 입력해야됨)

				/*이벤트아이디 처리*/
				$query = "UPDATE pioUserT
						  SET eventId = :eventId
						  WHERE idx = $LastId";
				$conn->DBQ($query);
				$conn->result->bindParam(':eventId', $Id); 
				$Id = $eventId;
				$conn->DBE();			
			}else{
				echo '<script>alert("서버오류 (계속 반복 시 관리자에게 문의해주세요)");</script>';
				echo '<script>history.back();</script>';
				exit;
			}

		}catch(PDOException $e){
			echo "Error: " . $e->getMessage();
			echo '<script>alert("서버오류 (계속 반복 시 관리자에게 문의해주세요)");</script>';
			echo '<script>history.back();</script>';
			exit;
		}

		$conn->DBO(); // db객체 해제 (종료)
		echo '<script>alert("'.$eventId.'");</script>';
		echo '<script>location.href="../user.php";</script>';
		exit;
	}else{
		echo '<script>alert("이름을 입력해주세요");</script>';
		echo '<script>history.back();</script>';
		exit;
	}
?>