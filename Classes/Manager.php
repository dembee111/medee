<?php

/**
 *
 */
class Manager
{

public $database;


  public function __construct(){
    $this->database = mysqli_connect("localhost", "root", "", "medee");
    mysqli_set_charset($this->database,"utf8");
    if(mysqli_connect_errno()) {
      echo "Error: Could not connect to database.";
            exit;
    }



  }


public function getCompany(company $company){
  $conn = $this->database;
   $company_id = mysqli_real_escape_string($conn, $company->company_id);
   $company_name = mysqli_real_escape_string($conn, $company->company_name);
   $database_type = mysqli_real_escape_string($conn, $company->database_type);
   $database_user = mysqli_real_escape_string($conn, $company->database_user);
   $database_password = mysqli_real_escape_string($conn, $company->database_password);
   $database_name = mysqli_real_escape_string($conn, $company->database_name);
   $company_address = mysqli_real_escape_string($conn, $company->company_address);
   $company_phone = mysqli_real_escape_string($conn, $company->company_phone);



   $query = "INSERT INTO company(`company_id`, `company_name`, `database_type`, `database_user`, `database_password`,`database_name`,
                                `company_address`,`company_phone`) VALUES ('','$company_name', '$database_type','$database_user','$database_password', '$database_name',
                                                                  '$company_address', '$company_phone')";



     $result = mysqli_query($conn, $query);

     $query_zeel = "CREATE TABLE `$database_name` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `register_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
        `obog` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
        `ner` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
        `dugaar` int(8) DEFAULT NULL,
        `nemelt_utas` int(8) DEFAULT NULL,
        `zturul_id` int(11) DEFAULT NULL,
        `hayg` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
        `delgerengui` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
        `startdate` date DEFAULT NULL,
        `enddate` date DEFAULT NULL,
        `honog_id` int(11) DEFAULT NULL,
        `honog_huu` int(11) DEFAULT NULL,
        `unelgee` varchar(150) DEFAULT NULL,
        `creditzeel` varchar(7) DEFAULT NULL,
        `tuluh_huu` varchar(255) NOT NULL,
        `company_id` int(11) DEFAULT NULL,
        `branch_id` int(11) NOT NULL,
        `user_id` int(11) DEFAULT NULL,
        `role_id` int(11) DEFAULT NULL,
        `hamtran_id` int(11) DEFAULT NULL,
        `photo_id` int(11) DEFAULT NULL,
         PRIMARY KEY(ID)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
     $result2 = mysqli_query($conn, $query_zeel);
    return $result;

    mysqli_close($conn);
}

public function companyList(){

  $conn = $this->database;

  $query = "SELECT * FROM company";
  $result = mysqli_query($conn, $query);
  return $result;
}
}


 ?>
