/*
$(document).ready(function(){
  ///FOR USER REGISTRATION

  $("#regsubmit").click(function(){
  	var name     = $("#name").val();
  	var username = $("#username").val();
  	var password = $("#password").val();
  	var email    = $("#email").val();
  	
  	var dataString = 'name='+name+'&username='+username+'&password='+password+'&email='+email;

  	$.ajax({
  	  type   : "POST",
  	  url    : "getregister.php",
  	  data   : dataString, //var dataString=......
  	  success:function(data){
  	  	$("#state").html(data);
  	  }
  	});
  	return false;
  });	
});*/



/*
  $(function(){
    $("#regsubmit").click(function(){
      var name = $("#name").val();
      var username = $("#username").val();
      var password = $("#password").val();
      var email = $("#email").val();
      var dataString = 'name='+name+'&username='+username+'&password='+password+'&email='+email;
      $.ajax({
        type:"POST",
        url : "getregister.php",
        data: dataString,
        success:function(data){
          $("#resultmsg").html(data);
        }
      });
      return false;
    });
  });
*/




