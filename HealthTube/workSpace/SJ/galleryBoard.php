<!--header-->
<?php include 'header.php';?>

<!--db 접속-->
<?
include './api/dbconn.php';

$conn = new DBC();
$conn->DBI();
?>

<!--컨테이너-->
<section id="main">
	<div class="inner mt-2">
	<h4 class="mb-5">비포 & 에프터</h4>
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
				<?
					$sql = "select * from Heal_board";
					$conn->DBQ($sql);
					$conn->DBE();
					while($row=$conn->DBF()){
				?>
				  <div class="col-lg-3 card">
						<a href="galleryBoardRead?no=<?echo $row['idx'];?>">
							<?php echo $row['img']; ?><br>
							<?php echo $row['title']; ?><br></a>
						  <?php echo $row['nickname']; ?>&nbsp&nbsp<?php echo $row['date']; ?>&nbsp&nbsp조회수 : <?php echo $row['hit']; ?>
					</div>
				<?}?>
					<!-- /col-lg-3 card -->
				</div>
				<!-- /row -->
			</div>
			<!-- /col-lg-12 -->
		</div>
		<!-- /row -->
	</div>
	<!-- /inner mt-2 -->
</section>

<!--footer-->
<?php include 'footer.php';?>