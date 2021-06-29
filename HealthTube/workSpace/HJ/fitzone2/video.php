<?php
include 'api/dbconn.php';

$conn = new DBC();
$conn->DBI();
?>
<?include 'header.php';?>
<?include 'menu.php';?>

   <!-- breadcrumb start-->
   <!--<section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>운동 영상</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Blog Area =================-->
    <!--<section class="blog_area section_padding" style="padding: 50px 0px;">-->
		<section class="blog_area section_padding" style="min-height:1100px;padding: 100px 0px;">
        <div class="container">
				    <h2><b>운동 영상</b></h2>
            <div class="row">
                <div class="col-lg-12">

									<form action="<?echo $_SERVER['PHP_SELF'];?>" method="GET">
										<div class="input-group">
											<input type="text" class="form-control" name="search_text" placeholder="검색어를 입력하세요 . . ."
											value="<?if($_GET['search_text'] == null){}else{echo $_GET['search_text'];}?>">
											<span class="input-group-btn">
												<button type="submit" class="button alt small" type="button" id="searchButton">
													<span><i class="fa fa-search"></i></span>
												</button>
										 </span>
										</div>
									</form>

									<div class="inner">
										<div class="card mb-3">
											<div class="card-body">
												<div class="row">
													<div class="col-lg-12 mb-2">
														<strong>운동 부위</strong>
													</div>
													<div class="col-lg-3">
														<input type="checkbox" id="part-1" name="part">
														<label for="part-1">상체</label>
													</div>
													<div class="col-lg-3">
														<input type="checkbox" id="part-2" name="part">
														<label for="part-2">하체</label>
													</div>
													<div class="col-lg-3">
														<input type="checkbox" id="part-3" name="part">
														<label for="part-3">코어</label>
													</div>

													<div class="col-lg-12 mt-4 mb-2">
														<strong>운동 기구</strong>
													</div>
													<div class="col-lg-3">
														<input type="checkbox" id="equipment-1" name="equipment">
														<label for="equipment-1">장비 있음</label>
													</div>
													<div class="col-lg-3">
														<input type="checkbox" id="equipment-2" name="equipment">
														<label for="equipment-2">장비 없음</label>
													</div>
												</div>
												<!-- /row -->
											</div>
											<!-- /card-body -->
										</div>
										<!-- /card mb-3 -->
									</div>
									<!-- /inner mt-2 -->
                </div>

									<?
									$sql = "select * from Heal_video";
									$conn->DBQ($sql);
									$conn->DBE();
									while($row=$conn->DBF()){
									?>
									<div class="col-md-3 col-sm-6 mb-4">
										<div class="card">
											<a href="videoDetail.php?no=<?echo $row['idx'];?>">
												<img class="img-fluid" src="https://i.ytimg.com/vi/<?echo $row['video_id']; ?>/0.jpg">
												<p style="text-align:center;margin-top:10px;">
													<?php echo str_replace($row['title'],mb_substr($row['title'],0,16,"utf-8")."...",$row['title']); ?>
												</p>
											</a>
											<h5 style="font-weight:200;font-size:12px;text-align:center;">조회수: <?echo $row['view'];?> 게시일: <?echo $row['date'];?></h5>
										</div>
									</div>
									<?}?>

								</div>

						</div>
        </div>
    </section>
    <!--================Blog Area =================-->
<?include 'footer.php';?>
