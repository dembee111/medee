<?php

class Company
{

  public $company_id;
  public $company_name;
  public $database_type;
  public $database_user;
  public $database_password;
  public $database_name;
  public $company_address;
  public $company_phone;



  public function __construct($company_id, $company_name, $database_type, $database_user, $database_password, $database_name,
  $company_address, $company_phone){

    $this->company_id = $company_id;
    $this->company_name = $register_number;
    $this->database_type = $database_type;
    $this->database_user = $database_user;
    $this->database_password = $database_password;
    $this->database_name = $database_name;
    $this->company_address = $company_address;
    $this->company_phone = $company_phone;

  }

}
?>
