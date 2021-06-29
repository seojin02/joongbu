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
              <a href="index.php" class="text-black"><span class="text-primary">안녕하세요 18학번 양하얀입니다.</a>
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