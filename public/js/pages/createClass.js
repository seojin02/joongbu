/**
  @Auth dykim
  @Date 19.07.12
  @Brief 체험 개설하기.
*/

var startDate = new Date(new Date().getFullYear(), new Date().getMonth(), 1, 00,00,00,00);
var endDate = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0,23,59,59);
let month = new Date(new Date()).format("yyyy-MM");

var Calendar = tui.Calendar;
var selectDate = "";

var selectD;          // Ajax 전송 값 = 선택 Date

$(function(){
  cal =  new Calendar('#calendar', {
              // isReadOnly: 'true',
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
         scheduleModifyPopup(e);
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

  //
  setEventListener();

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
        console.log(schedules);
      }
    });

    cal.createSchedules(schedules);
    refreshScheduleVisibility();
}

    function onChangeCalendars(e) {
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

//   스케줄 저장
function scheduleSave(){
  var startTime = $("#startTime").val();
  var endTime = $("#endTime").val();

  var minPerson = $("#minPerson").val();
  var maxPerson = $("#maxPerson").val();

  if($("#title").val().trim() == ""){
    popup("체험명을 입력해주세요.");
    $("#title").focus();
    return;
  }
  if($("#ClassDate").val() == ""){
    popup("날짜를 입력해주세요.");
    $("#ClassDate").focus();
    return;
  }

  if($("#startTime").val() == ""){
    popup("시작시간을 입력해주세요.");
    $("#startTime").focus();
    return;
  }

  if($("#endTime").val() == ""){
    popup("종료시간을 입력해주세요.");
    $("#endTime").focus();
    return;
  }

  if(startTime > endTime){
    popup("시작시간은 종료시간보다 클 수 없습니다.");
    $("#startTime").focus();
    return;
  }

  if($("#minPerson").val() == ""){
    popup("최소인원을 입력해주세요.");
    $("#minPerson").focus();
    return;
  }

  if($("#maxPerson").val() == ""){
    popup("최대인원을 입력해주세요.");
    $("#maxPerson").focus();
    return;
  }

  if(minPerson != "" && maxPerson != "" && minPerson > maxPerson){
    popup("최소인원이 최대인원보다 클 수 없습니다.");
    $("#minPerson").focus();
    return;
  }

  $.ajax({
    type: "POST",
    url : "/api/experience",
    data : {
          'title' : $("#title").val()
        , 'startDate' : $("#ClassDate").val()
        , 'endDate' : $("#ClassDate").val()
        , 'startTime' : $("#startTime").val()
        , 'endTime' : $("#endTime").val()
        , 'minPerson' : $("#minPerson").val()
        , 'maxPerson' : $("#maxPerson").val()
        , 'type' : 'one'
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


// 체험 수정
function scheduleModifyPopup(e){

  $("#modify_class_id").val(e.schedule.id);

  $.ajax({
      type : "GET"
    , url : "/api/class"
    , data : {
      id : e.schedule.id
    }
    , dataType:"json"
    , async : false
    , success : function(data, status, xhr) {
      console.log(data);
      if(data.result == "Y"){
        var data = data.data;
        $("#modi_title").val(data.title);
        $("#modi_ClassDate").val(data.start_date);
        $("#modi_startTime").val(data.start_time);
        $("#modi_endTime").val(data.end_time);
        $("#modi_minPerson").val(data.min_person);
        $("#modi_maxPerson").val(data.max_person);
        $("#modify-class-popup").modal("show");
        return false;
      }else{
        popup('해당건은 이미 예약이 완료되었습니다.');
        return false;
      }

    }
  });
}

// 체험 삭제
function scheduleDelete(){
  $.ajax({
    type: "GET",
    url: "/api/deleteClass",
    data: { id: $("#modify_class_id").val() },
    dataType: "JSON",
    success:function(d){
      switch (d.result) {
        case "N":
        popup('오류가 발생했습니다.');
        break;

        case "Y":
        popup('삭제가 완료 되었습니다.');
        $('#modify-class-popup').modal('hide');
        setSchedules(month);
        break;
      }
    }
  })
}

function scheduleModify(){
  var startTime = $("#modi_startTime").val();
  var endTime = $("#modi_endTime").val();

  var minPerson = $("#modi_minPerson").val();
  var maxPerson = $("#modi_maxPerson").val();

  if($("#modi_title").val().trim() == ""){
    alert("체험명을 입력해주세요.");
    $("#modi_title").focus();
    return;
  }

  if($("#modi_startTime").val() == ""){
    alert("시작시간을 입력해주세요.");
    $("#modi_startTime").focus();
    return;
  }

  if($("#modi_endTime").val() == ""){
    alert("종료시간을 입력해주세요.");
    $("#modi_endTime").focus();
    return;
  }

  if(startTime > endTime){
    alert("시작시간은 종료시간보다 클 수 없습니다.");
    $("#modi_startTime").focus();
    return;
  }

  if($("#modi_minPerson").val() == ""){
    alert("최소인원을 입력해주세요.");
    $("#modi_minPerson").focus();
    return;
  }

  if($("#modi_maxPerson").val() == ""){
    alert("최대인원을 입력해주세요.");
    $("#modi_maxPerson").focus();
    return;
  }

  if(minPerson != "" && maxPerson != "" && minPerson > maxPerson){
    alert("최소인원이 최대인원보다 클 수 없습니다.");
    $("#modi_minPerson").focus();
    return;
  }

  $.ajax({
      type : "GET"
    , url : "/api/class/" + $("#modify_class_id").val() + "/edit"
    , data : {
          title : $("#modi_title").val()
        , class_date : $("#modi_ClassDate").val()
        , start_time : $("#modi_startTime").val()
        , end_time : $("#modi_endTime").val()
        , min_person : $("#modi_minPerson").val()
        , max_person : $("#modi_maxPerson").val()
    }
    , dataType:"json"
    , async : false
    , success : function(data, status, xhr) {
      // console.log(data);
      popup(data.Msg);
      $('#modify-class-popup').modal('hide');
      setSchedules(month);
    }
  });
}

// 일괄 저장 팝업
function scheduleAllSettingPopup(){
  $("#ExpAllSavePopup").modal("show");
}

// 일괄 저장
function scheduleAllSave(){
  var title = $("#AllSettingTitle").val();
  var dayArr = [];
  $(".set-all-btn").each(function(){
    if($(this).hasClass("mdl-button--accent")){
      dayArr.push($(this).data("value"))
    }else{
      // dayArr.push(false)
    }
  });

  var startTime = $("#AllSettingStartTime").val();
  var endTime = $("#AllSettingEndTime").val();

  var minPerson = $("#AllSettingMinPerson").val();
  var maxPerson = $("#AllSettingMaxPerson").val();

  if(title == ""){
    alert("체험명을 입력해주세요.");
    $("#AllSettingTitle").focus();
    return;
  }

  if(startTime == ""){
    alert("시작시간을 입력해주세요.");
    $("#AllSettingStartTime").focus();
    return;
  }

  if(endTime == ""){
    alert("종료시간을 입력해주세요.");
    $("#AllSettingEndTime").focus();
    return;
  }

  if(startTime > endTime){
    alert("시작시간은 종료시간보다 클 수 없습니다.");
    $("#AllSettingStartTime").focus();
    return;
  }

  if(minPerson == ""){
    alert("최소인원을 입력해주세요.");
    $("#AllSettingMinPerson").focus();
    return;
  }

  if(maxPerson == ""){
    alert("최대인원을 입력해주세요.");
    $("#AllSettingMaxPerson").focus();
    return;
  }

  if(minPerson != "" && maxPerson != "" && minPerson > maxPerson){
    alert("최소인원이 최대인원보다 클 수 없습니다.");
    $("#AllSettingMinPerson").focus();
    return;
  }



  $.ajax({
    type: "POST",
    url : "/api/experience",
    data : {
          'title' : title
        , 'startDate' : new Date(startDate).format("yyyy-MM-dd")
        , 'endDate' : new Date(endDate).format("yyyy-MM-dd")
        , 'startTime' : startTime
        , 'endTime' : endTime
        , 'dayOfWeek' : dayArr.toString()
        , 'minPerson' : minPerson
        , 'maxPerson' : maxPerson
        , 'type' : 'all'
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

$(document).ready(function(){
  $(".set-all-btn").click(function(){
      $(this).toggleClass("mdl-button--accent")
  });

  var today = new Date();
  var picker = tui.DatePicker.createRangePicker({
      language: 'ko',
      startpicker: {
          date: new Date(startDate),
          input: '#startpicker-input',
          container: '#startpicker-container'
      },
      endpicker: {
          date: new Date(endDate),
          input: '#endpicker-input',
          container: '#endpicker-container'
      },
      format: 'yyyy-MM-dd',
      autoClose: true
  });

  picker.on('change:start', function() {
    try{
      startDate = new Date(picker.getStartDate().getFullYear(), picker.getStartDate().getMonth(),picker.getStartDate().getDate(),10,00,00);
    }catch(e){
    }
  });

  picker.on('change:end', function() {
    try{
      endDate = new Date(picker.getEndDate().getFullYear(), picker.getEndDate().getMonth(), picker.getEndDate().getDate(),20,00,00);
    }catch(e){
    }
  });

})
