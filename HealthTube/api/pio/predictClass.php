<?php
//header('Content-Type: application/json');
header('Content-Type: text/html; charset=UTF-8');

class predict
{
	private $setJson, $url;

	public function __construct($url) 
	{
		$this->url = $url;
	}

	public function setPredict($user, $num)
	{
		$this->setJson = array(
														'accessKey' => 'ibWRlqjmIuu7pWykNQSQnXRtEtQI63OkvqE8gjoN09YR3ovXTh5xTnql-0qTzPrt', 
														'user'=>  $user, 
														'num'=> (int)$num
													);
		$this->setJson = json_encode($this->setJson);
	}

	public function setPredictCate($user, $num, $categories)
	{
		$this->setJson = array(
														'accessKey' => 'ibWRlqjmIuu7pWykNQSQnXRtEtQI63OkvqE8gjoN09YR3ovXTh5xTnql-0qTzPrt', 
														'user'=> $user, 
														'num'=> (int)$num,
														'categories' => $categories
													);
		$this->setJson = json_encode($this->setJson);
	}

	public function getEvent()
	{
	 return $this->setJson;
	}

	public function predict()
	{
		$ch = curl_init(); //핸들러 초기화
		curl_setopt($ch, CURLOPT_URL, $this->url); //URL 지정
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); //필수
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //결과값을 return하게 되어 변수에 저장 가능
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->setJson); //POST로 보낼 데이터 지정하기
		curl_setopt($ch, CURLOPT_POST, true); //0이 default 값이며 POST 통신을 위해 1로 설정
		$response = curl_exec($ch);
		curl_close ($ch);
		return $response;
	}
}
$PIO = new predict("http://9fd6486d.ngrok.io/predict.php");

$categories = array("d1","t1");
$PIO -> setPredictCate('u80', 10, $categories);

//$PIO -> setPredict('u80', 10);

$message = $PIO->predict();	
$resultJson = json_decode($message); //디코딩 후 stdObject로 반환
//print_r($message);

	for($i=0;$i<count($resultJson->itemScores);$i++){
		echo "상품 : ".$resultJson->itemScores[$i]->item." (예측점수 : ".$resultJson->itemScores[$i]->score.")<br/>";
		//$itemCode[$i] = mb_substr($resultJson->itemScores[$i]->item,1);
	}
	
	//$inString = implode (",", $itemCode); //순위대로 아이템 넘버 정렬
	//echo $inString;
	
?>