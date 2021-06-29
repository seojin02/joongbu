<?
include '../dbconn.php';

$conn = new DBC();
$conn->DBI();

if(isset($_POST['category_purpose'])){
  $category_purpose = $_POST['category_purpose'];
}
if(isset($_POST['category_body'])){
  $category_body = $_POST['category_body'];
}
if(isset($_POST['category_equipment'])){
  $category_equipment = $_POST['category_equipment'];
}
if(isset($_POST['title'])){
  $title = $_POST['title'];
}
if(isset($_POST['content'])){
  $content = $_POST['content'];
}

switch($_POST['category_purpose']) {
  case '바디빌딩':
  $p_id = 'p1';
  break;

  case '피트니스':
  $p_id = 'p2';
  break;

  case '다이어트':
  $p_id = 'p3';
  break;
}

switch($_POST['category_body']) {
  case '어깨':
  $b_id = 'u1';
  break;

  case '가슴':
  $b_id = 'u2';
  break;

  case '등':
  $b_id = 'u3';
  break;

  case '이두':
  $b_id = 'u4';
  break;

  case '삼두':
  $b_id = 'u5';
  break;

  case '엉덩이':
  $b_id = 'd1';
  break;

  case '허벅지':
  $b_id = 'd2';
  break;

  case '종아리':
  $b_id = 'd3';
  break;

  case '복근':
  $b_id = 'b1';
  break;

  case '허리':
  $b_id = 'b2';
  break;
}

switch($_POST['category_equipment']) {
  case '있음':
  $e_id = 'e1';
  break;

  case '없음':
  $e_id = 'e2';
  break;
}

$sql = "update Heal_video set category_body = '".$category_body."', category_purpose = '".$category_purpose."', category_equipment = '".$category_equipment."',
title = '".$title."', body_id = '".$b_id."', equipment_id = '".$e_id."', purpose_id = '".$p_id."', content = '".$content."' where idx = '".$_POST['no']."'";
$conn->DBQ($sql);
$conn->DBE();
?>
