<?php


class Database{
    public $db;

    public function __construct()
    {
        $server = "localhost";
        $username = "alex";       
        $pass = "root";
        $dbname = "trining";
        $this->db = new mysqli($server,$username,$pass,$dbname);
         if($this->db->connect_error){
             die("connection faild");
         }
    }

    public function userRegister($table,$fields,$values){
        $implodeFields   = implode(",",$fields);
        $implodeValues   = implode("','",$values);
        $sql = "INSERT INTO $table ($implodeFields) VALUES ('$implodeValues')";
        if ($this->db->query($sql) === TRUE) {
             header("Location:../auth-views/login.php");
        } else {
            echo "something went to wrong !";
        }
    }

    public function userLogin($table,$username,$password){
        $sql = "SELECT * FROM $table WHERE username= '$username' AND pass = '$password'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
          } 
        else {
            return FALSE;
        }
    }  
    
    public function taskRegister($table,$task){
        $taskRegister = "INSERT INTO $table (work) VALUES ('$task')";
        if ($this->db->query($taskRegister) === TRUE) {
             header("Location:http://logintask-oop-revise.test/views/pages/dashboard.php");
        } else {
            echo "something went to wrong !";
        }
    } 

    public function getAllData(){
            $getData = "SELECT * FROM works";
            $result = $this->db->query($getData);
            return $result;
    }
}
