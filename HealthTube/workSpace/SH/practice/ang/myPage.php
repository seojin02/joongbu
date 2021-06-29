
<?php
include 'api/dbconn.php';

$conn = new DBC();
$conn->DBI();
?>
<? include'toolbar.php';?>
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
                  <li><a href="login.php" class="nav-link">로그인을 하셔야 이용가능합니다.</a></li>
									<?}else{?>
									<ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
									<li><a href="index.php#home-section" class="nav-link">Home</a></li>
                  <li><a href="index.php#about-section" class="nav-link">소개</a></li>
									<li><a href="index.php#team-section" class="nav-link">스태프</a></li>
                  <li><a href="index.php#services-section" class="nav-link">버킷리스트</a></li>
                  <li><a href="index.php#why-us-section" class="nav-link">정보</a></li>
                  <li><a href="index.php#testimonials-section" class="nav-link">이 달의 우수글</a></li>
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
	<section class="blog_area section_padding" style="min-height:230px;padding: 30px 0px;">
		<div class="container">
			<h2><b>정보 관리</b></h2>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
							<div class="card-body">
									<nav>
											<div class="nav nav-tabs" id="nav-tab" role="tablist">
													<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">비밀번호 수정</a>
													<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">회원탈퇴</a>
											</div>
									</nav>
									<div class="tab-content mt-3" id="nav-tabContent">
											<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
													<? include 'member_modify.php' ?>
											</div>
											<div class="tab-pane fade show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
													<? include 'unRegister.php' ?>
											</div>
									</div>
							</div>
					</div>
				</div>
				<!-- /col-lg-12 -->
			</div>
			<!-- /row -->
		</div>
	</section>
	<!--================Content Area =================-->

<?include 'footer.php';?>
