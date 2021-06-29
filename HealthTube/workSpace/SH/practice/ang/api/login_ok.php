<?php	
  include 'dbconn.php';

  $conn = new DBC();
  $conn->DBI();
	$sql = "select * from Heal_member where id='".$_POST['user_id']."'";
  $conn->DBQ($sql);
  $conn->DBE();
  $row = $conn->DBF();
  $rowcnt = $conn->resultRow();
	$password = $_POST['user_pw'];

  // 패스워드 암호화
	const PASSWORD_COST = ['cost'=>12]; // cost 의 기본 값은 10
	if($_POST['password']){ 
		$hash = password_hash($_POST['password'] , PASSWORD_DEFAULT, PASSWORD_COST);
	}

	//관리자
  if($row['id'] == 'admin')
  {
    $_SESSION['admin'] = $_POST['id'];
    ?>
    <script type="text/javascript">
    window.location.href="../login.php"</script>
    <?
  }


	if($rowcnt == 1)
	{
		if(!password_verify($password, $row['pass']))
			{
				$_SESSION['id'] = $row['id'];
				$_SESSION['idx'] = $row['idx'];
				?>
				<script type="text/javascript">
				window.location.href="../index.php"</script>
				
				<?
			}
			else
			{
				?>
				<script type="text/javascript">alert("비밀번호가 일치하지 않습니다!");
				window.location.href="../login.php"</script>
				<?
			}
	}
	else
	{
		?>
			<script type="text/javascript">alert("아이디와 비밀번호를 확인해주세요.");
			window.location.href="../login.php"</script>
			<?
		}
	
	$conn->DBO(); // db객체 해제 (종료)
?>