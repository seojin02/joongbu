<?php
    /*
    | @Author dyKim.
    | @Date 2019.07.02
    | @Description Index
    */
    session_start();
    if(is_file('../config/config.php'))
      require('../config/config.php');
    else if(is_file('config/config.php'))
      require('config/config.php');
    else{
      echo '<p>404ERR.</p>';
      exit;
    }

    // MAIN PATH
    define('MAIN_PATH', dirname(__FILE__).'/../');

    define('DB_PREFIX','netf_');


    /*
    |   @Author dykim
    |   @date 19.07.02
    |   @brief D-day만으로 계산(서버로만)
    */
    $win_date = ['2019-07-22','2019-08-11'];
    $nowDate = date('Y-m-d');

    for($i = 0; $i < count($win_date); $i++){
      if(strtotime($nowDate) < strtotime($win_date[$i])){
        $todayDate = date_create($nowDate);
        $expDate =  date_create($win_date[$i]);
        $diff =  date_diff($todayDate, $expDate);

        $week_flag = $i;
        $win_date = $diff->format("%a");
        if(mb_strlen($win_date) == 1){
          $win_date = '0'.$win_date;
        }
        define('WEEK_FLAG',$i);
        define('WINDAY',$win_date);
        break;
      }
    }


    $_do = explode('/',$_SERVER['REQUEST_URI']);
    $_getClientIP = $_SERVER['REMOTE_ADDR'];

    $_param = explode('?',$_SERVER['REQUEST_URI']);

    //  Qr로 들어온 사람들 Ga 전송
    //  https://www.uplus-strange-event.co.kr
    if(strpos($_SERVER["HTTP_HOST"], "www.uplus-strange-event.co.kr") !== false){
      header("Location: https://www.uplus-strangevent.co.kr?utm_source=fan&utm_medium=qr");
      exit;
    }

    if($_do[1] == "" || $_param[0] == "/"){
      if(MODE == 'DEV'){
        if($_getClientIP == "211.55.49.10" || $_getClientIP == "118.36.129.73"){
          view('event');
        }else{
          view('ready');
        }
      }else{
        view('event');
      }
    }else if($_do[1] == "api"){
      if(is_file(MAIN_PATH.$_do[1]."/".$_do[2].".php")){
        include MAIN_PATH.$_do[1]."/".$_do[2].".php";
      }else{
        header('HTTP/1.0 404 Not Found', true, 404);
        echo "페이지를 찾을 수 없습니다.\n";
        die();
    }
    }else{
      if(strpos($_SERVER['REQUEST_URI'], "?") !== false){
        view($_do[1]);
      }else{
        view($_do[1]);
      }
    }

// view 출력
function view($t){
  if(!is_file(MAIN_PATH.$t.".php")){
      header('HTTP/1.0 404 Not Found', true, 404);
      echo "페이지를 찾을 수 없습니다.\n";
      die;
  }

  if($param != ""){
    include MAIN_PATH.$t.".php";
  }else{
    include MAIN_PATH.$t.".php";
  }
}
