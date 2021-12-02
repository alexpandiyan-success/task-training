<?php 
session_start();
class Session {
  public static function loggedIn() {
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
        header('Location: ../../views/pages/dashboard.php');
    }
  }
  public static function loggedOut() {
    if(empty($_SESSION['id'])){
      header('Location: ../../auth/auth-views/login.php');
    }
  }

}
