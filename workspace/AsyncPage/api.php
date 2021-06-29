<?
	header("Content-Type: application/json");
	include("dummy.php");
	
	if(!isset($_POST["type"])){	
		error();
	}else{
		$type = $_POST["type"];

		if($type == "count"){
			$data = dataDummyCount();
			json($data);
		}elseif($type == "class" && isset($_REQUEST["page"]) && trim($_REQUEST["page"]) != ""){
			$page = $_REQUEST["page"];
			$data = dataDummySelect($page);
			json($data);
		}else{
			error();
		}
	}
		
	function json($data){
		$output =  json_encode($data,JSON_PRETTY_PRINT); 
		echo urldecode($output);
	}

	function error(){
		$data["code"] = "404";
		$output =  json_encode($data,JSON_PRETTY_PRINT); 
		echo urldecode($output);
		exit();
	}

	/*http://blog.devez.net/257*/
?>