<?php

 class UserRegisterProcess
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
     
     public function  UserRegisrer($username,$pass)
     {
        
            $ins="INSERT INTO user_data (`username`,`pass`) VALUES ('$username','$pass')";

            $result = mysqli_query($this->conn,$ins);
            
             if($result){
                header("Location: ../auth-views/login.php");
             }
            else
            {
                echo "something wend to wrong..!";
            }
       
         
     }


 }
 $proceed = new UserRegisterProcess;

 $proceed->UserRegisrer($_REQUEST['username'],$_REQUEST['password']);
?>