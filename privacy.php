<?include 'api/privacy_Text.php';?>
<?include 'menu.php';?>
<?include 'header.php';?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="fonts/icomoon/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="css/style.css">

<meta charset="utf-8">
<section class="blog_area section_padding" style="min-height:250px;padding: 100px 0px;">
  <div class="container">
  	<h2>&nbsp&nbsp<b>약관 동의</b></h2><br>
  	<div class="row">
  		<div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12 text-center ml-2 mr-2">
            <textarea class="form-control" name="tos" rows=15 cols=135>
              <?php echo $text1; ?>
             </textarea>
             <div class="text-left">
               <input type="checkbox" value="yes" id="chk1">약관에 동의하시겠습니까?
             </div>
          </div>

          <div class="col-lg-12 text-center mt-5 ml-2 mr-2">
            <textarea class="form-control" name="tos" rows=15 cols=135>
              <?php echo $text2; ?>
            </textarea>
            <div class="text-left">
              <input type="checkbox" value="yes" id="chk2">약관에 동의하시겠습니까?
            </div>
          </div>

          <div class="col-lg-12 text-center mt-3">
            <button type="button" class="btn_2" id="subBtn">동의하기</button>
            <script>
              var a = b = 0;
              $("#subBtn").click(function(){
                if($("#chk1").prop("checked") == false){
                  alert("상단 약관에 동의해주세요!");
                  $("#chk1").focus();
                  a = 0;
                  return false;
                } else {
                  a = 1;
                }

                if($("#chk2").prop("checked") == false){
                  alert("하단 약관에 동의해주세요!");
                  $("#chk2").focus();
                  b = 0;
                  return false;
                } else {
                  b = 1;
                }

                if((a+b) == 2){
                  window.location.href="register.php";
                }
              });
            </script>
            <button type="button" class="btn_2" onclick="history.back(-1)">취소하기</button>
          </div>
        </div>
        <!-- /row -->

  	  </div>
      <!-- /col-lg-12 -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</section>
<?include 'footer.php';?>
