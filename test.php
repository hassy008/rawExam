<?php include 'inc/header.php'; ?>
<?php
  	Session::checkSession();
  	if (isset($_GET['qusnumber'])) {
  	  $number = (int)$_GET['qusnumber'];	
  	}else {
  		header("Location:exam.php");
  	}
  //h1 total qus number...and where we stand
  	//Number of Question
  $totalqus = $exm->getTotalQusRows();
  $question = $exm->getQusByNumber($number);	
?>

<?php  
	
?>


<div class="main">
<h1>Question <?php echo $question['qusNo'];?> of <?php echo $totalqus;?></h1>

<div class="test">
<form  action="" method="POST">
  <table> 
	<tr>
	  <td colspan="2">
	   <h3>Que <?php echo $question['qusNo'];?>: <?php echo $question['question'];?></h3>
	  </td>
	</tr>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$process  = $pro->processData($_POST);
	}
//get all of the options for single qus
  $answer = $exm->getAnswer($number);
  if ($answer) {
  	while ($result = $answer->fetch_assoc()) {
?>	
	<tr>
	  <td>
	   <input type="radio" name="ans" value="<?php echo $result['id'];?>" /> <?php echo $result['ans'];?>
	  </td>
	</tr>
<?php } } ?>
	<tr>
	  <td>
		<input type="submit" name="submit" value="Next Question"/>
		<input type="hidden" name="number" value="<?php echo $number;?>" />
	  </td>
	</tr>
	
  </table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>