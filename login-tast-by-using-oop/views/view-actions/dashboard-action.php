<?php

 class TaskRegisterProcess
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
     
     public function  TaskRegisrer($username,$pass)
     {
            $ins="INSERT INTO works (`username`,`pass`) VALUES ('$username','$pass')";

            $result = mysqli_query($this->conn,$ins);
            
             if($result){
                header("Location: ../pages/dashboard.php");
             }
            else
            {
                echo "something wend to wrong..!";
            }
     }


 }
 $proceed = new TaskRegisterProcess;

 $proceed->TaskRegisrer($_REQUEST['username'],$_REQUEST['password']);
 
?>