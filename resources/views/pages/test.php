<!doctype html>
<html class="no-js" lang="kr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>LG 화학 테스트</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="./lib/images/icon/favicon.ico">
  <link rel="stylesheet" href="./lib/css/bootstrap.min.css">
  <link rel="stylesheet" href="./lib/css/font-awesome.min.css">
  <link rel="stylesheet" href="./lib/css/themify-icons.css">
  <link rel="stylesheet" href="./lib/css/metisMenu.css">
  <link rel="stylesheet" href="./lib/css/owl.carousel.min.css">
  <link rel="stylesheet" href="./lib/css/slicknav.min.css">
  <!-- others css -->
  <link rel="stylesheet" href="./lib/css/typography.css">
  <link rel="stylesheet" href="./lib/css/default-css.css?ver=0.5">
  <link rel="stylesheet" href="./lib/css/styles.css?ver=1.92">
  <link rel="stylesheet" href="./lib/css/responsive.css">
  <link rel="stylesheet" href="./lib/lib/HoldOn/HoldOn.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link href="lib/css/table-responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!-- modernizr css -->
  <script src="./lib/js/vendor/modernizr-2.8.3.min.js"></script>

  <!-- jquery latest version -->
  <script src="./lib/js/vendor/jquery-2.2.4.min.js"></script>
</head>


<body class="body-bg">
  <!-- preloader area start -->
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <!-- preloader area end -->

  <!-- main wrapper start -->
  <div class="horizontal-main-wrapper">
      <!-- page title area end -->
    <div class="main-content-inner">
      <div class="container">
        <div class="col-lg-12 card mt-3">

          <!-- modal -->
          <div class="modal fade bd-example-modal-lg" id="ResultModal">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="col-lg-12 mt-4" id="show">
                    <div class="card">
                      <div class="card-body mt-3 mb-3">

                        <div class="row">
                          <!-- LG화학 로고 -->
                          <div class="col-lg-10 text-left">
                              <img style="cursor:pointer;" src="./lib/images/icon/LG_Chem_logo.svg" width="18%" height="100%">
                          </div>
                          <div class="col-lg-2 text-right">
                              <button type="button" id="suClose" class="close" data-dismiss="modal"><span>&times;</span></button>
                          </div>
                        </div>

                        <div class="col-lg-12 text-center">
                          <h6 id="userName"></h6>
                          <h6 class="mt-4">FAIL 항목을 확인해주세요. 보충학습을 수행하셔야 합니다.</h6><br>
                          <h3 id="total_score"></h3>
                        </div>

                        <!-- 체험 결과 -->
                        <div class="col-lg-12 mt-4 text-left">
                          <p>체혐 결과</p>
                          <div class="single-table">
                            <div class="table-responsive">
                              <table class="table table-bordered text-center">
                                <thead class="text-uppercase" style="background-color: #F1F1F1;" id="resultHead">
                                <tr>
                                  <th scope="col">구분</th>
                                  <th scope="col">상세항목</th>
                                  <th scope="col">획득점수</th>
                                  <th scope="col">환산점수</th>
                                  <th scope="col">결과</th>
                                </tr>
                                </thead>

                                <tbody id="resultBody">
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <!-- /single-table -->
                        </div>
                        <!-- /체험 결과 -->

                        <!-- 등급 및 점수 기준표 -->
                        <div class="col-lg-12 mt-4 text-left">
                          <p>* 등급 및 점수 기준표</p>
                          <div class="single-table">
                            <div class="table-responsive">
                              <table class="table table-bordered text-center">
                                <thead class="text-uppercase" style="background-color: #F1F1F1;">
                                <tr>
                                  <th scope="col" colspan="2" style="text-align:left;">PASS기준: 각 항목 75점 이상</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                  <th scope="col" style="background-color:#DBEEF4;">VR</th>
                                  <td> - 세부 항목 각각 통과 시 20점, 미통과시 0점</td>
                                </tr>

                                <tr>
                                  <th scope="col" style="background-color:#DBEEF4;">소화기/소화전</th>
                                  <td> - STAGE 실패할 때마다 점수 차감, 성공 시 100점 부여</td>
                                </tr>

                                <tr>
                                  <th scope="col" style="background-color:#DBEEF4;">CPR</th>
                                  <td> - 획득 점수 그대로 환산</td>
                                </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <!-- /single-table -->
                        </div>
                        <!-- /체험자 정보 -->

                      </div>
                      <!-- /card-body -->
                    </div>
                    <!-- /card -->
                  </div>
                  <!-- /col-lg-12 -->
                </div>
              </div>
            </div>
          </div>
          <!-- /modal-end -->

          <button type="button" data-toggle="modal" data-target="#ResultModal" data-backdrop="static" data-keyboard="false" style="display:none" id="modalBtn">버툰</button>

          <div id="accordion2" class="according accordion-s2">
            <div class="card-header">
              <a class="collapsed card-link" data-toggle="collapse" href="#accordion23"><h2>설명서</h2></a>
            </div>
            <div id="accordion23" class="collapse" data-parent="#accordion2">
              <div class="card-body">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-6">
                      <h5>ST1001 : 입구(체험시작)</h5><br>
                      <h5>ST2001 : VR 체험존 01</h5><br>
                      <h5>ST2002 : VR 체험존 02</h5><br>
                      <h5>ST2003 : VR 체험존 03</h5><br>
                      <h5>ST2004 : VR 체험존 04</h5><br>
                      <h5>ST3001 : 소화기 체험존 01</h5><br>
                    </div>

                    <div class="col-lg-6">
                      <h5>ST3002 : 소화기 체험존 02</h5><br>
                      <h5>ST4001 : CPR 체험존 01</h5><br>
                      <h5>ST4002 : CPR 체험존 02</h5><br>
                      <h5>ST4003 : CPR 체험존 03</h5><br>
                      <h5>ST4004 : CPR 체험존 04</h5><br>
                      <h5>ST5001 : 출구(체험종료)</h5><br>
                    </div>
                    <html><hr color="black" width=100%></html>

                    <div class="col-lg-12">
                      <h5>1. 체험자 출석 버튼을 클릭하세요.</h5><br>
                      <h5>2. 셋탑 ID를 ST2xxx, ST3xxx, ST4xxx 중에 한가지 입력하세요.</h5><br>
                      <h5>3. 체험장 등록 버튼을 클릭하세요.</h5><br>
                      <h5>4. VR, 소화기, CPR 세부항목들에 점수를 입력하세요.</h5><br>
                      <h5>5. 체험 시작 버튼을 클릭하세요.</h5><br>
                      <h5>6. 체험 종료 버튼을 클릭하세요.</h5><br>
                      <h5>7. 셋탑 ID를 ST2xxx 로 입력했다면 ST3xxx 또는 ST4xxx 를 입력하세요</h5><br>
                      <h5>8. 3~6번의 행동을 반복하세요.</h5><br>
                      <h5>9. 교육 종료 버튼을 클릭하세요.</h5><br>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <?
              for($i=0; $i<8; $i++){
                echo '
                <!-- 입력 폼 영역 -->
                <div class="col-lg-10" id="dis_area_1_'.$i.'" style="display:none">
                  <div class="row">
                    <div class="col-lg-3">
                      <h5><strong>이름</strong></h5>
                      <input type="text" class="form-control-sm" id="이름_'.$i.'" value="" readonly style="background-color: #e2e2e2;">
                    </div>

                    <div class="col-lg-3">
                      <h5><strong>RFID</strong></h5>
                      <input type="text" class="form-control-sm" id="카드_'.$i.'"  value="" style="background-color: #e2e2e2;">
                    </div>

                    <div class="col-lg-3">
                      <h5><strong>셋탑ID</strong></h5>
                      <input type="text" class="form-control-sm 셋탑" id="셋탑_'.$i.'" value="" maxlength="6">
                    </div>

                    <div class="col-lg-3">
                      <h5><strong>유저ID</strong></h5>
                      <input type="text" class="form-control-sm" id="유저_'.$i.'" value="" readonly style="background-color: #e2e2e2;">
                    </div>

                    <div class="col-lg-3 mt-5">
                      <h5>VR 1</h5>
                      <input type="text" class="form-control-sm" id="VR1_'.$i.'" value="">
                    </div>

                    <div class="col-lg-3 mt-5">
                      <h5>VR 2</h5>
                      <input type="text" class="form-control-sm" id="VR2_'.$i.'" value="">
                    </div>

                    <div class="col-lg-3 mt-5">
                      <h5>VR 3</h5>
                      <input type="text" class="form-control-sm" id="VR3_'.$i.'" value="">
                    </div>

                    <div class="col-lg-3 mt-5">
                      <h5>VR 4</h5>
                      <input type="text" class="form-control-sm" id="VR4_'.$i.'" value="">
                    </div>


                    <div class="col-lg-3 mt-5">
                      <h5>소화기 1</h5>
                      <input type="text" class="form-control-sm" id="소화기1_'.$i.'" value="">
                    </div>

                    <div class="col-lg-3 mt-5">
                      <h5>소화기 2</h5>
                      <input type="text" class="form-control-sm" id="소화기2_'.$i.'" value="">
                    </div>

                    <div class="col-lg-3 mt-5"></div>

                    <div class="col-lg-3 mt-5"></div>


                    <div class="col-lg-3 mt-5">
                      <h5>CPR 1</h5>
                      <input type="text" class="form-control-sm" id="CPR1_'.$i.'" value="">
                    </div>

                    <div class="col-lg-3 mt-5">
                      <h5>CPR 2</h5>
                      <input type="text" class="form-control-sm" id="CPR2_'.$i.'" value="">
                    </div>

                    <div class="col-lg-3 mt-5">
                      <h5>CPR 3</h5>
                      <input type="text" class="form-control-sm" id="CPR3_'.$i.'" value="">
                    </div>

                    <div class="col-lg-3 mt-5">
                      <h5>CPR 4</h5>
                      <input type="text" class="form-control-sm" id="CPR4_'.$i.'" value="">
                    </div>

                  </div>
                </div>

                <!-- 버튼 영역 -->
                <div class="col-lg-2" id="dis_area_2_'.$i.'" style="display:none">
                  <button type="button" class="btn btn-flat btn-primary mb-3 btn-lg" id="출석_'.$i.'">체험자 출석</button><br>
                  <button type="button" class="btn btn-flat btn-success mb-3 btn-lg" id="등록_'.$i.'">체험장 등록</button><br>
                  <button type="button" class="btn btn-flat btn-danger mb-3 btn-lg" id="시작_'.$i.'">체험 시작</button><br>
                  <button type="button" class="btn btn-flat btn-warning mb-3 btn-lg" id="종료_'.$i.'">체험 종료</button><br>
                  <button type="button" class="btn btn-flat btn-info mb-3 btn-lg" id="퇴근_'.$i.'">교육 종료</button><br>
                </div>



                <html><hr id="line_'.$i.'" style="display:none" color="black" width=100%></html>
                ';?>
                <script>
                // 체험자 출석
                $("#출석_<?echo $i;?>").click(function(){

                  $("#카드_<?echo $i;?>").val(RandormizeNumber());

                  $("#셋탑_<?echo $i;?>").val('ST1001');

                  // 타임스탬프 생성
                  var timestamp = new Date();
                  timestamp = getFormatDate(timestamp);

                  $.ajax({
                    type: 'GET',
                    url: 'http://127.0.0.1/api/attendance',
                    data: { status: 1, rf_id: $("#카드_<?echo $i;?>").val(), settop_id: $("#셋탑_<?echo $i;?>").val(), user_id: $("#유저_<?echo $i;?>").val(), timestamp: timestamp, user_name: $("#이름_<?echo $i;?>").val() },
                    dataType: 'JSON',
                    success:function(d){
                      console.log(d);
                    },error:function(d){
                      // alert('에러');
                      console.log(d);
                    }
                  });
                })

                // 체험장 등록
                $("#등록_<?echo $i;?>").click(function(){
                  if($("#셋탑_<?echo $i;?>").val() == 'ST1001' || $("#셋탑_<?echo $i;?>").val() == 'ST5001'){
                    alert('셋탑 ID가 잘못되었습니다');
                    return false;
                  }

                  // 타임스탬프 생성
                  var timestamp = new Date();
                  timestamp = getFormatDate(timestamp);

                  // alert($("#셋탑_<?//echo $i;?>").val());
                  $.ajax({
                    type: 'GET',
                    url: 'http://127.0.0.1/api/exp_ready',
                    data: { status: 1, rf_id: $("#카드_<?echo $i;?>").val(), settop_id: $("#셋탑_<?echo $i;?>").val(), timestamp: timestamp },
                    dataType: 'JSON',
                    success:function(d){
                      console.log(d);
                    },error:function(d){
                      console.log(d);
                    }
                  });
                })

                // 체험 시작
                $("#시작_<?echo $i;?>").click(function(){

                  if($("#셋탑_<?echo $i;?>").val() == 'ST1001' || $("#셋탑_<?echo $i;?>").val() == 'ST5001' || $("#셋탑_<?echo $i;?>").val() == 'ST4005'){
                    alert('셋탑 ID가 잘못되었습니다');
                    return false;
                  }

                  var card = $("#카드_<?echo $i;?>").val();

                  switch($("#셋탑_<?echo $i;?>").val()){
                    case "ST4001":
                    card = 1;
                    break;

                    case "ST4002":
                    card = 2;
                    break;

                    case "ST4003":
                    card = 3;
                    break;

                    case "ST4004":
                    card = 4;
                    break;
                  }

                  var settop = $("#셋탑_<?echo $i;?>").val();

                  if($("#셋탑_<?echo $i;?>").val() == 'ST4001' || $("#셋탑_<?echo $i;?>").val() == 'ST4002' || $("#셋탑_<?echo $i;?>").val() == 'ST4003'
                  || $("#셋탑_<?echo $i;?>").val() == 'ST4004'){
                    settop = 'ST4005';
                  }

                  var timestamp = new Date();
                  timestamp = getFormatDate(timestamp);

                  $.ajax({
                    type: 'GET',
                    url: 'http://127.0.0.1/api/exp_start',
                    data: { status: 1, rf_id: card, settop_id: settop, timestamp: timestamp },
                    dataType: 'JSON',
                    success:function(d){
                      console.log(d);
                    },error:function(d){
                      console.log(d);
                    }
                  })
                })

                // 체험 종료
                $("#종료_<?echo $i;?>").click(function(){

                  if($("#셋탑_<?echo $i;?>").val() == 'ST1001' || $("#셋탑_<?echo $i;?>").val() == 'ST5001'){
                    alert('셋탑 ID가 잘못되었습니다');
                    return false;
                  }

                  if($("#셋탑_<?echo $i;?>").val() == 'ST2001' || $("#셋탑_<?echo $i;?>").val() == 'ST2002' || $("#셋탑_<?echo $i;?>").val() == 'ST2003'
                  || $("#셋탑_<?echo $i;?>").val() == 'ST2004'){
                    var total_score = Number($("#VR1_<?echo $i;?>").val()) + Number($("#VR2_<?echo $i;?>").val()) + Number($("#VR3_<?echo $i;?>").val()) + Number($("#VR4_<?echo $i;?>").val());
                    var ItemArray = new Array("VR1","VR2","VR3","VR4");
                    var scoreArray = new Array(Number($("#VR1_<?echo $i;?>").val()), Number($("#VR2_<?echo $i;?>").val()), Number($("#VR3_<?echo $i;?>").val()), Number($("#VR4_<?echo $i;?>").val()))
                  }else if($("#셋탑_<?echo $i;?>").val() == 'ST3001' || $("#셋탑_<?echo $i;?>").val() == 'ST3002'){
                    var total_score = Number($("#소화기1_<?echo $i;?>").val()) + Number($("#소화기2_<?echo $i;?>").val());
                    var ItemArray = new Array("소화기1","소화기2");
                    var scoreArray = new Array(Number($("#소화기1_<?echo $i;?>").val()), Number($("#소화기2_<?echo $i;?>").val()));
                  }else if($("#셋탑_<?echo $i;?>").val() == 'ST4001' || $("#셋탑_<?echo $i;?>").val() == 'ST4002' || $("#셋탑_<?echo $i;?>").val() == 'ST4003'
                  || $("#셋탑_<?echo $i;?>").val() == 'ST4004'){
                    var total_score = Number($("#CPR1_<?echo $i;?>").val()) + Number($("#CPR2_<?echo $i;?>").val()) + Number($("#CPR3_<?echo $i;?>").val()) + Number($("#CPR4_<?echo $i;?>").val());
                    var ItemArray = new Array("CPR1","CPR2","CPR3","CPR4");
                    var scoreArray = new Array(Number($("#CPR1_<?echo $i;?>").val()), Number($("#CPR2_<?echo $i;?>").val()), Number($("#CPR3_<?echo $i;?>").val()), Number($("#CPR4_<?echo $i;?>").val()));
                  }

                  console.log(ItemArray);
                  console.log(scoreArray);

                  var card = $("#카드_<?echo $i;?>").val();

                  switch($("#셋탑_<?echo $i;?>").val()){
                    case "ST4001":
                    card = 1;
                    break;

                    case "ST4002":
                    card = 2;
                    break;

                    case "ST4003":
                    card = 3;
                    break;

                    case "ST4004":
                    card = 4;
                    break;
                  }

                  var settop = $("#셋탑_<?echo $i;?>").val();

                  if($("#셋탑_<?echo $i;?>").val() == 'ST4001' || $("#셋탑_<?echo $i;?>").val() == 'ST4002' || $("#셋탑_<?echo $i;?>").val() == 'ST4003' || $("#셋탑_<?echo $i;?>").val() == 'ST4004'){
                    settop = 'ST4005';
                  }

                  var timestamp = new Date();
                  timestamp = getFormatDate(timestamp);

                  $.ajax({
                    type: 'GET',
                    url: 'http://127.0.0.1/api/exp_end',
                    data: { rf_id: card, settop_id: settop, timestamp: timestamp, result: 'p', total_score: total_score,
                    item1: ItemArray[0], item2: ItemArray[1], item3: ItemArray[2], item4: ItemArray[3],
                    score1: scoreArray[0], score2: scoreArray[1], score3: scoreArray[2], score4: scoreArray[3]},
                    dataType: 'JSON',
                    success:function(d){
                      console.log(d);
                    },error:function(d){
                      console.log(d);
                    }
                  });
                })

                // 체험자 교육 종료
                $("#퇴근_<?echo $i;?>").click(function(){
                  $("#셋탑_<?echo $i;?>").val('ST5001');

                  var timestamp = new Date();
                  timestamp = getFormatDate(timestamp);

                  $.ajax({
                    type: 'GET',
                    url: 'http://127.0.0.1/api/exit',
                    data: { rf_id: $("#카드_<?echo $i;?>").val(), settop_id: $("#셋탑_<?echo $i;?>").val(), timestamp: timestamp },
                    dataType: 'JSON',
                    success:function(d){
                      console.log(d);

                      try{
                        var check_switch = 0;

                        $("#userName").html('<strong>'+d["dept"] + " " + d["name"]+'님!</strong>');
                        $("#total_score").html('<strong>총점: <font color="orange">'+d["result_score"]+'</font>/<font color="green">'+d["total_score"]+'</font>점</strong>');

                        itemLength = Object.keys(d).length-7;
                        var student_id = d.student_id;

                        for(i=0; i<Object.keys(d).length; i++){
                          keyString += Object.keys(d)[i]+'|';
                        }

                        keyString = keyString.replace("result_code|", "");
                        keyString = keyString.replace("total_score|", "");
                        keyString = keyString.replace("result_score|", "");
                        keyString = keyString.replace("dept|", "");
                        keyString = keyString.replace("name|", "");
                        keyString = keyString.replace("data|", "");
                        keyString = keyString.replace("student_id|", "");

                        Split = keyString.split('|');

                        for(i=0; i<itemLength; i++){
                          keyArray[i] = Split[i];
                        }

                        setTimeout(function(){
                          for(i=0; i<keyArray.length; i++){
                            if(d[keyArray[i]]["result"] == "pass"){
                              var resultBtn = '<button type="button" class="btn btn-rounded btn-success"><strong>PASS</strong></button>';
                              check_switch = 1;
                            }else{
                              var resultBtn = '<button type="button" class="btn btn-rounded btn-warning"><strong>Fail</strong></button>';
                            }

                            tbodyStr +='<tr>'
                                     +'<td scope="col" rowspan="'+d[keyArray[i]]["detail"].length+'" style="vertical-align: middle;">'+keyArray[i]+'</td>'
                                     +'<td style="vertical-align: middle;">'+d[keyArray[i]]["detail"][0]["title"]+'</td>'
                                     +'<td style="vertical-align: middle;">'+d[keyArray[i]]["detail"][0]["score"]+'</td>'
                                     +'<td scope="col" rowspan="'+d[keyArray[i]]["detail"].length+'" style="vertical-align: middle;">'+d[keyArray[i]]["exchange_score"]+'</td>'
                                     +'<td scope="col" rowspan="'+d[keyArray[i]]["detail"].length+'" style="vertical-align: middle;">'+resultBtn+'</td>'
                                     +'</tr>';

                            for(j=1; j<d[keyArray[i]]["detail"].length; j++){
                              tbodyStr +='<tr>'
                                       +'<td style="vertical-align: middle;">'+d[keyArray[i]]["detail"][j]["title"]+'</td>'
                                       +'<td style="vertical-align: middle;">'+d[keyArray[i]]["detail"][j]["score"]+'</td>'
                                       +'</tr>';
                            }
                          }
                          $("#resultBody").html(tbodyStr);

                          $("#modalBtn").trigger('click');
                          tbodyStr = '';
                        },300)

                        setTimeout(function(){
                          $("#suclose").trigger('click');
                          tbodyStr = '';

                          // if(check_switch == 1){
                          //   $.ajax({
                          //     type: 'GET',
                          //     url: ''+urlHead+'/api/send_msg',
                          //     data: { id: student_id },
                          //     success:function(){
                          //
                          //     }
                          //   });
                          // }
                        },10000)
                      }catch(e){
                        console.log(e);
                      }

                    },error:function(d){
                      console.log(d);
                    }
                  });
                })
                </script>
              <?}?>
            </div>
            <!-- /row -->
          </div>
          <!-- /card-body -->
        </div>
        <!-- /card -->
      </div>
      <!-- /container -->
    </div>
    <!-- main content area end -->

  </div>
  <!-- main wrapper end -->

  <!-- bootstrap 4 js -->
  <script src="./lib/js/popper.min.js"></script>
  <script src="./lib/js/bootstrap.min.js"></script>
  <script src="./lib/js/owl.carousel.min.js"></script>
  <script src="./lib/js/metisMenu.min.js"></script>
  <script src="./lib/js/jquery.slimscroll.min.js"></script>
  <script src="./lib/js/jquery.slicknav.min.js"></script>

  <!-- start chart js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

  <!-- others plugins -->
  <script src="./lib/js/plugins.js"></script>
  <script src="./lib/js/scripts.js"></script>

  <!-- HoldOn js -->
  <script src="./lib/lib/HoldOn/HoldOn.min.js"></script>

  <script src="//code.jquery.com/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


  <script>
  var keyArray = new Array();
  var tbodyStr = itemLength = keyString = Split = '';

  // var numArray = new Array("0","1","2","3","4","5","6","7");

  $(function(){
    var settop_id = [
      "ST1001","ST2001","ST2002","ST2003","ST2004","ST3001","ST3002","ST4001","ST4002","ST4003","ST4004","ST5001"
    ];

    $(".셋탑").autocomplete({
      source: settop_id
    });

    $.ajax({
      type: 'GET',
      url: 'http://lgchemedu.cafe24.com/api/attendanceList',
      data: {},
      dataType: 'JSON',
      success:function(d){
        for(i=0; i<d.data.length; i++){
          $("#이름_"+i+"").val(d.data[i].name);
          $("#유저_"+i+"").val(d.data[i].user_id);

          $("#dis_area_1_"+i+"").css('display','block');
          $("#dis_area_2_"+i+"").css('display','block');
          $("#line_"+i+"").css('display','block');
        }
      }
    })
  })

  function RandormizeNumber(){
    var number = "0123456789";
    var result = '';
    for(var i=0; i<8; i++){
      result += number.charAt(Math.floor(Math.random() *  number.length));
    }

    return result;
  }

  function getFormatDate(date){
    var year = date.getFullYear();
    var month = (1 + date.getMonth());
    month = month >= 10 ? month : '0' + month;
    var day = date.getDate();
    day = day >= 10 ? day : '0' + day;
    var hour = date.getHours();
    hour = hour >= 10 ? hour : '0' + hour;
    var minute = date.getMinutes();
    minute = minute >= 10 ? minute : '0' + minute;
    var second = date.getSeconds();
    second = second >= 10 ? second : '0' + second;
    return  year + month + day + hour + minute + second;
  }
  </script>

</body>
</html>
