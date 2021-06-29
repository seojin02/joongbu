<?php
include 'api/dbconn.php';

$conn = new DBC();
$conn->DBI();
if(isset($_GET['no'])) {
  $no = $_GET['no'];
}

$sql = "select * from Heal_video where idx = '".$no."'";
$conn->DBQ($sql);
$conn->DBE();
$row=$conn->DBF();

// select문
?>
<?php include 'header.php';?>
<link rel="stylesheet" type="text/css" href="api/videoReg/commentStyle.css">

<div class="container" style="min-height:1100px;">
	<h3 class="my-4">제목 앙</h3>
	<div class="row">
    <div class="col-lg-9">
      <!-- <div class="card-body"> -->
      <iframe width="100%" height="400px" src="https://www.youtube.com/embed/<?echo $row['video_id'];?>"
        frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
         allowfullscreen>
       </iframe>
      <!-- </div> -->
      <!-- card-body -->
    </div>
    <!-- /col-lg-9 card -->

    <div class="col-lg-3 card">
      <h5 class="mt-3" style="font-weight: 500;font-size:15px;">운동 강도: </h5><br>
      <h5 style="font-weight: 500;font-size:15px;">장비: </h5><br>
      <div class="row">
        <!-- heart -->
        <div class="col-lg-4">
          <button type="button" class="button alt small"><i class="fa fa-heart-o"></i></button>
        </div>

        <!-- calendar -->
        <div class="col-lg-4">
          <button type="button" class="button alt small"><i class="fa fa-calendar"></i></button>
        </div>

        <!-- kakao share -->
        <div class="col-lg-4">
          <button type="button" class="button alt small"><i class=""></i></button>
        </div>
      </div>
      <!-- /row -->
    </div>
    <!-- col-lg-3 -->


    <div class="col-lg-9 mt-3">
      <h5 style="font-weight:900;font-size:17px;"><?php echo $row['title']; ?></h5>
      <h5 style="font-weight:400;font-size:15px;">조회수 <?php echo $row['view']; ?></h5>
      <html><hr class="mt-3 mb-3" color="Gainsboro" width=100%></html>
      <div class="row">
        <div class="col-lg-1">
          <img src="images/kisspng-circle-logo.png" alt="HealthTube-logo" height="100%" width="100%">
        </div>

        <div class="col-lg-11">
          <h5 style="font-weight:500;font-size:15px;">Queen Official</h5>
          <h5 style="font-weight:200;font-size:12px;">게시일: <?php echo $row['date']; ?></h5>
        </div>

        <div class="col-lg-1 mt-4">
        </div>

        <div class="col-lg-11 mt-4">
          <h5 style="font-weight:300;font-size:13px;"><?php echo $row['content']; ?></h5>
        </div>
      </div>
    </div>
    <!-- col-lg-9 mt-3 card -->

    <!-- 유사 영상 리스트 -->
    <div class="col-lg-3 mt-3 card">
    </div>
    <!-- col-lg-3 mt-3 card -->

    <!-- 댓글 입력란 -->
    <div class="col-lg-9 mt-3">
      <div class="input-group">
        <input type="text" class="form-control" name="search_text" placeholder="" value="" autocomplete="off">
        <span class="input-group-btn">
          <button type="button" class="button alt" type="button" id="submitButton">
            <span>등록</span>
          </button>
       </span>
      </div>
      <!-- /input-group -->
    </div>
    <!-- /col-lg-9 mt-3 -->

    <div class="col-lg-9">
      <ul id="comments-list" class="comments-list">
      <?
      $idx = "";
      $sql = "
      SELECT a.idx AS '댓글인덱스', a.nickname AS '댓글닉네임', a.date AS '댓글게시일', a.hit AS '댓글추천수', a.content AS '댓글내용',
      b.idx AS '대댓글인덱스', b.review_idx AS '외래인덱스',b.nickname AS '대댓글닉네임', b.date AS '대댓글게시일', b.hit AS '대댓글추천수',
      b.content AS '대댓글내용'
      FROM Heal_video_review AS a
      LEFT JOIN Heal_video_re_review AS b on a.idx = b.review_idx";
      $conn->DBQ($sql);
      $conn->DBE();
      $cnt = $conn->resultRow();
      while($row=$conn->DBF()){
        if($row['댓글인덱스'] == $idx) { goto recomment; }?>
        <li>
          <div class="comment-main-level">
            <!-- Avatar -->
            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
            <!-- Contenedor del Comentario -->
            <div class="comment-box">
              <div class="comment-head">
                <h6 class="comment-name"><a href=""><?php echo $row['댓글닉네임']; ?></a></h6>
                <span>hace 20 minutos <!-- 시간이 들어갈 장소 --></span>
                <i class="fa fa-reply"></i>
                <i class="fa fa-heart" id="heart<?echo $row['댓글인덱스'];?>"></i>
              </div>
              <div class="comment-content">
                <?php echo $row['댓글내용']; ?>
              </div>
            </div>
          </div>
          <!-- /comment-main-level -->
          <div id="box<?echo $row['댓글인덱스'];?>"></div>

          <?recomment:
          if($row['댓글인덱스'] == $row['외래인덱스']){
            if($row['대댓글인덱스'] != null){?>
            <ul class="comments-list reply-list">
              <li>
                <!-- Avatar -->
                <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                <!-- Contenedor del Comentario -->
                <div class="comment-box">
                  <div class="comment-head">
                    <h6 class="comment-name"><a href=""><?php echo $row['대댓글닉네임']; ?></a></h6>
                    <span>hace 10 minutos <!-- 시간이 들어갈 장소 --></span>
                    <i class="fa fa-reply"></i>
                    <i class="fa fa-heart"></i>
                  </div>
                  <div class="comment-content">
                    <?php echo $row['대댓글내용']; ?>
                  </div>
                </div>
              </li>
            </ul>
            <!-- /1 re-comment -->
          <?}}?>
        </li>
        <!-- /1 comment -->
      <?$idx = $row['댓글인덱스']; } ?>
      </ul>
    </div>
    <!-- /col-lg-9 -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->

<?php include 'footer.php';?>
