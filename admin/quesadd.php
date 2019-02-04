<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');

//User class obj
	$exm = new Exam();
?>
<style>
  .adminPanel{width: 450px; color: #999; margin: 30px auto; padding: 10px; border: 1px solid gainsboro; }	
</style>

<?php
  if ($_SERVER['REQUEST_METHOD']=='POST') {
  	 $addQus = $exm->addQuestions($_POST);	
  		}

  	//Get Total Qus No.
  	$total = $exm->getTotalQusRows();
  	$next = $total+1;
  
?>

<div class="main">
<h1>Admin Panel-Add New Question</h1>
<?php
	if (isset($addQus)) {
		echo $addQus;
	}
?>

<div class="adminPanel">
<form action="" method="post" >
	<table>
			<tr>
				<td>Question No</td>
				<td>:</td>
				<td>
				  <input type="number" name="qusNo" 
				  		value="<?php 
				  				if(isset($next)){
				  				echo $next;}
				  				?>">
				</td>
			</tr>
			<tr>
				<td>Question</td>
				<td>:</td>
				<td><input type="text" name="question" placeholder="Enter Question" required></td>
			</tr>

			<tr>
				<td>Option One</td>
				<td>:</td>
				<td><input type="text" name="ans1" placeholder="Enter Question" required></td>
			</tr>
			<tr>
				<td>Option Two</td>
				<td>:</td>
				<td><input type="text" name="ans2" placeholder="Enter Question" required></td>
			</tr>
			<tr>
				<td>Option Three</td>
				<td>:</td>
				<td><input type="text" name="ans3" placeholder="Enter Question" required></td>
			</tr>
			<tr>
				<td>Option Four</td>
				<td>:</td>
				<td><input type="text" name="ans4" placeholder="Enter Question" required></td>
			</tr>	


			<tr>
				<td>Correct Answer</td>
				<td>:</td>
				<td><input type="number" name="rightAns" required></td>
			</tr>

			<tr>
			  <td colspan="3" align="center">
				<input type="submit" value="Add A Question">
			  </td>
			</tr>
	</table>
</form>
</div>
	
</div>
<?php include 'inc/footer.php'; ?>