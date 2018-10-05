<?php require 'inc/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php require 'inc/Sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
 <h1>
   <?php echo User::get('company_name'); ?> ХХК
   <small>Хэвийн зээл</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="index.php"><i class="fa fa-dashboard"></i> Эхлэл</a></li>
   <li><a href="standartZeel.php">Хэвийн зээл</a></li>
   <li class="active">Хэвийн зээл</li>
 </ol>
</section>

<!-- Main content -->
<section class="content">
 <div class="row">
   <div class="col-xs-12">
     <div class="box">
       <div class="box-header">
         <h3 class="box-title">Салбар: <?php echo User::get('branch_name'); ?></h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <table id="example1" class="table table-bordered table-striped">
           <thead>
           <tr>
             <th>Зээлийн дугаар</th>
             <th>Зээлдэгчийн нэр</th>
             <th>Барьцаалбар</th>
             <th>Зээлийн хэмжээ</th>
             <th>Зээлийн хүү</th>
             <th>Зээлийн хугацаа</th>

           </tr>
           </thead>
           <tbody>
             <?php
             include '../Classes/Zeel.php';
             $zeel = new Zeel();
             $res = $zeel->getZeel();
             if ($res) {
                 while($result = $res->fetch_assoc()){
             ?>
           <tr>
             <td><?php echo $result['id']; ?></td>
             <td><?php echo $zeel->fullname($result['obog'], $result['ner']); ?></td>
             <td><?php echo $result['delgerengui']; ?></td>
             <td><?php echo $result['creditzeel']; ?></td>
             <td><?php echo $result['tuluh_huu']; ?></td>
             <td><?php echo $zeel->fulldate($result['startdate'], $result['enddate']) ?></td>
           </tr>
         <?php } }else{ ?>
           <td>Үүссэн зээл байхгүй байна</td>
         <?php } ?>
           </tbody>

         </table>
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
   </div>
   <!-- /.col -->
 </div>
 <!-- /.row -->
</section>
<!-- /.content -->
</div>

  <!-- Main Footer -->
  <?php require 'inc/Footer.php'; ?>
