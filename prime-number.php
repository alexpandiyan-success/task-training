<?php

   for ($i=1; $i <= 15 ; $i++) { 
    $l = 0;
    for ($j=2; $j <=$i/2 ; $j++) { 
        if($i % $j === 0){
           $l++;
           break;
        }
    }
      if($l === 0){
          echo $i;
      }       
       echo "\n";

   }


?>