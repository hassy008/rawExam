<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();

//bring qus No[start test]
	$ques = $exm->getQuestion();
//Number of Question
	$totalqus = $exm->getTotalQusRows();
?> 

<div class="main">
 <h1>Welcome to Online Exam - Start Now</h1>
  <div class="starttest">
  	<h2>Test your Knowledge</h2>
  	<p>This is MCQ test for Web Developers </p>
  	<ul>
  	  <li><strong>Number of Question </strong><?php echo  $totalqus;?></li>	
  	  <li><strong>Question Type:</strong> Multiple Choice</li>	
  	</ul>
  	<a href="test.php?qusnumber=<?php echo $ques['qusNo'];?>">Start Test</a>
  </div>
	
</div>
<?php include 'inc/footer.php'; ?>