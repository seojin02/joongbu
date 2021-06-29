<!--db 접속-->
<?
include '../../api/dbconn.php';

$conn = new DBC();
$conn->DBI();
?>

<!--header-->
<?php include '../../header.php';?>

<!--컨테이너-->
<section id="main">
	<div class="inner mt-2">
	<h4 class="mb-5">글보기(텍스트삭제예정)</h4>
		<div class="card mb-3">
			<div class="card-body">
				<div class="row">

					<!-- 글을 불러오기 위하여 URL에서 idx값을 가져와 데베 값을 불러옴 -->
					<?php
						$idx = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
						# 조회수
						$hit = "update Heal_board set hit = hit + 1 where idx = $idx";
						$conn->DBQ($hit);
						$conn->DBE();
						# 데이터베이스에서 값 가져오기
						$sql = "select * from Heal_board where idx='".$idx."'"; /* 받아온 idx값을 선택 */
						$conn->DBQ($sql);
						$conn->DBE();
						$board = $conn->DBF();
					?>

					<!-- 글 불러오기 -->
					<div class="col-lg-12 mt-2">
						<h2>제목 :&nbsp<?php echo $board['title'];?></h2>
					</div>
					<div class="col-lg-12 mt-3 mb-3">
						작성자 : <?php echo $board['nickname'];?>&nbsp&nbsp&nbsp&nbsp
						작성일 : <?php echo $board['date'];?>&nbsp&nbsp&nbsp&nbsp
						조회수 : <?php echo $board['hit'];?>
					</div>
					<div class="col-lg-12">
						<?php echo nl2br("$board[content]");?>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /card-body -->
		</div>
		<!-- /card mb-3 -->
	</div>
	<!-- /inner mt-2 -->
	
	<!--삭제, 수정, 목록, 추천 버튼-->
	<div class="inner mt-2 col-lg-12 text-right">
		<a href=""><button class="button">삭제</button></a>
		<a href=""><button class="button">수정</button></a>
		<a href=""><button class="button">목록</button></a>
		<a href=""><button class="button">추천</button></a>
	</div>

	<div class="inner mt-2 col-lg-12">
  <!-- 빈공간 이전글 다음글 넣을 예정 -->
	</div>

</section>

<!--footer-->
<?php include '../../footer.php';?>