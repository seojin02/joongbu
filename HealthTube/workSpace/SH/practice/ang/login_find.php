<?include 'toolbar.php';?>
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
              <a href="index.php" class="text-black"><span class="text-primary">Yang</a>
            </div>

            <div class="col-12" >
              <nav class="site-navigation text-right ml-auto " role="navigation">
                
									<?if(!isset($_SESSION['id'])){?>
									<ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="login.php" class="nav-link">로그인</a></li>
									<?}else{?>
									<ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
									<li><a href="#home-section" class="nav-link">Home</a></li>
                  <li><a href="#about-section" class="nav-link">소개</a></li>
									<li><a href="#team-section" class="nav-link">스태프</a></li>
                  <li><a href="#services-section" class="nav-link">버킷리스트</a></li>
                  <li><a href="#why-us-section" class="nav-link">정보</a></li>
                  <li><a href="#testimonials-section" class="nav-link">이 달의 우수글</a></li>
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
	<!--================Content Area =================-->
	<section class="blog_area section_padding" style="min-height:0px;padding: 100px 0px;">
		<div class="container">
			<h2><b>아이디 찾기</b></h2>
			<div class="row">
				<div class="col-lg-12">
					<form name = "frm1" action="api/member_find.php" method="post" enctype="multipart/form-data" role="form">
						<!-- Banner -->
						<div class="container">
							<div class="row main">
								<div class="panel-heading">
								</div>
							</div> 									
								<div class="main-login main-center">							
									<!-- email address -->
									<br><br>
									<div class="form-group">
										<label for="email" class="control-label " style="font-weight:bold;">이메일 주소</label><label style="opacity:0.5;"></label>
										<div class="input-group">
											<input class="form-control" type="text" placeholder="이메일을 입력해주세요." onchange="emailCheck()" id="email" name="email" title="영대소문자 또는 숫자만 입력할 수 있습니다" value=""/>
											<span class="input-group-addon">@</span>
											<select class="form-control" name="emadress">
												<option value="naver.com">naver.com</option>
												<option value="gmail.com">gmail.com</option>
												<option value="daum.net">daum.net</option>
											</select>
										</div>
									</div>
								</div>
									<!-- Register Button -->
									<div class="form-group">
									<input type="submit" class="btn_2" value="  찾기  " />
									</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!--================Content Area =================-->
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/register_ok.js"></script>
<?include 'footer.php';?>
