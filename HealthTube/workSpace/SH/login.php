<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"/>

<!------ Include the above in your HEAD tag ---------->
<?include '../../header.php';?><br>

<section class="login-block">
	<div class="container">
		<div class="row">
			<div class="col-md-4 login-sec">
					<h2 class="text-center">로그인</h2>
						<form class="login-form" action="./api/login_ok.php" method="post">
							
							<!-- Id -->
							<div class="form-group">
								<label for="exampleInputEmail1" class="text-uppercase">아이디</label>
								<input type="text" name="user_id" class="form-control" placeholder="" value="">
							</div>
			
							<!-- Password -->
							<div class="form-group">
								<label for="exampleInputPassword1" class="text-uppercase">비밀번호</label>
								<input type="password" name="user_pw" class="form-control" placeholder="" value="">
							</div>
						  
							<!-- Login Check -->
							<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								<small>로그인 상태 유지</small>
							</label>
							</div>

							<!-- Login Button -->
							<button type="text" >로그인</button><br>

							<!-- Id, Pw find or Register Button -->
							<div class="form-check">
								<label class="form-check-label" align="center">
									<big onclick="location.href='#'">아이디 찾기 |</big>
									<big onclick="location.href='#'">  비밀번호 찾기  |</big>
									<big onclick="location.href='register.php'">  회원가입  </big>
								</label>
							</div>

							<div class="form-group">
							 <a href = "https://kauth.kakao.com/oauth/authorize?client_id=3847753e211b724d097289d1bbb1c7bf&redirect_uri=http://soohoon.co.kr/HealthTube/workSpace/SH/api/kakao_login_callback.php&response_type=code">로그인</a>
							</div>
						</form>
					</div>
				<!-- banner -->
				<div class="col-md-8 banner-sec">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			      <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
							<div class="carousel-inner" role="listbox">
								<div class="carousel-item active">
									<img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
										<div class="carousel-caption d-none d-md-block">
											<div class="banner-text">
												<h1>HealthTube에 오신 것을 환영합니다.</h1>
												<p> 멘트
											</div>	
										</div>
								</div>
							<div class="carousel-item">
							  <img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="First slide">
									<div class="carousel-caption d-none d-md-block">
								   <div class="banner-text">
										<h1>기계학습으로 당신에게 맞는 운동을 추천해드립니다.</h1>
										<p> 멘트
								   </div>	
								  </div>
						   </div>
							 <div class="carousel-item">
							  <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
									<div class="carousel-caption d-none d-md-block">
								   <div class="banner-text">
										<h1>계획표를 받고 운동을 실천해보세요.</h1>
										<p> 멘트
								   </div>	
								  </div>
						   </div>
				  </div>
			</div>
	</div>
</section>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<br><?include '../../footer.php';?>