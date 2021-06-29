function roomDraw(data){
  // console.log(data);
  for(var i=0; i < data.result.length; i++){
    var tempArr = data.result[i].current_user_name.split('|');
    tempArr = $.grep(tempArr,function(n){ return n == " " || n; });

    if(tempArr[3] != null){ tempArr[3] = '<br>'+tempArr[3]; }
    if(tempArr[6] != null){ tempArr[6] = '<br>'+tempArr[6]; }

    var temp = tempArr+',';
    temp = temp.substr(0, temp.length -1);

    $("#" + data.result[i].settop_id).html(temp);

  }
}
