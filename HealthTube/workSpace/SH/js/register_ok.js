<script language="javascript">

// 아이디 정규형
function idReguration()
	{
		var checkId = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
		if(checkId.test($("input[name=id]").val())) {
			document.getElementById("id").value = "";
		}
	}

// 이메일 정규형
function emailReguration()
	{
		var pattern = /^[A-Za-z0-9+]*$/;
		if(!pattern.test(document.getElementById('email_ins').value))
		{
			alert("영대소문자 및 숫자만 가능합니다.");
			document.getElementById('email_ins').value = "";
			document.getElementById('email_ins').foucs();
			return false;		
    }
	}

// 비밀번호 정규형
function passReguration()()
  {
    var pw = $("#pass").val();
    if(pw.length<8|| pw.length>16){
      alert("암호를 8자이상 16자 이하로 설정해주세요");
      document.getElementById("pass").value = "";
      document.getElementById("pass").focus();
      return false;
  }
    var pw_check = /^(?=.*[a-zA-Z])((?=.*\d)(?=.*[?*~!^-_)(@$%&#])).{8,16}$/;

    if(!pw_check.test(pw)){
      alert("영문, 숫자, 특수문자의 조합으로 입력해주세요.");
      document.getElementById("pass").focus();
	   	document.getElementById("pass").value = "";
      return false;
    }
  }


// 아이디 중복 검사
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

		var checkRegular = /^[A-za-z0-9]{5,15}$/g;

		if(!checkRegular.test($("input[name=id]").val()))
		{
			alert("아이디 형식에 맞지 않습니다.");
			document.getElementById("id").focus();
			document.getElementById("id").value = "";
			return false;
		}
		else
		{
			alert("'" + document.getElementById("id").value + "' 는 사용가능한 아이디 입니다");
			document.getElementById("id").focus();
			return true;
		}
	}

  	$("#sub").click(function() {
		if(document.getElementById('id').value == 0)
		{
			return false;
			alert("아이디를 중복확인 해주세요!")
		}
		else if(document.getElementById('id').value == 1)
		{
			return true;
		}
	});
</script>