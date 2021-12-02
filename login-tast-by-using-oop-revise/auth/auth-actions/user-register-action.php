<?php

include('../../config/Database.php');
include('../../config/helpers/PasswordEncriprt.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get the fiels as index array
  $fields =  array_keys($_POST);
// to change md5
  $passMd5 = PasswordEncriprt::passwordMd($_POST['pass']);
// to convert as array with md5
  $passwordasMd5Withuser = array_replace($_POST,['pass' => $passMd5]);
//  convert as array
  $values = array_values($passwordasMd5Withuser);
  $obj  = new Database;
  $obj->userRegister('user_data',$fields,$values);

} 


?>