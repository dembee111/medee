<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
        .row{
          display: grid;
          grid-template-columns: 70% 30%;
        }
    </style>
  </head>
  <body>
    <?php include '../Classes/User.php';

       User::checkSession();
     ?>
     <?php
     if (!isset($_GET['barimtid']) || $_GET['barimtid']==NULL) {
          echo "<script>window.location = 'successZeel.php';</script>";

        }else{
          $barimtid = $_GET['barimtid'];
          $company_id = User::get('company_id');

          $conn = mysqli_connect("localhost", "root", "", "medee");
          mysqli_set_charset($conn,"utf8");
          if(mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
                  exit;
          }
          $query1 = "SELECT * FROM company WHERE company_id = '$company_id'";
          $result1 = mysqli_query($conn, $query1);
          $company_all = mysqli_fetch_array($result1);
          $company_name = $company_all['1'];

          $query = "SELECT * FROM `$company_name` WHERE id = '$barimtid'";
          $result = mysqli_query($conn, $query);
          if ($result) {
              while($res = $result->fetch_assoc()){

      ?>
    <div class="row">
      <div class="company_name">
           <h4><b><?php echo ucfirst(User::get('company_name')); ?> Ломбард</b></h4>
      </div>
      <div class="number">
           <h4><b><?php echo $res['id']; ?></b></h4>
      </div>
    </div>

    <div class="row">
        <p>Эхлэх : <?php echo $res['startdate']; ?> Дуусах: <?php echo $res['enddate']; ?> (<?php $start = strtotime($res['startdate']); $end = strtotime($res['enddate']);
        $diff = $end - $start; echo floor($diff / 86400)."Хоног, ". $res['honog_huu'].".00% Хүү"; ?>)</p>
    </div>

  <?php } } } ?>
    <button type="button" name="button" onclick="myFunction()">Хэвлэх</button>
  </body>
  <script>
    function myFunction(){
      window.print();
    }
  </script>
</html>
