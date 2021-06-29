<?php
include 'api/dbconn.php';
// include 'api/pageClass.php';
include 'api/pio/predictClass.php';
include 'api/pio/eventClass.php';

$PIO = new Predict($machineUrl."predict.php");
$conn = new DBC();
$conn->DBI();

if($_SESSION['idx'] == null){
	?>
	<script>
		alert('로그인이 필요한 서비스입니다!');
		// history.back(-1);
		window.location.href="login.php";
	</script>
	<?
} else {
	$user = 'u'.$_SESSION['idx'];
	$num = 12;
	$PIO -> setPredict($user, $num);

	$message = $PIO->predict();
	$resultJson = json_decode($message); //디코딩 후 stdObject로 반환

	$searchArr = array();

	for($i=0;$i<count($resultJson->itemScores);$i++){
	  $searchArr[$i] = $resultJson->itemScores[$i]->item;
		$itemCode[$i] = mb_substr($resultJson->itemScores[$i]->item,1);
	}

	$inString = implode("','", str_replace('i','',$searchArr)); //순위대로 아이템 넘버 정렬
	// echo $inString;
	// echo nl2br("\n");

	$sql = "SELECT * FROM Heal_video WHERE idx IN('".$inString."')";
?>
<?include 'header.php';?>
<?include 'menu.php';?>

<?
if($_GET['search_text'] == null){
	$searchText = " and title LIKE '%%'";
} else {
	$searchText = " and title LIKE '%".$_GET['search_text']."%' ";
}
if($_GET['top_1'] == null and $_GET['top_2'] == null and $_GET['top_3'] == null and $_GET['top_4'] == null and $_GET['top_5'] == null
 and $_GET['bot_1'] == null and $_GET['bot_2'] == null and $_GET['bot_3'] == null and $_GET['core_1'] == null and $_GET['core_2'] == null
 and $_GET['equipment_1'] == null and $_GET['equipment_1'] == null)
 {
		$searchBody = ' ';
 }else
 {
		$searchBody = " and category_body in ('".$_GET['top_1']."','".$_GET['top_2']."','".$_GET['top_3']."','".$_GET['top_4']."','".$_GET['top_5']."'
		,'".$_GET['bot_1']."','".$_GET['bot_2']."','".$_GET['bot_3']."','".$_GET['core_1']."','".$_GET['core_2']."') ";
 }
 if($_GET['equipment_1'] == null and $_GET['equipment_2'] == null){
 	$searchEquipment = ' ';
 }else{
 	$searchEquipment = " and category_equipment in('".$_GET['equipment_1']."','".$_GET['equipment_2']."')";
 }
?>

<!--================Blog Area =================-->
<!--<section class="blog_area section_padding" style="padding: 50px 0px;">-->
<section class="blog_area section_padding" style="min-height:1100px;padding: 100px 0px;">
	<div class="container">
		<h2><b>(<?=$_SESSION['id']?>님을 위한) 추천&인기영상</b></h2>
		<div class="row">
			<!-- <div class="col-lg-12">
				<form action="<?//echo $_SERVER['PHP_SELF'];?>" method="GET">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="search_text" placeholder="검색어를 입력하세요 . . ."
						value="<?//if($_GET['search_text'] == null){}else{echo $_GET['search_text'];}?>">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-outline-secondary" id="searchButton">
								<span><i class="fa fa-search"></i></span>
							</button>
						</span>
					</div>
				</form>
			</div> -->
			<!-- /col-lg-12 -->

			<?
			$sql = "
			select *
			FROM Heal_video
			WHERE idx IN('".$inString."')
			$searchText $searchBody $searchEquipment
			order by FIELD(idx, '$inString')";

			$conn->DBQ($sql);
			$conn->DBE();
			while($row=$conn->DBF()){
				?>
				<div class="col-lg-3 mt-3">

					<div class="card">
						<a href="videoDetail.php?no=<?echo $row['idx'];?>">
							<img class="img-fluid" src="https://i.ytimg.com/vi/<?echo $row['video_id']; ?>/0.jpg" width="100%" height="100%">
							<p style="text-align:center;margin-top:10px;">
								<?php
								if(mb_strlen($row['title']) >= 20){
									echo str_replace($row['title'],mb_substr($row['title'],0,20,"utf-8")."...",$row['title']);
								}else{
									echo $row['title'];
								}?>
							</p>
						</a>
						<div class="text-center mt-2 mb-2">
							<button type="button" class="btn btn-outline-success btn-sm"><?php echo $row['category_body']; ?></button>
							<button type="button" class="btn btn-outline-info btn-sm"><?php echo '장비 '.$row['category_equipment']; ?></button>
						</div>
					</div>
					<!-- /card -->
				</div>
				<!-- /col-lg-3 mt-3 -->
				<?}?>
				<div class="col-lg-12 text-center mt-5">
<!-- 					<nav class="blog-pagination justify-content-center d-flex"> -->
					<nav class="justify-content-center d-flex">
						<ul class="pagination" style="justify-content: center;">
							<?echo $paging; ?>
						</ul>
					</nav>
				</div>

			</div>
			<!-- /row -->

		</div>
		<!-- /container -->
	</section>

	<?include 'footer.php'; }?>
