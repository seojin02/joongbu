/**
 * @date 2019.04.30
 * @Author dykim
 * @Description 공통 적용 JS
*/

/*
|  Window OnLoad Evnet..
*/
window.onload = function(){

  menuEvent();

  $("#openMenu").click(function(){
    $("#sidebar").toggleClass('open-sidebar');
    $(".container_box").toggleClass('padding-side');
    $(".az-header-left").toggleClass('az-header-not-focus');
  });

  // 새로고침
  $(".reload").click(function(){
    reload();
  })

  // 가로 800Px 이하 일 때 자동 숨김 처리
  $(window).resize(function(){
      menuEvent();
  });
}

/*
|  Window OnLoad Evnet..
*/



/**
  common btn...
*/
function reload(){
  window.location.reload();
}

/**
  menu redirect...
*/

function move(url){
  window.location.href = '/'+url;
}

/**
  menu header load...
*/
function menuEvent(){
  var _width = $(window).width();
  if( _width < 800 && $("#sidebar").hasClass('open-sidebar')){
    if($("#sidebar").hasClass('open-sidebar')){
      $("#sidebar").toggleClass('open-sidebar');
      $(".container_box").toggleClass('padding-side');
      $(".az-header-left").toggleClass('az-header-not-focus');
    }
  }else if( _width > 800 && $("#sidebar").hasClass('open-sidebar')){
    if(!$("#sidebar").hasClass('open-sidebar')){
      $("#sidebar").toggleClass('open-sidebar');
      $(".container_box").toggleClass('padding-side');
      $(".az-header-left").toggleClass('az-header-not-focus');
    }
  }
}


function dropdown(menu){
  $('.detail-menu').toggleClass('active');
  $('.menu-arrow-left').toggleClass('active');
}

/**
  Cookie...
*/
function setCookie(cookie_name, value, days) {
  var exdate = new Date();
  exdate.setDate(exdate.getDate() + days);
  // 설정 일수만큼 현재시간에 만료값으로 지정

  var cookie_value = escape(value) + ((days == null) ? '' : ';    expires=' + exdate.toUTCString());
  document.cookie = cookie_name + '=' + cookie_value+';path=/';
}

function getCookie(cookie_name) {
  var x, y;
  var val = document.cookie.split(';');

  for (var i = 0; i < val.length; i++) {
    x = val[i].substr(0, val[i].indexOf('='));
    y = val[i].substr(val[i].indexOf('=') + 1);
    x = x.replace(/^\s+|\s+$/g, ''); // 앞과 뒤의 공백 제거하기
    if (x == cookie_name) {
      return unescape(y); // unescape로 디코딩 후 값 리턴
    }
  }
}

function delCookie(name) {
   document.cookie = name + '=; Max-Age=0'
}

/**
   숫자 카운팅 효과
 */
function numberCounter(target_frame, target_number) {
     this.count = 0; this.diff = 0;
     this.target_count = parseInt(target_number);
     this.target_frame = document.getElementById(target_frame);
     this.timer = null;
     this.counter();
 };
 numberCounter.prototype.counter = function() {
     var self = this;
     this.diff = this.target_count - this.count;

     if(this.diff > 0) {
         self.count += Math.ceil(this.diff / 5);
     }

     this.target_frame.innerHTML = this.count.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');

     if(this.count < this.target_count) {
         this.timer = setTimeout(function() { self.counter(); }, 20);
     } else {
         clearTimeout(this.timer);
     }
};

// duration 변환 분.. 초
String.prototype.toHHMMSS = function () {
    var sec_num = parseInt(this, 10); // don't forget the second param
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return minutes+'분'+seconds+'초';
}

/**
  Popup function
*/

function popup(str){
   var snackbarContainer = document.querySelector('#popup-up-func');
   var data = {message: str};
   snackbarContainer.MaterialSnackbar.showSnackbar(data);
}


/**
    Custom HoldOn
*/

function cusHoldOn(target , flag){
  if(flag){
    $(target).append('<div id="holdon-overlay" style="">'
                    + '<div id="holdon-content-container">'
                    + '<div id="holdon-content"><div class="sk-rect"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div></div>'
                    + '<div id="holdon-message"></div></div></div>');
  }else{
    $(target).find('#holdon-overlay').remove();
  }
}


/**
    @Author dykim
    @Date 19.07.22
    @Param document
    @Description 해당 select 박스에 부서 입력
*/
function insertOptionDept(t){
  $.ajax({
    type: "GET",
    url : "/api/dept",
    data : {
    },
    dataType:"json",
    async : false,
    success : function(data, status, xhr) {
      var data = data.data;

      var str = "<option value=''>전체</option>";

      for(var i=0; i < data.length; i++){
        str += "<option value='"+data[i].dept+"'>"+data[i].dept+"</option>";
      }

      $('#'+ t).html(str);

    }
  });

}


/**
    @Author dykim
    @Date 19.05.30
    @param  d = Date;
    @Description js 날짜형식을 string type 으로 변환
*/
function getDateString(d){
  var year = new Date(d).getFullYear();
  var month = (parseInt(new Date(d).getMonth()) + 1).toString().length < 2 ?  "0" + (parseInt(new Date(d).getMonth()) + 1) : (parseInt(new Date(d).getMonth()) + 1);
  var day = new Date(d).getDate().toString().length < 2 ? "0" + new Date(d).getDate() : new Date(d).getDate();
  var hour = new Date(d).getHours().toString().length < 2 ? "0" + new Date(d).getHours() : new Date(d).getHours();
  var min = new Date(d).getMinutes().toString().length < 2 ? "0" + new Date(d).getMinutes() : new Date(d).getMinutes();
  var sec = new Date(d).getSeconds().toString().length < 2 ? "0" + new Date(d).getSeconds() : new Date(d).getSeconds();

  return  year + "-" + month + "-" + day + " " + hour + ":" + min + ":" + sec;
}


Date.prototype.format = function(f) {
    if (!this.valueOf()) return " ";

    var weekName = ["일요일", "월요일", "화요일", "수요일", "목요일", "금요일", "토요일"];
    var d = this;

    return f.replace(/(yyyy|yy|MM|dd|E|hh|mm|ss|a\/p)/gi, function($1) {
        switch ($1) {
            case "yyyy": return d.getFullYear();
            case "yy": return (d.getFullYear() % 1000).zf(2);
            case "MM": return (d.getMonth() + 1).zf(2);
            case "dd": return d.getDate().zf(2);
            case "E": return weekName[d.getDay()];
            case "HH": return d.getHours().zf(2);
            case "hh": return ((h = d.getHours() % 12) ? h : 12).zf(2);
            case "mm": return d.getMinutes().zf(2);
            case "ss": return d.getSeconds().zf(2);
            case "a/p": return d.getHours() < 12 ? "오전" : "오후";
            default: return $1;
        }
    });
};

String.prototype.string = function(len){var s = '', i = 0; while (i++ < len) { s += this; } return s;};
String.prototype.zf = function(len){return "0".string(len - this.length) + this;};
Number.prototype.zf = function(len){return this.toString().zf(len);};
