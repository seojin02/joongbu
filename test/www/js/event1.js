function insertUser(){
  var userName = $("#userName").val();
  var phone = $("#phoneNumber").val();

  $.ajax({
    type: "post",
    url : "/api/insert/",
    data : {
        'name' : userName
      , 'phone' : phone
      , 'private' : $("#private_chk").prop("checked")
    },
    dataType:"json",
    async : false,
    success : function(data, status, xhr) {
        if(data.type == "error"){
          popup(data.msg);
          return false;
        }else if(data.type == "success"){
          popup(data.msg);
          $(".popup2").removeClass("d-table");
          questionClear = true;
          return false;
        }
    }
  });

}
