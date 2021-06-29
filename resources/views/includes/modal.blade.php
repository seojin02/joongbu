<div id="modify-class-popup" class="modal">
  <input type="hidden" id="modify_class_id" name="modify_class_id" value="">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
    <div class="modal-content tx-size-sm">
      <div class="modal-body pd-y-20 ">
        <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- <i
              class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"
            ></i> -->
        <div class="tx-center">
          <h4 class="mg-b-20">체험 변경</h4>
        </div>

        <!-- 체험명 -->
        <div class="">
          <div class="d-inline-block">
            <p>체험명 : </p>
          </div>
          <div class="d-inline-block">
            <!-- Simple Textfield -->
            <form action="#">
              <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="modi_title" name="modi_title">
              </div>
            </form>
          </div>
        </div>

        <!-- 날짜  -->
        <div class="">
          <div class="d-inline-block">
            <p>날짜 : </p>
          </div>
          <div class="d-inline-block">
            <!-- Simple Textfield -->
            <form action="#">
              <div id="classDateWrap" class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" readonly type="text" id="modi_ClassDate">
              </div>
            </form>
          </div>
        </div>

        <!-- 시간  -->
        <div class="">
          <div class="d-inline-block">
            <p>시간 : </p>
          </div>
          <div class="d-inline-block w-20 mr-5">
            <!-- Simple Textfield -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select class="mdl-textfield__input" id="modi_startTime" name="modi_startTime">
                  <option></option>
                  <option value="00">00:00</option>
                  <option value="01">01:00</option>
                  <option value="02">02:00</option>
                  <option value="03">03:00</option>
                  <option value="04">04:00</option>
                  <option value="05">05:00</option>
                  <option value="06">06:00</option>
                  <option value="07">07:00</option>
                  <option value="08">08:00</option>
                  <option value="09">09:00</option>
                  <option value="10">10:00</option>
                  <option value="11">11:00</option>
                  <option value="12">12:00</option>
                  <option value="13">13:00</option>
                  <option value="14">14:00</option>
                  <option value="15">15:00</option>
                  <option value="16">16:00</option>
                  <option value="17">17:00</option>
                  <option value="18">18:00</option>
                  <option value="19">19:00</option>
                  <option value="20">20:00</option>
                  <option value="21">21:00</option>
                  <option value="22">22:00</option>
                  <option value="23">23:00</option>
                </select>
            </div>
          </div>
          <p class="d-inline-block mr-5"> ~ </p>
          <div class="d-inline-block w-20 mr-5">
            <!-- Simple Textfield -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select class="mdl-textfield__input" id="modi_endTime" name="modi_endTime">
                  <option></option>
                  <option value="00">00:59</option>
                  <option value="01">01:59</option>
                  <option value="02">02:59</option>
                  <option value="03">03:59</option>
                  <option value="04">04:59</option>
                  <option value="05">05:59</option>
                  <option value="06">06:59</option>
                  <option value="07">07:59</option>
                  <option value="08">08:59</option>
                  <option value="09">09:59</option>
                  <option value="10">10:59</option>
                  <option value="11">11:59</option>
                  <option value="12">12:59</option>
                  <option value="13">13:59</option>
                  <option value="14">14:59</option>
                  <option value="15">15:59</option>
                  <option value="16">16:59</option>
                  <option value="17">17:59</option>
                  <option value="18">18:59</option>
                  <option value="19">19:59</option>
                  <option value="20">20:59</option>
                  <option value="21">21:59</option>
                  <option value="22">22:59</option>
                  <option value="23">23:59</option>
                </select>
            </div>
          </div>
        </div>

        <!-- 인원수  -->
        <div class="">
          <div class="d-inline-block">
            <p>인원 수 : </p>
          </div>
          <div class="d-inline-block w-20 mr-5">
            <!-- Simple Textfield -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select class="mdl-textfield__input" id="modi_minPerson" name="modi_minPerson">
                  <option></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                </select>
            </div>
          </div>
          <p class="d-inline-block mr-5"> ~ </p>
          <div class="d-inline-block w-20 mr-5">
            <!-- Simple Textfield -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select class="mdl-textfield__input" id="modi_maxPerson" name="modi_maxPerson">
                  <option></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                </select>
            </div>
          </div>
        </div>

        <!-- 취소, 저장, 삭제  -->
        <div class="col-12">
          <div class="row">
            <div class="col-8 text-left" style="margin-left: -16px;">
              <div class="d-inline-block">
                <button onclick="javascript:$('#modify-class-popup').modal('hide');" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                  취소
                </button>
              </div>


              <div class="d-inline-block">
                <button onclick="scheduleModify();" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--accent">
                  저장
                </button>
              </div>
            </div>

            <div class="col-4 text-right" style="margin-left: 16px;">
              <div class="d-inline-block">
                <button onclick="scheduleDelete();" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                  삭제
                </button>
              </div>
            </div>
          </div>
        </div>



      </div>
      <!-- modal-body -->
    </div>
    <!-- modal-content -->
  </div>
  <!-- modal-dialog -->
</div>


<!-- Modal -->
<div class="modal fade" id="ExpDetailPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ExpDetailLabel">체험 상세 결과</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- 기본 현황 -->
        <div class="">
          <p><strong>기본 현황</strong></p>
          <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp w-100" style="">
            <thead>
              <tr>
                <th>예약 번호</th>
                <th>예약 부서</th>
                <th>예약 담당자</th>
                <th>담당자 연락처</th>
                <th>예약 일시</th>
                <th>체험 일시</th>
              </tr>
            </thead>
            <tbody id="modal_expResultGrid">
            </tbody>
          </table>
        </div>

        <!-- 체험 명단 -->
        <div class="mt-5">
          <p><strong>체험 명단</strong></p>
          <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp w-100" style="overflow:scroll;display:list-item;">
            <thead>
              <tr>
                <th>번호</th>
                <th>체험자 명</th>
                <th>연락처</th>
                <th>RF 카드번호</th>
                <th>체험별 획득점수</th>
                <th>보충학습 여부</th>
                <th>보충학습 수행여부</th>
                <th>PASS 여부</th>
              </tr>
            </thead>
            <tbody id="modal_expResultUserGrid">
            </tbody>
          </table>
        </div>

        <button onclick="move('resultClass/user');" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mb-3 mt-5 float-right">
          체험관리 페이지로 이동
        </button>
      </div>
    </div>
  </div>
</div>
<!-- modal -->

<div class="modal fade" id="ExpAllSavePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ExpAllSaveLabel">일괄 개설</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- 체험명 -->
        <div class="">
          <div class="d-inline-block" style="width: 75px;">
            <p>체험명 : </p>
          </div>
          <div class="d-inline-block">
            <!-- Simple Textfield -->
            <form action="#">
              <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="AllSettingTitle" name="">
              </div>
            </form>
          </div>
        </div>

        <!-- 날짜  -->
        <div class="">
          <div class="d-inline-block" style="width: 75px;">
            <p>날짜 : </p>
          </div>
          <div class="d-inline-block">
            <!-- DatePicker -->
            <div class="tui-datepicker-input tui-datetime-input tui-has-focus">
                <input id="startpicker-input" type="text" aria-label="Date" autocomplete="off">
                <span class="tui-ico-date"></span>
                <div id="startpicker-container" style="margin-left: -1px;"></div>
            </div>
            <span>&nbsp;&nbsp;&nbsp;~&nbsp;&nbsp;&nbsp;</span>
            <div class="tui-datepicker-input tui-datetime-input tui-has-focus">
                <input id="endpicker-input" type="text" aria-label="Date" autocomplete="off" style="">
                <span class="tui-ico-date"></span>
                <div id="endpicker-container" style="margin-left: -1px;"></div>
            </div>
          </div>
          <div class="d-inline-block" style="width:100%;text-align:right;">
            <!-- DatePicker -->
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect set-all-btn" style="min-width:40px;margin:5px;" data-value="2">
              월
            </button>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect set-all-btn" style="min-width:40px;margin:5px;" data-value="3">
              화
            </button>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect set-all-btn" style="min-width:40px;margin:5px;" data-value="4">
              수
            </button>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect set-all-btn" style="min-width:40px;margin:5px;" data-value="5">
              목
            </button>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect set-all-btn" style="min-width:40px;margin:5px;" data-value="6">
              금
            </button>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect set-all-btn" style="min-width:40px;margin:5px;" data-value="7">
              토
            </button>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect set-all-btn" style="min-width:40px;margin:5px;" data-value="1">
              일
            </button>
          </div>
        </div>

        <!-- 시간  -->
        <div class="">
          <div class="d-inline-block" style="width: 75px;">
            <p>시간 : </p>
          </div>
          <div class="d-inline-block w-20 mr-5">
            <!-- Simple Textfield -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select class="mdl-textfield__input" id="AllSettingStartTime" name="AllSettingStartTime">
                  <option></option>
                  <option value="00">00:00</option>
                  <option value="01">01:00</option>
                  <option value="02">02:00</option>
                  <option value="03">03:00</option>
                  <option value="04">04:00</option>
                  <option value="05">05:00</option>
                  <option value="06">06:00</option>
                  <option value="07">07:00</option>
                  <option value="08">08:00</option>
                  <option value="09">09:00</option>
                  <option value="10">10:00</option>
                  <option value="11">11:00</option>
                  <option value="12">12:00</option>
                  <option value="13">13:00</option>
                  <option value="14">14:00</option>
                  <option value="15">15:00</option>
                  <option value="16">16:00</option>
                  <option value="17">17:00</option>
                  <option value="18">18:00</option>
                  <option value="19">19:00</option>
                  <option value="20">20:00</option>
                  <option value="21">21:00</option>
                  <option value="22">22:00</option>
                  <option value="23">23:00</option>
                </select>
            </div>
          </div>
          <p class="d-inline-block mr-5"> ~ </p>
          <div class="d-inline-block w-20 mr-5">
            <!-- Simple Textfield -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select class="mdl-textfield__input" id="AllSettingEndTime" name="AllSettingEndTime">
                  <option></option>
                  <option value="00">00:00</option>
                  <option value="01">01:00</option>
                  <option value="02">02:00</option>
                  <option value="03">03:00</option>
                  <option value="04">04:00</option>
                  <option value="05">05:00</option>
                  <option value="06">06:00</option>
                  <option value="07">07:00</option>
                  <option value="08">08:00</option>
                  <option value="09">09:00</option>
                  <option value="10">10:00</option>
                  <option value="11">11:00</option>
                  <option value="12">12:00</option>
                  <option value="13">13:00</option>
                  <option value="14">14:00</option>
                  <option value="15">15:00</option>
                  <option value="16">16:00</option>
                  <option value="17">17:00</option>
                  <option value="18">18:00</option>
                  <option value="19">19:00</option>
                  <option value="20">20:00</option>
                  <option value="21">21:00</option>
                  <option value="22">22:00</option>
                  <option value="23">23:00</option>
                </select>
            </div>
          </div>
        </div>

        <!-- 인원수  -->
        <div class="">
          <div class="d-inline-block" style="width: 75px;">
            <p>인원 수 : </p>
          </div>
          <div class="d-inline-block w-20 mr-5">
            <!-- Simple Textfield -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select class="mdl-textfield__input" id="AllSettingMinPerson" name="AllSettingMinPerson">
                  <option></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                </select>
            </div>
          </div>
          <p class="d-inline-block mr-5"> ~ </p>
          <div class="d-inline-block w-20 mr-5">
            <!-- Simple Textfield -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select class="mdl-textfield__input" id="AllSettingMaxPerson" name="AllSettingMaxPerson">
                  <option></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                </select>
            </div>
          </div>
        </div>


        <button onclick="scheduleAllSave();" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mb-3 mt-5 float-right">
          개설 하기
        </button>
      </div>
    </div>
  </div>
</div>

<!--ing-->
<div id="addLearnPopup" class="modal">
  <input type="hidden" id="modify_class_id" name="modify_class_id" value="">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
    <div class="modal-content tx-size-sm">
      <div class="modal-body pd-y-20 ">
        <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <div class="tx-center">
          <h4 class="mg-b-20">보충학습 URL 전송</h4>
          체험자 정보를 확인하신 후, <br/>전송버튼을 클릭하시면 보충학습 URL이 전송됩니다.
        </div>

        <div class="" style="margin-top: 10px">
          <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp w-100" style="">
            <tbody id="expPerson">
              <!-- <tr>
                <td>체험자명</td>
                <td>박길동</td>
              </tr>
              <tr>
                <td>보충학습 항목</td>
                <td>
                  소화기
                  <br/>
                  CPR
                </td>
              </tr>
              <tr>
                <td>연락처</td>
                <td>010-1245-1245</td>
              </tr>
              <tr>
                <td>URL</td>
                <td>www.fireextingusher.co.kr</td>
              </tr>
              <tr>
                <td>전송내역</td>
                <td>
                  2019.06.10 11:43
                  <br/>
                  2019.06.11 15:13
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>

        <!-- 취소, 저장  -->
        <div style="text-align: center;margin-top: 10px">
          <div class="">
            <div class="d-inline-block" style="margin-right: 10px">
              <button onclick="javascript:$('#addLearnPopup').modal('hide');" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                취소
              </button>
            </div>

            <div class="d-inline-block" id="mmsButton">
              <!-- <button onclick="addLearnMms();" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--accent">
                전송
              </button> -->
            </div>
          </div>
        </div>

      </div>
      <!-- modal-body -->
    </div>
    <!-- modal-content -->
  </div>
  <!-- modal-dialog -->
</div>
