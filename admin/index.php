<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<style>
  .adminPanel{width: 500px; color: #999; margin: 60px auto; padding: 50px; border: 1px solid gainsboro; }	
</style>

<?php
  // Session::checkLogin();
?>

<div class="main">
<h1>Admin Panel</h1>
	<div class="adminPanel">
	  <h2>Welcome to Admin Panel</h2>
	  <p>You can manage your user & online Exam system form here...</p>	
	</div>



	
</div>
<?php include 'inc/footer.php'; ?>