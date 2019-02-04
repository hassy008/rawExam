<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');

//User class obj
	$exm = new Exam();
?>

<?php
	if (isset($_GET['delque'])) {
	  $delqus = (int)$_GET['delque'];
	  $deltqus = $exm->DeleteQus($delqus);	
	}
?>

<div class="main">
  <div class="queslist">
  	<h1>Admin Panel- Manage Question List</h1>

<?php
	if (isset($deltqus)) {
		echo $deltqus;
	}
?>
	<table class="tblone">
		<thead>
			<tr>
				<th width="10%">No</th>
				<th width="70%">Questions</th>
				<th width="20%">Action</th>
			</tr>
		</thead>
		
<?php
$exmData = $exm->getQusByOrder();
if ($exmData) {
	$i = 0;
	while ($result = $exmData->fetch_assoc()) {
	 $i++;   
?>

		<tbody>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $result['question'];?></td>

				<td>			
	<a onclick="return confirm('Are You Sure To Remove')"  href="?delque=<?php echo $result['qusNo'];?>">Remove</a>

				</td>
			</tr>
		</tbody>
<?php  }  } ?>

	</table>
  	
  </div>


	
</div>
<?php include 'inc/footer.php'; ?>