<?php include 'api/validation.php';?>

<!DOCTYPE html>

<!-- 한글 -->
<meta charset="utf-8"> 

<html lang="en">
	<head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">

		<!-- Website Font style -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>회원가입</title>
	</head>
	<body>
	<!-- Header -->
		<?php include '../../header.php';?>
		
		<form action="./api/member_ok.php" method="post" ><br>

		<!-- Banner -->
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
				</div>
			</div> 									
				<h1 class="title" align="center">회원가입</h1>
				<p align="center"> HealthTube에 오신 것을 환영합니다. </p>
				<hr />
			
				<div class="main-login main-center">
			
						<!-- Id -->
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">아이디</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" required="required" class="form-control" name="id" id="id" value="" placeholder="아이디를 입력해주세요." onkeyup="duplicationCheck()" onchange="idCheck()"/>
								</div>
							</div>
						</div>
						
						<!-- Password -->
						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">비밀번호</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" required="required" class="form-control" name="pass" id="password" value="" placeholder="비밀번호를 입력해주세요." onkeyup="passReguration()" onchange="passReguration()"/>
								</div>
							</div>
						</div>
						
						<!-- Password Confirm -->
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">비밀번호 재확인</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" required="required" class="form-control" name="pass2" id="pass2" value="" placeholder="비밀번호를 확인해주세요."/>
								</div>

							</div>
						</div>
				
<label>비밀번호</label>
<input type="password" name="userPwd" id="pwd1" class="form-control" required />
<br>
 
<label>재확인</label>
<input type="password" name="reuserPwd" id="pwd2" class="form-control" required />
<br>
						  	<div class="alert alert-success" id="alert-success">비밀번호가 일치합니다.</div>
					    	<div class="alert alert-danger" id="alert-danger">비밀번호가 일치하지 않습니다.</div>


						<!-- Nickname -->
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">닉네임</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" maxlength="20" class="form-control" name="nickname" required="required" id="nickname" value="" placeholder="닉네임을 입력해주세요." onchange="zero_name(this);" onkeyup="zero_name(this);"/>
								</div>
							</div>
						</div>
				
						<!-- Phone Number -->
						<div class="form-group">
							<label for="phone" class="cols-sm-2 control-label">휴대폰 번호</label>
							<div class="cols-sm-3">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" maxlength="12" class="form-control" name="phone_num" id="phone_num" required="required" value="" placeholder="휴대폰 번호를 입력해주세요." onchange="zero_phone(this);" onkeyup="zero_phone(this);" />
								</div>
							</div>
						</div>					
						
						<!-- Email-->
						<table>
							<div class="form-group">
								<div class="cols-sm-6">
									<div class="input-group">
								<label for="email" class="cols-sm-1 control-label">이메일 주소</label>
									<tr>
										<td><input type="text" name="email" onchange="email_check()" id="email_ins" name="email_ins" required="required">@<select name="emadress" onchange="zero_address(this)" onkeyup="zero_address">
										<option value="naver.com">naver.com</option><option value="daum.net">daum.net</option>
										<option value="gmail.com">gmail.com</option></select></td>
									</tr>
									</div>
								</div>
							</div>
						</table>
					<div class="form-group">
					<input type="button" id="validateButton" name="validateButton" value="인증하기" href="api/email_check.php/>
					</div>

						<!-- Register Button -->
						<div class="form-group">
							<input type="submit" id="sub" name="sub" value="가입하기" />

					</div>
				</div>
			</div>
		</form>

		<!-- Footer -->
		<?php include '../../footer.php';?>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/register_ok.js"></script>

	</body>
</html>