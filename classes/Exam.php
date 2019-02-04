<?php 
  $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/Database.php");
    include_once ($filepath."/../helpers/Format.php");
?>
<?php
/**
 * summary
 */
class Exam {
	private $db;
	private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getQusByOrder(){
      $query = "SELECT * FROM tbl_qus ORDER BY qusNo ASC";
      $result = $this->db->select($query);
      return $result;
    }

    public function DeleteQus($delqus){
    //here we've handle 2tables
      $tables = array("tbl_qus","tbl_ans");  
      foreach ($tables as $table) {
        $delquery = "DELETE FROM $table WHERE qusNo='$delqus'";
        $delData =$this->db->delete($delquery);
      }
      if ($delData) {
        $msg = "<span class='success'>Data Deleted Successfully</span>";
        return $msg;
      } else {
        $msg = "<span class='error'>Data Not Deleted </span>";
        return $msg;
      } 
    }


//Get Total Qus No &&&& same code for starttest.php
    public function getTotalQusRows(){
      $query     = "SELECT * FROM tbl_qus";
      $getResult = $this->db->select($query);
      $total     = $getResult->num_rows; //no braces/$ sign for [num_rows]
      return $total;
    }


//Add Qus
    public function addQuestions($data){
      $qusNo    = mysqli_real_escape_string($this->db->link, $data['qusNo']);
      $question = mysqli_real_escape_string($this->db->link, $data['question']);

      $ans       =   array();
      $ans[1]    =   $data['ans1'];
      $ans[2]    =   $data['ans2'];
      $ans[3]    =   $data['ans3'];
      $ans[4]    =   $data['ans4'];
      $rightAns  =   $data['rightAns'];

//insert qus to tbl_qus
      $query = "INSERT INTO tbl_qus(qusNo, question) VALUES('$qusNo' , '$question')";
      $insert_row = $this->db->insert($query);
//insert qus & ans to tbl_ans
      if ($insert_row) {
        foreach ($ans as $key => $ansName) {
          if ($ansName != '') {
            if ($rightAns == $key) {
              $rightQuery = "INSERT INTO tbl_ans(qusNo, rightAns, ans) VALUES('$qusNo' , '1' ,'$ansName')";
            } else {
               $rightQuery = "INSERT INTO tbl_ans(qusNo, rightAns, ans) VALUES('$qusNo' , '0' ,'$ansName')";
            }
            $insert_rightrow = $this->db->insert($rightQuery);
            if ($insert_rightrow) {
              continue;
            }else{
              die('Error !!!!');
            }
          }
        }
     $msg = "<span class='success'>Question Added Successfully</span>"; 
     return $msg;  
      }
    }


//FOR USERS....
  //get question
  public function getQuestion(){
    $query = "SELECT * FROM tbl_qus";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();
    return $result;
  }  

//get qus by number
  public function getQusByNumber($number){
    $query = "SELECT * FROM tbl_qus WHERE qusNo='$number'";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();
    return $result;
  }


//get Answer
  public function getAnswer($number){
    $query = "SELECT * FROM tbl_ans WHERE qusNo='$number'";
    $getData = $this->db->select($query);
    return $getData;
  }





}
?>