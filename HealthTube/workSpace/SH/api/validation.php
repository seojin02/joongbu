<!-- 비동기로 ..-->
<?php
  include 'dbconn.php';
  $conn = new DBC();
  $conn->DBI();
 ?>

<!-- id 중복 체크 -->
<?
		$sql = "select id from Heal_member";
		$conn->DBQ($sql);
		$conn->DBE();
		$cntPro_code = $conn->resultRow();
		for($i=0; $i<$cntPro_code; $i++) { $id[$i] = $conn->DBF(); }
		for($i=0; $i<$cntPro_code; $i++) { $id_arr[$i] = $id[$i]['id']; }
?>
<html>
<head>
</head>
<body>
<script type="text/javascript">




//비밀번호 일치 불일치
    $(function(){
        $("#alert_success").hide();
        $("#alert_danger").hide();
        $("input").keyup(function(){
            var pwd1=$("#password").val();
            var pwd2=$("#pass2").val();
            if(pwd1 != "" || pwd2 != ""){
                if(pwd1 == pwd2){
                    $("#alert_success").show();
                    $("#alert_danger").hide();
                    $("#submit").removeAttr("disabled");
                }else{
                    $("#alert_success").hide();
                    $("#alert_danger").show();
                    $("#submit").attr("disabled", "disabled");
                }
            }
        });
    });
</script>

<script>
  function zero_phone(obj)
  {
    var string = obj.value;
    var pattern = /[^0-9]/gi;
    if(pattern.test(string)){
      obj.value =  string.replace(pattern,"");
    }
  }

  function zero_name(obj)
  {
    var string = obj.value;
    var pattern = /[^ㄱ-힣a-z]/gi;
    if(pattern.test(string)){
      obj.value =  string.replace(pattern,"");
    }
	}


  function zero_address(obj)
  {
    var string = obj.value;
    var pattern = /[^ㄱ-힣0-9+\-.\s]/gi;
    if(pattern.test(string)){
      obj.value =  string.replace(pattern,"");
    }
  }

</script>
		<script language="javascript">

		function duplicationCheck()
		{
			var chkid = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
			if(chkid.test($("input[name=id]").val())) {
				document.getElementById("id").value = "";
			}
		}

		function email_check()
		{
			var pattern = /^[A-Za-z0-9+]*$/;
			if(!pattern.test(document.getElementById('email_ins').value))
			{
				alert("이메일은 영문자 및 숫자만 가능합니다.");
				document.getElementById('email_ins').value = "";
				document.getElementById('email_ins').foucs();
				return false;
			}
		}

		function idCheck()
		{
			var users = <?php echo json_encode($id_arr); ?>;
			var userId = document.getElementById("id").value;

			for(var i =0; i < users.length; i++)
			{
				if ( userId == users[i])
				{
					document.getElementById("id").focus();
					document.getElementById("id").value = "";
					return alert(userId + "는 존재하는 아이디 입니다.");
				}
			}

			var chkmachine = /^[A-za-z0-9]{5,15}$/g;

			if(!chkmachine.test($("input[name=id]").val()))
			{
				alert("아이디 형식에 맞지 않습니다.");
				document.getElementById("id").focus();
				document.getElementById("id").value = "";
				return false;
			}
			else
			{
				alert("'" + document.getElementById("id").value + "' 는 사용가능한 아이디 입니다");
				document.getElementById("password").focus();
				return true;
			}
		}

//---------비밀번호 정규식------------------//

   /* function fn_pw_check() {
        var pw = document.getElementById("password").value; //비밀번호
        var pw2 = document.getElementById("pass2").value; // 확인 비밀번호
				var pattern1 = /[0-9]/;
        var pattern2 = /[a-zA-Z]/;
        var pattern3 = /[~!@\#$%<>^&*]/;     // 원하는 특수문자 추가 제거
        var pw_msg = "";
		} */


    function passReguration()
    {
      var pw = $("#password").val();
      if(pw.length<8 || pw.length>16){
        alert("비밀번호는 8자이상 16자 이하로 설정해주세요");
        document.getElementById("password").value = "";
        document.getElementById("password").focus();
				document.getElementById("password").value = "";
        return false;
      }
      var pw_check = /^(?=.*[a-zA-Z])((?=.*\d)(?=.*[?*~!^-_)(@$%&#])).{8,16}$/;

      if(!pw_check.test(pw)){
        alert("영문, 숫자, 특수문자의 조합으로 입력해주세요.");
        document.getElementById("password").focus();
				document.getElementById("password").value = "";
        return false;
      }
    }

	</script>


</body>
</html>
