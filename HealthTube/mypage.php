<?php
include 'api/dbconn.php';

$conn = new DBC();
$conn->DBI();
?>
<?include 'header.php';?>
<div class="container" style="min-height:1100px;">
	<h3 class="my-4">제목 앙</h3>
	<div class="row">
    <div class="col-lg-6 card">
      <div clas="card-body">
        <div class="row mt-2">
					<div class="col-lg-7 text-left">
						<h5><?echo substr(date("m"),0,2)?>월 m주차</h5>
					</div>
					<div class="col-lg-5 text-right">
						<a href="">달력보기</a>
					</div>
        </div>
        <!-- /row mt-2 -->
      </div>
      <!-- /card-body -->
    </div>
    <!-- /col-lg-6 card -->

    <div class="col-lg-6 card">
      <div clas="card-body">
        <div class="row mt-2">

          <div class="col-lg-12">
            <div class="row">
							<div class="col-lg-7 text-left">
								<h5>즐겨찾기</h5>
							</div>
							<div class="col-lg-5 text-right">
								<a href="">달력보기</a>
							</div>

              <div class="col-lg-6">
                <!-- <iframe src=""> -->
              </div>

              <div class="col-lg-6">
                <!-- <iframe src=""> -->
              </div>
            </div>
						<!-- /row -->
          </div>
        </div>
        <!-- /row mt-2 -->
      </div>
      <!-- /card-body -->
    </div>
    <!-- /col-lg-6 card -->

    <div class="col-lg-6 card mt-5">
      <div clas="card-body">
        <div class="row mt-2">
          <div class="col-lg-12">
            <div class="row">
							<div class="col-lg-7 text-left">
								<h5><?echo date("Y-m-d");?> 일정</h5>
							</div>
							<div class="col-lg-5 text-right">
								<a href="planDetail.php">상세보기</a>
							</div>
              <?
              $sql = "
              SELECT a.idx, b.planner_idx, c.video_id, c.title, c.content, c.view, c.date, b.status
              FROM Heal_planner a LEFT JOIN Heal_planner_video b ON a.idx = b.planner_idx INNER JOIN Heal_video c ON b.video_idx = c.idx
              WHERE DATE(a.date) BETWEEN '2019-05-15' AND '2019-05-15' AND a.member_idx IN(SELECT idx FROM Heal_member WHERE id = '".$_SESSION['id']."')
              ";
              $conn->DBQ($sql);
              $conn->DBE();
              while($row=$conn->DBF()){
              ?>
                <div class="col-lg-5">
                  <iframe width="100%" height="90%" src="https://www.youtube.com/embed/<?echo $row['video_id'];?>"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                     allowfullscreen>
                   </iframe>
                </div>

                <div class="col-lg-7">
                  <?php echo $row['title']; ?>
									<div class="row">
										<div class="col-lg-12 text-right mt-5">
											<?if($row['status'] == '미완료'){?>
												<button type="button" class="button alt small">미완료</button>
											<?}else{?>
												<button type="button" class="button alt small">완료</button>
											<?}?>
										</div>
									</div>
                </div>

                <html><hr class="mt-3 mb-3" color="Gainsboro" width=100%></html>
              <?}?>
            </div>
						<!-- /row -->
          </div>
        </div>
        <!-- /row mt-2 -->
      </div>
      <!-- /card-body -->
    </div>
    <!-- /col-lg-6 card mt-5 -->

    <div class="col-lg-6 card mt-5">
      <div clas="card-body">
        <div class="row mt-2">
          <div class="col-lg-6 text-left">
            <h5>헬스튜브 프로필</h5>
          </div>

          <div class="col-lg-6 text-right">
						<button type="button" class="button alt small">수정</button>
          </div>

					<div class="col-lg-12">
					</div>
        </div>
        <!-- /row mt-2 -->
				<div class="row mt-4">
					<div class="col-lg-6 text-center">
						<button type="button" class="button alt small">비밀번호 변경</button>
					</div>

					<div class="col-lg-6 text-center">
						<button type="button" class="button alt small">회원탈퇴</button>
					</div>
				</div>
				<!-- /row mt-4 -->
      </div>
      <!-- /card-body -->
    </div>
    <!-- col-lg-6 card mt-5 -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->
<?php include 'footer.php';?>
