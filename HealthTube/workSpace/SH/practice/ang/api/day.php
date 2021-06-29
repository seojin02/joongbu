<meta charset="utf-8">
<? 
function date_call($took) 
{ 
$took=str_replace(" ","-",$took); //(년-월-일-시:분:초) 
$took=str_replace(":","-",$took); //(년[0]-월[1]-일[2]-시[3]-분[4]-초[5]) 
$i=explode("-",$took); 
$date_exit=mktime($i[3],$i[4],$i[5],$i[1],$i[2],$i[0]); 

$dday=$date_exit-$date_now; 
if ($date_exit>$date_now) 
return $date_exit; 
else 
return 0; 

} 

//아래의 내용을 바꾸면 d-day 기준 날짜를 변경할수 있다 
//$too="2003-07-21 17:00:00";//(년-월-일 시:분:초) 
$too="2019-06-10 00:00:00"; 
$date_now=time(); 
$dday_second=date_call($too); 

?> 

<HTML> 
<HEAD> 
<META http-equiv="content-type" content="text/html; charset=EUC-KR"> 
<TITLE>실시간 D-DAY</TITLE> 
<SCRIPT LANGUAGE="JavaScript"> 
<!-- 
var dday_second2=<? echo $dday_second-$date_now ?> 
var dday_second=dday_second2; 

function startcount() 
{ 
--dday_second 

var d_sec=dday_second%60 
var d_min= ((dday_second-d_sec)/60)%60 
var d_time=((((dday_second-d_sec)/60)-d_min)/60) %24 
var d_day= (((((dday_second-d_sec)/60)-d_min)/60)-d_time)/24 


document.clock.count.value = d_day
setTimeout("startcount()",1000);   
} 

//--> 
</SCRIPT> 
</HEAD> 

<BODY onload=startcount() > 
<br><br> 
<p text name=count size=40 value="" style="border-style:none;"> 
<? echo"$startcount"?>
</div> 

</BODY> 
</HTML>