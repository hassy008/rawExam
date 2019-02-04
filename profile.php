<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
  //get userid from User.php
  $userId = Session::get("userid");
?> 
<?php
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    $updateUser = $usr->updateUserData($userId, $_POST);
  }
?>

<style type="text/css">
  .profile{margin:0 auto; width:500px; border:1px solid black; padding:20px 20px;}
</style>
<div class="main">
<h1>Online Exam System - User Profile & Update Option</h1>


<div class="profile">

<!--get data from DB-->
<?php
  $getData = $usr->getUserDataById($userId);
  if ($getData) {
    while ($result = $getData->fetch_assoc()) {   
?>

<?php
  if (isset($updateUser)) {
    echo $updateUser;
  }
?>
<form action="" method="post">
 <table class="tbl">    
  <tr>
    <td>Email</td>
    <td><input name="email" type="text" id="email" value="<?php echo $result['email'];?>"></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input name="username" type="text" id="email" value="<?php echo $result['username'];?>"></td>
  </tr>
  <tr>
    <td>Name</td>
    <td><input name="name" type="text" id="" value="<?php echo $result['name'];?>"></td>
  </tr>

  <tr>
   <td></td>
   <td><input type="submit" id="" value="Update"></td>
  </tr>
 </table>
</form>
<?php } } ?>
  
</div>

	
</div>
<?php include 'inc/footer.php'; ?>