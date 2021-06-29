<?php

include '../../api/dbconn.php';

$conn = new DBC();
$conn->DBI();

$date = date('Y-m-d');
$sql = mq("insert into board(name,pw,title,content,date) values('".$_POST['name']."','".$_POST['title']."','".$_POST['content']."','".$date."')"); ?>
<script type="text/javascript">alert("글쓰기 완료되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/" />


<!-- 중단 이유 회원정보 -->