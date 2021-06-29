<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
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
<?
session_start();
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="fonts/icomoon/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="css/style.css">
			<header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">
            <div class="site-logo">
              <a class="text-black"><span class="text-primary">Yang</a>
            </div>

            <div class="col-12" >
              <nav class="site-navigation text-right ml-auto " role="navigation">
                
									<?if(!isset($_SESSION['id'])){?>
									<ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="login.php" class="nav-link">로그인을 하셔야 이용가능합니다.</a></li>
									<?}else{?>
									<ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
									<li><a href="#home-section" class="nav-link">Home</a></li>
                  <li><a href="#about-section" class="nav-link">소개</a></li>
									<li><a href="#team-section" class="nav-link">스태프</a></li>
                  <li><a href="#services-section" class="nav-link">버킷리스트</a></li>
                  <li><a href="#why-us-section" class="nav-link">정보</a></li>
                  <li><a href="#testimonials-section" class="nav-link">이 달의 우수글</a></li>
									
		
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >오잉</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="calendar.php"\>유튜브 영상</a>
											<a class="dropdown-item" href="favorite.php">네이버</a>
											<a class="dropdown-item" href="myPage.php">구글 일정</a>
										</div>
									</li>
									<li><a href="myPage.php">마이페이지</a></li>
									<li class="nav-item">
										<a class="nav-link" href="api/logout.php">로그아웃</a>
									</li>
									<?}?>
                </ul>
              </nav>
            </div>

            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>
        </div>

      </header>

<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="fonts/icomoon/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery.fancybox.min.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
<link rel="stylesheet" href="css/aos.css">
<link rel="stylesheet" href="css/style.css">
<br><br><br><br><br><br><br>  
		<style>
			small { font-family: sans-serif; }
			.w { text-align: left; }
			.x { text-align: right; }
			.y { text-align: center; }
			.z { text-align: justify; }
		</style>
<div class="container">
    <div class="row">
	
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">YANG에 오신 것을 환영합니다.</h1><br>
            <div class="account-wall">
                <form class="form-signin" action="api/login_ok.php" method="post"><br>
								<!-- 아이디 -->
                <input type="text" name="user_id" id="id"class="form-control" placeholder="아이디" value=""><br>
								<!-- 비밀번호 -->
                <input type="password" name="user_pw" id="password" class="form-control" placeholder="비밀번호" value=""><br>
								<!-- 로그인 버튼 -->
                <button class="btn btn-lg btn-primary btn-block" type="submit">로그인</button><br>
								<!-- 아이디 저장 -->
								<div class="form-check">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing">아이디 저장</label>
								</div>
								
								<!-- 회원가입 -->
                <a href="privacy.php" class="pull-right need-help"><br>회원이 아니신가요? </a><span class="clearfix"></span>
                </form>
            </div>
							<!-- 아이디, 비밀번호 찾기 -->
							<div class="form-check">
								<label class="forlocation.hrem-check-label">
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<small class="w" onclick="location.href='login_find.php'">아이디 찾기 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</small>
									<small class="y" onclick="location.href='pass_find.php'">비밀번호 찾기 
								</label>
							</div>
        </div>
    </div>
</div>

 <script>

	$(document).ready(function(){

    // 저장된 쿠키값을 가져와서 ID 칸에 넣어준다. 없으면 공백으로 들어감.
    var key = getCookie("key");
    $("#id").val(key);

    if($("#id").val() != ""){ // 그 전에 ID를 저장해서 처음 페이지 로딩 시, 입력 칸에 저장된 ID가 표시된 상태라면,
        $("#customControlAutosizing").attr("checked", true); // ID 저장하기를 체크 상태로 두기.
    }

    $("#customControlAutosizing").change(function(){ // 체크박스에 변화가 있다면,
        if($("#customControlAutosizing").is(":checked")){ // ID 저장하기 체크했을 때,
            setCookie("key", $("#id").val(), 7); // 7일 동안 쿠키 보관
        }else{ // ID 저장하기 체크 해제 시,
            deleteCookie("key");
        }
    });

    // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
    $("#id").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
        if($("#customControlAutosizing").is(":checked")){ // ID 저장하기를 체크한 상태라면,
            setCookie("key", $("#id").val(), 7); // 7일 동안 쿠키 보관
        }
    });
});

function setCookie(cookieName, value, exdays){
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
    document.cookie = cookieName + "=" + cookieValue;
}

function deleteCookie(cookieName){
    var expireDate = new Date();
    expireDate.setDate(expireDate.getDate() - 1);
    document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
}

function getCookie(cookieName) {
    cookieName = cookieName + '=';
    var cookieData = document.cookie;
    var start = cookieData.indexOf(cookieName);
    var cookieValue = '';
    if(start != -1){
        start += cookieName.length;
        var end = cookieData.indexOf(';', start);
        if(end == -1)end = cookieData.length;
        cookieValue = cookieData.substring(start, end);
    }
    return unescape(cookieValue);
}
</script> -->