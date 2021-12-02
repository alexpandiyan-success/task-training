<?php
    

class PasswordEncriprt {
  public static function passwordMd($value) {
    return md5($value);
  }
 
}


?>