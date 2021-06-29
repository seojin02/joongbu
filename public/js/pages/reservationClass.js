/**
  @Auth dykim
  @Date 19.07.12
  @Brief 체험 개설하기.
*/

var Calendar = tui.Calendar;
var selectDate = "";
let month = new Date(new Date()).format("yyyy-MM");

var selectD;          // Ajax 전송 값 = 선택 Date

$(document).ready(function(){
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
             schedulePopup(e);
         },
         'clickDayname': function(date) {
             console.log('clickDayname', date);
         },
         'beforeCreateSchedule': function(e) {
             console.log('beforeCreateSchedule', e);
             checkStartAndEndDate(e.end);
             if(e.start.getDate() != e.end.getDate())
               refreshScheduleVisibility();
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

   // setDropdownCalendarType();
   setRenderRangeText();
   setSchedules(month);

   datePicker(month);

   // 스케줄  드래그 방지
   setDefaultEvent();

})

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
            datePicker(month);
            break;
        case 'move-next':
            cal.next();
            month = new Date( cal["_renderDate"]["_date"] ).format("yyyy-MM");
            datePicker(month);
            break;
        case 'move-today':
            cal.today();
            month = new Date( cal["_renderDate"]["_date"] ).format("yyyy-MM");
            datePicker(month);
            break;
        default:
            return;
    }

    setRenderRangeText();
    setSchedules(month);

    // 스케줄  드래그 방지
    setDefaultEvent();
}

function datePicker(month){
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

    $('#btn-save-schedule').on('click', onNewSchedule);
    $('#btn-new-schedule').on('click', createNewSchedule);

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

    function onNewSchedule() {
        var title = $('#new-schedule-title').val();
        var location = $('#new-schedule-location').val();
        var isAllDay = document.getElementById('new-schedule-allday').checked;
        var start = datePicker.getStartDate();
        var end = datePicker.getEndDate();
        var calendar = selectedCalendar ? selectedCalendar : CalendarList[0];

        if (!title) {
            return;
        }

        cal.createSchedules([{
            id: String(chance.guid()),
            calendarId: calendar.id,
            title: title,
            isAllDay: isAllDay,
            start: start,
            end: end,
            category: isAllDay ? 'allday' : 'time',
            dueDateClass: '',
            color: calendar.color,
            bgColor: calendar.bgColor,
            dragBgColor: calendar.bgColor,
            borderColor: calendar.borderColor,
            raw: {
                location: location
            },
            state: 'Busy'
        }]);

        $('#modal-new-schedule').modal('hide');
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
    return;
  }

  selectD = getDate._date;
  $("#ClassDate").val(getDate._date.format("yyyy.MM.dd"));

  $("#classDateWrap").addClass("is-focused");

  setTimeout(function(){
    $("#classDateWrap").removeClass("is-focused");
  },600)
}

// 체험 수정
function schedulePopup(e){

  $.ajax({
    type: "GET",
    url : "/api/class",
    data : {
             id : e.schedule.id
          ,  selectFlag : 'Y'
    },
    dataType:"json",
    async : false,
    success : function(data, status, xhr) {
        var result  = data.result;
        var classData, detailData;

        if(result == 'N'){
          classData = data.class_data;
          detailData = data.data;

        }else if(result == 'Y'){
          classData = data.data;
          clearHTML();
          alert("예약된 체험이 없습니다.");
          return false;
        }

        clearHTML();

        $("#classId").val(classData.id);
        $("#reservationDate").html(classData.start_date);
        $("#reservationTime").html(classData.start_time + ":00 ~ " + classData.end_time + ":00");

        if(detailData){
          $("#reservationDept").html(detailData[0].dept);
          $("#reservationManager").html(detailData[0].manager);
          $("#managerPhone").html(detailData[0].manager_phone);

          $("#email").html(detailData[0].email);

          $("#reservationPerson").html(detailData.length + "인");

          var str = "";

          for(var i = 0; i < detailData.length; i++){
              str += "<div><span class='ml-5'>"+detailData[i].name+"</span><span class='ml-5'>"+detailData[i].phone+"</span></div>"
          }

          $("#reservationDetail").html(str);
        }

        $("#status").val(classData.status);

        $("#memo").html(classData.memo);

    }
  });
}

function clearHTML(){
  $("#classId").val("");
  $("#reservationDate").html("");
  $("#reservationTime").html("");

  $("#reservationDept").html("");
  $("#reservationManager").html("");
  $("#managerPhone").html("");
  $("#email").html("");
  $("#reservationPerson").html("");
  $("#reservationDetail").html("");

  $("#status").val("0");
  $("#memo").html("");
}

function expSave(){

  if($("#status").val() == "-1"){
    if(!confirm("해당 건에 대해 승인취소를 하시겠습니까? 승인취소건은 복구 되지 않습니다.")){
      return false;
    }
  }

  $.ajax({
    type: "DELETE",
    url : "/api/class/" + $("#classId").val(),
    data : {
          'status' : $("#status").val()
    },
    dataType:"json",
    async : false,
    success : function(data, status, xhr) {
      if(data.result == "Y"){
        alert(data.Msg);
        window.location.reload();
      }else{
        alert(data.Msg);
      }

    }
  });
}

function gotoUnsigned(){
  $.ajax({
    type: "GET",
    url: "/api/reservate",
    data: {},
    dataType: "JSON",
    success:function(d){
      try{
        switch (d.result) {
          case "Y":
          var unsignedDate = new Date(d.data[0].start_date);
          $("#renderRange").html(getFormatDate(unsignedDate));
          cal.setDate(unsignedDate);

          setSchedules(new Date(unsignedDate).format("yyyy-MM"));
          datePicker(new Date(unsignedDate).format("yyyy-MM"));

          var tempStr = '';

          for(i=0; i<d.student.length; i++){
            tempStr += d.student[i].name + " " + " " + " " + d.student[i].phone
                    +"<br>";
          }

          $("#reservationDetail").html(tempStr);


          if(d.data[0].memo == null){
            $("#memo").html('');
          }else{
            $("#memo").html(d.data[0].memo);
          }

          $("#reservationDate").html(d.data[0].start_date);
          $("#reservationTime").html(d.data[0].start_time +':00 ~ ' + d.data[0].end_time + ':00');
          $("#reservationDept").html(d.manager[0].dept);
          $("#reservationManager").html(d.manager[0].manager);
          $("#managerPhone").html(d.manager[0].phone);
          $("#email").html(d.manager[0].email);
          $("#status").val('1');
          $("#reservationPerson").html(d.student.length);


          break;

          case "N":
          popup("승인 대기 중인 예약이 없습니다.");
          break;
        }
      }catch(e){
        console.log(e);
      }
    }
  })
}
