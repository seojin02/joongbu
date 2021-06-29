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
					<td class="numeric">제목</td>
					<td class="numeric">작성자</td>
					<td class="numeric">작성일</td>
					<td class="numeric">조회수</td>
				</tr>
				</thead>
			<tbody>
			<?php
				$sql = "select * from Heal_list_board order by idx desc "; #limit 0,5
				$conn->DBQ($sql);
				$conn->DBE();
				$cnt = $conn->resultRow();
				while($row=$conn->DBF()){
			?>
					<tr style="text-align:center;">
					<td data-title="제목" class="numeric" style="text-overflow:ellipsis; overflow:hidden; white-space:nowrap;">
						<a href="listBoardRead.php?idx=<?php echo $row['idx']; ?>"><?=$row["title"]?></a>
					</td>
					<td data-title="작성자" class="numeric"><?php echo $row['nickname']; ?></td>
					<td data-title="작성일" class="numeric"><?php echo $row['date']; ?></td>
					<td data-title="조회수" class="numeric"><?php echo $row['hit']; ?></td>
				</tr>
			<?}?>
			</tbody>
		</table>
  

   <!-- <?php echo str_replace($row['title'],mb_substr($row['title'],0,16,"utf-8")."...",$row['title']); ?></p></a> -->

	</div>
	<!-- /inner mt-2 -->

	<!-- 버튼 -->
	<div class="inner mt-2 col-lg-12 text-right">
		<a href=""><button class="button">나의 글 확인</button></a>
		<a href="listBoardWrite.php"><button class="button">글쓰기</button></a>
	</div>

</section>


<!--footer-->
<?php include 'footer.php';?>