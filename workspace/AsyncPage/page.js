/**
  @Auth hjShin
  @Date 19.08.10
  @Brief 비동기 페이징.
*/

var startDate = new Date(new Date().getFullYear(), new Date().getMonth(), 1, 00,00,00,00);
var endDate = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0,23,59,59);

let _page = 1;
let totalP = 0;

window.onload = function(){
  search();
}

$(document).ready(function() {
    // paging button (10 page button set)
    $(".prev-pagination").click(function(){
      var dump = _page;
      _page = (Math.floor(_page / 10 ) * 10) - 9;
 
	  if(_page <= 0){
        alert('첫번째 페이지 입니다.');
        _page = dump;
        return;
      }

	  console.log(_page);
      creatPageBtn();
      selectDataAll();
    });

    $(".next-pagination").click(function(){
      var dump = _page;
      _page = (Math.floor(_page / 10 ) * 10) + 11;

	  if(_page >= totalP){
        alert('마지막 페이지 입니다.');
        _page = dump;
        return;
      }
	  
      creatPageBtn();
      selectDataAll();
    });
});

function search(){
  searchCount();
  totalP = Math.ceil($("#reservationCnt").html() / 10);

  _page = 1;
  creatPageBtn();
  selectDataAll();
}

function searchCount(){

  $.ajax({
    type: "POST",
    url : "api.php",
    data : {
          type : 'count'
        , page : _page
    },
    dataType:"json",
    async : false,
    success : function(data, status, xhr) {
	  //console.log(data);
      $("#reservationCnt").html("0");
      $("#reservationCnt").html(data);
	}
  });

}

function selectDataAll(){

  $.ajax({
    type: "POST",
    url : "api.php",
    data : {
          type : 'class'
        , page : _page
    },
    dataType:"json",
    async : false,
    success : function(data, status, xhr) {
      
	  //console.log(data);
	  
	  var str = "";

      if($("#reservationCnt").text() == 0){
        $("#expResultGrid").empty();
        popup("체험 목록이 없습니다.");
      }else{
        for(var i=0; i < data.length; i++){

          str += "<tr>";
          str += "<td style='text-align:center'>"+ data[i].no +"</td>";
          str += "<td style='text-align:center'>"+ data[i].dept +"</td>";
          str += "<td style='text-align:center'>"+ data[i].manager +"</td>";
          str += "</tr>";
        }

        $("#expResultGrid").html(str);
		
      }
	  
    }
  });

}

function creatPageBtn(){
  var str = "";

  for(var i = _page, j = 0; j < 10 ; i++ , j++){
    if(i > totalP)
      break;
    if(i%10 == 1)
      str += "<li class=\"page-item page-num active\" onclick='pageMove("+Number(i)+",this)'><a class=\"page-link\" href=\"#\">"+i+"</a></li>";
    else
      str += "<li class=\"page-item page-num\" onclick='pageMove("+Number(i)+",this)' data-page='"+Number(i)+"'><a class='page-link' href='#'>"+Number(i)+"</a></li>";
  }

  $(".page-num").remove();

  $(".pagination li").eq(0).after(str);

}

function pageMove(i , t){
    $('.page-item').removeClass('active');
    $(t).addClass('active');
    _page = i;
    selectDataAll();
}

//날짜 형태에서 일까지만 출력
function getFormatDate(date){
  var year = date.getFullYear();//yyyy
  var month = (1 + date.getMonth());//M
  month = month >= 10 ? month : '0' + month;// month 두자리로 저장
  var day = date.getDate();//d
  day = day >= 10 ? day : '0' + day;//day 두자리로 저장
  return  year + '-' + month + '-' + day;
}