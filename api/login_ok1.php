<meta charset="utf-8" />
<?php	
	include "dbconn.php";
	include "password.php";

	//POST로 받아온 아이다와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아갑니다.
	if($_POST["user_id"] == "" || $_POST["user_pw"] == ""){
		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
	}else{

	//password변수에 POST로 받아온 값을 저장하고 sql문으로 POST로 받아온 아이디값을 찾습니다.
	$password = $_POST['user_pw'];
	$sql = "select * from Heal_member where id='".$_POST['user_id']."'";
	$member = $sql->fetch_array();
	$hash_pw = $member['pass']; //$hash_pw에 POSt로 받아온 아이디열의 비밀번호를 저장합니다. 

	if(password_verify($password, $hash_pw)) //만약 password변수와 hash_pw변수가 같다면 세션값을 저장하고 알림창을 띄운후 main.php파일로 넘어갑니다.
	{
		$_SESSION['id'] = $row['id'];
				$_SESSION['idx'] = $row['idx'];
				?>
				<script type="text/javascript">
				window.location.href="../index.php"</script>
				<?
	}else{ // 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
				?>
				<script type="text/javascript">alert("비밀번호가 일치하지 않습니다!");
				window.location.href="../login.php"</script>
				<?
	}
}
?>