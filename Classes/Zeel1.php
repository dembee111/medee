<?php
 include 'DB.php';
 include 'Session.php';
class Zeel{

  public $var;
  public $connected;
  public $hamtranid;
  public $db;

  public function __construct(){
    $this->db = mysqli_connect("localhost", "root", "", "medee");
    mysqli_set_charset($this->db,"utf8");
    if(mysqli_connect_errno()) {
      echo "Error: Could not connect to database.";
            exit;
    }

    $this->hamtranid;

  }

    public function search($search){

		  $search = mysqli_real_escape_string($this->db, $search);

			$query = "SELECT * FROM zeels WHERE register_number LIKE '%$search%'";
      $result = mysqli_query($this->db, $query);
      $value = mysqli_fetch_array($result);
      $count_row = mysqli_num_rows($result);
         if($count_row > 0){
              Session::set("register_number", $value['register_number']);
              Session::set("obog", $value['obog']);
              Session::set("ner", $value['ner']);
              Session::set("dugaar", $value['dugaar']);
              Session::set("nemelt_utas", $value['nemelt_utas']);
              echo "<script>window.location = '../dashboard/isCreate.php';</script>";
             return true;

			 }
			 else{
         Session::set("emptyRegister", $search);
				 echo "<script>window.location = '../dashboard/create.php';</script>";
         return false;

			 }

		}



    public function zturul(){
      $query = "SELECT * FROM zturul";
      $result = mysqli_query($this->db, $query);
      return $result;
  }

  public function get_honog($zturul_id){

    $query = "SELECT * FROM honog WHERE zturul_id = '$zturul_id'";
    $result = mysqli_query($this->db, $query);
    if(mysqli_num_rows($result) > 0){
      $pro_select_box = '';
      $pro_select_box .= '<option  value="">Хугацаа Сонгох</option>';
      while($result2 = mysqli_fetch_assoc($result)){
        $pro_select_box .= '<option value="'.$result2['honog_id'].'">'.$result2['hugatsaa'].'</option><span class="input-group-addon">%</span>';
     }
     return $pro_select_box;
   }
   else{
     echo "no result";
   }

  }

  public function get_hugatsaa($honog_id){

        $query = "SELECT huu FROM honog WHERE honog_id = '$honog_id'";
        $result = mysqli_query($this->db, $query);
        if(mysqli_num_rows($result) > 0){

          while($huu = mysqli_fetch_assoc($result)){
          $pro_select_honog = $huu['huu'];
         }
         return $pro_select_honog;
       }
       else{
         echo "Хугацаагаа сонгоно уу!";
       }

  }

  public function hamtran_zeel($hamtran_lastname,$hamtran_firstname,$hamtran_register){
    $conn = $this->db;
     $hamtran_lastname = mysqli_real_escape_string($conn, $hamtran_lastname);
     $hamtran_firstname = mysqli_real_escape_string($conn, $hamtran_firstname);
     $hamtran_register = mysqli_real_escape_string($conn, $hamtran_register);


     $query = "INSERT INTO hamtran(`hamtran_id`, `hamtran_lastname`, `hamtran_firstname`, `hamtran_register`) VALUES ('','$hamtran_lastname', '$hamtran_firstname','$hamtran_register')";



       $result = mysqli_query($conn, $query);
       $this->hamtranid = mysqli_insert_id($conn);
       $query1 = "SELECT * FROM hamtran where hamtran_id = '$this->hamtranid'";
       $result1 = mysqli_query($conn, $query1);
       $lastid = mysqli_fetch_array($result1);
       $count_row = mysqli_num_rows($result1);

      if($count_row > 0){

           return $lastid['0'];
      }else{
        echo "болдогүйдээ";
      }
       // $this->hamtranid = "13";
       //
       //
       // return $result;




      mysqli_close($conn);
  }
  public function hamaatai($id){
    $conn = $this->db;
    $hamtid = $this->hamtranid;
    $query = "SELECT * FROM hamtran where hamtran_id = '$hamtid'";
    $result = mysqli_query($conn, $query);
    $lastid = mysqli_fetch_array($result);
    return $lastid['0'];
  }

  public function insert_zeel(credit $credit){
    $conn = $this->db;

     $id = mysqli_real_escape_string($conn, $credit->id);
     $register_number = mysqli_real_escape_string($conn, $credit->register_number);
     $obog = mysqli_real_escape_string($conn, $credit->obog);
     $ner = mysqli_real_escape_string($conn, $credit->ner);
     $dugaar = mysqli_real_escape_string($conn, $credit->dugaar);
     $nemelt_utas = mysqli_real_escape_string($conn, $credit->nemelt_utas);
     $zturul_id = mysqli_real_escape_string($conn, $credit->zturul_id);
     $hayg = mysqli_real_escape_string($conn, $credit->hayg);
     $delgerengui = mysqli_real_escape_string($conn, $credit->delgerengui);
     $startdate = mysqli_real_escape_string($conn, $credit->startdate);
     $enddate = mysqli_real_escape_string($conn, $credit->enddate);
     $honog_id = mysqli_real_escape_string($conn, $credit->honog_id);
     $honog_huu = mysqli_real_escape_string($conn, $credit->honog_huu);
     $unelgee = mysqli_real_escape_string($conn, $credit->unelgee);
     $creditzeel = mysqli_real_escape_string($conn, $credit->creditzeel);
     $tuluh_huu = mysqli_real_escape_string($conn, $credit->tuluh_huu);
     $company_id = mysqli_real_escape_string($conn, $credit->company_id);
     $user_id = mysqli_real_escape_string($conn, $credit->user_id);
     $worker_id = mysqli_real_escape_string($conn, $credit->worker_id);
     $hamtran_id = mysqli_real_escape_string($conn, $credit->hamtran_id);
     $photo_id = mysqli_real_escape_string($conn, $credit->photo_id);

     $query = "INSERT INTO zeels(`id`, `register_number`, `obog`, `ner`, `dugaar`,`nemelt_utas`,
                                  `zturul_id`,`hayg`,`delgerengui`, `startdate`,`enddate`,`honog_id`,
                                    `honog_huu`,`unelgee`,`creditzeel`, `tuluh_huu`,`company_id`,`user_id`,`worker_id`,
                                  `hamtran_id`, `photo_id`) VALUES ('','$register_number', '$obog','$ner','$dugaar', '$nemelt_utas',
                                                                    '$zturul_id', '$hayg','$delgerengui','$startdate', '$enddate',
                                                                     '$honog_id', '$honog_huu','$unelgee','$creditzeel', '$tuluh_huu', '$company_id',
                                                                   '$user_id', '$worker_id','$hamtran_id','$photo_id')";



       $res = $this->connectQuery($conn, $query);
        return $res;

      mysqli_close($conn);

  }
  public function connectQuery($conn, $query){
    return mysqli_query($conn, $query);
  }

  public function lastInsertId($con) {

    return mysqli_insert_id($con);
}

public function setval($val){
    $this->var = $val;
}
public function printval(){
  echo $this->var;
}



  public function max_info(){

     $conn = $this->db;
     $query = "SELECT MAX(`id`) FROM zeels";
     $result = mysqli_query($conn, $query);
     $lastid = mysqli_fetch_array($result);
     echo "Зээл амжиллтай үүслээ. Зээлийн дугаар: ". $lastid['0'];

  }



}
	?>
