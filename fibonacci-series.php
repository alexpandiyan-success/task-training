<?php
  
$a = 0;

$b = 0;

$c = 1;

$d= 15;

echo ($b.''."\n".$c."\n ");

  for($i=0;$i<6;$i++){

    $tle = $b + $c;

    $b = $c;

    $c = $tle ; 

    $a = $a + 1;
   
    echo "\n".$c."\n";

  }




?>