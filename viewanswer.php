<?php include 'inc/header.php'; 
  Session::checkSession(); 
  $totalqus = $exm->getTotalQusRows();
?>

<div class="main">
  <h1>Question & Answer: <?php echo $totalqus;?></h1>
<div class="view">
  <table> 
<?php
  $getQus = $exm->getQusByOrder();
  if ($getQus) {
  	while ($question = $getQus->fetch_assoc()) {
?>
	<tr>
	  <td colspan="2">
	   <h3>Que <?php echo $question['qusNo'];?>: <?php echo $question['question'];?></h3>
	  </td>
	</tr>

	<?php
	  $number = $question['qusNo'];	
	//get all of the options for single qus
	  $answer = $exm->getAnswer($number);
	  if ($answer) {
	  	while ($result = $answer->fetch_assoc()) {
	?>	
	<tr>
	  <td>
	   <input type="radio"/> 
	      <?php 
	      if ($result['rightAns'] == '1') {
	      	echo "<span style='color:blue'>".$result['ans']."</span>";
	      }else{ 
	      	echo $result['ans'];
	      }	
	      ?>
	  </td>
	</tr>
	<?php } } ?>
<?php } } ?>
  </table>
  <a href="starttest.php">Start Test Again</a>
 </div>
</div>
<?php include 'inc/footer.php'; ?>