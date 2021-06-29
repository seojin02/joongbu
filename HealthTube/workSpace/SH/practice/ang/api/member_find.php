<?
include "dbconn.php";
$conn = new DBC();
$conn->DBI();

$email = $_POST['email'].'@'.$_POST['emadress'];
$sql="select id from Heal_member where email='$email'";

$conn->DBQ($sql);
$conn->DBE();
$row = $conn->DBF();
$rowcnt = $conn->resultRow();

if(!$row){
  echo "<script>alert('없는 ID입니다');history.back();</script>";
}else{
    echo "<script>alert('회원님의 ID는 ".$row[0]." 입니다.');history.back();</script>";
}

?>