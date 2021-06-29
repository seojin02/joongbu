<?php
include_once('./mailer.lib.php');
 
// mailer("보내는 사람 이름", "보내는 사람 메일주소", "받는 사람 메일주소", "제목", "내용", "1");
mailer("test", "test@naver.com", "test@naver.com", "제목", "내용", 1);
?>