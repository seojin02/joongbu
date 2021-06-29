<!--header-->
<?php include '../../header.php';?>

<!--db 접속-->
<?
include '../../api/dbconn.php';

$conn = new DBC();
$conn->DBI();
?>

<!--컨테이너-->
<section id="main">
	<div class="inner mt-2">
	<h4 class="mb-5">글쓰기</h4>
		<form action="list_board_write_ok.php" method="post">
			<div>
				<textarea name="title" id="utitle" rows="1" placeholder="50자 이내로 제목을 입력해 주세요." maxlength="50" required></textarea>
			</div>
			<div>
				<textarea name="content" id="ucontent" rows="10" placeholder="500자 이내로 내용을 입력해 주세요." maxlength="500"  required></textarea>
			</div>
			<div class="inner mt-2 col-lg-12 text-right">
				<a href=""><button class="button">글 작성</button></a>
			</div>
		</form>
	</div>
</section>


<!--footer-->
<?php include '../../footer.php';?>


<!-- 폼만 완성된 상태입니다  ####################### -->