<?php

/**
 *
 */
class tursh

{
  public $name;
  public $age;


  public function name(){

    $this->name = "Наранбаатар";

  }
  public function age($age){

    $this->age = $age;
    $this->name = "Болдбаатар";

  }

  public function full(){
    echo "Түүний нэрийг $this->name гэдэг. харин нас нь $this->age тай";
  }
}


 ?>
