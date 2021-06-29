<!--header-->
<?php include 'header.php';?>

<!--db 접속-->
<?
include 'api/dbconn.php';

$conn = new DBC();
$conn->DBI();
?>
<!--   -->

<!--컨테이너-->
<section id="main">
	<div class="inner mt-2">
		<h4 class="mb-5">자유게시판</h4>
		<table class="table table-striped table-advance table-hover" style="table-layout:fixed">
			<thead>
				<tr style="text-align:center;">
					<td style="width:3%;" class="numeric"></td>
					<td style="width:auto; text-align:left;" class="numeric">제목</td>
					<td style="width:15%;" class="numeric">작성자</td>
					<td style="width:15%;" class="numeric">작성일</td>
					<td style="width:10%;" class="numeric">조회수</td>
				</tr>
				</thead>
			<tbody>
			<?php
				$id = $_SESSION['id'];
				$s = "select * from Heal_member where id='".$id."'";
				$conn->DBQ($s);
				$conn->DBE();
				while ($row = $conn->DBF()) {
					$session_nickname = $row['nickname'];
				}

				$sql = " select * from Heal_board where nickname = '".$session_nickname."' "; #limit 0,5   / order by idx desc
				$conn->DBQ($sql);
				$conn->DBE();
				$cnt = $conn->resultRow();
				while($row=$conn->DBF()){
			?>
					<tr style="text-align:center;">
					<td data-title="" class="numeric"></td>
					<td style="text-align:left;" data-title="제목" class="numeric" style="text-overflow:ellipsis; overflow:hidden; white-space:nowrap;">
					<a href="listBoardRead.php?idx=<?php echo $row['idx']; ?>">&<?php echo $row['title']; ?></a></td>
					<td data-title="작성자" class="numeric"><?php echo $row['nickname']; ?></td>
					<td data-title="작성일" class="numeric"><?php echo $row['date']; ?></td>
					<td data-title="조회수" class="numeric"><?php echo $row['hit']; ?></td>
				</tr>
			<?}?>
			</tbody>
		</table>

	</div>
	<!-- /inner mt-2 -->

	<!-- 버튼 -->
	<div class="inner mt-2 col-lg-12 text-right">
		<a href="listBoard.php"><button class="button">돌아가기</button></a>
		<a href="listBoardWrite.php"><button class="button">글쓰기</button></a>
	</div>

</section>

<!--footer-->
<?php include 'footer.php';?>