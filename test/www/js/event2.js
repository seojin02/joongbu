var map_data = [];


$(function(){
  selectOption();
});

function selectOption(){
    var x, i, j, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    for (i = 0; i < x.length; i++) {
      selElmnt = x[i].getElementsByTagName("select")[0];
      /*for each element, create a new DIV that will act as the selected item:*/
      a = document.createElement("DIV");
      a.setAttribute("class", "select-selected");
      a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
      x[i].appendChild(a);
      /*for each element, create a new DIV that will contain the option list:*/
      b = document.createElement("DIV");
      b.setAttribute("class", "select-items select-hide");
      for (j = 1; j < selElmnt.length; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
            /*when an item is clicked, update the original select box,
            and the selected item:*/
            var y, i, k, s, h;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            h = this.parentNode.previousSibling;
            for (i = 0; i < s.length; i++) {
              if (s.options[i].innerHTML == this.innerHTML) {
                s.selectedIndex = i;
                h.innerHTML = this.innerHTML;
                y = this.parentNode.getElementsByClassName("same-as-selected");
                for (k = 0; k < y.length; k++) {
                  y[k].removeAttribute("class");
                }
                this.setAttribute("class", "same-as-selected");
                if($(this).parents(".custom-select").find("#siDoSelect").length > 0){
                  callGusi();
                }else if($(this).parents(".custom-select").find("#guSiSelect").length > 0){
                  //callDong();
                }else if($(this).parents(".custom-select").find("#dongSelect").length > 0){

                }
                break;
              }
            }
            h.click();
        });
        b.appendChild(c);
      }
      x[i].appendChild(b);
      a.addEventListener("click", function(e) {
          /*when the select box is clicked, close any other select boxes,
          and open/close the current select box:*/
          e.stopPropagation();
          closeAllSelect(this);
          try{
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
          }catch(e){}
        });
    }
    function closeAllSelect(elmnt) {
      /*a function that will close all select boxes in the document,
      except the current select box:*/
      var x, y, i, arrNo = [];
      x = document.getElementsByClassName("select-items");
      y = document.getElementsByClassName("select-selected");
      for (i = 0; i < y.length; i++) {
        if (elmnt == y[i]) {
          arrNo.push(i)
        } else {
          y[i].classList.remove("select-arrow-active");
        }
      }
      for (i = 0; i < x.length; i++) {
        if (arrNo.indexOf(i)) {
          x[i].classList.add("select-hide");
        }
      }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
}


function callGusi(){
  $.ajax({
    type: "post",
    url : "/api/where/",
    data : {
        'type' : 'gusi'
      , 'sido' : $("#siDoSelect").val()
    },
    dataType:"json",
    async : false,
    success : function(data, status, xhr) {
        var str = "<option value=''>????????????</option>";
        for(var i = 0; i < data.length ; i++){
          str += "<option value='"+data[i].gu_si+"'>"+data[i].gu_si+"</option>";
        }

        $("#guSiSelect").html(str);

        $(".select-selected").remove();
        $(".select-items").remove();
        selectOption();
    }
  });
}


function callDong(){
  if($("#guSiSelect").val() == ""){
    popup("????????? ??????????????????");
    return false;
  }

  $.ajax({
    type: "post",
    url : "/api/where/",
    data : {
        'type' : 'dong'
      , 'sido' : $("#siDoSelect").val()
      , 'gusi' : $("#guSiSelect").val()
    },
    dataType:"json",
    async : false,
    success : function(data, status, xhr) {
        // ?????? ???..?????? ??? ??????
        // var str = "<option value=''>??? ??????</option>";
        // for(var i = 0; i < data.length ; i++){
        //   console.log(data[i].dong);
        //   str += "<option value='"+data[i].dong+"'>"+data[i].dong+"</option>";
        // }
        //
        // $("#dongSelect").html(str);
        //
        // $(".select-selected").remove();
        // $(".select-items").remove();
        // selectOption();

        map_data = [];

        var str = "";
        for(var i = 0; i < data.length ; i++){
          var obj = {"x" : data[i].lat , "y" : data[i].lon, "name" : data[i].posname, "adr" : data[i].address};
          map_data.push(obj);
          map(map_data,false);
          str += "<tr><td class='mdl-data-table__cell--non-numeric'>"+data[i].posname+"</td><td>"+data[i].address+"</td><td><button data-lat='"+data[i].lat+"'  data-lon='"+data[i].lon+"'  data-name='"+data[i].posname+"' data-adr='"+data[i].address+"'  onclick='map_detail(this);'";
          str += "class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent'>????????????</button></td></tr>";
        }

        $("#posGrid").addClass("d-table");
        $("#posdataGrid").html(str);
    }
  });
}

function map_detail(t){
  var obj = {
        "x" :$(t).data('lat')
      , "y" : $(t).data('lon')
      , "name" : $(t).data('name')
      , "adr" : $(t).data('adr')
  };

  var arr  = [obj];
  map(arr, true);
}


function getPosDong(){
  $.ajax({
    type: "post",
    url : "/api/where/",
    data : {
        'type' : 'poscode'
      , 'sido' : $("#siDoSelect").val()
      , 'gusi' : $("#guSiSelect").val()
      , 'dong' : $("#dongSelect").val()
    },
    dataType:"json",
    async : false,
    success : function(data, status, xhr) {
        map_data = [];
        for(var i = 0; i < data.length ; i++){
          var obj = {"x" : data[i].lat , "y" : data[i].lon, "name" : data[i].posname, "adr" : data[i].address};
          map_data.push(obj);
          map(map_data);
        }

    }
  });
}

//?????? ????????? ?????????.
var imageSrc = "/img/map_icon_uplus.png";
//???????????? ????????????
var overlay;

function map(data , detail){
  var container = document.getElementById('map'); //????????? ????????? div

  $(container).html("");

  var level = 7;

  if(detail)
    level = 2;

  var options = {
    center: new kakao.maps.LatLng(data[0]["x"], data[0]["y"]), //????????? ????????????
    level: level //?????? ??????
  };

  var map = new kakao.maps.Map(container, options); //?????? ??????

  data.forEach(function(d,i){
    // ?????? ???????????? ????????? ?????? ?????????
    var imageSize = new kakao.maps.Size(30, 30);

    // ?????? ???????????? ???????????????
    var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize);

    // ????????? ???????????????
    var marker = new kakao.maps.Marker({
        map: map, // ????????? ????????? ??????
        position: new kakao.maps.LatLng(d.x, d.y), // ????????? ??????
        image : markerImage // ?????? ?????????
    });

    var content = '<div class="wrap" onclick="closeOverlay()">' +
                '    <div class="info">' +
                '        <div class="title">' + d.name +
                '            <div class="close" onclick="closeOverlay()" title="??????"></div>' +
                '        </div>' +
                '        <div class="body">' + d.adr +
                '           </div>' +
                '        </div>' +
                '    </div>' +
                '</div>';

    //???????????? ??????
    overlay = new kakao.maps.CustomOverlay({
        content: content,
        //map: map,
        position: marker.getPosition()
    });

    // ????????? ???????????? ??? ????????? ??????????????? ???????????????
    kakao.maps.event.addListener(marker, 'click', function() {
      overlay.setMap(null);
      overlay = new kakao.maps.CustomOverlay({
          content: content,
          map: map,
          position: marker.getPosition()
      });
    });
  });
}
// ????????? ??????????????? ?????? ?????? ???????????? ???????????????
function closeOverlay() {
    overlay.setMap(null);
}
