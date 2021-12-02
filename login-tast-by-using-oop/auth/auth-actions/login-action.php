<?php

 class LoginProcess
 {

     public $conn;


     public function __construct()
     {
        require '../../config/dbconnection.php';

        $this->conn = new mysqli($server,$username,$pass,$dbname);
 
        if ($this->conn->connect_error) {
          echo "please check your configurations";
        }
        else{
          echo "connected successfully !";
        }

     }
     
     public function loginProceed($username,$pass)
     {

       $checkuserdata = "SELECT id,username,pass FROM user_data WHERE username = '$username' AND pass = '$pass'";

       $results = mysqli_query($this->conn,$checkuserdata);

       $get_user_data = mysqli_fetch_array($results);

       print_r($get_user_data['id']);

       if($results->num_rows == 1){

        session_start();

        $_SESSION['user_id'] =  $get_user_data['id'];

        $_SESSION['user_name'] =  $get_user_data['username'];


        header("Location:../../views/pages/dashboard.php");

       }else{
           echo "<p style='color:red'>Invalid username or password</p>";
       }
         
     }


 }
 $proceed = new LoginProcess;

 $proceed->loginProceed($_REQUEST['username'],$_REQUEST['password']);
?>