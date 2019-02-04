<?php include 'inc/header.php'; ?>

<script>
  $(function(){
    $("#regsubmit").click(function(){
      var name = $("#name").val();
      var username = $("#username").val();
      var password = $("#password").val();
      var email = $("#email").val();
      var dataString = 'name='+name+'&username='+username+'&password='+password+'&email='+email;
      $.ajax({
        type:"POST",
        url : "jsurl/getregister.php",
        data: dataString,
        success:function(data){
          $("#resultmsg").html(data);
        }
      });
      return false;
    });
  });
</script>


<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
<div class="segment">

<form action="" method="POST">
	<table>
	<tr>
    <td>Name</td> <!--name='' from DB and id='' for JS-->
    <td><input type="text" name="name" id="name"></td>
  </tr>
	<tr>
     <td>Username</td>
     <td><input name="username" type="text" id="username"></td>
  </tr>
  
   <tr>
     <td>Email</td>
     <td><input name="email" type="text" id="email"></td>
  </tr> 

  <tr>
     <td>Password</td>
     <td><input type="password" name="password" id="password"></td>
  </tr>
   
  <tr>
     <td></td>
     <td><input type="submit" id="regsubmit" value="Signup" >
     </td>
  </tr>
     </table>
   </form>

<span id="resultmsg"></span>

   <p>Already Registered ? <a href="index.php">Login</a> Here </p>

</div>


	
</div>
<?php include 'inc/footer.php'; ?>