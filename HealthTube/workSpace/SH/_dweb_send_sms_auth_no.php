<?
include_once("./_common.php");
require "xmlrpc.inc.php";
require "class.EmmaSMS.php";
 
 //---SMS---- S
 $sms_id = "smsid";
 $sms_pw = "smspw";
 $my_hpno = "0101231234";
 
 $sms = new EmmaSMS();
 $sms->login("$sms_id", "$sms_pw");
 //---SMS---- E
 
 $auth_no = rand(10000, 99999);
 $send_to = str_replace("-", "", $send_to);
 
 if($send_to!="") {
  $q = "select * from sms_auth where hpno = '$send_to' order by wdt desc limit 0, 1";

  $R = mysql_query($q);
  $c = mysql_affected_rows();
  $ntime = time();
  
  if($c>0) {
   $r = mysql_fetch_array($R);
   if($ntime - $r[wdt]<300) {
    //alert('10분 이내에 재전송 불가');
    echo "<script>
       alert('10분이내 재전송 불가');
       </script>";
    exit;
   }
  }
  
  $message = "인증번호 : [$auth_no]";
  
  $smsret = $sms->send($send_to, $my_hpno, $message, ""); 
  
  $q="insert into sms_auth (idx, hpno, authno, wdt) values ('', '$send_to', '$auth_no', '$ntime')";
  mysql_query($q);
  
  echo "<script>
       alert('인증번호가 전송되었습니다');
       </script>";
  exit;
 }
?>