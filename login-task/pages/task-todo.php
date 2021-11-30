<?php

 $server = "localhost";

 $username = "alex";

 $pass = "root";

 $dbname = "trining";

 $connetion = new mysqli($server, $username, $pass, $dbname);

 if ($connetion->connect_error) {
       echo "please check your configurations";
  }
   $gettask = $_REQUEST['task'];

   $sql = "INSERT INTO works (work) VALUES ('$gettask')";

  if ($connetion->query($sql) === TRUE) {
      //   header("Location: http://todoapp.test/");
        header("Location: store.php");

      } else
       {
       echo "something went to wrong...!" ;
      }
?>