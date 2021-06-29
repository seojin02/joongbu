<?php
if ($w == "") 
{
    $mb = get_member($mb_id);
    if ($mb[mb_id]) 
        alert("이미 가입한 아이디입니다.");

 

  // 휴대폰 인증 -----------------------------------------------------------------------------------------------------------
  $hpno = str_replace("-", "", $mb_hp);
  $q = "select * from sms_auth where hpno = '$hpno' order by wdt desc limit 0, 1";
  echo $q;
  $R = mysql_query($q);
  $c = mysql_affected_rows();
  
  if($c>0) {
   $r = mysql_fetch_array($R);
   if($r[authno]!=$mb_10) {
    echo "휴대폰 인증절차에 오류가 있습니다.";
    exit;
   }
  } else {
   echo "휴대폰 인증절차에 오류가 있습니다.";
   exit;
  }
}
?>