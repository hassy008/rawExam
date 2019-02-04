<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');

//User class obj
	$usr = new User();
?>

<!--create Diable Option-->
<?php 
	if (isset($_GET['dis'])) {
		$dblid = (int)$_GET['dis'];
		$dblUser = $usr->DisableUser($dblid);
	}
//End Diable Option

//create Enable Option
	if (isset($_GET['ena'])) {
		$enbid = (int)$_GET['ena'];
		$enblUsr = $usr->EnableUser($enbid);
	}
//
//
	if (isset($_GET['del'])) {
		$delid = (int)$_GET['del'];
		$delusr = $usr->DeleteUser($delid);
	}
?>
<!--End Diable Option-->


<div class="main">
  <div class="manageuser">
  	<h1>Admin Panel- Manage User List</h1>
<!--Show Diable Option-->
<?php
	if (isset($dblUser)) {
		echo $dblUser;
	}

	if (isset($enblUsr)) {
		echo $enblUsr;
	}

	if (isset($delusr)) {
		echo $delusr;
	}
?>

	<table class="tblone">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		
<?php
$usrData = $usr->getAllUser();
if ($usrData) {
	$i = 0;
	while ($result = $usrData->fetch_assoc()) {
	 $i++;   
?>


		<tbody>
			<tr>
				<!--<td><?php echo $i;?></td>-->
				<td>
				 <?php 
		//this code to change COLOR purpose		 
				  if($result['status'] == '1'){
				  	echo "<span class='error'>".$i."</span>";
				   } else {
				   	   echo $i;
				   }
				 ?>
					
				</td>
				<td><?php echo $result['name'];?></td>
				<td><?php echo $result['username'];?></td>
				<td><?php echo $result['email'];?></td>
				<td>


<?php if ($result['status'] == '0' ) { ?>
	<a onclick="return confirm('Are You Sure To Disable ID')"  href="?dis=<?php echo $result['userid'];?>">Disable</a>  	
<?php	} else { ?>
	<a onclick="return confirm('Are You Sure To Enable')"  href="?ena=<?php echo $result['userid'];?>">Enable</a>			
<?php	} ?>				
					
	||<a onclick="return confirm('Are You Sure To Remove')"  href="?del=<?php echo $result['userid'];?>">Remove</a>

				</td>
			</tr>
		</tbody>
<?php }  } ?>

	</table>
  	
  </div>


	
</div>
<?php include 'inc/footer.php'; ?>