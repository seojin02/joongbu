var main_width = 0;
var header_height = 0;

var popup_timer = null;

var questionClear = false;

var qArr = [false,false,false];
var wrongTxt = ["<p>아쉽지만 정답이 아닙니다.</p><p>다시 선택해 주시겠어요?</p>"];

$(function(){
  headerResize();
  mainResize();
  $('img[usemap]').rwdImageMaps();

  eventLoad();
  fontResize();

});

$(window).resize(function(){
  headerResize();
  mainResize();

  fontResize();
});


function randomItem(a){
  return a[Math.floor(Math.random() * a.length)];
}

// 헤더 리사이즈
function headerResize(){
  header_height = $(".header").height();
  $(".contents_01").css("padding-top",header_height);
}


// 메인 리사이즈 이벤트
function mainResize(){
  main_width = document.body.clientWidth;

  if(main_width < 860){
    var m = (860 - main_width) / 100;
    $(".dday_count").css({
        "font-size" : main_width / 15
      , "margin-left" : -(main_width / 3)
      , "margin-top" : (main_width / 3.8)
    });

    // map 크기 조절
    $("#map").css({
            "width" : "calc(100% - 15%)"
          , "height" : "430px"
    });

    if(main_width < 450){
      // popup 창 사이즈 조절
      $(".popup_wrapper .p_contents").css({
            "width" : "calc(100% - 15%)"
          , "height" : "205px"
      });

      // popup 창 사이즈 조절
      $(".mdl-custom-popup").css({
            "width" : "calc(100% - 15%)"
      });
    }else{
      // popup 창 사이즈 조절
      $(".popup_wrapper .p_contents").css({
            "width" : "430px"
          , "height" : "250px"
      });

      // popup 창 사이즈 조절
      $(".mdl-custom-popup").css({
          "width" : "460px"
      });


    }

  }else{
    $(".dday_count").css({
        "font-size" : "60px"
      , "margin-left" : "-275px"
      , "margin-top" : "230px"
    });

    // popup 창 사이즈 조절
    $(".popup_wrapper .p_contents").css({
          "width" : "430px"
        , "height" : "250px"
    });

    // popup 창 사이즈 조절
    $(".mdl-custom-popup").css({
        "width" : "460px"
    });

    // map 크기 조절
    $("#map").css({
            "width" : "600px"
          , "height" : "470px"
    });
  }

}

function fontResize(){
  if(main_width < 860){
    $(".si_gu_dong_label").css({
          "font-size" : main_width / 30
    });

    $(".custom-select").css({
        "width" : main_width / 6
    });

    if(main_width < 500){
      $(".area_wrapper").addClass("w-100");
      $(".area_wrapper").addClass("margin");
      $(".custom-select").css({
          "width" : "135px"
      });

      // $(".contents_02 button").addClass("mobile");
    }else{
      $(".area_wrapper").removeClass("w-100");
      $(".area_wrapper").removeClass("margin");

      // $(".contents_02 button").removeClass("mobile");
    }
  }else{
    $(".si_gu_dong_label").css({
          "font-size" : "28px"
    });

    $(".custom-select").css({
        "width" : "200px"
    });
  }

}


/*
    @Author dykim
    @brief  n : 문제 번호
            t : 선택값
*/
function questionSelect(n, t){
  switch(n){
     case 1:
          $("#Question01 img").prop("src",$("#Question01 img").prop("src").replace(/01_([a-z]{7}|[0-9]{2})/i,"01_0"+t));
          if(t != 4){
            qArr[0] = false;
            popup(randomItem(wrongTxt));
          }else{
            qArr[0] = true;
            chkEnter();
          }
     break;
     case 2:
          $("#Question02 img").prop("src",$("#Question02 img").prop("src").replace(/02_([a-z]{7}|[0-9]{2})/i,"02_0"+t));
          if(t != 4){
            qArr[1] = false;
            popup(randomItem(wrongTxt));
          }else{
            qArr[1] = true;
            chkEnter();
          }
     break;
     case 3:
          $("#Question03 img").prop("src",$("#Question03 img").prop("src").replace(/03_([a-z]{7}|[0-9]{2})/i,"03_0"+t));
          if(t != 4){
            qArr[2] = false;
            popup(randomItem(wrongTxt));
          }else{
            qArr[2] = true;
            chkEnter();
          }
     break;
  }
}

function eventLoad(){
  $(".close").click(function(){
    $(this).parents(".popup").removeClass("d-table");
    $(this).parents(".popup2").removeClass("d-table");
  });

  $(".ok_btn.check").click(function(){
    $(this).parents(".popup").removeClass("d-table");
    $(this).parents(".popup2").removeClass("d-table");

    if(questionClear){
      qArr[0] = false;
      qArr[1] = false;
      qArr[2] = false;
      $("#Question01 img").prop("src",$("#Question01 img").prop("src").replace(/01_([a-z]{7}|[0-9]{2})/i,"01_default"));
      $("#Question02 img").prop("src",$("#Question02 img").prop("src").replace(/02_([a-z]{7}|[0-9]{2})/i,"02_default"));
      $("#Question03 img").prop("src",$("#Question03 img").prop("src").replace(/03_([a-z]{7}|[0-9]{2})/i,"03_default"));
    }

  });
}

/*
  @brief t : TEXT
*/
function popup(t){
  $(".popup").addClass("d-table");
  $(".popup .p_contents .text").html(t);
}

/*
  @brief
*/
function enterPopup(){
  $(".popup2").addClass("d-table");
}

function chkEnter(t){
  var flag = true;
  for(var i = 0; i < qArr.length; i++){
    if(qArr[i] == false){
      flag = false;
      break;
    }
    flag = qArr[i];
  }

  if(flag){
    enterPopup();
  }else{
    if(t)
      popup("<p></br></br>퀴즈의 정답을 모두 맞혀야 응모됩니다.</p>");          // 응모하기만 누를 경우 체크
  }
}


function move(t){
    return window.location.href = t;
}
