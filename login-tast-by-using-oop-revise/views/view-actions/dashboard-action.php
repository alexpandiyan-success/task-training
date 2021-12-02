<?php
include('../../config/Database.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $task = $_POST['task'];
  $obj  = new Database;
  $getData = $obj->taskRegister('works',$task);

} 


?>


 