<?php
include('../../config/Database.php');
include('../../config/helpers/PasswordEncriprt.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $passEncrypt  = PasswordEncriprt::passwordMd($password);
  $obj  = new Database;
  $getData = $obj->userLogin('user_data',$username,$passEncrypt);
if($getData === FALSE){
  echo "invalid credentials";
}else{
   session_start();
   $name = json_encode($getData['username']);
   $user_id = json_encode($getData['id']);
   $_SESSION['name'] = $name;
   $_SESSION['id'] = $user_id;
   header("Location:../../views/pages/dashboard.php");
}
}
