<?php

 $server = "localhost";

 $username = "alex";

 $pass = "root";

 $dbname = "trining";

 $connetion = new mysqli($server, $username, $pass, $dbname);

 if ($connetion->connect_error) {
       echo "please check your configurations";
  }

?>