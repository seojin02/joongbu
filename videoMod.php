<?php
include 'api/dbconn.php';

$conn = new DBC();
$conn->DBI();

if($_SESSION['idx'] == null){
	?>
	<script>
		alert('접근 권한이 없습니다');
		history.back(-1);
		// window.location.href="login.php";
	</script>
	<?
} else {

$sql = "select * from Heal_video where idx = '".$_GET['no']."'";
$conn->DBQ($sql);
$conn->DBE();
$row=$conn->DBF();
?>
<?include 'header.php';?>
<?include 'menu.php';?>

<!-- include summernote -->
<link rel="stylesheet" href="api/summernote2/summernote-bs4.css">
<script type="text/javascript" src="api/summernote2/summernote-bs4.js"></script>

<!-- 썸머노트 에디터 -->

<script language="javaScript">
  function check_onclick() {
    theForm=document.frm1;

    theForm.submit();
}
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.summernote').summernote({
      height: 400,
      tabsize: 2,
      codemirror: {
        mode: 'text/html',
        htmlMode: true,
        lineNumbers: true,
        theme: 'monokai'
      },
      callbacks: {
        onImageUpload : function(files, editor, welEditable) {
          console.log('image upload:', files);
          sendFile(files[0], editor, welEditable);
        },
      }
    });
    function sendFile(file,editor,welEditable) {
      data = new FormData();
      data.append("file", file);
      $.ajax({
        url: "api/boardSaveimg.php",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function(data){
          var image = $('<img>').attr('src', '' + data);
          $('.summernote').summernote("insertNode", image[0]);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus+" "+errorThrown);
        }
      });
    }
    $('form').on('submit', function (e) {
      e.preventDefault();
    });
  });
</script>
<!-- 썸머노트 에디터 -->

	<!--================Content Area =================-->
	<section class="blog_area section_padding" style="min-height:1100px;padding: 100px 0px;">
		<div class="container">
			<h2><b><?echo '"'.$row['title'].'"  수정';?></b></h2>
			<div class="row">
        <form action="api/videoReg/modify.php" method="post" name="frm1" enctype="multipart/form-data">
          <input type="hidden" name="no" value="<?php echo $row['idx']; ?>">
          <div class="col-lg-12 mt-5">
            <div class="row">
              <div class="col-lg-4">
                <select class="form-control" name="category_purpose">
                  <option value="바디빌딩" <?if($row['purpose_id'] == p1){echo 'selected';}?> >체형을 키움</option>
                  <option value="피트니스" <?if($row['purpose_id'] == p2){echo 'selected';}?>>탄력있는 몸매</option>
                  <option value="다이어트" <?if($row['purpose_id'] == p3){echo 'selected';}?>>체중 줄이기</option>
                </select>
              </div>
              <!-- /col-lg-4 -->

              <div class="col-lg-4">
                <select class="form-control" name="category_body">
                  <optgroup label="상체">
                    <option value="어깨" <?if($row['body_id'] == u1){echo 'selected';}?>>어깨</option>
                    <option value="가슴" <?if($row['body_id'] == u2){echo 'selected';}?>>가슴</option>
                    <option value="등" <?if($row['body_id'] == u3){echo 'selected';}?>>등</option>
                    <option value="이두" <?if($row['body_id'] == u4){echo 'selected';}?>>이두</option>
                    <option value="삼두" <?if($row['body_id'] == u5){echo 'selected';}?>>삼두</option>
                  </optgroup>

                  <optgroup label="하체">
                    <option value="엉덩이" <?if($row['body_id'] == d1){echo 'selected';}?>>엉덩이</option>
                    <option value="허벅지" <?if($row['body_id'] == d2){echo 'selected';}?>>허벅지</option>
                    <option value="종아리" <?if($row['body_id'] == d3){echo 'selected';}?>>종아리</option>
                  </optgroup>

                  <optgroup label="전신">
                    <option value="허리" <?if($row['body_id'] == b1){echo 'selected';}?>>허리</option>
                    <option value="복근" <?if($row['body_id'] == b2){echo 'selected';}?>>복근</option>
                  </optgroup>
                </select>
              </div>
              <!-- /col-lg-4 -->

              <div class="col-lg-4">
                <select class="form-control" name="category_equipment">
                  <option value="있음" <?if($row['equipment_id'] == e1){echo 'selected';}?>>장비 있음</option>
                  <option value="없음" <?if($row['equipment_id'] == e2){echo 'selected';}?>>장비 없음</option>
                </select>
              </div>
              <!-- /col-lg-4 -->

              <div class="col-lg-6 mt-5">
                <h5>제목</h5>
                <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control">
              </div>
              <!-- /col-lg-6 mt-5 -->

              <div class="col-lg-12 mt-4">
                <h5>내용</h5>
                <textarea class="summernote" id="summernote" name="content"><?php echo $row['content']; ?></textarea>
                <div class="text-right">
    							<input type="submit" class="button button-contactForm btn_2 mt-3" onclick="check_onclick();"></input>
    						</div>
              </div>
              <!-- /col-lg-12 mt-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 mt-5 -->
        </form>

			</div>
		</div>
	</section>
	<!--================Content Area =================-->

<?include 'footer.php'; }?>
