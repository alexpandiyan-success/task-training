<?php
//  pending no yet completed

   $k = 6;
   for ($i=0;$i<5;$i++) { 
         for ($j=0; $j < $k ; $j++) { 
            echo "  ";
            $k = $k - 1;
         }
         for ($j=0; $j <= $i ; $j++) { 
             echo " *  ";
         }
         echo "\n";

   }


?>