<?php

	include 'api/dbconn.php';

	$conn = new DBC();
	$conn->DBI();

	$id = $_SESSION['id'];
	$sql = "select * from Heal_member where id='".$id."'";
	$conn->DBQ($sql);
	$conn->DBE();
	while ($row = $conn->DBF()) {
		$nickname = $row['nickname'];
	}

	$title = $_POST['title'];
	$content = $_POST['content'];
	$date = date('Y-m-d');
	$sql = " insert into Heal_board(title, nickname, content, date, hit, cate) values('".$title."','".$nickname."','".$content."','".$date."','0','1') ";
	$conn->DBQ($sql);
	$conn->DBE();
?>


<script type="text/javascript">
alert("글쓰기 완료되었습니다.");
location.href="listBoard.php";
</script>