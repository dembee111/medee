<?php

require_once 'zeel.php';
require_once 'Company.php';
require_once 'Manager.php';

if (isset($_POST['zturul_id'])) {

   $zturul_id = $_POST['zturul_id'];

   $zeel = new Zeel();
   $pro_select_box = $zeel->get_honog($zturul_id);
   echo json_encode($pro_select_box);

}

if (isset($_POST['honog_id'])) {

   $honog_id = $_POST['honog_id'];

   $zeel = new Zeel();
   $pro_select_honog = $zeel->get_hugatsaa($honog_id);
   echo $pro_select_honog;

}

if (isset($_POST['hamtran_lastname'])) {

  $hamtran_lastname = $_POST['hamtran_lastname'];
  $hamtran_firstname = $_POST['hamtran_firstname'];
  $hamtran_register = $_POST['hamtran_register'];

  $zeel = new Zeel();

  $hamtran_zeel = $zeel->hamtran_zeel($hamtran_lastname,$hamtran_firstname,$hamtran_register);
  $lastid = $zeel->hamaatai($hamtran_zeel);
  if ($hamtran_zeel) {
    echo $lastid;
  }
  else{


  }
exit();
}

if (isset($_POST['company_name'])) {

  $company_name = $_POST['company_name'];
  $database_type = $_POST['database_type'];
  $database_user = $_POST['database_user'];
  $database_password = $_POST['database_password'];
  $database_name = $_POST['database_name'];
  $company_address = $_POST['company_address'];
  $company_phone = $_POST['company_phone'];

  $company = new Company(-1,$company_name,$database_type,$database_user,$database_password,$database_name,$company_address,$company_phone);

  $manager = new Manager();
  $managing = $manager->getCompany($company);

  if ($managing) {
    // echo "<script>window.location = '../dashboard/company_insert.php';</script>";
    echo "амжиллтай";
  }
  else{

     echo "Бүтэлгүй";
  }
exit();
}



 ?>
