<?
include_once("./_common.php");
 
 if($hpno!="") {
  $hpno=str_replace("-", "", $hpno);
  $q = "select * from sms_auth where hpno = '$hpno' and authno='$authno' order by wdt desc limit 0, 1";

  $R = mysql_query($q);
  $c = mysql_affected_rows();
  
  if($c>0) {
   echo "
    <script>
     parent.fregisterform.mb_9.value='Y';
     alert('확인되었습니다.');
     
    </script>";
   
  } else {
   echo "
    <script>
    parent.fregisterform.mb_9.value='N';
     alert('휴대전화번호와 인증번호가 일치하지 않습니다.');
     
    </script>";
  }
  
  exit;
 }
 exit;
?>