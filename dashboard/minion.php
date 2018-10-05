<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
     <div class="container">
        <?php
         include '../Classes/zeel.php';
          include '../Classes/credit.php';

         $id =  11;
         $register_number =  11;
         $obog =  11;
         $ner =  11;
         $dugaar =  11;
         $nemelt_utas =  11;
         $zturul_id =  11;
         $hayg =  11;
         $delgerengui =  11;
         $startdate =  11;
         $enddate =  11;
         $honog_id =  11;
         $honog_huu =  11;
         $unelgee =  11;
         $creditzeel =  11;
         $tuluh_huu =  11;
         $company_id =  11;
         $branch_id = 11;
         $user_id =  11;
         $role_id =  11;
         $hamtran_id =  11;
         $photo_id =  11;



         $credit = new Credit($id, $register_number, $obog, $ner, $dugaar, $nemelt_utas, $zturul_id, $hayg,
                             $delgerengui, $startdate, $enddate, $honog_id, $honog_huu, $unelgee, $creditzeel, $tuluh_huu, $company_id, $branch_id, $user_id,
                             $role_id, $hamtran_id, $photo_id);

         $zeel = new Zeel();
         echo $zeel->insert_zeel($credit);

         ?>
     </div>
  </body>
</html>
