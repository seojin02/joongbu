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
	<h4 class="mb-5">비포 & 에프터</h4>
		<div class="container">
		<table>
			<tbody>
				<?php
					$sql = "select * from Heal_board order by idx desc";
					$conn->DBQ($sql);
					$conn->DBE();
					$cnt = $conn->resultRow();
					while($row=$conn->DBF()){
				?>
					<div class="row">
						<div class="col-md-3">
							<div data-title="이미지"class="numeric"><a href="list_board_read.php?idx=<?php echo $row['idx']; ?>"> <!-- 이미지 --> </div>
							<div data-title="제목" class="numeric"><?php echo $row['title']; ?></div></a>
							<div data-title="작성자, 작성일, 조회수" class="numeric"><?php echo $row['nickname']; ?><?php echo $row['date']; ?><?php echo $row['hit']; ?></div>
						</div>
					</div>
				<?}?>
				</div>
			</tbody>
		</table>



	</div>
	<!-- /inner mt-2 -->
</section>




<!--footer-->
<?php include '../../footer.php';?>