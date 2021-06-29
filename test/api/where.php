<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER["REQUEST_METHOD"];
$getJSON = null;

$tbl = DB_PREFIX."pos_code";

if($method == "GET" || $method == "POST"){
    $_type = $_REQUEST['type'];
    $_sido = $_REQUEST['sido'];
    $_gusi = $_REQUEST['gusi'];
    $_dong = $_REQUEST['dong'];

    // 구시 선택경우
    if($_type == 'gusi'){
      $data = $database->select($tbl,
              [
                  'poscode'
                , 'si_do'
                , 'gu_si'
                , 'dong'
                , 'lat'
                , 'lon'
              ],[
                  'si_do[=]' => $_sido
                , 'GROUP' => 'gu_si'
              ]);
    }else if($_type == 'dong'){
      $data = $database->select($tbl,
              [
                    'poscode'
                  , 'si_do'
                  , 'gu_si'
                  , 'dong'
                  , 'lat'
                  , 'lon'
                  , 'address'
                  , 'posname'
              ],[
                  'si_do[=]' => $_sido
                , 'gu_si[=]' => $_gusi
              ]);
    }else if($_type == 'poscode'){
      $data = $database->select($tbl,
              [
                  'poscode'
                , 'si_do'
                , 'gu_si'
                , 'dong'
                , 'lat'
                , 'lon'
                , 'address'
                , 'posname'
              ],[
                  'si_do[=]' => $_sido
                , 'gu_si[=]' => $_gusi
                , 'dong[=]' => $_dong
              ]);
    }


    echo json_encode($data);

}
