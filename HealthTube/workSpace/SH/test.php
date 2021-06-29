<html>

<head>

<script type="text/javascript">



     var pw_passed = true;  // 추후 벨리데이션 처리시에 해당 인자값 확인을 위해



 



    function fn_pw_check() {

        var pw = document.getElementById("txtPassword1").value; //비밀번호

        var pw2 = document.getElementById("txtPassword2").value; // 확인 비밀번호

        var id = document.getElementById("txtId").value; // 아이디



 



        pw_passed = true;





        var pattern1 = /[0-9]/;

        var pattern2 = /[a-zA-Z]/;

        var pattern3 = /[~!@\#$%<>^&*]/;     // 원하는 특수문자 추가 제거

        var pw_msg = "";



 



        if(id.length == 0) {

               alert("아이디를 입력해주세요");

               return false;



              

         } else {

                //필요에따라 아이디 벨리데이션

         }



 



        if(pw.length == 0) {

               alert("비밀번호를 입력해주세요");

               return false;



              

         } else {

                if( pw  !=  pw2) {

                      alert("비밀번호가 일치하지 않습니다.");

                      return false;



                     

                 }

         }



 



       if(!pattern1.test(pw)||!pattern2.test(pw)||!pattern3.test(pw)||pw.length<8||pw.length>50){

            alert("영문+숫자+특수기호 8자리 이상으로 구성하여야 합니다.");

            return false;



           

        }          



        if(pw.indexOf(id) > -1) {

            alert("비밀번호는 ID를 포함할 수 없습니다.");

            return false;



           

        }



 



        var SamePass_0 = 0; //동일문자 카운트

        var SamePass_1 = 0; //연속성(+) 카운드

        var SamePass_2 = 0; //연속성(-) 카운드



 



        for(var i=0; i < pw.length; i++) {

             var chr_pass_0;

             var chr_pass_1;

             var chr_pass_2;

     

             if(i >= 2) {

                 chr_pass_0 = pw.charCodeAt(i-2);

                 chr_pass_1 = pw.charCodeAt(i-1);

                 chr_pass_2 = pw.charCodeAt(i);

                 

                  //동일문자 카운트

                 if((chr_pass_0 == chr_pass_1) && (chr_pass_1 == chr_pass_2)) {

                    SamePass_0++;

                  } 

                  else {

                   SamePass_0 = 0;

                   }



                  //연속성(+) 카운드

                 if(chr_pass_0 - chr_pass_1 == 1 && chr_pass_1 - chr_pass_2 == 1) {

                     SamePass_1++;

                  }

                  else {

                   SamePass_1 = 0;

                  }

          

                  //연속성(-) 카운드

                 if(chr_pass_0 - chr_pass_1 == -1 && chr_pass_1 - chr_pass_2 == -1) {

                     SamePass_2++;

                  } 

                  else {

                   SamePass_2 = 0;

                  }  

             }     

              

            if(SamePass_0 > 0) {

               alert("동일문자를 3자 이상 연속 입력할 수 없습니다.");

               pw_passed=false;



              

             }



 



            if(SamePass_1 > 0 || SamePass_2 > 0 ) {

               alert("영문, 숫자는 3자 이상 연속 입력할 수 없습니다.");

               pw_passed=false;



              

             } 

             

             if(!pw_passed) {             

                  return false;

                  break;

            }

        }

        return true;

    }

</script>

<meta charset="UTF-8">

</head>

<body>

   아이디 :  <input type="text" id="txtId" /><br/>

   비밀번호 : <input type="password" id="txtPassword1" /><br/>

   비밀번호확인 : <input type="password" id="txtPassword2" /><br/>

   <a href="#" onclick="fn_pw_check()">확인</a>

</body>

</html>