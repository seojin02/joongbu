<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER["REQUEST_METHOD"];
$getJSON = null;

$tbl = DB_PREFIX."event_user";

if($method == "GET" || $method == "POST"){
    $_name = $_REQUEST['name'];
    $_phone = str_replace("-","",$_REQUEST['phone']);
    $_privateChk = $_REQUEST['private'];

    if(mb_strlen($_name) > 4){
      $msg = ["msg" => "이름은 4자 이하만 입력해주세요.", "type" => "error"];
      echo json_encode($msg);
      exit;
    }

    if(preg_match("/^[a-z]/", $_name)){
      $msg = ["msg" => "한글만 입력하세요.", "type" => "error"];
      echo json_encode($msg);
      exit;
    }

    if(!preg_match("/^\d{3}\d{3,4}\d{4}$/", $_phone)){
      $msg = ["msg" => "올바른 전화번호를 입력해주세요.", "type" => "error"];
      echo json_encode($msg);
      exit;
    }

    if($_privateChk == "false"){
      $msg = ["msg" => "개인정보처리방침에 동의를 해주세요.", "type" => "error"];
      echo json_encode($msg);
      exit;
    }

    $userCnt = $database->count($tbl, [
                              "phone" => encrypt($_phone)
                            , "flag" => WEEK_FLAG
                        ]);

    if($userCnt > 0){
      $msg = ["msg" => "<p>자.. 눈을 감고 차분히 생각해 보아요.</p><p>전에 응모 하셨을 거예요.</p>", "type" => "error"];
      echo json_encode($msg);
      exit;
    }else{
          $database->insert($tbl, [
                "name" => encrypt($_name)
              , "phone" => encrypt($_phone)
              , "flag" => WEEK_FLAG
          ]);

        $msg = ["msg" => "<p>감사합니다! 이로써 당신은 거친 포식자가 될 수 있는 자격을 획득하셨습니다!</p><p>추첨 일은 초복(7/12), 중복(7/22), 말복(8/11)에 본 사이트에 게시됩니다. 정 없이 나가지 말고 맨 아래까지 쭈욱 읽어주세요~ </p>", "type" => "success"];
        echo json_encode($msg);
        exit;
    }



//     $plainText = $_name;
//
//
//
//
//
//
// // 암호화
//
// $encrypted = encrypt($plainText);
//
//
// // 복호화
//
// $decrypted = decrypt($encrypted);
//
//
// echo 'plainText : ' . $plainText . "<br/>";
//
// echo '암호화 : ' . $encrypted . "<br/>";
//
// echo '복호화 : ' . $decrypted . "<br/>";




echo json_encode($data);

}
