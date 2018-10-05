<?php
require_once 'zeel.php';
require_once 'credit.php';



if (isset($_POST["register_number"])) {

            $id =  $_POST['id'];
            $register_number =  $_POST['register_number'];
            $obog =  $_POST['obog'];
            $ner =  $_POST['ner'];
            $dugaar =  $_POST['dugaar'];
            $nemelt_utas =  $_POST['nemelt_utas'];
            $zturul_id =  $_POST['zturul_id'];
            $hayg =  $_POST['hayg'];
            $delgerengui =  $_POST['delgerengui'];
            $startdate =  $_POST['startdate'];
            $enddate =  $_POST['enddate'];
            $honog_id =  $_POST['honog_id'];
            $honog_huu =  $_POST['honog_huu'];
            $unelgee =  $_POST['unelgee'];
            $creditzeel =  $_POST['creditzeel'];
            $tuluh_huu =  $_POST['tuluh_huu'];
            $company_id =  $_POST['company_id'];
            $branch_id =  $_POST['branch_id'];
            $user_id =  $_POST['user_id'];
            $role_id =  $_POST['role_id'];
            $hamtran_id =  $_POST['hamtran_id'];
            $photo_id =  $_POST['photo_id'];



            $credit = new Credit($id, $register_number, $obog, $ner, $dugaar, $nemelt_utas, $zturul_id, $hayg,
                                $delgerengui, $startdate, $enddate, $honog_id, $honog_huu, $unelgee, $creditzeel, $tuluh_huu, $company_id, $branch_id, $user_id,
                                $role_id, $hamtran_id, $photo_id);

            $zeel = new Zeel();
            $res = $zeel->insert_zeel($credit);
            $insertid = $zeel->hamsaatan($res);


            if($res){
                // $data['status'] ='success';
                // $data['redirect_url'] =
                // echo "<script>window.location = '../dashboard/successZeel.php';</script>";
                echo $insertid;

             }
             else {
                return false;
                 // $data['error'] = "error";
             }
             // return json_encode($data);

}

 ?>
