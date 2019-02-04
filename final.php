<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
?> 

<div class="main">
  <h1>You're Done Your Test</h1>
   <div class="starttest">
  	<p>Congrats! You've just completed Web Developer Test </p>
 	<p>Final Score: 
 	  <?php
 	    if (isset($_SESSION['scroe'])) {
 	      echo $_SESSION['scroe'];
 	      unset($_SESSION['scroe']);	
 	    }
 	  ?>	
 	</p>
  	<a href="viewanswer.php">View Result</a>
  	<a href="starttest.php">Start Test Again</a>
  </div>

	
</div>
<?php include 'inc/footer.php'; ?>