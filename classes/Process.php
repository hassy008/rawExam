<?php 
  $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
	//sSession::init();
    include_once ($filepath."/../lib/Database.php");
    include_once ($filepath."/../helpers/Format.php");
?>
<?php

class Process {
	private $db;
	private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

  public function processData($data){
  	$selectedAns = $this->fm->validation($data['ans']);
  	$number 	 = $this->fm->validation($data['number']);
    $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
    $number      = mysqli_real_escape_string($this->db->link, $number);
    $next   	 = $number+1;

    if (!isset($_SESSION['scroe'])) {
      $_SESSION['scroe'] = '0';	
    }
  	
  //using below function	
  	$total = $this->getTotal();
  //findout the right answer
  	$right = $this->rightAns($number);


// $number = total number 1,2...n .....
  // $total  = last number.... 	
  	if ($right == $selectedAns) {
  	  	$_SESSION['scroe']++;
  	}

  	if ($number == $total) {
  	  header("Location:final.php");
  	  exit();
  	}else{
  	  header("Location:test.php?qusnumber=".$next);
  	  exit();
  	}
  }


//get the total nnumber ..tht's mean the last number
  private function getTotal(){
	$query     = "SELECT * FROM tbl_qus";
    $getResult = $this->db->select($query);
  	$total     = $getResult->num_rows; //no braces/$ sign for [num_rows]
 	return $total;
    }

//findout the right answer
  private function rightAns($number){
 	$query = "SELECT * FROM tbl_ans WHERE qusNo='$number' AND rightAns='1' ";
    $getData = $this->db->select($query)->fetch_assoc();
    $result = $getData['id'];
    return $result; 	
  }  

}
?>