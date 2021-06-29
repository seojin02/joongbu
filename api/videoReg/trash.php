<?
include '../dbconn.php';
$conn=new DBC();
$conn->DBI();

$sql = "update Heal_video_review set flag = '0' where idx = '".$_POST['no']."'";
$conn->DBQ($sql);
$conn->DBE();
?>
