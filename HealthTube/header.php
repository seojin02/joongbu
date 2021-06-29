<?
  session_start();
	//header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML>
<!--
	Introspect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Health Tube</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--<link rel="stylesheet" href="http://ccit2.dothome.co.kr/HealthTube/assets/css/main.css" />-->
		<link rel="stylesheet" href="http://soohoon.co.kr/HealthTube/assets/css/main.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body>

		<!-- Header -->
		<header id="header">
			<div class="inner">
				<a href="./" class="logo">Health Tube</a>
				<nav id="nav">
					<a href="video.php">운동 동영상</a>
					<a href="listBoard.php">자유 게시판</a>
					<a href="galleryBoard.php">비포 & 애프터</a> <!-- <a href="elements.html">비포 & 애프터</a> -->
					<?php if($_SESSION == false) {?> <a href="workSpace/SH/login.php">로그인</a><?}
								else {?> <a href="./mypage.php">마이페이지</a> <a href="workSpace/SH/api/logout_ok.php">로그아웃</a> <?}
					?>
				</nav>
			</div>
		</header>
		<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
