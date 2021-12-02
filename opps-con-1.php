<?php


  
  class Bus
  {
  	private $seat;

          
          function getSeatCount($d)
          {
          	  return $this->seat = $d;
          }

  }


    $obj = new Bus;

    echo $obj->getSeatCount(5);

    echo "\n";

?>