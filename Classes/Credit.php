<?php

class Credit
{

  public $id;
  public $register_number;
  public $obog;
  public $ner;
  public $dugaar;
  public $nemelt_utas;
  public $zturul_id;
  public $hayg;
  public $delgerengui;
  public $startdate;
  public $enddate;
  public $honog_id;
  public $honog_huu;
  public $unelgee;
  public $creditzeel;
  public $tuluh_huu;
  public $company_id;
  public $branch_id;
  public $user_id;
  public $role_id;
  public $hamtran_id;
  public $photo_id;

  public function __construct($id, $register_number, $obog, $ner, $dugaar, $nemelt_utas,
  $zturul_id, $hayg, $delgerengui, $startdate, $enddate, $honog_id, $honog_huu,
  $unelgee, $creditzeel, $tuluh_huu, $company_id, $branch_id, $user_id, $role_id, $hamtran_id, $photo_id ){

    $this->id = $id;
    $this->register_number = $register_number;
    $this->obog = $obog;
    $this->ner = $ner;
    $this->dugaar = $dugaar;
    $this->nemelt_utas = $nemelt_utas;
    $this->zturul_id = $zturul_id;
    $this->delgerengui = $delgerengui;
    $this->hayg = $hayg;
    $this->startdate = $startdate;
    $this->enddate = $enddate;
    $this->honog_id = $honog_id;
    $this->honog_huu = $honog_huu;
    $this->unelgee = $unelgee;
    $this->creditzeel = $creditzeel;
    $this->tuluh_huu = $tuluh_huu;
    $this->company_id = $company_id;
    $this->branch_id = $branch_id;
    $this->user_id = $user_id;
    $this->role_id = $role_id;
    $this->hamtran_id = $hamtran_id;
    $this->photo_id = $photo_id;
  }

}
?>
