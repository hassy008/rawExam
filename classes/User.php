<?php 
 $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../lib/Session.php');
  include_once ($filepath.'/../lib/Database.php');
  include_once ($filepath.'/../helpers/Format.php');
?>
<?php
/**
 * summary
 */
class User {
	private $db;
	private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAdminData($data){
    	$adminUser = $this->fm->validation($data['adminUser']);
    	$adminPass = $this->fm->validation($data['adminPass']);
    	$adminUser  = mysqli_real_escape_string($this->db->link, $adminUser);
    	$adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));
    }


    public function getAllUser(){
        $query = "SELECT * FROM tbl_user ORDER BY userid DESC";
        $result = $this->db->select($query);
        return $result;
    }

    //class for DISABLE 
    public function DisableUser($userid){
        $query = "UPDATE tbl_user
                  SET  
                   status ='1' 
                   WHERE userid='$userid'";
        $updated_row = $this->db->update($query);
        if ($updated_row) {
          $msg = "<span class='success'>User Disable</span>";
          return $msg;             
          } else {
            $msg = "<span class='error'>User Not Disable</span>";
            return $msg;
          }          
    }


    //class for ENABLE
    public function EnableUser($enbid){
        $query = "UPDATE tbl_user
                SET status  = '0'
                WHERE userid= '$enbid' ";
        $updated_row = $this->db->update($query);
        if ($updated_row) {
          $msg = "<span class='success'>User Enable</span>";
           return $msg;       
           }  else {
            $msg = "<span class='success'>User NOT Enable</span>";
             return $msg;
           }      
    }


    //class for DELETE 
    public function DeleteUser($delid){
        $query = "DELETE FROM tbl_user WHERE userid='$delid'";
        $deleted_row = $this->db->delete($query);
        if ($deleted_row) {
           $msg = "<span class='success'>User Deleted</span>";
           return $msg;
        } else {
           $msg = "<span class='success'>User NOT Deleted</span>";
             return $msg; 
        }
    }


    //class for AJAX getregister.php
    public function userRegistration($name,$username,$password,$email){
      $name = $this->fm->validation($name);
      $username = $this->fm->validation($username);
      $password = $this->fm->validation($password);
      $email = $this->fm->validation($email);

      $name = mysqli_real_escape_string($this->db->link, $name);
      $username = mysqli_real_escape_string($this->db->link, $username);
   //use $password just before [INSERT DATA] 
      $email = mysqli_real_escape_string($this->db->link, $email);

      if (empty($name) || empty($username) || empty($password) || empty($email)) {
        echo "<span class='error'>Fill In all filed</span>"; 
        exit();
      }elseif (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
        echo "<span class='error'>Invalid Email</span>";
        exit();
      }else{
        $chkquery = "SELECT * FROM tbl_user WHERE email = '$email'";
        $chkresult = $this->db->select($chkquery);
        if ($chkresult != false) {
          echo "<span class='error'>Sorry !!! Email Already Exist .....</span>";
          exit();
        }else{
        $password = mysqli_real_escape_string($this->db->link, md5($password));
          $query = "INSERT INTO tbl_user(name,username,password,email)VALUES('$name','$username','$password','$email')";
          $inserted_row = $this->db->insert($query);
          if ($inserted_row) {
            echo "<span class='success'>Registration Successfully </span>";
            exit();
          }else{
            echo "<span class='error'>Registration Failed </span>";
            exit();
          }
        }
      }
    }


    //Login
  public function userLogin($password, $email){
    $password = $this->fm->validation($password);
    $email = $this->fm->validation($email);
  //use $password just before [SELECT DATA] 
    $email = mysqli_real_escape_string($this->db->link, $email);

    if (empty($password) || empty($email)) {
        echo "empty"; 
        exit();
      } else {
        $password = mysqli_real_escape_string($this->db->link, md5($password));  
          $query  = "SELECT * FROM tbl_user WHERE email = '$email' AND password ='$password'";
          $result = $this->db->select($query);
           if ($result != false){
            $value = $result->fetch_assoc();
            if ($value['status'] == '1') {
              echo "disable"; 
             exit();
        }else{
          Session::init();
          Session::set("login", true);
          Session::set("userid", $value['userid']);
          Session::set("username", $value['username']);
          Session::set("name", $value['name']);
          Session::set("email", $value['email']);
          Session::set("password", $value['password']);
          }
        } else{
          echo "error";
          exit();
        }
     }
  }  

  //profile.php

  public function getUserDataById($userId){
    $query = "SELECT * FROM tbl_user WHERE userid ='$userId' LIMIT 1";
    $result = $this->db->select($query);
    return $result;
  }

  //Update Profile
  public function updateUserData($userId, $data){
    $name = $this->fm->validation($data['name']);
    $username = $this->fm->validation($data['username']);
    $email = $this->fm->validation($data['email']);

    $name = mysqli_real_escape_string($this->db->link, $name);
    $username = mysqli_real_escape_string($this->db->link, $username);
    $email = mysqli_real_escape_string($this->db->link, $email);

    $query = "UPDATE tbl_user
              SET
              name = '$name',
              username = '$username',
              email = '$email'
              WHERE userid = '$userId'";
    $updated_row = $this->db->update($query);
    if ($updated_row) {
      $msg = "<span class='success'>Update Successfully </span>";
      return $msg;          
      }  else{
           $msg = "<span class='error'>Not Updated </span>";
           return $msg;
        } 
  }



}
?>