<?php
   $filepath =realpath(dirname(__FILE__));
	 include_once ($filepath.'/../classes/User.php');
	 $usr = new User();


	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	 	$password = $_POST['password'];
	 	$email    = $_POST['email'];

	 	$userlogin = $usr->userLogin($password, $email);
	 } 


?>
