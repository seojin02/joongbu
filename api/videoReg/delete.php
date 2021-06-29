<?
include '../dbconn.php';

$conn = new DBC();
$conn->DBI();

$sql = "update Heal_video set flag = '0' where idx = '".$_POST['no']."'";
$conn->DBQ($sql);
$conn->DBE();
?>
<script>window.location.href="../../video.php"</script>
