var user_id = getParameterByName("id");
var vrStr = fireStr = cprStr = vr = fire = cpr = id = button = '';

id = getParameterByName("id");
vr = getParameterByName("vr").split('|');
fire = getParameterByName("fire").split('|');
cpr = getParameterByName("cpr").split('|');

$(window).resize(function(){
  mainResize();
});

$(function(){
  mainResize();

  call_class();
});

function getParameterByName(name){
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function playVideo(lesson){
  //ajax로 비디오 경로를 받아옴 lesson = 아이템 이름

  var flag = Math.floor((Math.random() * 2) + 1);

  if(flag == 1){
    var videoSrc = "SampleVideo.mp4";
  }else{
    var videoSrc = "SampleVideo2.mp4";
  }

  $("#movie_src").attr("src", videoSrc);
  $("#addVideo").focus();
  $("#addVideo").trigger("load");
  $("#addVideo").trigger("play");


  // 모든 로직 처리후 아래의 함수를 실행
  db_insert(lesson);
}

// 메인 리사이즈 이벤트
function mainResize(){
  main_width = document.body.clientWidth;

  if(main_width < 890){
    var m = (860 - main_width) / 100;
    $(".upText").css({
        "font-size" : main_width / 25
    });

    $(".downText").css({
        "font-size" : main_width / 45,
        "margin-top" : "30px"
    });

    $("#addVideo").attr("height", "60%");

  }else{
    $(".upText").css({
        "font-size" : "30px"
    });

    $(".downText").css({
        "font-size" : "20px",
        "margin-top" : "80px"
    });

    $("#addVideo").attr("height", "850px");
  }

}

// $.ajax({
//   type: "GET",
//   url : "/api/score",
//   data : {
//         type : 'user'
//       , dept : $("#selectDept").val()
//       , startDate : getFormatDate(startDate)
//       , endDate : getFormatDate(endDate)
//       , searchText : $("#searchText").val()
//       , state : $("#state").val()
//       , page : _page
//   },
//   dataType:"json",
//   async : false,
//   success : function(data, status, xhr) {
//
//   }
// });

function db_insert(obj){
  $.ajax({
    type: 'GET',
    url: '/api/lesson',
    data: { user_id: id, item: obj, st: 'insert' },
    success:function(){
      call_class();
    }
  })
}

function call_class(){
  $.ajax({
    type: 'GET',
    url: '/api/lesson',
    data: { user_id: id, st: 'select' },
    dataType: 'JSON',
    success:function(d){

      vrStr = fireStr = cprStr = '';
      console.log(d.data);
      // console.log(d.data[2].item);

      if(vr != ''){
        vrStr +='<tr>'
              +'<td scope="col" rowspan="'+vr.length+'" style="background-color:#DBEEF4; vertical-align:middle;">VR</td>'
              +'<td style="vertical-align:middle;">'+vr[0]+'</td>';

        button = '<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="playVideo(\'' + vr[0] + '\')">학습 하기</button></td>'

        for(a=0; a<d.data.length; a++){
          if(vr[0] == d.data[a].item){
            button = '<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" disabled>학습 완료</button></td>';
            break;
          }
        }
        vrStr +=button
              +'</tr>';

        for(i=1; i<vr.length; i++){
          vrStr +='<tr>'
                +'<td style="vertical-align:middle;">'+vr[i]+'</td>';

          button = '<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="playVideo(\'' + vr[i] + '\')">학습 하기</button></td>';
          for(a=0; a<d.data.length; a++){
            if(vr[i] == d.data[a].item){
              button = '<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" disabled>학습 완료</button></td>';
              break;
            }
          }

          vrStr +=button
                +'</tr>';
        }
      }

      if(fire != ''){
        fireStr +='<tr>'
              +'<td scope="col" rowspan="'+fire.length+'" style="background-color:#DBEEF4; vertical-align:middle;">소화기/소화전</td>'
              +'<td style="vertical-align:middle;">'+fire[0]+'</td>';

        button = '<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="playVideo(\'' + fire[0] + '\')">학습 하기</button></td>'
        for(a=0; a<d.data.length; a++){
          if(fire[0] == d.data[a].item){
            button = '<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" disabled>학습 완료</button></td>';
            break;
          }
        }

        fireStr +=button
                +'</tr>';

        for(i=1; i<fire.length; i++){
          fireStr +='<tr>'
                  +'<td style="vertical-align:middle;">'+fire[i]+'</td>';

          button = '<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="playVideo(\'' + fire[i] + '\')">학습 하기</button></td>';

          for(a=0; a<d.data.length; a++){
            if(fire[i] == d.data[a].item){
              button = '<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" disabled>학습 완료</button></td>';
              break;
            }
          }

          fireStr +=button
                  +'</tr>';
        }
      }

      if(cpr != ''){
        cprStr +='<tr>'
              +'<td scope="col" rowspan="'+cpr.length+'" style="background-color:#DBEEF4; vertical-align:middle;">CPR</td>'
              +'<td style="vertical-align:middle;">'+cpr[0]+'</td>';

        button = '<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="playVideo(\'' + cpr[0] + '\')">학습 하기</button></td>'
        for(a=0; a<d.data.length; a++){
          if(cpr[0] == d.data[a].item){
            button = '<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" disabled>학습 완료</button></td>';
            break;
          }
        }
        cprStr +=button
                +'</tr>';

        for(i=1; i<cpr.length; i++){
          cprStr +='<tr>'
                  +'<td style="vertical-align:middle;">'+cpr[i]+'</td>';

          button = '<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="playVideo(\'' + cpr[i] + '\')">학습 하기</button></td>';
          for(a=0; a<d.data.length; a++){
            if(cpr[i] == d.data[a].item){
              button = '<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" disabled>학습 완료</button></td>';
              break;
            }
          }

          cprStr +=button
                  +'</tr>';
        }
      }

      $("#userAddList").html(vrStr + fireStr + cprStr);

    }
  });
}
