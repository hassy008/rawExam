<?php include 'inc/header.php'; ?>
<?php
	Session::checkLogin();
?> 
<!--Ajax code-->
<script>
  $(function(){
    $("#loginsubmit").click(function(){
      var email = $("#email").val();
      var password = $("#password").val();
      var dataString = 'email='+email+'&password='+password;
     
      $.ajax({
        type:"POST",
        url : "jsurl/getlogin.php",
        data: dataString,
        success:function(data){
          if ($.trim(data)=="empty") {
          	$(".empty").show();
            setTimeout(function(){
              $(".empty").fadeOut();
            },5000);
          }else if($.trim(data)=="disable"){
          	$(".disable").show();
          	//$(".empty").hide();
          	//$(".error").hide();
             setTimeout(function(){
              $(".disable").fadeOut();
            },5000);
          } else if($.trim(data)=="error"){
          	$(".error").show();
          	//$(".empty").hide();
          	//$(".disable").hide();
             setTimeout(function(){
              $(".error").fadeOut();
            },5000);
          }else{
          	window.location = "exam.php";
          }
        } 
      });
      return false;
    });
  });
</script>
<!--Ajax code Ending-->


<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Email</td>
   			   <td><input name="email" type="text" id="email" placeholder="Enter Your Email"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="password" type="password" id="password" placeholder="Enter Password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" id="loginsubmit" value="Login">
			   </td>
			 </tr>
       </table>
	   </form>
<span class="empty" style="display:none">Field Must Not Be Empty</span>
<span class="error" style="display:none">Email or Password Not Matched</span>
<span class="disable" style="display:none">Sorry your ID is Disable.Please Contact With Admin</span>

	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>