<!--header-->
<?php include 'header.php';?>

<!--db 접속-->
<?
include 'api/dbconn.php';

$conn = new DBC();
$conn->DBI();
?>
<!-- 페이지네이션 -->
<?php

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}
	$pageQuery = "select * from Heal_board";
	$conn->DBQ($pageQuery);
	$conn->DBE();
	$row_num = $conn -> resultRow($pageQuery); //게시판 총 레코드 수
	$list = 6; //한 페이지에 보여줄 개수
	$block_ct = 5; //블록당 보여줄 페이지 개수

	$block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
	$block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
	$block_end = $block_start + $block_ct - 1; //블록 마지막 번호

	$total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
	if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
	$total_block = ceil($total_page/$block_ct); //블럭 총 개수
	$start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

	#버튼 디자인
	#$page->setDisplay("prev_btn", "<"); // [이전]버튼을 [prev] text로 변경
	#$page->setDisplay("next_btn", ">"); // 이와 같이 버튼을 이미지로 바꿀수 있음
	#$page->setDisplay("end_btn", ">>");
	#$page->setDisplay("start_btn", "<<");
	#$page->setDisplay("class","page-item");
	#$page->setDisplay("full");

	$s = "select * from Heal_board order by idx desc limit $start_num, $list";
	$conn->DBQ($s);
	$conn->DBE();
?>


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
				$sql = "select * from Heal_board where cate = '1' order by idx desc limit $start_num, $list "; #limit 0,5
				$conn->DBQ($sql);
				$conn->DBE();
				$cnt = $conn->resultRow();
				while($row=$conn->DBF()){
			?>
					<tr style="text-align:center;">
					<td data-title="" class="numeric"></td>
					<td style="text-align:left;" data-title="제목" class="numeric" style="text-overflow:ellipsis; overflow:hidden; white-space:nowrap;">
					<a href="listBoardRead.php?idx=<?php echo $row['idx'];?>"><?php echo $row['title']; ?></a></td>
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
		<a href="listBoardMypage.php"><button class="button">나의 글 확인</button></a>
		<a href="listBoardWrite.php"><button class="button">글쓰기</button></a>
	</div>

	<!-- 페  -->
	<nav aria-label="Page navigation example">
		<div class="container" id="page_num">
			<ul class="pagination justify-content-center">

				<?php
				if($page <= 1)
				{ //만약 page가 1보다 크거나 같다면
					echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시
				}else{
					echo "<li><a href='?page=1'>처음</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
				}
				if($page <= 1)
				{ //만약 page가 1보다 크거나 같다면 빈값

				}else{
					$pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
					echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
				}
				for($i=$block_start; $i<=$block_end; $i++){
					//for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
					if($page == $i){ //만약 page가 $i와 같다면
						echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
					}else{
						echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
					}
				}
				if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
				}else{
					$next = $page + 1; //next변수에 page + 1을 해준다.
					echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
				}
				if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
					echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
				}else{
					echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
				}
				?>
			</ul>
		</div>
	</nav>

</section>

<!--footer-->
<?php include 'footer.php';?>

<?php
  echo '<pre>';
  $page = $_GET['page'];
  var_dump($page);
  echo '</pre>';
?>