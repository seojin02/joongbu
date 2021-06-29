<?
	$data = file_get_contents('php://input'); 
	//GET, POST 파라미터 값 그대로 확인하는 file_get_contents('php://input');

	//echo json_encode(['result' => false]);
	
	//print_r($data); 받은 값 전체 다시 반환

	$data = json_decode($data); //디코딩 후 stdObject로 반환
	print_r($data);
	//$entityId = $data->entityId;
	//echo $entityId;
?>