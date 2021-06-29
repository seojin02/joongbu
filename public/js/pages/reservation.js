/**
  @Auth dykim
  @Date 19.07.12
  @Brief 체험 예약하기
*/

var Calendar = tui.Calendar;
var selectDate = "";
let month = new Date(new Date()).format("yyyy-MM");

var selectD;          // Ajax 전송 값 = 선택 Date
let flag;             // 예약 Form check Flag

$(function(){
    cal =  new Calendar('#calendar', {
                isReadOnly: 'true',
                defaultView: 'month',
                calendars: [],
                month: {
                    daynames : ['일요일','월요일','화요일','수요일','목요일','금요일','토요일']
                },
                disableDblClick : true
                ,
                theme : {
                    'common.creationGuide.border': '1px solid #e0005a'
                  , 'common.creationGuide.backgroundColor': 'rgba(180, 39, 39, 0.6)'
                  , 'common.creationGuide.color': '#fff'
                }
                ,
                template: {
                    milestone: function(model) {
                        return '<span class="calendar-font-icon ic-milestone-b"></span> <span style="background-color: ' + model.bgColor + '">' + model.title + '</span>';
                    },
                    allday: function(schedule) {
                        return getTimeTemplate(schedule, true);
                    },
                    time: function(schedule) {
                        return getTimeTemplate(schedule, false);
                    }
                }
            });

            // event handlers
       cal.on({
           'clickMore': function(e) {
               console.log('clickMore', e);
           },
           'clickSchedule': function(e) {
               console.log('clickSchedule', e);
               scheduleReservation(e);
           },
           'clickDayname': function(date) {
               console.log('clickDayname', date);
           },
           'beforeCreateSchedule': function(e) {
               console.log('beforeCreateSchedule', e);
               checkStartAndEndDate(e.end);
               if(e.start.getDate() != e.end.getDate())
                 refreshScheduleVisibility();
               $('.tui-full-calendar-weekday-schedule-title').on('mousedown',function(){
                 //return false;
               });

           },
           'beforeUpdateSchedule': function(e) {
               console.log('beforeUpdateSchedule', e);
               return false;//캘린더 드래그 이동 방지
               e.schedule.start = e.start;
               e.schedule.end = e.end;
               cal.updateSchedule(e.schedule.id, e.schedule.calendarId, e.schedule);
           },
           'beforeDeleteSchedule': function(e) {
               console.log('beforeDeleteSchedule', e);
               cal.deleteSchedule(e.schedule.id, e.schedule.calendarId);
           },
           'afterRenderSchedule': function(e) {
               var schedule = e.schedule;
               // var element = cal.getElement(schedule.id, schedule.calendarId);
               // console.log('afterRenderSchedule', element);
           },
           'clickTimezonesCollapseBtn': function(timezonesCollapsed) {
               console.log('timezonesCollapsed', timezonesCollapsed);
               if (timezonesCollapsed) {
                   cal.setTheme({
                       'week.daygridLeft.width': '77px',
                       'week.timegridLeft.width': '77px'
                   });
               } else {
                   cal.setTheme({
                       'week.daygridLeft.width': '60px',
                       'week.timegridLeft.width': '60px'
                   });
               }
               return true;
           }
     });

     $("#ClassDate").val(new Date().format("yyyy.MM.dd"));

     //예약 담당자 번호 숫자 외 입력 방지
     $('#managerPhone').on("change keyup", function() {
       $(this).val( $(this).val().replace( /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣|A-Z|a-z]|[~!@\#$%^&*\()\-=+_'\[\]/.,<>?`;:"{}\\\s]/g, '' ) );
     });

     //예약 담당자 번호 형식 체크 및 데이터 변환
     $("#managerPhone").blur(function(){
       var managerPhone = $(this).val();
       $("#phoneNoMsg").remove();

       if(!isMobile(managerPhone)){
         $("#managerPhoneForm").append('<span id="phoneNoMsg" style="display: block;color: red;" role="alert">형식에 맞지 않는 번호입니다.</span>');
       }
     });

     //예약 담당자 이메일 양식 체크
     $("#email").blur(function(){
       var email = $(this).val();
       $("#emailNoMsg").remove();

       if(!emailCheck(email)){
         $("#emailForm").append('<span id="emailNoMsg" style="display: block;color: red;" role="alert">이메일형식이 올바르지 않습니다.</span>');
       }
     });

     //
     setEventListener();

     // setDropdownCalendarType();
     setRenderRangeText();
     setSchedules(month);

     // 스케줄  드래그 방지
     setDefaultEvent();

     datePicker();

});

function getFormatDate(date){
  var year = date.getFullYear();
  var month = (1 + date.getMonth());
  month = month >= 10 ? month : '0' + month;
  return  year + '.' + month;
}

function onClickNavi(e) {
    var action = getDataAction(e.target);

    switch (action) {
        case 'move-prev':
            cal.prev();
            month = new Date( cal["_renderDate"]["_date"] ).format("yyyy-MM");
            datePicker();
            break;
        case 'move-next':
            cal.next();
            month = new Date( cal["_renderDate"]["_date"] ).format("yyyy-MM");
            datePicker();
            break;
        case 'move-today':
            cal.today();
            month = new Date( cal["_renderDate"]["_date"] ).format("yyyy-MM");
            datePicker();
            break;
        default:
            return;
    }

    setRenderRangeText();
    setSchedules(month);

    // 스케줄  드래그 방지
    setDefaultEvent();
}

function datePicker(){
    picker = new tui.DatePicker('#dateWrapper', {
         // date: new Date(),
         date: new Date(month),
         language: 'ko',
         type: 'month',
         input: {
             element: '#renderRange',
             format: 'yyyy-MM'
         }
     });

     picker.on('change', function(){
       var month_diff = picker.getDate();
       month = new Date(month_diff).format("yyyy-MM");

       cal.setDate(month_diff);
       setSchedules(month);
       $("#renderRange").html(getFormatDate(month_diff));

       // 스케줄  드래그 방지
       setDefaultEvent();
     });


     $("#renderRange").click(function(){
       $(".tui-datepicker").css('z-index','1001');
     });
}

function setEventListener() {
    $('#menu-navi').on('click', onClickNavi);
    $('#lnb-calendars').on('change', onChangeCalendars);

    $('#dropdownMenu-calendars-list').on('click', onChangeNewScheduleCalendar);

    $(document).on('click', '.tui-full-calendar-near-month-day', onClickMonthDate);

    window.addEventListener('resize', function(){
      cal.render();
    });
}


function setSchedules(month) {
    cal.clear();

    var schedules = [];
    $.ajax({
      type: "GET",
      url : "/api/experience",
      data : {
        'month' : month
      },
      dataType:"json",
      async : false,
      success : function(data, status, xhr) {
        console.log(data);
        var data = data.data;

        for(var i = 0; i < data.length; i++){
          var obj = {};

          obj.id = data[i].id;
          obj.title = "~ "+ data[i].end_time + ":59";
          obj.isAllDay = false;
          obj.start = new Date(data[i].start_date.replace(/\./gi,"-")).setHours(data[i].start_time);
          obj.end = new Date(data[i].end_date.replace(/\./gi,"-")).setHours(data[i].end_time);
          obj.goingDuration = 00;
          obj.comingDuration = 00;
          obj.color = '#ffffff';
          obj.isVisible = true;
          obj.bgColor = '#69BB2D';
          obj.dragBgColor = '#69BB2D';
          obj.borderColor = (data[i].status == 0) ? '#69BB2D' : (data[i].status == 1) ? "#ffed00" : "#ff000a";
          obj.calendarId = 'logged-workout';
          obj.customStyle = 'cursor: pointer;z-index:25;';
          obj.category = 'time';
          obj.dueDateClass = '';
          obj.isPending = false;
          obj.isFocused = false;
          obj.isReadOnly = false;
          obj.isPrivate = false;
          obj.location = '';
          obj.attendees = '';
          obj.recurrenceRule = '';
          obj.state = '';

          schedules.push(obj);
        }

      }
    });

    cal.createSchedules(schedules);
    refreshScheduleVisibility();
}


    function onChangeCalendars(e) {
      console.log(e);
        var calendarId = e.target.value;
        var checked = e.target.checked;
        var viewAll = document.querySelector('.lnb-calendars-item input');
        var calendarElements = Array.prototype.slice.call(document.querySelectorAll('#calendarList input'));
        var allCheckedCalendars = true;

        if (calendarId === 'all') {
            allCheckedCalendars = checked;

            calendarElements.forEach(function(input) {
                var span = input.parentNode;
                input.checked = checked;
                span.style.backgroundColor = checked ? span.style.borderColor : 'transparent';
            });

            CalendarList.forEach(function(calendar) {
                calendar.checked = checked;
            });
        } else {
            findCalendar(calendarId).checked = checked;

            allCheckedCalendars = calendarElements.every(function(input) {
                return input.checked;
            });

            if (allCheckedCalendars) {
                viewAll.checked = true;
            } else {
                viewAll.checked = false;
            }
        }

        refreshScheduleVisibility();
    }



    function createNewSchedule(event) {
        var start = event.start ? new Date(event.start.getTime()) : new Date();
        var end = event.end ? new Date(event.end.getTime()) : moment().add(1, 'hours').toDate();

        if (useCreationPopup) {
            cal.openCreationPopup({
                start: start,
                end: end
            });
        }
    }


    function onChangeNewScheduleCalendar(e) {
        var target = $(e.target).closest('a[role="menuitem"]')[0];
        var calendarId = getDataAction(target);
        changeNewScheduleCalendar(calendarId);
    }

    /**
     * Get time template for time and all-day
     * @param {Schedule} schedule - schedule
     * @param {boolean} isAllDay - isAllDay or hasMultiDates
     * @returns {string}
     */
    function getTimeTemplate(schedule, isAllDay) {
        var html = [];
        var start = moment(schedule.start.toUTCString());
        if (!isAllDay) {
            html.push('<strong>' + start.format('HH:mm') + '</strong> ');
        }
        if (schedule.isPrivate) {
            html.push('<span class="calendar-font-icon ic-lock-b"></span>');
            html.push(' Private');
        } else {
            if (schedule.isReadOnly) {
                html.push('<span class="calendar-font-icon ic-readonly-b"></span>');
            } else if (schedule.recurrenceRule) {
                html.push('<span class="calendar-font-icon ic-repeat-b"></span>');
            } else if (schedule.attendees.length) {
                html.push('<span class="calendar-font-icon ic-user-b"></span>');
            } else if (schedule.location) {
                html.push('<span class="calendar-font-icon ic-location-b"></span>');
            }
            html.push(' ' + schedule.title);
        }

        return html.join('');
    }

    function refreshScheduleVisibility() {
        var calendarElements = Array.prototype.slice.call(document.querySelectorAll('#calendarList input'));

        CalendarList.forEach(function(calendar) {
            cal.toggleSchedules(calendar.id, !calendar.checked, false);
        });

        cal.render(true);

        calendarElements.forEach(function(input) {
            var span = input.nextElementSibling;
            span.style.backgroundColor = input.checked ? span.style.borderColor : 'transparent';
        });
    }


function getDataAction(target) {
    return target.dataset ? target.dataset.action : target.getAttribute('data-action');
}

function setRenderRangeText() {
    var renderRange = document.getElementById('renderRange');
    var options = cal.getOptions();
    var viewName = cal.getViewName();
    var html = [];
    html.push(moment(cal.getDate().getTime()).format('YYYY.MM'));
    renderRange.innerHTML = html.join('');
}


/**
  @Auth dykim
  @Date 19.07.12
  @Brief Custom  Calendar
  @param  t = selectDate
*/
function onClickMonthDate(e){
  var getDate = e.target.innerText;
  if(getDate != selectDate){
    refreshScheduleVisibility();
  }
  selectDate = getDate;
}

function checkStartAndEndDate(e){
  var getDate = e;
  if(getDate.getDate() != selectDate){
    refreshScheduleVisibility();
  }

  selectD = getDate._date;
  $("#ClassDate").val(getDate._date.format("yyyy.MM.dd"));

  $("#classDateWrap").addClass("is-focused");

  setTimeout(function(){
    $("#classDateWrap").removeClass("is-focused");
  },600)
}

function scheduleReservation(e){
  $.ajax({
    type: "GET",
    url : "/api/class",
    data : {
          id : e.schedule.id
    },
    dataType:"json",
    async : false,
    success : function(data, status, xhr) {
        var result  = data.result;

        if(result == 'N'){
          alert(data.Msg);
        }else{
          var data = data.data;
          $("#classId").val(e.schedule.id);
          $("#reservationDate").html(data.start_date);
          $("#reservationTime").html(data.start_time + ":00 ~ " + data.end_time + ":00");

          var personOption = "<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'><select class='mdl-textfield__input' onchange='personInputChange(this.value);'  id='minPerson' name='minPerson'>";

          for(var i = data.min_person; i <= data.max_person; i++){
            if(i == 0)
              continue;
            personOption += "<option value ='"+i+"'>"+i+"인</option>";
          }
          personOption += "</select></div>";

          $("#reservationPerson").html(personOption);

          var temp = "";
          for(var i=0; i <data.min_person; i++){
            temp += "<div class='reservation-wrapper'><form action='#' class='float-left d-inline-block' style='width:115px;'><div><input type='text' class='mdl-textfield__input class_user' placeholder='이름'/><label class='mdl-textfield__label d-none' for='sample1'>이름</label></div></form>";
            temp += "<form action='#' class='float-left d-inline-block' style='padding-left:15px;display='inline-block''><div class='memberPhoneForm' onfocusout='memberPhoneReg(this)' onkeyup='memberPhoneKey(this)' onchange='memberPhoneKey(this)'><input type='text' class='mdl-textfield__input class_phone' placeholder='전화번호'/><label class='mdl-textfield__label d-none' for='sample1'>전화번호</label></div></form></div>";
          }
          temp += "";
          $("#reservationDetail").html(temp)

          $(".reservation-table").removeClass("d-none");
          $(".reservation-info-text").remove();
          $(".reservation-box-temp").removeClass("reservation-box-temp");

        }
    }
  });
}

function personInputChange(t){
    var temp = "";
    for(var i=0; i < t; i++){
      temp += "<div class='reservation-wrapper'><form action='#' class='float-left d-inline-block' style='width:115px;'><div><input type='text' class='mdl-textfield__input class_user' name='userName' placeholder='이름'/><label class='mdl-textfield__label d-none' for='sample1'>이름</label></div></form>";
      temp += "<form action='#' class='float-left d-inline-block' style='padding-left:15px;display='inline-block''><div class='memberPhoneForm' onfocusout='memberPhoneReg(this)' onkeyup='memberPhoneKey(this)' onchange='memberPhoneKey(this)'><input type='text' class='mdl-textfield__input class_phone' name='userPhone' placeholder='전화번호'/><label class='mdl-textfield__label d-none' for='sample1'>전화번호</label></div></form></div>";
    }
    temp += "";
    $("#reservationDetail").html(temp)
}

function reservation(t){
  $("#" + t + " input").each(function(index, item){
    if($(item).val() == "" && $(item).attr('id') != "memo"){
      $(item).focus();
      alert("빈 칸을 입력해주세요.");
      flag = 0;
      return false;
    }else{
      flag = 1;
    }
  });

  if(flag == 1){
    var userLen = $(".class_user").length;

    if(!isMobile($("#managerPhone").val())){
      flag = 0;
      $("#managerPhone").focus();
      return false;
    }

    if(!emailCheck($("#email").val())){
      flag = 0;
      $("#email").focus();
      return false;
    }

    for(var i=0; i<userLen; i++){
      if(!isMobile($(".class_phone")[i].value)){
        flag = 0;
        $(".class_phone")[i].focus();
        return false;
        break;
      }
    }

    var userName = new Array(userLen);
    var userPhone = new Array(userLen);

    for(var i=0; i<userLen; i++){
      userName[i] = $(".class_user")[i].value;
      userPhone[i] = formatMobile($(".class_phone")[i].value);
    }

    $.ajax({
      type: "POST",
      url : "/api/class",
      data : {
            'ClassId' : $("#classId").val()
          , 'Dept' : $("#reservationDept").val()
          , 'Manager' : $("#reservationManager").val()
          , 'ManagerPhone' : formatMobile($("#managerPhone").val())
          , 'Email' : $("#email").val()
          , 'UserName' : userName
          , 'UserPhone' : userPhone
          , 'Memo' : $("#memo").val()
      },
      dataType:"json",
      async : false,
      success : function(data, status, xhr) {
      if(data.result == 'N'){
        alert(data.Msg);
        return false;
      }else if(data.result == 'Y'){
        alert(data.Msg);
      }
      window.location.reload();
      }
    });
  }

}

//번호 형식 체크(정규식)
function isMobile(phoneNum){
  var regExp =/(01[016789])([1-9]{1}[0-9]{2,3})([0-9]{4})$/;
  if(regExp.test(phoneNum)){
    return true;
  }else{
    return false;
  }
}

//번호 하이픈 처리 ex)01022222222 -> 010-2222-2222
function formatMobile(phoneNum){
  var rtnNum;
  var myArray;
  var regExp =/(01[016789])([1-9]{1}[0-9]{2,3})([0-9]{4})$/;
  myArray = regExp.exec(phoneNum);
  rtnNum = myArray[1]+'-'+myArray[2]+'-'+myArray[3];
  return rtnNum;
}

//이메일 형식 체크 (알파벳+숫자@알파벳+숫자.알파벳+숫자 형식이 아닐경우)
function emailCheck(email){
  var exptext = /^[ㄱ-ㅎ가-힣A-Za-z0-9_\.\-]+@[ㄱ-ㅎ가-힣A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;
  if(exptext.test(email) == false){
    return false;
  }
  return true;
}

//참가자 번호 형식 체크 및 변환
function memberPhoneReg(obj){
  var memberPhone = $(obj).children(".class_phone").val();
  $(obj).children("#memberPhoneNoMsg").remove();
  // $(obj).children(" span").remove();

  if(isMobile(memberPhone)){
    var formatNumber = formatMobile(memberPhone);
    console.log(formatNumber);
  }else{
    $(obj).append('<span id="memberPhoneNoMsg" style="display: block;color: red;" role="alert">형식에 맞지 않는 번호입니다.</span>');
  }
}

//참가자 번호 숫자 외 입력 방지
function memberPhoneKey(obj){
  $(obj).children(".class_phone").val( $(obj).children(".class_phone").val().replace( /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣|A-Z|a-z]|[~!@\#$%^&*\()\-=+_'\[\]/.,<>?`;:"{}\\\s]/g, '' ) );
}
