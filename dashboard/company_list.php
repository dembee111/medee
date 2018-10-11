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
             <th>Компани дугаар</th>
             <th>Компани нэр</th>
             <th>Датабаз төрөл</th>
             <th>Датабаз хэрэглэгч</th>
             <th>Датабаз нууц үг</th>
             <th>Датабаз нэр</th>
             <th>Компани хаяг</th>
             <th>Компани утас</th>

           </tr>
           </thead>
           <tbody>
             <?php
             include '../Classes/Manager.php';
             $manager = new Manager();
             $res = $manager->companyList();
             if ($res) {
                 while($result = $res->fetch_assoc()){
             ?>
           <tr>
             <td><?php echo $result['company_id']; ?></td>
             <td><?php echo $result['company_name']; ?></td>
             <td><?php echo $result['database_type']; ?></td>
             <td><?php echo $result['database_user']; ?></td>
             <td><?php echo $result['database_password']; ?></td>
             <td><?php echo $result['database_name']; ?></td>
             <td><?php echo $result['company_address']; ?></td>
             <td><?php echo $result['company_phone']; ?></td>
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
